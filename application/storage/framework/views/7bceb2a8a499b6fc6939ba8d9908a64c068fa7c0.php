<!doctype html>
<html lang="<?php echo e(config('app.locale')); ?>">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">

  <title><?php echo e(config('app.name')); ?></title>

  <meta name="description" content="OneUI - Bootstrap 5 Admin Template &amp; UI Framework created by pixelcave and published on Themeforest">
  <meta name="author" content="pixelcave">
  <meta name="robots" content="noindex, nofollow">

  <!-- CSRF Token -->
  <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">

  <!-- Icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.1.3/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.12.1/css/dataTables.bootstrap5.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/searchbuilder/1.3.4/css/searchBuilder.bootstrap5.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/datetime/1.1.2/css/dataTables.dateTime.min.css">

  <link rel="shortcut icon" href="<?php echo e(asset('media/favicons/favicon.png')); ?>">
  <link rel="icon" sizes="192x192" type="image/png" href="<?php echo e(asset('media/favicons/favicon-192x192.png')); ?>">
  <link rel="apple-touch-icon" sizes="180x180" href="<?php echo e(asset('media/favicons/apple-touch-icon-180x180.png')); ?>">

  <!-- Fonts and Styles -->
  <?php echo $__env->yieldContent('css_before'); ?>
  <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap">
  <link rel="stylesheet" id="css-main" href="<?php echo e(url('/css/oneui.css')); ?>">

  <!-- You can include a specific file from public/css/themes/ folder to alter the default color theme of the template. eg: -->
  <!-- <link rel="stylesheet" id="css-theme" href="<?php echo e(mix('/css/themes/amethyst.css')); ?>"> -->
  <?php echo $__env->yieldContent('css_after'); ?>

  <!-- Scripts -->
  <script>
    window.Laravel = <?php echo json_encode(['csrfToken' => csrf_token()]); ?>;
  </script>








    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>

</head>

