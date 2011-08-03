<?php
	
echo '<title>printf() and sprinf() examples</title>';	
echo '<p style=" text-decoration: underline;">
		printf() and sprinf() examples		
	</p>';
echo "<br /><hr /><br />";
	
	
printf("String Specification %s and number specification %d","1st parameter",456);


echo "<br /><hr /><br />";




$formatString = "String Specification %s and number specification %d";
$output = sprintf($formatString, "1st parameter", 456);
echo "$output";


echo "<br /><hr /><br />";

echo '<p style=" text-decoration: underline; font-family: arial, helvetica, sans-serif; color:red; ">
		text example		
	</p>';
	
$town = "Banbury";
$county = "Oxfordshire";
$format = 'The town of %s is in the county of %s';
$output = sprintf($format, $town, $county);

echo "<p>$output</p>";

echo "<br /><hr /><br />";

echo '<p style=" text-decoration: underline; font-family: arial, helvetica, sans-serif; color:red; ">
		numeric example		
	</p>';

	$town = "Banbury";
	$ordinal = 2;
	$county = "Oxfordshire";
	$population = 42478;
	$format = "The %dnd town in %s is %s with a population of %d ";
	//             ^^           ^^    ^^                      ^^
	//					\_____________\_____\_______________________\_____   4 specifications
	//
	//        and 4 arguments after the format string argument
	//										 _____________________________________
	//										/			/	       /         /   
	$output = sprintf($format, $ordinal, $county, $town, $population);
	echo "<p>$output</p>";
	
	echo "<br /><hr /><br />";

?>