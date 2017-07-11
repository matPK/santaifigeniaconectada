<?php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/*
 * This is the edit.blade view.
 * 
 * @author: Matheus.
 * 
 * @created_at: 30/06/2017.
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
            plugins: "link lists textcolor fullscreen",
            toolbar: "bold italic underline | bullist numlist outdent indent | alignleft aligncenter alignright alignjustify | link | fontselect fontsizeselect | forecolor backcolor | fullscreen",
            menubar: false,
            language_url: '<?=url('/')?>/js/pt_BR.js'
        });
    </script>
@endsection

@section('title', 'Editar Loja')

@section('content')
<!-- content goes below -->
<div class="row">
    <div class="col-xs-12 col-sm-10 col-sm-offset-1 col-md-8 col-md-offset-2 col-lg-6 col-lg-offset-3">
        <div class="row">
            <div class="col-xs-8 edit-title">
                Editar Loja
            </div>
            <div class="col-xs-4">
                {!! Form::open(['method' => 'DELETE', 'route' => ['lojas.destroy', $store->id]]) !!}
                    {{ Form::submit('Excluir', ['class' => 'btn btn-danger pull-right btn-block']) }}
                {!! Form::close() !!}
            </div>            
        </div>
    </div>
</div>
<hr/>
<div class="row">
    <div class="col-xs-12 col-sm-10 col-sm-offset-1 col-md-8 col-md-offset-2 col-lg-6 col-lg-offset-3">
        {!! Form::model($store, [
            'route' => ['lojas.update', $store->id],
            'method' => 'PUT',
            'class' => 'form',
            'files' => true
        ]) !!}
            <div class="form-group">
                {{Form::label('name', 'Nome da Loja:')}}
                {{Form::text('name', null, ['class' => 'form-control', 'required' => true])}}
            </div>

            <div class="form-group">
                {{Form::label('address', 'Endereço da Loja:')}}
                {{Form::text('address', null, [
                    'class' => 'form-control',
                    'placeholder' => 'R. Exemplo Nº123 Sala 12...',
                    'required' => true
                ])}}
            </div>

            <div class="form-group">
                {{Form::label('cnpj', 'CNPJ:')}}
                {{Form::text('cnpj', null, [
                    'class' => 'form-control',
                    'placeholder' => 'Ex: 12123123000123',
                    'required' => true
                ])}}
                <span class="text-muted">Apenas os números</span>
            </div>

            <div class="form-group">
                {{Form::label('phone', 'Telefone:')}}
                {{Form::text('phone', null, [
                    'class' => 'form-control',
                    'placeholder' => 'Ex: +5511912345678'
                ])}}
            </div>
                
            <div class="form-group">
                {{Form::label('description', 'Descrição da Loja:')}}
                {{Form::textarea('description', null, [
                    'class' => 'form-control',
                    'placeholder' => 'Descreva sua loja, fale dos produtos oferecidos, promoções, etc...',
                    'rows' => 5
                ])}}
            </div>
            <div class="form-group">
                <div class="row form-spacing-top">
                    <div class="col-xs-6">
                        <a href="{{route('lojas.index')}}" class="btn btn-default pull-right btn-block">Cancelar</a>
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