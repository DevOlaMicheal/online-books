<?php

$con = mysqli_connect("localhost", "root", "", "elib");
define('SERVER_PATH',$_SERVER['DOCUMENT_ROOT'].'/online-books/');
define('SITE_PATH','http://localhost/online-books/');

define('IMAGE_SERVER_PATH',SERVER_PATH.'media/');
define('IMAGE_SITE_PATH',SITE_PATH.'media/');


define('FILE_SERVER_PATH',SERVER_PATH.'books/');
define('FILE_SITE_PATH',SITE_PATH.'books/');

?>