<?php

function tabuada($num) {
    echo "Tabuada do $num:<br>";
    for ($i = 1; $i <= 10; $i++) {
        echo "$num x $i = " . ($num * $i) . "<br>";
    }
}


tabuada(5); 

?>