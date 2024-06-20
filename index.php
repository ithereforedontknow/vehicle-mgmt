<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Sign in</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous" />
  <style>
    html,
    body {
      height: 100%;
    }

    .form-signin {
      max-width: 330px;
      padding: 1rem;
    }

    .form-signin .form-floating:focus-within {
      z-index: 2;
    }

    .form-signin input[type="email"] {
      margin-bottom: -1px;
      border-bottom-right-radius: 0;
      border-bottom-left-radius: 0;
    }

    .form-signin input[type="password"] {
      margin-bottom: 10px;
      border-top-left-radius: 0;
      border-top-right-radius: 0;
    }
  </style>
</head>

<body>
  <main class="form-signin w-100 m-auto">
    <div class="container ">
      <div class="text-center">
        <img class="mb-4 text-center" src="assets/universal_corporation_logo.jpg" alt="" width="250" />
        <h1 class="h2 mb-3 fw-normal text-center">Please sign in</h1>
        <form id="login">
          <div class="form-floating mb-2 mt-2">
            <input type="text" class="form-control form-control-lg shadow-sm" id="id" name="id" autocomplete="off" placeholder="ID" required />
            <label for="id">ID</label>
          </div>
          <div class="form-floating mb-2">
            <input type="password" class="form-control form-control-lg shadow-sm" id="password" name="password" placeholder="Password" required />
            <label for="password">Password</label>
          </div>
          <button class="btn btn-primary w-100 py-3" type="button" onclick="login_user()">
            Sign in
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
        } else {
          alert(data); // Show the error message
        }
      });
    }
  </script>
</body>

</html>