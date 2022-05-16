<!-- Modal For Show -->
{{-- <div class="modal res-edit fade" id="viewnewnotice" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
    aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="staticBackdropLabel">Notice of Power Service Interruption</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form class="add-member" action="{{ route('PsiSchedule.update', $psischedule->id) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="modal-body">
                    <div class="input-box">
                        <div class="text-start details">Date</div>
                        <input class="name align-text-left" name="notice_date" id="notice_date" type="text"
                            placeholder="" readonly>
                    </div>
                    <div class="input-box">
                        <div class="text-start details">Time</div>
                        <input class="name align-text-left" name="notice_time" id="notice_time" type="text"
                            placeholder="" readonly>
                    </div>
                    <div class="input-box">
                        <div class="text-start details">Affected Areas</div>
                        <input class="name align-text-left" name="notice_areas" id="notice_areas" type="text"
                            placeholder="" readonly>
                    </div>
                    <div class="input-box">
                        <div class="text-start details">Reasons</div>
                        <input class="name align-text-left" name="notice_reasons" id="notice_reasons" type="text"
                            placeholder="" readonly>
                    </div>
                    <br>
                    <h6 class="p-0 m-0">You want to send this notice to the General Manager?</h6>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-outline-danger" data-bs-dismiss="modal">NO</button>
                    <button type="submit" value="submit" " class="  btn btn-warning">YES</button>
            </form>
        </div>
    </div>
</div>
</div> --}}
