<div class="offcanvas offcanvas-end w-50" tabindex="-1" id="editTransactionOffcanvas" aria-labelledby="editTransactionLabel">
    <div class="offcanvas-header border-bottom">
        <h5 class="offcanvas-title " id="editTransactionLabel">Edit <span class="fw-bold">transaction</span> record</h5>
        <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
    </div>
    <form id="edit-transaction-form">
        <div class="offcanvas-body">
            <div class="form-floating mb-4">
                <input type="text" class="form-control" id="edit-transaction-id" name="transaction-id" disabled>
                <label for="edit-transaction-id">Transaction ID</label>
            </div>
            <div class="form-floating mb-4">
                <input type="text" class="form-control" id="edit-to-reference" name="to-reference" disabled>
                <label for="edit-to-reference" class="form-label">TO Reference</label>
            </div>
            <div class="form-floating mb-4">
                <input type="text" class="form-control" id="edit-no-of-bales" name="no-of-bales" disabled>
                <label for="edit-no-of-bales" class="form-label">No. of Bales</label>
            </div>

            <div class="form-floating mb-4">
                <input type="text" class="form-control" id="edit-kilos" name="kilos" disabled>
                <label for="edit-kilos" class="form-label">Kilos</label>
            </div>

            <div class="form-floating mb-4">
                <input type="text" class="form-control" id="edit-origin" name="origin" disabled>
                <label for="edit-origin" class="form-label">Origin</label>
            </div>
            <div class="form-floating mb-4">
                <input type="date" class="form-control" id="edit-arrival-date" name="edit-arrival-date" required>
                <label for="edit-arrival-date">Arrival Date</label>
            </div>
            <div class="form-floating mb-4">
                <input type="datetime-local" class="form-control" id="edit-arrival-time" name="edit-arrival-time" required>
                <label for="edit-arrival-time">Arrival Time</label>
            </div>
            <div class="offcanvas-footer d-flex justify-content-end p-3 border-top">
                <button type="button" class="btn btn-dark me-2" data-bs-dismiss="offcanvas">Cancel</button>
                <button type="submit" class="btn btn-primary" form="edit-transaction-form">Add to Arrived</button>
            </div>
        </div>
    </form>
</div>