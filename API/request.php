<?php
$app->post('/requestTest/{name}',function($req ,$res,$args){

$out=[];
$out['method']=$req->getMethod();
$out['content']=$req->getContentType();
$out ['isget']=$req->isGet();
$out ['mediaType']=$req->getMediaType();
 $out['Port']=$req->getUri()->getPort();
$out['Host']=$req->getUri()->getHost();
$out ['isxhr']=$req->isXhr();
$out['Body Data']=$req->getParsedBody();
$out['Request Name ']=$req->getAttribute('name');

//Headers 

$Headers=$req->getHeaders();
$I=-1;
foreach ($Headers as $key => $value) {
	$out[$key]= $key  .":". implode(",", $value);
}
$res->getBody()->write(json_encode($out));

});