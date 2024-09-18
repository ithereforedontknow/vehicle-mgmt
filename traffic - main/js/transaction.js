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

function editTransaction(transaction_id) {
  $.post(
    "./api/fetch/get_transaction.php",
    { transaction_id: transaction_id },
    function (data) {
      const transaction = JSON.parse(data);

      $("#edit-transaction-id").val(transaction.transaction_id);
      $("#edit-to-reference").val(transaction.to_reference);
      $("#edit-edit-no-of-bales").val(transaction.no_of_bales);
      $("#edit-origin").val(transaction.origin);
      $("#edit-kilos").val(transaction.kilos);

      const offcanvas = new bootstrap.Offcanvas(
        document.getElementById("editTransactionOffcanvas")
      );
      offcanvas.show();
    }
  );
}

$("#edit-transaction-form").submit((event) => {
  event.preventDefault();
  const data = {
    transaction_id: $("#edit-transaction-id").val(),
    arrival_time: $("#edit-arrival-time").val(),
    arrival_date: $("#edit-arrival-date").val(),
  };
  $.post("./api/update/update_transaction.php", data)
    .then(function (response) {
      $("#editTransactionOffcanvas").offcanvas("hide");
      window.location.reload();
      console.log(response);
      // alert(response);
    })
    .catch(function (jqXHR, textStatus, errorThrown) {
      alert("AJAX call failed: " + textStatus + ", " + errorThrown);
    });
});
