<?php

require_once __DIR__ . '/../vendor/autoload.php';

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

$app = new Silex\Application();
$app['debug'] = true;

$app->get('/', function () use($app) {
	$path = __DIR__."/static/index.html";
	$index_stream = fopen($path, "rb");
	$index = fread($index_stream, filesize($path));

	return new Response($index, 200);	
});

$app->post('/click', function(Request $request) use($app) {
	$name = $request->get('name');
	$time = time();
	$date = date('D, M jS, Y');

	// add click to log
	// TODO: deal with concurrent accesses to the log
	$log = fopen('../log.txt', 'ab');
	$new_entry = $time . ' ' . $name . "\n"; 
	// TODO error handle writing to log
	fwrite($log, $new_entry);

	// return web page
	return new Response($name . ' clicked the button at ' . $date . '.', 201);
});

$app->run();
