<?php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/*
 * This is the show.blade view.
 * 
 * @author: Matheus.
 * 
 * @created_at: 29/06/2017.
 */
?>

@extends('main')

@section('styles')
<!-- insert below the custom stylesheets this view will use -->
{!! Html::style('css/anuncios.css') !!}
@endsection

@section('title', "| {$product->name}")

@section('content')
<!-- content goes below -->
<div id="product_box">
    <div class="row">
        <div class="col-xs-12 col-sm-10 col-sm-offset-1 col-md-8 col-md-offset-2 col-lg-6 col-lg-offset-3">
            <h3>{{$product->name}}</h3>
            <div class="tags_container">
                @foreach($product->tags as $tag)
                    <a href="{{url('buscar').'?termo='.$tag->name}}">
                        <span class="badge">{{$tag->name}}</span>
                    </a>
                @endforeach
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-xs-12 col-sm-10 col-sm-offset-1 col-md-8 col-md-offset-2 col-lg-6 col-lg-offset-3">
            <div id="photos_carousel" class="carousel slide" data-ride="carousel">
                <!-- Indicators -->
                <ol class="carousel-indicators">
                    <?php $i = 0;?>
                    @foreach($product->photos as $photo)
                        <li data-target="#photos_carousel" data-slide-to="{{$i}}" {{$i++ == 0?'class="active"':''}}></li>
                    @endforeach
                </ol>

                <!-- Wrapper for slides -->
                <div class="carousel-inner">
                    <?php $i = 0;?>
                    @foreach($product->photos as $photo)
                    <div class="item{{$i == 0?' active':''}}">
                        {!! cl_image_tag("products/".$photo->public_id, [
                            'height' => 256,
                            'width' => 256,
                            'alt' => $product->name,
                            'crop' => 'pad'
                        ]) !!}
                    </div>
                    <?php $i++;?>
                    @endforeach
                </div>
                @if($product->photos->count() > 1)
                <!-- Left and right controls -->
                <a class="left carousel-control" href="#photos_carousel" data-slide="prev">
                      <span class="glyphicon glyphicon-chevron-left"></span>
                      <span class="sr-only">Previous</span>
                </a>
                <a class="right carousel-control" href="#photos_carousel" data-slide="next">
                      <span class="glyphicon glyphicon-chevron-right"></span>
                      <span class="sr-only">Next</span>
                </a>
                @endif
            </div>  
        </div>
    </div>
    <div class="row">
        <div class="col-xs-12 col-sm-10 col-sm-offset-1 col-md-8 col-md-offset-2 col-lg-6 col-lg-offset-3">
            <h2 style="font-weight: bolder; color: #009BDB; letter-spacing: 1px;">R${{reais($product->price)}}</h2>
            <div class="description_box">
                {!! $product->description !!}
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-xs-12 col-sm-10 col-sm-offset-1 col-md-8 col-md-offset-2 col-lg-6 col-lg-offset-3">
        <fieldset>
            {!! cl_image_tag("stores/".$product->store->logo_id, [
                'alt' => $product->store->name,
                'height' => 386,
                'width' => 1024,
                'crop' => 'pad',
                'class' => 'store_photo'
            ]) !!}
            <div class="fieldset_text">
                <h3>{{$product->store->name}}</h3>
                <dl class="dl-horizontal">
                    <dt>Endereço: </dt>
                    <dd>{{$product->store->address}}</dd>
                    <dt>Ligue:</dt>
                    <dd>
                        <a class="btn btn-link visible-sm-inline-block visible-md-inline visible-lg-inline" href="tel:{{$product->store->phone}}">{{fone($product->store->phone)}}</a>
                        <a class="btn btn-link btn-lg hidden-sm visible-xs-block" href="tel:{{$product->store->phone}}">{{fone($product->store->phone)}}</a>
                    </dd>
                </dl>
            </div>
            <div class="embed-responsive embed-responsive-16by9">
                <iframe class="embed-responsive-item" src="{{$embed_link}}"></iframe>
            </div>
            <a href="{{route('lojas.show', $product->store->id)}}" class="btn btn-link btn-block btn-lg">Mais Detalhes da Loja</a>
        </fieldset>
    </div>
</div>
@endsection

@section('scripts')
<!-- insert below the custom scripts this view will use -->
<script>
$(document).ready(function(){

});
</script>
@endsection