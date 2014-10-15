<?php

namespace classes\Models;

class fullHeading{	
	
	public static function ReplaceHeading($var){
		//read college dictionary data
	$Crecord=ReadCSV::Read('varlist.csv',TRUE);
	
	foreach ($Crecord as $records){
		
		$replace[$records["varname"]]=  $records["varTitle"];
	}
	
		foreach($var as $Drecords ){
			
			  $Fullheading[] = array_combine($replace,$Drecords );
			  
			 
		}
		return $Fullheading;	
	}
	
}
	
?>