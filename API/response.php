<?php
$app->get('/responseTest',function($Req ,$Res,$args){

$out=[];

//Status
$newResponse=$Res->withStatus(302);

//headers
$newResponse=$newResponse->withHeader('content-type','appliaction/json');
$newResponse=$newResponse->withHeader('allow','Get');
$newResponse=$newResponse->withAddedHeader('allow','Put');
$out['Get Status']=$newResponse->getStatusCode();
$out['IfHeaderExist' ]=$Res->hasHeader('content-type');
$Headers=$newResponse->getHeaders();

foreach ($Headers as $key => $value) {
	$out[$key]= $key  .":". implode(",", $value);
}
//Body
//$newResponse->getBody()->write(json_encode($out));
//WithJosn Method 
$newResponse=$newResponse->withJson($out);

return $newResponse;


});