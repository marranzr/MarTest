
<?php
/*

*	File:			companySave.php
*	By:			TMIT
*	Date:		2010-06-01
*
*	This script collects data from companyCreate.php
*	and processes it
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
			
		{  //   SQL:     $tCompany_SQLinsert	
		
			$tCompany_SQLinsert = "INSERT INTO tCompany (";			
			$tCompany_SQLinsert .=  "preName, ";
			$tCompany_SQLinsert .=  "Name, ";
			$tCompany_SQLinsert .=  "RegType, ";
			$tCompany_SQLinsert .=  "StreetA, ";
			$tCompany_SQLinsert .=  "StreetB, ";
			$tCompany_SQLinsert .=  "StreetC, ";
			$tCompany_SQLinsert .=  "Town, ";
			$tCompany_SQLinsert .=  "County, ";
			$tCompany_SQLinsert .=  "Postcode, ";	
			$tCompany_SQLinsert .=  "COUNTRY ";
			$tCompany_SQLinsert .=  ") ";
			
			$tCompany_SQLinsert .=  "VALUES (";
			$tCompany_SQLinsert .=  "'".$preName."', ";
			$tCompany_SQLinsert .=  "'".$companyName."', ";
			$tCompany_SQLinsert .=  "'".$RegType."', ";
			$tCompany_SQLinsert .=  "'".$StreetA."', ";
			$tCompany_SQLinsert .=  "'".$StreetB."', ";
			$tCompany_SQLinsert .=  "'".$StreetC."', ";
			$tCompany_SQLinsert .=  "'".$Town."', ";
			$tCompany_SQLinsert .=  "'".$County."', ";
			$tCompany_SQLinsert .=  "'".$Postcode."', ";		
			$tCompany_SQLinsert .=  "'".$COUNTRY."' ";
			$tCompany_SQLinsert .=  ") ";
		}
		
		{	//		check the data and process it 
			
			if (empty($companyName)) {
				echo '<span style="color:red; ">Cannot add company with no name.</span><br /><br />'; 
			} else {
					echo '<span style = "text-decoration: underline;">
							SQL statement:</span>
							<br />'.$tCompany_SQLinsert.'<br /><br />';
							
					if (mysql_query($tCompany_SQLinsert))  {	
						echo 'used to Successfully add new company.<br /><br />';
					} else {
						echo '<span style="color:red; ">FAILED to add new company.</span><br /><br />';
						
					}	
			}
		}

}

echo "<br /><hr /><br />";

echo '<a href="companyCreate.php">Create another company</a>';
echo "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;";
echo '<a href="../index.php">Quit - to homepage</a>';

?>