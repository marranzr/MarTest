<?php
/*

*	File:			companyEditForm.php
*	By:			TMIT
*	Date:		2010-06-01
*
*	This script defines an HTML form to load company details
*	and POST changed fields to companyEditSave.php
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

	{	//  Get the details of the company selected 
			$companyID = $_POST["companyID"];	
			
						
			if ($companyID == 0) {
				header("Location: companyEdit.php");	
			}
			

			
			$tCompany_SQLselect = "SELECT * ";
			$tCompany_SQLselect .= "FROM ";
			$tCompany_SQLselect .= "tCompany ";
			$tCompany_SQLselect .= "WHERE ID = '".$companyID."' ";
			
			$tCompany_SQLselect_Query = mysql_query($tCompany_SQLselect);	
			
			while ($row = mysql_fetch_array($tCompany_SQLselect_Query, MYSQL_ASSOC)) {
				$current_preName = $row['preName'];
				$current_Name = $row['Name'];
				$current_RegType = $row['RegType'];
				
				$current_StreetA = $row['StreetA'];
				$current_StreetB = $row['StreetB'];
				$current_StreetC = $row['StreetC'];
				$current_Town = $row['Town'];
				$current_County = $row['County'];
				$current_Postcode = $row['Postcode'];
				$current_COUNTRY = $row['COUNTRY'];
				 
			}
			
			//mysql_free_result($tCompany_SQLselect_Query);			
	}

	echo '<h2 style="font-family: arial, helvetica, sans-serif;" >
				Company EDIT Form
			</h2>';
	
	{	//		FORM postCompany 
		echo '<form name="postCompany" action="companyUpdate.php" method="post">';
		
				echo '<input type="hidden" name="companyID" value="'.$companyID.'"/>';
				echo '
				<table>
					<tr>
						<td>pre Name</td>
						<td><input type="text" name="preName" value="'.$current_preName.'"/></td>
					</tr>
					<tr>
						<td>Company Name</td>
						<td><input type="text" name="companyName" value="'.$current_Name.'"/></td>
					</tr>
					<tr>
						<td>Reg Type</td>
						<td><input type="text" name="RegType" value="'.$current_RegType.'"/></td>
					</tr>
					<tr>
						<td>Address</td>
						<td><input type="text" name="StreetA" value="'.$current_StreetA.'"/></td>
					</tr>
					<tr>
						<td></td>
						<td><input type="text" name="StreetB" value="'.$current_StreetB.'"/></td>
					</tr>
					<tr>
						<td></td>
						<td><input type="text" name="StreetC" value="'.$current_StreetC.'"/></td>
					</tr>
					<tr>
						<td>Town</td>
						<td><input type="text" name="Town" value="'.$current_Town.'"/></td>
					</tr>
					<tr>
						<td>County</td>
						<td><input type="text" name="County" value="'.$current_County.'"/></td>
					</tr>
					<tr>
						<td>Postcode</td>
						<td><input type="text" name="Postcode" value="'.$current_Postcode.'"/></td>
					</tr>
					<tr>
						<td>COUNTRY</td>
						<td><input type="text" name="COUNTRY" value="'.$current_COUNTRY.'"/></td>
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

echo '<a href="companyEdit.php">Select a different company</a>';
echo "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;";
echo '<a href="../index.php">Quit - to homepage</a>';


}

?>