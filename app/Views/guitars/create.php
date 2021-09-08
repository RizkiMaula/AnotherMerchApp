<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>
<div class="container">
    <div class="col-8">
        <div class="row">
            <h1 class="my-3">Create New Guitar Data</h1>
            <form action="/Guitars/save" method="post">
                <?= csrf_field(); ?>
                <div class="row mb-3">
                    <label for="type" class="col-sm-2 col-form-label">Type</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control <?= ($validation->hasError('type')) ? 'is-invalid' : ''; ?>" id="type" name="type" value="<?= old('type'); ?>">
                        <div id="validationServerUsernameFeedback" class="invalid-feedback">
                            <?= $validation->getError('type'); ?>
                        </div>
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="vendor" class="col-sm-2 col-form-label">Vendor</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control <?= ($validation->hasError('vendor')) ? 'is-invalid' : ''; ?>" id="vendor" name="vendor" value="<?= old('vendor'); ?>">
                        <div id="validationServerUsernameFeedback" class="invalid-feedback">
                            <?= $validation->getError('vendor'); ?>
                        </div>
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="img" class="col-sm-2 col-form-label">Image</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control <?= ($validation->hasError('img')) ? 'is-invalid' : ''; ?>" id="img" name="img" value="<?= old('vendor'); ?>">
                        <div id="validationServerUsernameFeedback" class="invalid-feedback">
                            <?= $validation->getError('img'); ?>
                        </div>
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="price" class="col-sm-2 col-form-label">Price</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control <?= ($validation->hasError('price')) ? 'is-invalid' : ''; ?>" id="price" name="price" value="<?= old('vendor'); ?>">
                        <div id="validationServerUsernameFeedback" class="invalid-feedback">
                            <?= $validation->getError('price'); ?>
                        </div>
                    </div>
                </div>
                <button type="submit" class="btn btn-primary"> Insert Data</button>
            </form>
        </div>
    </div>
</div>

<?= $this->endSection(); ?>