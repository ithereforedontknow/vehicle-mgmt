<div class="offcanvas offcanvas-end w-50" tabindex="-1" id="addUserOffcanvas" aria-labelledby="addUserOffcanvasLabel">
    <div class="offcanvas-header border-bottom">
        <h5 class="offcanvas-title " id="addUserOffcanvasLabel">New <span class="fw-bold">user</span> record</h5>
        <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
    </div>
    <div class="offcanvas-body">
        <form id="add-user-form">
            <input type="hidden" id="add-user-id">
            <div class="row">
                <div class="col">
                    <div class="form-floating mb-4">
                        <input type="text" class="form-control" id="add-username" name="username" required>
                        <label for="add-username">Username</label>
                    </div>
                </div>
                <div class="col">

                    <div class="form-floating mb-4">
                        <select class="form-control" id="add-userlevel" name="userlevel" required>
                            <option value="admin">Admin</option>
                            <option value="encoder">Encoder</option>
                            <option value="traffic(main)">Traffic-in-Charge (Main)</option>
                            <option value="traffic(branch)">Traffic-in-Charge (Branch)</option>
                        </select>
                        <label for="add-userlevel" class="form-label">User Level</label>
                    </div>
                </div>
            </div>

            <div class="form-floating mb-4">
                <input type="text" class="form-control" id="add-fname" name="fname" required>
                <label for="add-fname" class="form-label">First Name</label>
            </div>

            <div class="form-floating mb-4">
                <input type="text" class="form-control" id="add-mname" name="mname" required>
                <label for="add-mname" class="form-label">Middle Name</label>
            </div>

            <div class="form-floating mb-4">
                <input type="text" class="form-control" id="add-lname" name="lname" required>
                <label for="add-lname" class="form-label">Last Name</label>
            </div>
            <div class="form-floating mb-4">
                <input type="text" class="form-control" id="add-password" name="password" required>
                <label for="add-password" class="form-label">Password</label>
            </div>
            <div class="form-floating mb-4">
                <select class="form-control" id="add-status" name="status" required>
                    <option value="1">Active</option>
                    <option value="0">Inactive</option>
                </select>
                <label for="add-status" class="form-label">Status</label>
            </div>
        </form>
    </div>
    <div class="offcanvas-footer d-flex justify-content-end p-3 border-top">
        <button type="button" class="btn btn-dark me-2" data-bs-dismiss="offcanvas">Cancel</button>
        <button type="submit" class="btn btn-primary" form="add-user-form">Create</button>
    </div>
</div>