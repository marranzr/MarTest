<?php
/*

*	File:			companyPeopleEdit.php
*	By:			TMIT
*	Date:		2010-06-01
*
*	This script uses a dropdown to select a company from tCompany;
*		*	tests it with isset and displays company details
*		*	with a list of people associated
*		*	provide an 'edit' link to edit a tPerson record
*		*	and an 'add' FORM at the end to Add a new tPerson
*		*	with selected company as companyID value 
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

// $thisScriptName separated out as it's now used several times
$thisScriptName = "companyPeopleEdit.php";

if ($dbSuccess) {
		
		$companyID = $_POST["companyID"];
		if(!isset($companyID)) {$companyID = $_GET["companyID"]; }

		if (isset($companyID) AND $companyID > 0){

			{	//  Get the details of the company selected 
										
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
						
						//		we need this to pass to personEdit.php
						$personArray[$indx]['ID'] = $row['ID'];
						//^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^
						
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
		
							{	//		Table to render tCompany detail	
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
							//		END: Table to render tCompany detail
							}
															
							echo '<div style="margin-left: 100; ">';
				
							{	//		Table of tPerson records
							echo '<table border="1" padding="5">';
								echo '<tr>
											<td>Salutation</td>
											<td>FirstName</td>
											<td>LastName</td>
											<td>Telephone</td>
											<td width="90"></td>
										</tr>	';	
																		
								for ($indx = 0; $indx < $numPersons; $indx++) {
									$thisID = $personArray[$indx]['ID'];
									$personEditLink = '<a href="personEditForm.php?personID='.$thisID.'">Edit</a>';
									
		        					if (($indx % 2) == 1) {$rowClass = $tdOdd; } else { $rowClass = $tdEven; }  
		 
									echo '<tr '.$rowClass.' height="20">
									
												<td>'.$personArray[$indx]['Salutation'].'</td>
												
												<td>'.$personArray[$indx]['FirstName'].'</td>
		
												<td>'.$personArray[$indx]['LastName'].'</td>
		
												<td>'.$personArray[$indx]['Tel'].'</td>
												
												<td>'.$personEditLink.'</td>
												
											</tr>	';			     
								}
							echo '</table>';
							//		END:  Table of tPerson records
							}	
																				
							{	//		FORM to INSERT person		

								{	//		Create the personAdd form fields
								$fld_FirstName = '<input type="text" name="FirstName"  size="10" maxlength="50"/>';
								$fld_LastName = '<input type="text" name="LastName"  size="10" maxlength="50"/>';
								$fld_Tel = '<input type="text" name="Tel"  size="10" maxlength="50"/>';
								
								
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

			
								//		END: Create the personAdd for	m fields
								}						

							echo '<form action="personInsert.php" method="post">';
								echo '<input type="hidden" name="companyID" value="'.$companyID.'" />';
								
								echo '<table>';		
										echo '<tr>
												<td colspan="5"></td>
											</tr>	';	
										echo '<tr>
												<td colspan="5"><hr /></td>
											</tr>	';	
										echo '<tr>
												<td colspan="5"></td>
											</tr>	';	
										echo '<tr>
												<td>'.$fld_Salutation.'</td>
												<td>'.$fld_FirstName.'</td>
												<td>'.$fld_LastName.'</td>
												<td>'.$fld_Tel.'</td>
												<td><input type="submit" value="Add" /></td>
											</tr>	';	
								echo '</table>';
							echo '</form>';
							//		END: FORM to INSERT person		
							}
																								
							echo '</div>';		//		END:  <div style="margin-left: 100; ">
							
					echo '</div>';				//		END:	<div style=" font-family...">
		
			//		END: Output section 
			}
				
		} else {

			{	//	Select company from dropdowm
				
				$tCompany_SQLselect = "SELECT  ";
				$tCompany_SQLselect .= "ID, preName, Name ";	
				$tCompany_SQLselect .= "FROM ";
				$tCompany_SQLselect .= "tCompany ";
				$tCompany_SQLselect .= "Order By Name ";
					
				$tCompany_SQLselect_Query = mysql_query($tCompany_SQLselect);	
				
				echo '<form action="'.$thisScriptName.'" method="post">';
				
				echo '<select name="companyID">';
				
					echo '<option value="0" label="coyvalue" selected="selected">..select company..</option>';
			 	
						while ($row = mysql_fetch_array($tCompany_SQLselect_Query, MYSQL_ASSOC)) {
						    $ID = $row['ID'];
						    $preName = $row['preName'];
						    $companyName = $row['Name'];
						    $RegType = $row['RegType'];
						    
						    $fullCoyName = trim($preName." ".$companyName." ".$RegType);
						    
						    echo '<option value="'.$ID.'">'.$fullCoyName.'</option>';
						}
					
						mysql_free_result($tCompany_SQLselect_Query);		
				
						echo '</select>';
				
						echo '<input type="submit" />';
						
				echo '</form>';
				//	END:  Select company from dropdowm
			}
			
		}
		
//		END:	if ($dbSuccess)
}

echo "<br /><hr /><br />";

unset($companyID);
echo '<a href="'.$thisScriptName.'">Select Another</a>';
echo '&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;';
echo '<a href="../index.php">Quit - to homepage</a>';

?>