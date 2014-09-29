<?php

// Create a class to read CSV files and display data in tables formate 

class rFile 
{
	// defining variables 
	private $_Fname;
	private $_Heading;
	
	public function _construct($Fname,$Heading)
	{
		$this->_Fname = $Fname;
		$this->_Heading =$heading;
	}
	public function readCSV($_Fname) {
		$first_row = TRUE;
		ini_set('auto_detect_line_endings',TRUE);
		if (($handle = fopen("$_Fname", "r")) !== FALSE) {
			while (($row = fgetcsv($handle, 1000, ",")) !== FALSE) {
				if($first_row == TRUE) {
					$column_heading = $row;
					$first_row = FALSE;
			} else {
					$record = array_combine($column_heading, $row);
					$records[] = $record;
					}		

      
				}		

					fclose($handle);
			}
	
	
	}
	
	public function display() {
	
		foreach($records as $record) {
			foreach($record as $key => $value) {
			echo $key . ': ' . $value .  "</br> \n";
		}
		echo '<hr>';
	}
	
	
	
	}
	
	
}
$rFile = new rFile;
$rFile->readCSV("test.csv");
$rFile-> display();
?>