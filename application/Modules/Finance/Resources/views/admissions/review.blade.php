@extends('applications::layouts.backend')
@section('content')
    <div class="bg-body-light">
        <div class="content content-full">
            <div class="d-flex flex-column flex-sm-row justify-content-sm-between align-items-sm-center py-0">
                <div class="flex-grow-0">
                    <h5 class="h5 fw-bold mb-0">
                        Update Application Status
                    </h5>
                </div>
                <nav class="flex-shrink-0 mt-3 mt-sm-0 ms-sm-3" aria-label="breadcrumb">
                    <ol class="breadcrumb breadcrumb-alt">
                        <li class="breadcrumb-item">
                            <a class="link-fx" href="javascript:void(0)">Application</a>
                        </li>
                        <li class="breadcrumb-item" aria-current="page">
                            Status
                        </li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>

    <div class="content">
        <div class="block block-rounded">
            <div class="block-content block-content-full">
                <div class="row">
                    <div class="col-lg-5 mb-0 fs-sm">
                        <div class="row p-1">
                        <div class="col-md-4 fw-bolder text-start">Applicant Name </div>
                        <div class="col-md-8"> {{ $app->appApprovals->applicant->sname }} {{ $app->appApprovals->applicant->fname }} {{ $app->appApprovals->applicant->mname }}</div>
                        </div>
                        <div class="row p-1">
                            <div class="col-md-4 fw-bolder text-start">Course Name</div>
                            <div class="col-md-8"> {{ $app->appApprovals->courses->course_name }} </div>
                        </div>
                    </div>
                    <div class="col-lg-7 space-y-1">
                        <div class="content-boxed block-content-full">
                            <iframe src="{{ url('Admissions/BankReceipt/', $app->appApprovals->admissionDoc->bank_receipt ) }}" type="application/pdf" style="width: 100% !important; height: 80vh !important;"> </iframe>
                        </div>
                    </div>
                </div>
            </div>
        <div class="d-flex justify-content-center py-1">
            @if($app->finance_status== 0)
                <a class="btn btn-sm btn-alt-success m-2" data-toggle="click-ripple" href="{{ route('finance.acceptAdmission', ['id' => Crypt::encrypt($app->id)]) }}">Approve</a>
                <a class="btn btn-sm btn-alt-info m-2" href="#" data-bs-toggle="modal" data-bs-target="#modal-block-popin1"> Withhold</a>
                <a class="btn btn-sm btn-alt-danger m-2" href="#" data-bs-toggle="modal" data-bs-target="#modal-block-popin"> Reject</a>
                <a class="btn btn-sm btn-alt-secondary m-2" data-toggle="click-ripple" href="{{ route('finance.admissions') }}">Close</a>
            @elseif($app->finance_status== 1)
                <a class="btn btn-sm btn-alt-info m-2" href="#" data-bs-toggle="modal" data-bs-target="#modal-block-popin1"> Withhold</a>
                <a class="btn btn-sm btn-alt-danger m-2" href="#" data-bs-toggle="modal" data-bs-target="#modal-block-popin"> Reject</a>
                <a class="btn btn-sm btn-alt-secondary m-2" data-toggle="click-ripple" href="{{ route('finance.admissions') }}">Close</a>
            @elseif($app->finance_status== 2)
                <a class="btn btn-sm btn-alt-success m-2" data-toggle="click-ripple" href="{{ route('finance.acceptAdmission', ['id' => Crypt::encrypt($app->id)]) }}">Approve</a>
                <a class="btn btn-sm btn-alt-info m-2" href="#" data-bs-toggle="modal" data-bs-target="#modal-block-popin1"> Withhold</a>
                <a class="btn btn-sm btn-alt-secondary m-2" data-toggle="click-ripple" href="{{ route('finance.admissions') }}">Close</a>
            @else
                <a class="btn btn-sm btn-alt-success m-2" data-toggle="click-ripple" href="{{ route('finance.acceptAdmission', ['id' => Crypt::encrypt($app->id)]) }}">Approve</a>
                <a class="btn btn-sm btn-alt-danger m-2" href="#" data-bs-toggle="modal" data-bs-target="#modal-block-popin"> Reject</a>
                <a class="btn btn-sm btn-alt-secondary m-2" data-toggle="click-ripple" href="{{ route('finance.admissions') }}">Close</a>
            @endif
        </div>
        </div>
    </div>

    <div class="modal fade" id="modal-block-popin" tabindex="-1" role="dialog" aria-labelledby="modal-block-popin" aria-hidden="true">
        <div class="modal-dialog modal-dialog-popin" role="document">
            <div class="modal-content">
                <div class="block block-rounded block-transparent mb-0">
                    <div class="block-header block-header-default">
                        <h3 class="block-title">Reason(s) for rejecting {{  $app->appApprovals->applicant->sname }}'s admission</h3>
                        <div class="block-options">
                            <button type="button" class="btn-block-option" data-bs-dismiss="modal" aria-label="Close">
                                <i class="fa fa-fw fa-times"></i>
                            </button>
                        </div>
                    </div>
                    <div class="block-content fs-sm">
                        <form action="{{ route('finance.rejectAdmission', ['id' => Crypt::encrypt($app->id)]) }}" method="post">
                            @csrf
                            <div class="row col-md-12 mb-3">
                                <div class="d-flex justify-content-center">
                                    <textarea class="form-control" placeholder="Write down the reasons for withholding this admission" name="comment" required rows="6"></textarea>
                                    <input type="hidden" name="{{ $app->id }}">
                                </div>
                            </div>
                            <div class="d-flex justify-content-center mb-2">
                            <button type="submit" class="btn btn-alt-danger btn-sm">Reject</button>
                            </div>
                        </form>
                    </div>
                    <div class="block-content block-content-full text-end bg-body">
                        <button type="button" class="btn btn-sm btn-alt-secondary me-1" data-bs-dismiss="modal">Close</button>
                        {{--                        <button type="button" class="btn btn-sm btn-primary" data-bs-dismiss="modal">Okay</button>--}}
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="modal-block-popin1" tabindex="-1" role="dialog" aria-labelledby="modal-block-popin" aria-hidden="true">
        <div class="modal-dialog modal-dialog-popin" role="document">
            <div class="modal-content">
                <div class="block block-rounded block-transparent mb-0">
                    <div class="block-header block-header-default">
                        <h3 class="block-title">Reason(s) for withholding {{  $app->appApprovals->applicant->sname }}'s admission</h3>
                        <div class="block-options">
                            <button type="button" class="btn-block-option" data-bs-dismiss="modal" aria-label="Close">
                                <i class="fa fa-fw fa-times"></i>
                            </button>
                        </div>
                    </div>
                    <div class="block-content fs-sm">
                        <form action="{{ route('finance.withholdAdmission', ['id' => Crypt::encrypt($app->id)]) }}" method="post">
                            @csrf
                            <div class="row col-md-12 mb-3">
                                <div class="d-flex justify-content-center">
                                    <textarea class="form-control" placeholder="Write down the reasons for withholding this admission" name="comment" required rows="6"></textarea>
                                    <input type="hidden" name="{{ $app->id }}">
                                </div>
                            </div>
                            <div class="d-flex justify-content-center mb-2">
                            <button type="submit" class="btn btn-alt-info btn-sm">Withhold</button>
                            </div>
                        </form>
                    </div>
                    <div class="block-content block-content-full text-end bg-body">
                        <button type="button" class="btn btn-sm btn-alt-secondary me-1" data-bs-dismiss="modal">Close</button>
                        {{--                        <button type="button" class="btn btn-sm btn-primary" data-bs-dismiss="modal">Okay</button>--}}
                    </div>
                </div>
            </div>
        </div>
    </div>


@endsection
