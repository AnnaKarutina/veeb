<?php
require_once __DIR__.'/../vendor/autoload.php';

use BookingApp\Application;

$app = new Application();

// käivitame Silexi rakendus
$app->run();
?>