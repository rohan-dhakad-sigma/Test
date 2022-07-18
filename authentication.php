<?php

$userName = $_POST['username'];
$password = $_POST['password'];

// echo ("$userName"." "."$password");

//Create Connection
$conn = new mysqli("localhost","admin","admin","Final_Post");

// Check Connection
if ($conn->connect_error)
{
    die("Connection failed: " .$conn->connect_error);
}

echo "connected successfully";
echo "</br> </br>";

$sql = "SELECT id FROM Users WHERE email='$userName' AND password='$password' ";
$result = $conn->query($sql);

if($result->num_rows == 1)
{
    header('Location: Add_Post.html');
}
else
{
    echo ("Username & passwords are incorrect");
}