<div class="modal fade" id="add-driver-modal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Add Driver</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="add-driver">
                    <div class="form-floating mb-4">
                        <input type="text" class="form-control" id="driver-fname" name="driver-fname" required>
                        <label for="driver-fname">First Name</label>
                    </div>
                    <div class="form-floating mb-4">
                        <input type="text" class="form-control" id="driver-mname" name="driver-mname" required>
                        <label for="driver-mname">Middle Name</label>
                    </div>
                    <div class="form-floating mb-4">
                        <input type="text" class="form-control" id="driver-lname" name="driver-lname" required>
                        <label for="driver-lname">Last Name</label>
                    </div>
                    <div class="form-floating">
                        <input type="tel" class="form-control" id="driver-phone" name="driver-phone" required maxlength="11">
                        <label for="driver-phone">Phone Number</label>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary" form="add-driver">Add</button>
            </div>
        </div>
    </div>
</div>