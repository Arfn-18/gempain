<section class="hero-title">
    <h1 class="fw-bold">Gempa<span class="text-primary">!n</span></h1>
    <p>Informasi Gempa Wilayah Indonesia, <br> <a href="https://www.bmkg.go.id/" target="_blank" class="fst-italic text-decoration-none fw-light text-primary" style="font-size: 0.9rem;">Sumber Data : BMKG</a></p>
</section>

<div class="gempa-terkini">
    <div class="detail-gempa rounded-4 px-3 py-3 my-2 bg-secondary-subtle ">
        <div class="title d-flex justify-content-between align-items-center mb-2">
            <p class="fw-bold text-primary"><i class="ph-fill ph-siren fs-5"></i> Informasi Gempa Terkini</p>
        </div>
        <span class="badge text-bg-danger mb-2 fw-semibold"><?= $Jam . ", " . $tanggal ?></span>
        <h3 class="fw-semibold"><?= $wilayah ?></h3>
        <p><i class="bi bi-geo-fill fs-6"></i> Koordinat : <?= $Lintang . " - " . $Bujur ?></p>
        <p><i class="bi bi-speedometer2 fs-6"></i> Magnitude : <?= $magnitude ?></p>
        <p><i class="bi bi-building-fill-down fs-6"></i> Kedalaman : <?= $kedalaman ?></p>
    </div>
</div>

<?php include 'views/menu.php'; ?>