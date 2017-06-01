<?php

//middleware

$app->add(function($req,$res,$next){

$res->getBody()->write("befor");
$res=$next($req,$res);
$res->getBody()->write("after");

return $res;




});