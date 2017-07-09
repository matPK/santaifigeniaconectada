<?php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/*
 * This is the home.blade view.
 * 
 * @author: Matheus.
 * 
 * @created_at: 22/06/2017.
 */
?>

@extends('main')

@section('styles')
<!-- insert below the custom stylesheets this view will use -->
{!! Html::style('css/home.css') !!}
@endsection

@section('title', '| Bem-Vindo')

@section('content')
<!-- content goes below -->
@include('partials._searchbar')
<div class="row">
    <div class="col-md-9">
        <div class="panel panel-default">
            <div class="panel-body">
                PRODUTOS EM DESTAQUE
            </div>
        </div>
        
    </div>
    <div class="col-md-3">
        <div class="panel panel-primary">
            <div class="panel-heading">
                <div class="panel-title">Top 5 Categorias</div>
            </div>
            <ul class="nav nav-pills nav-stacked">
                @foreach($top5 as $category)
                    <li><a href="/buscar?termo={{$category->name}}">{{$category->name}}</a></li>
                @endforeach
            </ul>
        </div>
    </div>
</div>
@endsection

@section('scripts')
<!-- insert below the custom scripts this view will use -->
{!! Html::script('js/search_bar_responsive.js') !!}
@endsection