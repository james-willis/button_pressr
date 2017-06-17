<?php

require_once __DIR__ . '/../vendor/autoload.php';

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

$app = new Silex\Application();
$app['debug'] = true;

$app->get('/', function () {
	$path = __DIR__."/static/views/index.html";
	$index_stream = fopen($path, "rb");
	$index = fread($index_stream, filesize($path));

	return new Response($index, 200);	
});

$app->run();
