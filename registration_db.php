<?php

$first_name = $_POST['first_name'];
$last_name = $_POST['last_name'];
$email = $_POST['email'];
$password = $_POST['password'];

// echo ("$first_name "." "."$last_name "." "."$email "." "."$password");

//Create Connection
$conn = new mysqli("localhost","admin","admin","Final_Post");

// Check Connection
if ($conn->connect_error)
{
    die("Connection failed: " .$conn->connect_error);
}

echo "connected successfully";
echo "</br> </br>";

$sql = "INSERT INTO Users (first_name,last_name,email,password) 
VALUES ('$first_name','$last_name','$email','$password');"; 

// Condition to check if record inserted successfully or not.
if($conn->query($sql) === TRUE)
{
    echo '<br>';
    echo "Registration Successfully";
    header('Location: List_Post.php');
}
else
{
    echo '<br>';
    echo "Error in inserting record: " .$conn->error;
}
 
?>