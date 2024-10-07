function addToQueue(transactionId) {
  $("#queue-transaction-id").val(transactionId);
  const offcanvas = new bootstrap.Offcanvas("#addTransactionOffcanvas");
  offcanvas.show();
}
$("#queue-transaction").submit(function (event) {
  event.preventDefault();
  Swal.fire({
    title: "Are you sure?",
    icon: "warning",
    showCancelButton: true,
    confirmButtonColor: "#1c3464",
    cancelButtonColor: "#6c757d",
    cancelButtonText: "No",
    confirmButtonText: "Yes",
  }).then((result) => {
    if (result.isConfirmed) {
      const data = {
        transaction_id: $("#queue-transaction-id").val(),
        transfer_in_line: $("#queue-transfer-in-line").val(),
        ordinal: $("#queue-ordinal").val(),
        shift: $("#queue-shift").val(),
        schedule: $("#queue-schedule").val(),
        queue_number: $("#queue-number").val(),
        priority: $("#queue-priority").val(),
        status: "queue",
      };
      $.post("./api/add/add-queue.php", data)
        .done(function (response) {
          if (response == "Queue number is already in use") {
            Swal.fire({
              icon: "error",
              title: "Queue number is already in use",
              showConfirmButton: false,
              timer: 1000,
            });
          } else {
            Swal.fire({
              icon: "success",
              title: "Added to queue successfully",
              showConfirmButton: false,
              timer: 1000,
              didClose: () => {
                $("#addTransactionOffcanvas").offcanvas("hide");
                window.location.reload();
              },
            });
          }
        })
        .fail(function (jqXHR, textStatus, errorThrown) {
          alert("AJAX call failed: " + textStatus + ", " + errorThrown);
        });
    }
  });
});
function viewQueue(transaction_id) {
  $.post(
    "./api/fetch/get_queue.php",
    { transaction_id: transaction_id },
    function (response) {
      console.log(response);
      // Check if response is already a JavaScript object
      $("#view-transaction-id").val(response.transaction_id);
      $("#view-to-reference").val(response.to_reference);
      $("#view-no-of-bales").val(response.no_of_bales);
      $("#view-kilos").val(response.kilos);
      $("#view-origin").val(
        response.origin_name ? response.origin_name.toUpperCase() : ""
      );
      $("#view-transfer-in-line").val(response.transfer_in_line);
      $("#view-project").val(response.project_name);
      $("#view-ordinal").val(
        response.ordinal ? response.ordinal.toUpperCase() : ""
      );
      $("#view-shift").val(response.shift ? response.shift.toUpperCase() : "");
      $("#view-schedule").val(
        response.schedule ? response.schedule.toUpperCase() : ""
      );
      $("#viewQueueOffcanvas").offcanvas("show");
    }
  ).fail(function (jqXHR, textStatus, errorThrown) {
    console.error("AJAX request failed:", textStatus, errorThrown);
    alert("An error occurred while fetching data.");
  });
}
$("#add-unloading-form").submit(function (event) {
  event.preventDefault();
  Swal.fire({
    title: "Are you sure?",
    icon: "warning",
    showCancelButton: true,
    confirmButtonColor: "#1c3464",
    cancelButtonColor: "#6c757d",
    cancelButtonText: "No",
    confirmButtonText: "Yes",
  }).then((result) => {
    if (result.isConfirmed) {
      const data = {
        transaction_id: $("#view-transaction-id").val(),
        status: "standby",
      };
      $.post("./api/add/add-unloading.php", data)
        .done(function (response) {
          $("#viewQueueOffcanvas").offcanvas("hide");
          location.reload(); // Reload the page to see changes (optional)
        })
        .fail(function (jqXHR, textStatus, errorThrown) {
          alert("AJAX call failed: " + textStatus + ", " + errorThrown);
        });
    }
  });
});

$(document).ready(function () {
  function filterTable() {
    var ordinalValue = $("#ordinalFilter").val().toLowerCase();
    var shiftValue = $("#shiftFilter").val().toLowerCase();
    var scheduleValue = $("#scheduleFilter").val().toLowerCase();
    var lineValue = $("#lineFilter").val().toLowerCase();
    var searchQuery = $("#search-queue").val().toLowerCase();

    var rowCount = 0;

    $("#queueTable tr").each(function () {
      var rowOrdinal = $(this).find("td:eq(2)").text().toLowerCase();
      var rowShift = $(this).find("td:eq(3)").text().toLowerCase();
      var rowSchedule = $(this).find("td:eq(4)").text().toLowerCase();
      var rowLine = $(this).find("td:eq(5)").text().toLowerCase();
      var rowPlateNumber = $(this).find("td:eq(1)").text().toLowerCase();

      // Apply filters
      if (
        (ordinalValue === "" || rowOrdinal.includes(ordinalValue)) &&
        (shiftValue === "" || rowShift.includes(shiftValue)) &&
        (scheduleValue === "" || rowSchedule.includes(scheduleValue)) &&
        (lineValue === "" || rowLine.includes(lineValue)) &&
        (searchQuery === "" || rowPlateNumber.includes(searchQuery))
      ) {
        $(this).show();
        rowCount++;
      } else {
        $(this).hide();
      }
    });

    // Show "No Record Found" if no rows are visible
  }

  // Attach event listeners to the filters
  $(
    "#ordinalFilter, #shiftFilter, #scheduleFilter, #lineFilter, #search-queue"
  ).on("input change", function () {
    filterTable();
  });

  // Initial filtering on page load
  filterTable();
});
