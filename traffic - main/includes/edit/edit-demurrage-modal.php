<div class="modal fade" id="settingsDemurrageModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Edit Demurrage</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="edit-demurrage">
                    <div class="form-floating">
                        <input type="number" class="form-control" id="demurrage_name" name="demurrage_name" required>
                        <label for="demurrage_name">Demurrage</label>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary" form="edit-demurrage">Save Changes</button>
            </div>
        </div>
    </div>
</div>