<?php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/*
 * This is the search.blade view.
 * 
 * @author: Matheus.
 * 
 * @created_at: 30/06/2017.
 */
?>

@extends('main')

@section('styles')
<!-- insert below the custom stylesheets this view will use -->
{!! Html::style('css/home.css') !!}
@endsection

@section('title', "| Resultados para '{$searchTerm}'")

@section('content')
<!-- content goes below -->
@include('partials._searchbar')
<div class="row">
    <div class="col-xs-12 col-sm-8 col-sm-offset-2 col-lg-6 col-lg-offset-3">
        <div class="alert alert-info" role="alert">
            Há {{$resultset->total()}} {{($resultset->total() == 1)?'resultado':'resultados'}} para '{{$searchTerm}}'.
        </div>  
    </div>
</div>
<div class="row">
    @foreach($resultset as $result)
    
<div class="col-xs-12 col-sm-6 col-md-4 col-lg-3">
    <div class="thumbnail" style="background-color: #f8f8f8;">
        <div class="caption title_box">
            <span class="title_span">{!! fitResult($result->name, 35, $searchTerm) !!}</span>
        </div>
        {!!cl_image_tag('products/'.$result->photos[0]->public_id, [
            "alt" => "Imagem {$result->name}",
            "class" => "img-responsive result_img"
        ])!!}
        <div class="caption text-center">
            <h4>{{substr($result->store->name, 0, 35)}}{{strlen($result->store->name) > 35 ? '...':''}}</h4>
            <h4 style="letter-spacing: 2px;">R${{reais($result->price)}}</h4>
            <a href="{{route('anuncios.show', $result->slug)}}" class="btn btn-link btn-block" role="button">Saiba mais...</a>
        </div>
    </div>
</div>
    @endforeach
</div>
<div class="row">
    <div class="col-xs-12 text-center">
        {{$resultset->links()}}
    </div>
</div>

@endsection

@section('scripts')
<!-- insert below the custom scripts this view will use -->
<script>
    var boxClass = ".title_box";
    var spanClass = ".title_span";
</script>
{!! Html::script('js/search.js') !!}
<script>
    $(document).ready(function(){
        $(window).resize(function(){
            fitSpansInBoxes(boxClass, spanClass);
        });
    });
</script>
{!! Html::script('js/search_bar_responsive.js') !!}
@endsection