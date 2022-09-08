

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
                        <th>client</th>
                        <th>Produit</th>
                        <th>Quantité</th>
                        <th>Prix</th>
                        <th>Total</th>
                        <th>Payé</th>
                        <th>Livrée</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    <?php $__currentLoopData = $orders; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $order): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <tr>
                        <td><?php echo e($order->id); ?></td>
                        <td><?php echo e($order->user->name); ?></td>
                        <td><?php echo e($order->product_name); ?></td>
                        <td><?php echo e($order->qty); ?></td>
                        <td><?php echo e($order->price); ?> DH</td> 
                        <td><?php echo e($order->total); ?></td>
                        <td>
                            <?php if($order->paid): ?>
                                <i class="fa fa-check text-succes"></i>
                            <?php else: ?> 
                                <i class="fa fa-times text-succes"></i>
                            <?php endif; ?>
                        </td>
                        <td>
                            <?php if($order->delivered): ?>
                                <i class="fa fa-check text-succes"></i>
                            <?php else: ?> 
                                <i class="fa fa-times text-succes"></i>
                            <?php endif; ?>
                        </td>
                        <td class="d-flex flex-row justify-content-center align-items-center">
                            <form method="post" action="<?php echo e(route("orders.update",$order->id)); ?>">
                                <?php echo csrf_field(); ?>
                                <?php echo method_field("PUT"); ?>
                                <button class="btn btn-sm btn-success">
                                    <i class="fa fa-check"></i>
                                </button>
                            </form>
                            <form id="<?php echo e($order->id); ?>" method="post" action="<?php echo e(route("orders.destroy",$order->id)); ?>">
                                <?php echo csrf_field(); ?>
                                <?php echo method_field("DELETE"); ?>
                                <button
                                onclick="event.preventDefault()
                                    if (confirm('Voulez vous vraiment supprimer la commande'<?php echo e($order->id); ?> ?'))
                                     document.getElementById(<?php echo e($order->id); ?>).submit()
                                "
                                class="btn btn-sm btn-Danger">
                                    <i class="fa fa-trash"></i>
                                </button>
                            </form>       
                        </td>
                    </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\aaaa\resources\views/admin/orders/index.blade.php ENDPATH**/ ?>