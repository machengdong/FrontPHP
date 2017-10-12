<?php

namespace Front\Interfaces;

interface Dbdriver
{
    public function connect($config = [], $name = false);
    public function query($sql);
    public function execute($sql);
    public function count($sql);
    public function errorinfo();
    public function beginTransaction();
    public function commit();
    public function rollBack();
}