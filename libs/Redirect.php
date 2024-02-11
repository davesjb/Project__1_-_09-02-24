<?php



class Redirect
{
    public static function to($page)
    {
        header("Location: $page");
        exit();
    }
}
