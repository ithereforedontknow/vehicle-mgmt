$(document).ready(function () {
  // Initialize DataTable
  $("#users-table").DataTable({
    searching: false,
    dom: "trip",
  });
});

$("#add-user-form").submit((event) => {
  event.preventDefault();
  Swal.fire({
    title: "Are you sure?",
    icon: "warning",
    showCancelButton: true,
    confirmButtonColor: "#3085d6",
    cancelButtonColor: "#d33",
    confirmButtonText: "Yes, add it!",
  }).then((result) => {
    if (result.isConfirmed) {
      const data = {
        username: $("#add-username").val(),
        fname: $("#add-fname").val(),
        mname: $("#add-mname").val(),
        lname: $("#add-lname").val(),
        password: $("#add-password").val(),
        userlevel: $("#add-userlevel").val(),
        status: $("#add-status").val(),
      };
      $.post("./api/add/add-user.php", data)
        .then((response) => {
          Swal.fire("Added!", "User has been added.", "success");
          $("#addUserOffcanvas").offcanvas("hide");
          window.location.reload();
        })
        .catch((error) => alert(error));
    }
  });
});
function editUser(userId) {
  $.post("./api/fetch/get_user.php", { user_id: userId })
    .then((response) => {
      const user = JSON.parse(response);

      // Populate the form fields with the fetched user data
      $("#edit-user-id").val(user.id);
      $("#edit-username").val(user.username);
      $("#edit-password").val(user.password);
      $("#edit-fname").val(user.fname);
      $("#edit-mname").val(user.mname);
      $("#edit-lname").val(user.lname);
      $("#edit-userlevel").val(user.userlevel);
      $("#edit-status").val(user.status);

      // Show the offcanvas
      const offcanvas = new bootstrap.Offcanvas(
        document.getElementById("editUserOffcanvas")
      );
      offcanvas.show();
    })
    .catch((jqXHR, textStatus, errorThrown) => {
      alert(`Failed to fetch user data: ${textStatus}, ${errorThrown}`);
    });
}

$("#edit-user-form").on("submit", function (event) {
  event.preventDefault();

  // Serialize the form data
  const formData = {
    id: $("#edit-user-id").val(),
    username: $("#edit-username").val(),
    fname: $("#edit-fname").val(),
    mname: $("#edit-mname").val(),
    lname: $("#edit-lname").val(),
    password: $("#edit-password").val(),
    userlevel: $("#edit-userlevel").val(),
    status: $("#edit-status").val(),
  };

  // Send the updated user data to the server
  $.post("./api/update/update_user.php", formData)
    .then((response) => {
      $("addUserOffcanvas").offcanvas("hide");
      console.log(response);
      location.reload(); // Reload the page to see the updated user list
    })
    .catch((jqXHR, textStatus, errorThrown) => {
      alert(`Failed to update user: ${textStatus}, ${errorThrown}`);
    });
});
