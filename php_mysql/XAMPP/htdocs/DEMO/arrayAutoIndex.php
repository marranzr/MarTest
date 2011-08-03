<?php
/*
*	File:		arrayAutoIndex.php
*	By:			TMIT
*	Date:		20100601
*
*	This script demonstrates Assigning an array index automatically 

*=====================================
*/

	$company=array(
						"Quiches 4 You",
						"Pie and Sauce",
						"Sandwich Bar",
						"Flantastic",
						"Cake on Cake",
						"Pizzaeria Superia",
						"Burger Jack"
	);

	$regtype=array(
						"",
						"Partners",
						"Limited",
						"PLC",
						"",
						"Inc",
						"PLC"
	);
	
	//					$regtype=array("","Partners","Limited","PLC","","Inc","PLC");
	//			====================================================================
		
		echo "<u>List of Companies</u><br />";
		echo $company[0]." ".$regtype[0]."<br />";
		echo $company[1]." ".$regtype[1]."<br />";
		echo $company[2]." ".$regtype[2]."<br />";
		echo $company[3]." ".$regtype[3]."<br />";
		echo $company[4]." ".$regtype[4]."<br />";
		echo $company[5]." ".$regtype[5]."<br />";
		echo $company[6]." ".$regtype[6]."<br />";


?>