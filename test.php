<?php

require 'database.php';

$res=mysqli_query($con,"select * from upload where department='SLT'");

$c = mysqli_num_rows($res);

if($c == 0){
    echo 'No book Available';
}else{
    echo 'voila';
}

?>