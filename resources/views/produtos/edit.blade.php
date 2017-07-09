<?php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/*
 * This is the create.blade view.
 * 
 * @author: Matheus.
 * 
 * @created_at: 28/06/2017.
 */
?>

@extends('main')

@section('styles')
<!-- insert below the custom stylesheets this view will use -->
    {!! Html::style('css/select2.min.css') !!}
    {!! Html::style('css/forms.css') !!}
@endsection

@section('title', '| Novo Produto')

@section('content')
<!-- content goes below -->
<div class="row">
    <div class="col-xs-12 col-sm-10 col-sm-offset-1 col-md-8 col-md-offset-2 col-lg-6 col-lg-offset-3">
        <div class="row">
            <div class="col-xs-8 edit-title">
                Editar Produto
            </div>
            <div class="col-xs-4">
                {!! Form::open(['method' => 'DELETE', 'route' => ['produtos.destroy', $product->id]]) !!}
                    {{ Form::submit('Excluir', ['class' => 'btn btn-danger pull-right btn-block']) }}
                {!! Form::close() !!}
            </div>            
        </div>
    </div>
</div>
<hr/>
<div class="row">
    <div class="col-xs-12 col-sm-10 col-sm-offset-1 col-md-8 col-md-offset-2 col-lg-6 col-lg-offset-3">
        {!! Form::model($product, ['method' => 'PUT', 'route' => ['produtos.update', $product->id], 'class' => 'form', 'files' => true, 'id' => 'form']) !!}
            <div class="form-group">
                {{Form::label('name', 'Nome do Produto:')}}
                {{Form::text('name', null, [
                    'class' => 'form-control',
                    'required' => true
                ])}}
                {{Form::hidden('current_slug', $product->slug)}}
                <span class="text-muted">Será o nome do anúncio</span>
            </div>

            <div class="form-group">
                {{Form::label('price', 'Preço do Produto:')}}
                <div class="input-group">
                    <span class="input-group-addon">R$</span>
                    {{Form::text('price', reais($product->price), [
                        'class' => 'form-control',
                        'required' => true,
                        'step' => 'any',
                        'placeholder' => '1,99'
                    ])}}
                </div>
                <span class="text-muted">Centavos separados por vírgula</span>
            </div>
<!-- 
            <div class="form-group">
                {{Form::label('product_photos', 'Fotos do Produto:')}}
                {{Form::file('product_photos[]', [
                    'class' => 'form-control',
                    'multiple' => true,
                    'required' => true
                ])}}
                <span class="text-muted">No mínimo uma, no máximo três</span>
            </div>
-->
            <div class="form-group">
                {{Form::label('store_id', 'Loja:')}}
                {{Form::select('store_id', $stores, null, [
                    'class' => 'form-control',
                    'required' => true
                ])}}
            </div>

            <div class="form-group">
                {{Form::label('tags', 'Palavras-Chave:', ['style' => 'display: block;'])}}
                {{Form::select('tags[]', $tags, null, [
                    'class' => 'select2-multi form-control resize_js',
                    'multiple' => true
                ])}}
                <span class="text-muted" style="display: block;">Palavras-chave que categorizem o produto</span>
            </div>

            <div class="form-group">
                {{Form::label('description', 'Descrição do Produto:')}}
                {{Form::textarea('description', null, [
                    'class' => 'form-control',
                    'required' => true,
                    'resizable' => false,
                    'rows' => 5
                ])}}
                <span class="text-muted">Será o texto do anúncio</span>
            </div>
            <div class="form-group">
                <div class="row form-spacing-top">
                    <div class="col-xs-6">
                        <a href="{{route('produtos.index')}}" class="btn btn-default pull-right btn-block">Cancelar</a>
                    </div>
                    <div class="col-xs-6">
                        {{Form::submit('Aplicar', ['class' => 'btn btn-primary btn-block'])}}
                    </div>
                </div>
            </div>
        {!! Form::close() !!}
    </div>
</div>
@endsection

@section('scripts')
<!-- insert below the custom scripts this view will use -->
{!! Html::script('js/select2.min.js') !!}
<script>
    $('.select2-multi').select2();
    $(document).ready(function(){
        var resizeSelect;
        
        (resizeSelect = function(){
            $('.select2-selection').width($("#form").width());
        })();
        window.onresize = resizeSelect;
    });
</script>
@endsection