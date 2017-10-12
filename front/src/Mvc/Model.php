<?php

namespace Front\Mvc;

use Front\Config;

class Model
{
    public $databases;

    public function __construct()
    {
       if(!$this->databases)
       {
           $this->databases = Config::get('database.default');
       }
    }

    public function storage($storage = 'default')
    {
        $dbconfig = Config::get("database.{$storage}");

        if($dbconfig && is_array($dbconfig))
        {
            $this->databases = $dbconfig;
        }

        return $this;
    }

    public function select()
    {
        echo "<pre>";
        print_r($this->databases);
        print_r('this is base model.select');
    }
}