@extends('adminlte::page')

@section('meta_tags')
<link rel="icon" href="/img/favicon.svg" type="image/svg">

<meta property="og:url" content="{{env('APP_URL')}}" />
<meta property="type" content="website" />
<meta property="og:title" content="Superlógica">
<meta property="og:description" content="Teste">
<meta property="og:image" content="/img/logo.jpg">
<meta property="og:locale" content="pt_BR">
<meta property="og:image:type" content="image/jpg">
<meta property="og:image:width" content="640">
<meta property="og:image:height" content="480">
@stop

@section('title', 'Superlógica')

@section('content_header')
<h1>Teste Superlógica</h1>
@stop

@section('content')
<p>No menu lateral estão disponíveis as respostas dos exercícios propostos.</p>
@stop

@section('js')

@stop