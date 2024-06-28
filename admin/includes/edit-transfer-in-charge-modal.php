<!-- Add this modal at the end of your HTML body -->
<div class="modal fade" id="edit-transfer-in-charge-modal" tabindex="-1" aria-labelledby="edit-transfer-in-charge-label" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="edit-transfer-in-charge-label">Edit Transfer in Charge</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form id="edit-transfer-in-charge">
                <div class="modal-body">
                    <input type="hidden" id="editTransferInChargeId" name="editTransferInChargeId">
                    <div class="mb-3">
                        <label for="editEmployeeFirstName" class="form-label">First Name</label>
                        <input type="text" class="form-control" id="editEmployeeFirstName" name="editEmployeeFirstName" required>
                    </div>
                    <div class="mb-3">
                        <label for="editEmployeeLastName" class="form-label">Last Name</label>
                        <input type="text" class="form-control" id="editEmployeeLastName" name="editEmployeeLastName" required>
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