<div class="modal fade" id="add-hauler-modal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Add Hauler</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="add-hauler">
                    <div class="form-floating mb-4">
                        <input type="text" class="form-control" id="hauler_name" name="hauler_name" required>
                        <label for="hauler_name">Hauler</label>
                    </div>
                    <div class="form-floating ">
                        <input type="text" class="form-control" id="hauler_address" name="hauler_address" required>
                        <label for="hauler_address">Address</label>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary" form="add-hauler">Add</button>
            </div>
        </div>
    </div>
</div>