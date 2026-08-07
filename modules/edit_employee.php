<?php
include("../config/db.php");

$id = $_GET['id'];

$query = "SELECT * FROM employees WHERE id='$id'";
$result = mysqli_query($conn, $query);

$row = mysqli_fetch_assoc($result);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Edit Employee</title>
    <link rel="stylesheet" href="../assets/css/style.css">
</head>
<body>

<h2>Edit Employee</h2>

<form method="post" enctype="multipart/form-data">
    Name:<br>
    <input type="text" name="name" value="<?php echo $row['name']; ?>"><br><br>

    Email:<br>
    <input type="email" name="email" value="<?php echo $row['email']; ?>"><br><br>

    Salary:<br>
    <input type="number" name="salary" value="<?php echo $row['salary']; ?>"><br><br>

    Photo:<br>
    <input type="file" name="photo"><br><br>

    Current Photo:<br>
    <?php
    if($row['photo'] != "")
    {
    ?>
        <img src="../uploads/<?php echo $row['photo']; ?>" width="80" height="80">
    <?php
    }
    else
    {
        echo "No Image";
    }
    ?>

    <br><br>
    <button type="submit" name="update">Update</button>
</form>

</body>
<?php

if(isset($_POST['update']))
{
    $name = $_POST['name'];
    $email = $_POST['email'];
    $salary = $_POST['salary'];
    if(isset($_FILES['photo']) && $_FILES['photo']['name'] != "")
{
    $photo = $_FILES['photo']['name'];
    $temp = $_FILES['photo']['tmp_name'];

    move_uploaded_file($temp, "../uploads/".$photo);
}
else
{
    $photo = $row['photo'];
}

    $query = "UPDATE employees
              SET name='$name', email='$email', salary='$salary',photo='$photo'
              WHERE id='$id'";

    if(mysqli_query($conn,$query))
    {
        echo "Updated Successfully";
    }
    else
    {
        echo "Error";
    }
}

?>
</html>