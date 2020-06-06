<?php
require_once 'vendor/autoload.php';

$settings = require 'settings.php';

try {
    new Madmin\Application($settings);
} catch (Error $e) {
    //TODO: add error processing
    var_dump($e);
}