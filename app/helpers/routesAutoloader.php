<?php

function loadRoutes($folder)
{
    foreach (glob("{$folder}/*.php") as $filename) {
        require_once $filename;
    }
}

// Run autoloader
loadRoutes(ROUTES_PATH);
