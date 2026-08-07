<?php

include("../config/db.php");

$id = $_GET['id'];

$query = "DELETE FROM employees WHERE id='$id'";

if(mysqli_query($conn, $query))
{
    header("Location: employee_list.php");
}
else
{
    echo "Error";
}

?>