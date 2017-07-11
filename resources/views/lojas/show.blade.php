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
 * @created_at: 03/07/2017.
 */
?>

@extends('main')

@section('styles')
<!-- insert below the custom stylesheets this view will use -->
{!! Html::style('css/anuncios.css') !!}
@endsection

@section('title', "| ".e($store->name))

@section('content')
<!-- content goes below -->
<div class="row">
    <div class="col-xs-12 col-sm-10 col-sm-offset-1 col-md-8 col-md-offset-2 col-lg-6 col-lg-offset-3">
        <h3>{{$store->name}}</h3>
        {!! cl_image_tag("stores/".$store->logo_id, [
            'alt' => $store->name,
            'height' => 386,
            'width' => 1024,
            'crop' => 'pad',
            'class' => 'store_photo'
        ]) !!}
        <div class="fieldset_text">
            <div class="description_box">{!! $store->description !!}</div>
            <dl class="dl-horizontal">
                <dt>Endereço: </dt>
                <dd>{{$store->address}}</dd>
                <dt>Ligue:</dt>
                <dd>
                    <a class="btn btn-link visible-sm-inline-block visible-md-inline visible-lg-inline" href="tel:{{$store->phone}}">{{fone($store->phone)}}</a>
                    <a class="btn btn-link btn-lg hidden-sm visible-xs-block" href="tel:{{$store->phone}}">{{fone($store->phone)}}</a>
                </dd>
            </dl>
        </div>
        <div class="embed-responsive embed-responsive-16by9">
            <iframe class="embed-responsive-item" src="{{$embed_link}}"></iframe>
        </div>
    </div>
</div>
@endsection

@section('scripts')
<!-- insert below the custom scripts this view will use -->
@endsection