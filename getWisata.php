<?php
// Koneksi ke database
$connect = mysqli_connect("localhost", "root", "", "json");

// Query untuk mengambil semua data dari tabel wisata
$sql = "SELECT * FROM wisata";
$result = mysqli_query($connect, $sql);

// Membuat array kosong untuk menampung data
$json_array = array();

// Mengisi array dengan data dari database
while($row = mysqli_fetch_assoc($result)) {
    $json_array[] = $row;
}

// Mengonversi array PHP ke format JSON
echo json_encode($json_array);
?>