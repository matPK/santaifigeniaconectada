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
    
    <script src="https://cloud.tinymce.com/stable/tinymce.min.js?apiKey=ugnixycp1tkbbxb38k1itxncyfp9svbqur5phirwq5ywlsxu"></script>
    
    <script>
        tinymce.init({
            selector: "textarea",
            plugins: "link lists",
            menubar: false
            //language_url : 'http://localhost:8000/js/pt_BR.js'  // site absolute URL
        });
    </script>
@endsection

@section('title', '| Novo Produto')

@section('content')
<!-- content goes below -->
<h2 class="form-title">Cadastrar Produto</h2>
<div class="row">
    <div class="col-xs-12 col-sm-10 col-sm-offset-1 col-md-8 col-md-offset-2 col-lg-6 col-lg-offset-3">
        {!! Form::open(['route' => 'produtos.store', 'class' => 'form', 'files' => true, 'id' => 'form']) !!}
            <div class="form-group">
                {{Form::label('name', 'Nome do Produto:')}}
                {{Form::text('name', null, [
                    'class' => 'form-control',
                    'required' => true
                ])}}
                <span class="text-muted">Será o nome do anúncio</span>
            </div>

            <div class="form-group">
                {{Form::label('price', 'Preço do Produto:')}}
                <div class="input-group">
                    <span class="input-group-addon">R$</span>
                    {{Form::number('price', null, [
                        'class' => 'form-control',
                        'required' => true,
                        'step' => 'any',
                        'placeholder' => '1,99'
                    ])}}
                </div>
                <span class="text-muted">Centavos separados por vírgula</span>
            </div>

            <div class="form-group">
                {{Form::label('product_photos', 'Fotos do Produto:')}}
                {{Form::file('product_photos[]', [
                    'class' => 'form-control',
                    'multiple' => true,
                    'required' => true
                ])}}
                <span class="text-muted">No mínimo uma, no máximo três</span>
            </div>

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
                    'resizable' => false,
                    'rows' => 5
                ])}}
                <span class="text-muted">Será o texto do anúncio</span>
            </div>
            <div class="form-group">
                {{Form::submit('Criar Produto', ['class' => 'btn btn-primary btn-block form-spacing-top'])}}
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