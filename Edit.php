<?php

$id = $_GET['id'];
//echo $id;

//Create Connection
$conn = new mysqli("localhost","admin","admin","Final_Post");

// Check Connection
if ($conn->connect_error)
{
    die("Connection failed: " .$conn->connect_error);
}

echo "</br> </br>";

$sql = "SELECT * FROM Post WHERE post_id=$id";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) { ?>

    <form id="form4"  action="update.php" method="post">
    <h1>Editing Post</h1><br><br>

    <input class="id" name="id" value="<?php echo $row['post_id'] ?>"> <br><br>

    <label for="post_name"><b>Post Name:</b></label> <br>
    <input value="<?php echo $row['post_name'] ?>" name="post_name"><br><br>

    <label for="post_description"> <b>Post Description:</b></label> <br>
    <textarea name="post_description" cols="70" rows="20"><?php echo $row['post_description'] ?></textarea><br><br>

   

<?php

        }   
    }
?>

    <button >Update</button>
</form>

<style>
    #form4 {
        background-color:lightgreen;
        width:740px;
        height:610px;
        margin-left:250px;
    }

    #form4 .id{
        display:none;
    }

    #form4 h1,label {
        padding-left:288px;
    }

    #form4 h1 {
        padding-top:10px;
    }

    #form4 input {
        margin-left:223px;
        padding: 15px;
        border-radius: 15px;
    }

    #form4 textarea {
        margin-left: 80px;
        margin-top:10px;
        border-radius:10px;
    }

    #form4 button {
        margin-left:310px;
        padding:5px;
    }
</style>
    


<!-- <!DOCTYPE html>
<html lang="en">

    <body>
        <h2>Editing Post</h2><br><br>

        <label for="post_name"><b>Post Name:</b></label> <br>
        <input type="text" id="post_name" value="" name="post_name"><br><br>

        <label for="post_description"> <b>Post Description:</b></label> <br>
        <textarea name="post_description" id="description" cols="70" rows="20"></textarea><br><br>

        <button type="submit" id="submit" name="button">Add Post</button>
    
    </body>

</html> -->



