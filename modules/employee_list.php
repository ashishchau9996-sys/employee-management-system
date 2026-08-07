<?php
include("../config/db.php");
?>
<!DOCTYPE html>
<html>
<head>
    <title>Employee List</title>
    <link rel="stylesheet" href="../assets/css/style.css">
</head>
<body>

<h2>Employee List</h2>
<form method="GET">

<input type="text" name="search" placeholder="Search by Name">

<button type="submit">Search</button>

</form>

<br>
<table border="1" cellpadding="10">

<tr>
    <th>ID</th>
    <th>Name</th>
    <th>Email</th>
    <th>Salary</th>
    <th>photo</th>
    <th>Edit</th>
    <th>delete</th>
</tr>
<?php

if(isset($_GET['search']))
{
    $search = $_GET['search'];

    $query = "SELECT * FROM employees WHERE name LIKE '%$search%'";
}
else
{
    $query = "SELECT * FROM employees";
}

$result = mysqli_query($conn, $query);

while($row = mysqli_fetch_assoc($result))
{
?>

<tr>
    <td><?php echo $row['id']; ?></td>
    <td><?php echo $row['name']; ?></td>
    <td><?php echo $row['email']; ?></td>
    <td><?php echo $row['salary']; ?></td>
    <td>
<?php
if($row['photo'] != "")
{
?>
<img src="../uploads/<?php echo $row['photo']; ?>" width="70" height="70">
<?php
}
else
{
    echo "No Image";
}
?>
</td>
    <td>
    <a href="edit_employee.php?id=<?php echo $row['id']; ?>">
    <button>Edit</button>
</a>
    </td>
    <td>
    <a href="delete_employee.php?id=<?php echo $row['id']; ?>"
onclick="return confirm('Are you sure you want to delete this employee?');">
    <button>Delete</button>
</a>
    </td>
</tr>

<?php
}
?>

</table>
</body>
</html>