<?php
require 'function.php';

$id_hp = $_GET["id_hp"];
$mhs = query("SELECT * FROM master WHERE id_hp = $id_hp")[0];

if (isset($_POST["submit"])) {
    if (edit($_POST) > 0) {
        echo "
        <script>
            alert('Data berhasil diedit!!');
            document.location.href = 'index.php';
        </script>
        ";
    } else {
        echo "
        <script>
            alert('Data gagal diedit!!')
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
    <title>Edit</title>
</head>

<body>
    <h1>Edit Data</h1>
    <form action="" method="POST">
        <input type="hidden" name="id_hp" value="<?= $mhs["id_hp"]; ?>">
        <table>
            <tr>
                <td>Merek Hp </td>
                <td> : </td>
                <td><input type="text" style="width: 300px; height: 20px;" name="merek_hp" id="merek_hp" required value="<?= $mhs["merek_hp"]; ?>"></td>
            </tr>

            <tr>
                <td>Tipe Hp </td>
                <td> : </td>
                <td><input type="text" style="width: 300px; height: 20px;" name="tipe_hp" id="tipe_hp" required value="<?= $mhs["tipe_hp"]; ?>"></td>
            </tr>

            <tr>
                <td>OS Hp </td>
                <td> : </td>
                <td><input type="text" style="width: 300px; height: 20px;" name="os_hp" id="os_hp" required value="<?= $mhs["os_hp"]; ?>"></td>
            </tr>

            <tr>
                <td>Tanggal Produksi </td>
                <td> : </td>
                <td><input type="text" style="width: 300px; height: 20px;" name="tanggal_produksi" id="tanggal_produksi" required value="<?= $mhs["tanggal_produksi"]; ?>"></td>
            </tr>

            <tr>
                <td>Kode Hp </td>
                <td> : </td>
                <td><input type="text" style="width: 300px; height: 20px;" name="kode_hp" id="kode_hp" required value="<?= $mhs["kode_hp"]; ?>"></td>
            </tr>

            <tr>
                <td>Kode Produksi </td>
                <td> : </td>
                <td><input type="text" style="width: 300px; height: 20px;" name="kode_produksi" id="kode_produksi" required value="<?= $mhs["kode_produksi"]; ?>"></td>
            </tr>

            <tr>
                <td>E-mail </td>
                <td> : </td>
                <td><input type="text" style="width: 300px; height: 20px;" name="email" id="email" required value="<?= $mhs["email"]; ?>"></td>
            </tr>
        </table>
        <table>
            <br>
            <tr>
                <button type="submit" name="submit" style="width: 100px; height: 30px;">Edit Data!</button>
            </tr>
        </table>

    </form>

</body>

</html>