<?php
/*
*	File:		arrayAssoc2Dim.php
*	By:			TMIT
*	Date:		20100601
*
*	This script demonstrates a 2 dimensional Array

*=====================================
*/

	$company[0] = array('companyName' => 'Quiches 4 You','regtype' => ''); 
	$company[1] = array('companyName' => 'Pie and Sauce','regtype' => 'Partners'); 
	$company[2] = array('companyName' => 'Sandwich Bar','regtype' => 'Limited'); 
	$company[3] = array('companyName' => 'Flantastic','regtype' => 'PLC'); 
	$company[4] = array('companyName' => 'Cake on Cake','regtype' => ''); 
	$company[5] = array('companyName' => 'Pizzaeria Superia','regtype' => 'Inc'); 
	$company[6] = array('companyName' => 'Burger Jack','regtype' => 'PLC'); 

	
	echo "<u>List of Companies</u><br />";
	echo $company[0]['companyName']." ".$company[0]['regtype']."<br />";	
	echo $company[1]['companyName']." ".$company[1]['regtype']."<br />";	
	echo $company[2]['companyName']." ".$company[2]['regtype']."<br />";		
	echo $company[3]['companyName']." ".$company[3]['regtype']."<br />";		
	echo $company[4]['companyName']." ".$company[4]['regtype']."<br />";		
	echo $company[5]['companyName']." ".$company[5]['regtype']."<br />";		
	echo $company[6]['companyName']." ".$company[6]['regtype']."<br />";		
	
	echo "<br /><br />";
	
	//		EXTRA 
	//		putting the list in a while loop 
	$i =0;
	echo "<u>List of Companies - with index</u><br />";

	while($i < 7 ) {
		 echo $i.":".$company[$i]['companyName']." ".$company[$i]['regtype']."<br />";	
		 $i++;
	}


?>