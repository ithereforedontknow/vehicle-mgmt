function addToQueue(transactionId) {
  console.log("Adding to queue, transaction ID:", transactionId);
  $("#queue-transaction-id").val(transactionId);
  const offcanvas = new bootstrap.Offcanvas("#addTransactionOffcanvas");
  offcanvas.show();
}
$("#queue-transaction").submit(function (event) {
  event.preventDefault();
  const data = {
    transaction_id: $("#queue-transaction-id").val(),
    transfer_in_line: $("#queue-transfer-in-line").val(),
    ordinal: $("#queue-ordinal").val(),
    shift: $("#queue-shift").val(),
    schedule: $("#queue-schedule").val(),
    priority: $("#queue-priority").val(),
    status: "queue",
  };
  $.post("./api/add/add-queue.php", data)
    .then(function (response) {
      $("#addTransactionOffcanvas").offcanvas("hide");
      window.location.reload();
      console.log(response);
    })
    .catch(function (jqXHR, textStatus, errorThrown) {
      alert("AJAX call failed: " + textStatus + ", " + errorThrown);
    });
});
function viewQueue(transaction_id) {
  $.post(
    "./api/fetch/get_queue.php",
    { transaction_id: transaction_id },
    function (response) {
      // Check if response is already a JavaScript object

      $("#view-transaction-id").val(response.transaction_id);
      $("#view-to-reference").val(response.to_reference);
      $("#view-no-of-bales").val(response.no_of_bales);
      $("#view-kilos").val(response.kilos);
      $("#view-origin").val(
        response.origin ? response.origin.toUpperCase() : ""
      );
      $("#view-transfer-in-line").val(response.transfer_in_line);
      $("#view-ordinal").val(
        response.ordinal ? response.ordinal.toUpperCase() : ""
      );
      $("#view-shift").val(response.shift ? response.shift.toUpperCase() : "");
      $("#view-schedule").val(
        response.schedule ? response.schedule.toUpperCase() : ""
      );
      $("#viewQueueOffcanvas").offcanvas("show");
      console.log(transaction_id);
    }
  ).fail(function (jqXHR, textStatus, errorThrown) {
    console.error("AJAX request failed:", textStatus, errorThrown);
    alert("An error occurred while fetching data.");
  });
}
$("#add-unloading-form").submit(function (event) {
  event.preventDefault();
  const data = {
    transaction_id: $("#view-transaction-id").val(),
    status: "ongoing",
  };
  $.post("./api/add/add-unloading.php", data)
    .then(function (response) {
      $("#viewQueueOffcanvas").offcanvas("hide");
      console.log(response);
      location.reload(); // Reload the page to see changes (optional)
    })
    .catch(function (jqXHR, textStatus, errorThrown) {
      alert("AJAX call failed: " + textStatus + ", " + errorThrown);
    });
});
