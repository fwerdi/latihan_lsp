<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Page</title>
    
    <link href="bootstrap.min.css" rel="stylesheet"> 
    <style>
        /* Optional: Custom styling */
        .navbar {
            padding-left: 15px;
            padding-right: 15px;
        }
        .form-inline.ml-auto {
            display: flex ;
            margin-left : auto ;
        }
        .btn.btn-outline-success.my-2.my-sm-0{
            display: none;
        }
    </style>
</head>
<body>
    <header class="bg-primary text-white text-center py-3">
        <h1>Admin Page<h1>
    </header>
    
    <nav class="navbar navbar-expand-lg bg-dark navbar-dark sticky-top">
        <div class="collapse navbar-collapse navbar-toggler" id="navbarNav">
            <ul class="navbar-nav">
                <!-- <li class="nav-item">
                    <a class="nav-link" href="#admin">Admin</a>
                </li> -->
                <li class="nav-item">
                    <a class="nav-link" href="#inventory">Inventory</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#storage">Storage</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#vendor">Vendor</a>
                </li>
                <!-- <li class="nav-item">
                    <a class="nav-link" href="#user">User</a>
                </li>
                </li> -->
            </ul>
            <form class="form-inline ml-auto" method="GET" action="">
                <input class="form-control mr-sm-2 search" type="search" placeholder="Search" aria-label="Search" name="search">
            </form>


    </nav>

    <!-- <section id="admin">
    <br>
    <br>
    <div class="container mt-4">
        <h3 class="text-center">Manage Admin</h3>

        <table class= "table table-striped mt-4">
            <thead>
                <tr>
                    <td>Nama</td>
                    <td>Kontak</td>
                    <td>Email</td>
                </tr>
            </thead>

            <tbody>
                php
                $conn = new mysqli ("localhost","root","","stok");
                
                $admin = mysqli_query($conn, "SELECT * FROM  admin");
                $inventory = mysqli_query($conn, "SELECT * FROM  inventory");
                $storage = mysqli_query($conn, "SELECT * FROM  storage");
                $vendor = mysqli_query($conn, "SELECT * FROM  vendor");
                $user = mysqli_query($conn, "SELECT * FROM  user");

                while($row=mysqli_fetch_array($admin)) {
                    echo"<tr>";
                        echo"<td>" . $row['nama'] . "</td>";
                        echo"<td>" . $row['kontak'] . "</td>";
                        echo"<td>" . $row['email'] . "</td>";
                    echo"</tr>";

                }
                ?>
            </tbody>
        </table> -->

    <section id="inventory">
    <br>
    <br>
    <div class="container mt-4">
        <h3 class="text-center">Manage Inventory</h3>

        <table class= "table table-striped mt-4">
            <thead>
                <tr>
                    <td>Nama barang</td>
                    <td>Jenis Barang</td>
                    <td>Kuantitas Stok</td>
                    <td>Lokasi Gudang</td>
                    <td>Serial Number</td>
                    <td>Harga</td>
                    <td>Action</td>
                </tr>
            </thead>

            <tbody>
                <?php
                $conn = new mysqli ("localhost","root","","stok");
                
                $admin = mysqli_query($conn, "SELECT * FROM  admin");
                $inventory = mysqli_query($conn, "SELECT * FROM  inventory");
                $storage = mysqli_query($conn, "SELECT * FROM  storage");
                $vendor = mysqli_query($conn, "SELECT * FROM  vendor");
                $user = mysqli_query($conn, "SELECT * FROM  user");
            
                $search = isset($_GET['search']) ? $_GET['search'] : '';
                $inventory = mysqli_query($conn, "SELECT * FROM  inventory WHERE jenis_barang LIKE '%$search%' OR nama_barang LIKE '%$search%'");

                while ($row = $inventory->fetch_assoc()) {
                    $nama_barang = $row['nama_barang'];
                    echo"<tr>";
                        echo"<td>" . $row['nama_barang'] . "</td>";
                        echo"<td>" . $row['jenis_barang'] . "</td>";
                        echo"<td>" . $row['kuantitas_stok'] . "</td>";
                        echo"<td>" . $row['lokasi_gudang'] . "</td>";
                        echo"<td>" . $row['serial_number'] . "</td>";
                        echo"<td>" . $row['harga'] . "</td>";
                        echo"<td> <a href='insert/inventory.php?id=" . "'class='btn btn-success btn-sm'>insert</a>";
                        echo "<td><a href='update/vendor.php?nama_barang=$nama_barang' class='btn btn-primary btn-sm'>Edit</a></td>";
                        echo "<td><a href='delete/inventory.php?nama_barang=$nama_barang' class='btn btn-danger btn-sm'>Delete</a></td>";
                    echo"</tr>";

                }
                ?>
            </tbody>
        </table>

    <section id="storage">
    <br>
    <br>
    <div class="container mt-4">
        <h3 class="text-center">Manage Storage</h3>

        <table class= "table table-striped mt-3">
            <thead>
                <tr>
                    <td>Nama Gudang</td>
                    <td>lokasi gudang</td>
                    <td>Action</td>
                </tr>
            </thead>

            <tbody>
                <?php
                while ($row = $storage->fetch_assoc()) {
                    $id_gudang = $row['id_gudang'];
                    echo "<tr>";
                    echo "<td>" . htmlspecialchars($row['nama_gudang']) . "</td>";
                    echo "<td>" . htmlspecialchars($row['lokasi_gudang']) . "</td>";
                    echo "<td><a href='insert/storage.php?id=" . $id_gudang . "' class='btn btn-success btn-sm'>Insert</a></td>";
                    echo "<td><a href='update/storage.php?id_gudang=$id_gudang' class='btn btn-primary btn-sm'>Edit</a></td>";
                    echo "<td><a href='delete/storage.php?id_gudang=$id_gudang' class='btn btn-danger btn-sm'>Delete</a></td>";
                    echo "</tr>";
                }
                
                ?>
            </tbody>
        </table>
    
    <section id="vendor">
    <br>
    <br>
    <div class="container mt-4">
    
        <h3 class="text-center">Manage Vendor</h3>

        <table class= "table table-striped mt-3">
            <thead>
                <tr>
                    <td>Nama Vendor</td>
                    <td>Kontak</td>
                    <td>Nama Barang</td>
                    <td>Action</td>
                </tr>
            </thead>

            <tbody>
                <?php
                $conn = new mysqli ("localhost","root","","stok");
                
                $vendor = mysqli_query($conn, "SELECT * FROM  vendor WHERE nama LIKE '%$search%' OR kontak LIKE '%$search%'");

                while ($row = $vendor->fetch_assoc()) {
                    $id_vendor = $row['id_vendor'];
                    echo"<tr>";
                        echo"<td>" . $row['nama'] . "</td>";
                        echo"<td>" . $row['kontak'] . "</td>";
                        echo"<td>" . $row['nama_barang'] . "</td>";
                        echo "<td><a href='insert/vendor.php?id_vendor=$id_vendor' class='btn btn-success btn-sm'>Insert</a></td>";
                        echo "<td><a href='update/vendor.php?id_vendor=$id_vendor' class='btn btn-primary btn-sm'>Edit</a></td>";
                        echo "<td><a href='delete/vendor.php?id_vendor=$id_vendor' class='btn btn-danger btn-sm'>Delete</a></td>";
                    echo "</tr>";

                }
                ?>
            </tbody>
        </table>

        <!-- <section id="user">
        <br>
        <br>
        <div class="container mt-4">
        <h3 class="text-center">Manage User</h3>

        <table class= "table table-striped mt-3">
            <thead>
                <tr>
                    <td>Username</td>
                    <td>Password</td>
                    <td>level</td>
                </tr>
            </thead>

            <tbody>
                <!-?php
                $conn = new mysqli ("localhost","root","","stok");
                
                $user = mysqli_query($conn, "SELECT * FROM  user");

                while($row=mysqli_fetch_array($user)) {
                    echo"<tr>";
                        echo"<td>" . $row['username'] . "</td>";
                        echo"<td>" . $row['password'] . "</td>";
                        echo"<td>" . $row['level'] . "</td>";
                    echo"</tr>";

                }
                 -->
            </tbody>
        </table> 

    
</body>
</html>