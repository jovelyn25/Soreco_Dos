<!-- Modal for Delete -->

<div class="modal res-delete fade" id="deletenewnotice" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
    aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="staticBackdropLabel">Delete Notice</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">

                <form class="add-resident" action="{{ route('PsiSchedule.destroy', $psischedule->id) }}"
                    method="POST">

                    @csrf
                    @method('DELETE')

                    <div class="modal-body m-0 p-0">
                        <div class="input-box">
                            <input name="id" id="id" type="hidden" placeholder="">
                        </div>
                        <h6 class="p-0 m-0">Are you sure you want to delete this?</h6>
                    </div>
            </div>

            <div class="modal-footer">
                <button type="button" class="btn btn-outline-danger waves-effect"
                    data-bs-dismiss="modal">Cancel</button>
                <button title="delete notice" type="submit" class="btn btn-danger">Delete</button>
            </div>

            </form>
        </div>
    </div>
</div>
