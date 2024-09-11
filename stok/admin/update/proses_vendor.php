<?php
if (isset($_POST['update'])) {
    include "koneksi.php";

    $id_vendor = $_POST['id_vendor'];
    $nama = $_POST['nama'];
    $kontak = $_POST['kontak'];
    $nama_barang = $_POST['nama_barang'];
    $id = $_POST['id'];
    $id_gudang = $_POST['id_gudang'];

    $stmt_check = $conn->prepare("SELECT COUNT(*) FROM inventory WHERE nama_barang = ?");
    $stmt_check->bind_param("s", $nama_barang);
    $stmt_check->close();

 
    $stmt = $conn->prepare("UPDATE vendor SET nama = ?, kontak = ?, nama_barang = ?, id = ?, id_gudang = ? WHERE id_vendor = ?");
    $stmt->bind_param("sssiii", $nama, $kontak, $nama_barang, $id, $id_gudang, $id_vendor);

    if ($stmt->execute()) {
        echo "<script>alert('Sukses update vendor');location.href='../';</script>";
    } else {
        echo "<script>alert('Gagal update vendor: " . $stmt->error . "');location.href='edit.php?id_vendor=$id_vendor';</script>";
    }

    $stmt->close();
    $conn->close();
}
?>
