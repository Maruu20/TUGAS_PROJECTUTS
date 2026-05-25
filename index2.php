<?php

     echo "<h1>Hallo PHP</h1>";

     $nama = "<h2>Maru</h2>";
     echo $nama;

     $n1 = 18;
     $n2 = 8;

     echo "<br>Hasil Perkalian = ". $n1 * $n2;
     echo "<br> Hasil penjumlahan = ";
     echo $n1 + $n2;
     echo "<br> Hasil pengurangan = ";
     echo $n1 - $n2;
     echo "<br>Hasil Pembagian = ". $n1 / $n2;

    $operator = "kali";
    if ($operator == "tambah") {
        echo "<br>Hasil penjumlahan = ". $n1 + $n2;

    }else if($operator == "kurang") {
        echo "<br>Hasil Pengurangan = ". $n1 - $n2;

    }else if($operator == "kali") {
        echo "<br>Hasil Perkalian = ". $n1 * $n2;

    }else if($operator == "bagi") {
        echo "<br>Hasil Pembagian = ". $n1 / $n2;
    }


     echo "<br> <br>";
     for ($i=1; $i <= 10; $i++) {
        echo "<br> Perulangan For Ke - ".$i;
     }

     echo "<br> <br>";
     $i = 1;
     while ($i <= 10) {
        echo "<br> Perulangan While Ke - ".$i;
        $i++;
     }
?>

<h2><?php echo "hello world 2"; ?></h2>