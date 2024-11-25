<?php
$query = mysqli_query($conn, "SELECT * FROM users");
while ($data = mysqli_fetch_array($query)) {
    $users[] = $data;
}
?>

<div class="list-user my-4">
    <div class="search d-flex align-items-center gap-1 my-5 bg-secondary-subtle rounded-4 px-3 py-2">
        <i class="ph-bold ph-magnifying-glass fs-1"></i>
        <input type="text" class="form-control border-0 bg-secondary-subtle" placeholder="Cari User" aria-label="Search">
    </div>
    <div class="d-flex justify-content-between align-items-center">
        <h6 class="fw-semibold m-0">User (<span><?php echo count($users); ?></span>)</h6>
        <h6 class="fw-semibold text-primary m-0" data-bs-toggle="modal" data-bs-target="#addUser">Add User</h6>
    </div>
    <div class="d-flex justify-content-between mt-3">
        <?php foreach ($users as $data) { ?>
            <div class="d-flex justify-content-between align-items-center rounded-4 bg-secondary-subtle p-3">
                <div class="title">
                    <h3><?= $data['nama_user']; ?></h3>
                    <p><?= $data['username'] . " | " . md5($data['password']); ?></p>
                </div>
                <div class="info align-self-start">
                    <p class="fw-semibold mb-2"><?= $level = ($data['level_user'] == 1) ? 'SuperAdmin' : 'Admin'; ?></p>
                    <p><?= $data['no_hp'] ?></p>
                </div>
            </div>
        <?php } ?>
    </div>