$(document).on("click", ".editUser", function () {
    let userID = $(this).data("id");
    let username = $(this).data("username");
    let userType = $(this).data("type");

    console.log("User ID:", userID);
    console.log("Username:", username);
    console.log("User Type:", userType);

    Swal.fire({
        title: "Edit User",
        html: `
            <input type="hidden" id="editUserID" name="userID" value="${userID}">
            <input type="text" id="editUsername" name="username" class="swal2-input" value="${username}">
            <input type="password" id="editPassword" name="password" class="swal2-input" placeholder="New Password">
            <select id="editUserType" class="swal2-input">
                <option value="user" ${userType === 'user' ? 'selected' : ''}>User</option>
                <option value="admin" ${userType === 'admin' ? 'selected' : ''}>Admin</option>
            </select>
        `,
        showCancelButton: true,
        confirmButtonText: "Update",
        preConfirm: () => {
            return {
                userID: document.getElementById("editUserID").value,
                username: document.getElementById("editUsername").value.trim(),
                password: document.getElementById("editPassword").value,
                userType: document.getElementById("editUserType").value,
            };
        }
    }).then((result) => {
        console.log(result.value); // ✅ Debugging: Check if values are properly retrieved
    
        if (result.isConfirmed) {
            $.ajax({
                url: "editUser.php",
                type: "POST",
                dataType: "json",
                data: {
                    updateUser: true,
                    userID: result.value.userID,
                    username: result.value.username,
                    password: result.value.password,
                    userType: result.value.userType,
                },
                success: function (response) {
                    console.log("Response from PHP:", response);
                    let res = response;
                    Swal.fire(res.message, "", res.status === "success" ? "success" : "error")
                        .then(() => {
                            fetchUsers(); // Reload the users after update
                        });
                },
                error: function (xhr, status, error) {
                    console.log("AJAX Error:", status, error);
                    console.log("XHR Response:", xhr.responseText); // ✅ Check error response
                }
            });
            
        }
    });
    
    
});

// Function to reload users
function fetchUsers(search = "") {
    $.ajax({
        url: "editUser.php",
        type: "GET",
        data: { search: search },
        success: function (response) {
            let users = JSON.parse(response);
            let tableBody = $("#userTableBody");
            tableBody.html("");

            users.forEach(user => {
                tableBody.append(`
                    <tr>
                       
                        <td>${user.username}</td>
                        <td>${user.userType}</td>
                        <td>
                            <button type="button" class="editUser btn btn-primary" data-id="${user.userID}" data-username="${user.username}" data-type="${user.userType}">
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
    fetchUsers();
});
