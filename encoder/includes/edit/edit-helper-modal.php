<div class="modal fade" id="edit-helper-modal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Add Helper</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="edit-helper">
                    <input type="hidden" id="edit-helper-id" name="edit-helper-id">
                    <div class="form-floating mb-4">
                        <input type="text" class="form-control" id="edit-helper-fname" name="edit-helper-fname" required>
                        <label for="edit-helper-fname">First Name</label>
                    </div>
                    <div class="form-floating mb-4">
                        <input type="text" class="form-control" id="edit-helper-mname" name="edit-helper-mname" required>
                        <label for="edit-helper-mname">Middle Name</label>
                    </div>
                    <div class="form-floating mb-4">
                        <input type="text" class="form-control" id="edit-helper-lname" name="edit-helper-lname" required>
                        <label for="edit-helper-lname">Last Name</label>
                    </div>
                    <div class="form-floating">
                        <input type="tel" class="form-control" id="edit-helper-phone" name="edit-helper-phone" required>
                        <label for="edit-helper-phone">Phone Number</label>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary" form="edit-helper">Save Changes</button>
            </div>
        </div>
    </div>
</div>