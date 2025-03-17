<?php
function parouimpar($num) {
    return ($num % 2 == 0) ? "Par" : "Ímpar";
}

echo "O número 7 é: " . parouimpar(7) . "<br>";
echo "O número 8 é: " . parouimpar(8) . "<br>"; 

?>