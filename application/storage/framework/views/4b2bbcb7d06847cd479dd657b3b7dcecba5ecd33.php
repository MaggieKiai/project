<?php $__env->startSection('content'); ?>
<div class="bg-body-light">
  <div class="content content-full">
    <div class="d-flex flex-column flex-sm-row justify-content-sm-between align-items-sm-center">
      <div class="flex-grow-1">
          <h6 class="block-title">EDIT SCHOOL</h6>
   
      </div>
  </div>
  </div>
</div>
<div class="content">
  <div class="block block-rounded col-md-12 col-lg-12 col-xl-12">
        <div class="block-content block-content-full">
          <div class="row">
                <div class="d-flex justify-content-center">
                <div class="col-lg-6 space-y-0">
                   <form class="row row-cols-lg-auto g-3 align-items-center" action="<?php echo e(route('courses.updateSchool',$data->id)); ?>" method="POST">
                    <?php echo csrf_field(); ?>
                    <?php echo method_field('PUT'); ?>
                 <div class="form-floating col-12 col-xl-12">
                      <input type="text" class="form-control form-control-alt text-uppercase" value="<?php echo e($data->initials); ?>" id="initials" name="initials" placeholder="School Code">
                      <label class="form-label">SCHOOL INITIALS</label>
                    </div>
                 <div class="form-floating col-12 col-xl-12">
                      <input type="text" class="form-control form-control-alt text-uppercase" value="<?php echo e($data->name); ?>" id="name" name="name" placeholder=" School Name">
                      <label class="form-label">SCHOOL NAME</label>
                    </div>              
                    <div class="col-12 text-center p-3">
                      <button type="submit" class="btn btn-alt-success" data-toggle="click-ripple">Update School</button>
                    </div>
                  </form>
                </div>
              </div>
              </div>
            </div>
          </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('registrar::layouts.backend', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/Registrar/application/Modules/Registrar/Resources/views/school/editSchool.blade.php ENDPATH**/ ?>