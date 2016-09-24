<?php
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