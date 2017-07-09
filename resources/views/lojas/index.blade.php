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
    <div class="col-xs-12 col-sm-6 col-md-4 col-lg-3">
        @include('partials._lojnav')
    </div>
    <div class="col-xs-12 col-sm-6 col-md-8 col-lg-9">
        <a href="{{route('lojas.create')}}" class="btn btn-info btn-lg">Cadastrar Loja</a>
        <div class="panel panel-default table_top">
            <div class="panel-heading">
                <div class="panel-title">
                    Lojas
                </div>
            </div>
            <table class="table">
                <tbody>
                    
                        @foreach($stores as $store)
                        <tr>
                            <td class="align-middle text-center">
                                {!! cl_image_tag('stores/'.$store->logo_id, ["alt" => "Sample Image", "height" => 24]) !!}
                            </td>
                            <td class="align-middle">{{$store->name}}</td>
                            <td class="text-right">
                                <a href="{{route('lojas.show', $store->id)}}" class="btn btn-default btn-sm">
                                    <i class="glyphicon glyphicon-plus"></i>
                                </a>
                                <a href="{{route('lojas.edit', $store->id)}}" class="btn btn-info btn-sm">
                                    <i class="glyphicon glyphicon-edit"></i>
                                </a>
                            </td>
                        </tr>
                        @endforeach
                    @if(sizeof($stores->getCollection()) == 0)
                        <tr>
                            <td colspan="3">Nenhuma loja cadastrada</td>
                        </tr>
                    @endif
                </tbody>
            </table>
            {{$stores->links()}}
        </div>
        <!-- 
        {!! cl_image_tag("tsqnzhhjc9uxyrag4usb") !!}
        -->
    </div>
</div>
@endsection

@section('scripts')
<!-- insert below the custom scripts this view will use -->
@endsection