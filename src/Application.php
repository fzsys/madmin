<?php

namespace Madmin;

class Application
{
    private $settings;
    private $extension;

    public function __construct(array $settings)
    {
        $this->settings = $settings;
        $this->extension = $this->getDriver($settings['driver']);
        var_dump($this->extension);
    }

    private function getDriver(string $preferred_driver) : string {
        $extension = $preferred_driver && class_exists($preferred_driver) ? $preferred_driver :
            class_exists('Memcache') ? 'Memcache' :
            class_exists('Memcached') ? 'Memcached' : false;

        if (!$extension) {
            throw new \Error('No Memcache extensions found');
        }

        return $extension;
    }
}