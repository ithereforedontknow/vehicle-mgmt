<?php
require_once 'db_connection.php';

$period = $_GET['period'] ?? 'year';   // Fetch the period parameter
$truck_type = $_GET['truck_type'] ?? ''; // Fetch the truck_type parameter

// Create the condition based on the selected period
$timeCondition = match ($period) {
    'today' => "DATE(t.created_at) = CURDATE()",
    'month' => "MONTH(t.created_at) = MONTH(CURRENT_DATE()) AND YEAR(t.created_at) = YEAR(CURRENT_DATE())",
    default => "YEAR(t.created_at) = YEAR(CURRENT_DATE())",
};

// SQL query to get plate_number and entry count, filtered by period and optionally truck_type
$sql = "
    SELECT v.plate_number, COUNT(*) AS entry_count
    FROM Transaction t
    JOIN Vehicle v ON t.vehicle_id = v.vehicle_id
    WHERE $timeCondition" . ($truck_type ? " AND v.truck_type = '$truck_type'" : '') . "
    GROUP BY v.plate_number
    ORDER BY entry_count DESC";

$result = $conn->query($sql);

// Fetch data and prepare it for JSON encoding
$vehicle_data = array();
while ($row = $result->fetch_assoc()) {
    $vehicle_data[] = [
        'plate_number' => $row['plate_number'],
        'entry_count' => $row['entry_count'],
    ];
}

echo json_encode($vehicle_data);
