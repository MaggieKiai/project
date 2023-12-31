@extends('registrar::layouts.backend')

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.1.3/css/bootstrap.min.css">
<link rel="stylesheet" href="https://cdn.datatables.net/1.12.1/css/dataTables.bootstrap5.min.css">

<link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.3.0/css/responsive.dataTables.min.css">
<link rel="stylesheet" href="https://cdn.datatables.net/rowgroup/1.2.0/css/rowGroup.dataTables.min.css">

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
        <div class="d-flex flex-column flex-sm-row justify-content-sm-between align-items-sm-center py-0">
            <div class="flex-grow-1">
                <h5 class="h5 fw-bold mb-0">
                    SEMESTERS
                </h5>
            </div>
            <nav class="flex-shrink-0 mt-3 mt-sm-0 ms-sm-3" aria-label="breadcrumb">
                <ol class="breadcrumb breadcrumb-alt">
                    <li class="breadcrumb-item">
                        <a class="link-fx" href="javascript:void(0)">Semester Year</a>
                    </li>
                    <li class="breadcrumb-item" aria-current="page">
                        View Semester Year
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
        <table id="example" class="table table-sm table-bordered table-striped fs-sm">
          <span class="d-flex justify-content-end m-2">
            <a class="btn btn-alt-info btn-sm" href="{{ route('courses.addIntake', $year->year_id) }}">Create</a>
        </span>
          <thead>
            <tr>
                <th> # </th>
              <th>SEMESTERS </th>
              <th>SEMESTER DATES</th>
              <th>STATUS</th>
              <th>Action</th>
            </tr>
          </thead>
          <tbody>

            @foreach ($intakes as $key => $intake)

            <tr>
                <td>{{ ++$key }}</td>
               <td style="text-transform: uppercase" class="fw-semibold fs-sm">
                   {{ Carbon\carbon::parse($intake->intake_from)->format('M Y') }}
               </td>
                <td>
                    <b>From :</b> {{ Carbon\carbon::parse($intake->intake_from)->format('d-M-Y') }} <b>To :</b> {{ Carbon\carbon::parse($intake->intake_to)->format('d-M-Y') }}
                </td>
               <td>
                @if ($intake->status == 0)
                       <span class="badge bg-info">Pending</span>
                   @elseif($intake->status == 1)
                        <span class="badge bg-primary">Active</span>
                   @elseif ($intake->status == 2)
                        <span class="badge bg-success"> Completed </span>
                   @elseif ($intake->status == 3)
                        <span class="badge bg-danger">Suspended</span>
                @endif
                    <a class="link-primary " href="{{ route('courses.editstatusIntake', $intake->intake_id) }}">
                        change status <i class="fa fa-pencil"></i>
                    </a>
                 </td>
                 <td>
                    <a class="btn btn-sm btn-alt-info" href="{{ route('courses.editIntake', $intake->intake_id) }}">edit</a>
                  </td>
            </tr>
            @endforeach
          </tbody>

        </table>
        </div>
      </div>
    </div>
    <!-- Dynamic Table Responsive -->
  </div>
@endsection

