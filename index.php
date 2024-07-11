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
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous" />
  <!-- link to favicon -->
  <link rel="icon" type="image/x-icon" href="assets/Untitled-1.png" />
  <link rel="stylesheet" href="./css/style.css">
</head>

<body class="bg-light">
  <div class="text-center">
    <img class="" src="assets/ULPI_BLUE (1).png" alt="" width="400" />
  </div>
  <main class="form-signin w-100 m-auto">
    <div class="container ">
      <div class="text-center">
        <h1 class="h2 mb-3 fw-normal text-center"></h1>
        <form id="login">
          <div class="form-floating mb-2 mt-2">
            <input type="text" class="form-control form-control-lg shadow-sm" id="username" name="username" autocomplete="off" placeholder="JohnDoe" required />
            <label for="username">Username</label>
          </div>
          <div class="form-floating mb-2">
            <input type="password" class="form-control form-control-lg shadow-sm" id="password" name="password" placeholder="Password" required />
            <label for="password">Password</label>
          </div>
          <button class="btn btn-primary w-100 py-3 fs-5" type="button" onclick="login_user()">
            Login
          </button>
        </form>
        <p class="mt-5 mb-3 text-body-secondary">&copy; 2024</p>
      </div>
    </div>
  </main>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

  <script>
    function login_user() {
      $.post("./api/login.php", $("#login").serialize(), function(data) {
        console.log(data);
        if (data === "admin") {
          window.location.href = "./admin/index.php";
        } else if (data === "tech assoc") {
          window.location.href = "./staff/index.php";
        } else if (data === "encoder") {
          window.location.href = "./encoder/add_transaction.php";
        } else {
          alert(data); // Show the error message
        }
      });
    }
  </script>
</body>

</html>