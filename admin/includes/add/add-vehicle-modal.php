<div class="modal fade" id="add-vehicle-modal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Add Vehicle</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="add-vehicle">
                    <div class="form-floating mb-4">
                        <select name="hauler" id="hauler" class="form-select" required>
                            <?php
                            include_once('../db_connection.php');
                            $sql = "SELECT * FROM `hauler`";
                            $result = mysqli_query($conn, $sql);
                            while ($row = mysqli_fetch_assoc($result)) {
                                echo "<option value='" . $row['hauler_id'] . "'>" . $row['hauler_name'] . "</option>";
                            }
                            ?>

                        </select>
                        <label for="hauler">Hauler</label>
                    </div>
                    <div class="form-floating mb-4">
                        <input type="text" class="form-control" id="plate-no" name="plate-no" required>
                        <label for="plate-no">Plate Number</label>
                    </div>
                    <div class="form-floating">
                        <select name="truck-type" id="truck-type" class="form-select" onchange="showOthersType()" required>
                            <option value="Trailer">Trailer</option>
                            <option value="Ten Wheeler">Ten Wheeler</option>
                            <option value="Forward">Forward</option>
                            <option value="Elf">Elf</option>
                            <option value="Others">Others</option>
                        </select>
                        <label for="truck-type">Truck Type</label>
                    </div>
                    <!-- <div class="form-floating mt-4" id="others-type-container" style="display: none;">
                        <input type="text" class="form-control" id="others-type" name="others-type" required>
                        <label for="others-type">Others</label>
                    </div> -->
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary" form="add-vehicle">Add</button>
            </div>
        </div>
    </div>
</div>