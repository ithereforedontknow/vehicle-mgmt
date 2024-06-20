function add_user() {
  $.post("./api/add-user.php", $("#add-user").serialize(), function (data) {
    if (data === "Registration successful") {
      alert(data);
      $("#add-user-modal").modal("hide");
      window.location.reload();
    } else {
      alert(data);
    }
  });
}
function logout_user() {
  $.post("./api/logout.php", function (data) {
    if (data === "Logout successful") {
      window.location.href = "../index.php";
    }
  });
}
function activate_user(userId) {
  if (confirm("Are you sure you want to activate this account?")) {
    $.post("./api/activate_user.php", { id: userId }, function (data) {
      alert(data); // Display the response message
      location.reload(); // Reload the page to reflect the changes
    }).fail(function (jqXHR, textStatus, errorThrown) {
      console.error("Error: " + textStatus, errorThrown); // Log any errors
      alert("An error occurred: " + textStatus + " - " + errorThrown);
    });
  }
}

function deactivate_user(userId) {
  if (confirm("Are you sure you want to deactivate this account?")) {
    $.post("./api/deactivate_user.php", { id: userId }, function (data) {
      alert(data); // Display the response message
      location.reload(); // Reload the page to reflect the changes
    }).fail(function (jqXHR, textStatus, errorThrown) {
      console.error("Error: " + textStatus, errorThrown); // Log any errors
      alert("An error occurred: " + textStatus + " - " + errorThrown);
    });
  }
}
function edit_user(id) {
  console.log("Editing user with ID:", id);
  // Fetch user details via AJAX
  $.ajax({
    url: "./api/get_user.php",
    type: "GET",
    data: { id: id },
    dataType: "json",
    success: function (response) {
      // Populate modal with user data
      $("#edit-user-id").val(response.id);
      $("#edit-fname").val(response.fname);
      $("#edit-lname").val(response.lname);
      $("#edit-userlevel").val(response.userlevel);
      // Show the modal
      $("#edit-user-modal").modal("show");
    },
    error: function (xhr, status, error) {
      console.error("Error fetching user data:", error);
      alert("Failed to fetch user data. Please try again.");
    },
  });
}

// Handle form submission for edit user
$("#edit-user-form").submit(function (event) {
  event.preventDefault();

  // Serialize form data
  var formData = $(this).serialize();

  // Submit data via AJAX
  $.ajax({
    url: "./api/update_user.php",
    type: "POST",
    data: formData,
    success: function (response) {
      // Close modal and refresh page or update table
      $("#edit-user-modal").modal("hide");
      // Example: Refresh the page after successful update
      location.reload(); // You may replace this with a more specific update method
    },
    error: function (xhr, status, error) {
      console.error("Error updating user:", error);
      alert("Failed to update user. Please try again.");
    },
  });
});
