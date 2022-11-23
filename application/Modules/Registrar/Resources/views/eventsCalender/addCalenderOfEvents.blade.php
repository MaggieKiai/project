@extends('registrar::layouts.backend')

@section('content')
<div class="bg-body-light">
  <div class="content content-full">
      <div class="d-flex flex-column flex-sm-row justify-content-sm-between align-items-sm-center">
          <div class="flex-grow-1">
              <h6 class="h6 fw-bold mb-0">
                ADD SEMESTER EVENT
              </h6>
          </div>
          <nav class="flex-shrink-0 mt-3 mt-sm-0 ms-sm-3" aria-label="breadcrumb">
              <ol class="breadcrumb breadcrumb-alt">
                  <li class="breadcrumb-item">
                      <a class="link-fx" href="javascript:void(0)">Calender</a>
                  </li>
                  <li class="breadcrumb-item" aria-current="page">
                    <a  href="showCalenderOfEvents">View  Calender</a>
                  </li>
              </ol>
          </nav>
      </div>
  </div>
</div>

    <div class="content">
      <div class="block block-rounded col-md-12 col-lg-12 col-xl-12">
            <div class="block-content block-content-full">
              <div class="row">
                  <div class="d-flex justify-content-center">
                        <div class="col-lg-6 space-y-0">

                   <form class="row row-cols-lg-auto g-3 align-items-center" action="{{ route('courses.storeCalenderOfEvents') }}" method="POST">
                    @csrf

                      <div class="form-floating col-12 col-xl-12">
                        <select name="academicyear" class="form-control form-control-alt text-uppercase">
                          <option selected disabled> Select Academic Year </option>
                          @foreach ($academicyear as $item)
                          <option value="{{ Carbon\carbon::parse($item->year_start)->format('Y') }}/{{ Carbon\carbon::parse($item->year_end)->format('Y') }}">{{ Carbon\carbon::parse($item->year_start)->format('Y') }}/{{ Carbon\carbon::parse($item->year_end)->format('Y') }}</option>
                          @endforeach
                          <label class="form-label">ACADEMIC YEAR</label>
                        </select>
                      </div>

                      <div class="form-floating col-12 col-xl-12">
                        <select name="semester" class="form-control form-control-alt text-uppercase">
                          <option selected disabled> Select Semester </option>
                            <option value="SEP/DEC">SEP/DEC</option>
                            <option value="JAN/APR">JAN/APR</option>
                            <option value="MAY/AUG">MAY/AUG</option>
                          <label class="form-label">SEMESTER</label>
                        </select>
                      </div>

                      <div class="form-floating col-12 col-xl-12">
                        <select name="events" class="form-control form-control-alt text-uppercase">
                          <option selected disabled> Select Event </option>
                          @foreach ($events as $event)
                          <option value="{{ $event->id }}">{{ $event->name }}</option>
                          @endforeach
                          <label class="form-label">EVENT NAME</label>
                        </select>
                      </div>

                      <div class="form-floating col-12 col-xl-12 mb-2" >
                        <input type="date" class="form-control form-control-alt" id="start_date" name="start_date" placeholder="Start Date">
                        <label class="form-label">START DATE</label>
                      </div>

                      <div class="form-floating col-10 col-xl-12 mb-2">
                        <input type="date" class="form-control form-control-alt" id="end_date" name="end_date" placeholder="End Date">
                        <label class="form-label">END DATE</label>
                      </div>

                    <div class="col-12 text-center p-3">
                      <button type="submit"  class="btn btn-alt-success" data-toggle="click-ripple">Create Calender</button>
                    </div>
                  </form>

                </div>
                  </div>
              </div>
            </div>
          </div>
    </div>

@endsection

