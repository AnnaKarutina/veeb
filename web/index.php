<?php
require_once __DIR__.'/../vendor/autoload.php';

// loome Silex rakenduse objekti
$app = new Silex\Application();

// lubame silumist 
$app['debug'] = true;

// anname teada, et html failid hakkavad
// asuma views kataloogis
$app->register(new Silex\Provider\TwigServiceProvider(), ['twig.path' => __DIR__.'/../views', ]);

// kasutame get meetodi, mille parameetrid on
// hello - kontroller, mis tuleb tööle
// funktsioon, mis tuleb tööle, kui 
// aadressireal on kirjutatud hello

// nüüd hello asemel on views kataloogist
// mallide lugemine
// siin on võetud kasutusele alnonüümne funktsioon
// $app võimaluste ja omaduste pärimiseks
$app->get('/bookings/create', function() use ($app){
	return $app['twig']->render('base.html.twig');
});

// käivitame Silexi rakendus
$app->run();
?>