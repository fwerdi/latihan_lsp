<?php

$nama_gudang = $lokasi_gudang = $id = "";
$id_gudang = $_GET['id_gudang'] ?? null;

if ($id_gudang) {
    include "koneksi.php";
    

    $stmt = $conn->prepare("SELECT nama_gudang, lokasi_gudang, id FROM storage WHERE id_gudang = ?");
    

    $stmt->bind_param("i", $id_gudang);
    $stmt->execute();
    $stmt->bind_result($nama_gudang, $lokasi_gudang, $id);

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


<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Vendor</title>
</head>
<body>
    <h2>Perbarui Vendor</h2>
    <form action="proses_storage.php" method="post">
        <input type="hidden" name="id_gudang" value="<?php echo htmlspecialchars($id_gudang); ?>">
        <label>id Gudang:</label><br>
        <input type="text" name="nama_gudang" value="<?php echo htmlspecialchars($nama_gudang); ?>"><br><br>
        <label>Nama Gudang:</label><br>
        <input type="text" name="lokasi_gudang" value="<?php echo htmlspecialchars($lokasi_gudang); ?>"><br><br>
        <label>Lokasi Gudang:</label><br>
        <input type="text" name="id" value="<?php echo htmlspecialchars($id); ?>"><br><br>
        <label>ID:</label><br>
        <input type="text" name="id_gudang" value="<?php echo htmlspecialchars($id_gudang); ?>"><br><br>
        <input type="submit" name="update" value="Perbarui">
    </form>
</body>
</html>
