$("#login_form").submit(function (e) {
  e.preventDefault();
  const data = {
    username: $("#username").val(),
    password: $("#password").val(),
  };
  $.post("api/login.php", data)
    .then((response) => {
      console.log(response);
      if (response === "admin") {
        window.location.href = "admin/index.php";
      } else if (response === "traffic(main)") {
        window.location.href = "traffic - main/index.php";
      } else if (response === "traffic(branch)") {
        window.location.href = "traffic - branch/index.php";
      } else if (response === "encoder") {
        window.location.href = "encoder/index.php";
      } else {
        alert(response); // Show the error message
      }
    })
    .catch((error) => console.error(error));
});

function reset_password() {
  $.post(
    "api/forgot_password.php",
    $("#forgot_password_form").serialize(),
    function (data) {
      alert(data); // Show the message (e.g., "Reset link sent to your email")
    }
  );
}
