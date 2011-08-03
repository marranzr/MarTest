<?php
/*

*	File:		dropDBalphacrm.php
*	By:			Manolo
*	Date:		2011-07-10
*
*	This script drops the database alphacrm
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
			}
			else {
				echo "MySQL connection FAILED<br /><br />";
				$dbSuccess = false;
			}
}  

//	 Execute code ONLY if connections were successful 	
if ($dbSuccess) {
	$dbName = "alphacrm";
	$drop_SQL = "DROP DATABASE ".$dbName;
	
	if (mysql_query($drop_SQL))  {	
		echo "'DROP DATABASE ".$dbName."' -  Successful.";
	} else {
		echo "'DROP DATABASE ".$dbName."' - Failed.";
	}		
			
}








?>