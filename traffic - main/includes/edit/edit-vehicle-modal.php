<div class="modal fade" id="edit-vehicle-modal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Edit Vehicle</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="edit-vehicle">
                    <input type="hidden" id="edit-vehicle-id">
                    <div class="form-floating mb-4">
                        <select name="edit-hauler" id="edit-hauler" class="form-select" required>
                            <?php
                            include_once('../db_connection.php');
                            $sql = "SELECT * FROM `hauler`";
                            $result = mysqli_query($conn, $sql);
                            while ($row = mysqli_fetch_assoc($result)) {
                                echo "<option value='" . $row['hauler_id'] . "'>" . $row['hauler_name'] . "</option>";
                            }
                            ?>
                        </select>
                        <label for="edit-hauler">Hauler</label>
                    </div>
                    <div class="form-floating mb-4">
                        <input type="text" class="form-control" id="edit-plate-no" name="edit-plate-no" required>
                        <label for="plate-no">Plate Number</label>
                    </div>
                    <div class="form-floating">
                        <select name="edit-truck-type" id="edit-truck-type" class="form-select" onchange="showOthersType()" required>
                            <option value="Trailer">Trailer</option>
                            <option value="Ten Wheeler">Ten Wheeler</option>
                            <option value="Forward">Forward</option>
                            <option value="Elf">Elf</option>
                            <option value="Others">Others</option>
                        </select>
                        <label for="edit-truck-type">Truck Type</label>
                    </div>
                    <div class="form-floating mt-4" id="edit-others-type-container" style="display: none;">
                        <input type="text" class="form-control" id="edit-others-type" name="edit-others-type" required>
                        <label for="edit-others-type">Others</label>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary" form="edit-vehicle">Save Changes</button>
            </div>
        </div>
    </div>
</div>