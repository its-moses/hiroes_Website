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
        $(document).ready(function () {
            let Toast = Swal.mixin({
                toast: true,
                position: 'top-end',
                showConfirmButton: false,
                timer: 3000
            });

            Toast.fire({
                icon: "<?= $icon ?>",
                title: "&nbsp;<?= $message ?>"
            });

            setTimeout(function () {
                <?php if (!empty($redirectUrl)) { ?>
                    window.location.href = "<?= $redirectUrl ?>";
                <?php } ?>
            }, 3000);
        });
    </script>
    <?php
}
