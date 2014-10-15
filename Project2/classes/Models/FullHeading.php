<?php

namespace classes\Models;
// Declare the interface
interface fullHeading_Template {
	public static function ReplaceHeading($file);
}
//
class fullHeading implements fullHeading_Template {

	public static function ReplaceHeading($file) {
		//read college dictionary data
		$Crecord = ReadCSV::Read('varlist.csv', TRUE);

		foreach ($Crecord as $records) {

			$replace[$records["varname"]] = $records["varTitle"];
		}

		foreach ($var as $Drecords) {

			$Fullheading[] = array_combine($replace, $Drecords);

		}
		return $Fullheading;
	}

}
?>