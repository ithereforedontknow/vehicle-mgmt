<div class="offcanvas offcanvas-end w-50" tabindex="-1" id="addTransactionOffcanvas" aria-labelledby="addTransactionOffcanvas-label">
    <div class="offcanvas-header border-bottom">
        <h5 class="offcanvas-title" id="addTransactionOffcanvas-label">New <span class="fw-bold">transaction</span> record</h5>
        <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
    </div>
    <div class="offcanvas-body">
        <form id="add-transaction">
            <div class="row">
                <div class="col">
                    <div class="form-floating mb-4">
                        <input type="text" class="form-control" id="to-reference" name="to-reference">
                        <label for="to-reference">TO Reference #</label>
                    </div>
                    <div class="form-floating mb-4">
                        <select class="form-select" name="hauler" id="hauler">
                            <?php
                            $sql = "SELECT * FROM `hauler`";
                            $result = mysqli_query($conn, $sql);
                            while ($row = mysqli_fetch_assoc($result)) {
                                echo '<option value="' . $row['hauler_id'] . '">' . $row['hauler_name'] . '</option>';
                            }
                            ?>
                        </select>
                        <label for="hauler">Hauler</label>
                    </div>
                    <div class="form-floating mb-4">
                        <select class="form-select" name="plate-number" id="plate-number">
                            <?php
                            $sql = "SELECT * FROM `vehicle`";
                            $result = mysqli_query($conn, $sql);
                            while ($row = mysqli_fetch_assoc($result)) {
                                echo '<option value="' . $row['vehicle_id'] . '">' . $row['plate_number'] . ' : ' . $row['truck_type'] . '</option>';
                            }
                            ?>
                        </select>
                        <label for="plate-number">Plate Number</label>
                    </div>
                    <div class="form-floating mb-4">
                        <select class="form-select" name="driver-name" id="driver-name">
                            <?php
                            $sql = "SELECT * FROM `driver`";
                            $result = mysqli_query($conn, $sql);
                            while ($row = mysqli_fetch_assoc($result)) {
                                echo '<option value="' . $row['driver_id'] . '">' . $row['driver_fname'] .  ' ' . $row['driver_lname'] . '</option>';
                            }
                            ?>
                        </select>
                        <label for="driver-name">Driver Name</label>
                    </div>
                    <div class="form-floating mb-4">
                        <select class="form-select" name="helper-name" id="helper-name">
                            <?php
                            $sql = "SELECT * FROM `helper`";
                            $result = mysqli_query($conn, $sql);
                            while ($row = mysqli_fetch_assoc($result)) {
                                echo '<option value="' . $row['helper_id'] . '">' . $row['helper_fname'] .  ' ' . $row['helper_lname'] . '</option>';
                            }
                            ?>
                        </select>
                        <label for="helper-name">Helper Name</label>
                    </div>
                    <div class="form-floating mb-4">
                        <select class="form-select" name="project" id="project">
                            <?php
                            $sql = "SELECT * FROM `project`";
                            $result = mysqli_query($conn, $sql);
                            while ($row = mysqli_fetch_assoc($result)) {
                                echo '<option value="' . $row['project_id'] . '">' . $row['project_name'] . '</option>';
                            }
                            ?>
                        </select>
                        <label for="project">Project</label>
                    </div>
                </div>
                <div class="col">
                    <div class="form-floating mb-4">
                        <input type="number" class="form-control" id="no-of-bales" name="no-of-bales">
                        <label for="no-of-bales">No of Bales</label>
                    </div>
                    <div class="form-floating mb-4">
                        <input type="number" class="form-control" id="kilos" name="kilos">
                        <label for="kilos">Kilos</label>
                    </div>
                    <div class="form-floating mb-4">
                        <input type="text" class="form-control" id="origin" name="origin">
                        <label for="origin">Origin</label>
                    </div>
                    <div class="form-floating mb-4">
                        <input type="date" class="form-control" id="arrival-date" name="arrival-date">
                        <label for="arrival-date">Arrival Date</label>
                    </div>
                    <div class="form-floating mb-4">
                        <input type="datetime-local" class="form-control" id="arrival-time" name="arrival-time">
                        <label for="arrival-time">Arrival Time</label>
                    </div>
                </div>
            </div>
        </form>
    </div>
    <div class="offcanvas-footer d-flex justify-content-end p-3 border-top sticky-bottom bg-white">
        <button type="button" class="btn btn-dark me-2" data-bs-dismiss="offcanvas">Cancel</button>
        <button type="submit" class="btn btn-primary" form="add-transaction">Add to Unloading</button>
    </div>
</div>