<?php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/*
 * This is the index.blade view.
 * 
 * @author: Matheus.
 * 
 * @created_at: 28/06/2017.
 */
?>

@extends('main')

@section('styles')
<!-- insert below the custom stylesheets this view will use -->
    {!! Html::style('css/mobile.css') !!}
@endsection

@section('title', '| Produtos')

@section('content')
<!-- content goes below -->
<div class="row">
    <div class="col-xs-12 col-md-4 col-lg-3">
        @include('partials._lojnav')
    </div>
    <div class="col-xs-12 col-md-8 col-lg-9">
        <a href="{{route('produtos.create')}}" class="btn btn-info btn-lg">Novo Produto</a>
        <div class="panel panel-default hidden-xs hidden-sm table_top">
            <div class="panel-heading">
                <div class="panel-title text-center">Produtos</div>
            </div>
            <table class="table table-condensed">
                <tbody>
                    @foreach($products as $product)
                    <tr>
                        <td class="align-middle text-center">
                            @foreach($product->photos as $photo)
                                {!! cl_image_tag("products/".$photo->public_id, ["alt" => "Sample Image", "height" => 30]) !!}
                            @endforeach
                        </td>
                        <td class="align-middle">
                            {{substr($product->name, 0, 50)}}{{strlen($product->name) > 50 ? '...':''}}
                        </td>
                        <td>
                            <div class="row">
                                <div class="col-xs-12 text-right">
                                    <a href="{{route('anuncios.show', $product->slug)}}" class="btn btn-default">
                                        <i class="glyphicon glyphicon-eye-open"></i>
                                    </a>
                                    <a href="{{route('produtos.edit', $product->id)}}" class="btn btn-info">
                                        <i class="glyphicon glyphicon-edit"></i>
                                    </a>
                                </div>
                            </div>
                        </td>
                    </tr>
                    @endforeach
                    @if(sizeof($products->getCollection()) == 0)
                        <tr>
                            <td colspan="3">Nenhum produto cadastrado</td>
                        </tr>
                    @endif
                </tbody>
            </table>
            <!-- 
            {!! cl_image_tag("tsqnzhhjc9uxyrag4usb") !!}
            -->
            <div class="text-center">
                {{$products->links()}}
            </div>
        </div>
    </div>

</div>

<div class="visible-xs visible-sm result_set">
    @foreach($products as $product)
    <div class="panel panel-info">
        <div class="panel-heading">
            <div class="panel-title">
                {{ strip($product->name, 25) }}
            </div>
        </div>
        <div class="panel-body">
            <div class="media">
                <div class="media-left">
                    <a href="#">
                        {!! cl_image_tag("products/".$product->photos[0]->public_id, ["alt" => "Sample Image", "width" => 48, "height" => 48]) !!}
                    </a>
                </div>
                <div class="media-body">
                    {{ strip($product->description, 100) }}
                </div>
                <div class="text-right" style="margin-top: 0.5em;">
                    <a href="{{route('anuncios.show', $product->slug)}}" class="btn btn-default">
                        <i class="glyphicon glyphicon-eye-open"></i>
                    </a>
                    <a href="{{route('produtos.edit', $product->id)}}" class="btn btn-info">
                        <i class="glyphicon glyphicon-edit"></i>
                    </a>
                </div>
            </div>
        </div>
    </div>
    @endforeach
    <div class="col-xs-12 text-center">
        {{$products->links()}}
    </div>
</div>
@endsection

@section('scripts')
<!-- insert below the custom scripts this view will use -->
@endsection