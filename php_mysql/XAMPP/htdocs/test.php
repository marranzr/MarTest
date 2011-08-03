<?php
/*

*	File:			test.php
*	By:			TMIT
*	Date:		2011-07-14
*
*	This script 
*	
*
*=====================================
*/

{ 		//	Secure Connection Script
		include('../htconfig/dbConfig.php'); 
		$dbSuccess = false;
		$dbConnected = mysql_connect($db['hostname'],$db['username'],$db['password']);
		
		if ($dbConnected) {		
			$dbSelected = mysql_select_db($db['database'],$dbConnected);
			if ($dbSelected) {
				$dbSuccess = true;
			} 	
		}
		//	END	Secure Connection Script
}

if ($dbSuccess) {
	
	echo "SUCCESS";
	
}

?>