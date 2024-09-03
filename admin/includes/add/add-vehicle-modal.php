<div class="modal fade" id="add-vehicle-modal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-1" id="exampleModalLabel">Add Vehicle</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form id="add-vehicle">
                <div class="modal-body">
                    <div class="form-group mb-2">
                        <label for="plate-no">Plate Number</label>
                        <input type="text" class="form-control" id="plate-no" name="plate-no" required placeholder="">
                    </div>
                    <div class="form-group mb-2">
                        <label for="truck-type">Truck Type</label>
                        <select name="truck-type" id="truck-type" class="form-select" onchange="showOthersType()">
                            <option value="Trailer">Trailer</option>
                            <option value="Ten Wheeler">Ten Wheeler</option>
                            <option value="Forward">Forward</option>
                            <option value="Elf">Elf</option>
                            <option value="Others">Others</option>
                        </select>
                    </div>
                    <div class="form-group mb-2" id="others-type-container" style="display: none;">
                        <label for="others-type">Others</label>
                        <input type="text" class="form-control" id="others-type" name="others-type">
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