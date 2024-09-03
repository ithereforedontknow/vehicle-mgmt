$(document).ready(function () {
  $("#sidebarToggle").on("click", function () {
    $("#sidebar").toggleClass("hidden");
    $("#content").toggleClass("full-width");
  });
});
document.addEventListener("DOMContentLoaded", function () {
  const currentPath = window.location.pathname.split("/").pop(); // Get the current page name
  const navLinks = document.querySelectorAll(".nav-link");

  navLinks.forEach((link) => {
    const href = link.getAttribute("href");

    if (href === currentPath) {
      link.classList.add("active");
      link.setAttribute("aria-current", "page");
    } else {
      link.classList.remove("active");
      link.removeAttribute("aria-current");
    }
  });
});
document.addEventListener("DOMContentLoaded", function () {
  var dropdown = document.getElementById("vehicleTransactionsDropdown");
  dropdown.addEventListener("click", function () {
    dropdown.classList.toggle("collapse show");
  });
});

function logout_user() {
  $.post("./api/logout.php", function (data) {
    if (data === "Logout successful") {
      window.location.href = "../index.php";
    }
  });
}
