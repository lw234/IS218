<?php
namespace classes\Models;

// Declare the interface 
interface DisplayRecord_Template{
	public static function display($records);
}

class DisplayRecord implements DisplayRecord_Template{
	
	public static function display($records){
		
	if (empty($_GET)){
			
			$i = -1;
			foreach($records as $record){
				$i++;
				echo '<a href = '.' "http://web.njit.edu/~lw234/is218/Project2/index.php?record=' . $i . '"'. '>'.$record['Institution (entity) name']. '</a>';
			
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
}
	
?>