

<?php $__env->startSection('content'); ?>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-4">
            <?php echo $__env->make('layouts.sidebar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        </div>
        <div class="col-md-8">

            <table class="table table-hover">
                <thead>
                    <tr>
                        <th>Id</th>
                        <th>Titre</th>
                        <th>Description</th>
                        <th>Quantité</th>
                        <th>Prix</th>
                        <th>Image</th>
                        <th></th>
                        <th>Disponible</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <tr>
                        <td><?php echo e($product->id); ?></td>
                        <td><?php echo e($product->title); ?></td>
                        <td><?php echo e(Str::limit($product->description,50)); ?></td>
                        <td><?php echo e($product->inStock); ?></td>
                        <td><?php echo e($product->price); ?> DH</td> 
                        <td>
                            <img src="<?php echo e($product->image); ?>" 
                                alt="<?php echo e($product->title); ?>"
                                width="50"
                                height="50"
                                class="img-fluid rounded">
                        </td>
                        <td>
                            <form id="<?php echo e($product->id); ?>" method="post" action="<?php echo e(route("orders.destroy",$product->slug)); ?>">
                                <?php echo csrf_field(); ?>
                                <?php echo method_field("DELETE"); ?>
                                <button
                                onclick="event.preventDefault()
                                    if (confirm('Voulez vous vraiment supprimer le produit'<?php echo e($product->title); ?> ?'))
                                     document.getElementById(<?php echo e($product->id); ?>).submit()
                                "
                                class="btn btn-sm btn-Danger">
                                    <i class="fa fa-trash"></i>
                                </button>
                            </form> 
                        </td>
                        <td>
                            <?php if($product->inStock>0): ?>
                                <i class="fa fa-check text-succes"></i>
                            <?php else: ?> 
                                <i class="fa fa-times text-succes"></i>
                            <?php endif; ?>
                        </td>
                        <td></td>
                    </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\aaaa\resources\views/admin/products/index.blade.php ENDPATH**/ ?>