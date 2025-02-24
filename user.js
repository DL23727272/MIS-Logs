$(document).ready(function () {

    
    // Function to load offices into a select element
    function loadOffices(selectElement, selectedOffice = '') {
        $.ajax({
            url: './fetchOffices.php',
            type: 'GET',
            success: function (response) {
                let options = '<option value="">Select Office</option>';
                JSON.parse(response).forEach(office => {
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

});