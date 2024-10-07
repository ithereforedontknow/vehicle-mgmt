// Event delegation: attach event listener to the table, not individual forms
$("#transactions-table").on(
  "submit",
  "form.unloading-start-form",
  function (event) {
    event.preventDefault(); // Prevent the default form submission

    const form = $(this); // 'this' refers to the specific form being submitted
    const transactionId = form.find("input[name='unloading-start-id']").val();
    const unloadingTimeStart = form
      .find("input[name='unloading-start-time']")
      .val();

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
          transaction_id: transactionId,
          unloading_time_start: unloadingTimeStart,
        };
        $.post("./api/update/update_start_unloading.php", data)
          .done(function (response) {
            Swal.fire({
              title: "Success",
              icon: "success",
              showConfirmButton: false,
              timer: 1000,
              didClose: () => {
                window.location.reload();
              },
            });
          })
          .fail(function (jqXHR, textStatus, errorThrown) {
            Swal.fire(
              "Error",
              "AJAX call failed: " + textStatus + ", " + errorThrown,
              "error"
            );
          });
      }
    });
  }
);
