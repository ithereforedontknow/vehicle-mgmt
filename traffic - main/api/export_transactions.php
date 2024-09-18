<?php
require '../../api/db_connection.php';

header('Content-Type: application/json');

$sql = "SELECT t.transaction_id, t.to_reference, h.hauler_name AS hauler, v.plate_number, v.truck_type, d.driver_name AS driver, p.project_name AS project, t.status, t.transfer_in_line, t.ordinal, t.shift, t.schedule, t.no_of_bales, t.kilos, t.origin, t.arrival_date, t.arrival_time, t.unloading_date, t.time_of_entry, t.unloading_time_start, t.unloading_time_end, t.time_of_departure FROM Transaction t 
        INNER JOIN hauler h ON t.hauler_id = h.hauler_id 
        INNER JOIN vehicle v ON t.vehicle_id = v.vehicle_id 
        INNER JOIN driver d ON t.driver_id = d.driver_id 
        INNER JOIN project p ON t.project_id = p.project_id";

$result = $conn->query($sql);

$data = array();
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $data[] = $row;
    }
}

echo json_encode($data);

$conn->close();
