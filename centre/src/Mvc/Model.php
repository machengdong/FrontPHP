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

    public function storage($storage=null)
    {
        if($storage)
        {
            $this->databases = Config::get("database.{$storage}");
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