$("#add-transaction").submit(function (event) {
  event.preventDefault();
  const toReference = $("#to-reference").val();
  const hauler_id = $("#hauler").val();
  const vehicle_id = $("#plate-number").val();
  const driver_id = $("#driver-name").val();
  const project_id = $("#project").val();
  const transferInLine = $("#transfer-in-line").val();
  const ordinal = $("#ordinal").val();
  const shift = $("#shift").val();
  const schedule = $("#schedule").val();
  const noOfBales = $("#no-of-bales").val();
  const kilos = $("#kilos").val();
  const origin = $("#origin").val();
  const arrivalDate = $("#arrival-date").val();
  const arrivalTime = $("#arrival-time").val();
  const backlog = $("#backlog").val();
  const unloadingDate = $("#unloading-date").val();
  const timeOfEntry = $("#time-of-entry").val();
  const unloadingTimeStart = $("#unloading-time-start").val();
  const unloadingTimeEnd = $("#unloading-time-end").val();
  const timeOfDeparture = $("#time-of-departure").val();

  $.ajax({
    url: "./api/add/add-transaction.php",
    type: "POST",
    data: {
      toReference: toReference,
      hauler_id: hauler_id,
      vehicle_id: vehicle_id,
      driver_id: driver_id,
      project_id: project_id,
      transferInLine: transferInLine,
      ordinal: ordinal,
      shift: shift,
      schedule: schedule,
      noOfBales: noOfBales,
      kilos: kilos,
      origin: origin,
      arrivalDate: arrivalDate,
      arrivalTime: arrivalTime,
      backlog: backlog,
      unloadingDate: unloadingDate,
      timeOfEntry: timeOfEntry,
      unloadingTimeStart: unloadingTimeStart,
      unloadingTimeEnd: unloadingTimeEnd,
      timeOfDeparture: timeOfDeparture,
    },
    success: function (data) {
      if (data === "Transaction added successfully") {
        alert(data);
      } else {
        alert(data);
      }
    },
  });
});

function done_transaction(transaction_id) {
  $.ajax({
    url: "./api/update/update_transaction.php",
    type: "POST",
    data: {
      transaction_id: transaction_id,
      status: "done",
    },
    success: function (data) {
      window.location.reload();
      alert(data);
    },
  });
}

function ongoing_transaction(transaction_id) {
  $.ajax({
    url: "./api/update/update_transaction.php",
    type: "POST",
    data: {
      transaction_id: transaction_id,
      status: "ongoing",
    },
    success: function (data) {
      window.location.reload();
      alert(data);
    },
  });
}
