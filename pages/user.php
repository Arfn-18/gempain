<?php
$query = mysqli_query($conn, "SELECT * FROM users ORDER BY id_user DESC");
while ($data = mysqli_fetch_array($query)) {
    $users[] = $data;
}
// Tutup koneksi
$conn->close();
?>

<!-- Modal -->
<div class="modal fade" id="loginUser" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Login</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form class="needs-validation" novalidate action="controller/login.php" method="POST">
                    <div class="form-floating mb-3">
                        <input type="email" class="form-control" id="floatingInput" placeholder="Your Name" name="username" required>
                        <label for="floatingInput">Email addres</label>
                        <div class="invalid-feedback">
                            Masukan Email yang Valid.
                        </div>
                    </div>
                    <div class="form-floating mb-3">
                        <input type="password" name="password" class="form-control" id="floatingPasword" placeholder="*****" required>
                        <label for="floatingPasword">Password</label>
                        <div class="invalid-feedback">
                            Masukan Password.
                        </div>
                    </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="submit" name="submit_validate" class="btn btn-primary">Login</button>
            </div>
            </form>
        </div>
    </div>
</div>

<?php if (isAdmin()): ?>
<?php endif; ?>

<div class="user my-4">
    <?php if (!isAdmin()): ?>
        <div class="login rounded-4 bg-secondary-subtle p-3 mb-3" data-bs-toggle="modal" data-bs-target="#loginUser">
            <div class="d-flex justify-content-between align-items-center">
                <div class="right">
                    <h3>Login</h3>
                    <p>Login sebagai admin untuk mendapatkan akses mengelola data posko</p>
                </div>
                <div class="left">
                    <a href="#" class="text-decoration-none text-primary"><i class="ph ph-sign-in"></i></a>
                </div>
            </div>
        </div>
    <?php endif; ?>

    <?php if (isAdmin()): foreach ($users as $data) { ?>

            <div class="info-user rounded-4 bg-secondary-subtle p-3 mb-2">
                <div class="d-flex justify-content-between align-items-center">
                    <div class="right">
                        <h3><?= $data['nama_user']; ?></h3>
                        <p><?= $data['username'] . " | " . $data['no_hp']; ?></p>
                    </div>
                    <div class="left align-self-start">
                        <p><?= $level = ($data['level_user'] == 1) ? 'SuperAdmin' : 'Admin'; ?></p>
                    </div>
                </div>
            </div>
            <hr>
            <div class="data-user rounded-4 bg-secondary-subtle p-3 mb-2">
                <p><a href="dataUser" class="text-decoration-none text-white">Data User</a></p>
                <span>Total Users: <?= count($users) ?></span>
            </div>
            <hr>
            <div class="change-pass rounded-4 bg-secondary-subtle p-3 mb-2">
                <p><a href="" class="text-decoration-none text-white"></i> Change Password</a></p>
            </div>
            <div class="logout rounded-4 bg-secondary-subtle p-3 mb-2">
                <p><a href="logout" class="text-decoration-none text-white"></i> Logout</a></p>
            </div>
            <hr>
            <div class="about rounded-4 bg-secondary-subtle p-3 mb-2">
                <p><a href="" class="text-decoration-none text-white">Tentang</a></p>
            </div>
    <?php }
    endif; ?>
</div>