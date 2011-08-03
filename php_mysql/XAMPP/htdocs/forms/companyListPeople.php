<?php
/*

*	File:			companyListPeople.php
*	By:			TMIT
*	Date:		2010-06-01
*
*	This script Lists a record in tCompany
*		with associated people
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
	
	{	//  Get the details of the company selected 
			$companyID = $_POST["companyID"];	
			
			if ($companyID == 0) {
				header("Location: companySelect.php");	
			}
			
			$tCompany_SQLselect = "SELECT * ";
			$tCompany_SQLselect .= "FROM ";
			$tCompany_SQLselect .= "tCompany ";
			$tCompany_SQLselect .= "WHERE ID = '".$companyID."' ";
			
			$tCompany_SQLselect_Query = mysql_query($tCompany_SQLselect);	
			
			while ($row = mysql_fetch_array($tCompany_SQLselect_Query, MYSQL_ASSOC)) {
				$preName = $row['preName'];
				$companyName = $row['Name'];
				$RegType = $row['RegType'];
				
				$fullCoyName = trim($preName." ".$companyName." ".$RegType);
				
				$StreetA = $row['StreetA'];
				$StreetB = $row['StreetB'];
				$StreetC = $row['StreetC'];
				$Town = $row['Town'];
				$County = $row['County'];
				$Postcode = $row['Postcode'];
				$COUNTRY = $row['COUNTRY'];

 				$CompanyFullAddress = $StreetA;
		
					if (!empty($StreetB)) { $CompanyFullAddress .=  "<br /> ".$StreetB; }
					if (!empty($StreetC)) { $CompanyFullAddress .=  "<br /> ".$StreetC; }
					if (!empty($Town)) { $CompanyFullAddress .=  "<br /> ".$Town; }
					if (!empty($County)) { $CompanyFullAddress .=  "<br /> ".$County; } 
					if (!empty($Postcode)) { $CompanyFullAddress .=  "&nbsp;&nbsp;&nbsp; ".$Postcode; }			
					if (!empty($COUNTRY)) { $CompanyFullAddress .=  "<br /> ".$COUNTRY; }
									 
			}
			
			mysql_free_result($tCompany_SQLselect_Query);			
	}
	
	{	//  Get the details of all associated Person records
		//		and store in array:  personArray  with key >$indx
		 
			$indx = 0;
		
			$tPerson_SQLselect = "SELECT * ";
			$tPerson_SQLselect .= "FROM ";
			$tPerson_SQLselect .= "tPerson ";
			$tPerson_SQLselect .= "WHERE companyID = '".$companyID."' ";
			
			$tPerson_SQLselect_Query = mysql_query($tPerson_SQLselect);	
			
			while ($row = mysql_fetch_array($tPerson_SQLselect_Query, MYSQL_ASSOC)) {
				
				$personArray[$indx]['Salutation'] = $row['Salutation'];
				$personArray[$indx]['FirstName'] = $row['FirstName'];
				$personArray[$indx]['LastName'] = $row['LastName'];
				$personArray[$indx]['Tel'] = $row['Tel'];

					
				$indx++;			 
			}

			$numPersons = sizeof($personArray);
					
			mysql_free_result($tPerson_SQLselect_Query);			
	}
	
	{	//		Output 
			
	$tdOdd = 'style = "background-color: #FF8F8F;"';
	$tdEven = 'style = "background-color: #76E9FF;"';
			

	echo '<div style=" font-family: arial, helvetica, sans-serif; ">';
	
			
								
					echo 	  '<table>
									<tr valign="top">								
										<td style=" font-size: 24; 
														font-weight: bold;" 
														>
												'.$fullCoyName.'
										</td>
										
										<td align="right" width="400">
												'.$CompanyFullAddress.'			
										</td>
									</tr>
								</table>';
					
					echo '<div style="margin-left: 100; ">';
			
						echo '<table border="1" padding="5">';
						
							echo '<tr>
								<td>Salutation</td>
								<td>FirstName</td>
								<td>LastName</td>
								<td>Telephone</td>
							</tr>	';	
							
						for ($indx = 0; $indx < $numPersons; $indx++) {
						
							 //   echo $personArray[$indx]['Salutation'].",";
							 //   echo $personArray[$indx]['FirstName'].",";
							 //   echo $personArray[$indx]['LastName']."<br />";
							if (($indx % 2) == 1) {$rowClass = $tdOdd; } else { $rowClass = $tdEven; }  
 
							echo '<tr '.$rowClass.'>

										<td>
										'.$personArray[$indx]['Salutation'].'
										</td>
										
										<td>
										'.$personArray[$indx]['FirstName'].'
										</td>

										<td>
										'.$personArray[$indx]['LastName'].'
										</td>
										<td>
										'.$personArray[$indx]['Tel'].'
										</td>

									</tr>	';			     
						}
						echo '</table>';
					echo '</div>';		//		END:  <div style="margin-left: 100; ">
			echo '</div>';				//		END:	<div style=" font-family...">
	
	}
	
}

echo "<br /><hr /><br />";

echo '<a href="../index.php">Quit - to homepage</a>';

?>