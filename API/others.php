<?php
//regular expression test
$app->get('/regular/{id:[0-9]+}/{name:[a-z]+}',function($req ,$res ,$args){

$id=$args['id'];
$name=$args['name'];
$res->getBody()->write("This id = $id,The name is $name" );

});
//group of Routes 
$app->group('/grouptest', function($req ,$res) use($app){
$app->get('',function ($req,$res){
$res->getBody()->write("Get Empty method");
});
$app->put('',function ($req,$res){
$res->getBody()->write("Put Empty method");
});
$app->get('/{id}',function ($req,$res ,$args){
	$id=$args['id'];
$res->getBody()->write("Get with id =$id ");
});
$app->post('/postdata',function ($req,$res ){
	
$res->getBody()->write("Post Method ");
});
});
//nested groups of Routes
$app->group('/API',function($req ,$res) use($app){

$app->group('/V1',function($req ,$res) use($app){

$app->get('/getuser',function($req ,$res){

echo "getuser V1";
});
$app->Post('/adduser',function($req ,$res){

echo "adduser V1";
});
});

$app->group('/V2',function($req ,$res) use($app){

$app->get('/getuser',function($req ,$res){

echo "getuser V2";
});
$app->Post('/adduser',function($req ,$res){

echo "adduser V2";
});
});



});