<!-- Adding new medicine Modal -->
<div class="modal res-add fade" id="addnewnotice" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
    aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="staticBackdropLabel">Add New Notice</h5>
            </div>
            <div class="modal-body">

                <form class="" action="{{ route('PsiSchedule.store') }}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label for="">Date</label>
                        <input type="date" name="notice_date" class="form-control" id="" placeholder="">
                    </div>

                    <div class="form-group">
                        <label for="">Time</label>
                        <input type="time" name="notice_time" class="form-control" id="" placeholder="">
                    </div>

                    <div class="form-group">
                        <label for="">Affected Areas</label>
                        <input type="text" name="notice_areas" class="form-control" id="" placeholder="">
                    </div>

                    <div class="form-group">
                        <label for="">Reasons</label>
                        <input type="text" name="notice_reasons" class="form-control" id="" placeholder="">
                    </div>



            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-outline-danger" data-bs-dismiss="modal">CANCEL</button>
                <button type="submit" class="btn btn-success">ADD</button>
                </form>
            </div>
        </div>
    </div>
</div>
