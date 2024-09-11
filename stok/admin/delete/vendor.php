<?php
$con = mysqli_connect('localhost', 'root', '', 'stok');

if (isset($_GET['id_vendor'])) {
    $id_vendor = $_GET['id_vendor'];

    $stmt = $con->prepare("DELETE FROM vendor WHERE id_vendor = ?");
    if ($stmt === false) {
        die("Prepare failed: " . $con->error);
    }

    $stmt->bind_param("i", $id_vendor);
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