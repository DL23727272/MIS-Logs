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

    <title>MIS - Main Campus</title>
    <link href="styles.css" rel="stylesheet" />
  </head>
  <body>


    <!-- Add Office Modal -->
    <div class="modal fade" id="addOfficeModal" tabindex="-1" aria-labelledby="addOfficeModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header" style="background-color: #800000">
                    <h5 class="modal-title text-white" id="addOfficeModalLabel"><i class="fa-solid fa-building"></i> Add Office</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <input type="text" id="newOfficeName" class="form-control" placeholder="Enter office name (Ex. Office Name - Main Campus)">
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                    <button type="button" class="btn btn-primary" id="saveOfficeBtn">Save</button>
                </div>
            </div>
        </div>
    </div>

      <!-- Add Employee -->
    <div class="modal fade" id="studentAddModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-lg"> <!-- Use modal-lg for a larger modal -->
        <div class="modal-content">
          <div class="modal-header" style="background-color: #800000">
            <h5 class="modal-title text-white" id="exampleModalLabel"><i class="fa-solid fa-user-plus"></i> Add Employee</h5>
            <button type="button" class="btn-close"  data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <form id="saveInfo">
            <div class="modal-body">
              <div id="errorMessage" class="alert alert-warning d-none"></div>

              <div class="row">
                <div class="col-md-3 mb-3 input-icon">
                  <label for="empID"><i class="fa-solid fa-id-badge"></i> Emp. ID</label>
                  <input type="text" name="empID" class="form-control">
                </div>

                <div class="col-md-3 mb-3 input-icon">
                  <label for="name"><i class="fa-solid fa-user"></i> Name</label>
                  <input type="text" name="name" class="form-control">
                </div>

                <div class="col-md-3 mb-3 input-icon">
                  <label for="office"><i class="fa-solid fa-building"></i> Office</label>
                  <select id="office" name="office" class="form-control">
                    <option value="">Select Office</option>
                  </select>
                </div>

                <div class="col-md-3 mb-3 input-icon">
                  <label for="position"><i class="fa-solid fa-briefcase"></i> Position</label>
                  <input type="text" name="position" class="form-control">
                </div>
              </div>

              <div class="row">
                <div class="col-md-3 mb-3 input-icon">
                  <label for="address"><i class="fa-solid fa-home"></i> Address</label>
                  <input type="text" name="address" class="form-control">
                </div>

                <div class="col-md-3 mb-3 input-icon">
                  <label for="phone"><i class="fa-solid fa-phone"></i> Phone</label>
                  <input type="text" name="phone" class="form-control">
                </div>
              </div>

              <!-- Degree and Degree Info Moved to a Separate Row -->
              <div class="row">
                <div class="col-md-6 mb-3 input-icon">
                  <label for="degree"><i class="fa-solid fa-graduation-cap"></i> Degree</label>
                  <select id="degree" name="degree" class="form-control">
                    <option value="">Select Degree</option>
                    <option value="507">507 - Completed Baccalaureate Degree</option>
                    <option value="601">601 - Partial Completion of Post Graduate Degree</option>
                    <option value="602">602 - Completion of Post Graduate Certificate</option>
                    <option value="701">701 - Completed Year 1 of MD or LLB</option>
                    <option value="702">702 - Completed Year 2 of MD or LLB</option>
                    <option value="703">703 - Completed Year 3 of MD or LLB</option>
                    <option value="704">704 - Completed Year 4 of MD or LLB</option>
                    <option value="705">705 - Completed MD or LLB</option>
                    <option value="801">801 - Partial Completion of Masters Degree</option>
                    <option value="802">802 - Completed all Masters requirements</option>
                    <option value="803">803 - Completed Masters Degree</option>
                    <option value="901">901 - Partial Completion of Doctorate Degree</option>
                    <option value="902">902 - Completed all doctorate requirements</option>
                    <option value="903">903 - Completed doctorate degree</option>
                  </select>
                </div>

                <div class="col-md-6 mb-3 input-icon">
                  <label for="degreeDetails"><i class="fa-solid fa-user-graduate"></i> Degree Info</label>
                  <textarea name="degreeDetails" class="form-control" rows="3" placeholder="Enter Bachelor's, Master's, and PhD details"></textarea>
                </div>
              </div>

            </div>

            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
              <button type="submit" class="btn btn-primary">Save Employee</button>
            </div>
          </form>
        </div>
      </div>
    </div>




      <!-- Employee Modal -->
    <div class="modal fade" id="employeeModal" tabindex="-1" aria-labelledby="employeeModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-lg">
        <div class="modal-content">
          <div class="modal-header" style="background-color: #800000">
            <h5 class="modal-title text-white" id="employeeModalLabel">
              <i class="fa-solid fa-user"></i> Employee Details
            </h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
            <form id="employeeForm">
              <input type="hidden" id="empID">

              <div class="row">
                <div class="col-md-6 mb-3">
                  <label for="empName" class="form-label"><i class="fa-solid fa-user"></i> Name</label>
                  <input type="text" class="form-control" id="empName" disabled>
                </div>

                <div class="col-md-6 mb-3">
                  <label for="empOffice" class="form-label"><i class="fa-solid fa-building"></i> Office</label>
                  <select class="form-control" id="empOffice" name="empOffice" disabled></select>
                </div>
              </div>

              <div class="row">
                <div class="col-md-6 mb-3">
                  <label for="empPosition" class="form-label"><i class="fa-solid fa-briefcase"></i> Position</label>
                  <input type="text" class="form-control" id="empPosition" disabled>
                </div>

                <div class="col-md-6 mb-3">
                  <label for="empAddress" class="form-label"><i class="fa-solid fa-map-marker-alt"></i> Address</label>
                  <input type="text" class="form-control" id="empAddress" disabled>
                </div>
              </div>

              <div class="row">
                <div class="col-md-6 mb-3">
                  <label for="empPhone" class="form-label"><i class="fa-solid fa-phone"></i> Phone</label>
                  <input type="text" class="form-control" id="empPhone" disabled>
                </div>

                <div class="col-md-6 mb-3">
                  <label for="empDegree" class="form-label"><i class="fa-solid fa-graduation-cap"></i> Degree</label>
                  <input type="text" class="form-control" id="empDegree" disabled>
                </div>
              </div>

              <div class="mb-3">
                <label for="empDegreeDetails" class="form-label"><i class="fa-solid fa-file-alt"></i> Degree Details</label>
                <textarea class="form-control" id="empDegreeDetails" rows="2" disabled></textarea>
              </div>

            </form>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-danger deleteEmployeeBtn"><i class="fa-solid fa-trash"></i> Delete</button>
            <button type="button" class="btn btn-success editEmployeeBtn"><i class="fa-solid fa-edit"></i> Edit</button>
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal"><i class="fa-solid fa-times"></i> Close</button>
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
          <ul class="navbar-nav me-auto mb-2 mb-lg-0">
            <li class="nav-item">
              <a
                class="nav-link"
                href="index.php"
                ><i class="fa-solid fa-power-off"></i> Logout</a
              >
            </li>

            <li class="nav-item active">
              <a
                class="nav-link"
                style="color: yellow"
                aria-current="page"
                href="admin.php"
                > admin</a
              >
            </li>
            <li class="nav-item">
              <a
                class="nav-link "
                href="accounts.php"
                > accounts</a
              >
            </li>
          </ul>
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
                      <input type="text" id="searchEmployee" class="form-control w-auto" placeholder="Search by name">
                  </div>

                  <!-- Office Filter Dropdown -->
                  <select id="officeFilter" class="form-select w-auto bg-primary text-white">
                      <option value="">All Offices</option>
                      <?php
                          require 'dbconnection.php';
                          $officeQuery = "SELECT * FROM offices";
                          $officeResult = mysqli_query($con, $officeQuery);
                          while ($office = mysqli_fetch_assoc($officeResult)) {
                              echo "<option value='{$office['officeID']}'>{$office['officeName']}</option>";
                          }
                      ?>
                  </select>

                  <!-- Buttons -->
                  <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addOfficeModal">
                      Add Office <i class="fa-solid fa-plus"></i>
                  </button>
                  <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#studentAddModal">
                      Add Employee <i class="fa-solid fa-user-plus"></i>
                  </button>
              </div>
          </div>
      </div>


        <!-- Employee Table -->
      <div class="card-body">
          <div class="table-responsive">
              <table id="myTable" class="table table-bordered table-striped table-hover">
                  <thead>
                      <tr>
                          <th><i class="fa-solid fa-id-badge"></i> Emp. ID</th>
                          <th><i class="fa-solid fa-user"></i> Name</th>
                          <th><i class="fa-solid fa-building"></i> Office</th>
                          <th><i class="fa-solid fa-briefcase"></i> Plantilla - Position</th>
                          <th><i class="fa-solid fa-home"></i> Home Address</th>
                          <th><i class="fa-solid fa-phone"></i> Phone</th>
                          <th><i class="fa-solid fa-envelope"></i> Highest Degree Attained</th>
                          <th><i class="fa-solid fa-graduation-cap"></i> Degree Attained</th>
                          <th>Action</th>
                      </tr>
                  </thead>
                  <tbody id="employeeTableBody">
                      <?php
                      require 'dbconnection.php';

                      $query = "SELECT employees.*, offices.officeName 
                                FROM employees 
                                LEFT JOIN offices ON employees.officeID = offices.officeID";
                      $query_run = mysqli_query($con, $query);

                      if (mysqli_num_rows($query_run) > 0) {
                          foreach ($query_run as $employees) {
                              ?>
                              <tr data-office-id="<?= $employees['officeID'] ?>">
                                  <td><?= $employees['empID'] ?></td>
                                  <td class="employee-name"><?= $employees['name'] ?></td>
                                  <td><?= $employees['officeName'] ?></td>
                                  <td><?= $employees['position'] ?></td>
                                  <td><?= $employees['address'] ?></td>
                                  <td><?= $employees['phone'] ?></td>
                                  <td><?= $employees['degree'] ?></td>
                                  <td><?= $employees['degreeDetails'] ?></td>
                                  <td>
                                      <button type="button" value="<?= $employees['empID'] ?>" class="viewEmployeebtn btn btn-secondary">
                                      <i class="fa-solid fa-eye"></i> View
                                      </button>
                                  </td>
                              </tr>
                              <?php
                          }
                      }
                      ?>
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

    <script src="script.js"></script>
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

    </script>

   
  </body>
                                                            
</html>