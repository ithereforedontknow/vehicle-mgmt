$("#add-hauler").submit((e) => {
  e.preventDefault();
  const hauler = $("#hauler").val();
  $.ajax({
    url: "./api/add/add-hauler.php",
    type: "POST",
    data: {
      hauler: hauler,
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
