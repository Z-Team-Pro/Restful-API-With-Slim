<?php


$test=function($req,$res,$next){

$res->getBody()->write("this is my scure middleware ");
$res=$next($req,$res);
return $res; 

};

$app->get('/testmiddleware',function($req,$res){



$res->getBody()->write("---this is your Route fucntion----");


});


//for this route only


$app->get('/scureRoute',function($req,$res){

$res->getBody()->write("---this is your  scure Route ----");

})->add($test);


//with middleware class

$app->get('/withMidClass',function($req,$res){

$res->getBody()->write("---this is My Route With middleware Class ----");

})->add(new middelwareClass());