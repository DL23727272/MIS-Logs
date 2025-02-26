$(document).on("click", ".editUser", function () {
    let userID = $(this).data("id");
    let username = $(this).data("username");
    let userType = $(this).data("type");

    console.log("User ID:", userID);
    console.log("Username:", username);
    console.log("User Type:", userType);

    // Populate the modal with user data
    $("#editUserID").val(userID);
    $("#editUsername").val(username);
    $("#editUserType").val(userType);

    // Show the Bootstrap modal
    $("#editUserModal").modal("show");
});

// Handle Update Button Click
$("#updateUserBtn").on("click", function () {
    let userID = $("#editUserID").val();
    let username = $("#editUsername").val().trim();
    let password = $("#editPassword").val();
    let userType = $("#editUserType").val();

    $.ajax({
        url: "editUser.php",
        type: "POST",
        dataType: "json",
        data: {
            updateUser: true,
            userID: userID,
            username: username,
            password: password,
            userType: userType,
        },
        success: function (response) {
            console.log("Response from PHP:", response);

            Swal.fire(response.message, "", response.status === "success" ? "success" : "error").then(() => {
                $("#editUserModal").modal("hide"); // Hide modal on success
                $("#editUserForm")[0].reset();
                fetchUsers(); // Reload users after update
            });
        },
        error: function (xhr, status, error) {
            console.log("AJAX Error:", status, error);
            console.log("XHR Response:", xhr.responseText);
        }
    });
});

// Function to reload users
function fetchUsers(search = "") {
    $.ajax({
        url: "editUser.php",
        type: "GET",
        data: { search: search }, // Send search query
        success: function (response) {
            let users = JSON.parse(response);
            let tableBody = $("#userTableBody");
            tableBody.html("");

            users.forEach(user => {
                tableBody.append(`
                    <tr>
                        <td class="employee-name">${user.username}</td> 
                        <td>${user.userType}</td>
                        <td>
                            <button type="button" class="editUser btn btn-primary" 
                                data-id="${user.userID}" 
                                data-username="${user.username}" 
                                data-type="${user.userType}">
                                <i class="fa-solid fa-edit"></i> Edit
                            </button>
                        </td>
                    </tr>
                `);
            });
        }
    });
}


// Load users when page loads
$(document).ready(function () {
    fetchUsers(); // Load users on page load

    // Search users dynamically
    $('#searchUser').on('keyup', function () {
        let searchText = $(this).val().trim();
        fetchUsers(searchText); // Fetch filtered users from the server
    });
});

