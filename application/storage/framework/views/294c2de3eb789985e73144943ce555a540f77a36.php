<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.1.3/css/bootstrap.min.css">
<link rel="stylesheet" href="https://cdn.datatables.net/1.12.1/css/dataTables.bootstrap5.min.css">

<link rel="https://cdn.datatables.net/responsive/2.3.0/css/responsive.dataTables.min.css">
<link rel="https://cdn.datatables.net/rowgroup/1.2.0/css/rowGroup.dataTables.min.css">

<?php $__env->startSection('content'); ?>
<div class="bg-body-light">
    <div class="content content-full">
        <div class="d-flex flex-column flex-sm-row justify-content-sm-between align-items-sm-center">
            <div class="h5 fw-bold mb-0">
               EVENTS CALENDER
            </div>
            <nav class="flex-shrink-0 mt-3 mt-sm-0 ms-sm-3" aria-label="breadcrumb">
                <ol class="breadcrumb breadcrumb-alt">
                    <li class="breadcrumb-item">
                        <a class="link-fx" href="javascript:void(0)">Events</a>
                    </li>
                    <li class="breadcrumb-item" aria-current="page">
                        View Events
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
          <table id="example" class="table table-bordered table-striped table-vcenter fs-sm">
            <span class="d-flex justify-content-end">
                <a class="btn btn-alt-info btn-sm" href="<?php echo e(route('courses.addCalenderOfEvents')); ?>">Create</a>
            </span><br>
            <thead>
                <th>#</th>
                <th>ACADEMIC YEAR</th>
                <th>SEMESTER</th>
                <th>EVENT</th>
                <th>DATES</th>
                <th>ACTION</th>
            </thead>
            <tbody>
              <?php $__currentLoopData = $calender; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
              <tr>
                 <td><?php echo e(++$key); ?></td>
                  <td><?php echo e($item->academic_year_id); ?></td>
                 <td><?php echo e($item->intake_id); ?></td>
                 <td><?php echo e($item->events->name); ?></td>
                 <td><?php echo e(Carbon\carbon::parse($item->start_date)->format('d M Y')); ?> - <?php echo e(Carbon\carbon::parse($item->end_date)->format('d M Y')); ?></td>
                 <td>
                    <a class="btn btn-sm btn-alt-info" href="<?php echo e(route('courses.editCalenderOfEvents', ['id'=> Crypt::encrypt($item->id)])); ?>">edit</a>
                    <a class="btn btn-sm btn-alt-danger" onclick="return confirm('Are you sure you want to delete this record ?')" href="<?php echo e(route('courses.showCalenderOfEvents', $item->id)); ?>">delete</a>
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

<?php echo $__env->make('registrar::layouts.backend', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/Registrar/application/Modules/Registrar/Resources/views/eventsCalender/showCalenderOfEvents.blade.php ENDPATH**/ ?>