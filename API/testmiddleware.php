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


//test for add attributes from middleware 


$addit=function($req,$res,$next){

$res->getBody()->write("---before adding attribute ----");
$req=$req->withAttribute('passed',true);
$res=$next($req,$res);
$res->getBody()->write("---after adding attribute ----");

return $res;

};

//route wite more aattribute
$app->get('/testAddingAttribute',function($req,$res){


$myparm=$req->getAttribute('passed');

$message=array("middleware_attribute"=>$myparm);

$res->withJson($message,200);


})->add($addit);