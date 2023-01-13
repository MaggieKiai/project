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
                       <?php echo e($year); ?> COURSE TRANSFERS
                    </h5>
                </div>
                <nav class="flex-shrink-0 mt-3 mt-sm-0 ms-sm-3" aria-label="breadcrumb">
                    <ol class="breadcrumb breadcrumb-alt">
                        <li class="breadcrumb-item">
                            <a class="link-fx" href="javascript:void(0)">Department</a>
                        </li>
                        <li class="breadcrumb-item" aria-current="page">
                            Course Transfers
                        </li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>

    <div class="block block-rounded">

        <div class="block-content block-content-full">
            <div class="row">
                <div class="col-12">
                    <div class="d-flex justify-content-end m-2">
                        <a class="btn btn btn-sm btn-alt-primary" href="<?php echo e(route('department.requestedTransfers', ['year' => Crypt::encrypt($year)])); ?>">Generate report</a>
                    </div>
                    <table id="example" class="table table-bordered table-striped fs-sm">
                        <thead>
                            <th>#</th>
                            <th>Reg. Number</th>
                            <th>Student Name</th>
                            <th>Current Course</th>
                            <th>Transfer To</th>
                            <th>Course Pts/Grade</th>
                            <th>Student Pts/Grade</th>
                            <th>Action</th>
                        </thead>
                        <tbody>
                            <?php $__currentLoopData = $transfers; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $transfer): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tr>
                                    <td> <?php echo e(++$key); ?> </td>
                                    <td> <?php echo e($transfer->studentTransfer->reg_number); ?></td>
                                    <td class="text-uppercase">
                                    <?php echo e($transfer->studentTransfer->sname.' '.$transfer->studentTransfer->fname.' '.$transfer->studentTransfer->mname); ?>

                                    </td>
                                    <td> <?php echo e($transfer->studentTransfer->courseStudent->studentCourse->course_code); ?> </td>
                                    <td> <?php echo e($transfer->courseTransfer->course_code); ?> </td>
                                    <td> <?php echo e($transfer->class_points); ?> </td>
                                    <td> <?php echo e($transfer->student_points); ?> </td>
                                    <td nowrap="">
                                    <a class="btn btn-sm btn-outline-secondary" href="<?php echo e(route('department.viewTransferRequest', ['id' => Crypt::encrypt($transfer->id)])); ?>">View </a>
                                        <?php if($transfer->approvedTransfer != null): ?>
                                            <?php if($transfer->approvedTransfer->cod_status == 1): ?>
                                             <i class="fa fa-check text-success m-2"></i>
                                            <?php else: ?>
                                            <i class="fa fa-times text-danger m-2"></i>   
                                            <?php endif; ?>
                                        <?php endif; ?>
                                    </td>
                                </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <!-- Dynamic Table Responsive -->
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('cod::layouts.backend', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/Registrar/application/Modules/COD/Resources/views/transfers/annualTransfers.blade.php ENDPATH**/ ?>