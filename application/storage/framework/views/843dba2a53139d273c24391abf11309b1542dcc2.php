<script src="https://code.jquery.com/jquery-3.6.2.js" integrity="sha256-pkn2CUZmheSeyssYw3vMp1+xyub4m+e+QK4sQskvuo4=" crossorigin="anonymous"></script>

<?php if($stage != null): ?>


<script>

$(document).ready( function (){

    var type = $('#type').val();

    if(type == 1){

        $(document).on('change', '#newclass', function () {

            var class_code = $('#newclass').val();
            var stage = $('#stage').val();

            console.log(stage);

            $.ajax({

                type: 'get',
                url: '<?php echo e(route('student.getLeaveClasses')); ?>',
                data: { class:class_code, stage:stage },
                dataType: 'json',
                success:function (data){

                    console.log(data)

                    var dates = data.period.split("/");
                    var newDate = dates[dates.length, 0];

                    if(newDate == 'SEP'){

                        console.log('its sept');

                        var years = data.academic_year.split("/");
                        var newYear = years[years.length, 0];

                    }else {

                        console.log('its not sept');

                        var years = data.academic_year.split("/");
                        var newYear = years[years.length, 1];
                    }

                    $('#enddate').val(newYear + '-' + newDate + '-01')
                    // $('#enddate').val(newDate)
                    $('#newClass').val(data.class_code)
                    $('#newacademic').val(data.academic_year)
                    $('#newSemester').val(data.period)
                    $('#newStage').val(data.semester)

                },

                error: function (){

                },

            });

        });
    }else {

        var stage = <?php echo e($stage->year_study.'.'.$stage->semester_study); ?>


        console.log(stage)

        if(stage == 1.1) {

            var studentNumber = '<?php echo e(Auth::guard('student')->user()->loggedStudent->reg_number); ?>'.match(/\//);
            var studNumber = studentNumber.input;

            $.ajax({

                type: 'get',
                url: '<?php echo e(route('student.defermentRequest')); ?>',
                data: {studNumber: studNumber},
                dataType: 'json',
                success: function (data) {

                    var oldclass = data.class_code.split("/")
                    var edittedclass = oldclass[oldclass.length, 1].slice(-4)
                    var newcls = data.class_code.replace(edittedclass, parseInt(edittedclass) + 1)
                    var newyear = data.academic_year.split("/")
                    var yearstart = parseInt(newyear[newyear.length, 0]) + 1
                    var yearend = parseInt(newyear[newyear.length, 1]) + 1
                    var enddates = data.academic_semester.split("/")
                    var dated = enddates[enddates.length, 0]


                    console.log(yearend);

                    $('#mynewclass').val(newcls)
                    $('#newClass').val(newcls)
                    $('#newStage').val(data.year_study + '.' + data.semester_study)
                    $('#newSemester').val(data.academic_semester)
                    $('#newacademic').val(yearstart + '/' + yearend)
                    $('#enddate').val(yearstart + '-' + dated + '-01')
                }

            });

        }else {

            console.log('hello')

            var studentNumber = '<?php echo e(Auth::guard('student')->user()->loggedStudent->reg_number); ?>'.match(/\//);
            var studNumber = studentNumber.input;

            var semesters = ['SEP/DEC', 'JAN/APR', 'MAY/AUG'];

            console.log(semesters)

            $.ajax({

                type: 'get',
                url: '<?php echo e(route('student.defermentRequest')); ?>',
                data: {studNumber: studNumber},
                dataType: 'json',
                success: function (data) {

                    var oldclass = data.class_code.split("/")
                    var edittedclass = oldclass[oldclass.length, 1].slice(-4)
                    var newcls = data.class_code.replace(edittedclass, parseInt(edittedclass) + 1)
                    var newyear = data.academic_year.split("/")
                    var yearstart = parseInt(newyear[newyear.length, 0]) + 1
                    var yearend = parseInt(newyear[newyear.length, 1]) + 1
                    var enddates = data.academic_semester.split("/")
                    var dated = enddates[enddates.length, 0]

                    console.log(data.academic_semester)


                    index = semesters.indexOf(data.academic_semester);
                    if(index >= 0 && index < semesters.length - 1)
                        nextItem = semesters[index + 1]

                    var newsemesters = nextItem.split("/");

                        console.log(nextItem);

                    $('#mynewclass').val(newcls)
                    $('#newClass').val(newcls)
                    $('#newStage').val(stage)
                    $('#newSemester').val(nextItem)
                    $('#newacademic').val(yearstart + '/' + yearend)
                    $('#enddate').val(yearend + '-' + newsemesters[newsemesters.length, 0] + '-01')
                }

            });
        }
    }

});
</script>
 
<?php endif; ?>

<?php $__env->startSection('content'); ?>

    <div class="bg-body-light">
        <div class="content content-full">
            <div class="d-flex flex-column flex-sm-row justify-content-sm-between align-items-sm-center py-1">
                <div class="flex-grow-1">
                    <h5 class="h5 fw-bold mb-0">
                        ACADEMIC LEAVES
                    </h5>
                </div>
                <nav class="flex-shrink-0 mt-0 mt-sm-0 ms-sm-3" aria-label="breadcrumb">
                    <ol class="breadcrumb breadcrumb-alt">
                        <li class="breadcrumb-item">
                            <a class="link-fx" href="<?php echo e(route('student')); ?>">Dashboard</a>
                        </li>
                        <li class="breadcrumb-item" aria-current="page">
                            REQUEST ACADEMIC LEAVE/DEFERMENT
                        </li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>

    <!-- Floating Labels -->
    <div class="block block-rounded">
        <div class="block-content block-content-full">

            <!-- Labels on top -->
            <div class="block block-rounded">
                <div class="block-content block-content-full">
                    <div class="row">
                        <div class="col-lg-6">
                            <fieldset class="border p-2" style="height: 100% !important;">
                                <legend class="float-none w-auto"><h6 class="fw-bold text-center"> CURRENT STUDENT COURSE DETAILS</h6></legend>
                            <div class="mb-4">
                                <span class="h5 fs-sm">STUDENT NAME : </span>
                                <span class="h6 fs-sm fw-normal"> <?php echo e(Auth::guard('student')->user()->loggedStudent->sname); ?> <?php echo e(Auth::guard('student')->user()->loggedStudent->fname); ?> <?php echo e(Auth::guard('student')->user()->loggedStudent->mname); ?> </span>
                            </div>
                            <div class="mb-4">
                                <span class="h5 fs-sm">PHONE NUMBER : </span>
                                <span class="h6 fs-sm fw-normal"> <?php echo e(Auth::guard('student')->user()->loggedStudent->mobile); ?> </span>
                            </div>
                            <div class="mb-4">
                                <span class="h5 fs-sm">EMAIL ADDRESS : </span>
                                <span class="h6 fs-sm fw-normal"> <?php echo e(Auth::guard('student')->user()->loggedStudent->email); ?> </span>
                            </div>
                            <div class="mb-4">
                                <span class="h5 fs-sm">PHYSICAL ADDRESS : </span>
                                <span class="h6 fs-sm fw-normal"> P.O BOX <?php echo e(Auth::guard('student')->user()->loggedStudent->address); ?>-<?php echo e(Auth::guard('student')->user()->loggedStudent->postal_code); ?> <?php echo e(Auth::guard('student')->user()->loggedStudent->town); ?></span>
                            </div>
                            <div class="mb-4">
                                <span class="h5 fs-sm">REG. NUMBER : </span>
                                <span class="h6 fs-sm fw-normal"> <?php echo e(Auth::guard('student')->user()->loggedStudent->reg_number); ?> </span>
                            </div>
                            <div class="mb-4">
                                <span class="h5 fs-sm">COURSE ADMITTED : </span>
                                <span class="h6 fs-sm fw-normal"> <?php echo e(Auth::guard('student')->user()->loggedStudent->courseStudent-> studentCourse->course_name); ?> </span>
                            </div>

                            <div class="mb-4">
                                    <span class="h5 fs-sm">COURSE ADMITTED : </span>
                                    <span class="h6 fs-sm fw-normal"> <?php echo e(Auth::guard('student')->user()->loggedStudent->courseStudent->class_code); ?> </span>
                            </div>

                            <div class="mb-4">
                                <?php if(Auth::guard('student')->user()->loggedStudent->nominalRoll == null): ?>
                                    <span class="text-warning">
                                        Not registered
                                    </span>
                                <?php else: ?>
                                <span class="h5 fs-sm"> YEAR OF STUDY : </span>
                                <span class="h6 fs-sm fw-normal"> <?php echo e($stage->year_study); ?></span>

                                <span class="h5 fs-sm"> SEMESTER OF STUDY : </span>
                                <span class="h6 fs-sm fw-normal"> <?php echo e($stage->semester_study); ?> (<?php echo e($stage->patternRoll->season); ?>)</span>
                                <?php endif; ?>
                            </div>
                            </fieldset>
                        </div>
                        <div class="col-lg-6 space-y-4">
                            <fieldset class="border p-2" style="height: 100% !important;">
                                <legend class="float-none w-auto">
                                    <h5 class="fw-bold text-center"> LEAVE/DEFERMENT DETAILS</h5>
                                </legend>
                                <?php if(Auth::guard('student')->user()->loggedStudent->nominalRoll == null): ?>
                                    <span class="text-warning">
                                        You cannot apply for leave unless you are registered
                                    </span>
                            <?php else: ?>
                            <!-- Form Labels on top - Default Style -->
                            <form action="<?php echo e(route('student.submitacademicleaverequest')); ?>" method="POST">
                                <?php echo csrf_field(); ?>
                                <div class="form-floating mb-2">
                                    <select name="type" id="type" class="form-control form-control-lg form-select mb-2 department" readonly="">
                                        <?php if($stage->year_study.'.'.$stage->semester_study > 1.2): ?>
                                            <option value="1">ACADEMIC LEAVE </option>
                                        <?php else: ?>
                                            <option value="2">DEFERMENT</option>
                                        <?php endif; ?>
                                    </select>
                                    <label>LEAVE TYPE</label>
                                </div>
                                <div class="form-floating mb-2">
                                    <?php if($stage->year_study.'.'.$stage->semester_study > 1.2): ?>
                                    <select name="class" id="newclass" class="form-control form-select">
                                        <option selected disabled class="text-center"> -- choose class -- </option>
                                        <?php $__currentLoopData = $classes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $class): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <?php $__currentLoopData = $class; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $name => $newClass): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <option ><?php echo e($name); ?></option>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </select>
                                    <input type="hidden" name="stage" id="stage" value="<?php echo e($stage->year_study.'.'.$stage->semester_study); ?>">
                                    <label>UPCOMING CLASSES </label>
                                    <?php else: ?>
                                    <input type="text" readonly class="form-control" name="class" id="mynewclass">
                                    <label>UPCOMING CLASSES </label>
                                    <?php endif; ?>
                                </div>
                                <div class="form-floating mb-2">
                                    <input type="text" name="start_date" value="<?php echo e(\Carbon\Carbon::now()->format('Y-M-d')); ?>" class="form-control" readonly>
                                    <label>LEAVE START DATE</label>
                                </div>

                                <div class="form-floating mb-2">
                                    <input type="text" name="end_date" id="enddate" value="<?php echo e(old('end_date')); ?>" class="form-control" readonly>
                                    <label>LEAVE END DATE</label>
                                </div>

                                <div class="d-flex justify-content-center mb-2">
                                    <div class="col-md-10">
                                        <div class="row mb-1">
                                            <div class="col-md-6 fs-sm fw-semibold">New Class Code</div>
                                            <div class="col-md-6">
                                                <input type="text" name="newClass" id="newClass" readonly style="outline: none; border: none transparent;">
                                            </div>
                                        </div>

                                        <div class="row mb-1">
                                            <div class="col-md-6 fs-sm fw-semibold">Academic Year </div>
                                            <div class="col-md-6">
                                                <input type="text" name="newAcademic" id="newacademic" readonly style="outline: none; border: none transparent;">
                                            </div>
                                        </div>

                                        <div class="row mb-1 ">
                                            <div class="col-md-6 fs-sm fw-semibold">Semester of Study</div>
                                            <div class="col-md-6">
                                                <input type="text" name="newSemester" id="newSemester" readonly style="outline: none; border: none transparent;">
                                            </div>
                                        </div>

                                        <div class="row mb-1 ">
                                            <div class="col-md-6 fs-sm fw-semibold">Joint at Stage</div>
                                            <div class="col-md-6">
                                                <input type="text" name="newStage" id="newStage" readonly style="outline: none; border: none transparent;">
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <input type="hidden" name="current_class" value="<?php echo e(Auth::guard('student')->user()->loggedStudent->courseStudent->class_code); ?> ">

                                <div class="form-floating mb-2">
                                    <textarea class="form-control" style="height: 100px;" name="reason" placeholder="reasons"><?php echo e(old('reason')); ?></textarea>
                                    <label>Reason for requesting leave</label>
                                </div>
                                <div class="mb-2">
                                    <div class="d-flex justify-content-center">
                                        <?php if($event == null): ?>
                                            <button class="btn btn-outline-primary col-md-10 disabled m-2" >NOT SCHEDULED</button>
                                        <?php else: ?>
                                            <?php if($event->start_date > $dates): ?>

                                                <button class="btn btn-outline-info col-md-10 disabled m-2" >SCHEDULE TO OPENS ON <?php echo e(\Carbon\Carbon::parse($event->start_date)->format('D, d-M-Y')); ?> </button>
                                            
                                            <?php elseif($event->end_date >= $dates): ?>

                                                <button class="btn btn-outline-success col-md-10 m-2" >SUBMIT LEAVE REQUEST</button>

                                            <?php else: ?>
                                                <button class="btn btn-outline-danger col-md-10 disabled m-2" >SCHEDULE CLOSED <?php echo e(\Carbon\Carbon::parse($event->end_date)->format('D, d-M-Y')); ?> </button>
                                            <?php endif; ?>
                                        <?php endif; ?>
                                    </div>
                                </div>
                            </form>
                            <!-- END Form Labels on top - Default Style -->
                                <?php endif; ?>
                            </fieldset>
                        </div>
                    </div>
                </div>
                <!-- END Labels on top -->
            </div>
        </div>
    </div>
    <!-- END Floating Labels -->
<?php $__env->stopSection(); ?>

<?php echo $__env->make('student::layouts.backend', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/Courses/application/Modules/Student/Resources/views/academic/requestleave.blade.php ENDPATH**/ ?>