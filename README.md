# buttonPressr
> A simple website that demonstrates some php basics.

This app is a simple example of using WebSockets in php with the Ratchet library. The site is a
single page app that shows all active users who has pressed the button since they've loaded the
page. The idea for this site was inspired by a recent post on reddit's /r/node community.

## Install

### Prerequisites

On Ubuntu you'll need php7.x and composer. To install: 

```bash
apt-get install php
apt-get install php-xml
apt-get install composer
```

### Set up the project

Download the code and install dependencies:

```bash
git clone https://github.com/james-willis/button_pressr.git
cd button_pressr
composer install
``` 
## Run the site

Start the web server:
```bash
php -S localhost:8000 -t web
```

Start the WebSocket server:
```bash
php socketServer.php
```
