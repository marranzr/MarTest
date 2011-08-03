<?php
	
	//			File:  doWhile_demo.php
	
	echo 'do ... while<br />';
	echo 'Here, the condition "$i > 0" is never true but the braced code executes anyway<br /><br />';	
	$i = 0;
	do {
	    echo 'The value of $i is: '.$i;
	} while ($i > 0);
	
	echo "<br /><hr /><br />";

	echo 'do ... while  operating on a numeric array<br /><br />';

	$company=array(
						"Aardvark motors",
						"Abbey software",
						"Alphmeric",
						"Azlan",
						"Baker Street",
						"Burger Jack"
	);
	
	$ii = 0;
	do {
	    echo $company[$ii]." begins with A<br />";
	    $ii++;
	} while (substr($company[$ii],0,1) == "A");


?>
