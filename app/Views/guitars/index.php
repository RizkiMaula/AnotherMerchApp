<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>
<div class="container">
    <div class="row">
        <div class="col-6">
            <a href="/Guitars/create" class="btn btn-primary my-3">Create new Data</a>
            <h1 class="mt-2">Guitar Collections</h1>
            <form action="" method="post">
                <div class="input-group mb-3">
                    <input type="text" class="form-control" placeholder="Search keyword..." name="keyword" id="keyword">
                    <button class="btn btn-outline-secondary" type="submit" name="submit" id="submit"><i class="fas fa-search"></i></button>
                </div>
            </form>
        </div>
    </div>
    <div class="row">
        <div class="col">
            <?php if (session()->getFlashdata('message')) : ?>
                <div class="alert alert-success" role="alert">
                    <?= session()->getFlashdata('message'); ?>
                </div>
            <?php endif; ?>
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Image</th>
                        <th scope="col">Type</th>
                        <th scope="col">Vendor</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $i = 1 + (5 * ($currentPage - 1)); ?>
                    <?php foreach ($guitars as $guitar) : ?>
                        <tr>
                            <th scope="row"><?= $i++; ?></th>
                            <td><img src="/img/<?= $guitar['img']; ?>" alt="" class="cover"></td>
                            <td><?= $guitar['type']; ?></td>
                            <td><?= $guitar['vendor']; ?></td>
                            <td>
                                <a href="/guitars/<?= $guitar['slug']; ?>" class="btn btn-success">Details</a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
            <?= $pager->links('guitars', 'guitars_pagination'); ?>
        </div>
    </div>
</div>
<?= $this->endSection(); ?>