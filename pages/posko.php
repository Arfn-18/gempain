<?php
$query = mysqli_query($conn, "SELECT * FROM posko ORDER BY id_posko DESC");
while ($data = mysqli_fetch_array($query)) {
    $posko[] = $data;
}

$posko_tersedia = 0;
foreach ($posko as $data) {
    if ($data['keterangan'] == "Tersedia") {
        $posko_tersedia++;
    }
}
// Tutup koneksi
$conn->close();
?>

<!-- Modal Add Posko-->
<div class="modal fade" id="addPosko" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-top">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Add Posko</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form class="needs-validation" novalidate action="controller/addPosko.php" method="POST">
                    <div class="row">
                        <div class="col-8">
                            <div class="form-floating mb-3">
                                <div class="form-floating mb-3">
                                    <input type="text" class="form-control" id="floatingInput" placeholder="Your Name" name="nama_posko" required>
                                    <label for="floatingInput">Nama Posko</label>
                                    <div class="invalid-feedback">
                                        Masukan Nama Posko.
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-4">
                            <div class="form-floating mb-3">
                                <input type="number" name="kapasitas_max" class="form-control" id="floatingInput" placeholder="999" required>
                                <label for="floatingInput">Kapasitas</label>
                                <div class="invalid-feedback">
                                    Masukan Kapasitas Posko.
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-floating mb-3">
                        <textarea name="alamat_posko" class="form-control" id="" style="height: 100px;" required></textarea>
                        <label for="floatingInput">Alamat Posko</label>
                        <div class="invalid-feedback">
                            Masukan Alamat Posko.
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" name="input_user_validate" class="btn btn-primary">Save changes</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- End Modal Add Posko -->

<!-- Modal View Posko-->
<?php
foreach ($posko as $data) {
?>
    <div class="modal fade" id="viewPosko<?= $data['id_posko']; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-top">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Detail Posko</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="form-floating mb-3">
                        <input type="text" class="form-control" id="floatingInput" placeholder="999" value="<?= $data['nama_posko']; ?>" readonly>
                        <label for="floatingInput">Nama Posko</label>
                    </div>
                    <div class="row">
                        <div class="col-6">
                            <div class="form-floating mb-3">
                                <div class="form-floating mb-3">
                                    <input type="number" class="form-control" id="floatingInput" placeholder="Your Name" value="<?= $data['kapasitas_terisi']; ?>" readonly>
                                    <label for="floatingInput">Kapasitas Terisi</label>
                                </div>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-floating mb-3">
                                <input type="number" class="form-control" id="floatingInput" placeholder="999" value="<?= $data['kapasitas_max']; ?>" readonly>
                                <label for="floatingInput">Kapasitas Max</label>
                            </div>
                        </div>
                    </div>
                    <div class="form-floating mb-3">
                        <input type="text" class="form-control" id="floatingInput" placeholder="999" value="<?= $data['keterangan']; ?>" readonly>
                        <label for="floatingInput">Keterangan</label>
                    </div>
                    <div class="form-floating mb-3">
                        <textarea class="form-control" id="" style="height: 100px;" readonly><?= $data['alamat_posko']; ?></textarea>
                        <label for="floatingInput">Alamat Posko</label>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Modal View Posko -->

    <!-- Modal Edit Posko-->
    <div class="modal fade" id="EditPosko<?= $data['id_posko']; ?>" tabindex=" -1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-top">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Edit Posko</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form class="needs-validation" novalidate action="controller/editPosko.php" method="POST">
                        <input type="hidden" name="id_posko" value="<?= $data['id_posko']; ?>">
                        <div class="row">
                            <div class="col-sm">
                                <div class="form-floating mb-3">
                                    <input type="text" class="form-control" id="floatingInput" placeholder="Your Name" name="nama_posko" required value="<?= $data['nama_posko']; ?>">
                                    <label for="floatingInput">Nama Posko</label>
                                    <div class="invalid-feedback">
                                        Masukan Nama Posko.
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col col-md-6">
                                <div class="form-floating mb-3">
                                    <input type="number" class="form-control" id="floatingInput" placeholder="999" name="kapasitas_terisi" required value="<?= $data['kapasitas_terisi']; ?>">
                                    <label for="floatingInput">Kapasitas Terisi</label>
                                    <div class="invalid-feedback">
                                        Masukan Kapasitas Terisi.
                                    </div>
                                </div>
                            </div>
                            <div class="col col-md-6">
                                <div class="form-floating mb-3">
                                    <input type="number" name="kapasitas_max" class="form-control" id="floatingInput" placeholder="999" required value="<?= $data['kapasitas_max']; ?>">
                                    <label for="floatingInput">Kapasitas Max</label>
                                    <div class="invalid-feedback">
                                        Masukan Kapasitas Max.
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control" id="floatingInput" placeholder="999" readonly value="<?= $data['keterangan']; ?>">
                            <label for="floatingInput">Keterangan</label>
                            <div class="invalid-feedback">
                                Masukan Kapasitas Max.
                            </div>
                        </div>
                        <div class="form-floating mb-3">
                            <textarea name="alamat_posko" class="form-control" id="" style="height: 100px;" required><?= $data['alamat_posko']; ?></textarea>
                            <label for="floatingInput">Alamat Posko</label>
                            <div class="invalid-feedback">
                                Masukan Alamat Posko.
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="submit" name="input_user_validate" class="btn btn-primary">Save changes</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- End Modal Edit Posko -->

    <!-- Modal Delete User-->
    <div class="modal fade" id="DeletePosko<?= $data['id_posko']; ?>" tabindex=" -1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Delete Posko</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form class="needs-validation" novalidate action="controller/delPosko.php" method="POST">
                        <input type="hidden" name="id_posko" value="<?= $data['id_posko']; ?>">
                        <input type="hidden" name="nama_posko" value="<?= $data['nama_posko']; ?>">
                        <div class="col-lg-12 mb-3">
                            <div class="alert alert-light" role="alert">Apakah anda yakin ingin menghapus Posko <b><?= $data['nama_posko']; ?></b> ?</div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                            <button type="submit" name="input_user_validate" class="btn btn-danger">Delete</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- End Modal Delete User -->
<?php } ?>

