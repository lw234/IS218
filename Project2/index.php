<?php
ini_set('display_errors', 'On');
error_reporting(E_ALL | E_STRICT);

/*include ("ReadCSV.php");
include ("DisplayRecord.php");
include ("FullHeading.php");*/

//Gives permission to functions in other files. 
	
//include 'code/loadcalling.php';

spl_autoload_register( function ($className) {
    $className = ltrim($className, '\\');
    $fileName  = '';
    $namespace = '';
    if ($lastNsPos = strrpos($className, '\\')) {
        $namespace = substr($className, 0, $lastNsPos);
        $className = substr($className, $lastNsPos + 1);
        $fileName  = str_replace('\\', DIRECTORY_SEPARATOR, $namespace) . DIRECTORY_SEPARATOR;
    }
    $fileName .= str_replace('_', DIRECTORY_SEPARATOR, $className) . '.php';

    require $fileName;
});


$file =\classes\Models\ReadCSV::Read('hd100.csv',TRUE);
$file =\classes\Models\fullHeading::ReplaceHeading($file);
$file =\classes\Models\DisplayRecord::display($file);

//ReadCSV::display($file);

//calling the readCSV function;
//$var=rFile::readCSV('hd100.csv',TRUE); 
//calling the ReplaceHeading function 
//$var=rFile::ReplaceHeading($var);  
//calling main class 
//rFile::main($var);
?>