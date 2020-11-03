<?php

session_start();
// session_regenerate_id(true);

/* Error reporting */
ini_set('error_reporting', 'true');
error_reporting(E_ALL);

/*
The important thing to realize is that the config file should be included in every
page of our project, or at least any page you want access to these settings.
This allows us to confidently use these settings throughout a project because
if something changes such as our database credentials, or a path to a specific resource,
we'll only need to update it here.
 */

/* DB Params Development */
define('DB_HOST', 'localhost');
define('DB_NAME', 'oop_portfolio_github');
define('DB_CHARSET', 'utf8');
define('DB_USER', 'root');
define('DB_PASS', '123456');

/* App Email Address - for the Contact page */
defined('CONTACT_FORM_EMAIL')
    or define('CONTACT_FORM_EMAIL', 'admin@admin.com');

/* APP NAME */
defined('SITE_NAME')
    or define('SITE_NAME', 'nademi.com');

// APP URL
defined('APPURL')
    or define('APPURL', 'http://localhost/oop.nademi.com - GitHub/oop.nademi.com');

// APP APSOLUTE PATH
defined('APPROOT')
    or define('APPROOT', dirname(dirname(__DIR__)));

/* UPLOAD PATH */
defined('UPLOAD_PATH')
    or define('UPLOAD_PATH', APPROOT . '/public/uploads');

/* DEMO UPLOAD PATH */
defined('DEMO_UPLOAD_PATH')
    or define('DEMO_UPLOAD_PATH', APPROOT . '/public/uploads/demo');

/* JS PATH - Admin */
defined('JS_PATH')
    or define('JS_PATH', APPURL . '/app/js');

/* LIBRARY */
defined('LIBRARY_PATH')
    or define('LIBRARY_PATH', dirname(__DIR__) . '/library');

/* TEMPLATES */
defined('TEMPLATES_PATH')
    or define('TEMPLATES_PATH', dirname(__DIR__) . '/templates');

/* CORE */
defined('CORE_PATH')
    or define('CORE_PATH', dirname(__DIR__) . '/Core');

/* CONTROLLERS */
defined('CONTROLLERS_PATH')
    or define('CONTROLLERS_PATH', dirname(__DIR__) . '/Controllers');

/* MODELS */
defined('MODELS_PATH')
    or define('MODELS_PATH', dirname(__DIR__) . '/Models');

/* VIEWS */
defined('VIEWS_PATH')
    or define('VIEWS_PATH', dirname(__DIR__) . '/Views');

/* ROUTES */
defined('ROUTES_PATH')
    or define('ROUTES_PATH', dirname(__DIR__) . '/routes');

/* HELPERS */
defined('HELPERS_PATH')
    or define('HELPERS_PATH', dirname(__DIR__) . '/helpers');
