<?php
	
echo '<div style=" font-family: arial, helvetica, sans-serif; ">';

	echo "'date' means a number	<br />";
	echo "'date-string' means a string that looks like a date	<br />";
	
	
	echo "<br /><hr /><br />";

	echo "datestrings are converted to dates with the php 
			<span style = \"  text-decoration: underline;\"><strong>strtotime()</strong></span> 
			function<br /><br /><br />";
			
	$datetimeString = "2010-06-01 15:30";
	echo "'".$datetimeString."' is represented by ".strtotime($datetimeString)."<br /><br />";
	
	$datetimeString = "2010-06-01 15:30 + 2 weeks";
	echo "'".$datetimeString."' is represented by ".strtotime($datetimeString)."<br /><br />";
	
	$datetimeString = "now + 4 hours";
	echo "'".$datetimeString."' is represented by ".strtotime($datetimeString)."<br /><br />";
	
	echo "<br /><hr /><br />";

	echo "dates are Formatted with the php 
			<span style = \"  text-decoration: underline;\"><strong>date()</strong></span> 
			function<br /><br /><br />";
	$MySQLdate = date("Y-m-d H:i:s", strtotime("now"));

	$humanDate = date("g:i A D j M Y", strtotime("now"));
	

	echo "'".$MySQLdate."' is how NOW is stored in MySQL<br /><br />";

	echo "'".$humanDate."' is a more human-friendly way of expressing it.<br /><br />";


echo '</div>';

?>