<?php
namespace classes\Models;
class ReadCSV {
	public static function Read($fname,$heading){
$first_row = TRUE;
ini_set('auto_detect_line_endings',TRUE);
if (($handle = fopen($fname, "r")) !== FALSE) {
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

return $records;


}
	

}



?>