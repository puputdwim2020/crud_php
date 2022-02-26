<?php
$conn = mysqli_connect("localhost", "root", "", "puputdwi");

function query($query)
{
    global $conn;
    $result = mysqli_query($conn, $query);
    $rows = [];
    while ($row = mysqli_fetch_assoc($result)) {
        $rows[] = $row;
    }
    return $rows;
}

function tambah($data)
{
    global $conn;

    $merek_hp = htmlspecialchars($data["merek_hp"]);
    $tipe_hp = htmlspecialchars($data["tipe_hp"]);
    $os_hp = htmlspecialchars($data["os_hp"]);
    $tanggal_produksi = htmlspecialchars($data["tanggal_produksi"]);
    $kode_hp = htmlspecialchars($data["kode_hp"]);
    $kode_produksi = htmlspecialchars($data["kode_produksi"]);
    $email = htmlspecialchars($data["email"]);


    $query = "INSERT INTO master VALUES('', '$merek_hp', '$tipe_hp', '$os_hp', '$tanggal_produksi', '$kode_hp', '$kode_produksi', '$email' ) ";
    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);
}

function hapus($id_hp)
{
    global $conn;
    mysqli_query($conn, "DELETE FROM master WHERE id_hp = $id_hp");
    return mysqli_affected_rows($conn);
}

function edit($data)
{
    global $conn;

    $id_hp = $data["id_hp"];
    $merek_hp = htmlspecialchars($data["merek_hp"]);
    $tipe_hp = htmlspecialchars($data["tipe_hp"]);
    $os_hp = htmlspecialchars($data["os_hp"]);
    $tanggal_produksi = htmlspecialchars($data["tanggal_produksi"]);
    $kode_hp = htmlspecialchars($data["kode_hp"]);
    $kode_produksi = htmlspecialchars($data["kode_produksi"]);
    $email = htmlspecialchars($data["email"]);


    $query = "UPDATE master SET
                merek_hp = '$merek_hp',
                tipe_hp = '$tipe_hp', 
                os_hp= '$os_hp', 
                tanggal_produksi= '$tanggal_produksi', 
                kode_hp = '$kode_hp', 
                kode_produksi= '$kode_produksi', 
                email= '$email' 
                WHERE id_hp = $id_hp 
                ";
    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);
}

function search($keyword)
{
    $query = "SELECT * FROM master
    WHERE
    merek_hp LIKE = '%$keyword%'
    ";
    return query($query);
}

function login($data)
{
    global $conn;
    $username = strtolower(stripcslashes($data["username"]));
    $password = mysqli_real_escape_string($conn, $data["password"]);
    $password2 = mysqli_real_escape_string($conn, $data["password2"]);

    if ($password !== $password2) {
        echo "<script>
        alert('Konfirmasi password tidak sesuai');
        </script>";
        return false;
    }

    $password = password_hash($password, PASSWORD_DEFAULT);
    mysqli_query($conn, "INSERT INTO user VALUES('', '$username', '$password')");

    return mysqli_affected_rows($conn);
}
