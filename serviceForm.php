<?php
require_once("./Config/connect-admin.php");

header("Cache-Control: no-store, no-cache, must-revalidate, max-age=0");
header("Cache-Control: post-check=0, pre-check=0", false);
header("Pragma: no-cache");
header("Expires: Sat, 26 Jul 1997 05:00:00 GMT");

$dbObj = new Database();
$categorySql = "SELECT category_name FROM `hiroes_categories` ";
$sqlMain = $dbObj->queryGet($categorySql);
$sqlData = $sqlMain['data'];

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
        /* body {
        display: flex;
        justify-content: center;
        align-items: center;
        height: 100vh;
        background-color: #f8f9fa;
    } */

        .form-container {
            background: white;
            padding: 24px;
            border-radius: 8px;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
        }

        /* .table_wrapper {
        max-height: 800px;
        overflow-y: auto;
        scrollbar-width: none;
        overflow-x: auto;
    } */
    </style>
</head>

<body>
    <div class="bg-light bg-gradient py-5">

        <!-- SERVICE TABLE AND FORM -->

        <section>
            <div class="container-xxl mb-4">

                <!-- FLEX BOX FOR SERVICE FORM AND SERVICE TABLE -->

                <div class="row justify-content-center">

                    <!-- SERVICE TABLE -->

                    <div class="col-md-8">
                        <div class="form-container h-100">
                            <h4 class="text-start pb-3">Service List</h4>
                            <div class="table_wrapper">
                                <table class="table table-striped table-hover table-bordered">
                                    <thead>
                                        <tr>
                                            <th scope="col" class="col-4">Name</th>
                                            <th scope="col" class="col-4 d-none d-lg-block w-100">Category</th>
                                            <th scope="col" class="col-2">Price</th>
                                            <th scope="col" class="col-2">Status</th>
                                            <!-- <th scope="col" class="col-2">Description</th> -->
                                            <!-- <th scope="col">Edit</th> -->
                                        </tr>
                                    </thead>
                                    <tbody id="servicebody">
                                        <!-- <tr>
                                            <th scope="row">AC Deep Cleaning<a href="#"
                                                    class="link-secondary px-2 text-decoration-none">📝</a></th>
                                            <td class="col-4 d-none d-lg-block w-100">Air Conditioner & Heating</td>
                                            <td>₹700</td>
                                            <td>Modified</td>
                                        </tr> -->
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

                    <!-- ADMIN  SERVICE FORM -->

                    <div class="col-md-4">
                        <div class="form-container">
                            <h4 class="text-start pb-3">Admin Service Form</h4>
                            <form id="serviceForm" method="post">
                                <div class="mb-3">
                                    <label for="category" class="form-label">Category</label>
                                    <select class="form-select" id="category" required>
                                        <option value="">Select Category</option>
                                        <?php
                                        foreach ($sqlData as $data) { ?>
                                            <option value="<?= $data['category_name'] ?>"><?= $data['category_name'] ?>
                                            </option>


                                        <?php } ?>
                                    </select>
                                </div>
                                <div class="mb-3">
                                    <label for="description" class="form-label">Category Description</label>
                                    <p id="description" class="text-md"></p>
                                </div>
                                <div class="mb-3">
                                    <label for="serviceName" class="form-label">Service Name</label>
                                    <input type="text" class="form-control" id="serviceName" required>
                                    <small id="servicenameCheckMessage" class="text-danger"></small>
                                </div>
                                <div class="mb-3">
                                    <label for="serviceDescription" class="form-label">Service Description</label>
                                    <input type="text" class="form-control" id="serviceDescription" required>
                                </div>
                                <!-- <div class="mb-3">
                                        <label for="serviceIcon" class="form-label">Service Icon Name</label>
                                        <input type="text" class="form-control" id="serviceIcon" required>
                                    </div> -->
                                <div class="mb-3">
                                    <label for="price" class="form-label">Service Price</label>
                                    <input type="number" class="form-control" id="price" required>
                                </div>
                                <button type="submit" class="btn btn-primary w-100" id="submitBtn"
                                    disabled>Submit</button>
                                <a class="btn btn-light w-100 mt-2"
                                    href="../hiroes_Website/Config/logout.php">Logout</a>
                            </form>
                        </div>
                    </div>
                </div>

                <!-- MODAL START -->

                <div class="modal fade" id="myModal" tabindex="-1" aria-labelledby="myModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-body">
                                <div class="">
                                    <div class="form-container">
                                        <h4 class="text-start pb-3">Edit Service Form</h4>
                                        <form id="serviceForm" method="post">
                                            <div class="mb-3">
                                                <label for="category" class="form-label">Category</label>
                                                <select class="form-select" id="edit_category" required>
                                                    <option value="">Select Category</option>
                                                    <?php
                                                    foreach ($sqlData as $data) { ?>
                                                        <option value="<?= $data['category_name'] ?>">
                                                            <?= $data['category_name'] ?>
                                                        </option>


                                                    <?php } ?>
                                                </select>
                                            </div>
                                            <div class="mb-3">
                                                <label for="serviceName" class="form-label">Service Name</label>
                                                <input type="text" class="form-control" id="edit_serviceName" required>
                                                <small id="nameCheckMessage" class="text-danger"></small>
                                            </div>
                                            <div class="mb-3">
                                                <label for="serviceDescription" class="form-label">Service
                                                    Description</label>
                                                <input type="text" class="form-control" id="edit_serviceDescription"
                                                    required>
                                            </div>
                                            <!-- <div class="mb-3">
                                        <label for="serviceIcon" class="form-label">Service Icon Name</label>
                                        <input type="text" class="form-control" id="serviceIcon" required>
                                    </div> -->
                                            <div class="mb-3">
                                                <label for="price" class="form-label">Service Price</label>
                                                <input type="number" class="form-control" id="edit_price" required>
                                            </div>
                                            <button type="submit" class="btn btn-primary w-100"
                                                id="edit_submitBtn">Update</button>
                                        </form>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>

                <!-- MODAL END -->

                <div class="modal fade" id="categoryEditModal" tabindex="-1" aria-labelledby="categoryEditModal"
                    aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <form>
                                    <!-- Hidden Input for Category ID -->
                                    <input type="hidden" id="categoryId">

                                    <!-- Category Name -->
                                    <div class="mb-3">
                                        <label for="categoryName" class="form-label fw-bold">Category Name</label>
                                        <input type="text" id="categoryName" class="form-control" readonly>
                                    </div>

                                    <!-- Category Description -->
                                    <div class="mb-3">
                                        <label for="category_description" class="form-label fw-bold">Category
                                            Description</label>
                                        <input type="text" id="category_description" class="form-control" readonly>
                                    </div>

                                    <!-- Visibility Options -->
                                    <label class="form-label fw-bold">Visibility</label>
                                    <div class="mb-3">
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="visibility" id="show"
                                                value="show">
                                            <label class="form-check-label" for="show">Show</label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="visibility" id="hide"
                                                value="hide">
                                            <label class="form-check-label" for="hide">Hide</label>
                                        </div>
                                    </div>

                                    <!-- Buttons -->
                                    <div class="">
                                        <button type="submit" class="btn btn-primary" id="saveChanges">Save
                                            Changes</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>

        </section>

        <!-- CATEGORIES -->

        <section class="container-xxl">
            <div class="form-container">
                <h4 class="text-start pb-3">Categories List</h4>
                <div class="table_wrapper">
                    <table class="table table-striped table-hover table-bordered">
                        <thead>
                            <tr>
                                <th scope="col" class="col-8">Name</th>
                                <th scope="col" class="col-2">Items</th>
                                <th scope="col" class="col-2">Visibility</th>
                                <!-- <th scope="col">Edit</th> -->
                            </tr>
                        </thead>
                        <tbody id="categorybody">
                            <tr>
                                <th scope="row">Electrical<a href="#"
                                        class="link-secondary px-2 text-decoration-none">📝</a></th>
                                <td>Number of Items</td>
                                <td>Website</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </section>

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

        // form.addEventListener('submit', function (event) {
        //     event.preventDefault();
        //     alert('Form submitted successfully!');
        // });
        // window.addEventListener("pageshow", function (event) {
        //     if (event.persisted) {
        //         location.reload();
        //     }
        // });
    </script>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        $(document).ready(function () {
            // alert("Called")
            function fillTable() {
                $.ajax({
                    type: 'GET',
                    dataType: 'json',
                    data: {
                        act: 'service_table',
                    },
                    url: 'apis/service-data.php',
                    beforeSend: function () {
                        $("#servicebody").html('')

                    },
                    success: function (response) {
                        if (response.status) {
                            let responseObj = response.data;
                            let servicebody = ""
                            $.each(responseObj, function (index, value) {

                                servicebody += `<tr>
                                                        <th scope="row">${value.service_name}<a href="#"
                                                                class="link-secondary px-2 text-decoration-none openModal" data-bs-toggle="modal" data-bs-target="#myModal" data-id=${value.service_id}>📝</a></th>
                                                                <td class="col-4 d-none d-lg-block w-100">${value.category_name}</td>
                                                                <td>${value.price}</td>
                                                                <td>${value.status}</td>
                                                    </tr>`;
                            })
                            $("#servicebody").append(servicebody)
                        }
                    }
                })
            }
            fillTable()


            $(document).on('click', "#submitBtn", function (e) {

                e.preventDefault();
                let serviceName = $("#serviceName").val();
                let serviceDescription = $("#serviceDescription").val();
                let price = $("#price").val();
                let categoryName = $("#category").val();
                // check confirmation
                Swal.fire({
                    icon: 'warning',
                    title: `Are you confirmed to add the Service Name (${serviceName})?`,
                    showCancelButton: true,
                    confirmButtonColor: '#198754',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Confirm',
                }).then((result) => {
                    if (result.isConfirmed) {
                        // send request to server
                        $.ajax({
                            type: 'POST',
                            dataType: 'json',
                            data: {
                                act: 'addService',
                                category_name: categoryName, // Sent category_name
                                service_description: serviceDescription, // Sent service_description
                                price: price, // Sent price
                                service_name: serviceName // Sent service_name
                            },
                            url: 'apis/service-data-insert.php',
                            success: function (response) {
                                // Handle the response
                                console.log(response);
                                let Toast = Swal.mixin({
                                    toast: true,
                                    position: 'top-end',
                                    showConfirmButton: false,
                                    timer: 1000
                                });
                                Toast.fire({
                                    icon: response.text,
                                    title: '&nbsp;' + response.msg
                                }).then(function () {
                                    fillTable(); // Refresh table data
                                });
                            }
                        });

                    }
                });

            })

            $("#serviceName").on("keyup", function () {
                var newServiceName = $(this).val().trim();

                $.ajax({
                    url: "apis/service-edit.php",
                    type: "GET",
                    data: {
                        act: "check_service_name",
                        service_name: newServiceName
                    },
                    dataType: "json",
                    success: function (response) {
                        if (response.exists) {
                            $("#servicenameCheckMessage").text("Service name already exists!")
                                .css("color", "red");
                            $("#submitBtn").prop("disabled", true)
                        } else {
                            $("#servicenameCheckMessage").text(
                                ""); // Clear warning if name is available
                            $("#submitBtn").prop("disabled", false)
                        }
                    },
                    error: function () {
                        console.error("AJAX error.");
                    }
                });
            });


            $('#category').change(function () {
                var categoryName = $(this).val();

                if (categoryName) {
                    $.ajax({
                        url: 'apis/service-description-data.php',
                        type: 'GET',
                        dataType: 'json',
                        data: {
                            act: 'description',
                            category_name: categoryName
                        },
                        success: function (response) {
                            if (response.status === true) {
                                let responseObj = response.data;
                                $('#description').text(responseObj[0].description);
                            } else {
                                $('#description').text('No description available.');
                            }
                        },
                        error: function () {
                            $('#description').text('Error fetching description.');
                        }
                    });
                } else {
                    $('#description').text('Please select a category.');
                }
            });

            var originalServiceName = "";
            var serviceId = ""

            $(document).on("click", ".openModal", function () {
                serviceId = $(this).data("id");
                if (serviceId) {

                    $.ajax({
                        url: "apis/service-edit.php",
                        type: "GET",
                        data: {
                            act: 'edit_service',
                            id: serviceId
                        },
                        dataType: "json",
                        success: function (response) {
                            if (response.status) {
                                $("#edit_category").val(response.data.category_name);
                                $("#edit_description").text(response.data.category_description);
                                $("#edit_serviceName").val(response.data.service_name);
                                originalServiceName = response.data.service_name;
                                $("#edit_serviceDescription").val(response.data
                                    .service_description);
                                $("#edit_price").val(response.data.price);

                                // $("#edit_submitBtn").prop("disabled", true);
                            } else {
                                alert("Error fetching data.");
                            }
                        },
                        error: function () {
                            // alert("AJAX error.");
                        }
                    });
                }
            });

            $(document).on('click', "#edit_submitBtn", function (e) {
                $("#myModal").modal('hide');
                e.preventDefault();
                let serviceName = $("#edit_serviceName").val();
                let serviceDescription = $("#edit_serviceDescription").val();
                let price = $("#edit_price").val();
                let categoryName = $("#edit_category").val();
                service_id = serviceId
                // check confirmation
                Swal.fire({
                    icon: 'warning',
                    title: `Are you confirmed to update the Service Name (${serviceName})?`,
                    showCancelButton: true,
                    confirmButtonColor: '#198754',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Confirm',
                }).then((result) => {
                    if (result.isConfirmed) {

                        // send request to server
                        $.ajax({
                            type: 'POST',
                            dataType: 'json',
                            data: {
                                act: 'updateService',
                                category_name: categoryName, // Sent category_name
                                service_description: serviceDescription, // Sent service_description
                                price: price, // Sent price
                                service_name: serviceName, // Sent service_name
                                service_id: service_id
                            },
                            url: 'apis/service-data-update.php',
                            success: function (response) {
                                let Toast = Swal.mixin({
                                    toast: true,
                                    position: 'top-end',
                                    showConfirmButton: false,
                                    timer: 1000
                                });
                                Toast.fire({
                                    icon: response.text,
                                    title: '&nbsp;' + response.msg
                                }).then(function () {
                                    fillTable(); // Refresh table data
                                });
                            }
                        });

                    }
                });

            })

            $("#edit_serviceName").on("keyup", function () {
                var newServiceName = $(this).val().trim();

                if (newServiceName === originalServiceName || newServiceName === "") {
                    $("#nameCheckMessage").text(""); // Clear warning if name is unchanged or empty
                    return;
                }

                $.ajax({
                    url: "apis/service-edit.php",
                    type: "GET",
                    data: {
                        act: "check_service_name",
                        service_name: newServiceName
                    },
                    dataType: "json",
                    success: function (response) {
                        if (response.exists) {
                            $("#nameCheckMessage").text("Service name already exists!").css(
                                "color", "red");
                            $("#edit_submitBtn").prop("disabled", true)
                        } else {
                            $("#nameCheckMessage").text(
                                ""); // Clear warning if name is available
                            $("#edit_submitBtn").prop("disabled", false)
                        }
                    },
                    error: function () {
                        console.error("AJAX error.");
                    }
                });
            });

            function categoryTable() {
                $.ajax({
                    type: 'GET',
                    dataType: 'json',
                    data: {
                        act: 'category_table',
                    },
                    url: 'apis/category-data.php',
                    beforeSend: function () {
                        $("#categorybody").html('')

                    },
                    success: function (response) {
                        if (response.status) {
                            let responseObj = response.data;
                            let categorybody = ""
                            $.each(responseObj, function (index, value) {

                                let visibility = value.visibility === "show" ? "Website Live" : "Not Live";

                                categorybody += `<tr>
                                                <th scope="row">${value.category_name}<a href="#"
                                                        class="link-secondary px-2 text-decoration-none openCategoryModal" data-bs-toggle="modal" data-bs-target="#categoryEditModal" data-categoryid=${value.category_id} >👁️</a></th>
                                                <td>${value.service_count}</td>
                                                <td>${visibility}</td>
                                            </tr>`;
                            })
                            $("#categorybody").append(categorybody)
                        }
                    }
                })
            }

            categoryTable()

            $(document).on("click", ".openCategoryModal", function () {
                let categoryId = $(this).data("categoryid");
                if (categoryId) {

                    $.ajax({
                        url: "apis/category-edit.php",
                        type: "GET",
                        data: {
                            act: 'edit_visibility',
                            id: categoryId
                        },
                        dataType: "json",
                        success: function (response) {
                            if (response.status) {
                                let responseObj = response.data;
                                $.each(responseObj, function (index, value) {

                                    $("#categoryName").val(value.category_name);
                                    $("#category_description").val(value.category_description);
                                    let currentVisibility = value.visibility;
                                    $("#categoryId").val(categoryId);
                                    if (currentVisibility === "show") {
                                        $("#show").prop("checked", true);
                                    } else {
                                        $("#hide").prop("checked", true);
                                    }
                                })

                                // $("#edit_submitBtn").prop("disabled", true);
                            } else {
                                alert("Error fetching data.");
                            }
                        },
                        error: function () {
                            // alert("AJAX error.");
                        }
                    });
                }


            });

            // Handle save button click
            $(document).on('click', "#saveChanges", function (e) {
                e.preventDefault();
                let categoryId = $("#categoryId").val();
                let newVisibility = $("input[name='visibility']:checked").val();
                $("#categoryEditModal").modal('hide');

                Swal.fire({
                    icon: 'warning',
                    title: `Are you sure you want to update the visibility?`,
                    showCancelButton: true,
                    confirmButtonColor: '#198754',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Confirm',
                }).then((result) => {
                    if (result.isConfirmed) {
                        // Send request to the server
                        $.ajax({
                            type: "POST",
                            url: "apis/category-update.php",
                            data: {
                                act: "updateVisibility",
                                categoryId: categoryId,
                                visibility: newVisibility
                            },
                            dataType: "json",
                            success: function (response) {
                                let Toast = Swal.mixin({
                                    toast: true,
                                    position: 'top-end',
                                    showConfirmButton: false,
                                    timer: 1000
                                });

                                if (response.status == "success") {
                                    Toast.fire({
                                        icon: response.text,
                                        title: '&nbsp;' + response.msg
                                    }).then(() => {
                                        categoryTable()// Refresh the page to see changes
                                    });
                                } else {
                                    Swal.fire({
                                        icon: response.text,
                                        title: '&nbsp;' + response.msg
                                    });
                                }
                            }
                        });
                    }
                });

            });
        })
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>