<body>
  <!-- Page Container -->
  <!--
    Available classes for #page-container:

    GENERIC

      'remember-theme'                            Remembers active color theme and dark mode between pages using localStorage when set through
                                                  - Theme helper buttons [data-toggle="theme"],
                                                  - Layout helper buttons [data-toggle="layout" data-action="dark_mode_[on/off/toggle]"]
                                                  - ..and/or One.layout('dark_mode_[on/off/toggle]')

    SIDEBAR & SIDE OVERLAY

      'sidebar-r'                                 Right Sidebar and left Side Overlay (default is left Sidebar and right Side Overlay)
      'sidebar-mini'                              Mini hoverable Sidebar (screen width > 991px)
      'sidebar-o'                                 Visible Sidebar by default (screen width > 991px)
      'sidebar-o-xs'                              Visible Sidebar by default (screen width < 992px)
      'sidebar-dark'                              Dark themed sidebar

      'side-overlay-hover'                        Hoverable Side Overlay (screen width > 991px)
      'side-overlay-o'                            Visible Side Overlay by default

      'enable-page-overlay'                       Enables a visible clickable Page Overlay (closes Side Overlay on click) when Side Overlay opens

      'side-scroll'                               Enables custom scrolling on Sidebar and Side Overlay instead of native scrolling (screen width > 991px)

    HEADER

      ''                                          Static Header if no class is added
      'page-header-fixed'                         Fixed Header

    HEADER STYLE

      ''                                          Light themed Header
      'page-header-dark'                          Dark themed Header

    MAIN CONTENT LAYOUT

      ''                                          Full width Main Content if no class is added
      'main-content-boxed'                        Full width Main Content with a specific maximum width (screen width > 1200px)
      'main-content-narrow'                       Full width Main Content with a percentage width (screen width > 1200px)

    DARK MODE

      'sidebar-dark page-header-dark dark-mode'   Enable dark mode (light sidebar/header is not supported with dark mode)
    -->
  <div id="page-container" class="sidebar-o enable-page-overlay sidebar-dark side-scroll page-header-fixed main-content-narrow">
    <!-- Side Overlay-->
    <aside id="side-overlay" class="fs-sm" style="background-color: gold !important;">
      <!-- Side Header -->
      <div class="content-header border-bottom">
        <!-- User Avatar -->
        <a class="img-link me-1" href="javascript:void(0)">
          <img class="img-avatar img-avatar32" src="<?php echo e(asset('media/avatars/male.jpg')); ?>" alt="">
        </a>
        <!-- END User Avatar -->

          <?php

          $user = Auth::guard('student')->user();

          ?>

        <!-- User Info -->
        <div class="ms-2">
          <a class="text-dark fw-semibold fs-sm" href="javascript:void(0)"><?php echo e($user); ?></a>
        </div>
        <!-- END User Info -->

        <!-- Close Side Overlay -->
        <!-- Layout API, functionality initialized in Template._uiApiLayout() -->
        <a class="ms-auto btn btn-sm btn-alt-danger" href="javascript:void(0)" data-toggle="layout" data-action="side_overlay_close">
          <i class="fa fa-fw fa-times"></i>
        </a>
        <!-- END Close Side Overlay -->
      </div>
      <!-- END Side Header -->

      <!-- Side Content -->
      <div class="content-side">
        <p>
          Content..
        </p>
      </div>
      <!-- END Side Content -->
    </aside>
    <!-- END Side Overlay -->

    <!-- Sidebar -->
    <!--
        Sidebar Mini Mode - Display Helper classes

        Adding 'smini-hide' class to an element will make it invisible (opacity: 0) when the sidebar is in mini mode
        Adding 'smini-show' class to an element will make it visible (opacity: 1) when the sidebar is in mini mode
            If you would like to disable the transition animation, make sure to also add the 'no-transition' class to your element

        Adding 'smini-hidden' to an element will hide it when the sidebar is in mini mode
        Adding 'smini-visible' to an element will show it (display: inline-block) only when the sidebar is in mini mode
        Adding 'smini-visible-block' to an element will show it (display: block) only when the sidebar is in mini mode
    -->
    <nav id="sidebar" aria-label="Main Navigation">
      <!-- Side Header -->
      <div class="content-header">
        <!-- Logo -->
        <a class="font-semibold text-dual" href="#">
          <span class="smini-visible">
            <i class="fa fa-circle-notch text-primary"></i>
          </span>
          <span class="smini-hide fs-5 tracking-wider"><span class="fw-normal"><?php echo e(config('app.name')); ?></span></span>
        </a>
        <!-- END Logo -->

        <!-- Extra -->
        <div>
          <!-- Close Sidebar, Visible only on mobile screens -->
          <!-- Layout API, functionality initialized in Template._uiApiLayout() -->
          <a class="d-lg-none btn btn-sm btn-alt-secondary ms-1" data-toggle="layout" data-action="sidebar_close" href="javascript:void(0)">
            <i class="fa fa-fw fa-times"></i>
          </a>
          <!-- END Close Sidebar -->
        </div>
        <!-- END Extra -->
      </div>
      <!-- END Side Header -->

      <!-- Sidebar Scrolling -->
      <div class="js-sidebar-scroll">
        <!-- Side Navigation -->
        <div class="content-side">
          <ul class="nav-main">
            <li class="nav-main-item">
              <a class="nav-main-link<?php echo e(request()->is('dashboard') ? ' active' : ''); ?>" href="<?php echo e(route('student')); ?>">
                <i class="nav-main-link-icon si si-cursor"></i>
                <span class="nav-main-link-name">Home </span>
              </a>
            </li>
            <li class="nav-main-item<?php echo e(request()->is('pages/*') ? ' open' : ''); ?>">
              <a class="nav-main-link nav-main-link-submenu" data-toggle="submenu" aria-haspopup="true" aria-expanded="true" href="#">
                <i class="nav-main-link-icon si si-bulb"></i>
                <span class="nav-main-link-name">Courses</span>
              </a>
                <ul class="nav-main-submenu">
                    <li class="nav-main-item">
                        <a class="nav-main-link<?php echo e(request()->is('pages/datatables') ? ' active' : ''); ?>" href="<?php echo e(route('student.mycourses')); ?>">
                            <span class="nav-main-link-name">My Course</span>
                        </a>
                    </li>
                </ul>
                
              
                    <ul class="nav-main-submenu">
                        <li class="nav-main-item">
                            <a class="nav-main-link<?php echo e(request()->is('pages/datatables') ? ' active' : ''); ?>" href="<?php echo e(route('student.coursetransfers')); ?>">
                                <span class="nav-main-link-name">Course Transfer</span>
                            </a>
                        </li>
                    </ul>
                
            </li>

              <li class="nav-main-item<?php echo e(request()->is('pages/*') ? ' open' : ''); ?>">
                  <a class="nav-main-link nav-main-link-submenu" data-toggle="submenu" aria-haspopup="true" aria-expanded="true" href="#">
                      <i class="nav-main-link-icon si si-bulb"></i>
                      <span class="nav-main-link-name">Academics</span>
                  </a>
                  <ul class="nav-main-submenu">
                      <li class="nav-main-item">
                          <a class="nav-main-link<?php echo e(request()->is('pages/datatables') ? ' active' : ''); ?>" href="<?php echo e(route('student.unitregistration')); ?>">
                              <span class="nav-main-link-name">Semester Registration</span>
                          </a>
                      </li>
                  </ul>

                  <ul class="nav-main-submenu">
                      <li class="nav-main-item">
                          <a class="nav-main-link<?php echo e(request()->is('pages/datatables') ? ' active' : ''); ?>" href="<?php echo e(route('student.requestacademicleave')); ?>">
                              <span class="nav-main-link-name">Academic Leave</span>
                          </a>
                      </li>
                  </ul>

                  <ul class="nav-main-submenu">
                      <li class="nav-main-item">
                          <a class="nav-main-link<?php echo e(request()->is('pages/datatables') ? ' active' : ''); ?>" href="<?php echo e(route('student.requestreadmission')); ?>">
                              <span class="nav-main-link-name">Readmission</span>
                          </a>
                      </li>
                  </ul>

                  <ul class="nav-main-submenu">
                      <li class="nav-main-item">
                          <a class="nav-main-link<?php echo e(request()->is('pages/datatables') ? ' active' : ''); ?>" href="<?php echo e(route('student.discontinuationstatus')); ?>">
                              <span class="nav-main-link-name">My Status</span>
                          </a>
                      </li>
                  </ul>
              </li>

              <li class="nav-main-item<?php echo e(request()->is('pages/*') ? ' open' : ''); ?>">
                  <a class="nav-main-link nav-main-link-submenu" data-toggle="submenu" aria-haspopup="true" aria-expanded="true" href="#">
                      <i class="nav-main-link-icon si si-bulb"></i>
                      <span class="nav-main-link-name">Examination</span>
                  </a>
                  <ul class="nav-main-submenu">
                      <li class="nav-main-item">
                          <a class="nav-main-link<?php echo e(request()->is('pages/datatables') ? ' active' : ''); ?>" href="<?php echo e(route('student.examresults')); ?>">
                              <span class="nav-main-link-name">Exam Results</span>
                          </a>
                      </li>
                  </ul>
                  <ul class="nav-main-submenu">
                      <li class="nav-main-item">
                          <a class="nav-main-link<?php echo e(request()->is('pages/datatables') ? ' active' : ''); ?>" href="<?php echo e(route('student.retakes')); ?>">
                              <span class="nav-main-link-name">Apply Retakes</span>
                          </a>
                      </li>
                  </ul>
              </li>

              <li class="nav-main-item<?php echo e(request()->is('pages/*') ? ' open' : ''); ?>">
                  <a class="nav-main-link nav-main-link-submenu" data-toggle="submenu" aria-haspopup="true" aria-expanded="true" href="#">
                      <i class="nav-main-link-icon si si-bulb"></i>
                      <span class="nav-main-link-name">Finance</span>
                  </a>
                  <ul class="nav-main-submenu">
                      <li class="nav-main-item">
                          <a class="nav-main-link<?php echo e(request()->is('pages/datatables') ? ' active' : ''); ?>" href="<?php echo e(route('student.feesstatement')); ?>">
                              <span class="nav-main-link-name">Fee Statement</span>
                          </a>
                      </li>
                  </ul>
              </li>

              <li class="nav-main-item">
                  <a class="nav-main-link<?php echo e(request()->is('dashboard') ? ' active' : ''); ?>" href="<?php echo e(route('student.myprofile')); ?>">
                      <i class="nav-main-link-icon si si-cursor"></i>
                      <span class="nav-main-link-name">My Profile </span>
                  </a>
              </li>
          </ul>
        </div>
        <!-- END Side Navigation -->
      </div>
      <!-- END Sidebar Scrolling -->
    </nav>
    <!-- END Sidebar -->

    <!-- Header -->
    <header id="page-header" style="background-color: #d89837 !important">
      <!-- Header Content -->
      <div class="content-header">
        <!-- Left Section -->
        <div class="d-flex align-items-center">
          <!-- Toggle Sidebar -->
          <!-- Layout API, functionality initialized in Template._uiApiLayout()-->
          <button type="button" class="btn btn-sm btn-alt-secondary me-2 d-lg-none" data-toggle="layout" data-action="sidebar_toggle">
            <i class="fa fa-fw fa-bars"></i>
          </button>
          <!-- END Toggle Sidebar -->

          <!-- Toggle Mini Sidebar -->
          <!-- Layout API, functionality initialized in Template._uiApiLayout()-->
          <button type="button" class="btn btn-sm btn-alt-dark me-2 d-none d-lg-inline-block" data-toggle="layout" data-action="sidebar_mini_toggle">
            <i class="fa fa-fw fa-list-ul fa-flip-horizontal"></i>
          </button>
          <!-- END Toggle Mini Sidebar -->
        </div>
        <!-- END Left Section -->

        <!-- Right Section -->
        <div class="d-flex align-items-center">
          <!-- User Dropdown -->
          <div class="dropdown d-inline-block ms-2">
            <button type="button" class="btn btn-sm btn-alt-dark d-flex align-items-center" id="page-header-user-dropdown" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              <img class="rounded-circle" src="<?php echo e(asset('media/avatars/male.jpg')); ?>" alt="Header Avatar" style="width: 21px;">
              <span class="d-none d-sm-inline-block ms-2"> <?php echo e($user->loggedStudent->title); ?> <?php echo e($user->loggedStudent->sname); ?></span>
              <i class="fa fa-fw fa-angle-down d-none d-sm-inline-block ms-1 mt-1"></i>
            </button>
            <div class="dropdown-menu dropdown-menu-md dropdown-menu-end p-0 border-0" aria-labelledby="page-header-user-dropdown">
              <div class="p-3 text-center bg-body-light border-bottom rounded-top">
                <img class="img-avatar img-avatar48 img-avatar-thumb" src="<?php echo e(asset('media/avatars/ava.jpg')); ?>" alt="">
                <p class="mt-2 mb-0 fw-medium"><?php echo e($user->loggedStudent->fname); ?> <?php echo e($user->loggedStudent->mnane); ?> <?php echo e($user->loggedStudent->sname); ?></p>
                <p class="mb-0 text-muted fs-sm fw-medium">Student</p>
              </div>
              <div class="p-2">




                <a class="dropdown-item d-flex align-items-center justify-content-between" href="javascript:void(0)">
                  <span class="fs-sm fw-medium">Profile</span>
                  <span class="badge rounded-pill bg-primary ms-2">1</span>
                </a>
              </div>
              <div role="separator" class="dropdown-divider m-0"></div>
              <div class="p-2">



                <a class="dropdown-item d-flex align-items-center justify-content-between" href="<?php echo e(route('application.logout')); ?>">
                  <span class="fs-sm fw-medium">Log Out</span>
                </a>
              </div>
            </div>
          </div>
          <!-- END User Dropdown -->

          <!-- Notifications Dropdown -->




















































































          <!-- END Notifications Dropdown -->

          <!-- Toggle Side Overlay -->
          <!-- Layout API, functionality initialized in Template._uiApiLayout() -->



          <!-- END Toggle Side Overlay -->
        </div>
        <!-- END Right Section -->
      </div>
      <!-- END Header Content -->

      <!-- Header Search -->
      <div id="page-header-search" class="overlay-header bg-body-extra-light">
        <div class="content-header">
          <form class="w-100" action="/dashboard" method="POST">
            <?php echo csrf_field(); ?>
            <div class="input-group">
              <!-- Layout API, functionality initialized in Template._uiApiLayout() -->
              <button type="button" class="btn btn-alt-danger" data-toggle="layout" data-action="header_search_off">
                <i class="fa fa-fw fa-times-circle"></i>
              </button>
              <input type="text" class="form-control" placeholder="Search or hit ESC.." id="page-header-search-input" name="page-header-search-input">
            </div>
          </form>
        </div>
      </div>
      <!-- END Header Search -->

      <!-- Header Loader -->
      <!-- Please check out the Loaders page under Components category to see examples of showing/hiding it -->
      <div id="page-header-loader" class="overlay-header bg-body-extra-light">
        <div class="content-header">
          <div class="w-100 text-center">
            <i class="fa fa-fw fa-circle-notch fa-spin"></i>
          </div>
        </div>
      </div>
      <!-- END Header Loader -->
    </header>
    <!-- END Header -->

    <!-- Main Container -->
    <main id="main-container">
    <?php $__env->startSection('css_before'); ?>
        <!-- Page JS Plugins CSS -->
            <link rel="stylesheet" href="<?php echo e(url('js/plugins/datatables-bs5/css/dataTables.bootstrap5.min.css')); ?>">
            <link rel="stylesheet" href="<?php echo e(url('js/plugins/datatables-buttons-bs5/css/buttons.bootstrap5.min.css')); ?>">
    <?php $__env->stopSection(); ?>

    <?php $__env->startSection('js_after'); ?>
        <!-- jQuery (required for DataTables plugin) -->
            <script src="<?php echo e(url('js/lib/jquery.min.js')); ?>"></script>

            <!-- Page JS Plugins -->
            <script src="<?php echo e(url('js/plugins/datatables/jquery.dataTables.min.js')); ?>"></script>
            <script src="<?php echo e(url('js/plugins/datatables-bs5/js/dataTables.bootstrap5.min.js')); ?>"></script>
            <script src="<?php echo e(url('js/plugins/datatables-buttons/dataTables.buttons.min.js')); ?>"></script>
            <script src="<?php echo e(url('js/plugins/datatables-buttons-bs5/js/buttons.bootstrap5.min.js')); ?>"></script>
            <script src="<?php echo e(url('js/plugins/datatables-buttons-jszip/jszip.min.js')); ?>"></script>
            <script src="<?php echo e(url('js/plugins/datatables-buttons-pdfmake/pdfmake.min.js')); ?>"></script>
            <script src="<?php echo e(url('js/plugins/datatables-buttons-pdfmake/vfs_fonts.js')); ?>"></script>
            <script src="<?php echo e(url('js/plugins/datatables-buttons/buttons.print.min.js')); ?>"></script>
            <script src="<?php echo e(url('js/plugins/datatables-buttons/buttons.html5.min.js')); ?>"></script>

            <!-- Page JS Code -->
            <script src="<?php echo e(url('js/pages/tables_datatables.js')); ?>"></script>
        <?php $__env->stopSection(); ?>
      <?php echo $__env->yieldContent('content'); ?>
      <?php echo $__env->make('application::messages.notification', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    </main>
    <!-- END Main Container -->

    <!-- Footer -->
    <footer id="page-footer" style="background-color: rgba(0,0,0,0.7) !important; color: snow !important;">
      <div class="content py-3">
        <div class="row fs-sm">
          <div class="col-sm-6 order-sm-2 py-1 text-center text-sm-end">
            Designed by <a class="fw-semibold" style="color: gold !important;" href="https://support.tum.ac.ke/" target="_blank">TUM ICTS</a>
          </div>
          <div class="col-sm-6 order-sm-1 py-1 text-center text-sm-start">
            <a class="fw-semibold" style="color: gold !important;" href="https://www.tum.ac.ke/" target="_blank">Technical University of Mombasa</a> &copy; <span data-toggle="year-copy"></span>
          </div>
        </div>
      </div>
    </footer>
    <!-- END Footer -->
  </div>
  <!-- END Page Container -->

  <!-- OneUI Core JS -->
  <script src="<?php echo e(url('/js/oneui.app.js')); ?>"></script>

  <!-- Laravel Scaffolding JS -->
  <!-- <script src="<?php echo e(mix('/js/laravel.app.js')); ?>"></script> -->

  <?php echo $__env->yieldContent('js_after'); ?>
</body>

</html>
<?php /**PATH /var/www/html/Registrar/application/Modules/Student/Resources/views/layouts/backend.blade.php ENDPATH**/ ?>