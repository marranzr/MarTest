<?php
/*

*	File:			newTableField.php
*	By:			TMIT
*	Date:		2010-06-01
*
*	This script adds a new VARCHAR field to the table $thisTable
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
			} 	
		}
		//	END	Secure Connection Script
}

if ($dbSuccess) {
	
		$thisTable = "tPerson";
		$newField = "Tel";
		$newFieldLength = 50;
		
		$newField_SQLalter =  "ALTER TABLE ".$thisTable;
		$newField_SQLalter .= " ADD ".$newField;
		$newField_SQLalter .= " VARCHAR(".$newFieldLength.") NOT NULL";
		 
		echo '<span style = "text-decoration: underline;">
				SQL statement:</span>
				<br />'.$newField_SQLalter.'<br /><br />';
				
		if (mysql_query($newField_SQLalter))  {	
			echo 'used to Successfully add new field '.$newField.' to '.$thisTable.'.<br /><br />';
		} else {
			echo '<span style="color:red; ">FAILED to add field.</span><br /><br />';
			
		}	

}

?>