<?php
include("../db/dbconnect.php");

include("../include/url_users.php");

session_start();
session_destroy();

/* Redirect to current page */
header('Location: ' . $_SERVER['HTTP_REFERER']);

?>
