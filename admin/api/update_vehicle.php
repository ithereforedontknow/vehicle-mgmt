<?php
require_once('db_connection.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Handle form submission
    $to_ref_no = $_POST['edit-to-ref-no'];
    $hauler = $_POST['edit-hauler'];
    $plate_no = $_POST['edit-plate-no'];
    $driver_name = $_POST['edit-driver-name'];
    $truck_type = $_POST['edit-truck-type'];
    $project = $_POST['edit-project'];

    // Update vehicle in the database
    $sql = "UPDATE tbl_vehicles SET hauler = :hauler, plate_no =
         :plate_no, driver_name = :driver_name, truck_type = :truck_type, project = :project WHERE to_ref_no = :to_ref_no";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':to_ref_no', $to_ref_no, PDO::PARAM_STR);
    $stmt->bindParam(':hauler', $hauler, PDO::PARAM_STR);
    $stmt->bindParam(':plate_no', $plate_no, PDO::PARAM_STR);
    $stmt->bindParam(':driver_name', $driver_name, PDO::PARAM_STR);
    $stmt->bindParam(':truck_type', $truck_type, PDO::PARAM_STR);
    $stmt->bindParam(':project', $project, PDO::PARAM_STR);

    if ($stmt->execute()) {
        // Return success response
        echo json_encode(array('success' => true));
    } else {
        // Return error response
        echo json_encode(array('error' => 'Failed to update vehicle'));
    }
}
