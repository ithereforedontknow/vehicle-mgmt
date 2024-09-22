<div class="modal fade" id="edit-transaction-modal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Edit transaction</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="edit-transaction">
                    <input type="hidden" id="edit-transaction-id">
                    <div class="form-floating mb-4">
                        <input type="datetime-local" class="form-control" name="unloading-end" id="unloading-end">
                        <label for="unloading-end">Unloading Time End</label>
                    </div>
                    <div class="form-floating">
                        <input type="datetime-local" class="form-control" name="time-departure" id="time-departure">
                        <label for="time-departure">Time of Departure</label>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary" form="edit-transaction">Save Changes</button>
            </div>
        </div>
    </div>
</div>