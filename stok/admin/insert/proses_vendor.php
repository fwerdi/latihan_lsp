<?php
if(isset($_POST['simpan'])){
    $id_vendor = $_POST['id_vendor'];
    $nama = $_POST['nama'];
    $kontak = $_POST['kontak'];
    $nama_barang = $_POST['nama_barang'];
    $id = $_POST['id'];
    $id_gudang = $_POST['id_gudang'];


    include "koneksi.php";

    $stmt = $conn->prepare("INSERT INTO vendor (id_vendor, nama, kontak, nama_barang, id, id_gudang) VALUES (?, ?, ?, ?, ?, ?)");
    
    if ($stmt === false) {
        die("Prepare failed: " . $conn->error);
    }

    $stmt->bind_param("isssii", $id_vendor, $nama, $kontak, $nama_barang, $id, $id_gudang);
        
        if ($stmt->execute()) {
            echo "<script>alert('Sukses menambah data');location.href='../index.php';</script>";
        } else {
            echo "<script>alert('Gagal menambah data');location.href='../index.php';</script>"; 
        }
}