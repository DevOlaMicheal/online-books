<?php
require 'database.php';
require 'function.php';

$query=$_POST['query'];

$res=mysqli_query($con,"select * from upload where title like '%$query%'");

if(mysqli_num_rows($res)>0){
    while($row=mysqli_fetch_assoc($res)){
        $title=$row['title'];
        $id=$row['id'];
        echo '<a href="details.php?id='.$id.'" class="list-group-item">'.$title.'</a>';
    }
}else {
    echo '<li class="list-group-item">No Result Found</li>';
}




?>