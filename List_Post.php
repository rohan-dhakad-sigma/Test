<?php

//Create Connection
$conn = new mysqli("localhost","admin","admin","Final_Post");

// Check Connection
if ($conn->connect_error)
{
    die("Connection failed: " .$conn->connect_error);
}

// echo "connected successfully";
echo "</br> </br>";

$sql = "SELECT * FROM Post";
$result = $conn->query($sql); ?>

    <div class="new_btn">   
        <button class="new" onclick="add()">Add Blog</button>
    </div>

<?php
     if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) { 
?>
        
    <div class="list">
        <h1><?php echo $row['post_name'] ?></h1>
        <p><span> <?php echo $row['post_description'] ?> </span></p>
    </div>
    <br><br>

    <div class="button">
    <button class="edit" onclick="handle_edit(<?php echo $row['post_id']; ?>)">Edit</button>
    <button class="delete" onclick="handle_delete(<?php echo $row['post_id']; ?>)">Delete</button>  <br><br>
    </div>

<?php

    }
}
?>

<br><br> 


<script type="text/javascript">

    function handle_edit(id) {
        window.location.href = `Edit.php?id=${id}`;
    }

    function handle_delete(id) {
        window.location.href = `delete.php?id=${id}`;
    }

    function add() {
        window.location.href = 'Add_Post.html';
    }

</script>

<style>
    .list {
        background-color:orange;
        width:740px;
        height:300px;
        margin-left:250px;
        border-radius: 25px;
        box-shadow: 10px 10px;
    }

    .list h1{
        padding-left: 250px;
        padding-top:30px;
    }

    .list p{
        padding:20px;

    }

    .button {
        margin-left:543px;
    }

    .button .delete {
        margin-left: 20px;
    }

    .new_btn {
        background-color:Lightgreen;
        height:100px;
        position:fixed;
        border-radius: 25px;
        box-shadow: 10px 10px;
    }

    .new_btn button {
        padding:15px;
        margin:20px;
    }

    body{
        background-color: antiquewhite;
    }


</style>

