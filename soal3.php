<?php
$jumlah = 21;
for ($a = 1; $a <= $jumlah; $a++) {
    for ($b = 1; $b <= $a; $b++) {
        echo '&nbsp';
    }

    for ($c = $jumlah; $c >= $a; $c -= 1) {
        if ($jumlah % 2 == 1) {
            echo '*';
        } else {
            echo '&nbsp';
        }

    }
    echo "<br/>";
}
?>