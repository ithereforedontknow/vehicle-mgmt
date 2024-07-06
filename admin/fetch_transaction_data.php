<?php
require "../api/db_connection.php"; // Adjust path as per your directory structure

// Query to fetch transaction counts per month, ordered by ascending year and month
$sql = "SELECT YEAR(arrival_date) AS year, MONTH(arrival_date) AS month, COUNT(*) AS transaction_count
        FROM Transaction
        GROUP BY YEAR(arrival_date), MONTH(arrival_date)
        ORDER BY year ASC, month ASC";
$result = $conn->query($sql);

$data = [];
while ($row = $result->fetch_assoc()) {
    $data[] = [
        'year' => $row['year'],
        'month' => $row['month'],
        'transaction_count' => $row['transaction_count']
    ];
}

header('Content-Type: application/json');
echo json_encode($data);
