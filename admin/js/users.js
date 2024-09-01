$("#add-user").submit(function (event) {
  event.preventDefault();
  const username = $("#username").val();
  const fname = $("#fname").val();
  const mname = $("#mname").val();
  const lname = $("#lname").val();
  const password = $("#password").val();
  const userlevel = $("#userlevel").val();

  $.ajax({
    url: "./api/add/add-user.php",
    type: "POST",
    data: {
      username: username,
      fname: fname,
      mname: mname,
      lname: lname,
      password: password,
      userlevel: userlevel,
    },
    success: function (data) {
      if (data === "Registration successful") {
        $("#add-user-modal").modal("hide");
        window.location.reload();
      } else {
        alert(data);
      }
    },
  });
});
function activate_user(userId) {
  $.post("./api/status/activate_user.php", { id: userId }, function (data) {
    console.log(data); // Display the response message
    location.reload(); // Reload the page to reflect the changes
  }).fail(function (jqXHR, textStatus, errorThrown) {
    console.error("Error: " + textStatus, errorThrown); // Log any errors
    alert("An error occurred: " + textStatus + " - " + errorThrown);
  });
}

function deactivate_user(userId) {
  $.post("./api/status/deactivate_user.php", { id: userId }, function (data) {
    console.log(data); // Display the response message
    location.reload(); // Reload the page to reflect the changes
  }).fail(function (jqXHR, textStatus, errorThrown) {
    console.error("Error: " + textStatus, errorThrown); // Log any errors
    alert("An error occurred: " + textStatus + " - " + errorThrown);
  });
}
function edit_user(id) {
  console.log("Editing user with ID:", id);
  // Fetch user details via AJAX
  $.ajax({
    url: "./api/get_user.php",
    type: "GET",
    data: { id: id },
    dataType: "json",
    success: function (response) {
      // Populate modal with user data
      $("#edit-user-id").val(response.id);
      $("#edit-username").val(response.username);
      $("#edit-fname").val(response.fname);
      $("#edit-mname").val(response.mname);
      $("#edit-lname").val(response.lname);
      $("#edit-userlevel").val(response.userlevel);
      // Show the modal
      $("#edit-user-modal").modal("show");
    },
    error: function (xhr, status, error) {
      console.error("Error fetching user data:", error);
      alert("Failed to fetch user data. Please try again.");
    },
  });
}

// Handle form submission for edit user
$("#edit-user").submit(function (event) {
  event.preventDefault();

  // Serialize form data
  var formData = $(this).serialize();

  // Submit data via AJAX
  $.ajax({
    url: "./api/update/update_user.php",
    type: "POST",
    data: formData,
    success: function (response) {
      // Close modal and refresh page or update table
      $("#edit-user-modal").modal("hide");
      // Example: Refresh the page after successful update
      location.reload(); // You may replace this with a more specific update method
    },
    error: function (xhr, status, error) {
      console.error("Error updating user:", error);
      alert("Failed to update user. Please try again.");
    },
  });
});
$(document).ready(function () {
  const fetchUsers = (page = 1, search = "") =>
    $.ajax({
      url: "./api/fetch/fetch_users.php",
      type: "GET",
      dataType: "json",
      data: { page, search },
    }).then(
      (response) => {
        const userTable = $("#user-data");
        userTable.empty();

        const users = response.data;
        const rows = users.map(
          (user) => `<tr>
                        <td class='text-center'>${user.id}</td>
                        <td class='text-center'>${user.fname} ${user.lname}</td>
                        <td class='text-center'>${user.username}</td>
                        <td class='text-center'>${user.userlevel}</td>
                        <td class='text-center'>${
                          user.active ? "Active" : "Inactive"
                        }</td>
                        <td class='exclude-print'>
                            <button class='btn btn-primary px-2 me-2' onclick='edit_user(${
                              user.id
                            })'>
                                <i class='fa-solid fa-pen-to-square fa-lg' style='color: #ffffff;'></i> Edit
                            </button>
                            ${
                              user.active
                                ? `<button class='btn btn-danger px-1' onclick='deactivate_user(${user.id})'>
                              <i class='fa-solid fa-user-xmark fa-lg' style='color: #ffffff;'></i> Deactivate
                          </button>`
                                : `<button class='btn btn-success px-2' onclick='activate_user(${user.id})'>
                              <i class='fa-solid fa-user-check fa-lg' style='color: #ffffff;'></i> Activate
                          </button>`
                            }
                        </td>
                    </tr>`
        );

        userTable.append(rows);

        const pagination = $("#pagination");
        pagination.empty();

        const totalPages = Math.ceil(response.total / response.limit);
        for (let i = 1; i <= totalPages; i++) {
          const pageItem = `<li class='page-item ${
            i === response.page ? "active" : ""
          }'>
                              <a class='page-link' href='#' data-page='${i}'>${i}</a>
                          </li>`;
          pagination.append(pageItem);
        }
      },
      (xhr, status, error) => console.error("Error fetching data:", error)
    );

  // Initial fetch
  fetchUsers();

  // Search functionality
  $("#column-search").on("keyup", function () {
    const searchTerm = $(this).val();
    fetchUsers(1, searchTerm);
  });

  // Pagination click event
  $(document).on("click", ".page-link", function (e) {
    e.preventDefault();
    const page = $(this).data("page");
    const searchTerm = $("#column-search").val();
    fetchUsers(page, searchTerm);
  });
});
