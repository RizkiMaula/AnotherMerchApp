<?= $this->extend('layout/template'); ?>


<?= $this->section('content'); ?>
<div class="container">
    <div class="row">
        <div class="col">
            <h1 class="mb-5">Products Overview</h1>
            <div class="d-flex justify-content-evenly mb-4">
                <div class="card" style="width: 18rem;">
                    <img src="/img/BeatlesAbbey.jpg" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title">Albums</h5>
                        <p class="card-text">Music albums from various artists and solo singers make your day great and boosting your mood.</p>
                        <a href="/albums" class="btn btn-primary">Show More</a>
                    </div>
                </div>

                <div class="card" style="width: 18rem;">
                    <img src="/img/Slash.jpg" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title">Guitars</h5>
                        <p class="card-text">Guitars make a great music like an angel fall down from heaven if its played by great musician.</p>
                        <a href="/guitars" class="btn btn-primary">Show More</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <?= $this->endSection(); ?>