@extends('cod::layouts.backend')
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
            <div class="d-flex flex-column flex-sm-row justify-content-sm-between align-items-sm-center py-0">
                <div class="flex-grow-0">
                    <h5 class="h5 fw-bold mb-0">
                        EXAMINATION
                    </h5>
                </div>
                <nav class="flex-shrink-0 mt-3 mt-sm-0 ms-sm-3" aria-label="breadcrumb">
                    <ol class="breadcrumb breadcrumb-alt">
                        <li class="breadcrumb-item">
                            <a class="link-fx" href="javascript:void(0)">Department</a>
                        </li>
                        <li class="breadcrumb-item" aria-current="page">
                            Examination
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
                        <table id="example" class="table table-bordered table-striped fs-sm">
                            <thead>
                                <th>#</th>
                                <th>Academic Year</th>
                                <th>Academic semester</th>
                                <th>Action</th>
                            </thead>
                            <tbody>
                                @foreach($semesters as $sem => $semester)
                                    <tr>
                                        <td> {{ $loop->iteration }} </td>
                                        <td> {{ $year }} </td>
                                        <td> {{ $sem }} </td>
                                        <td>
                                            @if ($semester->first()->workflow_id === 0)
                                                <a class="btn btn-sm btn-outline-secondary" href="{{ route('department.downloadResults', ['year' => Crypt::encrypt($year),'sem' => Crypt::encrypt($sem)]) }}">Download</a>
                                              
                                                <a class="btn btn-sm btn-outline-success" href="{{ route('department.submitExamResults', ['year' => Crypt::encrypt($year),'sem' => Crypt::encrypt($sem)]) }}">submit</a>

                                                @elseif($semester->first()->workflow_id > 0 && $semester->first()->status === 0)
                                                <a class="btn btn-sm btn-outline-secondary" href="{{ route('department.downloadResults', ['year' => Crypt::encrypt($year),'sem' => Crypt::encrypt($sem)]) }}">Download</a>
                                                <a class="btn btn-sm btn-outline-info" disabled="">Submitted to Dean</a>

                                                @elseif($semester->first()->workflow_id > 0 && $semester->first()->status === 2)
                                                <a class="btn btn-sm btn-outline-secondary" href="{{ route('department.downloadResults', ['year' => Crypt::encrypt($year),'sem' => Crypt::encrypt($sem)]) }}">Download</a>
                                                <a class="btn btn-sm btn-outline-success" href="{{ route('department.submitExamResults', ['year' => Crypt::encrypt($year),'sem' => Crypt::encrypt($sem)]) }}">Resubmit</a>


                                                @elseif($semester->first()->workflow_id > 0 && $semester->first()->status === 1)
                                                <a class="btn btn-sm btn-outline-secondary" href="{{ route('department.downloadResults', ['year' => Crypt::encrypt($year),'sem' => Crypt::encrypt($sem)]) }}">Download</a>
                                                <a class="btn btn-sm btn-outline-info" disabled="">Published</a>

                                            @endif
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
