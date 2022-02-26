<?php
require 'function.php';

if (isset($_POST["login"])) {

    // cek apakah form telah di submit

    // form telah disubmit, proses data

    // ambil nilai form
    $username = htmlentities(strip_tags(trim($_POST["username"])));
    $password = htmlentities(strip_tags(trim($_POST["password"])));

    // siapkan variabel untuk menampung pesan error
    $pesan_error = "";

    // cek apakah "username" sudah diisi atau tidak
    if (empty($username)) {
        $pesan_error .= "Username belum diisi <br>";
    }

    // cek apakah "password" sudah diisi atau tidak
    if (empty($password)) {
        $pesan_error .= "Password belum diisi <br>";
    }

    // buat koneksi ke mysql dari file connection.php
    include("koneksi.php");

    // filter dengan mysqli_real_escape_string
    $username = mysqli_real_escape_string($conn, $username);
    $password = mysqli_real_escape_string($conn, $password);

    // generate hashing
    $password_sha1 = sha1($password);

    // cek apakah username dan password ada di tabel admin
    $cek = "SELECT * FROM admin WHERE username = '$username'
                AND password = '$password_sha1'";
    $result = mysqli_query($conn, $cek);

    if (mysqli_num_rows($result) == 0) {
        // data tidak ditemukan, buat pesan error
        $pesan_error .= "Username dan/atau Password tidak sesuai";
    }

    // bebaskan memory
    mysqli_free_result($result);

    // tutup koneksi dengan database MySQL
    mysqli_close($conn);

    // jika lolos validasi, set session
    if ($pesan_error === "") {
        session_start();
        $_SESSION["username"] = $username;
        header("Location: index.php");
    }
} else {
    // form belum disubmit atau halaman ini tampil untuk pertama kali
    // berikan nilai awal untuk semua isian form
    $pesan_error = "";
    $username = "";
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <style>
        body {
            background-image: url(golden.jpg);
            background-size: cover;
        }

        label {
            display: block;
        }
    </style>
</head>

<body>
    <center>
        <br></br>
        <h1>Login</h1>
        <h1><?= $pesan_error; ?></h1>
        <form action="login.php" method="POST">
            <input type="text" style="width: 300px; height: 25px;" name="username" placeholder="Username" id="username">
            <br></br>

            <input type="password" style="width: 300px; height: 25px;" name="password" placeholder="Password" id="password">
            <br></br>

            <input type="submit" style="width: 100px; height: 30px;" name="login" value="login">
            <br></br>
        </form>
    </center>
</body>

</html>