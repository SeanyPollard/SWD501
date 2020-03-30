<?php
require('vendor/autoload.php');


// Import classes from the Psr library (standardised HTTP requests and responses)
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;

use Slim\Factory\AppFactory;

// Create our app.
$app = AppFactory::create();

// Add routing functionality to Slim. This is not included by default and
// must be turned on.
$app->addRoutingMiddleware();

// For the routes to work correctly, you must set your base path.
// This is the relative path of your webspace on the server, including the
// folder you're using but NOT public_html. Here we are assuming the Slim app
// is saved in the 'slimapp' folder within 'public_html' 
$app->setBasePath('/~ephp059/slimapp');


// Set up a simple 'hello' route.
$app->get('/hello', function(Request $req, Response $res, array $args) {
    $res->getBody()->write('Hello world!');
    return $res;
});

// Run the Slim app.
$app->run();
?>