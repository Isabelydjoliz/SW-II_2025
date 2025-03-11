<?php

function geranum(){
    //vetor vazio
    $vetor = array();
    //laço for de 10 numeros aleatorios
    for($i=0; $i <= 9 ; $i++) {
        //adicionar 10 numeros aleatorios
        $vetor[$i] =  rand (0,100);
    }
    //retorna com vetor preenchido
    return $vetor;
}

$recebe_vetor = geranum();
print_r($recebe_vetor);

?>