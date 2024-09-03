<div class="modal fade" id="add-driver-modal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-1" id="exampleModalLabel">Add Driver & Helper</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form id="add-driver">
                <div class="modal-body">
                    <div class="row">
                        <div class="col">
                            <h1 class="fs-4" id="exampleModalLabel">Driver</h1>
                            <div class="form-group mb-2">
                                <label for="driver-fname">First Name</label>
                                <input type="text" class="form-control" id="driver-fname" name="driver-fname" required placeholder="">
                            </div>
                            <div class="form-group mb-2">
                                <label for="driver-mname">Middle Name</label>
                                <input type="text" class="form-control" id="driver-mname" name="driver-mname" required placeholder="">
                            </div>
                            <div class="form-group mb-2">
                                <label for="driver-lname">Last Name</label>
                                <input type="text" class="form-control" id="driver-lname" name="driver-lname" required placeholder="">
                            </div>
                            <div class="form-group mb-2">
                                <label for="driver-phone">Phone Number</label>
                                <input type="tel" class="form-control" id="driver-phone" name="driver-phone" required placeholder="09XXXXXXXX">
                            </div>
                        </div>
                        <div class="col">
                            <h1 class="fs-4" id="exampleModalLabel">Helper</h1>
                            <div class="form-group mb-2">
                                <label for="helper-fname">First Name</label>
                                <input type="text" class="form-control" id="helper-fname" name="helper-fname" required placeholder="">
                            </div>
                            <div class="form-group mb-2">
                                <label for="helper-mname">Middle Name</label>
                                <input type="text" class="form-control" id="helper-mname" name="helper-mname" required placeholder="">
                            </div>
                            <div class="form-group mb-2">
                                <label for="helper-lname">Last Name</label>
                                <input type="text" class="form-control" id="helper-lname" name="helper-lname" required placeholder="">
                            </div>
                            <div class="form-group mb-2">
                                <label for="helper-phone">Phone Number</label>
                                <input type="tel" class="form-control" id="helper-phone" name="helper-phone" required placeholder="09XXXXXXXX">
                            </div>
                        </div>
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