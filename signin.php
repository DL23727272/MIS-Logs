<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Admin</title>
    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
      rel="stylesheet"
    />
    <link
      href="https://fonts.googleapis.com/css2?family=Cinzel:wght@400;700&display=swap"
      rel="stylesheet"
    />
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css"
      integrity="sha512-Evv84Mr4kqVGRNSgIGL/F/aIDqQb7xQ2vcrdIwxfjThSH8CSR7PBEakCr51Ck+w+/U6swU2Im1vVX0SVk9ABhg=="
      crossorigin="anonymous"
      referrerpolicy="no-referrer"
    />
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <!-- Add jQuery before your script -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/alertify.js/1.13.1/alertify.min.js"></script>
    

    <link href="styles.css" rel="stylesheet" />
    <link rel="icon" type="image/x-icon" href="img/logo.ico" />
  </head>
  <body>
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


    <div class="container p-4 bg-white rounded shadow my-5" style="max-width: 400px;">
        <div class="d-flex gap-2 align-items-center mb-3">
            <img src="img/ispsc.png" width="50" height="50"/>
            <h2 style="color: #800000">Create Account</h2>
        </div>
        <form enctype="multipart/form-data"  method="POST">
        
            <div class="mb-3">
                <input type="text" id="signupUsername" class="form-control" name="signupUsername" placeholder="Username" required>
            </div>
            <div class="mb-3 input-group">
                <input type="password" id="signupPassword" class="form-control" name="signupPassword" placeholder="Password" required>
                <button class="btn btn-outline-dark" type="button" id="togglePassword">
                        <i class="fa fa-eye-slash" id="eyeIcon" aria-hidden="true"></i>
                </button>
            </div>
            <div class="mb-3 input-group">
                <input type="password" id="confirmPassword" class="form-control" name="confirmPassword" placeholder="Confirm password" required>
               
            </div>
            <button type="button" class="btn w-100 text-white" style="background: #800000" onclick="Signup()">Register</button>
            You have already an account?
            <a href="index.php">
             Login
            </a>
        </form>
    </div>

    <?php include 'footer.php'?>
    <script>
       // --------------- FOR PASSWORD TOGGLE --------------
      
       document.addEventListener('DOMContentLoaded', function () {
          const togglePassword = document.getElementById('togglePassword');
          const passwordInput = document.getElementById('signupPassword');
          const confirmPassword = document.getElementById('confirmPassword');
          const eyeIcon = document.getElementById('eyeIcon');
        
          togglePassword.addEventListener('click', function () {
            // Toggle the type attribute
            const type = passwordInput.type && confirmPassword.type === 'password' ? 'text' : 'password';
            passwordInput.type = type;
            confirmPassword.type = type;
        
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


      function Signup() {
    var username = $("#signupUsername").val().trim();
    var password = $("#signupPassword").val().trim();
    var confirmPassword = $("#confirmPassword").val().trim();

    if (username === "" || password === "" || confirmPassword === "") {
        Swal.fire("Missing Fields", "Please fill in all fields.", "warning");
        return;
    }

    if (password !== confirmPassword) {
        Swal.fire("Passwords Do Not Match", "Please confirm your password correctly.", "error");
        return;
    }

    $.ajax({
        type: "POST",
        url: "signupProcess.php",
        data: {
            signupUsername: username, // ✅ Matches PHP $_POST['signupUsername']
            signupPassword: password  // ✅ Matches PHP $_POST['signupPassword']
        },
        dataType: "json",
        success: function(response) {
            Swal.fire(response.message, "", response.status === "success" ? "success" : "error");
            if (response.status === "success") {
                setTimeout(() => { window.location.href = "index.php"; }, 2000);
            }
        },
        error: function(xhr) {
            console.error("AJAX Error:", xhr.responseText);
            Swal.fire("Error", "Something went wrong. Please try again.", "error");
        }
    });
}


           

    </script>

</body>
</html>