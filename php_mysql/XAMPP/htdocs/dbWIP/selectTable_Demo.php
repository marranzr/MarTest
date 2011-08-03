<?php
/*

*	File:			selectTable_Demo.php
*	By:			TMIT
*	Date:		2010-06-01
*
*	This script demonstrates SQL SELECT rendered in an  HTML Table 
*
*======================================================================
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

	
	echo "<table border='1'>";
		
		echo "<tr>";
		
			echo "<td>#</td>";
			echo "<td>Salut</td>";
			echo "<td>FirstName</td>";
			echo "<td>LastName</td>";
			echo "<td>Company</td>";
	
		echo "</tr>";

	
	$indx = 1;	
	while ($row = mysql_fetch_array($tPerson_SQLselect_Query, MYSQL_ASSOC)) {
	    $Salutation = $row['Salutation'];
	    $FirstName = $row['FirstName'];
	    $LastName = $row['LastName'];
	    $CompanyID = $row['CompanyID'];
	    
		echo "<tr>";
		
			echo "<td>".$indx."</td>";       //  this is NOT  tPerson.ID
			echo "<td>".$Salutation."</td>";
			echo "<td>".$FirstName."</td>";
			echo "<td>".$LastName."</td>";
			echo "<td>".$CompanyID."</td>";
	
		echo "</tr>";

	    $indx++;
	    
	}
	
	echo "</table>";	

	
	
	mysql_free_result($tPerson_SQLselect_Query);		
}

?>