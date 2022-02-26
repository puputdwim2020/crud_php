<?php
session_start();
//koneksi
include('koneksi.php');
//Cek Sesion
if (!isset($_SESSION["username"])) {
    header("Location: login.php");
    exit;
}
require 'function.php';
$master = query("SELECT * FROM master");

if (isset($_POST["search"])) {
    $master = search($_POST["keyword"]);
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Halaman Admin</title>
</head>

<body>
    <center>
        <h1>Daftar Data HP</h1>
    </center>
    <a href="tambah.php">
        <h4>Add Data</h4>
    </a>
    <a href="logout.php">
        <h4>Logout</h4>
    </a>
    <form action="" method="POST">
        <input type="text" name="keyword" size="30" autofocus placeholder="Masukkan keyword pencarian.." autocomplete="off">
        <button type="submit" name="search">search!</button>
    </form>
    <br>

    <table border="1" cellpadding="10" cellspacing="0">
        <tr>
            <th>ID_Hp</th>
            <th>Merek_Hp</th>
            <th>Tipe_Hp</th>
            <th>Os_Hp</th>
            <th>Tanggal_Produksi</th>
            <th>Kode_Hp</th>
            <th>Kode_Produksi</th>
            <th>Email</th>
            <th>Action</th>
        </tr>
        <?php foreach ($master as $row) : ?>
            <tr>
                <td><?= $row["id_hp"] ?></td>
                <td><?= $row["merek_hp"] ?></td>
                <td><?= $row["tipe_hp"] ?></td>
                <td><?= $row["os_hp"] ?></td>
                <td><?= $row["tanggal_produksi"] ?></td>
                <td><?= $row["kode_hp"] ?></td>
                <td><?= $row["kode_produksi"] ?></td>
                <td><?= $row["email"] ?></td>
                <td>
                    <a href="edit.php ?id_hp=<?= $row["id_hp"]; ?>">Edit</a>
                    <a href="hapus.php?id_hp=<?= $row["id_hp"]; ?>" onclick="return confirm('Yakin ingin menghapus data?');">Delete</a>
                </td>
            </tr>
        <?php endforeach; ?>
</body>

</html>