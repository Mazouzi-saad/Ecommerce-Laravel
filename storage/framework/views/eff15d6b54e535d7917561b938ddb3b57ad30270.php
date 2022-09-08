

<?php $__env->startSection('content'); ?>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-4">
            <?php echo $__env->make("layouts.sidebar", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        </div>
        <div class="col-md-8">
            <div class="card p-3">
                <h3 class="card-title">Ajouter un produit</h3>
                <div class="card-body">
                    <form method="post" action="<?php echo e(route("products.store")); ?>" enctype="multipart/form-data">
                        <?php echo csrf_field(); ?>
                        <div class="form-group">
                            <input type="text" 
                            name="title"
                            placeholder="Titre"
                            class="form-control">
                        </div>
                        <div class="form-group">
                            <textarea name="description" placeholder="Description" class="form-control"
                                cols="30" rows="10"></textarea>
                        </div>
                        <div class="form-group">
                            <input type="number"
                                name="old_price"
                                placeholder="Prix Ancien"
                                class="form-control">
                        </div>
                        <div class="form-group">
                            <input type="number"
                                name="inStock"
                                placeholder="Quantité en stock"
                                class="form-control">
                        </div>
                        <div class="form-group">
                        <input type="file"
                                name="image"
                                class="form-control">
                        </div>
                        <div class="form-group">
                            <input type="text" 
                            name="title"
                            placeholder="Categorie"
                            class="form-control">
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-primary">
                                Valider
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\aaaa\resources\views/admin/create/index.blade.php ENDPATH**/ ?>