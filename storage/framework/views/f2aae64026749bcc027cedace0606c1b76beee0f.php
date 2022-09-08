

<?php $__env->startSection('content'); ?>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-4">
                <a href="<?php echo e(route("admin.products")); ?>">
                    <div class="card bg-primary text-white">
                        <div class="card-card d-flex flex-column justify-content-center align-items-center">
                            <h3>Produits</h3>
                            <span class="font-weight-bold">
                                <?php echo e($products->count()); ?>

                            </span>
                        </div>
                    </div>
                </a>
            </div>
        </div>
    </div>
</div>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-4">
                <a href="<?php echo e(route("admin.orders")); ?>" style="text-decoration:none">
                    <div class="card bg-danger text-white">
                        <div class="card-card d-flex flex-column justify-content-center align-items-center">
                            <h3>Commandes</h3>
                            <span class="font-weight-bold">
                                <?php echo e($orders->count()); ?>

                            </span>
                        </div>
                    </div>
                </a>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\aaaa\resources\views/admin/index.blade.php ENDPATH**/ ?>