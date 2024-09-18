<div class="modal fade" id="edit-hauler-modal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Edit Hauler</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="edit-hauler">
                    <input type="hidden" id="edit-hauler-id" name="edit-hauler-id">
                    <div class="form-floating mb-4">
                        <input type="text" class="form-control" id="edit-hauler-name" name="edit-hauler-name" required>
                        <label for="edit-hauler-name">Hauler</label>
                    </div>
                    <div class="form-floating ">
                        <input type="text" class="form-control" id="edit-hauler-address" name="edit-hauler-address" required>
                        <label for="edit-hauler-address">Address</label>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary" form="edit-hauler">Save Changes</button>
            </div>
        </div>
    </div>
</div>