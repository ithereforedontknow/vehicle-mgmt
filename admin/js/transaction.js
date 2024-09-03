$("#add-transaction").submit(function (event) {
  event.preventDefault();
  const data = {
    toReference: $("#to-reference").val(),
    hauler_id: $("#hauler").val(),
    vehicle_id: $("#plate-number").val(),
    driver_id: $("#driver-name").val(),
    project_id: $("#project").val(),
    transferInLine: $("#transfer-in-line").val(),
    ordinal: $("#ordinal").val(),
    shift: $("#shift").val(),
    schedule: $("#schedule").val(),
    noOfBales: $("#no-of-bales").val(),
    kilos: $("#kilos").val(),
    origin: $("#origin").val(),
    arrivalDate: $("#arrival-date").val(),
    arrivalTime: $("#arrival-time").val(),
    backlog: $("#backlog").val(),
    unloadingDate: $("#unloading-date").val(),
    timeOfEntry: $("#time-of-entry").val(),
    unloadingTimeStart: $("#unloading-time-start").val(),
    unloadingTimeEnd: $("#unloading-time-end").val(),
    timeOfDeparture: $("#time-of-departure").val(),
  };

  $.post("./api/add/add-transaction.php", data, function (response) {
    if (response === "Transaction added successfully") {
      alert(response);
    } else {
      alert(response);
    }
  });
});

function vehicleArrived(transactionId) {
  const data = {
    transaction_id: transactionId,
    status: "arrived",
  };
  $.post("./api/update/update_status.php", data)
    .then(function (response) {
      alert(response);
      location.reload();
    })
    .catch(function (jqXHR, textStatus, errorThrown) {
      alert("AJAX call failed: " + textStatus + ", " + errorThrown);
    });
}

function addQueue(transactionId) {
  console.log("Adding to queue, transaction ID:", transactionId);
  $("#queue-transaction-id").val(transactionId);
  $("#queue-transaction-modal").modal("show");
}
$("#queue-transaction").submit(function (event) {
  event.preventDefault();
  const data = {
    transaction_id: $("#queue-transaction-id").val(),
    transfer_in_line: $("#queue-transfer-in-line").val(),
    ordinal: $("#queue-ordinal").val(),
    shift: $("#queue-shift").val(),
    schedule: $("#queue-schedule").val(),
    status: "queue",
  };
  $.post("./api/add/add-queue.php", data)
    .then(function (response) {
      alert(response); // Display the actual response message from PHP
      $("#queue-transaction-modal").modal("hide");
      location.reload(); // Reload the page to see changes (optional)
    })
    .catch(function (jqXHR, textStatus, errorThrown) {
      alert("AJAX call failed: " + textStatus + ", " + errorThrown);
    });
});
