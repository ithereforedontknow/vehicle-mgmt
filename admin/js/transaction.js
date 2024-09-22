$(document).ready(function () {
  // Filter functionality
  const rows = $("#transactions-table tbody tr").toArray();
  $("#search-input").on("keyup", function () {
    const value = $(this).val().toLowerCase();
    rows.forEach(
      (row) =>
        (row.style.display = row.textContent.toLowerCase().includes(value)
          ? ""
          : "none")
    );
  });
});
$("#add-transaction").submit(function (event) {
  event.preventDefault();
  const data = {
    to_reference: $("#to-reference").val(),
    hauler_id: $("#hauler").val(),
    vehicle_id: $("#plate-number").val(),
    driver_id: $("#driver-name").val(),
    helper_id: $("#helper-name").val(),
    project_id: $("#project").val(),
    no_of_bales: $("#no-of-bales").val(),
    kilos: $("#kilos").val(),
    origin: $("#origin").val(),
    arrival_date: $("#arrival-date").val(),
    arrival_time: $("#arrival-time").val(),
    status: "arrived",
  };
  $.post("./api/add/add-transaction.php", data)
    .then(function (response) {
      alert(response);
      $("#addTransactionOffcanvas").offcanvas("hide");
      window.location.reload();
    })
    .catch(function (jqXHR, textStatus, errorThrown) {
      alert("AJAX call failed: " + textStatus + ", " + errorThrown);
    });
});

$("#edit-transaction-form").submit((event) => {
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
        transaction_id: $("#edit-transaction-id").val(),
        arrival_time: $("#edit-arrival-time").val(),
        arrival_date: $("#edit-arrival-date").val(),
      };
      $.post("./api/update/update_transaction.php", data)
        .then(function (response) {
          window.location.reload();
          // alert(response);
        })
        .catch(function (jqXHR, textStatus, errorThrown) {
          alert("AJAX call failed: " + textStatus + ", " + errorThrown);
        });
    }
  });
});
function doneTransaction(transaction_id) {
  $("#edit-transaction-id").val(transaction_id);
  let now = new Date();

  // Format date and time as YYYY-MM-DDTHH:MM for local time
  let year = now.getFullYear();
  let month = (now.getMonth() + 1).toString().padStart(2, "0"); // Months are 0-based, so add 1
  let day = now.getDate().toString().padStart(2, "0");
  let hours = now.getHours().toString().padStart(2, "0");
  let minutes = now.getMinutes().toString().padStart(2, "0");

  // Combine to form the datetime-local format
  let formattedDateTime = `${year}-${month}-${day}T${hours}:${minutes}`;

  // Set the value of the datetime-local inputs
  $("#unloading-end").val(formattedDateTime);
  $("#time-departure").val(formattedDateTime);
  $("#edit-transaction-modal").modal("show");
}
$("#edit-transaction").submit((e) => {
  e.preventDefault();

  const data = {
    transaction_id: $("#edit-transaction-id").val(),
    unloading_time_end: $("#unloading-end").val(),
    time_of_departure: $("#time-departure").val(),
  };
  $.post("./api/update/update_unloading.php", data)
    .then(function (response) {
      // alert(response);
      $("#edit-transaction-modal").modal("hide");
      window.location.reload();
    })
    .catch(function (jqXHR, textStatus, errorThrown) {
      alert("AJAX call failed: " + textStatus + ", " + errorThrown);
    });
});
