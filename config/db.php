<?php

$conn =
mysqli_connect("localhost",
"root", "",
"employee_management");

if (!$conn) {
    die("connection failed: " .
mysqli_connect_error());    
}

?>