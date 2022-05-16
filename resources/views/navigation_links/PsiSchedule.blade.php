@extends('layouts.home')
@section('content')

    <div id="content">
        @include('layouts.includes.topnavbar')
        <div class="row no-margin-padding">
            <div class="col-md-12 d-flex flex-row justify-content-between">
                <h3 class="block-title">Schedule of Notice</h3>
            </div>
        </div>

        <div class="container-fluid">
            <div class="row d-flex justify-content-center">
                <div class="col-md-12">
                    <div class="container list-of-res PsiSchedule-list align-items-center soreco-box-shadow"
                        style="padding: 20px;">
                        <div class="d-flex">
                            <h4 class="fw-bold head-title pt-2 ps-2 mb-0 me-auto" style="text-align: center">List of Notice
                            </h4>
                            <button type="submit" class="btn btn-add mt-2 me-2" data-bs-toggle="modal"
                                data-bs-target="#addnewnotice">
                                <i class="fas fa-plug"></i> ADD</button>
                            @include('modals.PsiSchedule.Add')
                            {{-- <button type="submit" class="btn btn-add mt-2 me-2" data-bs-toggle="modal" data-bs-target="#medrequest" style="width:200px;">
                            <i class="fas fa-print"></i> GENERATE REPORT</button>
                            @include('modals.MedicineRequest.Generate') --}}
                        </div>
                        <hr>

                        <div class="table-responsive mb-3">
                            <table id="PsiSchedule-datatable" class="table table-bordered table-striped datatable-hover">
                                <thead>
                                    <tr role="row">
                                        <th scope="col">ID No.</th>
                                        <th scope="col">Day/Date</th>
                                        <th scope="col">Time</th>
                                        <th scope="col">Affected Areas</th>
                                        <th scope="col">Reasons</th>
                                        <th scope="col">Actions</th>

                                    </tr>
                                </thead>
                                <tbody>
                                    @if ($psi_schedules)
                                        @foreach ($psi_schedules as $psischedule)
                                            <tr>
                                                <td data-label="ID">{{ $psischedule->id }}</td>
                                                <td data-label="Date">{{ $psischedule->notice_date }}</td>
                                                <td data-label="Time">{{ $psischedule->notice_time }}</td>
                                                <td data-label="Affected Areas">{{ $psischedule->notice_areas }}</td>
                                                <td data-label="Reasons">{{ $psischedule->notice_reasons }}</td>
                                                <td
                                                    style="white-space:nowrap; text-align:center; border-bottom: 1px solid black; border-top: 1px solid black;">


                                                    {{-- ---***************************** SHOW BUTTON *******************************---- --}}
                                                    {{-- <a data-bs-toggle="modal" type="button" class="btn btn-warning"
                                                        data-notice_date="{{ $psischedule->notice_date }}"
                                                        data-notice_time="{{ $psischedule->notice_time }}"
                                                        data-notice_areas="{{ $psischedule->notice_areas }}"
                                                        data-notice_reasons="{{ $psischedule->notice_reasons }}"
                                                        data-bs-target="#viewnewnotice">
                                                        <i class="fa fa-paper-plane"></i>
                                                    </a>
                                                    @include('modals.PsiSchedule.Show') --}}




                                                    {{-- ---***************************** GENERATE BUTTON *******************************---- --}}
                                                    <a data-bs-toggle="notice" href="generatenotice" type="button"
                                                        class="btn btn-primary"
                                                        data-notice_date="{{ $psischedule->notice_date }}"
                                                        data-notice_time="{{ $psischedule->notice_time }}"
                                                        data-notice_areas="{{ $psischedule->notice_areas }}"
                                                        data-notice_reasons="{{ $psischedule->notice_reasons }}"
                                                        data-bs-target="#notice">
                                                        {{-- <i class="fas fa-eye">Generate</i> --}}
                                                        <i class="fa fa-print"></i>

                                                    </a>

                                                    {{-- ---***************************** EDIT BUTTON *******************************---- --}}
                                                    {{-- <a data-bs-toggle="modal" type="button" class="btn btn-warning"
                                                        data-notice_date="{{ $psischedule->notice_date }}"
                                                        data-notice_time="{{ $psischedule->notice_time }}"
                                                        data-notice_areas="{{ $psischedule->notice_areas }}"
                                                        data-notice_reasons="{{ $psischedule->notice_reasons }}"
                                                        data-bs-target="#editnewnotice">
                                                        <i class="manage fas fa-edit"></i>
                                                    </a>
                                                    @include('modals.PsiSchedule.Edit') --}}

                                                    {{-- ---***************************** DELETE BUTTON *******************************---- --}}
                                                    <a data-bs-toggle="modal" type="button" class="btn btn-danger"
                                                        data-bs-target="#deletenewnotice"
                                                        data-id="{{ $psischedule->id }}">
                                                        <i class="manage fas fa-trash"></i>
                                                    </a>
                                                    @include('modals.PsiSchedule.Delete')
                                                </td>

                                            </tr>
                                        @endforeach
                                    @endif
                                </tbody>
                            </table>

                        </div>
                    </div>
                </div>
            </div>
        </div>
