@extends('adminlte::page')

@section('meta_tags')
<link rel="icon" href="/img/favicon.svg" type="image/svg">
@stop

@section('title', 'SQL - Superlógica')

@section('content_header')
<h1>SQL</h1>
@stop

@section('content')

<div class="row">
    <div class="col-md-6">
        <label>Criando e selecionando banco de dados</label><br>
        <code>
            CREATE DATABASE `superlogica`;<br>
            USE `superlogica`;
        </code>
    </div>
</div>

<hr>

<div class="row">
    <div class="col-md-6">
        <label>Criando tabela `usuario`</label><br>
        <code>
            CREATE TABLE `usuario` (<br>
            &nbsp;&nbsp;`id` int(11) NOT NULL AUTO_INCREMENT,<br>
            &nbsp;&nbsp;`cpf` varchar(45) DEFAULT NULL,<br>
            &nbsp;&nbsp;`nome` varchar(45) DEFAULT NULL,<br>
            &nbsp;&nbsp;PRIMARY KEY (`id`)<br>
            );<br>
        </code>
    </div>
    <div class="col-md-6">
        <label>Populando tabela `usuario`</label><br>
        <code>
            INSERT INTO usuario (id, cpf, nome) VALUES<br>
            (1,'16798125050','Luke Skywalker'),<br>
            (2,'59875804045','Bruce Wayne'),<br>
            (3,'04707649025','Diane Prince'),<br>
            (4,'21142450040','Bruce Banner'),<br>
            (5,'83257946074','Harley Quinn'),<br>
            (6,'07583509025','Peter Parker');<br>
        </code>
    </div>
</div>

<hr>

<div class="row">
    <div class="col-md-6">
        <label>Criando tabela `info`</label><br>
        <code>
            CREATE TABLE `info` (<br>
            &nbsp;&nbsp;`id` int(11) NOT NULL AUTO_INCREMENT,<br>
            &nbsp;&nbsp;`cpf` varchar(45) NOT NULL,<br>
            &nbsp;&nbsp;`genero` char(1) DEFAULT NULL,<br>
            &nbsp;&nbsp;`ano_nascimento` varchar(10) DEFAULT NULL,<br>
            &nbsp;&nbsp;PRIMARY KEY (`id`)<br>
            );<br>
        </code>
    </div>
    <div class="col-md-6">
        <label>Populando tabela `info`</label><br>
        <code>
            INSERT INTO info (id, cpf, genero, ano_nascimento) VALUES<br>
            (1,'16798125050','M','1976'),<br>
            (2,'59875804045','M','1960'),<br>
            (3,'04707649025','F','1988'),<br>
            (4,'21142450040','M','1954'),<br>
            (5,'83257946074','F','1970'),<br>
            (6,'07583509025','M','1972');<br>
        </code>
    </div>
</div>

<hr>

<div class="row">
    <div class="col-md-12">
        <label>Joinando tabela `usuario` com a tabela `info` a partir da coluna `cpf` e verificando quais usuários tem mais de 50 anos de idade</label><br>
        <code>
            SELECT <br>
            &nbsp;&nbsp;&nbsp;concat(usu.nome,' - ', inf.genero) as nome, <br>
            &nbsp;&nbsp;&nbsp;if((extract(year from now())-inf.ano_nascimento) > 50, 'S','N') as maior_50_anos<br>
            FROM<br>
            &nbsp;&nbsp;&nbsp;usuario usu<br>
            &nbsp;&nbsp;&nbsp;JOIN info inf ON usu.cpf = inf.cpf<br>
        </code>
    </div>
</div>

@stop