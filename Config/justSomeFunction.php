<?php


function console($data = null)
{
    if ($data != null) {
        echo "<pre>";
        print_r($data);
        echo "</pre>";
    }
}

function swalToast($icon, $message, $redirectUrl = null)
{
    ?>
    <!-- Ensure jQuery & SweetAlert2 are loaded -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <script>
        console.log("Swal Toast Triggered:", "<?= $icon ?>", "<?= $message ?>", "<?= $redirectUrl ?>");

        window.onload = function () {
            // Check if SweetAlert2 is loaded
            if (typeof Swal === 'undefined') {
                console.error("SweetAlert2 is not loaded.");
                return;
            }

            let Toast = Swal.mixin({
                toast: true,
                position: 'top-end',
                showConfirmButton: false,
                timer: 1000
            });

            Toast.fire({
                icon: "<?= $icon ?>",
                title: "&nbsp;<?= $message ?>"
            });

            // Redirect based on success or failure condition
            setTimeout(function () {
                <?php if (!empty($redirectUrl)) { ?>
                    window.location.href = "<?= $redirectUrl ?>";
                <?php } else { ?>
                    window.location.href = "<?= $_SERVER['REQUEST_URI'] ?>";
                <?php } ?>
            }, 3000);
        };
    </script>
    <?php
}

