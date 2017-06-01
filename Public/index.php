<?php

require '../vendor/autoload.php';





$app = new \Slim\App;
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
