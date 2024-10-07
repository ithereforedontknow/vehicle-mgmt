<div class="modal fade" id="add-helper-modal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Add Helper</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="add-helper">
                    <div class="form-floating mb-4">
                        <input type="text" class="form-control" id="helper-fname" name="helper-fname" required>
                        <label for="helper-fname">First Name</label>
                    </div>
                    <div class="form-floating mb-4">
                        <input type="text" class="form-control" id="helper-mname" name="helper-mname" required>
                        <label for="helper-mname">Middle Name</label>
                    </div>
                    <div class="form-floating mb-4">
                        <input type="text" class="form-control" id="helper-lname" name="helper-lname" required>
                        <label for="helper-lname">Last Name</label>
                    </div>
                    <div class="form-floating">
                        <input type="tel" class="form-control" id="helper-phone" name="helper-phone" required maxlength="11">
                        <label for="helper-phone">Phone Number</label>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary" form="add-helper">Add</button>
            </div>
        </div>
    </div>
</div>