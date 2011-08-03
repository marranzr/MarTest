<?php
/*

*	File:			companyEdit.php
*	By:			TMIT
*	Date:		2010-06-01
*
*	This script defines an HTML form using a dropdown
* 		to select which company to edit.
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

	$tCompany_SQLselect = "SELECT  ";
	$tCompany_SQLselect .= "ID, preName, Name ";	
	$tCompany_SQLselect .= "FROM ";
	$tCompany_SQLselect .= "tCompany ";
	$tCompany_SQLselect .= "Order By Name ";
	

	$tCompany_SQLselect_Query = mysql_query($tCompany_SQLselect);	
	
	echo '<form action="companyEditForm.php" method="post">';
	
	echo '<select name="companyID">';
	
		echo '<option value="0" label="coyvalue" selected="selected">..select company..</option>';
 	
	
			while ($row = mysql_fetch_array($tCompany_SQLselect_Query, MYSQL_ASSOC)) {
			    $ID = $row['ID'];
			    $preName = $row['preName'];
			    $companyName = $row['Name'];
			    
			    $fullCoyName = trim($preName." ".$companyName);
			    
			    echo '<option value="'.$ID.'">'.$fullCoyName.'</option>';
			}
		
			mysql_free_result($tCompany_SQLselect_Query);		
	
			echo '</select>';
	

			echo '<input type="submit" />';
			
	echo '</form>';

}

echo "<br /><hr /><br />";


echo '<a href="../index.php">Quit - to homepage</a>';


?>