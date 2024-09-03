<div class="modal fade" id="queue-transaction-modal" tabindex="-1" aria-labelledby="queue-transaction-modal-label" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="queue-transaction-modal-label">Queue Transaction</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form id="queue-transaction">
                <div class="modal-body">
                    <input type="hidden" id="queue-transaction-id" name="queue-transaction-id">
                    <div class="mb-3">
                        <label for="queue-transfer-in-line" class="form-label">Transfer in Line #</label>
                        <select class="form-select" id="queue-transfer-in-line" name="queue-transfer-in-line">
                            <option value="1">Line 3</option>
                            <option value="2">Line 4</option>
                            <option value="3">Line 5</option>
                            <option value="4">Line 6</option>
                            <option value="5">Line 7</option>
                            <option value="6">GLAD WHSE</option>
                            <option value="7">WHSE 2-BAY 2</option>
                            <option value="8">WHSE 2-BAY 3</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="queue-ordinal" class="form-label">Ordinal</label>
                        <select class="form-select" id="queue-ordinal" name="queue-ordinal">
                            <option value="1st">1st</option>
                            <option value="2nd">2nd</option>
                            <option value="3rd">3rd</option>
                            <option value="3rd/1st">3rd/1st</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="queue-shift" class="form-label">Shift</label>
                        <select class="form-select" id="queue-shift" name="queue-shift">
                            <option value="day">Day</option>
                            <option value="night">Night</option>
                            <option value="day/night">Day/Night</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="queue-schedule" class="form-label">Schedule</label>
                        <select class="form-select" id="queue-schedule" name="queue-schedule">
                            <option value="6am-2pm">6 am to 2 pm</option>
                            <option value="2pm-6am">2 pm to 6 am</option>
                            <option value="6am-2pm/2pm-6am">6 am to 2 pm/2 pm to 6 am</option>
                        </select>
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