<?php

// Create a class to read CSV files and display data in tables formate 

class rFile 
{
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

//loops to all the records and display the records in table formate
	public static function main($records){
		// Create an access link for each college 
		if (empty($_GET)){
			
			$i = -1;
			foreach($records as $record){
				$i++;
				echo '<a href = '.' "http://web.njit.edu/~lw234/is218/Program Challenge1/ReadCSV.php?record=' . $i . '"'. '>'.$record['Institution (entity) name']. '</a>';
			
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
	//method to replace short heading in to full heading 
	public static function ReplaceHeading($var){
		//read college dictionary data
	$Crecord=rFile::readCSV('varlist.csv',TRUE);
	
	foreach ($Crecord as $records){
		
		$replace[$records["varname"]]=  $records["varTitle"];
	}
	
		foreach($var as $Drecords ){
			
			  $Fullheading[] = array_combine($replace,$Drecords );
			  
			 
		}
		return $Fullheading;	
	}
	 	
	}


	
//calling the readCSV function;
$var=rFile::readCSV('hd100.csv',TRUE);
//calling the ReplaceHeading function 
$var=rFile::ReplaceHeading($var);
//calling main class 
rFile::main($var);

?>
