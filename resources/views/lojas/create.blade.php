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
    {!! Html::style('css/forms.css') !!}
@endsection

@section('title', '| Nova Loja')

@section('content')
<!-- content goes below -->
<h2 class="form-title">Cadastrar Loja</h2>
<div class="row">
    <div class="col-xs-12 col-sm-10 col-sm-offset-1 col-md-8 col-md-offset-2 col-lg-6 col-lg-offset-3">
        {!! Form::open(
            array(
                'route' => 'lojas.store', 
                'class' => 'form',
                'files' => true)) !!}

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
                {{Form::label('logo_file', 'Foto da Loja')}}
                {{Form::file('logo_file', ['class' => 'form-control', 'required' => true])}}
                <span class="text-muted">Um logotipo ou foto da loja</span>
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
                {{Form::submit('Cadastrar', ['class' => 'btn btn-block btn-primary form-spacing-top'])}}
            </div>
        {!! Form::close() !!}
    </div>
</div>
@endsection

@section('scripts')
<!-- insert below the custom scripts this view will use -->
@endsection