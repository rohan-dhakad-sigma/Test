<?php

$id = $_GET['id'];
// echo $id;

$conn = new mysqli("localhost","admin","admin","Final_Post");
// Check Connection
if ($conn->connect_error)
{
    die("Connection failed: " .$conn->connect_error);
}

echo "connected successfully";
echo "</br> </br>";

$sql = "DELETE FROM Post WHERE post_id=$id";

// Condition to check if record deleted successfully or not.
if($conn->query($sql) === TRUE)
{
    echo '<br>';
    echo "post Deleted Successfully";
    header('Location: List_Post.php');
}
else
{
    echo '<br>';
    echo "Error in deleting post: " .$conn->error;
}

?>