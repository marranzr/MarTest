
<?php
/*

*	File:			companyUpdate.php
*	By:			TMIT
*	Date:		2010-06-01
*
*	This script collects data from companyEdit.php
*	and updates the database record
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
		
		{  //   collect the data with $_POST
		
			$companyID = $_POST["companyID"];	
			
			$preName = $_POST["preName"];	
			$companyName = $_POST["companyName"];	
			$RegType = $_POST["RegType"];	
			$StreetA = $_POST["StreetA"];	
			$StreetB = $_POST["StreetB"];	
			$StreetC = $_POST["StreetC"];	
			$Town = $_POST["Town"];	
			$County = $_POST["County"];	
			$Postcode = $_POST["Postcode"];	
			$COUNTRY = $_POST["COUNTRY"];	
		}

			
		{  //   SQL:     UPDATE tCompany record
		
			$tCompany_SQLupdate = "UPDATE tCompany SET ";			
			$tCompany_SQLupdate .=  "preName = '".$preName."', ";
			$tCompany_SQLupdate .=  "Name = '".$companyName."', ";
			$tCompany_SQLupdate .=  "RegType = '".$RegType."', ";
			$tCompany_SQLupdate .=  "StreetA = '".$StreetA."', ";
			$tCompany_SQLupdate .=  "StreetB = '".$StreetB."', ";
			$tCompany_SQLupdate .=  "StreetC = '".$StreetC."', ";
			$tCompany_SQLupdate .=  "Town = '".$Town."', ";
			$tCompany_SQLupdate .=  "County = '".$County."', ";
			$tCompany_SQLupdate .=  "Postcode = '".$Postcode."', ";	
			$tCompany_SQLupdate .=  "COUNTRY = '".$COUNTRY."' ";
			$tCompany_SQLupdate .=  "WHERE ID = '".$companyID."' "; 			
		}
		
		{	//		check the data and process it 
			
			if (empty($companyName)) {
				echo '<span style="color:red; ">Cannot make the company name empty.</span><br /><br />'; 
			} else {
					echo '<span style = "text-decoration: underline;">
							SQL statement:</span>
							<br />'.$tCompany_SQLupdate.'<br /><br />';
							
					if (mysql_query($tCompany_SQLupdate))  {	
						echo 'used to Successfully update the company.<br /><br />';
					} else {
						echo '<span style="color:red; ">FAILED to update the company.</span><br /><br />';
						
					}	
			}
		}

}

echo "<br /><hr /><br />";

echo '<a href="companyEdit.php">Update another company</a>';
echo "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;";
echo '<a href="../index.php">Quit - to homepage</a>';

?>