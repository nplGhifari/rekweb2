<?php
// Fungsi untuk mengambil data dari URL menggunakan curl
function curl($url){
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    $output = curl_exec($ch);
    curl_close($ch);
    return $output;
}

// Mengambil data JSON dari file getWisata.php
$send = curl("http://localhost/json/getWisata.php");

// Mengonversi JSON menjadi array PHP
$data = json_decode($send, TRUE);

// Menampilkan data
foreach($data as $row){
    echo $row["id_wisata"]."<br/>";
    echo $row["kota"]."<br/>";
    echo $row["landmark"]."<br/>";
    echo $row["tarif"]."<br/><hr/>";
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Data Wisata</title>
    <style>
        table {
            border-collapse: collapse;
            width: 50%;
        }
        th, td {
            border: 1px solid black;
            padding: 8px;
            text-align: left;
        }
        th {
            background-color: #f2f2f2;
        }
    </style>
</head>
<body>
    <h2>Data Tempat Wisata</h2>
    <table>
        <tr>
            <th>KOTA</th>
            <th>LANDMARK</th>
            <th>TARIF</th>
        </tr>
        <?php foreach($data as $row): ?>
        <tr>
            <td><?php echo $row["kota"]; ?></td>
            <td><?php echo $row["landmark"]; ?></td>
            <td><?php echo $row["tarif"]; ?></td>
        </tr>
        <?php endforeach; ?>
    </table>
</body>
</html>