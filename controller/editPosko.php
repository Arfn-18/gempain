<?php
include 'conn.php';
$id_posko = (isset($_POST['id_posko'])) ? htmlentities($_POST['id_posko']) : "";
$nama_posko = (isset($_POST['nama_posko'])) ? htmlentities($_POST['nama_posko']) : "";
$kapasitas_max = (isset($_POST['kapasitas_max'])) ? htmlentities($_POST['kapasitas_max']) : "";
$kapasitas_terisi = (isset($_POST['kapasitas_terisi'])) ? htmlentities($_POST['kapasitas_terisi']) : "";
$alamat_posko = (isset($_POST['alamat_posko'])) ? htmlentities($_POST['alamat_posko']) : "";

if($kapasitas_terisi >= $kapasitas_max){
    $keterangan = "Penuh";
}else{
    $keterangan = "Tersedia";
}


if (!empty(isset($_POST['input_user_validate']))) {
    $select = mysqli_query($conn, "SELECT * FROM posko WHERE nama_posko = '$nama_posko' AND id_posko != '$id_posko'");
    if (mysqli_num_rows($select) > 0) {
        $massage = "
        <script>
        window.location = '../posko';
        alert('Data $nama_posko sudah terdaftar');
        </script>
        ";
    } else {
        $query = mysqli_query($conn, "UPDATE posko SET nama_posko = '$nama_posko', kapasitas_terisi = '$kapasitas_terisi', kapasitas_max = '$kapasitas_max', alamat_posko = '$alamat_posko', keterangan = '$keterangan' WHERE id_posko = '$id_posko'");
        if ($query) {
            $massage = "
            <script>
            window.location = '../posko';
            alert('Data $nama_posko Berhasil Diedit');
            </script>
            ";
        } else {
            $massage = "
        <script>
        window.location = '../posko';
        alert('Data Gagal Diedit');
        </script>
        ";
        }
    }
}
echo $massage;
