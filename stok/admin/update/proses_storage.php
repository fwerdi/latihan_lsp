<?php
if (isset($_POST['update'])) {
    include "koneksi.php";

    $id_gudang = $_POST['id_gudang'];
    $nama_gudang = $_POST['nama_gudang'];
    $lokasi_gudang = $_POST['lokasi_gudang'];
    $id = $_POST['id'];


 
    $stmt = $conn->prepare("UPDATE storage SET nama_gudang = ?, lokasi_gudang = ?, id = ?  WHERE id_gudang = ?");
    $stmt->bind_param("issi", $nama_gudang, $lokasi_gudang, $id, $id_gudang);

    if ($stmt->execute()) {
        echo "<script>alert('Sukses update vendor');location.href='../';</script>";
    } else {
        echo "<script>alert('Gagal update vendor: " . $stmt->error . "');location.href='edit.php?id_gudang=$id_gudang';</script>";
    }

    $stmt->close();
    $conn->close();
}
?>
