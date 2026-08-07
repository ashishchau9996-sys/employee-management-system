<?php include("../config/db.php"); ?>
<!DOCTYPE html>
<html>
<head>
    <title>Add Emoloyee</title>
    <link rel="stylesheet" href="../assets/css/style.css">
</head>
<body>

<h2>Add Employee</h2>

<form method="post" enctype="multipart/form-data">
    Name:<br>
    <input type="text" name="name"><br><br>

    Email:<br>
    <input type="email" name="email"><br><br>

    Salary:<br>
    <input type="number" name="salary"><br><br>

    photo:<br>
    <input type="file" name="photo"><br><br>

    <button type="sumit" name="save">Save</
button>
<?php

if(isset($_POST['save']))
{
    $name = $_POST['name'];
    $email = $_POST['email'];
    $salary = $_POST['salary'];
    $photo = $_FILES['photo']['name'];
    $temp = $_FILES['photo']['tmp_name'];

    move_uploaded_file($temp, "../uploads/" . $photo);

    $query = "INSERT INTO employees(name,email,salary,photo)
              VALUES('$name','$email','$salary','$photo')";

    if(mysqli_query($conn,$query))
    {
        header("location:employee_list.php");
        exit();
    }
    else
    {
        echo "Error";
    }
}

?>
</form>

</body>
</html>