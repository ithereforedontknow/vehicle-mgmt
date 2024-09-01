<?php
include('./api/db_connection.php');
session_start();

// Check if the ID is provided via POST or GET
if (isset($_GET['id'])) {
    $id = mysqli_real_escape_string($conn, $_GET['id']);
} else {
    // Redirect to the forgot password page if no ID is provided
    header("Location: forgot_password.php");
    exit();
}

// Handle the password reset form submission
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $new_password = mysqli_real_escape_string($conn, $_POST['new_password']);
    $confirm_password = mysqli_real_escape_string($conn, $_POST['confirm_password']);

    // Check if passwords match
    if ($new_password === $confirm_password) {
        // Hash the new password before storing it
        $hashed_password = password_hash($new_password, PASSWORD_DEFAULT);

        // Update the user's password in the database
        $query = "UPDATE `tbl_user` SET `password` = '$hashed_password' WHERE `id` = '$id'";
        if (mysqli_query($conn, $query)) {
            echo "Password has been successfully reset.";
            // Redirect to the login page or wherever you want the user to go next
            header("Location: index.php");
            exit();
        } else {
            $error_message = "Failed to update the password. Please try again.";
        }
    } else {
        $error_message = "Passwords do not match. Please try again.";
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Reset Password</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="./css/style.css">
</head>

<body class="bg-light">
    <div class="text-center">
        <img class="" src="assets/ULPI_BLUE (1).png" alt="" width="400" />
    </div>
    <main class="form-signin w-100 m-auto">
        <div class="container">
            <div class="text-center">
                <h1 class="h2 mb-3 fw-normal text-center">Reset Password for Id <?= $id ?></h1>

                <!-- Reset Password Form -->
                <form method="POST" action="">
                    <?php if (isset($error_message)) { ?>
                        <div class="alert alert-danger" role="alert">
                            <?= $error_message ?>
                        </div>
                    <?php } ?>
                    <div class="form-floating mb-2 mt-2">
                        <input type="password" class="form-control form-control-lg shadow-sm" id="new_password" name="new_password" placeholder="New Password" required />
                        <label for="new_password">New Password</label>
                    </div>
                    <div class="form-floating mb-2">
                        <input type="password" class="form-control form-control-lg shadow-sm" id="confirm_password" name="confirm_password" placeholder="Confirm Password" required />
                        <label for="confirm_password">Confirm Password</label>
                    </div>
                    <button class="btn btn-primary w-100 py-3 fs-5" type="submit">
                        Reset Password
                    </button>
                </form>

                <p class="mt-5 mb-3 text-body-secondary">&copy; 2024</p>
            </div>
        </div>
    </main>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>