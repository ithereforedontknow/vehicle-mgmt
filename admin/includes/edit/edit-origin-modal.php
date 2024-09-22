<div class="modal fade" id="edit-origin-modal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Add origin</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="edit-origin">
                    <input type="hidden" id="edit-origin-id">
                    <div class="form-floating">
                        <input type="text" class="form-control" id="edit-origin-name" name="edit-origin-name" required>
                        <label for="edit-origin">Origin</label>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary" form="edit-origin">Save Changes</button>
            </div>
        </div>
    </div>
</div>