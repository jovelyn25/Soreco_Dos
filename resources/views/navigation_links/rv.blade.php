@extends('layouts.home')
@section('content')

    <div id="content">
        @include('layouts.includes.topnavbar')
        <div class="row no-margin-padding">
            <div class="col-md-12 d-flex flex-row justify-content-between">
                <h3 class="block-title">Requisition Voucher</h3>
            </div>
        </div>

        <div class="container-fluid">
            <div class="row d-flex justify-content-center">
                <div class="col-md-12">
                    <div class="container list-of-res PsiSchedule-list align-items-center soreco-box-shadow"
                        style="padding: 20px;">
                        <div class="d-flex">
                            <h4 class="fw-bold head-title pt-2 ps-2 mb-0 me-auto" style="text-align: center">List of
                                Requisition Voucher
                            </h4>
                            <button type="submit" class="btn btn-add mt-2 me-2" data-bs-toggle="modal"
                                data-bs-target="#addnewvoucher">
                                <i class="fas fa-plug"></i> ADD</button>
                            @include('modals.voucher.Add')
                            {{-- <button type="submit" class="btn btn-add mt-2 me-2" data-bs-toggle="modal" data-bs-target="#medrequest" style="width:200px;">
                            <i class="fas fa-print"></i> GENERATE REPORT</button>
                            @include('modals.Me.Generate') --}}
                        </div>
                        <hr>

                        <div class="table-responsive mb-3">
                            <table id="Requsition-datatable" class="table table-bordered table-striped datatable-hover">
                                <thead>
                                    <tr role="row">
                                        <th scope="col">ID No.</th>
                                        <th scope="col">Item</th>
                                        <th scope="col">Description of Materials</th>
                                        <th scope="col">Unit</th>
                                        <th scope="col">Quantity</th>
                                        <th scope="col">Remarks</th>
                                        <th scope="col">Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @if ($requisitions)
                                        @foreach ($requisitions as $requisition)
                                            <tr>
                                                <td data-label="ID">{{ $rv->id }}</td>
                                                <td data-label="Item">{{ $rv->rv_item }}</td>
                                                <td data-label="Description of Materials">{{ $rv->rv_description }}</td>
                                                <td data-label="Unit">{{ $rv->rv_unit }}</td>
                                                <td data-label="Quantity">{{ $rv->rv_quantity }}</td>
                                                <td data-label="Remarks">{{ $rv->rv_remarks }}</td>
                                                <td
                                                    style="white-space:nowrap; text-align:center; border-bottom: 1px solid black; border-top: 1px solid black;">

                                                    {{-- ---***************************** SHOW BUTTON *******************************---- --}}
                                                    <!-- <a data-bs-toggle="modal" type="button" class="btn btn-primary"
                                                                                                                                                                                                                                                                                                                                                                                                                                   <a href="generatenotice" type="button" class="btn btn-primary"
                                                                                                                                                                                                                                                                                                                                                                                                            -->
                                                    <a data-bs-toggle="voucher" href="generatevoucher" type="button"
                                                        class="btn btn-primary" data-voucher_item="{{ $rv->rv_item }}"
                                                        data-voucher_description="{{ $rv->rv_description }}"
                                                        data-voucher_unit="{{ $rv->rv_unit }}"
                                                        data-voucher_quantity="{{ $rv->rv_quantity }}"
                                                        data-voucher_remarks="{{ $rv->rv_remarks }}"
                                                        data-bs-target="#rv">
                                                        {{-- <i class="fas fa-eye">Generate</i> --}}
                                                        <i class="">Generate</i>

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
                                                        data-bs-target="#deletenewvoucher"
                                                        data-id="{{ $Requisition > id }}">
                                                        <i class="manage fas fa-trash"></i>
                                                    </a>
                                                    @include('modals.Requisition.Delete')
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
