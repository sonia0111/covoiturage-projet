<?php
require_once('db.php');
unset($_SESSION['users']);
session_destroy();
header('Location:./home.php');
?>