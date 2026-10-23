<?php
require_once 'koneksi.php';

header('Content-Type: application/json; charset=utf-8');

$sql = "SELECT bulan, jumlah FROM grafik_data ORDER BY urutan ASC";
$result = mysqli_query($conn, $sql);

if (!$result) {
    http_response_code(500);
    echo json_encode([
        'error' => mysqli_error($conn)
    ]);
    exit;
}

$data = [];

while ($row = mysqli_fetch_assoc($result)) {
    $data[] = [
        'bulan' => $row['bulan'],
        'jumlah' => (int) $row['jumlah']
    ];
}

echo json_encode($data);