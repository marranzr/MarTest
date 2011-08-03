<?php
/*

*	File:			select_Demo.php
*	By:			TMIT
*	Date:		2010-06-01
*
*	This script demnstrates SQL SELECT
*		and use of        mysql_fetch_array
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
	
	$tPerson_SQLselect = "SELECT  ";
	$tPerson_SQLselect .= "ID, Salutation, FirstName, LastName, CompanyID ";	
	$tPerson_SQLselect .= "FROM ";
	$tPerson_SQLselect .= "tPerson ";			//	<< table name

	
	$tPerson_SQLselect_Query = mysql_query($tPerson_SQLselect); 	

	$indx = 1;	
	while ($row = mysql_fetch_array($tPerson_SQLselect_Query, MYSQL_ASSOC)) {
	    $Salutation = $row['Salutation'];
	    $FirstName = $row['FirstName'];
	    $LastName = $row['LastName'];
	    $CompanyID = $row['CompanyID'];
	    
	    echo $indx." - ".$Salutation." ".$FirstName." ".$LastName." [Company ".$CompanyID."]<br />";

	    $indx++;
	    
	}
	
	mysql_free_result($tPerson_SQLselect_Query);		
}

?>