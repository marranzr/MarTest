<?php
/*

*	File:		insertPersonData.php
*	By:			TMIT
*	Date:		20100601
*
*	This script sets up an ARRAY for tPerson field names
*						and an ARRAY for 3 tPerson ROWs of data
*
*	the script creates an SQL INSERT statement to insert these rows into tPerson 
*
*	We then modify the script to
*			a)		use a 'while () {}' construct to create the INSERT statement
*					irrespective of how many ROWS of data existed
*			b)		use php:  fopen, feof, fgets and fclose to read the data
*					from a file instead of inside the script
*			c)		use the php 'explode' construct to set a variable to 
*					an array comprising a the line of data in the datafile
*
*=====================================
*/

{ // Connect and Test MySQL and specific DB (return $dbSuccess = T/F)
				
			$hostname = "localhost";
			$username = "root";
			$password = "";			
			$databaseName = "alphacrm";

			$dbConnected = @mysql_connect($hostname, $username, $password);
			$dbSelected = @mysql_select_db($databaseName,$dbConnected);

			$dbSuccess = true;
			if ($dbConnected) {
				if (!$dbSelected) {
					echo "DB connection FAILED<br /><br />";
					$dbSuccess = false;
				}		
			} else {
				echo "MySQL connection FAILED<br /><br />";
				$dbSuccess = false;
			}
}  

//	 Execute code ONLY if connections were successful 	
if ($dbSuccess) {
	
	{	//	setup ARRAY of field names 
		$companyField = array(
					'Name' => 'Name',
					'Country' => 'Country'			
		);
	}
	
	{	
	
			//		read CSV data file
	
			$file = fopen("datafile_companies", "r");					//		open the file 'datafile' for 'r'eading 		
			$i = 0;
			while(!feof($file))									//		while NOT the End Of File 
			  {		  	
				$thisLine = fgets($file);						//		gets the next line from 'datafile'				
				$companyData[$i] = explode(",", $thisLine);//    sets 
																		//		$personData[$i] = array( $thisLine );
																		//		whatever's in $thisline separated by commas .
				$i++;  												//		increment $i 
			  }
			fclose($file); 										//		close the file 
			
			$numRows = sizeof($companyData);

		
	}	

		
	{	//	SQL statement with ARRAYS 
		
		//   Fieldnames part of INSERT statement 
		$company_SQLinsert = "INSERT INTO tCompany (
									".$companyField['Name'].",
									".$companyField['Country']."							
									) VALUES ";

								
		

		$indx = 0;		
		while($indx < $numRows) {			
			$company_SQLinsert .=  "(
										'".$companyData[$indx][0]."',
										'".$companyData[$indx][1]."'
										) ";
			if ($indx < ($numRows - 1)) {
				$company_SQLinsert .=  ",";
			}
			
			$indx++;
		}
	
	
	
	}
		
			
		
	{	//	Echo and Execute the SQL and test for success   
		
		echo "<strong><u>SQL:<br /></u></strong>";
		echo $company_SQLinsert."<br /><br />";
			
		if (mysql_query($company_SQLinsert))  {				
			echo "was SUCCESSFUL.<br /><br />";
		} else {
			echo "FAILED.<br /><br />";		
		}

	}
			
}	//		END ($dbSuccess)

?>