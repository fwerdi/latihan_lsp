<?php
if(isset($_POST['simpan'])){
    $nama_barang = $_POST['nama_barang'];
    $jenis_barang = $_POST['jenis_barang'];
    $kuantitas_stok = $_POST['kuantitas_stok'];
    $lokasi_gudang = $_POST['lokasi_gudang'];
    $serial_number = $_POST['serial_number'];
    $harga = $_POST['harga'];
    $id = $_POST['id'];

    include "koneksi.php";

    $stmt = $conn->prepare("INSERT INTO inventory ( nama_barang, jenis_barang, kuantitas_stok, lokasi_gudang, serial_number, harga, id) VALUES (?, ?, ?, ?, ?, ?, ?)");
    
    if ($stmt === false) {
        die("Prepare failed: " . $conn->error);
    }

    $stmt->bind_param("ssisisi", $nama_barang, $jenis_barang, $kuantitas_stok, $lokasi_gudang, $serial_number, $harga, $id);
        
        if ($stmt->execute()) {
            echo "<script>alert('Sukses menambah data');location.href='../index.php';</script>";
        } else {
            echo "<script>alert('Gagal menambah data');location.href='../index.php';</script>"; 
        }
}




 