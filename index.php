<?php

// require autoload class
require __DIR__ . '/vendor/autoload.php';

/**
 * Some Variables Declarations
 */
$GLOBALS['RootDir'] = $_SERVER['DOCUMENT_ROOT'];

$GLOBALS['resource_views_dir'] = "resources";

$GLOBALS['controllerPath'] = [
    "./app/http/controllers",
    "./app/http/auth"
];

$GLOBALS['modelsPath'] = "./app"; 

/**
 * Copies bootstrap assets onto puclic folder.
 * Since composer json post-update-cmd script 
 * never works on windows, this script handles such.
 */
if (strtoupper(substr(PHP_OS, 0, 3)) === 'WIN') { 
    if (!is_dir(__DIR__ . "/public/bootstrap/css") || !is_dir(__DIR__ . "/public/bootstrap/js")) {
        
        mkdir(__DIR__ . "/public/bootstrap/css");
        mkdir(__DIR__ . "/public/bootstrap/js");

        if (is_dir(__DIR__ . "/vendor/twbs/bootstrap/dist/") || is_dir(__DIR__ . "/vendor/twbs/bootstrap/dist/")) {
            $assets = [glob(__DIR__ . "/vendor/twbs/bootstrap/dist/css/*.css"), glob(__DIR__ . "/vendor/twbs/bootstrap/dist/js/*.js")];

            foreach($assets[0] as $assetKey => $assetValue) {  
                $assetValueBasename = basename($assetValue);
                copy($assetValue, __DIR__ . "/public/bootstrap/css/" . $assetValueBasename); 
            }

            foreach($assets[1] as $assetKey => $assetValue) {
                $assetValueBasename = basename($assetValue);
                copy($assetValue, __DIR__ . "/public/bootstrap/js/" . $assetValueBasename); 
            } 
        }
        
        if (!is_dir(__DIR__ . "/public/bootstrap/css/") || !is_dir(__DIR__ . "/public/bootstrap/js/")) {
            echo "<span>No Bootstrap Css and Js files set on public!</span>";
            exit();
        }
    } 
}

// Require Dotenv Class; To load environment varaibles.
$dotenv = Dotenv\Dotenv::createImmutable(__DIR__);
$dotenv->load();

// Require Routes
require __DIR__ . "/routes/web.php";


