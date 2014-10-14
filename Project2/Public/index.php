<?php 
ini_set('display_errors', 'On');
error_reporting(E_ALL | E_STRICT);

//var_dump(get_include_path());

//create a global costant 
define('APPLICATION_PATH', realpath('../'));

// adding the application path:as path
$paths = array( 
		APPLICATION_PATH,
		get_include_path()
		);
set_include_path(implode(PATH_SEPARATOR, $paths));


function _autoload($className)
{
	require_once $className . '.php';
	return;
}

//$file = new rFile();
//echo $file -> readCSV(hd.csv);
?>
