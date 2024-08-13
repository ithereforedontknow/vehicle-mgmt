<?php
require '../api/db_connection.php';

$period = isset($_GET['period']) ? $_GET['period'] : 'year';

switch ($period) {
    case 'today':
        $sql = "SELECT HOUR(time_of_entry) as label, COUNT(*) as transaction_count 
                FROM Transaction 
                WHERE DATE(time_of_entry) = CURDATE() 
                GROUP BY HOUR(time_of_entry) 
                ORDER BY HOUR(time_of_entry)";
        break;
    case 'month':
        $sql = "SELECT DAY(time_of_entry) as label, COUNT(*) as transaction_count 
                FROM Transaction 
                WHERE MONTH(time_of_entry) = MONTH(CURRENT_DATE()) 
                AND YEAR(time_of_entry) = YEAR(CURRENT_DATE()) 
                GROUP BY DAY(time_of_entry) 
                ORDER BY DAY(time_of_entry)";
        break;
    case 'year':
    default:
        $sql = "SELECT CONCAT(YEAR(time_of_entry), '-', MONTH(time_of_entry)) as label, 
                COUNT(*) as transaction_count 
                FROM Transaction 
                WHERE YEAR(time_of_entry) = YEAR(CURRENT_DATE()) 
                GROUP BY YEAR(time_of_entry), MONTH(time_of_entry) 
                ORDER BY YEAR(time_of_entry), MONTH(time_of_entry)";
        break;
}

$result = $conn->query($sql);
$data = array();

while ($row = $result->fetch_assoc()) {
    $data[] = $row;
}

echo json_encode($data);
