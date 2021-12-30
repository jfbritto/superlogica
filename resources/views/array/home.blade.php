@extends('adminlte::page')

@section('meta_tags')
<link rel="icon" href="/img/favicon.svg" type="image/svg">
@stop

@section('title', 'Array - Superlógica')

@section('content_header')
<h1>Array</h1>
@stop

@section('content')

<label>Crie um array</label><br>
<code>$array = [];</code>
<hr>

<label>Popule este array com 7 números</label><br>
<code>$array = [100,25,34,14,35,46,67];</code>
<hr>

<label>Imprima o número da terceira posição do array</label><br>
<code>echo $array[2];</code>
<hr>

<label>Crie uma variável com todos os itens do array no formato de string separado por vírgula</label><br>
<code>$array_string = implode(",", $array);</code>
<hr>

<label>Crie um novo array a partir da variável no formato de string que foi criada e destrua o array anterior</label><br>
<code>$array_new = explode(",",$array_string);</code><br>
<code>unset($array);</code>
<hr>

<label>Crie uma condição para verificar se existe o valor 14 no array </label><br>
<code>
    if (in_array(14, $array_new)) {<br>
    &nbsp;&nbsp;echo "Sim!";<br>
    }<br>
</code>
<hr>

<label>Faça uma busca em cada posição. Se o número da posição atual for menor que o da posição anterior (valor anterior que não foi excluído do array ainda), exclua esta posição</label><br>
<code>
    for ($i=count($array_new); $i > 0; $i--) { <br>

    &nbsp;&nbsp;if ($i != count($array_new)) {<br>
    &nbsp;&nbsp;&nbsp;&nbsp;if($array_new[($i)] < $array_new[($i-1)]) {<br>
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;unset($array_new[($i)]);<br>
        &nbsp;&nbsp;&nbsp;&nbsp;}<br>
        &nbsp;&nbsp;}<br>
        }<br>
</code>
<hr>

<label>Remova a última posição deste array</label><br>
<code>array_pop($array_new);</code>
<hr>

<label>Conte quantos elementos tem neste array</label><br>
<code>echo count($array_new);</code>
<hr>

<label>Inverta as posições deste array</label><br>
<code>array_reverse($array_new);</code>
<hr>

<p>Para acessar a lógica usada, vá para o arquivo <strong>ArrayController.php</strong> na função <strong>index</strong> </p>
<hr>

<a target="_blank" href="/array/exemplo" class="btn btn-success btn-block btn-lg">Veja o exemplo</a>
<hr>

@stop