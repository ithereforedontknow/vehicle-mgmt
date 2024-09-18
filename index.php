<?php
session_start();
if (isset($_SESSION['id'])) {
  header("location: admin/index.php");
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Login</title>
  <link rel="stylesheet" href="public/css/bootstrap.min.css">
  <link rel="icon" type="image/x-icon" href="assets/Untitled-1.png" />
  <link rel="stylesheet" href="css/style.css">
</head>

<body class="bg-light">
  <div class="text-center">
    <img class="" src="assets/ULPI_BLUE (1).png" alt="" width="400" />
  </div>
  <main class="form-signin w-100 m-auto">
    <div class="container ">
      <div class="text-center">
        <form id="login_form">
          <div class="form-floating mb-2 mt-2">
            <input type="text" class="form-control shadow-sm" id="username" name="username" autocomplete="off" placeholder="JohnDoe" required />
            <label for="username">Username</label>
          </div>
          <div class="form-floating mb-2">
            <input type="password" class="form-control shadow-sm" id="password" name="password" placeholder="Password" required />
            <label for="password">Password</label>
          </div>
        </form>
        <button class="btn btn-primary w-100 py-3" type="submit" form="login_form">
          Login
        </button>
        <div class="mt-3">
          <a href="forgot_password.php" class="text-decoration-none">Forgot Password?</a>
        </div>
      </div>
    </div>
    <p class="mt-5 mb-3 text-muted text-center">&copy; <?= date('Y'); ?></p>
  </main>
  <script src="public/js/bootstrap.bundle.min.js"></script>
  <script src="public/js/jquery.min.js"></script>
  <script src="index.js"></script>
</body>

</html>