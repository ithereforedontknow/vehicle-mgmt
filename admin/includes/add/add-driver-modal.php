<div class="modal fade" id="add-driver-modal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-1" id="exampleModalLabel">Add Driver</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form id="add-driver">
                <div class="modal-body">
                    <div class="form-group mb-2">
                        <label for="driver-name">Driver Name</label>
                        <input type="text" class="form-control" id="driver-name" name="driver-name" required placeholder="">
                    </div>
                    <div class="form-group mb-2">
                        <label for="driver-phone">Phone Number</label>
                        <input type="tel" class="form-control" id="driver-phone" name="driver-phone" required placeholder="09XXXXXXXX">
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