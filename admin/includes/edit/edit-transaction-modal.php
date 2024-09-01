<!-- Add this modal at the end of your HTML body -->
<div class="modal fade" id="edit-transaction-modal" tabindex="-1" aria-labelledby="edit-transaction-modal-label" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="edit-transaction-modal-label">Edit Transaction</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form id="edit-transaction">
                <div class="modal-body">
                    <input type="hidden" id="edit-transaction-id" name="edit-transaction-id">
                    <div class="row">
                        <div class="col">
                            <div class="mb-3">
                                <label for="edit-arrival-date" class="form-label">Arrival Date</label>
                                <input type="date" class="form-control" id="edit-arrival-date" name="edit-arrival-date">
                            </div>
                            <div class="mb-3">
                                <label for="edit-arrival-time" class="form-label">Arrival Time</label>
                                <input type="datetime-local" class="form-control" id="edit-arrival-time" name="edit-arrival-time">
                            </div>
                            <div class="mb-3">
                                <label for="edit-unloading-date" class="form-label">Unloading Date</label>
                                <input type="date" class="form-control" id="edit-unloading-date" name="edit-unloading-date">
                            </div>
                            <div class="mb-3">
                                <label for="edit-time-of-entry" class="form-label">Time of Entry</label>
                                <input type="datetime-local" class="form-control" id="edit-time-of-entry" name="edit-time-of-entry">
                            </div>
                        </div>
                        <div class="col">
                            <div class="mb-3">
                                <label for="edit-unloading-time-start" class="form-label">Unloading Time Start</label>
                                <input type="datetime-local" class="form-control" id="edit-unloading-time-start" name="edit-unloading-time-start">
                            </div>
                            <div class="mb-3">
                                <label for="edit-unloading-time-end" class="form-label">Unloading Time End</label>
                                <input type="datetime-local" class="form-control" id="edit-unloading-time-end" name="edit-unloading-time-end">
                            </div>
                            <div class="mb-3">
                                <label for="edit-time-of-departure" class="form-label">Time of Departure</label>
                                <input type="datetime-local" class="form-control" id="edit-time-of-departure" name="edit-time-of-departure">
                            </div>
                        </div>
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save Changes</button>
                </div>
            </form>
        </div>
    </div>
</div>