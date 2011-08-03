<?php
/*

*	File:		createDBalphacrm.php
*	By:			Manolo
*	Date:		2011-07-10
*
*	This script creates the database alphacrm
*
*
*=====================================
*/


{ // Connect and Test MySQL and specific DB (return $dbSuccess = T/F)
				
			$hostname = "localhost";
			$username = "root";
			$password = "";
			

			$dbConnected = @mysql_connect($hostname, $username, $password);
			
			$dbSuccess = true;
			if ($dbConnected) {		
			} else {
				echo "MySQL connection FAILED<br /><br />";
				$dbSuccess = false;
			}
}  

//	 Execute code ONLY if connections were successful 	
if ($dbSuccess) {
	
	$dbName = "alphacrm";
	$create_SQL = "Create DATABASE ".$dbName;
	
	if (mysql_query($create_SQL))  {	
		echo "'Create DATABASE ".$dbName."' -  Successful.";
	} else {
		echo "'Create DATABASE ".$dbName."' - Failed.";
	}		
			
}




?>