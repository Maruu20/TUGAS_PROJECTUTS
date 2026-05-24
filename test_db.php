<?php
include "koneksi.php";

echo "<h2>===== DATABASE DIAGNOSTIC =====</h2>";

// Test 1: Cek koneksi
echo "<h3>1. Status Koneksi</h3>";
if ($koneksi->connect_error) {
    echo "<span style='color:red;'><strong>✗ GAGAL: " . $koneksi->connect_error . "</strong></span>";
} else {
    echo "<span style='color:green;'><strong>✓ BERHASIL: Database terhubung</strong></span>";
}

// Test 2: Cek tabel tb_dosen
echo "<h3>2. Cek Tabel tb_dosen</h3>";
$result = $koneksi->query("SHOW TABLES LIKE 'tb_dosen'");
if ($result && $result->num_rows > 0) {
    echo "<span style='color:green;'><strong>✓ BERHASIL: Tabel tb_dosen ditemukan</strong></span>";
} else {
    echo "<span style='color:red;'><strong>✗ GAGAL: Tabel tb_dosen TIDAK ditemukan!</strong></span>";
}

// Test 3: Cek struktur field
echo "<h3>3. Struktur Field Tabel tb_dosen</h3>";
$result = $koneksi->query("DESCRIBE tb_dosen");
if ($result && $result->num_rows > 0) {
    echo "<table border='1' cellpadding='10'>";
    echo "<tr><th>Field</th><th>Type</th><th>Null</th><th>Key</th><th>Default</th><th>Extra</th></tr>";
    while ($row = $result->fetch_assoc()) {
        echo "<tr>";
        echo "<td>" . htmlspecialchars($row['Field']) . "</td>";
        echo "<td>" . htmlspecialchars($row['Type']) . "</td>";
        echo "<td>" . htmlspecialchars($row['Null']) . "</td>";
        echo "<td>" . htmlspecialchars($row['Key']) . "</td>";
        echo "<td>" . htmlspecialchars($row['Default']) . "</td>";
        echo "<td>" . htmlspecialchars($row['Extra']) . "</td>";
        echo "</tr>";
    }
    echo "</table>";
} else {
    echo "<span style='color:red;'><strong>Error: " . $koneksi->error . "</strong></span>";
}

// Test 4: Test INSERT dengan debug
echo "<h3>4. Test INSERT Data</h3>";
if (isset($_POST['test_insert'])) {
    $test_nidn = "999999";
    $test_nama = "Test Dosen";
    $test_email = "test@test.com";
    $test_jenis_kelamin = "Laki-laki";
    $test_telepon = "08123456789";
    
    $stmt = $koneksi->prepare("INSERT INTO tb_dosen (nidn, nama, email, jenis_kelamin, telepon) VALUES (?, ?, ?, ?, ?)");
    
    if (!$stmt) {
        echo "<span style='color:red;'><strong>✗ PREPARE ERROR: " . $koneksi->error . "</strong></span>";
    } else {
        $stmt->bind_param("sssss", $test_nidn, $test_nama, $test_email, $test_jenis_kelamin, $test_telepon);
        
        if ($stmt->execute()) {
            echo "<span style='color:green;'><strong>✓ BERHASIL: Test data berhasil disimpan!</strong></span>";
        } else {
            echo "<span style='color:red;'><strong>✗ EXECUTE ERROR: " . $stmt->error . "</strong></span>";
        }
        $stmt->close();
    }
} else {
    echo "<form method='POST'>";
    echo "<button type='submit' name='test_insert' class='btn btn-primary'>Test INSERT Data</button>";
    echo "</form>";
}

// Test 5: Cek data existing
echo "<h3>5. Data Dosen yang Ada</h3>";
$result = $koneksi->query("SELECT * FROM tb_dosen");
if ($result && $result->num_rows > 0) {
    echo "<table border='1' cellpadding='10'>";
    echo "<tr><th>NIDN</th><th>Nama</th><th>Email</th><th>Jenis Kelamin</th><th>Telepon</th></tr>";
    while ($row = $result->fetch_assoc()) {
        echo "<tr>";
        echo "<td>" . htmlspecialchars($row['nidn']) . "</td>";
        echo "<td>" . htmlspecialchars($row['nama']) . "</td>";
        echo "<td>" . htmlspecialchars($row['email']) . "</td>";
        echo "<td>" . htmlspecialchars($row['jenis_kelamin']) . "</td>";
        echo "<td>" . htmlspecialchars($row['telepon']) . "</td>";
        echo "</tr>";
    }
    echo "</table>";
} else {
    echo "<span style='color:orange;'><strong>ℹ Tidak ada data atau error: " . $koneksi->error . "</strong></span>";
}

echo "<h3><a href='dosen.php'>← Kembali ke Data Dosen</a></h3>";
?>
