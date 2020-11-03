<?php

class ForceRedirect
{
    public static function redirect($url)
    {
        if (headers_sent()) {
            echo ("<script>location.href='$url'</script>");
        } else {
            header("Location: $url");
        }
    }
}
