<?php

class Config
{
    protected $settings;

    public function __construct()
    {
        $this->settings = array();
    }

    public static function load($path)
    {
        $config = new static();

        if (file_exists($path))
            $config->settings = include $path;

        return $config;
    }
}
