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
    confirmButtonColor: "#1c3464",
    cancelButtonColor: "#6c757d",
    cancelButtonText: "No",
    confirmButtonText: "Yes",
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
        .done((response) => {
          Swal.fire({
            title: "Added!",
            icon: "success",
            showConfirmButton: false,
            timer: 1000,
            didClose: () => {
              $("#addUserOffcanvas").offcanvas("hide");
              window.location.reload();
            },
          });
        })
        .fail((error) => alert(error));
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
  Swal.fire({
    title: "Are you sure?",
    icon: "warning",
    showCancelButton: true,
    confirmButtonColor: "#1c3464",
    cancelButtonColor: "#6c757d",
    cancelButtonText: "No",
    confirmButtonText: "Yes",
  }).then((result) => {
    if (result.isConfirmed) {
      const data = {
        id: $("#edit-user-id").val(),
        username: $("#edit-username").val(),
        fname: $("#edit-fname").val(),
        mname: $("#edit-mname").val(),
        lname: $("#edit-lname").val(),
        password: $("#edit-password").val(),
        userlevel: $("#edit-userlevel").val(),
        status: $("#edit-status").val(),
      };
      $.post("./api/update/update_user.php", data)
        .done((response) => {
          Swal.fire({
            title: "Updated!",
            icon: "success",
            showConfirmButton: false,
            timer: 1000,
            didClose: () => {
              $("#editUserOffcanvas").offcanvas("hide");
              window.location.reload();
            },
          });
        })
        .fail((jqXHR, textStatus, errorThrown) => {
          alert(`Failed to update user: ${textStatus}, ${errorThrown}`);
        });
    }
  });
});
