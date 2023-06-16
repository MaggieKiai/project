@extends('registrar::layouts.backend')

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

@section('content')
    <div class="bg-body-light">
        <div class="content content-full">
            <div class="d-flex flex-column flex-sm-row justify-content-sm-between align-items-sm-center">
                <div class="flex-grow-1">
                    <h5 class="h5 fw-bold mb-0">
                        SCHOOLS
                    </h5>
                </div>
                <nav class="flex-shrink-0 mt-3 mt-sm-0 ms-sm-3" aria-label="breadcrumb">
                    <ol class="breadcrumb breadcrumb-alt">
                        <li class="breadcrumb-item">
                            <a class="link-fx" href="javascript:void(0)">Schools</a>
                        </li>
                        <li class="breadcrumb-item" aria-current="page" >
                            View schools
                        </li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>

          <div class="block block-rounded">
            <div class="block-content block-content-full">
                <div class="row">
                 <div class="col-12 table-responsive">
                    <table id="example" class="table table-bordered table-striped table-vcenter js-dataTable-responsive fs-sm">
                        <span class="d-flex justify-content-end m-2">
                            <a class="btn btn-alt-info btn-sm" href="{{ route('courses.addSchool') }}">Create</a>
                        </span>
                        <thead>
                            <th>#</th>
                            <th>School Code</th>
                            <th>School NAME </th>
                            <th>HISTORY</th>
                            <th>Action</th>
                        </thead>
                        <tbody>@foreach ($data as $school)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td style="text-transform: uppercase"> {{ $school->initials }}</td>
                            <td style="text-transform: uppercase"> {{ $school->name }}</td>
                            <td>
                                <a class="btn btn-sm btn-alt-secondary" href="{{ route('courses.schoolPreview', $school->school_id)}}"> View </a>

                            </td>
                            <td>
                                <a class="btn btn-sm btn-alt-info" href="{{ route('courses.editSchool', $school->school_id) }}"> edit <i class="fa fa-pencil"></i> </a>
{{--                             <a class="btn btn-sm btn-alt-danger" onclick="return confirm('Are you sure you want to delete this school ?')" href="{{ route('courses.destroySchool', $school->id) }}">delete</a> </td>--}}
                        </tr>
                        @endforeach

                        </tbody>
                    </table>
                </div>
            </div>
          </div>
          <!-- Dynamic Table Responsive -->
        </div>
        <!-- END Page Content -->

@endsection
