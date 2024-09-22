$("#add-hauler").submit((e) => {
  e.preventDefault();
  const data = {
    haulerName: $("#hauler_name").val(),
    haulerAddress: $("#hauler_address").val(),
  };

  $.post("./api/add/add-hauler.php", data)
    .then(() => {
      $("#add-hauler-modal").modal("hide");
      window.location.reload();
    })
    .catch((error) => alert(error));
});

function editHauler(hauler_id) {
  $.post("./api/fetch/get_hauler.php", { hauler_id: hauler_id })
    .then((response) => {
      const hauler = JSON.parse(response);
      $("#edit-hauler-id").val(hauler.hauler_id);
      $("#edit-hauler-name").val(hauler.hauler_name);
      $("#edit-hauler-address").val(hauler.hauler_address);
      $("#edit-hauler-modal").modal("show");
    })
    .catch((error) => {
      alert(error);
    });
}
$("#edit-hauler").submit((e) => {
  e.preventDefault();
  const data = {
    hauler_id: $("#edit-hauler-id").val(),
    hauler_name: $("#edit-hauler-name").val(),
    hauler_address: $("#edit-hauler-address").val(),
  };
  $.post("./api/update/update_hauler.php", data)
    .then((response) => {
      $("#edit-hauler-modal").modal("hide");
      window.location.reload();
    })
    .catch((error) => {
      alert(error);
    });
});
function showOthersType() {
  const othersTypeContainer = $("#others-type-container");
  const othersTypeInput = $("#others-type");

  if ($("#truck-type").val() === "Others") {
    othersTypeContainer.show();
    othersTypeInput.attr("required", true); // Add required attribute
  } else {
    othersTypeContainer.hide();
    othersTypeInput.removeAttr("required"); // Remove required attribute
  }
}

$("#add-vehicle").submit((e) => {
  e.preventDefault();
  const hauler = $("#hauler").val();
  const plateNumber = $("#plate-no").val();
  const truckType = $("#truck-type").val();

  const data = {
    hauler,
    plateNumber,
    truckType: truckType === "Others" ? $("#others-type").val() : truckType,
  };

  $.post("./api/add/add-vehicle.php", data)
    .then(() => {
      $("#add-vehicle-modal").modal("hide");
      window.location.reload();
    })
    .catch((error) => alert(error));
});
function showOthersType() {
  const othersTypeContainer = $("#edit-others-type-container");
  const othersTypeInput = $("#edit-others-type");

  if ($("#edit-truck-type").val() === "Others") {
    othersTypeContainer.show();
    othersTypeInput.attr("required", true); // Add required attribute
  } else {
    othersTypeContainer.hide();
    othersTypeInput.removeAttr("required"); // Remove required attribute
  }
}
function editVehicle(vehicle_id) {
  $.post("./api/fetch/get_vehicle.php", { vehicle_id: vehicle_id })
    .then((response) => {
      const vehicle = JSON.parse(response);

      // Set the form values
      $("#edit-vehicle-id").val(vehicle.vehicle_id);
      $("#edit-hauler").val(vehicle.hauler_id); // Use hauler_id instead of hauler_name
      $("#edit-plate-no").val(vehicle.plate_number);
      $("#edit-truck-type").val(vehicle.truck_type);

      // Handle "Others" truck type
      if (
        vehicle.truck_type === "Trailer" ||
        vehicle.truck_type === "Ten Wheeler" ||
        vehicle.truck_type === "Forward" ||
        vehicle.truck_type === "Elf"
      ) {
        $("#edit-others-type-container").hide();
        $("#edit-others-type").val(""); // Clear the field in case it's hidden
      } else {
        $("#edit-others-type-container").show();
        $("#edit-truck-type").val("Others");
        $("#edit-others-type").val(vehicle.truck_type); // Populate others type
      }

      // Show the modal
      $("#edit-vehicle-modal").modal("show");
    })
    .catch((error) => {
      alert(error);
    });
}
$("#edit-vehicle").submit((e) => {
  e.preventDefault();

  const data = {
    vehicle_id: $("#edit-vehicle-id").val(),
    hauler_id: $("#edit-hauler").val(),
    plate_number: $("#edit-plate-no").val(),
    truck_type:
      $("#edit-truck-type").val() === "Others"
        ? $("#edit-others-type").val()
        : $("#edit-truck-type").val(),
  };

  $.post("./api/update/update_vehicle.php", data)
    .then(() => {
      $("#edit-vehicle-modal").modal("hide");
      window.location.reload();
    })
    .catch((error) => alert(error));
});

