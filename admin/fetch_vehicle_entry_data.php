<?php
require_once '../api/db_connection.php';


$period = isset($_GET['period']) ? $_GET['period'] : 'year'; // Default to 'year'
$truck_type = isset($_GET['truck_type']) ? $_GET['truck_type'] : ''; // Get the selected truck type

$timeCondition = "";
if ($period == 'today') {
    $timeCondition = "DATE(time_of_entry) = CURDATE()";
} elseif ($period == 'month') {
    $timeCondition = "MONTH(time_of_entry) = MONTH(CURRENT_DATE()) AND YEAR(time_of_entry) = YEAR(CURRENT_DATE())";
} else { // Default to 'year'
    $timeCondition = "YEAR(time_of_entry) = YEAR(CURRENT_DATE())";
}

// SQL query to join Transaction with Vehicle, filter by truck_type, and count entries per plate_number
$sql = "
    SELECT v.plate_number, COUNT(*) AS entry_count
    FROM Transaction t
    JOIN Vehicle v ON t.vehicle_id = v.vehicle_id
    WHERE $timeCondition";

if (!empty($truck_type)) {
    $sql .= " AND v.truck_type = '" . $conn->real_escape_string($truck_type) . "'";
}

$sql .= "
    GROUP BY v.plate_number
    ORDER BY entry_count DESC";

$result = $conn->query($sql);

$vehicle_data = [];
while ($row = $result->fetch_assoc()) {
    $vehicle_data[] = [
        'plate_number' => $row['plate_number'],
        'entry_count' => $row['entry_count']
    ];
}

echo json_encode($vehicle_data);
