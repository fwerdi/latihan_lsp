<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="bootstrap.min.css">
</head>
<body>
    <h3>Tambah Inventory</h3>
        <form action ="proses_inventory.php" method ="post">
            Nama Barang: 
            <input type="text" name="nama_barang" value="" class="form-control">
            Jenis Barang: 
            <input type="text" name="jenis_barang" value="" class="form-control">
            Kuantitas Stok: 
            <input type="text" name="kuantitas_stok" value="" class="form-control">
            Lokasi Gudang: 
            <input type="text" name="lokasi_gudang" value="" class="form-control">
            Serial Number: 
            <input type="text" name="serial_number" value="" class="form-control">
            Harga: 
            <input type="text" name="harga" value="" class="form-control">
            Id Admin: 
            <input type="text" name="id" value="" class="form-control">
            <class="form-control">
            <input type="submit" name="simpan" value="Tambah User" class="btn btn-primary">
            
            
</body>
</html>