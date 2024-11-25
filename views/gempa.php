<?php
$query = mysqli_query($conn, "SELECT * FROM gempa ORDER BY id_gempa DESC");
while ($data = mysqli_fetch_array($query)) {
    $gempa[] = $data;
}
// Tutup koneksi
$conn->close();
?>

<!-- Modal -->
<?php foreach ($gempa as $data) { ?>
    <div class="modal fade" id="gempa<?= $data['id_gempa']; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered modal-dialog-scrollable">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Detail Gempa</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-12">
                            <img src="https://data.bmkg.go.id/DataMKG/TEWS/<?= $data['shakemap']; ?>" alt="" class="img-fluid rounded">
                        </div>
                        <div class="col-12 mt-2">
                            <ul class="list-group">
                                <li class="list-group-item">
                                    <span class="fw-semibold">Wilayah:</span>
                                    <p style="font-size: 0.8rem; margin: 0;"><?= $data['wilayah']; ?></p>
                                </li>
                                <li class="list-group-item">
                                    <span class="fw-semibold">Koordinat: </span>
                                    <p style="font-size: 0.8rem; margin: 0;"><?= $data['lintang'] . " - " . $data['bujur']; ?></p>
                                </li>
                                <li class="list-group-item">
                                    <span class="fw-semibold">Magnitudo: </span>
                                    <p style="font-size: 0.8rem; margin: 0;"><?= $data['magnitude']; ?></p>
                                </li>
                                <li class="list-group-item">
                                    <span class="fw-semibold">Kedalaman: </span>
                                    <p style="font-size: 0.8rem; margin: 0;"><?= $data['kedalaman']; ?></p>
                                </li>
                                <li class="list-group-item">
                                    <span class="fw-semibold">Potensi: </span>
                                    <p style="font-size: 0.8rem; margin: 0;"><?= $data['potensi']; ?></p>
                                </li>
                                <li class="list-group-item">
                                    <span class="fw-semibold">Dirasakan: </span>
                                    <p style="font-size: 0.8rem; margin: 0;"><?= $data['dirasakan']; ?></p>
                                </li>
                            </ul>

                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-sm btn-secondary" data-bs-dismiss="modal">Close</button>
                    <!-- <button type="button" class="btn btn-primary">Save changes</button> -->
                </div>
            </div>
        </div>
    </div>
<?php } ?>

<div class="container">
    <div class="search d-flex align-items-center gap-1 my-5 bg-secondary-subtle rounded-4 px-3 py-2">
        <i class="ph-bold ph-magnifying-glass fs-1"></i>
        <input type="text" class="form-control border-0 bg-secondary-subtle" placeholder="Cari Gempa" aria-label="Search">
    </div>
    <div class="history-gempa">
        <div class="d-flex justify-content-between mt-3">
            <h6 class="fw-semibold">History Gempa (<span><?php echo count($gempa); ?></span>)</h6>
            <h6 class="fw-semibold"><a href="https://www.bmkg.go.id/" target="_blank" class="fst-italic text-decoration-none fw-light text-primary" style="font-size: 0.9rem;">Sumber Data: BMKG</a></h6>
        </div>
        <ol class="m-0 p-0">
            <?php
            foreach ($gempa as $data) {
            ?>
                <li class="list-gempa rounded-4 px-3 py-3 my-2 bg-secondary-subtle" data-bs-toggle="modal" data-bs-target="#gempa<?= $data['id_gempa']; ?>">
                    <div class="title mb-2">
                        <p class="fw-semibold m-0"><?= $data['wilayah']; ?></p>
                    </div>
                    <div class="desc d-flex gap-3 align-items-end">
                        <img src="https://data.bmkg.go.id/DataMKG/TEWS/<?= $data['shakemap']; ?>" alt="" height="67px" class="rounded">
                        <div class="row d-flex align-items-end w-100">
                            <div class="col-6 captions">
                                <p><i class="bi bi-geo-fill fs-6"></i><?= $data['lintang'] . " - " . $data['bujur']; ?></p>
                                <p><i class="bi bi-speedometer2 fs-6"></i> <?= $data['magnitude']; ?></p>
                                <p><i class="bi bi-building-fill-down fs-6"></i> <?= $data['kedalaman']; ?></p>
                            </div>
                            <div class="col-6 timesnap text-end">
                                <p><?= $data['jam']  . ", " . $data['tanggal']; ?></p>
                            </div>
                        </div>
                    </div>
                </li>
            <?php
            }
            ?>
        </ol>
    </div>
</div>