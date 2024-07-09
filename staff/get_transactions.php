<?php
// Include your database connection file
require_once "../api/db_connection.php";

// Fetch data from the database
$sql = "SELECT 
            t.transaction_id, t.to_reference, t.arrival_time, t.time_of_entry, t.unloading_time_start, 
            t.unloading_time_end, t.time_of_departure, t.status,
            h.name AS hauler, v.plate_number, d.name AS driver_name, v.truck_type, p.name AS project
        FROM 
            Transaction t
        LEFT JOIN Hauler h ON t.hauler_id = h.hauler_id
        LEFT JOIN Vehicle v ON t.vehicle_id = v.vehicle_id
        LEFT JOIN Driver d ON t.driver_id = d.driver_id
        LEFT JOIN Project p ON t.project_id = p.project_id";
$result = $conn->query($sql);

// Check for query execution success
if ($result->num_rows > 0) {
    // Store all rows in an array
    $transactions = $result->fetch_all(MYSQLI_ASSOC);
} else {
    $transactions = [];
}

$conn->close();
