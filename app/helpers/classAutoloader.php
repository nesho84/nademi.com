<?php

// The callback function
function load($className)
{
    $folderArray = [
        'Core',
        'helpers',
        'validators'
    ];

    foreach ($folderArray as $folder) {
        $file = dirname(__DIR__) . '\\' . $folder . '\\' . $className . '.php';
        $file = str_replace('\\', DIRECTORY_SEPARATOR, $file);
        // echo "$file<br>";
        if (file_exists($file)) {
            require_once $file;
        }
    }
}

// Run the autoloader ('load' is the callback)
spl_autoload_register('load');
