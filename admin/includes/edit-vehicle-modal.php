<div class="modal fade" id="edit-vehicle-modal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-1" id="exampleModalLabel">Add User</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form id="edit-vehicle">
                <div class="modal-body">
                    <div class="form-group mb-2">
                        <input type="hidden" id="edit-to-ref-no" name="edit-to-ref-no">
                    </div>
                    <div class="form-group mb-2">
                        <label for="hauler">Hauler</label>
                        <input type="text" class="form-control" id="edit-hauler" name="edit-hauler" required placeholder="Enter hauler">
                    </div>
                    <div class="form-group mb-2">
                        <label for="plate_no">Plate Number</label>
                        <input type="text" class="form-control" id="edit-plate-no" name="edit-plate-no" required placeholder="Enter plate number" maxlength="8">
                    </div>
                    <div class="form-group mb-2">
                        <label for="driver_name">Driver Name</label>
                        <input type="text" class="form-control" id="edit-driver-name" name="edit-driver-name" required placeholder="Enter driver name">
                    </div>
                    <div class="form-group mb-2">
                        <label for="truck_type">Truck Type</label>
                        <input type="text" class="form-control" id="edit-truck-type" name="edit-truck-type" required placeholder="Enter truck type">
                    </div>
                    <div class="form-group mb-2">
                        <label for="project">Project</label>
                        <input type="text" class="form-control" id="edit-project" name="edit-project" required placeholder="Enter project">
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