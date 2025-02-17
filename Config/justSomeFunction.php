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

    <script>

        window.onload = function () {
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
            }).then(() => {
                // Redirect only if the icon is "success"
                <?php if ($icon === "success" && !empty($redirectUrl)) { ?>
                    window.location.href = "<?= $redirectUrl ?>";
                <?php } ?>
            });
        };
    </script>
    <?php
}

