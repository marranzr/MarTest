<?php
/*

*	File:			personEditForm.php
*	By:			TMIT
*	Date:		2010-06-01
*
*	This script defines an HTML form to load person details
*	and POST changed fields back to this form and UPDATE
*	If UPDATE is good then use header(Location: ...
*	to return to the companyPeopleEdit form
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

$thisScriptName = "personEditForm.php";

if ($dbSuccess) {

	$saveClicked = $_POST["saveClicked"];
	
	{	//	SAVE button was clicked 
		if (isset($saveClicked)) {
			unset($saveClicked);
			
			$companyID = $_POST["companyID"];	
			
			$personID = $_POST["personID"];	
			$Salutation = $_POST["Salutation"];	
			$FirstName = $_POST["FirstName"];	
			$LastName = $_POST["LastName"];	
			$Telephone = $_POST["Telephone"];	
	
			$tPerson_SQLupdate = "UPDATE tPerson SET ";			
			$tPerson_SQLupdate .=  "Salutation = '".$Salutation."', ";
			$tPerson_SQLupdate .=  "FirstName = '".$FirstName."', ";
			$tPerson_SQLupdate .=  "LastName = '".$LastName."', ";
			$tPerson_SQLupdate .=  "Tel = '".$Telephone."' ";
			$tPerson_SQLupdate .=  "WHERE ID = '".$personID."' "; 	
	
			if (mysql_query($tPerson_SQLupdate))  {	
				echo header("Location: companyPeopleEdit.php?companyID=".$companyID);
			} else {
				echo '<span style="color:red; ">FAILED to update the company.</span><br /><br />';
				
			}				
		}	
	//	END:  SAVE button was clicked 	ie. if (isset($saveClicked))
	}		
	
	{	//  Get the details of the person selected 
			$personID = $_GET["personID"];	
					
			$tPerson_SQLselect = "SELECT * ";
			$tPerson_SQLselect .= "FROM ";
			$tPerson_SQLselect .= "tPerson ";
			$tPerson_SQLselect .= "WHERE ID = '".$personID."' ";
			
			$tPerson_SQLselect_Query = mysql_query($tPerson_SQLselect);	
			
			while ($row = mysql_fetch_array($tPerson_SQLselect_Query, MYSQL_ASSOC)) {
				$current_Salutation = $row['Salutation'];
				$current_FirstName = $row['FirstName'];
				$current_LastName = $row['LastName'];
				$current_Tel = $row['Tel'];
				
				$companyID = $row['CompanyID'];
				 
			}
			
			mysql_free_result($tPerson_SQLselect_Query);			
	//  END: Get the details of the person selected 
	}

	echo '<h2 style="font-family: arial, helvetica, sans-serif;" >
				Person EDIT Form
			</h2>';
	
	{		
		$fld_personID = '<input type="hidden" name="personID" value="'.$personID.'"/>';
		$fld_companyID = '<input type="hidden" name="companyID" value="'.$companyID.'"/>';
		$fld_saveClicked = '<input type="hidden" name="saveClicked" value="1"/>';

		$fld_FirstName = '<input type="text" name="FirstName" value="'.$current_FirstName.'"/>';
		$fld_LastName = '<input type="text" name="LastName" value="'.$current_LastName.'"/>';
		$fld_Tel = '<input type="text" name="Telephone" value="'.$current_Tel.'"/>';
		


		{	//	create the Salutation DROPDOWN  FIELD 
			$salut_SQL =  "SELECT lookupValue FROM tLookup ";
			$salut_SQL .= "WHERE lookupType = 'Salutation' ";
			$salut_SQL .= "ORDER By lookupOrder ";
			
			$salut_SQL_Query = mysql_query($salut_SQL);	

			$fld_Salutation = '<select name="Salutation">';
	 	
				while ($row = mysql_fetch_array($salut_SQL_Query, MYSQL_ASSOC)) {
				    $salutValue = $row['lookupValue'];
				    if ($current_Salutation == $salutValue) { 
				    	$selectedFlag = " selected";
				    } else { 
				    	$selectedFlag = "";
				    }
				    $fld_Salutation .= '<option'.$selectedFlag.'>'.$salutValue.'</option>';
				}
			
				mysql_free_result($salut_SQL_Query);		
	
			$fld_Salutation .= '</select>';
			
		//	END: create the Salutation DROPDOWN  FIELD 
		}	


		echo '<form name="postPerson" action="'.$thisScriptName.'" method="post">';
		
				echo $fld_personID;
				echo $fld_companyID;
				echo $fld_saveClicked;
				echo '
				<table>
					<tr>
						<td>Salutation</td>
						<td>'.$fld_Salutation.'</td>
					</tr>
					<tr>
						<td>First Name</td>
						<td>'.$fld_FirstName.'</td>
					</tr>
					<tr>
						<td>Last Name</td>
						<td>'.$fld_LastName.'</td>
					</tr>
					<tr>
						<td>Telephone</td>
						<td>'.$fld_Tel.'</td>
					</tr>
					<tr>
						<td></td>
						<td align="right"><input type="submit"  value="Save" /></td>
					</tr>					
				</table>
				';
					
		echo '</form>';
		

	}
	
	echo "<br /><hr /><br />";
	
	echo '<a href="companyPeopleEdit.php?companyID='.$companyID.'">Return to Company/People List</a>';
	echo "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;";
	echo '<a href="../index.php">Quit - to homepage</a>';

}

?>