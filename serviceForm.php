<?php
session_start();  // ✅ Start session

// Redirect if user is not logged in
if (!isset($_SESSION["adminEmail"])) {
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
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="form-container">
                    <h4 class="text-start">Admin Service Form</h4>
                    <form id="serviceForm">
                        <div class="mb-3">
                            <label for="serviceId" class="form-label">Service ID</label>
                            <input type="number" class="form-control" id="serviceId" required>
                        </div>
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
                            <textarea class="form-control" id="description" rows="3" required></textarea>
                        </div>
                        <div class="mb-3">
                            <label for="serviceName" class="form-label">Service Name</label>
                            <input type="text" class="form-control" id="serviceName" required>
                        </div>
                        <div class="mb-3">
                            <label for="serviceIcon" class="form-label">Service Icon Name</label>
                            <input type="text" class="form-control" id="serviceIcon" required>
                        </div>
                        <div class="mb-3">
                            <label for="price" class="form-label">Service Price</label>
                            <input type="text" class="form-control" id="price" required>
                        </div>
                        <button type="submit" class="btn btn-primary w-100" id="submitBtn" disabled>Submit</button>
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
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>