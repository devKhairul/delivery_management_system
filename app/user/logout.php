<?php
session_start();
include_once('objects/User.php');

$user = new User($db);

if ($user->logout())
{
	header('location:../../');
}

?>
