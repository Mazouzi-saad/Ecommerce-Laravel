<?php $__env->startSection('content'); ?>
<div class="container">
    <div class="row ">
        <div class="col-md-8">
            <div class="card">
                <h3 class="card-header">Nouvelle arrivage!</h3>
                <div class="card-body">
                    <div class="row">
                        <?php $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <div class="col-md-6 mb-2 shadow-sm">
                                <div class="card" style="width:18rem,height:100%">
                                    <div class="card-img-top">
                                        <img class="img-fluid rounded" src="<?php echo e($product->image); ?>" 
                                            alt="<?php echo e($product->title); ?>">
                                    </div>
                                    <div class="card-body">
                                        <h5 class="card-title">
                                            <?php echo e($product->title); ?>

                                        </h5>
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
                                            <?php echo e(Str::limit($product->description,100)); ?>

                                        </p>
                                        <a href="<?php echo e(route("products.show",$product->slug)); ?>" class="btn btn-outline-primary">
                                            <i class="fas fa-eye"></i>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        <hr>
                        <div class="d-flex justify-content-center">
                            <?php echo e($products->links()); ?>

                        </div>
                    </div>  
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="list-group">
                <li class="list-group-item active">
                    Catégories
                </li>
                <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <a href="<?php echo e(route("category.products",$category->slug)); ?>"
                        class="list-group-item list-group-item-action">
                        <?php echo e($category->title); ?>

                        <?php echo e($category->products->count()); ?>

                    </a>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
        </div>

    </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\aaaa\resources\views/home.blade.php ENDPATH**/ ?>