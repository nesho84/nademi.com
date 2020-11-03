<?php

/**
 * Get's the current page from the url
 * @param $current_page gets the current page
 * @return string if the $current_page matches
 */
function activePage($currentPage)
{
    $url = isset($_GET['url']) ? $_GET['url'] : "/";
    $url = "/" . rtrim($url, '/');
    $url = filter_var($url, FILTER_SANITIZE_URL);

    if ($currentPage == $url) {
        echo 'active';
    }
}
