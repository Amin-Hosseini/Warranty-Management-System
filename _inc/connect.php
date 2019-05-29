<?php
try
	{
	$conn = new PDO(DSN,USERNAME,PASSWORD);
	$conn -> exec('SET NAMES utf8');
	return $conn;
	}
catch(PDOException $error)
	{
	echo "Error In Connect!";
	exit();
	}
?>