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

    <title>Validation Form</title>
    <link href="styles.css" rel="stylesheet" />
  </head>
  <body>


    <!-- Add Office Modal -->
    <div class="modal fade" id="addOfficeModal" tabindex="-1" aria-labelledby="addOfficeModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="addOfficeModalLabel"><i class="fa-solid fa-building"></i> Add Office</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <input type="text" id="newOfficeName" class="form-control" placeholder="Enter office name">
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                    <button type="button" class="btn btn-success" id="saveOfficeBtn">Save</button>
                </div>
            </div>
        </div>
    </div>

   <!-- Add Employee -->
  <div class="modal fade" id="studentAddModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel"><i class="fa-solid fa-user-plus"></i> Add Employee</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <form id="saveInfo">
          <div class="modal-body">
            <div id="errorMessage" class="alert alert-warning d-none"></div>

            <div class="mb-3 input-icon">
              <label for="empID"><i class="fa-solid fa-id-badge"></i> Emp. ID</label>
              <input type="text" name="empID" class="form-control">
            </div>

            <div class="mb-3 input-icon">
              <label for="name"><i class="fa-solid fa-user"></i> Name</label>
              <input type="text" name="name" class="form-control">
            </div>

            <div class="mb-3 input-icon">
              <label for="office"><i class="fa-solid fa-building"></i> Office</label>
              <select id="office" name="office" class="form-control">
                <option value="">Select Office</option>
              </select>
            </div>

            <div class="mb-3 input-icon">
              <label for="position"><i class="fa-solid fa-briefcase"></i> Position</label>
              <input type="text" name="position" class="form-control">
            </div>

            <div class="mb-3 input-icon">
              <label for="address"><i class="fa-solid fa-home"></i> Home Address</label>
              <input type="text" name="address" class="form-control">
            </div>

            <div class="mb-3 input-icon">
              <label for="phone"><i class="fa-solid fa-phone"></i> Phone</label>
              <input type="text" name="phone" class="form-control">
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
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="employeeModalLabel">Employee Details</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
            <form id="employeeForm">
              <input type="hidden" id="empID">
              <div class="mb-3">
                <label for="empName" class="form-label"><i class="fa-solid fa-phone"></i> Name</label>
                <input type="text" class="form-control" id="empName" disabled>
              </div>
              <!-- <div class="mb-3">
                <label for="empOffice" class="form-label">Office</label>
                <input type="text" class="form-control" id="empOffice" disabled>
              </div> -->
              <div class="mb-3">
                  <label for="empOffice" class="form-label">Office</label>
                  <select class="form-control" id="empOffice" name="empOffice"></select>
              </div>
              <div class="mb-3">
                <label for="empPosition" class="form-label">Position</label>
                <input type="text" class="form-control" id="empPosition" disabled>
              </div>
              <div class="mb-3">
                <label for="empAddress" class="form-label">Address</label>
                <input type="text" class="form-control" id="empAddress" disabled>
              </div>
              <div class="mb-3">
                <label for="empPhone" class="form-label">Phone</label>
                <input type="text" class="form-control" id="empPhone" disabled>
              </div>
            </form>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-danger deleteEmployeeBtn">Delete</button>
            <button type="button" class="btn btn-success editEmployeeBtn">Edit</button>
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
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
            <h1 class="ispsc-logo mb-0">REPUBLIC OF THE PHILIPPINES</h1>
            <hr class="my-2 border-white" />
            <h1 class="ispsc-logo mb-0">
              ILOCOS SUR POLYTECHNIC STATE COLLEGE
            </h1>
            <h2 class="ispsc-logo mb-0">ILOCOS SUR, PHILIPPINES</h2>
          </div>
        </div>
      </div>
    </header>

    <div class="container">
      <div class="card">
          <div class="card-header back d-flex justify-content-between align-items-center">
          
              <div>
                  <h4>Developed by: Dran Leynard P. Gamoso</h4>
                  <a href="https://dlportfolio.personatab.com/" target="_blank" class="link-danger link-offset-2 link-offset-3-hover link-underline link-underline-opacity-0 link-underline-opacity-75-hover fw-bold text-dark">
                      <i class="fa-solid fa-briefcase"></i> Visit DL Portfolio
                  </a>
              </div>
              <div>
                  <i class="fa-solid fa-search"></i>
                  <input type="text" id="searchEmployee" class="form-control d-inline-block w-auto" placeholder="Search by name">
                  <select id="officeFilter" class="form-select d-inline-block w-auto">
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
          <table id="myTable" class="table table-bordered table-striped table-hover">
              <thead>
                  <tr>
                      <th><i class="fa-solid fa-id-badge"></i> Emp. ID</th>
                      <th><i class="fa-solid fa-user"></i>  Name</th>
                      <th><i class="fa-solid fa-building"></i> Office</th>
                      <th><i class="fa-solid fa-briefcase"></i> Plantilla - Position</th>
                      <th><i class="fa-solid fa-home"></i> Home Address</th>
                      <th><i class="fa-solid fa-phone"></i> Phone</th>
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
                              <td>
                                  <button type="button" value="<?= $employees['empID'] ?>" class="viewEmployeebtn btn btn-secondary">View</button>
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


    </script>

   
  </body>
                                                            
</html>