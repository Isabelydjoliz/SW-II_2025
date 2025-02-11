<?php  
$nota1 = 8;
$nota2 = 7;
$nota3 = 9;
echo "Nota 1: " . "$nota1" . "<br>";
echo "Nota 2: " .  "$nota2" . "<br>";
echo "Nota 3: " .  "$nota3" . "<br>" . "<br>";
$somamedia = $nota1 + $nota2 + $nota3;
$media =  $somamedia / 3;
if ($media >= 5) {
echo "Média: " . "$media" . " Aprovado!";
} else {
echo "Média: " . "$media" . " Reprovado!";

}
?>
