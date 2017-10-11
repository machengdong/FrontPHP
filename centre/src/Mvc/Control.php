<?php

namespace Front\Mvc;

class Control
{

    public function __construct()
    {

    }

    public function display($file,$data=[])
    {
        View::display($file,$data);
    }
}