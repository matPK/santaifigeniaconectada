@extends('main')

@section('title', '| Login')

@section('styles')
<!-- insert below the custom stylesheets this view will use -->
{!! Html::style('css/login.css') !!}
{!! Html::style('css/forms.css') !!}
@endsection

@section('content')
<div class="col-xs-12 col-sm-6 col-sm-offset-3 col-md-4 col-md-offset-4">
    <div id="login-box" class="white_panel-card panel panel-default">
        <div class="login_title text-center">ÁREA RESTRITA</div>
        <div class="panel-body">
            {!! Form::open() !!}
                <div class="form-group">
                    {{Form::label('email', 'Email:')}}
                    {{Form::email('email', null, [
                        'class' => 'form-control',
                        'placeholder' => 'exemplo@dominio.com...',
                        'required' => 'required'
                    ])}}
                </div>

                <div class="form-group">
                    {{Form::label('password', 'Senha:')}}
                    {{Form::password('password', [
                        'class' => 'form-control',
                        'required' => 'required'
                    ])}}
                    <a href="{{url('password/reset')}}">Esqueceu sua Senha?</a>
                </div>


                <div class="checkbox">
                    <label for="remember">
                        <input type="checkbox" value="1" id="remember" name="remember">
                        Lembrar de mim
                    </label>
                </div>
                {{Form::submit('Entrar', ['class' => 'btn btn-primary btn-block'])}}
                <a class="btn btn-block" href="{{route('register')}}">Cadastre-se</a>
            {!! Form::close() !!}
        </div>
    </div>
</div>
@endsection

@section('scripts')

@endsection