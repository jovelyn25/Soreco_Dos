<div class="modal fade" id="PsiSchedule" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
aria-labelledby="staticBackdropLabel" aria-hidden="true">
<div class="modal-dialog modal-lg modal-dialog-centered modal-dialog-scrollable">
    <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="staticBackdropLabel">Generate Notice</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <form id="PsiNoticePrint" style="width:100%;" class="form-group-mar" method="post">
                <div class="d-flex justify-content-center flex-column mar-report">
                    <h5 class="text-center">Power Service Interruption Form</h5>
                    <br>
                    <div class="request_form">
                        <div class="d-flex justify-content-center flex-column mar-report">
                            <p class="text-center fw-bold">SORSOGON II ELECTRIC COOPERATIVE</p>
                            <p class="text-center fw-bold">(SORECO II)</p>
                            <p class="text-center fw-bold">"Owned By Those It Serves"</p>
                            <p class="text-center">Brgy.Buhatan, East District, Sorsogon City</p>
                            <p class="text-center">Sorsogon</p><br>
                            <p class="text-center fw-bold">NOTICE OF POWER SERVICE INTERRUPTION</p><br><br>
                            <p class="fw-bold">To all concerned SORECO II Member Consumers;</p>
                            <p class="fw-bold">Please be informed that we are scheduling a POWER SERVICE
                                INTERRUPTION in your area with the
                                following details:</p>

                            <center>


                                <table style="width:100%" class="table table-bordered border-dark">

                                    <thead>
                                        <tr>
                                            <th class="text-center" scope="col">DATE</th>
                                            <th class="text-center" scope="col">TIME</th>
                                            <th class="text-center" scope="col">AFFECTED AREAS</th>
                                            <th class="text-center" scope="col">REASONS</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>data1</td>
                                            <td>data2</td>
                                            <td>data3</td>
                                            <td>data4</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </center>
                        </div>

                        <p class="fw-bold">ATTENTION!</p>
                        <p class="fw-bold">All works may be completed ahead of time. Electriv power may
                            be
                            restored earlier as sheduled. Please be consider our lines always energized.</p><br>
                        <p class="fw-bold">NOTE:</p>
                        <p class="fw-bold">MSD to furnish all Radio Stations, the Provincial Information
                            Office,
                            the BOD, MSEAC, LGU OFFICIAL channels, Big Load and the General Public with this
                            notice.</p>

                        <br>
                        <div class="d-flex flex-row-reverse signature-line ">
                            <p class="name_signature fw-bold mb-0 border-top ">Signature Over Printed Name</p>
                        </div>
                    </div>
            </form>

        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-danger" data-bs-dismiss="modal">CANCEL</button>
            <button id="PsiScheduleBtn" type="button" PsiSchedule.onclick=class="btn btn-primary"><i
                    class="fas fa-print"></i> PRINT</button>
        </div>
    </div>
</div>
</div>

@section('scripts')
<script>
    document.getElementById("PsiScheduleBtn").onclick = function() {
        printElement(document.getElementById("PsiNoticePrint"));
        window.print();
    }
</script>
@endsection
