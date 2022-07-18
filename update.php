<?php

$id = $_POST['id'];
$post_name = $_POST['post_name'];
$post_description = $_POST['post_description'];

$conn = new mysqli("localhost","admin","admin","Final_Post");

// Check Connection
if ($conn->connect_error)
{
    die("Connection failed: " .$conn->connect_error);
}

echo "connected successfully";
echo "</br> </br>";

$sql="UPDATE Post SET post_name='$post_name',post_description='$post_description' WHERE post_id=$id ";

// Condition to check if record inserted successfully or not.
if($conn->query($sql) === TRUE)
{
    echo '<br>';
    echo "post Updated Successfully";
    header('Location: List_Post.php');
    
}
else
{
    echo '<br>';
    echo "Error in updating post: " .$conn->error;
}
?>