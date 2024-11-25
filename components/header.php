<?php
date_default_timezone_set('Asia/Jakarta');

$hari = date("l");
$tgl = date("d");
$bulan = date("M");
$tahun = date("Y");

if ($hari == "Sunday") {
    $hari = "Minggu";
} elseif ($hari == "Monday") {
    $hari = "Senin";
} elseif ($hari == "Tuesday") {
    $hari = "Selasa";
} elseif ($hari == "Wednesday") {
    $hari = "Rabu";
} elseif ($hari == "Thursday") {
    $hari = "Kamis";
} elseif ($hari == "Friday") {
    $hari = "Jum'at";
} elseif ($hari == "Saturday") {
    $hari = "Sabtu";
}

$myDate = $hari . " | " . $tgl . " " . $bulan . " " . $tahun;
?>

<div class="time text-center pt-4 d-flex justify-content-between align-items-center">
    <i class="bi bi-globe-americas fs-3"></i>
    <p class="fw-semibold m-0 text-primary"><?php echo $myDate ?></p>
    <i class="bi bi-bell-fill fs-3"></i>
</div>