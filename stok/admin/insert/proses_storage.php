<?php
if(isset($_POST['simpan'])){
    $id_gudang = $_POST['id_gudang'];
    $nama_gudang = $_POST['nama_gudang'];
    $lokasi_gudang = $_POST['lokasi_gudang'];
    $id = $_POST['id'];
    $serial_number = $_POST['serial_number'];
    $id = $_POST['id'];

    include "koneksi.php";

    $stmt = $conn->prepare("INSERT INTO storage ( id_gudang, nama_gudang, lokasi_gudang, id) VALUES (?, ?, ?, ?)");
    
    if ($stmt === false) {
        die("Prepare failed: " . $conn->error);
    }

    $stmt->bind_param("issi", $id_gudang, $nama_gudang, $lokasi_gudang, $id);
        
        if ($stmt->execute()) {
            echo "<script>alert('Sukses menambah ruang');location.href='../index.php';</script>";
        } else {
            echo "<script>alert('Gagal menambah ruang');location.href='../index.php';</script>"; 
        }
}