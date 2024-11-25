<?php
$query = mysqli_query($conn, "SELECT * FROM gempa");
while ($data = mysqli_fetch_array($query)) {
    $gempa[] = $data;
}
$query = mysqli_query($conn, "SELECT * FROM posko ORDER BY id_posko DESC");
while ($data = mysqli_fetch_array($query)) {
    $posko[] = $data;
}
// Tutup koneksi
$conn->close();
?>

<div class="menu my-4">
    <h6 class="fw-semibold mb-2">Menu</h6>
    <div class="card-menu d-flex justify-content-between gap-3">
        <a class="card-item w-100 rounded-4 px-3 py-3 my-2 text-decoration-none text-white bg-secondary-subtle" aria-current="page" href="gempa">
            <i class="ph-fill ph-clock-counter-clockwise text-primary"></i>
            <h3 class="fw-bold mt-2 mb-1">History Gempa</h3>
            <p class="fw-light">Total : <?= count($gempa) ?></p>
        </a>
        <a class="card-item w-100 rounded-4 px-3 py-3 my-2 text-decoration-none text-white bg-secondary-subtle" aria-current="page" href="posko">
            <i class="ph-fill ph-hospital text-primary"></i>
            <h3 class="fw-bold mt-2 mb-1">Posko Gempa</h3>
            <p class="fw-light">Total : <?= count($posko); ?></p>
        </a>
    </div>
</div>