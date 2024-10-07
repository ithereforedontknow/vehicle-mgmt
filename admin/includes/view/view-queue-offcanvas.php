<div class="offcanvas offcanvas-end w-50" tabindex="-1" id="viewQueueOffcanvas" aria-labelledby="viewQueueOffcanvas">
    <div class="offcanvas-header border-bottom">
        <h5 class="offcanvas-title" id="viewQueueOffcanvas">View <span class="fw-bold">queue</span></h5>

        <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
    </div>
    <div class="offcanvas-body">
        <form id="add-unloading-form">
            <input type="hidden" id="view-transaction-id" name="view-transaction-id">
            <div class="row">
                <div class="col">
                    <div class="form-floating mb-4">
                        <input type="text" class="form-control" id="view-to-reference" name="view-to-reference" disabled>
                        <label for="view-to-reference">TO Reference</label>
                    </div>
                    <div class="form-floating mb-4">
                        <input type="text" class="form-control" id="view-no-of-bales" name="view-no-of-bales" disabled>
                        <label for="view-no-of-bales">No. of Bales</label>
                    </div>
                    <div class="form-floating mb-4">
                        <input type="text" class="form-control" id="view-kilos" name="view-kilos" disabled>
                        <label for="view-kilos">Kilos</label>
                    </div>
                    <div class="form-floating mb-4">
                        <input type="text" class="form-control" id="view-origin" name="view-origin" disabled>
                        <label for="view-origin">Origin</label>
                    </div>
                    <div class="form-floating mb-4">
                        <input type="text" class="form-control" id="view-project" name="view-project" disabled>
                        <label for="view-project">Project</label>
                    </div>
                </div>
                <div class="col">
                    <div class="form-floating mb-4">
                        <input type="text" class="form-control" id="view-transfer-in-line" name="view-transfer-in-line" disabled>
                        <label for="view-transfer-in-line">Transfer in Line</label>
                    </div>
                    <div class="form-floating mb-4">
                        <input type="text" class="form-control" id="view-ordinal" name="view-ordinal" disabled>
                        <label for="view-ordinal">Ordinal</label>
                    </div>
                    <div class="form-floating mb-4">
                        <input type="text" class="form-control" id="view-shift" name="view-shift" disabled>
                        <label for="view-shift">Shift</label>
                    </div>
                    <div class="form-floating mb-4">
                        <input type="text" class="form-control" id="view-schedule" name="view-schedule" disabled>
                        <label for="view-schedule">Schedule</label>
                    </div>

                </div>
            </div>
        </form>
    </div>
    <div class="offcanvas-footer d-flex justify-content-end p-3 border-top">
        <button type="button" class="btn btn-dark me-2" data-bs-dismiss="offcanvas">Cancel</button>
        <button type="submit" class="btn btn-primary" form="add-unloading-form">Enter</button>
    </div>
</div>