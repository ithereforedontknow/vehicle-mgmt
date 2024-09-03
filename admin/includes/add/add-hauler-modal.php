<div class="modal fade" id="add-hauler-modal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-1" id="exampleModalLabel">Add Hauler</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form id="add-hauler">
                <div class="modal-body">
                    <div class="form-group mb-2">
                        <label for="hauler_name">Hauler</label>
                        <input type="text" class="form-control" id="hauler_name" name="hauler_name" required placeholder="">
                    </div>
                    <div class="form-group mb-2">
                        <label for="hauler_address">Address</label>
                        <input type="text" class="form-control" id="hauler_address" name="hauler_address" required placeholder="">
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