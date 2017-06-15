<?php

require dirname(__DIR__) . '/vendor/autoload.php';

use Ratchet\Server\IoServer;
use Ratchet\Http\HttpServer;
use Ratchet\WebSocket\WsServer;
include("Notifier.php");

$server = IoServer::factory(
    new HttpServer(
        new WsServer(
            new Notifier()
        )
    ),
    8080
);
echo "Starting Server...\n";
$server->run();