<?php
use \Psr\Http\Message\ServerRequestInterface as Request;
use \Psr\Http\Message\ResponseInterface as Response;

require '../vendor/autoload.php';

$app = new \Slim\App;
$app->get('/hello/{name}', function (Request $request, Response $response) {
    $name = $request->getAttribute('name');
    $response->getBody()->write("Hello World, $name");

    return $response;
});

$app->get('/test/{new}', function (Request $request, Response $response) {
    $new = $request->getAttribute('new');
    $response->getBody()->write("This is test, $new");

    return $response;
});
//POST TEST 
$app->post('/test/demo',function(Request $r1,Response $r2){

$data=$r1->getParsedBody();
$inputdata=[];
$inputdata['name']=filter_var($data['name'],FILTER_SANITIZE_STRING);
$inputdata['phone']=filter_var($data['phone'],FILTER_SANITIZE_STRING);
$r2->getBody()->write("dear".$inputdata['name']."Your phone number is ".$inputdata['phone']);

});
//Using args argments
$app->get('/testargs/{name}/{phone}',function($request ,$response,$args){

$name=$args['name'];
$phone=$args['phone'];
$response->getBody()->write("This is a test for args ,$name your phone number is $phone");
});
//Json Response TEST 
$app->get('/jsontest/{FirstName}/{LastName}',function($Request ,$Response ,$args){

$FirstName=$args['FirstName'];
$LastName=$args['LastName'];
$out=[];
$out['Status']=200;
$out['Message']="This is JSON Response TEST";
$out['FirstName']=$FirstName;
$out['LastName']=$LastName;
$Response->getBody()->write(json_encode($out));

});
//Put Resource 
$app->put('/testput',function($Request ,$Response){

$data=$Request->getParsedBody();
$username=$data['UserName'];
$Password=$data['Password'];
$Response->getBody()->write("$username your Password is $Password");

}); 
//Delete resource 
$app->delete('/testdelete',function($Request ,$Response){

$data=$Request->getParsedBody();
$username=$data['UserName'];
$Password=$data['Password'];
$Response->getBody()->write("$username your Password is $Password With Delete Test Demo ");

}); 
//mutliple Methods 
$app->map(['PUT','GET'],'/multipleMethodsTest/{id}',function($Request ,$Response,$args){
$id=$args['id'];
if($Request->isPut()){

$Response->getBody()->write("This id=$id Will be updated ");

}
if($Request->isGet()){

$Response->getBody()->write("This id=$id Will be retrived  ");
}
});
//Optional Segments 
$app->get('/optional[/{id}]',function($req ,$res ,$args){

$id=$args['id'];
if (is_null($id)){
$res->getBody()->write("The id is null");
}
else{

$res->getBody()->write("The id = $id");	
}


});
//multiple Optional Segments 
$app->get('/multiple/optional[/{year}[/{month}]]',function($req ,$res ,$args){

$year=$args['year'];
$month=$args['month'];
if (is_null($year)){
$res->getBody()->write("The year and month are null");
}
else{
if( is_null($month)){
$res->getBody()->write("The year=$year  and  the month is null");
}
else{
$res->getBody()->write("The year=$year  and  the month=$month");	
}}


});

//unlimited Optional segments 
$app->get('/unlimited/optional[/{parms:.*}]',function($req ,$res ,$args){
$parms=explode('/', $req->getAttribute('parms'));

if (empty($parms[0])){
$res->getBody()->write("The parms list is null");
}
else{
	$out="";
foreach ($parms as $key => $value) {
	$out=$out." " ."$key => $value";
}
$res->getBody()->write($out);	
}

});
//regular expression test
$app->get('/regular/{id:[0-9]+}/{name:[a-z]+}',function($req ,$res ,$args){

$id=$args['id'];
$name=$args['name'];
$res->getBody()->write("This id = $id,The name is $name" );


});


$app->run();
//
