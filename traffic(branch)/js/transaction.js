$("#add-transaction").submit(function (event) {
  event.preventDefault();
  const data = {
    toReference: $("#to-reference").val(),
    hauler_id: $("#hauler_id").val(),
    vehicle_id: $("#vehicle_id").val(),
    driver_id: $("#driver_id").val(),
    project_id: $("#project_id").val(),
    noOfBales: $("#no-of-bales").val(),
    kilos: $("#kilos").val(),
    origin: $("#origin").val(),
  };
  $.post("./api/add/add-transaction.php", data)
    .then((result) => {
      alert(result);
    })
    .catch((err) => {
      alert(err);
    });
});
