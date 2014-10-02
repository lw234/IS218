<?php

// Create a class to read CSV files and display data in tables formate 

class rFile 
{
	// defining variables 
	public $fname;
	public $heading;
	// open CSV file
	public function readCSV($fname,$heading) {
		ini_set('auto_detect_line_endings',TRUE);
		
		// need a handler. Open the $fname file and use r for read mode 
		if (($handle = fopen($fname, "r")) !== FALSE) {
			while (($row = fgetcsv($handle, 1000, ",")) !== FALSE) {
				if($heading == TRUE) {
					$column_heading = $row;
					$heading = FALSE;
			} else {
					$record = array_combine($column_heading, $row);
					$records[] = $record;
					}		

      
				}		

					fclose($handle);
					
			}
		
		else {
			
				//could not open file 
				echo "Failed to open the file" . $fname;
		}
		// To link to the records
		if (empty($_GET)){

			foreach($records as $record){
				$i++;
				//$University_name= $i -1;
			
				echo '<a href = '.' "http://web.njit.edu/~lw234/is218/Program Challenge1/ReadCSV.php?record=' . $i . '"'. '>'.$record['INSTNM']. '</a>';
	
				echo '</p>';
				}
		}
		
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
	
 			
		/*
		//echo "<table>\n";
		//if($heading){
				
			//foreach($keys=(array_keys($records[0]))as $key){
						
						//echo "<th>$key</th>";
						
					//}
		
				//display data
			foreach($records as $record) {
				
			 	 //echo "<tr>";
				foreach($record as $key => $value) {
					
					echo $key . ':'.$value ;
				}						
					//echo "<td>$value</td>";
			//echo $key . ': ' . $value .  "</br> \n";
	*/	//}
		//echo '<hr>';
		//echo "</tr>";
	}
	
	//echo "</table>";
	
	//}
	
}
//Create objects and intantiate a class
$obj1 = new rFile();
$obj1->readCSV('hd.csv',TRUE);
?>