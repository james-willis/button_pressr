# buttonPressr
> a simple website to learn some php basics

This app is a simple example of how to use WebSockets in php. The WebSocket code is based on the
chat demo from Ratchet's site.

The site is a simple application that shows who has pressed the button recently. The idea for this
site was inspired by a recent post on reddit's /r/node community.

I'm using the web framework Silex for serving the web page and the WebSocket library Ratchet to manage
realtime communication between button pressers.

## Bugs/Todos

* Display an error message if no username
* Make the web page pretty
* Bundle both servers into a single command

## Install


### Prerequisites

On Ubuntu you'll need php7.x and composer. To install: 

```
apt-get install php
apt-get install php-xml
apt-get install composer
```

### Set up the project

Download the code and install dependencies:

```
git clone https://github.com/james-willis/button_pressr.git
cd button_pressr
composer install
``` 
## Run the site
Start the web server:
```
php -S localhost:8000 -t web
```

Start the WebSocket server:
```
php socketServer.php
```
