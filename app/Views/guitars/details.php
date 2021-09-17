<?= $this->extend('layout/template'); ?>
<?= $this->section('content'); ?>

<div class="container">
    <div class="row">
        <div class="col">
            <h2 class="mt-2 mb-2">Album Details</h2>
            <div class="card mb-3" style="max-width: 540px;">
                <div class="row g-0">
                    <div class="col-md-4">
                        <img src="/img/<?= $guitars['img']; ?>" class="img-fluid rounded-start" alt="guitar">
                    </div>
                    <div class="col-md-8">
                        <div class="card-body">
                            <h5 class="card-title"><?= $guitars['type']; ?></h5>
                            <p class="card-text"><small class="text-muted">Rp.<?= $guitars['price']; ?></small></p>
                            <p class="card-text"><b>Vendor: </b> <?= $guitars['vendor']; ?></p>

                            <a href="/guitars/edit/<?= $guitars['slug']; ?>" class="btn btn-warning">Edit</a>

                            <form action="/guitars/<?= $guitars['id']; ?>" method="post" class="d-inline">
                                <?= csrf_field(); ?>
                                <input type="hidden" name="_method" value="DELETE">
                                <button type="submit" class="btn btn-danger" onclick="return confirm('are you sure to delete this data')">Delete</button>
                            </form>

                            <br><br>

                            <a href="/guitars"><i class="fas fa-chevron-left"> Back</i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?= $this->endSection(); ?>