<?php
session_start();
require_once("../hiroes_Website/Config/Database.php");
require_once("../hiroes_Website/Config/adminLoginLogic.php");
require_once("../hiroes_Website/Config/justSomeFunction.php");

if (isset($_SESSION["admin_logged_in"]) && $_SESSION["admin_logged_in"] === true) {
    header("Location: serviceForm.php");
    exit();
}


if (isset($_POST["signInBtnSbmt"])) {
    $loginObj = loginUser($_POST);

    if ($loginObj["status"] == "success") {
        $_SESSION["admin_logged_in"] = true;
        $_SESSION["admin_username"] = $_POST["username"];

        swalToast($loginObj["status"], $loginObj["message"], "serviceForm.php" );
    } else {
        swalToast($loginObj["status"], $loginObj["message"] );
    }
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hiroes - Admin Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            background-color: #f8f9fa;
        }

        .form-container {
            background: white;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="form-container">
                    <h4 class="text-start mb-3">Admin Login</h4>
                    <form id="loginForm" method="post">
                        <div class="mb-3">
                            <label for="username" class="form-label">Username</label>
                            <input type="text" class="form-control" id="username" required>
                        </div>
                        <div class="mb-3">
                            <label for="password" class="form-label">Password</label>
                            <input type="password" class="form-control" id="password" required>
                        </div>
                        <button type="submit" name="signInBtnSbmt" class="btn btn-primary w-100" id="loginBtn"
                            disabled>Login</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <script>
        const form = document.getElementById('loginForm');
        const loginBtn = document.getElementById('loginBtn');
        const inputs = form.querySelectorAll('input');

        function checkInputs() {
            let allFilled = true;
            inputs.forEach(input => {
                if (!input.value.trim()) {
                    allFilled = false;
                }
            });
            loginBtn.disabled = !allFilled;
        }

        inputs.forEach(input => {
            input.addEventListener('input', checkInputs);
        });

        form.addEventListener('submit', function (event) {
            event.preventDefault();
            alert('Login successful!');
        });
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</body>

</html>