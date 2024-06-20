<?php
session_start();
// if (!isset($_SESSION['userid'])) {
//     header("location: ../index.php");
// }

// if (isset($_SESSION['userid']) && $_SESSION['userlvl'] == "admin") {
//     header("location: ../admin/usermanagement.php");
// } else if (isset($_SESSION['userid']) && $_SESSION['userlvl'] == "employee") {
//     header("location: ../employee/dashboard.php");
// } else {
//     header("location: ../user/dashboard.php");
// }

require("./api/db_connection.php");
$id = $_SESSION['id'];
$query = $conn->query("SELECT fname, lname FROM tbl_user WHERE id = '$id'");
$name = $query->fetchColumn();
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Admin</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous" />
  <style>
    body {
      min-height: 100vh;
      min-height: -webkit-fill-available;
    }

    html {
      height: -webkit-fill-available;
    }

    main {
      height: 100vh;
      height: -webkit-fill-available;
      max-height: 100vh;
      overflow-x: auto;
      overflow-y: hidden;
    }
  </style>
</head>

<body>
  <main class="d-flex flex-nowrap">
    <h1 class="visually-hidden">Universal Leaf</h1>

    <div class="d-flex flex-column flex-shrink-0 p-3 text-bg-dark" style="width: 280px">
      <a href="" class="d-flex align-items-center mb-3 mb-md-0 me-md-auto text-white text-decoration-none">
        <img class="mb-4 text-center" src="../assets/universal_corporation_logo.jpg" alt="" width="240" />
      </a>
      <hr />
      <ul class="nav nav-pills flex-column mb-auto">
        <li class="nav-item">
          <a href="#" class="nav-link active" aria-current="page">
            <svg width="24px" height="24px" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
              <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
              <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
              <g id="SVGRepo_iconCarrier">
                <path d="M3 14.6C3 14.0399 3 13.7599 3.10899 13.546C3.20487 13.3578 3.35785 13.2049 3.54601 13.109C3.75992 13 4.03995 13 4.6 13H5.4C5.96005 13 6.24008 13 6.45399 13.109C6.64215 13.2049 6.79513 13.3578 6.89101 13.546C7 13.7599 7 14.0399 7 14.6V19.4C7 19.9601 7 20.2401 6.89101 20.454C6.79513 20.6422 6.64215 20.7951 6.45399 20.891C6.24008 21 5.96005 21 5.4 21H4.6C4.03995 21 3.75992 21 3.54601 20.891C3.35785 20.7951 3.20487 20.6422 3.10899 20.454C3 20.2401 3 19.9601 3 19.4V14.6Z" stroke="#ffffff" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
                <path d="M10 4.6C10 4.03995 10 3.75992 10.109 3.54601C10.2049 3.35785 10.3578 3.20487 10.546 3.10899C10.7599 3 11.0399 3 11.6 3H12.4C12.9601 3 13.2401 3 13.454 3.10899C13.6422 3.20487 13.7951 3.35785 13.891 3.54601C14 3.75992 14 4.03995 14 4.6V19.4C14 19.9601 14 20.2401 13.891 20.454C13.7951 20.6422 13.6422 20.7951 13.454 20.891C13.2401 21 12.9601 21 12.4 21H11.6C11.0399 21 10.7599 21 10.546 20.891C10.3578 20.7951 10.2049 20.6422 10.109 20.454C10 20.2401 10 19.9601 10 19.4V4.6Z" stroke="#ffffff" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
                <path d="M17 10.6C17 10.0399 17 9.75992 17.109 9.54601C17.2049 9.35785 17.3578 9.20487 17.546 9.10899C17.7599 9 18.0399 9 18.6 9H19.4C19.9601 9 20.2401 9 20.454 9.10899C20.6422 9.20487 20.7951 9.35785 20.891 9.54601C21 9.75992 21 10.0399 21 10.6V19.4C21 19.9601 21 20.2401 20.891 20.454C20.7951 20.6422 20.6422 20.7951 20.454 20.891C20.2401 21 19.9601 21 19.4 21H18.6C18.0399 21 17.7599 21 17.546 20.891C17.3578 20.7951 17.2049 20.6422 17.109 20.454C17 20.2401 17 19.9601 17 19.4V10.6Z" stroke="#ffffff" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
              </g>
            </svg>
            Dashboard
          </a>
        </li>
        <li>
          <a href="user_mgmt.php" class="nav-link text-white">
            <svg width="24px" height="24px" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
              <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
              <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
              <g id="SVGRepo_iconCarrier">
                <path d="M7.5 12C9.77817 12 11.625 10.1532 11.625 7.875C11.625 5.59683 9.77817 3.75 7.5 3.75C5.22183 3.75 3.375 5.59683 3.375 7.875C3.375 10.1532 5.22183 12 7.5 12Z" stroke="#ffffff" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                <path d="M0.75 20.25C0.75 18.4598 1.46116 16.7429 2.72703 15.477C3.9929 14.2112 5.70979 13.5 7.5 13.5C9.29021 13.5 11.0071 14.2112 12.273 15.477C13.5305 16.7346 14.2407 18.4373 14.2499 20.2148" stroke="#ffffff" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                <path d="M17.7266 13.5C19.5905 13.5 21.1016 11.989 21.1016 10.125C21.1016 8.26104 19.5905 6.75 17.7266 6.75C15.8626 6.75 14.3516 8.26104 14.3516 10.125C14.3516 11.989 15.8626 13.5 17.7266 13.5Z" stroke="#ffffff" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                <path d="M15.8135 15.068C16.6486 14.7602 17.5456 14.6587 18.4284 14.7721C19.3111 14.8854 20.1534 15.2103 20.8836 15.7191C21.6139 16.2279 22.2104 16.9056 22.6225 17.6944C23.0297 18.4741 23.2449 19.3395 23.2504 20.2188" stroke="#ffffff" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
              </g>
            </svg>
            Users
          </a>
        </li>
        <li>
          <a href="vehicle_profiles.php" class="nav-link text-white">
            <svg fill="#f7f7f7" height="24px" width="24px" version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 484.996 484.996" xml:space="preserve" stroke="#f7f7f7">
              <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
              <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
              <g id="SVGRepo_iconCarrier">
                <g>
                  <path d="M393.498,0H91.499c-21.78,0-39.5,17.72-39.5,39.5v257.996c0,20.601,15.854,37.558,36,39.337v15.163H78 c-6.352,0-11.5,5.148-11.5,11.5v45c0,6.352,5.148,11.5,11.5,11.5h19.998v53.5c0,6.352,5.148,11.5,11.5,11.5h44 c6.352,0,11.5-5.148,11.5-11.5v-53.5h154.999v53.5c0,6.352,5.148,11.5,11.5,11.5h44c6.352,0,11.5-5.148,11.5-11.5v-53.5h19.998 c6.352,0,11.5-5.148,11.5-11.5v-45c0-6.352-5.148-11.5-11.5-11.5h-9.998v-15.163c20.146-1.779,36-18.736,36-39.337V39.5 C432.998,17.72,415.278,0,393.498,0z M141.999,461.996h-21v-42h21V461.996z M363.998,461.996h-21v-42h21V461.996z M373.998,234.996 H110.999v-105h262.999V234.996z M395.496,396.996H89.5v-22h305.995V396.996z M110.999,351.996v-94h262.999v94H110.999z M409.998,297.496c0,7.896-5.579,14.507-13,16.118V118.496c0-6.352-5.148-11.5-11.5-11.5H99.499c-6.352,0-11.5,5.148-11.5,11.5 v195.118c-7.421-1.611-13-8.223-13-16.118V39.5c0-9.098,7.402-16.5,16.5-16.5h301.999c9.098,0,16.5,7.402,16.5,16.5V297.496z"></path>
                  <path d="M152.499,277.996c-16.817,0-30.5,13.683-30.5,30.5c0,16.817,13.683,30.5,30.5,30.5s30.5-13.683,30.5-30.5 C182.999,291.679,169.316,277.996,152.499,277.996z M152.499,315.996c-4.136,0-7.5-3.364-7.5-7.5c0-4.136,3.364-7.5,7.5-7.5 s7.5,3.364,7.5,7.5C159.999,312.632,156.634,315.996,152.499,315.996z"></path>
                  <path d="M332.498,277.996c-16.817,0-30.5,13.683-30.5,30.5c0,16.817,13.683,30.5,30.5,30.5c16.817,0,30.5-13.683,30.5-30.5 C362.998,291.679,349.315,277.996,332.498,277.996z M332.498,315.996c-4.136,0-7.5-3.364-7.5-7.5c0-4.136,3.364-7.5,7.5-7.5 c4.136,0,7.5,3.364,7.5,7.5C339.998,312.632,336.633,315.996,332.498,315.996z"></path>
                </g>
              </g>
            </svg>
            Vehicle Profiles
          </a>
        </li>
        <li>
          <a href="vehicle_transactions.php" class="nav-link text-white">
            <svg width="24px" height="24px" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
              <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
              <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
              <g id="SVGRepo_iconCarrier">
                <path d="M7 20H4.6C4.03995 20 3.75992 20 3.54601 19.891C3.35785 19.7951 3.20487 19.6422 3.10899 19.454C3 19.2401 3 18.9601 3 18.4V9.0398C3 8.66343 3 8.47524 3.05919 8.31095C3.1115 8.16573 3.19673 8.03458 3.30819 7.9278C3.43428 7.80699 3.60625 7.73056 3.95018 7.5777L12 4L20.0498 7.5777C20.3938 7.73056 20.5657 7.80699 20.6918 7.9278C20.8033 8.03458 20.8885 8.16573 20.9408 8.31095C21 8.47524 21 8.66343 21 9.0398V18.4C21 18.9601 21 19.2401 20.891 19.454C20.7951 19.6422 20.6422 19.7951 20.454 19.891C20.2401 20 19.9601 20 19.4 20H17M7 20H17M7 20V14M17 20V14M7 14V10H17V14M7 14H17" stroke="#ffffff" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
              </g>
            </svg>
            Vehicle Transactions
          </a>
        </li>
        <li>
          <a href="report_generation.php" class="nav-link text-white">
            <svg width="24px" height="24px" viewBox="0 0 24 24" id="Layer_1" data-name="Layer 1" xmlns="http://www.w3.org/2000/svg" fill="#000000">
              <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
              <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
              <g id="SVGRepo_iconCarrier">
                <defs>
                  <style>
                    .cls-1 {
                      fill: none;
                      stroke: #ffffff;
                      stroke-miterlimit: 10;
                      stroke-width: 1.91px;
                    }
                  </style>
                </defs>
                <line class="cls-1" x1="15.82" y1="10.09" x2="15.82" y2="16.77"></line>
                <line class="cls-1" x1="12" y1="12" x2="12" y2="16.77"></line>
                <line class="cls-1" x1="8.18" y1="13.91" x2="8.18" y2="16.77"></line>
                <polyline class="cls-1" points="15.82 2.46 15.82 2.46 20.59 2.46 20.59 22.5 3.41 22.5 3.41 2.46 8.18 2.46 8.18 2.46"></polyline>
                <path class="cls-1" d="M15.82,1.5V3.41a1.92,1.92,0,0,1-1.91,1.91H10.09A1.92,1.92,0,0,1,8.18,3.41V1.5Z"></path>
              </g>
            </svg>
            Report Generation
          </a>
        </li>
      </ul>
      <button class="btn btn-primary float-end" type="button" onclick="logout_user()">
        Logout
      </button>
    </div>
    <div class="container w-75">
      <h1 class="display-3 text-center">Welcome <?php echo $name ?></h1>
    </div>
  </main>
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  <script src="admin.js"></script>
</body>

</html>