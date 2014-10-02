<?php

require 'ReadCSV.php';
$collegeID = new rFile();
$collegeID->readCSV('hd100.csv',TRUE);
$collegeD = new rFile();
$collegeD->readCSV('varlist.csv',TRUE);


 foreach($collegeD as $record)
 {
 		$Cdict [$record['varname']] = $record['varTitle']; // create another array to replace the database header name 
 		 
 }
 for($i=0;$i<count($collegeID); $i++)
 {
 	//$Dname[] = $collegeID[i][COL_NAME_ABBRV];
	$collegeID[i] = array_combine($Cdict,$collegeID[i]);	
 }
 

 
?>