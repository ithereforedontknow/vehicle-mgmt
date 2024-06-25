<div class="modal fade" id="add-vehicle-modal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-1" id="exampleModalLabel">Add User</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="add-vehicle">
                    <div class="form-group mb-2">
                        <label for="to_ref_no">TO Reference #</label>
                        <input type="text" class="form-control" id="to_ref_no" name="to_ref_no" required placeholder="000000-xx" maxlength="9">
                    </div>
                    <div class="form-group mb-2">
                        <label for="hauler">Hauler</label>
                        <input type="text" class="form-control" id="hauler" name="hauler" required placeholder="Enter hauler">
                    </div>
                    <div class="form-group mb-2">
                        <label for="plate_no">Plate Number</label>
                        <input type="text" class="form-control" id="plate_no" name="plate_no" required placeholder="Enter plate number" maxlength="8">
                    </div>
                    <div class="form-group mb-2">
                        <label for="driver_name">Driver Name</label>
                        <input type="text" class="form-control" id="driver_name" name="driver_name" required placeholder="Enter driver name">
                    </div>
                    <div class="form-group mb-2">
                        <label for="truck_type">Truck Type</label>
                        <input type="text" class="form-control" id="truck_type" name="truck_type" required placeholder="Enter truck type">
                    </div>
                    <div class="form-group mb-2">
                        <label for="project">Project</label>
                        <input type="text" class="form-control" id="project" name="project" required placeholder="Enter project">
                    </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Add</button>
                </form>
            </div>
        </div>
    </div>
</div>