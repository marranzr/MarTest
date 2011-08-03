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
		$personField = array(
					'Salutation' => 'Salutation',
					'FirstName' => 'FirstName',
					'LastName' => 'LastName',
					'CompanyID' => 'CompanyID',			
		);
	}
	
	{	// setup ARRAY of data ROWS

		$personData[0] = array('Mr','Morris','Sparrow','4');
		$personData[1] = array('Mrs','Mary','Haslett','2');
		$personData[2] = array('Ms','Gill','Hennesey','1');
		
		$numRows = sizeof($personData);
	}	

		
	{	//	SQL statement with ARRAYS 
		
		//   Fieldnames part of INSERT statement 
		$person_SQLinsert = "INSERT INTO tPerson (
									".$personField['Salutation'].",
									".$personField['FirstName'].",
									".$personField['LastName'].",
									".$personField['CompanyID']."							
									) ";
								
		//   VALUES  part of INSERT statement 									
		$person_SQLinsert .=  "VALUES ";			
		
						$indx = 0;					
						$person_SQLinsert .=  "(
													'".$personData[$indx][0]."',
													'".$personData[$indx][1]."',
													'".$personData[$indx][2]."',
													'".$personData[$indx][3]."'
													), ";
						$indx++;
						$person_SQLinsert .=  "(
													'".$personData[$indx][0]."',
													'".$personData[$indx][1]."',
													'".$personData[$indx][2]."',
													'".$personData[$indx][3]."'
													), ";
						$indx++;												
						$person_SQLinsert .=  "(
													'".$personData[$indx][0]."',
													'".$personData[$indx][1]."',
													'".$personData[$indx][2]."',
													'".$personData[$indx][3]."'
													) ";							

	
	}
		
			
		
	{	//	Echo and Execute the SQL and test for success   
		
		echo "<strong><u>SQL:<br /></u></strong>";
		echo $person_SQLinsert."<br /><br />";
			
		if (mysql_query($person_SQLinsert))  {				
			echo "was SUCCESSFUL.<br /><br />";
		} else {
			echo "FAILED.<br /><br />";		
		}

	}
			
}	//		END ($dbSuccess)

?>