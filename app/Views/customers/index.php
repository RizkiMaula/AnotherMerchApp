<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>
<div class="container">
    <div class="row">
        <div class="col-6">
            <h1 class="mt-2">Customers</h1>
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
                        <th scope="col">Name</th>
                        <th scope="col">Address</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $i = 1 + (6 * ($currentPage - 1)); ?>
                    <?php foreach ($customers as $customer) : ?>
                        <tr>
                            <th scope="row"><?= $i++; ?></th>
                            <td><?= $customer['name']; ?></td>
                            <td><?= $customer['address']; ?></td>
                            <td>
                                <a href="#" class="btn btn-success">Details</a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
            <?= $pager->links('customer', 'customers_pagination'); ?>
        </div>
    </div>
</div>
<?= $this->endSection(); ?>