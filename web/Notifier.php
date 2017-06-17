<?php

use Ratchet\MessageComponentInterface;
use Ratchet\ConnectionInterface;

class Notifier implements MessageComponentInterface {
    protected $clients;

    public function __construct() {
        $this->clients = new \SplObjectStorage;
    }

    public function onOpen(ConnectionInterface $conn) {
        // Add new connection to list of active connections
        $this->clients->attach($conn);
        echo "New connection: {$conn->resourceId}\n";
    }

    public function onMessage(ConnectionInterface $from, $msg) {
        echo "New message from {$from->resourceId}, {$msg}\n";
        // TODO sanitize inputs
        // Forward message on to all other clients
        foreach ($this->clients as $client) {
            if ($from !== $client) {
                $client->send($msg);
            }
        }
    }

    public function onClose(ConnectionInterface $conn) {
        $this->clients->detach($conn);
        echo "Closed connection: {$conn->resourceId}\n";
    }

    public function onError(ConnectionInterface $conn, \Exception $e) {
        $conn->close();
        echo "An error has occurred: {$e->getMessage()}\n";
    }
}