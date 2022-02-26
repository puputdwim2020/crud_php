<?php
require 'function.php';

$conn = mysqli_connect("localhost", "root", "", "puputdwi");
if (isset($_POST["submit"])) {
    if (tambah($_POST) > 0) {
        echo "
        <script>
            alert('Data berhasil ditambahkan!!');
            document.location.href = 'index.php';
        </script>
        ";
    } else {
        echo "
        <script>
            alert('Data gagal ditambahkan!!')
            document.location.href = 'index.php';
        </script>
        ";
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah</title>
</head>

<body>
    <h1>Add Data</h1>
    <form action="" method="POST">
        <table>
            <tr>
                <td>Merek Hp </td>
                <td> : </td>
                <td><input type="text" style="width: 300px; height: 20px;" name="merek_hp" id="merek_hp" required></td>
            </tr>

            <tr>
                <td>Tipe Hp </td>
                <td> : </td>
                <td><input type="text" style="width: 300px; height: 20px;" name="tipe_hp" id="tipe_hp" required></td>
            </tr>

            <tr>
                <td>OS Hp </td>
                <td> : </td>
                <td><input type="text" style="width: 300px; height: 20px;" name="os_hp" id="os_hp" required></td>
            </tr>

            <tr>
                <td>Tanggal Produksi </td>
                <td> : </td>
                <td><input type="date" style="width: 300px; height: 20px;" name="tanggal_produksi" id="tanggal_produksi" required></td>
            </tr>

            <tr>
                <td>Kode Hp </td>
                <td> : </td>
                <td><input type="text" style="width: 300px; height: 20px;" name="kode_hp" id="kode_hp" required></td>
            </tr>

            <tr>
                <td>Kode Produksi </td>
                <td> : </td>
                <td><input type="text" style="width: 300px; height: 20px;" name="kode_produksi" id="kode_produksi" required></td>
            </tr>

            <tr>
                <td>E-mail </td>
                <td> : </td>
                <td><input type="text" style="width: 300px; height: 20px;" name="email" id="email" required></td>
            </tr>
        </table>
        <table>
            <br>
            <tr>
                <button type="submit" name="submit" style="width: 100px; height: 30px;">Add Data!</button>
            </tr>
        </table>

    </form>

</body>

</html>