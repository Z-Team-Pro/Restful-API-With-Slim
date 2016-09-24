<?php

require '../vendor/autoload.php';

$app = new \Slim\App;

 require '../API/others.php';
 require '../API/optional.php';
  require '../API/multiplemethods.php';
   require '../API/put.php';
  require '../API/args.php';
  require '../API/jsonresponse.php';
  require '../API/posttest.php';



$app->run();
//
