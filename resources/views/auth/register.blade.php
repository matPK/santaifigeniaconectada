<?php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/*
 * This is the register.blade view.
 * 
 * @author Matheus
 * 
 * @created at 21/06/2017
 */
?>

@extends('main')

@section('styles')
<!-- insert below the custom stylesheets this view will use -->
{!! Html::style('css/login.css') !!}
{!! Html::style('css/forms.css') !!}
@endsection

@section('title', 'title_here')

@section('content')
<!-- content goes below -->
<div class="row">
    <div class="col-lg-4 col-lg-offset-4 col-sm-6 col-sm-offset-3">
        <div id="login-box" class="panel panel-default">
            <div class="panel-body">
            {!! Form::open() !!}
                <div class="form-group">
                    {{ Form::label('email', 'E-mail:') }}
                    {{ Form::email('email', null, [
                        'class' => 'form-control',
                        'placeholder' => 'exemplo@domínio.com'
                    ]) }}
                    <span class="text-muted">Será sua conta de usuário</span>
                </div>
            
                <div class="form-group">
                    {{ Form::label('name', 'Nome:') }}
                    {{ Form::text('name', null, [
                        'class' => 'form-control',
                        'placeholder' => 'José da Silva'
                    ]) }}
                    <span class="text-muted">Como devemos chamá-lo?</span>
                </div>
            
                <div class="form-group">
                    {{ Form::label('password', 'Senha:') }}
                    {{ Form::password('password', ['class' => 'form-control']) }}
                </div>
                <div class="form-group">
                    {{ Form::label('password_confirmation', 'Confirmar Senha:') }}
                    {{ Form::password('password_confirmation', ['class' => 'form-control']) }}
                </div>
                {{ Form::submit('Registrar', ['class' => 'btn btn-primary btn-block form-spacing-top']) }}
            {!! Form::close() !!}
            </div>
        </div>
    </div>
</div>
@endsection

@section('scripts')
<!-- insert below the custom scripts this view will use -->
@endsection