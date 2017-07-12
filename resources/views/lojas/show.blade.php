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
        <h3 class="store_name">{{$store->name}}</h3>
        {!! cl_image_tag("stores/".$store->logo_id, [
            'alt' => $store->name,
            'height' => 386,
            'width' => 1024,
            'crop' => 'pad',
            'class' => 'store_photo'
        ]) !!}
        <div class="fieldset_text">
            <div class="description_box">
                {!! $store->description !!}
            </div>
            <div>
                <a href="tel:{{$store->phone}}"
                    class="btn btn-link btn-block btn-lg">
                    <i class="glyphicon glyphicon-earphone"></i>
                    {{fone($store->phone)}}
                </a>
            </div>
            <div class="tags_container">
                <i class="glyphicon glyphicon-map-marker icons"></i>
                {{$store->address}}
            </div>
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