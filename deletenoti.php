<?php
session_start();
require 'database.php';
require 'function.php';

$id=$_POST['id'];

if(mysqli_query($con,"delete from notification where id='$id'")){
    echo"complete";
}

?>