<?php

namespace App;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

require __DIR__ . '/../vendor/autoload.php';

error_reporting(E_ALL);

$environment = 'development';

/**
 * Registering Error Handler
 */
$whoops = new \Whoops\Run;
if ($environment !== 'production') {
  $whoops->pushHandler(new \Whoops\Handler\PrettyPageHandler);
} else {
  $whoops->pushHandler(function($e){
    echo 'Something bad happened! Send an email to the developer';
  });
}
$whoops->register();

$request = Request::createFromGlobals();
$response = new Response();
$response->prepare($request);

$response->setStatusCode(Response::HTTP_OK);
$response->setContent('Hai Hai');
$response->send();
