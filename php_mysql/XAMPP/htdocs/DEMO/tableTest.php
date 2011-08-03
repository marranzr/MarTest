<?php
	


//		read CSV data file

$file = fopen("../dbWIP/datafile", "r");					//		open the file 'datafile' for 'r'eading 		
$i = 0;
while(!feof($file))									//		while NOT the End Of File 
  {		  	
	$thisLine = fgets($file);						//		gets the next line from 'datafile'				
	$personData[$i] = explode(",", $thisLine);//    sets 
															//		$personData[$i] = array( $thisLine );
															//		whatever's in $thisline separated by commas .
	$i++;  												//		increment $i 
  }
fclose($file); 										//		close the file 

$numRows = sizeof($personData);

	
echo "<table border='1'>";
	
	echo "<tr>";
	
		echo "<td>Salut</td>";
		echo "<td>FirstName</td>";
		echo "<td>LastName</td>";
		echo "<td>Company</td>";

	echo "</tr>";

	
	$ii = 0;
	while($ii < $numRows) {
		echo "<tr>";		
		echo "<td>".$personData[$ii][0]."</td>";
		echo "<td>".$personData[$ii][1]."</td>";
		echo "<td>".$personData[$ii][2]."</td>";
		echo "<td>".$personData[$ii][3]."</td>";
		echo "</tr>";
		$ii++;
	}




echo "</table>";	



?>	