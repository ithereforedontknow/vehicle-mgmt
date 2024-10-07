// Handle form submission for add user

function logout_user() {
  $.post("./api/logout.php", function (data) {
    if (data === "Logout successful") {
      window.location.href = "../index.php";
    }
  });
}

$("#clear").click(function () {
  $("#to-reference").val("");
  $("#no-of-bales").val("");
  $("#kilos").val("");
});
