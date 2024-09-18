<div class="modal fade" id="edit-driver-modal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Add Driver</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="edit-driver">
                    <input type="hidden" id="edit-driver-id" name="edit-driver-id">
                    <div class="form-floating mb-4">
                        <input type="text" class="form-control" id="edit-driver-fname" name="edit-driver-fname" required>
                        <label for="edit-driver-fname">First Name</label>
                    </div>
                    <div class="form-floating mb-4">
                        <input type="text" class="form-control" id="edit-driver-mname" name="edit-driver-mname" required>
                        <label for="edit-driver-mname">Middle Name</label>
                    </div>
                    <div class="form-floating mb-4">
                        <input type="text" class="form-control" id="edit-driver-lname" name="edit-driver-lname" required>
                        <label for="edit-driver-lname">Last Name</label>
                    </div>
                    <div class="form-floating">
                        <input type="tel" class="form-control" id="edit-driver-phone" name="edit-driver-phone" required>
                        <label for="edit-driver-phone">Phone Number</label>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary" form="edit-driver">Save Changes</button>
            </div>
        </div>
    </div>
</div>