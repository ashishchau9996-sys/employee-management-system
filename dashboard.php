<?php
include("config/db.php");

$count = mysqli_fetch_assoc(mysqli_query($conn, "SELECT COUNT(*) AS total FROM employees"));
session_start();

if(!isset($_SESSION['admin']))
{
    header("Location: index.php");
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Dashboard</title>
    <link rel="stylesheet" href="assets/css/style.css">
</head>
<body>

<h2>Employee Management System</h2>
<h3>Welcome Admin</h3>
<h3>Total Employees: <?php echo $count['total']; ?></h3>

<br>

<a href="modules/add_employee.php">
    <button>Add Employee</button>
</a>

<br><br>

<a href="modules/employee_list.php">
    <button>Employee List</button>
</a>

<br><br>

<a href="logout.php">
    <button>Logout</button>
</a>

</body>
</html>