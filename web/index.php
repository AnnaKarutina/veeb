<?php
require_once __DIR__.'/../vendor/autoload.php';
// loome Silex rakenduse objekti
$app = new Silex\Application();
// lubame silumist 
$app['debug'] = true;
// kasutame get meetodi, mille parameetrid on
// hello - kontroller, mis tuleb tööle
// funktsioon, mis tuleb tööle, kui 
// aadressireal on kirjutatud hello
$app->get('/hello', function(){
	return "Hello World!";
});
// käivitame Silexi rakendus
$app->run();
?>