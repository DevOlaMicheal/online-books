<?php
session_start();
require('function.php');

unset($_SESSION['ADMIN_LOGIN']);
unset($_SESSION['ADMIN_USER_NAME']);
unset($_SESSION['ADMIN_USER_ID']);
redirect('login.php');
?>