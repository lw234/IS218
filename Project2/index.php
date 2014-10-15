<?php
ini_set('display_errors', 'On');
error_reporting(E_ALL | E_STRICT);

spl_autoload_register(function($className) {
	$className = ltrim($className, '\\');
	$fileName = '';
	$namespace = '';
	if ($lastNsPos = strrpos($className, '\\')) {
		$namespace = substr($className, 0, $lastNsPos);
		$className = substr($className, $lastNsPos + 1);
		$fileName = str_replace('\\', DIRECTORY_SEPARATOR, $namespace) . DIRECTORY_SEPARATOR;
	}
	$fileName .= str_replace('_', DIRECTORY_SEPARATOR, $className) . '.php';

	require $fileName;
});

// store the csv file in a variable($file) and passes to Read function
$file = \classes\Models\ReadCSV::Read('hd100.csv', TRUE);
// passes data store in a variable to ReplaceHeading function
$file = \classes\Models\fullHeading::ReplaceHeading($file);
//passes data store in a variable to display funnction and display the record in table format
$file = \classes\Models\DisplayRecord::display($file);
?>