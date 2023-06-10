<?php

require_once "config.php";

define("ROOT", $_SERVER['DOCUMENT_ROOT'] .DIRECTORY_SEPARATOR );

spl_autoload_register('loader');
function loader($class): void
{
    $classToLoad = ROOT.str_replace('\\',DIRECTORY_SEPARATOR,$class).'.php';
    if (file_exists($classToLoad)) {
        require_once $classToLoad;
    }
}

use src\App;
new App();

