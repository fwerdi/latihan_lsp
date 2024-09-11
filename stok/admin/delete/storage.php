<?php
$con = mysqli_connect('localhost', 'root', '', 'stok');

if (isset($_GET['id_gudang'])) {
    $id_gudang = $_GET['id_gudang'];

    $stmt = $con->prepare("DELETE FROM storage WHERE id_gudang = ?");
    if ($stmt === false) {
        die("Prepare failed: " . $con->error);
    }

    $stmt->bind_param("i", $id_gudang);
    if ($stmt->execute()) {
        header("Location: ../");
        exit(); 
    } else {
        echo "Hapus Gagal: " . $stmt->error;
    }
    $stmt->close();
} else {
    echo "ID Tidak Ditemukan";
}
?>