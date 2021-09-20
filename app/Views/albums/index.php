<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>
<div class="container">
    <div class="row">
        <div class="col-6">
            <a href="/Albums/create" class="btn btn-primary my-3">Create new Data</a>
            <h1 class="mt-2">Album Collections</h1>
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
                        <th scope="col">Cover</th>
                        <th scope="col">Title</th>
                        <th scope="col">Artist</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $i = 1 + (5 * ($currentPage - 1)); ?>
                    <?php foreach ($albums as $album) : ?>
                        <tr>
                            <th scope="row"><?= $i++; ?></th>
                            <td><img src="/img/<?= $album['cover']; ?>" alt="" class="cover"></td>
                            <td><?= $album['title']; ?></td>
                            <td><?= $album['artist']; ?></td>
                            <td>
                                <a href="/albums/<?= $album['slug']; ?>" class="btn btn-success">Details</a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
            <?= $pager->links('albums', 'albums_pagination'); ?>
        </div>
    </div>
</div>
<?= $this->endSection(); ?>