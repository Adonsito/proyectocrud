<?php
session_start();
session_destroy();
echo "<script> alert ('Se cerró su Sesión')
    location.href = '../../Login.php' </script>";
?>