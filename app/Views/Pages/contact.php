<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>
<div class="container">
    <div class="row">
        <div class="col">
            <h2>Contact Us</h2>
            <?php foreach ($alamat as $a) : ?>
                <div class="card" style="width: 18rem;">
                    <div class="card-body">
                        <h5 class="card-title"><?= $a["tipe"]; ?></h5>
                        <h6 class="card-subtitle mb-2 text-muted"><?= $a["alamat"]; ?></h6>
                        <p class="card-text"><i class="fas fa-phone"></i> <?= $a["telp"]; ?></p>
                    </div>
                </div>
                <br>
            <?php endforeach ?>
        </div>
    </div>
</div>
<?= $this->endSection(); ?>