<?php
require_once __DIR__.'/../vendor/autoload.php';

// loome Silex rakenduse objekti
$app = new Silex\Application();

// lubame silumist 
$app['debug'] = true;

// anname teada, et html failid hakkavad
// asuma views kataloogis
$app->register(new Silex\Provider\TwigServiceProvider(), ['twig.path' => __DIR__.'/../views', ]);
// lubame andmebaasi teeki kasutamist
// ning paneme antud andmebaasi konfiguratsiooni
// kirja
$app->register(new Silex\Provider\DoctrineServiceProvider(), [
		'db.options' => [
			'driver' => 'pdo_sqlite',
			'path' => __DIR__.'/../database/app.db',
		],
	]);
// lisame andmebaasi tabeli
if (!$app['db']->getSchemaManager()->tablesExist('bookings')) {
    $app['db']->executeQuery("CREATE TABLE bookings (
        id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
        firstName VARCHAR(40) NOT NULL,
        lastName VARCHAR(40) NOT NULL,
        phone VARCHAR(10) NOT NULL,
        email VARCHAR(20) DEFAULT NULL,
        birthday DATE NOT NULL,
        startDate DATE NOT NULL,
        endDate DATE NOT NULL,
        arrivalTime TIME DEFAULT NULL,
        additionalInformation TEXT,
        nrOfPeople INT NOT NULL,
        payingMethod VARCHAR(10) NOT NULL
    );");
}


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