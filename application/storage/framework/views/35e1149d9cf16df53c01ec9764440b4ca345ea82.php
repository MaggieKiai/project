<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.1.3/css/bootstrap.min.css">
<link rel="stylesheet" href="https://cdn.datatables.net/1.12.1/css/dataTables.bootstrap5.min.css">

<link rel="https://cdn.datatables.net/responsive/2.3.0/css/responsive.dataTables.min.css">
<link rel="https://cdn.datatables.net/rowgroup/1.2.0/css/rowGroup.dataTables.min.css">

<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>

<script src="https://cdn.datatables.net/responsive/2.3.0/js/dataTables.responsive.min.js"></script>
<script src="https://cdn.datatables.net/rowgroup/1.2.0/js/dataTables.rowGroup.min.js"></script>
<script>
    $(document).ready(function() {
        $('#example').DataTable( {
            responsive: true,
            order: [[0, 'asc']],
            rowGroup: {
                dataSrc: 2
            }
        } );
    } );
</script>

<?php $__env->startSection('content'); ?>
    <div class="bg-body-light">
        <div class="content content-full">
            <div class="d-flex flex-column flex-sm-row justify-content-sm-between align-items-sm-center py-0">
                <div class="flex-grow-0">
                    <h5 class="h5 fw-bold mb-0">
                        GOVERNMENT SPONSORED
                    </h5>
                </div>
                <nav class="flex-shrink-0 mt-3 mt-sm-0 ms-sm-3" aria-label="breadcrumb">
                    <ol class="breadcrumb breadcrumb-alt">
                        <li class="breadcrumb-item">
                            <a class="link-fx" href="javascript:void(0)">Government Sponsored</a>
                        </li>
                        <li class="breadcrumb-item" aria-current="page">
                            All Government Sponsored
                        </li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>

    <div class="block block-rounded">

        <div class="block-content block-content-full">
            <div class="row">
                <div class="col-lg-12">

                <table id="example" class="table table-bordered table-striped js-dataTable-responsive fs-sm">

                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Sex</th>
                            <th>Code</th>
                            <th>Course</th>
                            <th>Phone</th>
                            <th>Email</th>
                            <th>Alternative Email</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $__currentLoopData = $kuccps; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr>
                            <td><?php echo e($item->sname); ?> <?php echo e($item->fname); ?> <?php echo e($item->mname); ?></td>
                            <td><?php echo e($item->gender); ?></td>
                            <td><?php echo e($item->kuccpsApplication->course_code); ?></td>
                            <td><?php echo e($item->kuccpsApplication->course_name); ?></td>
                            <td><?php echo e($item->mobile); ?></td>
                            <td><?php echo e($item->email); ?></td>
                            <td><?php echo e($item->alt_email); ?></td>
                        </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </tbody>

                 </table>

            </div>
        </div>
        </div>
    </div>
    <?php $__env->stopSection(); ?>



<?php echo $__env->make('registrar::layouts.backend', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\smis\application\Modules/Registrar\Resources/views/offer/showKuccps.blade.php ENDPATH**/ ?>