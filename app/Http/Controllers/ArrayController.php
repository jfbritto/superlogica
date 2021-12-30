<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ArrayController extends Controller
{
    public function index()
    {
        // criando array
        $array = [];

        // populando array
        $array = [100, 25, 34, 14, 35, 46, 67];

        // 3ª posição
        $posicao_3 = $array[2];

        // transformando em string
        $array_string = implode(",", $array);

        // criando novo array a partir da string
        $array_new = explode(",", $array_string);

        //destruindo array anterio
        unset($array);

        // verifica se existe o valor 14
        if (in_array(14, $array_new)) {
            // echo "Sim!";
        }

        // verifica se o proximo numero é menor que o anterior e os remove
        for ($i = count($array_new); $i > 0; $i--) {

            if ($i != count($array_new)) {
                if ($array_new[($i)] < $array_new[($i - 1)]) {
                    $drop_after[] = $array_new[($i)];
                    unset($array_new[($i)]);
                }
            }
        }

        // remove a ultima posição do array
        array_pop($array_new);

        // total de posições
        $array_new_count = count($array_new);

        // invertendo array
        $array_new = array_reverse($array_new);

        return view('array.home');
    }

    public function exemplo()
    {
        echo "<pre>";

        echo "CRIANDO ARRAY <br>";
        $array = [];
        print_r($array);

        echo "<br><br>POPULANDO ARRAY <br>";
        $array = [100, 25, 34, 14, 35, 46, 67];
        print_r($array);

        echo "<br><br>3ª POSIÇÃO <br>";
        $posicao_3 = $array[2];
        print_r($posicao_3);

        echo "<br><br>TRANSFORMANDO EM STRING <br>";
        $array_string = implode(",", $array);
        print_r($array_string);

        echo "<br><br>CRIANDO NOVO ARRAY A PARTIR DA STRING <br>";
        $array_new = explode(",", $array_string);
        print_r($array_new);

        echo "<br><br>DESTRUINDO ARRAY ANTERIOR";
        unset($array);

        echo "<br><br>VERIFICA SE EXISTE O VALOR 14 <br>";
        if (in_array(14, $array_new)) {
            echo "Sim!";
        }

        echo "<br><br>VERIFICA SE O PROXIMO NÚMERO É MENOR QUE O ANTERIOR E O REMOVE <br>";
        for ($i = count($array_new); $i > 0; $i--) {
            if ($i != count($array_new)) {
                if ($array_new[($i)] < $array_new[($i - 1)]) {
                    $drop_after[] = $array_new[($i)];
                    unset($array_new[($i)]);
                }
            }
        }

        echo "REMOVIDOS OS NÚMEROS: <br>";
        print_r($drop_after);
        echo "RESULTADO: <br>";
        print_r($array_new);

        echo "<br><br>REMOVE A ÚLTIMA POSIÇÃO DO ARRAY <br>";
        array_pop($array_new);
        print_r($array_new);

        echo "<br><br>TOTAL DE POSIÇÕES <br>";
        $array_new_count = count($array_new);
        print_r($array_new_count);

        echo "<br><br>INVERTENDO ARRAY <br>";
        $array_new = array_reverse($array_new);
        print_r($array_new);

        return response('');
    }
}