<div class="posko my-4">
    <div class="info-posko d-flex gap-3 justify-content-between">
        <div class="jmlh-posko rounded-4 bg-secondary-subtle px-3 py-3 w-100">
            <i class="ph-fill ph-hospital text-primary mb-2"></i>
            <h3>Data Posko</h3>
            <p>Total : <?= count($posko) ?></p>
        </div>
        <div class="posko-tersedia rounded-4 bg-secondary-subtle px-3 py-3 w-100">
            <i class="ph-fill ph-hand-heart text-primary mb-2"></i>
            <h3>Posko Tersedia</h3>
            <p>Total : <?= $posko_tersedia ?></p>
        </div>
    </div>

    <div class="daftar-posko">
        <div class="d-flex justify-content-between mt-3">
            <h6 class="fw-semibold">Posko (<span><?php echo count($posko); ?></span>)</h6>
            <?php if (isAdmin()): ?>
                <h6 class="fw-semibold text-primary" data-bs-toggle="modal" data-bs-target="#addPosko">Add Posko</h6>
            <?php endif; ?>
        </div>
        <?php
        if (empty($posko)) {
            echo "Tidak ada data";
        } else {
        ?>
            <ol class="m-0 p-0">
                <?php
                foreach ($posko as $data) {
                ?>
                    <li class="list-posko rounded-4 px-3 py-3 my-2 bg-secondary-subtle d-flex justify-content-between align-items-center">
                        <div class="title flex-grow-1">
                            <span class="fw-bold"><?= $data['nama_posko']; ?></span>
                            <p class="fw-light"><i class="ph-fill ph-map-pin-line"></i> <?= $data['alamat_posko']; ?></p>
                        </div>
                        <div class="desc d-flex flex-column align-items-end">
                            <?php
                            if ($data['keterangan'] == "Penuh") {
                                echo '<span class="fw-semibold text-danger">Penuh</span>';
                            } else {
                                echo '<span class="fw-semibold text-success">Tersedia</span>';
                            } ?>
                            <span class="fw-light"><?= $data['kapasitas_terisi'] . "/" . $data['kapasitas_max']; ?></span>
                        </div>
                        <?php if (isAdmin()): ?>
                            <div class="dropdown ms-2">
                                <a class="text-primary p-0" data-bs-toggle="dropdown" aria-expanded="false"><i class="bi bi-three-dots-vertical fs-1 fw-bold"></i></a>
                                <ul class="dropdown-menu">
                                    <li><a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#viewPosko<?= $data['id_posko']; ?>"><i class="bi bi-info-circle-fill fs-6 text-info"></i> Detail</a></li>
                                    <li><a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#EditPosko<?= $data['id_posko']; ?>"><i class="bi bi-pencil-square fs-6 text-warning"></i> Edit</a></li>
                                    <li>
                                        <hr class="dropdown-divider">
                                    </li>
                                    <li><a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#DeletePosko<?= $data['id_posko']; ?>"><i class="bi bi-trash3-fill fs-6 text-danger"></i> Delete</a></li>
                                </ul>
                            </div>
                        <?php endif; ?>
                    </li>
                <?php
                }
                ?>
            </ol>
        <?php
        }
        ?>
    </div>
</div>
</div>