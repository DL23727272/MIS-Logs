$(document).ready(function () {

    // Function to load offices into a select element
    function loadOffices(selectElement, selectedOffice = '') {
        $.ajax({
            url: './fetchOffices.php',
            type: 'GET',
            success: function (response) {
                let options = '<option value="">Select Office</option>';
                JSON.parse(response).forEach(office => {
                    console.log(office.officeID); // Move inside loop
                    options += `<option value="${office.officeID}" ${office.officeID == selectedOffice ? 'selected' : ''}>${office.officeName}</option>`;
                });
                $(selectElement).html(options);
            }
        });
    }

    // Load offices on page load
    loadOffices('#office');

    // Handle Add Office Button Click
    $("#saveOfficeBtn").click(function() {
        let officeName = $("#newOfficeName").val().trim();

        if (officeName === "") {
            Swal.fire("Error", "Please enter an office name!", "warning");
            return;
        }

        $.ajax({
            url: "addOffice.php",
            type: "POST",
            data: { officeName: officeName },
            success: function(response) {
                if (response === "duplicate") {
                    Swal.fire("Error", "Office already exists!", "error");
                } else if (response === "success") {
                    Swal.fire("Success", "Office added successfully!", "success").then(() => {
                        $("#addOfficeModal").modal("hide");
                        $("#newOfficeName").val(""); // Clear input field
                        loadOffices('#office'); // Refresh dropdown
                    });
                } else {
                    Swal.fire("Error", "Something went wrong!", "error");
                }
            }
        });
    });

    //sort employee
    $("#officeFilter").on("change", function () {
        var selectedOffice = $(this).val(); // Get selected office ID

        $("#myTable tbody tr").each(function () {
            var officeName = $(this).find("td:nth-child(3)").text().trim(); // Get the office name from the table row

            // Show all if no office is selected, otherwise show only matching rows
            if (selectedOffice === "" || officeName === $("#officeFilter option:selected").text().trim()) {
                $(this).show();
            } else {
                $(this).hide();
            }
        });
    });

     // Search Employee by Name
     $('#searchEmployee').on('keyup', function() {
        let searchText = $(this).val().toLowerCase();

        $('#employeeTableBody tr').each(function() {
            let employeeName = $(this).find('.employee-name').text().toLowerCase();
            if (employeeName.includes(searchText)) {
                $(this).show();
            } else {
                $(this).hide();
            }
        });
    });

   // Handle Add Employee Form Submission
    $('#saveInfo').submit(function(e) {
        e.preventDefault();

        let formData = $(this).serialize(); // Serialize form data

        // Validate fields
        let empID = $("input[name='empID']").val().trim();
        let name = $("input[name='name']").val().trim();
        let office = $("#office").val();
        let position = $("input[name='position']").val().trim();
        let address = $("input[name='address']").val().trim();
        let phone = $("input[name='phone']").val().trim();
        let degree = $("#degree").val();
        let degreeDetails = $("textarea[name='degreeDetails']").val().trim();

        if (!empID || !name || !office || !position || !address || !phone || !degree || !degreeDetails) {
            Swal.fire("Warning", "All fields are required, including Degree and Degree Info!", "warning");
            return;
        }

        // Confirm before adding employee
        Swal.fire({
            title: "Add Employee?",
            text: "Do you want to add this employee?",
            icon: "question",
            showCancelButton: true,
            confirmButtonText: "Yes, Save it!",
            cancelButtonText: "Cancel"
        }).then((result) => {
            if (result.isConfirmed) {
                $.ajax({
                    url: 'addEmployee.php', // PHP script to add employee
                    type: 'POST',
                    data: formData,
                    success: function(response) {
                        if (response === "success") {
                            Swal.fire("Success", "Employee added successfully!", "success").then(() => {
                                $('#studentAddModal').modal('hide'); // Close modal
                                $('#saveInfo')[0].reset(); // Reset form
                                location.reload(); // Refresh page
                            });
                        } else if (response === "duplicate") {
                            Swal.fire("Error", "Employee ID already exists!", "error");
                        } else {
                            Swal.fire("Error", "Failed to add employee!", "error");
                        }
                    },
                    error: function() {
                        Swal.fire("Error", "Something went wrong!", "error");
                    }
                });
            }
        });
    });


   // Handle View Employee Button Click
    $('.viewEmployeebtn').click(function() {
        let employeeId = $(this).val();

        // Fetch employee details via AJAX
        $.ajax({
            url: 'getEmployee.php', 
            type: 'POST',
            data: { id: employeeId },
            dataType: 'json',
            success: function(response) {
                if (response) {
                    // Populate modal fields
                    $('#empID').val(response.empID);
                    $('#empName').val(response.name);
                    $('#empPosition').val(response.position);
                    $('#empAddress').val(response.address);
                    $('#empPhone').val(response.phone);
                    $('#empDegree').val(response.degree);
                    $('#empDegreeDetails').val(response.degreeDetails);

                    // Load offices and set the selected office
                    loadOffices('#empOffice', response.officeID);

                    // Disable select and input fields by default
                    $('#empName, #empOffice, #empPosition, #empAddress, #empPhone, #empDegree, #empDegreeDetails').prop('disabled', true);

                    // Enable Edit/Delete buttons
                    $('.editEmployeeBtn').attr('data-id', employeeId);
                    $('.deleteEmployeeBtn').attr('data-id', employeeId);

                    // Show modal
                    $('#employeeModal').modal('show');
                } else {
                    Swal.fire("Error", "Employee details not found!", "error");
                }
            },
            error: function() {
                Swal.fire("Error", "Failed to fetch employee data!", "error");
            }
        });
    });

    

    // Handle Edit Employee Button Click
    $('.editEmployeeBtn').click(function() {
        let employeeId = $(this).attr('data-id');

        // Enable input fields for editing
        $('#empName, #empOffice, #empPosition, #empAddress, #empPhone, #empDegree, #empDegreeDetails').prop('disabled', false);

        // Change button text to Save
        $(this).text("Save").removeClass("btn-success").addClass("btn-primary").off("click").on("click", function() {
            let updatedData = {
                id: employeeId,
                name: $('#empName').val(),
                officeID: $('#empOffice').val(), 
                position: $('#empPosition').val(),
                address: $('#empAddress').val(),
                phone: $('#empPhone').val(),
                degree: $('#empDegree').val(),
                degreeDetails: $('#empDegreeDetails').val()
                  // Capture selected degree
            };

            // Confirm save action
            Swal.fire({
                title: "Save Changes?",
                text: "Do you want to update this employee's information?",
                icon: "question",
                showCancelButton: true,
                confirmButtonText: "Yes, Save it!",
                cancelButtonText: "Cancel"
            }).then((result) => {
                if (result.isConfirmed) {
                    $.ajax({
                        url: 'updateEmployee.php', 
                        type: 'POST',
                        data: updatedData,
                        success: function(response) {
                            Swal.fire("Updated!", "Employee details updated successfully!", "success").then(() => {
                                location.reload();
                            });
                        },
                        error: function() {
                            Swal.fire("Error", "Failed to update employee details!", "error");
                        }
                    });
                }
            });
        });
    });

    

    // Handle Delete Employee Button Click
    $('.deleteEmployeeBtn').click(function() {
        let employeeId = $(this).attr('data-id');

        // SweetAlert confirmation for deletion
        Swal.fire({
            title: "Are you sure?",
            text: "This action cannot be undone!",
            icon: "warning",
            showCancelButton: true,
            confirmButtonText: "Yes, Delete it!",
            cancelButtonText: "Cancel"
        }).then((result) => {
            if (result.isConfirmed) {
                $.ajax({
                    url: 'deleteEmployee.php',
                    type: 'POST',
                    data: { id: employeeId },
                    success: function(response) {
                        Swal.fire("Deleted!", "Employee record deleted successfully!", "success").then(() => {
                            location.reload();
                        });
                    },
                    error: function() {
                        Swal.fire("Error", "Failed to delete employee!", "error");
                    }
                });
            }
        });
    });
});
