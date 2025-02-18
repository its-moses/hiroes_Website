<?php
require_once("./Config/connect-admin.php");

// Prevent browser caching (Important for Back button behavior)
header("Cache-Control: no-store, no-cache, must-revalidate, max-age=0");
header("Cache-Control: post-check=0, pre-check=0", false);
header("Pragma: no-cache");
header("Expires: Sat, 26 Jul 1997 05:00:00 GMT"); // Expire page immediately

// Redirect if user is not logged in
if (!isset($_SESSION["admin_logged_in"]) || $_SESSION["admin_logged_in"] != true) {
    header("Location: adminLoginForm.php");
    exit();
}
?>



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hiroes - Admin Service Form</title>
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
    <div class="container-xxl">
        <div class="row justify-content-center">
            <div class="col-md-8">
                    <div class="form-container h-100">
                        <h4 class="text-start pb-3">Service List</h4>
                        <table class="table table-striped table-hover table-bordered">
                            <thead>
                                <tr>
                                    <th scope="col" class="col-4">Name</th>
                                    <th scope="col" class="col-4 d-none d-lg-block w-100">Category</th>
                                    <th scope="col" class="col-2">Price</th>
                                    <th scope="col" class="col-2">Status</th>
                                    <!-- <th scope="col">Edit</th> -->
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <th scope="row">AC Deep Cleaning<a href="#" class="link-secondary px-2 text-decoration-none">📝</a></th>
                                    <td class="col-4 d-none d-lg-block w-100">Air Conditioner & Heating</td>
                                    <td>₹700</td>
                                    <td>Modified</td>
                                    <!-- <td><button class="btn btn-outline-primary btn-sm">Edit</button></td> -->
                                </tr>
                            </tbody>
                        </table>
                    </div>
            </div>
            <div class="col-md-4">
                    <div class="form-container">
                        <h4 class="text-start pb-3">Admin Service Form</h4>
                        <form id="serviceForm">
                            <div class="mb-3">
                                <label for="category" class="form-label">Category</label>
                                <select class="form-select" id="category" required>
                                    <option value="">Select Category</option>
                                    <option value="Plumbing">Air Conditioner and Heating</option>
                                    <option value="Electrical">Vehicle Maintenance</option>
                                    <option value="Carpentry">General Repair and Services</option>
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="description" class="form-label">Category Description</label>
                                <p id="description" class="fs-5 text">Just read only content</p>
                            </div>
                            <div class="mb-3">
                                <label for="serviceName" class="form-label">Service Name</label>
                                <input type="text" class="form-control" id="serviceName" required>
                            </div>
                            <!-- <div class="mb-3">
                                <label for="serviceIcon" class="form-label">Service Icon Name</label>
                                <input type="text" class="form-control" id="serviceIcon" required>
                            </div> -->
                            <div class="mb-3">
                                <label for="price" class="form-label">Service Price</label>
                                <input type="number" class="form-control" id="price" required>
                            </div>
                            <button type="submit" class="btn btn-primary w-100" id="submitBtn" disabled>Submit</button>
                            <a class="btn btn-light w-100 mt-2" href="../hiroes_Website/Config/logout.php">Logout</a>
                        </form>
                    </div>
            </div>
        </div>
    </div>
    <script>
        const form = document.getElementById('serviceForm');
        const submitBtn = document.getElementById('submitBtn');
        const inputs = form.querySelectorAll('input, select, textarea');

        function checkInputs() {
            let allFilled = true;
            inputs.forEach(input => {
                if (!input.value.trim()) {
                    allFilled = false;
                }
            });
            submitBtn.disabled = !allFilled;
        }

        inputs.forEach(input => {
            input.addEventListener('input', checkInputs);
        });

        form.addEventListener('submit', function (event) {
            event.preventDefault();
            alert('Form submitted successfully!');
        });
        window.addEventListener("pageshow", function (event) {
            if (event.persisted) {
                location.reload();
            }
        });
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>