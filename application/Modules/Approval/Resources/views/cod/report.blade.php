@extends('approval::layouts.backend')
@section('content')
    <!-- Page Content -->
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <link href="{{ asset('css/index.css') }}" rel="stylesheet" />
    <link href="{{ asset('css/admissions.css') }}" rel="stylesheet" />
    <script src = "{{ asset('js/utils.js') }}" ></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/html2pdf.js/0.10.1/html2pdf.bundle.min.js" integrity="sha512-GsLlZN/3F2ErC5ifS5QtgpiJtWd43JWSuIgh7mbzZ8zBps+dvLusV+eNQATqgA/HdeKFVgA5v3S/cIrLF7QnIg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src = "{{ asset('js/jquery.js') }}" ></script>
<div class="bg-body-light">
    <div class="content content-full">
        <div class = "d-flex flex-column flex-sm-row justify-content-sm-between align-items-sm-center py-2">
            <div class="flex-grow-1">
                <h1 class="h5 fw-bold mb-2">
                    INTAKES
                </h1>
            </div>
            <nav class = "flex-shrink-0 mt-3 mt-sm-0 ms-sm-3" aria-label = "breadcrumb">
                <ol class = "breadcrumb breadcrumb-alt">
                    <li class = "breadcrumb-item">
                        <a class = "link-fx" href = "javascript:void(0)">Location</a>
                    </li>
                    <li class = "breadcrumb-item" aria-current = "page">
                        COURSES REPORT
                    </li>
                </ol>
            </nav>
        </div>
    </div>
</div>
    <div class = "content-force">
        <div id = 'course-section'>
            <section>
                <p>Select Course <i class="fa-solid fa-book" style="font-size:120%;"></i> <select class = 'select_approve' id = 'all_course' name = 'all_intake'></select></p>
            </section>
            <button id = 'print-year' class = 'btn btn-info'><i class="fa-solid fa-file-pdf" style="font-size:120%;"></i> Print</button>
        </div>
        <div id = 'report-page'></div>
    </div>
    <!-- END Page Content -->
    <script src = "{{ asset('js/select.js') }}" defer></script>
    <script src = "{{ asset('js/build.js') }}"></script>
    <script>
        showReport();
    </script>

@endsection
