<!-- Modal for Edit -->
<div class="modal res-edit fade" id="editnewnotice" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
    aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="staticBackdropLabel">Edit Notice</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form class="add-resident" action="{{ route('PsiSchedule.update', 'id') }}" method="POST">
                @csrf
                @method('PUT')
                <div class="modal-body">

                    <div class="input-box">
                        <div class="text-start details">Date</div>
                        <input class="name align-text-left" name="notice_date" id="notice_date" type="text"
                            placeholder="">
                    </div>

                    <div class="input-box">
                        <div class="text-start details">Time</div>
                        <input class="name align-text-left" name="notice_time" id="notice_time" type="text"
                            placeholder="">
                    </div>
                    <div class="input-box">
                        <div class="text-start details">Affected Areas</div>
                        <input class="name align-text-left" name="notice_areas" id="notice_areas" type="text"
                            placeholder="">
                    </div>
                    <div class="input-box">
                        <div class="text-start details">Reasons</div>
                        <input class="name align-text-left" name="notice_reasons" id="notice_reasons" type="text"
                            placeholder="">
                    </div>
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-outline-danger" data-bs-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-warning">Update</button>


                </div>
            </form>
        </div>
    </div>

</div>
