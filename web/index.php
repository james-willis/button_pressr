<?php

require_once __DIR__ . '/../vendor/autoload.php';

$app = new Silex\Application();
$app['debug'] = true;

// Register twig
$app->register(new Silex\Provider\TwigServiceProvider(), array(
    'twig.path' => __DIR__.'/views',
));


$app->get('/', function () use($app) {
    return $app['twig']->render('index.html');
});

$app->post('/click', function() use($app) {
	return "you clicked the button";
});

$app->run();
