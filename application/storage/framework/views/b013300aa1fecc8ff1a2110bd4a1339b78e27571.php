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
            <div class="d-flex flex-column flex-sm-row justify-content-sm-between align-items-sm-center py-1">
                <div class="flex-grow-1">
                    <h5 class="h5 fw-bold mb-0">
                       <?php echo e($year); ?> ACADEMIC/DEFERMENT LEAVE REQUESTS
                    </h5>
                </div>
                <nav class="flex-shrink-0 mt-0 mt-sm-0 ms-sm-3" aria-label="breadcrumb">
                    <ol class="breadcrumb breadcrumb-alt">
                        <li class="breadcrumb-item">
                            <a class="link-fx" href="#">Leaves</a>
                        </li>
                        <li class="breadcrumb-item" aria-current="page">
                            Annual deferment/academic leaves
                        </li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>

    <div class="block block-rounded">
        <div class="block-content block-content-full">
            <div class="table-responsive">
                <table id="example"  class="table table-sm table-striped table-bordered fs-sm">
                    <thead>
                    <th>#</th>
                    <th> Reg. Number </th>
                    <th> Student Name </th>
                    <th> Current Class </th>
                    <th> Period </th>
                    <th> New Class </th>
                    <th> Stage </th>
                    <th>Action</th>
                    </thead>
                    <tbody>
                    <?php $__currentLoopData = $leaves; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $leave): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr>
                            <td> <?php echo e(++$key); ?> </td>
                            <td> <?php echo e($leave->studentLeave->reg_number); ?> </td>
                            <td> <?php echo e($leave->studentLeave->sname.' '.$leave->studentLeave->fname.' '.$leave->studentLeave->mname); ?> </td>
                            <td> <?php echo e($leave->studentLeave->courseStudent->class_code); ?> </td>
                            <td> <?php echo e(Carbon\Carbon::parse($leave->to)->diffInMonths(Carbon\Carbon::parse($leave->from))); ?> Months</td>
                            <td> <?php echo e($leave->deferredClass->deferred_class); ?> </td>
                            <td> <?php echo e($leave->deferredClass->stage); ?> </td>
                            <td>
                                <a class="btn btn-sm btn-outline-dark" href="<?php echo e(route('dean.viewLeaveRequest', ['id' => Crypt::encrypt($leave->id)])); ?>"> View </a>
                                <?php if($leave->approveLeave != null): ?>
                                    <?php if($leave->approveLeave->dean_status != null): ?>
                                        <?php if($leave->approveLeave->dean_status == 1): ?>
                                            <span class="m-2 text-success">
                                                <i class="fa fa-check"></i>
                                            </span>
                                        <?php else: ?>
                                            <span class="m-2 text-danger">
                                                <i class="fa fa-times"></i>
                                            </span>
                                        <?php endif; ?>
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

<?php $__env->stopSection(); ?>

<?php echo $__env->make('dean::layouts.backend', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/Courses/application/Modules/Dean/Resources/views/defferment/annualLeaves.blade.php ENDPATH**/ ?>