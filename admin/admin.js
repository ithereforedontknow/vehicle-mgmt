// Handle form submission for add user

$("#add-user").submit(function (event) {
  event.preventDefault();
  const fname = $("#fname").val();
  const mname = $("#mname").val();
  const lname = $("#lname").val();
  const password = $("#password").val();
  const userlevel = $("#userlevel").val();

  $.ajax({
    url: "./api/add-user.php",
    type: "POST",
    data: {
      fname: fname,
      mname: mname,
      lname: lname,
      password: password,
      userlevel: userlevel,
    },
    success: function (data) {
      if (data == "Registration successful") {
        $("#add-user-modal").modal("hide");
        window.location.reload();
      } else {
        alert(data);
      }
    },
  });
});

function logout_user() {
  $.post("./api/logout.php", function (data) {
    if (data === "Logout successful") {
      window.location.href = "../index.php";
    }
  });
}
function activate_user(userId) {
  $.post("./api/activate_user.php", { id: userId }, function (data) {
    console.log(data); // Display the response message
    location.reload(); // Reload the page to reflect the changes
  }).fail(function (jqXHR, textStatus, errorThrown) {
    console.error("Error: " + textStatus, errorThrown); // Log any errors
    alert("An error occurred: " + textStatus + " - " + errorThrown);
  });
}

function deactivate_user(userId) {
  $.post("./api/deactivate_user.php", { id: userId }, function (data) {
    console.log(data); // Display the response message
    location.reload(); // Reload the page to reflect the changes
  }).fail(function (jqXHR, textStatus, errorThrown) {
    console.error("Error: " + textStatus, errorThrown); // Log any errors
    alert("An error occurred: " + textStatus + " - " + errorThrown);
  });
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
      $("#edit-mname").val(response.mname);
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
$("#edit-user").submit(function (event) {
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

$("#add-vehicle").submit(function (event) {
  event.preventDefault();
  const to_ref_no = $("#to_ref_no").val();
  const hauler = $("#hauler").val();
  const plate_no = $("#plate_no").val();
  const driver_name = $("#driver_name").val();
  const truck_type = $("#truck_type").val();
  const project = $("#project").val();

  $.ajax({
    url: "./api/add-vehicle.php",
    type: "POST",
    data: {
      to_ref_no: to_ref_no,
      hauler: hauler,
      plate_no: plate_no,
      driver_name: driver_name,
      truck_type: truck_type,
      project: project,
    },
    success: function (data) {
      if (data == "success") {
        $("#add-user-modal").modal("hide");
        window.location.reload();
      } else {
        alert(data);
      }
    },
  });
});
function activate_vehicle(to_ref_no) {
  $.post(
    "./api/activate_vehicle.php",
    { to_ref_no: to_ref_no },
    function (data) {
      console.log(data); // Display the response message
      location.reload(); // Reload the page to reflect the changes
    }
  ).fail(function (jqXHR, textStatus, errorThrown) {
    console.error("Error: " + textStatus, errorThrown); // Log any errors
    alert("An error occurred: " + textStatus + " - " + errorThrown);
  });
}

function deactivate_vehicle(to_ref_no) {
  $.post(
    "./api/deactivate_vehicle.php",
    { to_ref_no: to_ref_no },
    function (data) {
      console.log(data); // Display the response message
      location.reload(); // Reload the page to reflect the changes
    }
  ).fail(function (jqXHR, textStatus, errorThrown) {
    console.error("Error: " + textStatus, errorThrown); // Log any errors
    alert("An error occurred: " + textStatus + " - " + errorThrown);
  });
}

function edit_vehicle(to_ref_no) {
  console.log("Editing vehicle with ID:", to_ref_no);
  // Fetch vehicle details via AJAX
  $.ajax({
    url: "./api/get_vehicle.php",
    type: "GET",
    data: { to_ref_no: to_ref_no },
    dataType: "json",
    success: function (response) {
      // Populate modal with vehicle data
      $("#edit-to-ref-no").val(response.to_ref_no);
      $("#edit-hauler").val(response.hauler);
      $("#edit-plate-no").val(response.plate_no);
      $("#edit-driver-name").val(response.driver_name);
      $("#edit-truck-type").val(response.truck_type);
      $("#edit-project").val(response.project);
      // Show the modal
      $("#edit-vehicle-modal").modal("show");
    },
    error: function (xhr, status, error) {
      console.error("Error fetching vehicle data:", error);
      alert("Failed to fetch vehicle data. Please try again.");
    },
  });
}
$("#edit-vehicle").submit(function (event) {
  event.preventDefault();

  // Serialize form data
  var formData = $(this).serialize();

  // Submit data via AJAX
  $.ajax({
    url: "./api/update_vehicle.php",
    type: "POST",
    data: formData,
    success: function (response) {
      // Close modal and refresh page or update table
      console.log(response);
      $("#edit-vehicle-modal").modal("hide");
      // Example: Refresh the page after successful update
      location.reload(); // You may replace this with a more specific update method
    },
    error: function (xhr, status, error) {
      console.error("Error updating user:", error);
      alert("Failed to update user. Please try again.");
    },
  });
});
