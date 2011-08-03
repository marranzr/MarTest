<?php
/*

*	File:			twoPageModelForm.php
*	By:			TMIT
*	Date:		2010-06-01
*
*	This script defines an HTML form using php 
*	to allow data to be sent to twoPageModelOutput.php
*
*
*=====================================
*/

{ 		//	Secure Connection Script
		include('../../htconfig/dbConfig.php'); 
		$dbSuccess = false;
		$dbConnected = mysql_connect($db['hostname'],$db['username'],$db['password']);
		
		if ($dbConnected) {		
			$dbSelected = mysql_select_db($db['database'],$dbConnected);
			if ($dbSelected) {
				$dbSuccess = true;
			} else {
				echo "DB Selection FAILed";
			}
		} else {
				echo "MySQL Connection FAILed";
		}
		//	END	Secure Connection Script
}

if ($dbSuccess) {

	

		echo '<form action="twoPageModelOutput.php" method="post">';
		
			echo '		Enter First Name: ';
			echo '		<input type="text" name="personFirstName" />';
			
			echo '		Enter Last Name: ';
			echo '		<input type="text" name="personLastName" />';
			
			echo '		<br /><br />';
		
	
			echo '<input type="submit" />';
				
		echo '</form>';
	

}

?>