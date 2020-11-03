<?php

// ---------------------------------------------------------
// --------------------- Startup files ---------------------
// ------------------ Order is important! ------------------
// ---------------------------------------------------------

//------------------------------------------------------------
// Global Config
//------------------------------------------------------------
require_once __DIR__ . "/config/config.php";


//------------------------------------------------------------
// Custom Autoload Classes
// Folders: 'app/Core', 'app/helpers', 'app/validators'
//------------------------------------------------------------
require_once HELPERS_PATH . "/classAutoloader.php";


//------------------------------------------------------------
// LIBRARY - only Functions and Classes
//------------------------------------------------------------
require_once LIBRARY_PATH . "/ActivePage.php";
require_once LIBRARY_PATH . "/PHPMailer.php";
require_once LIBRARY_PATH . "/sendEmail.php";


// ------------------------------------------------------------
//  ROUTES - Autoload
// ------------------------------------------------------------
require_once HELPERS_PATH . "/routesAutoloader.php";

//------------------------------------------------------------
// Initialize Router
//------------------------------------------------------------
Router::init(isset($_GET['url']) ? $_GET['url'] : '/');
