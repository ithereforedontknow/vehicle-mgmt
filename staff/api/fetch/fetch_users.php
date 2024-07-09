<?php
require_once "db_connection.php";

// Get search term and pagination parameters
$search = isset($_GET['search']) ? $_GET['search'] : '';
$page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
$limit = 10;
$offset = ($page - 1) * $limit;

// Build the query
$sql = "SELECT * FROM tbl_user WHERE CONCAT(fname, ' ', lname) LIKE ? LIMIT ?, ?";
$stmt = $conn->prepare($sql);
$searchParam = "%$search%";
$stmt->bind_param("sii", $searchParam, $offset, $limit);
$stmt->execute();
$result = $stmt->get_result();

// Fetch total count for pagination
$countSql = "SELECT COUNT(*) AS total FROM tbl_user WHERE CONCAT(fname, ' ', lname) LIKE ?";
$countStmt = $conn->prepare($countSql);
$countStmt->bind_param("s", $searchParam);
$countStmt->execute();
$countResult = $countStmt->get_result();
$totalCount = $countResult->fetch_assoc()['total'];

$data = [];
while ($row = $result->fetch_assoc()) {
    $data[] = $row;
}

// Prepare the response
$response = [
    'data' => $data,
    'total' => $totalCount,
    'page' => $page,
    'limit' => $limit
];

header('Content-Type: application/json');
echo json_encode($response);

// Close connections
$stmt->close();
$countStmt->close();
$conn->close();
