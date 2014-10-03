<?php

ini_set('display_errors','on');
error_reporting(E_ALL | E_STRICT);

// Create a class to read CSV files and display data in tables formate 

class rFile 
{
	// defining variables 
	//public $fname;
	//public $heading;
	// open CSV file
public static function readCSV($fname,$heading) {
		$first_row = TRUE;
		ini_set('auto_detect_line_endings',TRUE);
		if (($handle = fopen($fname, "r")) !== FALSE) {
    		while (($row = fgetcsv($handle, 1000, ",")) !== FALSE) {
     		if($first_row == TRUE) {
       		$column_heading = $row;
       		$first_row = FALSE;
     	} 
     	else 
     	{
       $record = array_combine($column_heading, $row);
       $records[] = $record;
     }

      
    }

    fclose($handle);
	}
		return $records;	
}
	public static function main($records){
		// To link to the records
		if (empty($_GET)){
			
			$i = -1;
		//print_r($records);
			foreach($records as $record){
				$i++;
				//$University_name= $i -1;
			
				echo '<a href = '.' "http://web.njit.edu/~lw234/is218/Program Challenge1/ReadCSV.php?record=' . $i . '"'. '>'.$record['Institution (entity) name']. '</a>';
				//echo '<a href = '.' "http://web.njit.edu/~lw234/is218/Program Challenge1/ReadCSV.php?record=' . $University_name. '"'. '> University '.$i. '</a>';
				//echo '<a href = '.' "http://web.njit.edu/~lw234/is218/Program Challenge1/ReadCSV.php?record=' .$i. '</a>';
				echo '</p>';
				}
		}
		else{

		//Getting records and echo the key and value for each record
		$record = $records[$_GET['record']];
		echo "<table border = 1 bordercolor= black cellspacing=0 cellpadding=5 style='font-size:14pt'>";
		echo "<tr>";
		foreach($record as $key =>  $value) {
			
			echo "<th>$key</th>";
			echo "<td>$value</td>";
			
		echo "</tr>";
		
	
			
		}
		
		echo "</table>";
	
	
	}
	}

	public static function ReplaceHead($var){
		
	$Crecord=rFile::readCSV('varlist.csv',TRUE);
	
	foreach ($Crecord as $records){
		
		$replace[$records["varname"]]=  $records["varTitle"];
	}
	
		foreach($var as $krecords ){
			
			  $kr[] = array_combine($replace,$krecords );
			  
			 
		}
		return $kr;	
	}
	 	
	}

/*
	public function csvrecord($records){
  		foreach($records as $record) {
    		foreach($record as $key => $value) {
     		echo $key . ': ' . $value .  "</br> \n";
        
    		}
    			echo '<hr>';
    		}
 }*/
	
//calling the readCSV function;
$var=rFile::readCSV('hd100.csv',TRUE);
//displaying the data
$var=rFile::ReplaceHead($var);
rFile::main($var);

?>