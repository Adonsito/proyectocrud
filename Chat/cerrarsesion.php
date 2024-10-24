<?php

session_start();
session_unset();
session_destroy();

    echo "<script> alert ('Se cerró su Sesión')
    location.href = '../index.php' </script>";

?>