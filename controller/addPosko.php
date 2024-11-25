<?php

include 'conn.php';
$nama_posko = (isset($_POST['nama_posko'])) ? htmlentities($_POST['nama_posko']) : "";
$kapasitas_max = (isset($_POST['kapasitas_max'])) ? htmlentities($_POST['kapasitas_max']) : "";
$alamat_posko = (isset($_POST['alamat_posko'])) ? htmlentities($_POST['alamat_posko']) : "";

if (!empty(isset($_POST['input_user_validate']))) {
    $select = mysqli_query($conn, "SELECT * FROM posko WHERE nama_posko = '$nama_posko'");
    if (mysqli_num_rows($select) > 0) {
        $massage = '
        <script>
        window.location = "../posko";
        alert("Username ' . $nama_posko . ' sudah terdaftar");
        </script>
        ';
    } else {
        $query = mysqli_query($conn, "INSERT INTO posko (nama_posko, kapasitas_max, alamat_posko) VALUES ('$nama_posko', '$kapasitas_max', '$alamat_posko')");
        if ($query) {
            $massage = '
        <script>
        window.location = "../posko";
        alert("Berhasil Menambahkan ' . $nama_posko . '");
        </script>
        ';
        } else {
            $massage = '
        <script>
        window.location = "../posko";
        alert("Gagal insert data");
        </script>
        ';
        }
    }
}
echo $massage;
