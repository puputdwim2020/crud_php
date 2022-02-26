<?php
$conn = mysqli_connect("localhost", "root", "", "puputdwi");

//periksa koneksi, tampilkan pesan kesalahan jika gagal
if (!$conn) {
    die("Koneksi dengan database gagal: " . mysqli_connect_errno() .
        " - " . mysqli_connect_error());
}

//buat database puputdwi jika belum ada
$query = "CREATE DATABASE IF NOT EXISTS puputdwi";
$result = mysqli_query($conn, $query);

if (!$result) {
    die("Query Error: " . mysqli_errno($conn) .
        " - " . mysqli_error($conn));
} else {
    echo "Database <b>'puputdwi'</b> berhasil dibuat... <br>";
}

//pilih database puputdwi
$result = mysqli_select_db($conn, "puputdwi");

if (!$result) {
    die("Query Error: " . mysqli_errno($conn) .
        " - " . mysqli_error($conn));
} else {
    echo "Database <b>'puputdwi'</b> berhasil dipilih... <br>";
}

// cek apakah tabel master sudah ada. jika ada, hapus tabel
$query = "DROP TABLE IF EXISTS master";
$hasil_query = mysqli_query($conn, $query);

if (!$hasil_query) {
    die("Query Error: " . mysqli_errno($conn) .
        " - " . mysqli_error($conn));
} else {
    echo "Tabel <b>'master'</b> berhasil dihapus... <br>";
}

// buat query untuk CREATE tabel master
$query  = "CREATE TABLE master ( id_hp int(11), PRIMARY KEY (id_hp),";
$query .= "merek_hp varchar(100),";
$query .= "tipe_hp varchar(30), ";
$query .= "os_hp varchar(50), ";
$query .= "tanggal_produksi DATE, ";
$query .= "kode_hp int(50),";
$query .= "kode_produksi int(15),";
$query .= "email varchar(50)) ";


$result = mysqli_query($conn, $query);

if (!$result) {
    die("Query Error: " . mysqli_errno($conn) .
        " - " . mysqli_error($conn));
} else {
    echo "Tabel <b>'master'</b> berhasil dibuat... <br>";
}

// buat query untuk INSERT data ke tabel master
$query  = "INSERT INTO master VALUES ";
$query .= "('234', 'Oppo', 'a5s', 'android', '2020-02-21', '6542', '82345', 'opponito@gmail.com'), ";
$query .= "('798', 'Oppo', 's5', 'android', '2019-11-10', '3432', '12345', 'lianadewi@gmail.com'), ";
$query .= "('349', 'Samsung', 'galaxy sky', 'android', '2021-12-09', '65432', '12345', 'samkiriang@gmail.com') ";

$result = mysqli_query($conn, $query);

if (!$result) {
    die("Query Error: " . mysqli_errno($conn) .
        " - " . mysqli_error($conn));
} else {
    echo "Tabel <b>'master'</b> berhasil diisi... <br>";
}

// cek apakah tabel admin sudah ada. jika ada, hapus tabel
$query = "DROP TABLE IF EXISTS admin";
$hasil_query = mysqli_query($conn, $query);

if (!$hasil_query) {
    die("Query Error: " . mysqli_errno($conn) .
        " - " . mysqli_error($conn));
} else {
    echo "Tabel <b>'admin'</b> berhasil dihapus... <br>";
}

// buat query untuk CREATE tabel admin
$query  = "CREATE TABLE admin (username varchar(50), password varchar(200))";
$hasil_query = mysqli_query($conn, $query);

if (!$hasil_query) {
    die("Query Error: " . mysqli_errno($conn) .
        " - " . mysqli_error($conn));
} else {
    echo "Tabel <b>'admin'</b> berhasil dibuat... <br>";
}

// buat username dan password untuk admin
$username = "puputdwim";
$password = sha1("rahasia");

// buat query untuk INSERT data ke tabel admin
$query  = "INSERT INTO admin VALUES ('$username','$password')";

$hasil_query = mysqli_query($conn, $query);

if (!$hasil_query) {
    die("Query Error: " . mysqli_errno($conn) .
        " - " . mysqli_error($conn));
} else {
    echo "Tabel <b>'admin'</b> berhasil diisi... <br>";
}

// tutup koneksi dengan database mysql
mysqli_close($conn);
