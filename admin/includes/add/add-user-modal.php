<div class="modal fade" id="add-user-modal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-1" id="exampleModalLabel">Add User</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form id="add-user">
                <div class="modal-body">
                    <div class="form-group mb-2">
                        <label for="username">Username</label>
                        <input type="text" class="form-control" id="username" name="username" required placeholder="JohnDoe">
                    </div>
                    <div class="form-group mb-2">
                        <label for="fname">First Name</label>
                        <input type="text" class="form-control" id="fname" name="fname" required placeholder="John">
                    </div>
                    <div class="form-group mb-2">
                        <label for="mname">Middle Name</label>
                        <input type="text" class="form-control" id="mname" name="mname" required placeholder="">
                    </div>
                    <div class="form-group mb-2">
                        <label for="lname">Last Name</label>
                        <input type="text" class="form-control" id="lname" name="lname" required placeholder="Doe">
                    </div>
                    <div class="form-group mb-2">
                        <label for="lastName">Password</label>
                        <input type="password" class="form-control" id="password" name="password" required placeholder="Enter password">
                    </div>
                    <div class="form-group mb-2">
                        <label for="user-level">User level</label>
                        <select class="form-control" id="userlevel" name="userlevel" required>
                            <option value="admin">Admin</option>
                            <option value="tech assoc">Technical Associate</option>
                            <option value="encoder">Encoder</option>
                        </select>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Add</button>
                </div>
            </form>
        </div>
    </div>
</div>