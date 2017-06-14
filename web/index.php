<?php

require_once __DIR__ . '/../vendor/autoload.php';

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

$app = new Silex\Application();
$app['debug'] = true;

// Register twig
$app->register(new Silex\Provider\TwigServiceProvider(), array(
    'twig.path' => __DIR__.'/views',
));


$app->get('/', function () use($app) {
    return $app['twig']->render('index.html');
});

$app->post('/click', function(Request $request) use($app) {
	$name = $request->get('name');
	$time = time();
	$date = date('D, M jS, Y');

	// add click to log
	// TODO: deal with concurrent accesses to the log
	$log = fopen('../log.txt', 'ab');
	$new_entry = $time . ' ' . $name; 
	// TODO error handle writing to log
	fwrite($log, $new_entry);

	// return web page
	return new Response($name . ' clicked the button at ' . $date . '.', 201);
});

$app->run();
