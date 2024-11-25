<?php
session_start();
include 'conn.php';

$username = (isset($_POST['username'])) ? htmlentities($_POST['username']) : "";
$password = (isset($_POST['password'])) ? md5(htmlentities($_POST['password'])) : "";

if (!empty(isset($_POST['submit_validate']))) {
    $query = mysqli_query($conn, "SELECT * FROM users WHERE username = '$username' AND password = '$password'");
    $return = mysqli_fetch_array($query);
    if ($return) {
        $_SESSION['username'] = $username;
        $_SESSION['id_user'] = $return['id_user'];
        $_SESSION['level_user'] = $return['level_user'];
        header('location:../user');
    } else {
?>
        <script>
            alert("Username dan Password tidak sesuai");
            window.location = "../user";
        </script>
<?php
    }
}
