<?php

$post_name = $_POST['post_name'];
$post_description = $_POST['post_description'];

// echo ("$post_name"." "."$post_description");

//Create Connection
$conn = new mysqli("localhost","admin","admin","Final_Post");

// Check Connection
if ($conn->connect_error)
{
    die("Connection failed: " .$conn->connect_error);
}

echo "connected successfully";
echo "</br> </br>";

$sql = "INSERT INTO Post (post_name,post_description) 
VALUES ('$post_name','$post_description');";

// Condition to check if record inserted successfully or not.
if($conn->query($sql) === TRUE)
{
    echo '<br>';
    echo "Record inserted Successfully";
    header('Location: List_Post.php');
}
else
{
    echo '<br>';
    echo "Error in inserting record: " .$conn->error;
}

?>