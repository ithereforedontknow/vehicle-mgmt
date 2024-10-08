$("#add-transaction").submit(function (event) {
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
        toReference: $("#to-reference").val(),
        hauler_id: $("#hauler_id").val(),
        vehicle_id: $("#vehicle_id").val(),
        driver_id: $("#driver_id").val(),
        helper_id: $("#helper_id").val(),
        project_id: $("#project_id").val(),
        noOfBales: $("#no-of-bales").val(),
        kilos: $("#kilos").val(),
        origin_id: $("#origin_id").val(),
        time_of_departure: $("#time-departure").val(),
      };
      $.post("./api/add/add-transaction.php", data)
        .then((result) => {
          Swal.fire({
            title: "Added!",
            text: "Transaction has been added.",
            icon: "success",
            didClose: () => {
              window.location.reload();
            },
          });
        })
        .catch((err) => {
          Swal.fire("Error!", err, "error");
        });
    }
  });
});
