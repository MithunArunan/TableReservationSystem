<?php session_start(); ?>
<?php
	session_destroy();
	Header("Location: index.php");
?>