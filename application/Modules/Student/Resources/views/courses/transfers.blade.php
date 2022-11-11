@extends('student::layouts.backend')

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
            order: [[2, 'asc']],
            rowGroup: {
                dataSrc: 2
            }
        } );
    } );
</script>


@section('content')

    <div class="bg-body-light">
        <div class="content content-full">
            <div class="d-flex flex-column flex-sm-row justify-content-sm-between align-items-sm-center py-1">
                <div class="flex-grow-1">
                    <h5 class="h5 fw-bold mb-0">
                        COURSE TRANSFERS
                    </h5>
                </div>
                <nav class="flex-shrink-0 mt-0 mt-sm-0 ms-sm-3" aria-label="breadcrumb">
                    <ol class="breadcrumb breadcrumb-alt">
                        <li class="breadcrumb-item">
                            <a class="link-fx" href="{{ route('student') }}">Dashboard</a>
                        </li>
                        <li class="breadcrumb-item" aria-current="page">
                            ALL TRANSFER REQUESTS
                        </li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>

    <div class="block block-rounded">
        <div class="block-content block-content-full">
            <div class="table-responsive">
                <div class="d-flex justify-content-end mb-4">
                    <a class="btn btn-sm btn-alt-primary" href="{{ route('student.requesttransfer') }}">Create request</a>
                </div>
                <table id="example"  class="table table-sm table-striped table-bordered fs-sm">
                    <thead>
                    <th>#</th>
                    <th> Course Department </th>
                    {{--                    <th> Department </th>--}}
                    <th nowrap=""> Course Name </th>
                    <th nowrap=""> Class Code </th>
                    <th nowrap=""> Request status </th>
                    <th nowrap=""> Status</th>
                    <th nowrap=""> Action</th>
{{--                    <th> Status </th>--}}
                    </thead>
                    <tbody>
                    @foreach($transfers as $key => $transfer)
                        <tr>
                            <td>{{ ++$key }} </td>
                            <td> {{ $transfer->deptTransfer->name }}</td>
                            <td> {{ $transfer->courseTransfer->course_name }}</td>
                            <td nowrap=""> {{ $transfer->classTransfer->name }}</td>
                            <td>
                                @if($transfer->dean_status == 1 && $transfer->registrar_status == 1)
                                    <span class="text-success"> Successful </span>
                                @elseif($transfer->dean_status = 2 && $transfer->registrar_status == 1)
                                    <span class="text-danger"> Unsuccessful </span>
                                @else
                                    <span class="text-primary"> Pending </span>
                                @endif
                            </td>
                            <td nowrap="">
                                @if($transfer->status === NULL)
                                    <span class="text-primary"> Not Submitted </span>
                                @elseif($transfer->status === 0)
                                    <span class="text-info"> Submitted </span>
                                @else
                                    <span class="text-success">Closed </span>
                                @endif
                            </td>
                            <td nowrap="">
                                @if($transfer->status === NULL)

                                    <a class="btn btn-sm btn-alt-success" href="{{ route('student.storetransferrequest', ['id' => Crypt::encrypt($transfer->id)]) }}" >Submit</a> |
                                    <a class="btn btn-sm btn-alt-info" href="{{ route('student.edittransferrequest', ['id' => Crypt::encrypt($transfer->id)]) }}" >Edit</a> |
                                    <a class="btn btn-sm btn-alt-danger" href="{{ route('student.deletetransferrequest', ['id' => Crypt::encrypt($transfer->id)]) }}" >Delete</a>

                                @elseif($transfer->status === 1)
                                     <a class="btn btn-sm btn-alt-success" disabled="">Processed</a>
                                @else
                                    <a class="btn btn-sm btn-alt-secondary" disabled="">Processing</a>
                                @endif
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

@endsection

