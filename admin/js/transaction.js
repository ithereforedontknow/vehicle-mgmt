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
  $.ajax({
    url: "./api/update/update_status.php",
    type: "POST",
    data: {
      transaction_id: transactionId,
      status: "arrived",
    },
    success: function (response) {
      window.location.reload();
      console.log("Status updated successfully!");
    },
    error: function (xhr, status, error) {
      console.log(xhr.responseText); // Log the error response for debugging
      alert("Failed to update status. Please try again.");
    },
  });
}
function editTransaction(transactionId) {
  $("#edit-transaction-modal").modal("show");
  $("#edit-transaction-id").val(transactionId);
  console.log("Transaction ID:", transactionId);
}

$("#edit-transaction").submit(function (event) {
  event.preventDefault();

  // Gather form data
  const data = {
    transaction_id: $("#edit-transaction-id").val(),
    arrival_date: $("#edit-arrival-date").val(),
    arrival_time: $("#edit-arrival-time").val(),
    unloading_date: $("#edit-unloading-date").val(),
    time_of_entry: $("#edit-time-of-entry").val(),
    unloading_time_start: $("#edit-unloading-time-start").val(),
    unloading_time_end: $("#edit-unloading-time-end").val(),
    time_of_departure: $("#edit-time-of-departure").val(),
  };

  // Send data via POST request
  $.post("../api/update/update_transaction.php", data, function (response) {
    console.log("Response:", response);
    if (response === "Transaction updated successfully") {
      alert(response);
      // Optionally, close the modal or refresh the page
      $("#edit-transaction-modal").modal("hide");
      location.reload(); // Reload the page to see changes (optional)
    } else {
      alert("Failed to update transaction: " + response);
    }
  });
});
function addQueue(transactionId) {
  $("#queue-transaction-modal").modal("show");
  $("#queue-transaction-id").val(transactionId);
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
  $.post("./api/add/add-queue.php", data).then(function (response) {
    alert(
      response === "Transaction updated successfully"
        ? response
        : "Failed to update transaction: " + response
    );
    $("#queue-transaction-modal").modal("hide");
    location.reload(); // Reload the page to see changes (optional)
  });
});
