# buttonPressr
> a simple website to learn some php basics

This app is a toy I'm building to practice some simple php concepts.

The goal of the site is to have a single page where users can enter a username and press a button. When any user presses a button, all users recieve a notification on their screen. The idea was inspired by a recent post on /r/node.

I'm using the microframework Silex. I'll probably need to do something with websockets but I haven't gotten that far yet. 

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
```
php -S localhost:8000 -t web
```
