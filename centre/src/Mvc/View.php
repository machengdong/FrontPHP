<?php

namespace Front\Mvc;

final class View
{

    public function __construct()
    {

    }

    public static function display($file,$data=[])
    {
        extract($data);
        include VIEW_PATH.$file;
    }
}