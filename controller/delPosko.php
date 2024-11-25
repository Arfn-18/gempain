<?php
include "conn.php";
$id_posko = (isset($_POST['id_posko'])) ? htmlentities($_POST['id_posko']) : "";
$nama = (isset($_POST['nama_posko'])) ? htmlentities($_POST['nama_posko']) : "";

$massage = "";

if (!empty(isset($_POST['input_user_validate']))) {
    $query = mysqli_query($conn, "DELETE FROM posko WHERE id_posko = '$id_posko'");
    if ($query) {
        $massage = "
    <script>
    window.location = '../posko';
    </script>";
    } else {
        $massage = "
        <script>
        window.location = '../posko';
        alert('Data Gagal Dihapus');
        </scrip>
        ";
    }
}
echo $massage;
?>