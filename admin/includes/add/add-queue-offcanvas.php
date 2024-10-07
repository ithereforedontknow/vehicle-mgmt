<div class="offcanvas offcanvas-end w-50" tabindex="-1" id="addTransactionOffcanvas" aria-labelledby="addTransactionOffcanvas-label">
    <div class="offcanvas-header border-bottom">
        <h5 class="offcanvas-title" id="addTransactionOffcanvas-label">Add to <span class="fw-bold">queue</span> record</h5>
        <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
    </div>
    <div class="offcanvas-body">
        <form id="queue-transaction">
            <input type="hidden" id="queue-transaction-id" name="queue-transaction-id">
            <div class="form-floating mb-4">
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
                <label for="queue-transfer-in-line" class="form-label">Transfer in Line #</label>
            </div>
            <div class="form-floating mb-4">
                <select class="form-select" id="queue-ordinal" name="queue-ordinal">
                    <option value="1st">1st</option>
                    <option value="2nd">2nd</option>
                    <option value="3rd">3rd</option>
                    <option value="3rd/1st">3rd/1st</option>
                </select>
                <label for="queue-ordinal" class="form-label">Ordinal</label>
            </div>
            <div class="form-floating mb-4">
                <select class="form-select" id="queue-shift" name="queue-shift">
                    <option value="day">Day</option>
                    <option value="night">Night</option>
                    <option value="day/night">Day/Night</option>
                </select>
                <label for="queue-shift" class="form-label">Shift</label>
            </div>
            <div class="form-floating mb-4">
                <select class="form-select" id="queue-schedule" name="queue-schedule">
                    <option value="6am-2pm">6 am to 2 pm</option>
                    <option value="2pm-6am">2 pm to 6 am</option>
                    <option value="6am-2pm/2pm-6am">6 am to 2 pm/2 pm to 6 am</option>
                </select>
                <label for="queue-schedule" class="form-label">Schedule</label>
            </div>
            <div class="form-floating mb-4">
                <input type="number" class="form-control" id="queue-number" name="queue-number" required>
                <label for="queue-number" class="form-label">Vehicle Pass</label>
            </div>
            <div class="form-floating">
                <select name="queue-priority" class="form-select" id="queue-priority">
                    <option value="1">High</option>
                    <option value="0">Low</option>
                </select>
                <label for="queue-priority">Set Priority</label>
            </div>
        </form>
    </div>
    <div class="offcanvas-footer d-flex justify-content-end p-3 border-top sticky-bottom">
        <button type="button" class="btn btn-dark me-2" data-bs-dismiss="offcanvas">Cancel</button>
        <button type="submit" class="btn btn-primary" form="queue-transaction">Queue</button>
    </div>
</div>