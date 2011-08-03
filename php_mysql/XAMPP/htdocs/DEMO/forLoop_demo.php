<?php
	
	//		File:    forLoop_demo.php
		


	echo 'This is a for() loop operating on a numeric array<br /><br />';	
	
	$company=array(
						"Quiches 4 You",
						"Pie and Sauce",
						"Sandwich Bar",
						"Flantastic",
						"Cake on Cake",
						"Pizzaeria Superia",
						"Burger Jack"
	);
	
	$numRows = sizeof($company);
	
		
	for ($ii = 0; $ii <= $numRows; $ii++) {
	    echo $company[$ii]."<br />";
	}
	
	echo "<br /><hr /><br />";
	
	

?>