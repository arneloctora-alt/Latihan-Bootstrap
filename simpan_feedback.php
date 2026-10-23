
<?php
header('Content-Type: application/json; charset=utf-8');

require_once 'koneksi.php';

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    http_response_code(405);
    echo json_encode([
        'success' => false,
        'message' => 'Metode permintaan tidak diizinkan.'
    ]);
    exit;
}

$nama  = trim($_POST['nama'] ?? '');
$email = trim($_POST['email'] ?? '');
$pesan = trim($_POST['pesan'] ?? '');

if ($nama === '' || $email === '' || $pesan === '') {
    http_response_code(400);
    echo json_encode([
        'success' => false,
        'message' => 'Semua kolom wajib diisi.'
    ]);
    exit;
}

if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    http_response_code(400);
    echo json_encode([
        'success' => false,
        'message' => 'Format email tidak valid.'
    ]);
    exit;
}

$stmt = mysqli_prepare(
    $conn,
    "INSERT INTO feedback (nama, email, pesan) VALUES (?, ?, ?)"
);

if (!$stmt) {
    http_response_code(500);
    echo json_encode([
        'success' => false,
        'message' => 'Gagal menyiapkan penyimpanan feedback.'
    ]);
    exit;
}

mysqli_stmt_bind_param($stmt, "sss", $nama, $email, $pesan);

if (mysqli_stmt_execute($stmt)) {
    echo json_encode([
        'success' => true,
        'message' => 'Feedback kamu berhasil terkirim. Terima kasih sudah memberikan masukan untuk PKMB Tangkil!'
    ]);
} else {
    http_response_code(500);
    echo json_encode([
        'success' => false,
        'message' => 'Feedback gagal disimpan. Silakan coba kembali.'
    ]);
}

mysqli_stmt_close($stmt);
?>
