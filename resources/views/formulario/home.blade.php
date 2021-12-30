@extends('adminlte::page')

@section('meta_tags')
<link rel="icon" href="/img/favicon.svg" type="image/svg">
@stop

@section('title', 'Formulário - Superlógica')

@section('content_header')
<h1>Formulário</h1>
@stop

@section('content')

<div class="card">
    <div class="card-header">
        Cadastrar novo usuário
    </div>
    <div class="card-body">
        <form method="post" id="formStoreUser">
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="name">Nome:</label>
                        <input required class="form-control" type="text" id="name" name="name" placeholder="Nome completo">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="userName">Login:</label>
                        <input required class="form-control" type="text" id="userName" name="userName" placeholder="Informe o login desejado">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="zipCode">CEP <span class="badge badge-success zipCodeResp" style="display: none; margin-left: 10px"></span></label>
                        <input required class="form-control zip_code" type="text" id="zipCode" name="zipCode" minlength="9" placeholder="Ex: 29550-000">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="email">Email:</label>
                        <input required class="form-control" type="email" id="email" name="email" placeholder="Informe seu melhor email">
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="form-group">
                        <label for="password">Senha:</label>
                        <input required class="form-control" type="password" id="password" minlength="8" name="password" placeholder="8 caracteres no mínimo, contendo pelo menos 1 letra e 1 número">
                        <ul id="list-errors" style="padding-left: 16px; margin-top: 10px;"></ul>
                    </div>
                </div>
                <div class="col-md-12">
                    <input class="btn btn-primary" type="submit" value="Cadastrar" form="formStoreUser">
                </div>
            </div>
        </form>
    </div>
</div>

<div class="card">
    <div class="card-header">
        Usuários cadastrados
    </div>
    <div class="card-body">
        <table class="table" id="table">
            <thead>
                <tr>
                    <th>Nome</th>
                    <th>Login</th>
                    <th>Email</th>
                    <th>CEP</th>
                    <th></th>
                </tr>
            </thead>
            <tbody id="list"></tbody>
        </table>
    </div>
</div>

@stop

@section('js')
<script src="/js/formulario/home.js"></script>
@stop