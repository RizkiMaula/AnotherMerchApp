<?= $this->extend('layout/template'); ?>


<?= $this->section('content'); ?>
<div class="container">
    <div class="row">
        <div class="col">
            <h1 class="mb-5">Our Products</h1>
            <h5 class="mb-3">Products Overview</h5>
            <div class="d-flex justify-content-evenly mb-4">
                <div class="card" style="width: 18rem;">
                    <img src="/img/BeatlesAbbey.jpg" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title">Albums</h5>
                        <p class="card-text">Music albums from various artists and solo singers make your day happy and boosting your mood.</p>
                        <a href="#" class="btn btn-primary">Go somewhere</a>
                    </div>
                </div>

                <div class="card" style="width: 18rem;">
                    <img src="/img/GNRAppetite.jpg" class="card-img-top" alt="Appetite for Destruction">
                    <div class="card-body">
                        <h5 class="card-title">Guns N Roses: Appetite for Destruction</h5>
                        <h6 class="card-title text-muted">$14.99</h6>
                        <a href="#" class="btn btn-primary">Details</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <?= $this->endSection(); ?>