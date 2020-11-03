<?php

class View
{
    public function __construct()
    {
    }

    public function render($view, $data = [])
    {
        $file = VIEWS_PATH . '/' . $view . '.php';

        if (file_exists($file)) {
            require $file;
        } else {
            require_once VIEWS_PATH . '/User/main/404.php';
        }
    }
}
