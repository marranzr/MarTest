<?php
/*

*	File:			tPersonInitialise.php
*	By:			TMIT
*	Date:		
*
*	This script initialises the tPerson TABLE
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
	
		$tableName = "tPerson";	
		$CSVfilename = "csvPerson";
		
		$tableField = array(
					'Salutation',
					'FirstName',
					'LastName',
					'CompanyID'
		);
		$numFields = sizeof($tableField);
			
		$createTable_SQL =  "CREATE TABLE alphacrm.".$tableName." (
									ID INT( 11 ) NOT NULL AUTO_INCREMENT PRIMARY KEY , 
									Salutation VARCHAR( 20 ) , 
									FirstName VARCHAR( 50 ) , 
									LastName VARCHAR( 50 ) NOT NULL, 
									CompanyID INT ( 11 ) NOT NULL 
		)";


	//	=======^^^^^^^^^^^^^^^^^^^^^^^=========  End of Definition Part ======^^^^^^^^^=====

										
		{  //		read CSV data file
	
			$file = fopen($CSVfilename, "r"); 		
			$i = 0;
			while(!feof($file))
			  {		  	
				$thisLine = fgets($file);		
				$tableData[$i] = explode(",", $thisLine);
				$i++; 
			  }
			fclose($file);
			
			$numRows = sizeof($tableData);
		}
		echo '$numRows : '.$numRows.'<br />';
		echo '$tableField[$numFields-1] : '.$tableField[$numFields-1].'<br />';

		{	//		DROP table		
	
		
			$drop_SQL = "DROP TABLE ".$tableName;
			
			if (mysql_query($drop_SQL))  {	
				echo "'DROP ".$tableName."' -  Successful.";
			} else {
				echo "'DROP ".$tableName."' - Failed.";
			}
		}
		
		echo "<br /><hr /><br />";
	
		{	//		CREATE table		
			
			if (mysql_query($createTable_SQL))  {	
				echo "'CREATE ".$tableName."' -  Successful.";
			} else {
				echo "'CREATE ".$tableName."' - Failed.";
			}
		}		
		echo "<br /><hr /><br />";
			
			$table_SQLinsert = "INSERT INTO ".$tableName." (";
			
			//$table_SQLinsert .=   "x"; 
			foreach($tableField as $tableFieldName) {
				$table_SQLinsert .=  $tableFieldName;
				if($tableFieldName <> $tableField[$numFields-1]) {
					$table_SQLinsert .=  ", ";
				}
			}
			$table_SQLinsert .=  ") VALUES ";

			$indx = 0;		
			while($indx < $numRows) {			
				$table_SQLinsert .=  "(";
				
				foreach($tableField as $key => $tableFieldName) {
					
					$table_SQLinsert .=  "'".$tableData[$indx][$key]."'";
					if($tableFieldName <> $tableField[$numFields-1]) {
						$table_SQLinsert .=  ", ";
					}

				}

				$table_SQLinsert .=  ") ";
				if ($indx < ($numRows - 1)) {
					$table_SQLinsert .=  ",\n";
				}
				
				$indx++;
			}
		
			{	//	Echo and Execute the SQL and test for success   
			
						echo "<strong><u>SQL:<br /></u></strong>";
						echo $table_SQLinsert."<br /><br />";
							
						if (mysql_query($table_SQLinsert))  {				
							echo "was SUCCESSFUL.<br /><br />";
						} else {
							echo "FAILED.<br /><br />";		
						}
			}
}

?>