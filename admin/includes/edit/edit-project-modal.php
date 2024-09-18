<div class="modal fade" id="edit-project-modal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Add Project</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="edit-project">
                    <input type="hidden" id="edit-project-id">
                    <div class="form-floating mb-4">
                        <input type="text" class="form-control" id="edit-project-name" name="edit-project-name" required>
                        <label for="edit-project">Project</label>
                    </div>
                    <div class="form-floating">
                        <input type="text" class="form-control" id="edit-description" name="edit-description" required>
                        <label for="edit-description">Description</label>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary" form="edit-project">Save Changes</button>
            </div>
        </div>
    </div>
</div>