<?php

//Gives permission to functions in other files.
require_once ('code/core/autoloader.php');

spl_autoload_register('Autoloader::loader');
?>