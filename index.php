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

    <title>Validation Form</title>
  </head>
  <body>


    <!-- Add Office Modal -->
    <div class="modal fade" id="addOfficeModal" tabindex="-1" aria-labelledby="addOfficeModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="addOfficeModalLabel">Add Office</h5>
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
           
              <h5 class="modal-title" id="exampleModalLabel">Add Employee</h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

                <form id="saveInfo">
                      <div class="modal-body">

                        <div id="errorMessage" class="alert alert-warning d-none"></div>

                        <div class="mb-3">
                            <label for="">Emp. ID</label>
                            <input type="text" name="empID" class="form-control">
                        </div>
                        <div class="mb-3">
                            <label for="">Name</label>
                            <input type="text" name="name" class="form-control">
                        </div>
                        <div class="mb-3">
                          <label for="office">Office:</label>
                          <select id="office" name="office" class="form-control">
                              <option value="">Select Office</option>
                          </select>
                        </div>
                        <div class="mb-3">
                            <label for="">Position</label>
                            <input type="text" name="position" class="form-control">
                        </div>
                        <div class="mb-3">
                            <label for="">Home address</label>
                            <input type="text" name="address" class="form-control">
                        </div>
                        <div class="mb-3">
                            <label for="">Phone</label>
                            <input type="text" name="phone" class="form-control">
                        </div>
                       

                      </div>
                      <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save Student</button>

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
                <label for="empName" class="form-label">Name</label>
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


    <div class="container">
        <div class="card">

        <div class="card-header back d-flex justify-content-between align-items-center">
            <h4>Developed by: Dran Leynard P. Gamoso</h4>
            <div>
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
                    Add Office
                </button>
                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#studentAddModal">
                    Add Employee
                </button>
            </div>
        </div>
        </div>

           <!-- Employee Table -->
          <div class="card-body">
              <table id="myTable" class="table table-bordered table-striped table-hover">
                  <thead>
                      <tr>
                          <th>Emp. ID</th>
                          <th>Name</th>
                          <th>Office</th>
                          <th>Position</th>
                          <th>Home Address</th>
                          <th>Phone</th>
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
    </div>
   

    <!-- Option 1: Bootstrap Bundle with ALertify -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js" ></script>
    <script src="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/alertify.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

   <script src="script.js"></script>
   
  </body>
                                                            
</html>