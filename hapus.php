<?php
require 'function.php';
$id_hp = $_GET["id_hp"];

if (hapus($id_hp) > 0) {
    echo "
    <script>
        alert('Data berhasil dihapus!!');
        document.location.href = 'index.php';
    </script>
    ";
} else {
    echo "
    <script>
        alert('Data gagal dihapus!!');
        document.location.href = 'index.php';
    </script>
    ";
}
