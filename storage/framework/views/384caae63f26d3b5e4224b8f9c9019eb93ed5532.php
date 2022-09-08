

<?php $__env->startSection('content'); ?>
<div class="container">
    <div class="row ">
        <div class="col-md-8">
            <div class="card">
                <h3 class="card-header"><?php echo e($product->title); ?></h3>
                <div class="card" style="width:18rem,height:100%">
                    <div class="card-img-top">
                        <img class="img-fluid w-100" src="<?php echo e($product->image); ?>" 
                            alt="<?php echo e($product->title); ?>">
                    </div>
                    <div class="card-body">
                        <h5 class="card-title">
                            <?php echo e($product->title); ?>

                        </h5>
                        <p class="text-dark font-weight-bold">
                            <?php echo e($product->category->title ??'None'); ?>

                        </p>
                        <p class="d-flex.flex-row justify-content-between align-items-center">
                            <span class="text-muted">
                                <?php echo e($product->price); ?>DH
                            </span>
                            <span class="text-danger">
                                <strike>
                                    <?php echo e($product->old_price); ?>DH
                                </strike>
                            </span>
                        </p>
                        <p class="card-text">
                            <?php echo e($product->description); ?>

                        </p>
                        <p class="font-weight-bold">
                            <?php if($product->inStock>0): ?>
                                <span class="text-success">
                                    Disponible 
                                </span>
                            <?php else: ?>
                                <span class="text-danger">
                                    Non Disponible 
                                </span>
                            <?php endif; ?>    
                        </p>
                    </div>
                </div>
            </div> 
        </div>
        <div class="col-md-4">
            <form action="<?php echo e(route("add.cart",$product->slug)); ?>" method="post">
                <?php echo csrf_field(); ?>
                <div class="form-group">
                    <label for="qty" class="label-input">
                        Quantité:
                    </label>
                    <input type="number" name="qty" id="qty"
                        value="1"
                        placeholder="Quantité"
                        max="<?php echo e($product->inStock); ?>"
                        min="1"
                        class="form-control"
                    >
                </div>
                <div class="form-group">
                    <button type="submit" class="btn text-white btn-block bg-dark ">
                        <i class="fa-solid fa-cart-shopping"></i>
                        Ajouter au panier
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\aaaa\resources\views/products/show.blade.php ENDPATH**/ ?>