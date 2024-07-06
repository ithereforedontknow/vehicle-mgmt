<!-- Add this modal at the end of your HTML body -->
<div class="modal fade" id="edit-user-modal" tabindex="-1" aria-labelledby="edit-user-modal-label" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="edit-user-modal-label">Edit User</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form id="edit-user">
                <div class="modal-body">
                    <input type="hidden" id="edit-user-id" name="edit-user-id">

                    <div class="mb-3">
                        <label for="edit-username" class="form-label">Username</label>
                        <input type="text" class="form-control" id="edit-username" name="edit-username" required>
                    </div>

                    <div class="mb-3">
                        <label for="edit-fname" class="form-label">First Name</label>
                        <input type="text" class="form-control" id="edit-fname" name="edit-fname" required>
                    </div>
                    <div class="mb-3">
                        <label for="edit-mname" class="form-label">Middle Name</label>
                        <input type="text" class="form-control" id="edit-mname" name="edit-mname" required>
                    </div>
                    <div class="mb-3">
                        <label for="edit-lname" class="form-label">Last Name</label>
                        <input type="text" class="form-control" id="edit-lname" name="edit-lname" required>
                    </div>
                    <div class="mb-3">
                        <label for="edit-password" class="form-label">Password</label>
                        <input type="password" class="form-control" id="edit-password" name="edit-password" required>
                    </div>
                    <div class="mb-3">
                        <label for="user-level">User level</label>
                        <select class="form-control" id="edit-userlevel" name="edit-userlevel" required>
                            <option value="admin">Admin</option>
                            <option value="tech assoc">Technical Associate</option>
                            <option value="encoder">Encoder</option>
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