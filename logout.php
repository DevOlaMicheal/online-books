<?php
session_start();
require('function.php');

unset($_SESSION['STUDENT_LOGIN']);
unset($_SESSION['STUDENT_USER_NAME']);
unset($_SESSION['STUDENT_USER_ID']);
unset($_SESSION['MAT_NO']);
redirect
('index.php');
?>