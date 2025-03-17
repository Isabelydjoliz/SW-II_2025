<?php

function fatorial($num) {
    if ($num < 0) {
        return "Não existe fatorial de números negativos.";
    }
    if ($num == 0 || $num == 1) {
        return 1;
    }
    
    $resultado = 1;
    for ($i = $num; $i >= 2; $i--) {
        $resultado *= $i;
    }
    
    return $resultado;
}

// Exemplo de uso
echo "Fatorial de 5: " . fatorial(5) . "<br>"; 
echo "Fatorial de 7: " . fatorial(7) . "<br>"; 

?>