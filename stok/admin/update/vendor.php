<?php

$nama = $kontak = $nama_barang = $id = $id_gudang = "";
$id_vendor = $_GET['id_vendor'] ?? null;

if ($id_vendor) {
    include "koneksi.php";
    
    $stmt = $conn->prepare("SELECT nama, kontak, nama_barang, id, id_gudang FROM vendor WHERE id_vendor = ?");
    $stmt->bind_param("i", $id_vendor);
    $stmt->execute();
    $stmt->bind_result($nama, $kontak, $nama_barang, $id, $id_gudang);

    if (!$stmt->fetch()) {
        echo "Data tidak ditemukan";
        $stmt->close();
        $conn->close();
        exit();
    }

    $stmt->close();
    $conn->close();
} else {
    echo "ID Tidak Ditemukan";
    exit();
}
?>

?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Vendor</title>
</head>
<body>
    <h2>Perbarui Vendor</h2>
    <form action="proses_vendor.php" method="post">
        <input type="hidden" name="id_vendor" value="<?php echo htmlspecialchars($id_vendor); ?>">
        <label>Nama:</label><br>
        <input type="text" name="nama" value="<?php echo htmlspecialchars($nama); ?>"><br><br>
        <label>Kontak:</label><br>
        <input type="text" name="kontak" value="<?php echo htmlspecialchars($kontak); ?>"><br><br>
        <label>Nama Barang:</label><br>
        <input type="text" name="nama_barang" value="<?php echo htmlspecialchars($nama_barang); ?>"><br><br>
        <label>ID:</label><br>
        <input type="text" name="id" value="<?php echo htmlspecialchars($id); ?>"><br><br>
        <label>ID Gudang:</label><br>
        <input type="text" name="id_gudang" value="<?php echo htmlspecialchars($id_gudang); ?>"><br><br>
        <input type="submit" name="update" value="Perbarui">
    </form>
</body>
</html>
