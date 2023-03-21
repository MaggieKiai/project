
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
                        My Qualifications
                    </h5>
                </div>

                <nav class="flex-shrink-0 mt-3 mt-sm-0 ms-sm-3" aria-label="breadcrumb">
                    <ol class="breadcrumb breadcrumb-alt">
                        <li class="breadcrumb-item">
                            <a class="link-fx" href="javascript:void(0)">Profile</a>
                        </li>
                        <li class="breadcrumb-item" aria-current="page">
                            My Qualifications
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
                                <a class="btn btn-sm btn-alt-primary" data-toggle="click-ripple" href="{{ route('lecturer.addqualifications') }}">Add Qualifications </a>
                            </div>
        
            <table id="example" class="table table-sm table-bordered table-striped js-dataTable-responsive fs-sm">
                @csrf
                @method('delete')

                    <thead>
                        <th></th>
                        <th>Level</th>
                        <th>Institution</th>
                        <th>Qualification</th>
                        <th>Status</th>
                        <th>Action</th>

                    </thead>
                    <tbody>
                        @foreach($qualifications as $key => $qualification)
                            <tr>
                                <td>{{ ++$key }}</td>
                                <td>
                                    @if($qualification->level==1) 
                                        CERTIFICATE
                                    @elseif($qualification->level==2)
                                         DIPLOMA
                                    @elseif($qualification->level==3)
                                        BACHELORS
                                    @elseif($qualification->level==4)
                                        MASTERS 
                                    @elseif($qualification->level==5)
                                        PHD 
                                    @endif
                                </td>
                                <td>{{ $qualification->institution}}</td>
                                <td>{{ $qualification->qualification}}</td>
                                <td>
                                    @if($qualification->qualification_status==0)
                                    <span class="badge bg-primary"> <i class="fa fa-spinner"></i> pending</span>
                                    @elseif($qualification->qualification_status==1)
                                    <span class="badge bg-success"> <i class="fa fa-check"></i> Approved</span>
                                    @elseif($qualification->qualification_status==2)
                                    <span class="badge bg-danger"> <i class="fa fa-ban"></i> Declined</span>
                                    @endif 
                                </td>
                                <td>
                                    @if($qualification->qualification_status==0)
                                    <a class="btn btn-sm btn-alt-danger" href="{{ route('lecturer.deleteQualification', ['id' => Crypt::encrypt($qualification->id)] ) }}">Drop</a>
                                    @elseif($qualification->qualification_status==1)
                                    <a class="btn btn-sm btn-alt-success" disabled>Verified</a>
                                    @elseif($qualification->qualification_status==2)
                                    <a class="btn btn-sm btn-alt-info" href="{{ route('lecturer.editQualifications', ['id' => Crypt::encrypt($qualification->id)]) }}">Edit</a>
                                    <a class="btn btn-sm btn-alt-danger" href="{{ route('lecturer.deleteQualification', ['id' => Crypt::encrypt($qualification->id)] ) }}">Drop</a>
                                    @endif 
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
