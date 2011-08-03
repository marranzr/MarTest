<?php
	
/*
*	File:		arrayAssociative.php
*	By:			TMIT
*	Date:		20100601
*
*	This script demonstrates an Associative Array
*=====================================
*/	
	
$dbConnection = array(
	'hostname' => 'localhost',
	'username' => 'root',
	'password' => '',
	'database' => 'alphacrm'
); 

echo "The hostname for our dbConnection is: ".$dbConnection['hostname'];
echo "<br /><br />";

echo "The database we connect to: ".$dbConnection['database'];
echo "<br /><br />";


?>