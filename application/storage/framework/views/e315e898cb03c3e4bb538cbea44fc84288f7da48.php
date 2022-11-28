
<?php $__env->startSection('content'); ?>
    <div class="bg-body-light">
        <div class="content content-full">
            <div class="d-flex flex-column flex-sm-row justify-content-sm-between align-items-sm-center py-0">
                <div class="flex-grow-0">
                    <h5 class="h5 fw-bold mb-0">
                        Update your personal details
                    </h5>
                </div>
                <nav class="flex-shrink-0 mt-1 mt-sm-0 ms-sm-1" aria-label="breadcrumb">
                    <ol class="breadcrumb breadcrumb-alt">
                        <li class="breadcrumb-item">
                            <a class="link-fx" href="javascript:void(0)">Profile</a>
                        </li>
                        <li class="breadcrumb-item" aria-current="page">
                            Update profile
                        </li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
    <div class="block block-rounded">
        <div class="block-content">
            <div class="block-content block-content-full">
                <div class="d-flex justify-content-center fs-sm">
                    <span class="col-md-12 mb-4 text-center text-warning">
                    <i class="fa fa-info-circle"></i>
                       Fill all fields marked with <span class="text-danger">*</span>
                    </span>
                </div>
                <div class="row">
                        <!-- Form Grid with Labels -->
                        <form class="" method="POST" action="<?php echo e(route('application.updateDetails')); ?>">
                            <?php echo csrf_field(); ?>
                            <div class="row row-cols-sm-3 g-2">
                                <div class="form-floating col-12">
                                    <input type="text" class="form-control text-uppercase" name="fname" required value="<?php if(Auth::user()->fname != null): ?><?php echo e(Auth::user()->fname); ?><?php else: ?><?php echo e(old('fname')); ?><?php endif; ?>" placeholder="FIRST NAME">
                                    <label class="form-label" for="fname"><span class="text-danger">*</span> FIRST NAME </label>
                                </div>
                                <div class="form-floating col-12">
                                    <input type="text" class="form-control text-uppercase" name="mname" value="<?php if(Auth::user()->mname != null): ?><?php echo e(Auth::user()->mname); ?><?php else: ?><?php echo e(old('mname')); ?><?php endif; ?>" placeholder="MIDDLE NAME">
                                    <label class="form-label" for="mname">MIDDLE NAME</label>
                                </div>
                                <div class="form-floating col-12">
                                    <input type="text" class="form-control" name="sname" value="<?php if(Auth::user()->sname != null): ?><?php echo e(Auth::user()->sname); ?><?php else: ?><?php echo e(old('sname')); ?><?php endif; ?>" required placeholder="SUR NAME">
                                    <label class="form-label" for="sname"><span class="text-danger">*</span> SUR NAME </label>
                                </div>
                                <div class="form-floating col-12">
                                <select class="form-control text-muted" name="title" required>
                                    <option selected="selected" disabled class="text-center"> - select title - </option>
                                    <option <?php if(old('title') == 'Mr.'): ?> selected="selected" <?php endif; ?> value="Mr."> Mr.</option>
                                    <option <?php if(old('title') == 'Miss.'): ?> selected="selected" <?php endif; ?> value="Miss."> Miss. </option>
                                    <option <?php if(old('title') == 'Ms.'): ?> selected="selected" <?php endif; ?> value="Ms."> Ms. </option>
                                    <option <?php if(old('title') == 'Mrs.'): ?> selected="selected" <?php endif; ?> value="Mrs."> Mrs. </option>
                                    <option <?php if(old('title') == 'Dr.'): ?> selected="selected" <?php endif; ?> value="Dr.">Dr.</option>
                                    <option <?php if(old('title') == 'Prof.'): ?> selected="selected" <?php endif; ?> value="Prof."> Prof. </option>
                                </select>
                                <label class="form-label" for="title"><span class="text-danger">*</span> TITTLE </label>
                            </div>
                            <div class="form-floating col-12">
                                    <select name="status" id="status" class="form-control text-muted" required>
                                        <option disabled selected class="text-center"> - select martial status - </option>
                                        <option <?php if(old('status') == 'Single'): ?> selected="selected" <?php endif; ?> value="single" >Single</option>
                                        <option <?php if(old('status') == 'Married'): ?> selected="selected" <?php endif; ?> value="married">Married</option>
                                        <option <?php if(old('status') == 'Divorced'): ?> selected="selected" <?php endif; ?> value="divorced" >Divorced</option>
                                        <option <?php if(old('status') == 'Separated'): ?> selected="selected" <?php endif; ?> value="separated" >Separated</option>
                                    </select>
                                    <label class="form-label" for="status"><span class="text-danger">*</span> MARITAL STATUS </label>
                                </div>
                                <div class="form-floating col-12">
                                    <input type="date" class="form-control" name="dob" value="<?php echo e(old('dob')); ?>" required>
                                    <label class="form-label"><span class="text-danger">*</span> DATE OF BIRTH </label>
                                </div>
                                <?php if(Auth::user()->student_type ==2 ): ?>
                                    <div class="form-floating col-12">
                                        <input type="text" class="form-control text-uppercase" name="mobile"value="<?php if(Auth::user()->mobile != null ): ?><?php echo e(Auth::user()->mobile); ?><?php else: ?><?php echo e(old('alt_number')); ?><?php endif; ?>" required placeholder="PHONE">
                                        <label class="form-label"><span class="text-danger">*</span> MOBILE NUMBER </label>
                                    </div>
                                    <?php else: ?>
                                    <div class="col-12 mb-4">
                                    <label class="form-label"><span class="text-danger">*</span> GENDER </label>
                                    <div class="space-x-2">
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="gender" value="M" <?php if(old('gender') == 'Male'): ?> checked <?php endif; ?> <?php if(Auth::user()->gender != null): ?> <?php echo e((Auth::user()->gender == 'M') ? "checked" : ""); ?> <?php endif; ?> required>
                                                <label class="form-check-label">Male</label>
                                            </div>
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="gender" value="F" <?php if(old('gender') == 'Female'): ?> checked <?php endif; ?> <?php if(Auth::user()->gender != null): ?> <?php echo e((Auth::user()->gender == 'F') ? "checked" : ""); ?> <?php endif; ?> required>
                                                <label class="form-check-label">Female</label>
                                            </div>
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="gender" value="O" <?php if(old('gender') == 'Other'): ?> checked <?php endif; ?> required>
                                                <label class="form-check-label">Other</label>
                                            </div>
                                    </div>
                                </div>
                                <?php endif; ?>

                            <div class="form-floating col-12">
                                <input type="text" class="form-control text-uppercase" name="id_number" value="<?php echo e(old('id_number')); ?>" required placeholder="ID/PASSPORT/BIRTH CERT">
                                <label class="form-label"><span class="text-danger">*</span> ID/ BIRTH/ PASSPORT NUMBER </label>
                            </div>
                                <?php if(Auth::user()->student_type == 2): ?>
                                    <div class="form-floating col-12">
                                        <input type="email" class="form-control text-lowercase" name="email" value=" <?php if(Auth::user()->email != null): ?> <?php echo e(Auth::user()->email); ?> <?php else: ?> <?php echo e(old('alt_email')); ?> <?php endif; ?>" required placeholder="EMAIL">
                                        <label class="form-label"><span class="text-danger">*</span> EMAIL ADDRESS </label>
                                    </div>
                                <?php else: ?>
                                <div class="form-floating col-12">
                                    <input type="text" class="form-control text-uppercase" name="index_number" value="<?php echo e(old('index_number')); ?>" required placeholder="INDEX">
                                    <label class="form-label" for="index_number"><span class="text-danger">*</span> INDEX/REGISTRATION NUMBER </label>
                                </div>
                                <?php endif; ?>
                                <div class="form-floating col-12">
                                    <input type="text" class="form-control text-uppercase" name="alt_number" value="<?php if(Auth::user()->alt_mobile != null): ?><?php echo e(Auth::user()->alt_mobile); ?><?php else: ?><?php echo e(old('alt_number')); ?><?php endif; ?>" required placeholder="PHONE">
                                    <label class="form-label"><span class="text-danger">*</span> ALTERNATIVE MOBILE NUMBER </label>
                                </div>
                                <div class="form-floating col-12">
                                    <input type="email" class="form-control text-lowercase" name="alt_email" value="<?php if(Auth::user()->alt_email != null): ?><?php echo e(Auth::user()->alt_email); ?><?php else: ?><?php echo e(old('alt_email')); ?><?php endif; ?>" required placeholder="EMAIL">
                                    <label class="form-label"><span class="text-danger">*</span> ALTERNATIVE EMAIL ADDRESS </label>
                                </div>
                                <div class="form-floating col-12">
                                    <input type="text" class="form-control text-uppercase" name="address" value="<?php if(Auth::user()->address != null): ?><?php echo e(Auth::user()->address); ?><?php else: ?><?php echo e(old('address')); ?><?php endif; ?>" required placeholder="BOX">
                                    <label class="form-label"><span class="text-danger">*</span> P.O BOX </label>
                                </div>
                                <div class="form-floating col-12">
                                    <input type="text" class="form-control text-uppercase" name="postalcode" value="<?php if(Auth::user()->postal_code != null): ?><?php echo e(Auth::user()->postal_code); ?><?php else: ?><?php echo e(old('address')); ?><?php endif; ?>" required placeholder="POSTAL">
                                    <label class="form-label">POSTAL CODE <span class="text-danger">*</span></label>
                                </div>
                                <div class="form-floating col-12">
                                    <select class="form-control text-muted" name="nationality" required placeholder="FIRST NAME">
                                        <option value="" selected disabled class="text-center"> - select nationality -</option>
                                        <option value="KE">KENYAN</option>
                                        <option value="UG">UGANDAN</option>
                                        <option value="TZ">TANZANIAN</option>
                                    </select>
                                    <label class="form-label"><span class="text-danger">*</span> NATIONALITY </label>
                                </div>
                                <div class="form-floating col-12">
                                    <input type="text" class="form-control text-uppercase" name="county" required value="<?php echo e(old('county')); ?>" placeholder="COUNTY">
                                    <label class="form-label"><span class="text-danger">*</span> COUNTY </label>
                                </div>
                                <div class="form-floating col-12">
                                    <input type="text" class="form-control text-uppercase" name="subcounty" value="<?php echo e(old('subcounty')); ?>" placeholder="SUB COUNTY" required>
                                    <label class="form-label"><span class="text-danger">*</span> SUB-COUNTY </label>
                                </div>
                                <div class="form-floating col-12">
                                    <input type="text" class="form-control text-uppercase" name="town" required value="<?php if(Auth::user()->town != null): ?><?php echo e(Auth::user()->town); ?><?php else: ?><?php echo e(old('town')); ?><?php endif; ?>" placeholder="TOWN">
                                    <label class="form-label"><span class="text-danger">*</span> TOWN </label>
                                </div>
                            <div class="col-12">
                                <label class="form-label"><span class="text-danger">*</span> ARE YOU DISABLED </label>
                                <div class="space-x-2">
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="disabled" value="No" <?php if(old('disabled') == 'No'): ?> checked <?php endif; ?> required>
                                        <label class="form-check-label">No</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="disabled" value="Yes" <?php if(old('disabled') == 'Yes'): ?> checked <?php endif; ?> required>
                                        <label class="form-check-label">Yes</label>
                                    </div>
                                </div>
                            </div>
                            </div>
                            <div class="desc form-floating col-12 mt-4">
                                <textarea class="form-control" name="disability" rows="4" placeholder="Describe here kind of disability" value="<?php echo e(old('disability')); ?>"></textarea>
                                <label class="form-label" for="disability">Nature of disability</label>
                            </div>
                                <div class="d-flex justify-content-center text-center mt-4">
                                        <button class="col-md-3 btn btn-alt-success" data-toggle="ripple" type="submit"> Update details </button>
                                </div>
                        </form>
                        <!-- END Form Grid with Labels -->
                </div>
            </div>
        </div>
    </div>

    <script>

        $(document).ready(function (){
            $('div.desc').hide();

            $('input[name=disabled]').on('click', function () {
                var selectedValue = $('input[name=disabled]:checked').val();

                if(selectedValue == 'Yes') {
                    $('div.desc').show();
                }else if(selectedValue == 'No'){
                    $('div.desc').hide();
                }
            });
        });

    </script>

    <script src="<?php echo e(url('/js/oneui.app.js')); ?>"></script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('application::layouts.backend', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\smis\application\Modules/Application\Resources/views/applicant/updatePage.blade.php ENDPATH**/ ?>