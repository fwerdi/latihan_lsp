<?php
$con = mysqli_connect('localhost', 'root', '', 'stok');

if (isset($_GET['nama_barang'])) {
    $nama_barang = $_GET['nama_barang'];

    $stmt = $con->prepare("DELETE FROM inventory WHERE nama_barang = ?");
    if ($stmt === false) {
        die("Prepare failed: " . $con->error);
    }

    $stmt->bind_param("s", $nama_barang);
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