$("#add-driver").submit((e) => {
  e.preventDefault();
  const data = {
    driverFname: $("#driver-fname").val(),
    driverMname: $("#driver-mname").val(),
    driverLname: $("#driver-lname").val(),
    driverPhone: $("#driver-phone").val(),
  };
  $.post("./api/add/add-driver.php", data)
    .then(() => {
      $("#add-driver-modal").modal("hide");
      window.location.reload();
      // alert("Driver added successfully");
    })
    .catch(() => alert("Error adding driver. Please try again."));
});
function editDriver(driver_id) {
  $.post("./api/fetch/get_driver.php", { driver_id: driver_id })
    .then((response) => {
      const driver = JSON.parse(response);
      $("#edit-driver-id").val(driver.driver_id);
      $("#edit-driver-fname").val(driver.driver_fname);
      $("#edit-driver-mname").val(driver.driver_mname);
      $("#edit-driver-lname").val(driver.driver_lname);
      $("#edit-driver-phone").val(driver.driver_phone);
      $("#edit-driver-modal").modal("show");
    })
    .catch((error) => {
      alert(error);
    });
}
$("#edit-driver").submit((e) => {
  e.preventDefault();
  const data = {
    driver_id: $("#edit-driver-id").val(),
    driver_fname: $("#edit-driver-fname").val(),
    driver_mname: $("#edit-driver-mname").val(),
    driver_lname: $("#edit-driver-lname").val(),
    driver_phone: $("#edit-driver-phone").val(),
  };
  $.post("./api/update/update_driver.php", data)
    .then(() => {
      $("#edit-driver-modal").modal("hide");
      window.location.reload();
      // alert("Driver updated successfully");
    })
    .catch(() => alert("Error updating driver. Please try again."));
});
$("#add-helper").submit((e) => {
  e.preventDefault();
  const data = {
    helperFname: $("#helper-fname").val(),
    helperMname: $("#helper-mname").val(),
    helperLname: $("#helper-lname").val(),
    helperPhone: $("#helper-phone").val(),
  };
  $.post("./api/add/add-helper.php", data)
    .then(() => {
      $("#add-driver-modal").modal("hide");
      // alert("Driver added successfully");
      window.location.reload();
    })
    .catch(() => alert("Error adding driver. Please try again."));
});
function editHelper(helper_id) {
  $.post("./api/fetch/get_helper.php", { helper_id: helper_id })
    .then((response) => {
      const helper = JSON.parse(response);
      $("#edit-helper-id").val(helper.helper_id);
      $("#edit-helper-fname").val(helper.helper_fname);
      $("#edit-helper-mname").val(helper.helper_mname);
      $("#edit-helper-lname").val(helper.helper_lname);
      $("#edit-helper-phone").val(helper.helper_phone);
      $("#edit-helper-modal").modal("show");
    })
    .catch((error) => {
      alert(error);
    });
}
$("#edit-helper").submit((e) => {
  e.preventDefault();
  const data = {
    helper_id: $("#edit-helper-id").val(),
    helper_fname: $("#edit-helper-fname").val(),
    helper_mname: $("#edit-helper-mname").val(),
    helper_lname: $("#edit-helper-lname").val(),
    helper_phone: $("#edit-helper-phone").val(),
  };
  $.post("./api/update/update_helper.php", data)
    .then(() => {
      $("#edit-helper-modal").modal("hide");
      window.location.reload();
      // alert("Driver updated successfully");
    })
    .catch(() => alert("Error updating driver. Please try again."));
});
$("#edit-demurrage").submit((e) => {
  e.preventDefault();
  const demurrage = $("#demurrage_name").val(); // Capture demurrage value

  $.ajax({
    url: "./api/update/update_demurrage.php",
    type: "POST",
    data: { demurrage: demurrage },
    success: function (data) {
      console.log("Response:", data); // Log the response for debugging
      $("#settingsDemurrageModal").modal("hide");
      alert(data);
      window.location.reload();
    },
    error: function (xhr, status, error) {
      console.error("AJAX error:", status, error); // Log AJAX errors
      alert("Error updating demurrage: " + error);
    },
  });
});
$("#add-project").submit((e) => {
  e.preventDefault();
  const data = {
    project: $("#project").val(),
    description: $("#description").val(),
  };
  $.post("./api/add/add-project.php", data)
    .then(() => {
      $("#add-project-modal").modal("hide");
      // alert("Project added successfully");
      window.location.reload();
    })
    .catch(() => alert("Error adding project. Please try again."));
});
function editProject(project_id) {
  $.post("./api/fetch/get_project.php", { project_id: project_id })
    .then((response) => {
      const project = JSON.parse(response);
      $("#edit-project-id").val(project.project_id);
      $("#edit-project-name").val(project.project_name);
      $("#edit-description").val(project.project_description);
      $("#edit-project-modal").modal("show");
    })
    .catch((error) => {
      alert(error);
    });
}
$("#edit-project").submit((e) => {
  e.preventDefault();
  const data = {
    project_id: $("#edit-project-id").val(),
    project_name: $("#edit-project-name").val(),
    project_description: $("#edit-description").val(),
  };
  $.post("./api/update/update_project.php", data)
    .then(() => {
      $("#edit-project-modal").modal("hide");
      window.location.reload();
      // alert("Project updated successfully");
    })
    .catch(() => alert("Error updating project. Please try again."));
});
$("#add-origin").submit((e) => {
  e.preventDefault();
  const data = {
    origin: $("#origin").val(),
  };
  $.post("./api/add/add-origin.php", data)
    .then((res) => {
      $("#add-origin-modal").modal("hide");
      window.location.reload();
      // alert(res);
    })
    .catch(() => alert("Error adding project. Please try again."));
});
function editOrigin(origin_id) {
  $.post("./api/fetch/get_origin.php", { origin_id: origin_id })
    .then((response) => {
      const origin = JSON.parse(response);
      $("#edit-origin-id").val(origin.origin_id);
      $("#edit-origin-name").val(origin.origin_name);
      $("#edit-origin-modal").modal("show");
    })
    .catch((error) => {
      alert(error);
    });
}
$("#edit-origin").submit((e) => {
  e.preventDefault();
  const data = {
    origin_id: $("#edit-origin-id").val(),
    origin_name: $("#edit-origin-name").val(),
  };
  $.post("./api/update/update_origin.php", data)
    .then(() => {
      $("#edit-origin-modal").modal("hide");
      window.location.reload();
      // alert("Project updated successfully");
    })
    .catch(() => alert("Error updating project. Please try again."));
});
$(document).ready(function () {
  $("#hauler-table").DataTable({
    pageLength: 5,
  });
  $("#vehicle-table").DataTable({
    pageLength: 5,
  });
  $("#driver-table").DataTable({
    pageLength: 5,
  });
  $("#helper-table").DataTable({
    pageLength: 5,
  });
  $("#project-table").DataTable({
    pageLength: 5,
  });
});
