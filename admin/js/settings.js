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
function showOthersType() {
  if ($("#truck-type").val() == "Others") {
    $("#others-type-container").show();
  } else {
    $("#others-type-container").hide();
  }
}
$("#add-vehicle").submit((e) => {
  e.preventDefault();

  const plateNumber = $("#plate-no").val();
  const truckType = $("#truck-type").val();

  const data = {
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

$("#add-driver").submit((e) => {
  e.preventDefault();
  const data = {
    driverFname: $("#driver-fname").val(),
    driverMname: $("#driver-mname").val(),
    driverLname: $("#driver-lname").val(),
    driverPhone: $("#driver-phone").val(),
    helperFname: $("#helper-fname").val(),
    helperMname: $("#helper-mname").val(),
    helperLname: $("#helper-lname").val(),
    helperPhone: $("#helper-phone").val(),
  };
  $.post("./api/add/add-driver.php", data)
    .then(() => {
      $("#add-driver-modal").modal("hide");
      window.location.reload();
      // alert("Driver added successfully");
    })
    .catch(() => alert("Error adding driver. Please try again."));
});

$("#add-project").submit((e) => {
  e.preventDefault();
  const project = $("#project").val();
  $.ajax({
    url: "./api/add/add-project.php",
    type: "POST",
    data: {
      project: project,
    },
    success: function (data) {
      $("#add-project-modal").modal("hide");
      window.location.reload();
      alert(data);
    },
    failure: function (data) {
      alert(data);
    },
  });
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
  $("#project-table").DataTable({
    pageLength: 5,
  });
});
