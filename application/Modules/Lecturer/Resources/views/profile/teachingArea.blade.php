
@extends('lecturer::layouts.backend')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.1.3/css/bootstrap.min.css">
<link rel="stylesheet" href="https://cdn.datatables.net/1.12.1/css/dataTables.bootstrap5.min.css">

<link rel="https://cdn.datatables.net/responsive/2.3.0/css/responsive.dataTables.min.css">
<link rel="https://cdn.datatables.net/rowgroup/1.2.0/css/rowGroup.dataTables.min.css">

<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>

<script src="https://cdn.datatables.net/responsive/2.3.0/js/dataTables.responsive.min.js"></script>
<script src="https://cdn.datatables.net/rowgroup/1.2.0/js/dataTables.rowGroup.min.js"></script>

@section('content')
    <div class="bg-body-light">
        <div class="content content-full">
            <div class="d-flex flex-column flex-sm-row justify-content-sm-between align-items-sm-center py-0">
                <div class="flex-grow-0">
                    <h5 class="h5 fw-bold mb-0">
                        My Teaching Areas
                    </h5>
                </div>

                <nav class="flex-shrink-0 mt-3 mt-sm-0 ms-sm-3" aria-label="breadcrumb">
                    <ol class="breadcrumb breadcrumb-alt">
                        <li class="breadcrumb-item">
                            <a class="link-fx" href="javascript:void(0)">Profile</a>
                        </li>
                        <li class="breadcrumb-item" aria-current="page">
                            My Teaching Area
                        </li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>

    <div class="block block-rounded">
        <div class="block-content block-content-full">
            <div class="row">
                <div class="col-lg-12">
                    <div class="d-flex justify-content-end m-2">
                        <a class="btn btn-sm btn-alt-primary" data-toggle="click-ripple" href="{{ route('lecturer.addTeachingAreas') }}">Add Teaching Areas </a>
                    </div>

                    <table id="example" class="table table-responsive-sm table-bordered table-striped js-dataTable-responsive fs-sm">
                        <thead>
                        <th></th>
                        <th>Unit Code</th>
                        <th>Unit Name</th>
                        <th>Level</th>
                        <th>Remove</th>

                        </thead>
                        <tbody>
                        @foreach($units as $key => $unit)
                            <tr>
                                <td>{{ ++$key }}</td>
                                <td>{{ $unit->unit_code}}</td>
                                <td>{{ $unit->teachingArea->unit_name}}</td>
                                <td>
                                    @if($unit->level == 1)
                                        CERTIFICATE
                                    @elseif($unit->level == 2)
                                        DIPLOMA
                                    @elseif($unit->level == 3)
                                        BACHELORS
                                    @else
                                        POST GRADUATE
                                    @endif

                                </td>
                                <td>
                                    <a class="btn btn-sm btn-alt-danger" href="{{route('lecturer.deleteTeachingArea',['id' => Crypt::encrypt($unit->id)] )}}">Drop</a>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection

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
