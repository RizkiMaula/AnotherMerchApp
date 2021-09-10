<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>
<div class="container">
    <div class="col-8">
        <div class="row">
            <h1 class="my-3">Edit Album Data</h1>
            <form action="/Albums/update/<?= $albums['id']; ?>" method="post">
                <?= csrf_field(); ?>
                <input type="hidden" name="slug" value="<?= $albums['slug']; ?>">
                <div class="row mb-3">
                    <label for="title" class="col-sm-2 col-form-label">Title</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control <?= ($validation->hasError('title')) ? 'is-invalid' : ''; ?>" id="title" name="title" autofocus value="<?= (old('title')) ? old('title') : $komik['title'] ?>">
                        <div id="validationServer03Feedback" class="invalid-feedback">
                            <?= $validation->getError('title'); ?>.
                        </div>
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="artist" class="col-sm-2 col-form-label">Artist</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control  <?= ($validation->hasError('artist')) ? 'is-invalid' : ''; ?>" id="artist" name="artist" value="<?= (old('artist')) ? old('artist') : $komik['artist'] ?>">
                        <div id="validationServer03Feedback" class="invalid-feedback">
                            <?= $validation->getError('artist'); ?>.
                        </div>
                    </div>
                </div>
                <div class=" row mb-3">
                    <label for="releaseyear" class="col-sm-2 col-form-label">Release Year</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control <?= ($validation->hasError('releaseyear')) ? 'is-invalid' : ''; ?>" id="releaseyear" name="releaseyear" value="<?= (old('releaseyear')) ? old('releaseyear') : $komik['releaseyear'] ?>">
                        <div id="validationServer03Feedback" class="invalid-feedback">
                            <?= $validation->getError('releaseyear'); ?>.
                        </div>
                    </div>
                </div>
                <div class=" row mb-3">
                    <label for="label" class="col-sm-2 col-form-label">Label</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control <?= ($validation->hasError('label')) ? 'is-invalid' : ''; ?>" id="label" name="label" value="<?= (old('label')) ? old('label') : $komik['label'] ?>">
                        <div id="validationServer03Feedback" class="invalid-feedback">
                            <?= $validation->getError('label'); ?>.
                        </div>
                    </div>
                </div>
                <div class=" row mb-3">
                    <label for="cover" class="col-sm-2 col-form-label">Cover</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control <?= ($validation->hasError('cover')) ? 'is-invalid' : ''; ?>" id="cover" name="cover" value="<?= (old('cover')) ? old('cover') : $komik['cover'] ?>">
                        <div id="validationServer03Feedback" class="invalid-feedback">
                            <?= $validation->getError('cover'); ?>.
                        </div>
                    </div>
                </div>
                <div class=" row mb-3">
                    <label for="price" class="col-sm-2 col-form-label">Price</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control <?= ($validation->hasError('price')) ? 'is-invalid' : ''; ?>" id="price" name="price" value="<?= (old('price')) ? old('price') : $komik['price'] ?>">
                        <div id="validationServer03Feedback" class="invalid-feedback">
                            <?= $validation->getError('price'); ?>.
                        </div>
                    </div>
                </div>
                <button type=" submit" class="btn btn-primary">Edit Data</button>
            </form>
        </div>
    </div>
</div>
<?= $this->endSection(); ?>