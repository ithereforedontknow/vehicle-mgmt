$("#add-hauler").submit((e) => {
  e.preventDefault();
  const haulerName = $("#hauler_name").val();
  const haulerAddress = $("#hauler_address").val();
  const haulerTypeTruck = $("#hauler_type_truck").val();
  $.ajax({
    url: "./api/add/add-hauler.php",
    type: "POST",
    data: {
      haulerName: haulerName,
      haulerAddress: haulerAddress,
      haulerTypeTruck: haulerTypeTruck,
    },
    success: function (data) {
      $("#add-hauler-modal").modal("hide");
      window.location.reload();
      alert(data);
    },
    failure: function (data) {
      alert(data);
    },
  });
});

$("#add-vehicle").submit((e) => {
  e.preventDefault();
  const plateNumber = $("#plate-no").val();
  const truckType = $("#truck-type").val();
  $.ajax({
    url: "./api/add/add-vehicle.php",
    type: "POST",
    data: {
      plateNumber: plateNumber,
      truckType: truckType,
    },
    success: function (data) {
      $("#add-vehicle-modal").modal("hide");
      window.location.reload();
      alert(data);
    },
    failure: function (data) {
      alert(data);
    },
  });
});

$("#add-driver").submit((e) => {
  e.preventDefault();
  const driverName = $("#driver-name").val();
  // driver phone number
  // const driverPhone = $("#driver-phone").val();
  $.ajax({
    url: "./api/add/add-driver.php",
    type: "POST",
    data: {
      driverName: driverName,
    },
    success: function (data) {
      $("#add-driver-modal").modal("hide");
      window.location.reload();
      alert(data);
    },
    failure: function (data) {
      alert(data);
    },
  });
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
