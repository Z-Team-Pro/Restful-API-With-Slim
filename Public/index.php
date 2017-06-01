<?php

require '../vendor/autoload.php';

$conf=[
'settings'=>[
'displayErrorDetails'=>true,
],
];

$c= new \Slim\Container($conf);
$app = new \Slim\App($c);
 require '../lib/middlewareClass.php';
 require '../src/middleware.php';
 require '../API/others.php';
 require '../API/optional.php';
  require '../API/multiplemethods.php';
   require '../API/put.php';
  require '../API/args.php';
  require '../API/jsonresponse.php';
  require '../API/posttest.php';
require '../API/request.php';
require '../API/response.php';
require '../API/testmiddleware.php';

$app->run();
//
