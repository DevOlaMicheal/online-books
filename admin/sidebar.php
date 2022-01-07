<?php
if(isset($_SESSION['ADMIN_TYPE'])){
  if($_SESSION['ADMIN_TYPE'] == 'staff'){
    require('staff_sidebar.php');
  }elseif($_SESSION['ADMIN_TYPE'] == 'half_admin'){
    require('half_sidebar.php');
  }else{
    require('fulladmin_sidebar.php');
  }
}
?>