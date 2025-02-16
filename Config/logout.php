<?php
session_start();
session_destroy();
header("Location: /hiroes_Website/serviceForm.php");  // ✅ Redirect to login page
exit();
?>