<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FORM NILAI</title>
</head>
<body>

    <h1>Form Nilai</h1>
    <form method="POST" action="">

<div>
    <label>Nama Mahasiswa:</label>
        <input type="text" name="Nama"/>
</div>
<div>
    <label>NIM:</label>
        <input type="text" name="Nim"/>
</div>
<div>
    <label>Jurusan:</label>
        <input type="text" name="Jurusan"/>
</div>
<div>
    <label>Input Nilai</label>
        <input type="number" name="nilai" />
</div>
        <button type="submit" name="Proses">Proses</button>
    </form>

    <?php
    
    if (isset($_POST['Proses'])) {
        $nama = $_POST['Nama'];
        $nim = $_POST['Nim'];
        $jurusan = $_POST['Jurusan'];
        $nilai = $_POST['nilai'];

        echo "<br><br>";
        
        echo "Nama Mahasiswa: $nama <br>";
        echo "NIM: $nim <br>";
        echo "Jurusan: $jurusan <br>";
        echo "Nilai: $nilai <br>";

        if ($nilai >= 90) {
            echo "Grade = A, Sangat Baik";
        } elseif ($nilai >= 80) {
            echo "Grade = B, Baik";
        } elseif ($nilai >= 70) {
            echo "Grade = C, Cukup";
        } elseif ($nilai >= 60) {
            echo "Grade = D, Kurang";
        } else {
            echo "Grade = E, Anda Tidak Lulus";
        }
    }
    
    ?>

</body>
</html>