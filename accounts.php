<!doctype html>
<html lang="en">
  <head>
    
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    
    <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/alertify.min.css" />
    <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/themes/bootstrap.min.css" />
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <link rel="icon" type="image/x-icon" href="img/logo.ico" />
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css"
      integrity="sha512-Evv84Mr4kqVGRNSgIGL/F/aIDqQb7xQ2vcrdIwxfjThSH8CSR7PBEakCr51Ck+w+/U6swU2Im1vVX0SVk9ABhg=="
      crossorigin="anonymous"
      referrerpolicy="no-referrer"
    />
    <link
      href="https://fonts.googleapis.com/css2?family=Cinzel:wght@400;700&display=swap"
      rel="stylesheet"
    />

    <title>Accounts</title>
    <link href="styles.css" rel="stylesheet" />
  </head>
  <body>

    <!-- Edit User Modal -->
    <div class="modal fade" id="editUserModal" tabindex="-1" aria-labelledby="editUserModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="editUserModalLabel">Edit User</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="editUserForm">
                        <input type="hidden" id="editUserID" name="userID">
                        
                        <div class="mb-3">
                            <label for="editUsername" class="form-label">Username</label>
                            <input type="text" id="editUsername" name="username" class="form-control">
                        </div>
                        <label for="editPassword" class="form-label">New Password</label>
                        <div class="mb-3 input-group">
                            
                            <input type="password" id="editPassword" name="password" class="form-control" placeholder="Enter new password">
                            <button class="btn btn-outline-dark" type="button" id="togglePassword">
                                    <i class="fa fa-eye-slash" id="eyeIcon" aria-hidden="true"></i>
                            </button>
                        </div>

                        <div class="mb-3">
                            <label for="editUserType" class="form-label">User Type</label>
                            <select id="editUserType" name="userType" class="form-select">
                                <option value="user">User</option>
                                <option value="admin">Admin</option>
                            </select>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary" id="updateUserBtn">Update</button>
                </div>
            </div>
        </div>
    </div>



    <header class="header">
      <div class="container">
       <div
        class="d-flex flex-column align-items-center justify-content-center text-center"
        >
          <div>
            <img
              src="img/ispsc.png"
              alt="ISPSC Logo"
              width="100"
              height="100"
              class="me-3"
            />
            <img
              class="bagong-pilipinas"
              src="img/bagong-pilipinas.png"
              alt="ISPSC Logo"
              width="120"
              height="120"
              class="me-3"
            />
          </div>
          <div>
            <h1 class="ispsc-logo mb-0 ">REPUBLIC OF THE PHILIPPINES</h1>
            <hr class="my-2 border-white" />
            <h1 class="ispsc-logo mb-0">
              ILOCOS SUR POLYTECHNIC STATE COLLEGE
            </h1>
            <h2 class="ispsc-logo mb-0">ILOCOS SUR, PHILIPPINES</h2>
          </div>
        </div>
      </div>

    <nav class="navbar navbar-expand-lg">
      <div class="container">
        <button
            class="navbar-toggler"
            type="button"
            data-bs-toggle="collapse"
            data-bs-target="#navbarNav"
            aria-controls="navbarNav"
            aria-expanded="false"
            aria-label="Toggle navigation"
          >
            <i class="navbar-toggler-icon" id="menu"></i>
        </button>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
          <ul class="navbar-nav me-auto mb-2 mb-lg-0">
            <li class="nav-item">
              <a
                class="nav-link"
                href="index.php"
                ><i class="fa-solid fa-power-off"></i> Logout</a
              >
            </li>

            <li class="nav-item">
              <a
                class="nav-link"
                href="admin.php"
                > admin</a
              >
            </li>
            <li class="nav-item">
              <a
                class="nav-link active"
                style="color: yellow"
                aria-current="page"
                href="accounts.php"
                > accounts</a
              >
            </li>
          </ul>
         
        </div>
      </div>
    </nav>
    </header>

    <div class="container mt-3">
      <div class="card">
          <div class="card-header back d-flex flex-wrap justify-content-between align-items-center gap-3">
              <!-- Left Section -->
              <div>
                  <h4 class="mb-1">MIS - Main Campus</h4>
                 
              </div>

              <!-- Right Section -->
              <div class="d-flex flex-wrap justify-content-end align-items-center gap-2">
                  <!-- Search Bar -->
                  <div class="d-flex align-items-center">
                      <i class="fa-solid fa-search me-2"></i>
                      <input type="text" id="searchUser" class="form-control w-auto" placeholder="Search by name">
                  </div>
              </div>
          </div>
      </div>


        <!-- User Table -->
      <div class="card-body">
          <div class="table-responsive">
              <table id="myTable" class="table table-bordered table-striped table-hover">
                  <thead>
                      <tr>
                          <th><i class="fa-solid fa-id-badge"></i> Emp. ID</th>
                          <th><i class="fa-solid fa-user"></i> Account type</th>
                          <th>Action</th>
                      </tr>
                  </thead>
                  <tbody id="userTableBody">
                     
                  </tbody>
              </table>
          </div>
      </div>


    </div>
    
    <?php include "footer.php"?>


    <!-- Option 1: Bootstrap Bundle with ALertify -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js" ></script>
    <script src="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/alertify.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

    <script src="accounts.js"></script>
    <script>
        document.addEventListener("DOMContentLoaded", function () {
        document.querySelectorAll(".ispsc-logo").forEach(function (element) {
            element.innerHTML = element.textContent
              .split(" ")
              .map(word => `<span>${word.charAt(0)}</span>${word.slice(1)}`)
              .join(" ");
          });
        });
        console.log("Developed by: Dran Leynard P. Gamoso");
        console.log("DL's Portfolio: " + "https://dlportfolio.personatab.com/");

        document.addEventListener("DOMContentLoaded", function () {
            let empID = sessionStorage.getItem("username");
            console.log("Stored Employee ID:", empID);

            // If no employee ID is found, show SweetAlert and redirect
            if (!empID) {
                Swal.fire({
                    icon: "error",
                    title: "No Employee ID Found",
                    text: "Please log in to continue.",
                    confirmButtonColor: "#800000"
                }).then(() => {
                    window.location.href = "index.php"; // Redirect to login page
                });
                return; // Stop further script execution
            }
        });

        // --------------- FOR PASSWORD TOGGLE --------------
      
        document.addEventListener('DOMContentLoaded', function () {
            const togglePassword = document.getElementById('togglePassword');
            const passwordInput = document.getElementById('editPassword');
            const eyeIcon = document.getElementById('eyeIcon');

            togglePassword.addEventListener('click', function () {
                // Toggle the password field type
                const type = passwordInput.type === 'password' ? 'text' : 'password';
                passwordInput.type = type;

                // Toggle the eye icon
                if (type === 'password') {
                    eyeIcon.classList.remove('fa-eye');
                    eyeIcon.classList.add('fa-eye-slash');
                } else {
                    eyeIcon.classList.remove('fa-eye-slash');
                    eyeIcon.classList.add('fa-eye');
                }
            });
        });

      // --------------- END FOR PASSWORD TOGGLE --------------


    </script>

   
  </body>
                                                            
</html>