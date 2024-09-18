<?php
require_once 'db_connection.php';

$selectedPeriod = $_GET['period'] ?? 'year';

$timeCondition = match ($selectedPeriod) {
    'today' => "DATE(created_at) = CURDATE()",
    'month' => "MONTH(created_at) = MONTH(CURRENT_DATE()) AND YEAR(created_at) = YEAR(CURRENT_DATE())",
    default => "YEAR(created_at) = YEAR(CURRENT_DATE())",
};

// Adjust the query to return the correct labels and transaction counts
$query = "
    SELECT 
        " . ($selectedPeriod === 'today' ? "HOUR(created_at)" : ($selectedPeriod === 'month' ? "DAY(created_at)" : "MONTH(created_at)")) . " AS label,
        COUNT(*) AS transaction_count
    FROM Transaction
    WHERE $timeCondition
    GROUP BY label
    ORDER BY label
";

$result = $conn->query($query);

$data = [];
while ($row = $result->fetch_assoc()) {
    $data[] = $row;
}

echo json_encode($data);
