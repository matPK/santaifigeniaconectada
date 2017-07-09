<?php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/*
 * This is the lojista.blade view.
 * 
 * @author: Matheus.
 * 
 * @created_at: 27/06/2017.
 */
?>

@extends('main')

@section('styles')
<!-- insert below the custom stylesheets this view will use -->

@endsection

@section('title', '| Área do Lojista')

@section('content')
<!-- content goes below -->

<div class="row">
    <div class="col-xs-12 col-sm-6 col-md-4 col-lg-3">
        @include('partials._lojnav')
    </div>
    <div class="col-xs-12 col-sm-6 col-md-8 col-lg-9">
        <div class="panel panel-default">
            <div class="panel-heading">
                <div class="panel-title">Seus Ativos</div>
            </div>
            <table class="table">
                <tbody>
                    <tr>
                        <th>
                            Lojas
                        </th>
                        <td class="text-left">
                            {{$stores_count}}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            Produtos
                        </th>
                        <td class="text-left">
                            {{$products_count}}
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection

@section('scripts')
<!-- insert below the custom scripts this view will use -->
@endsection