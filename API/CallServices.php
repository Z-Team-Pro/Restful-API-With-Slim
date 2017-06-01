<?php

$app->get('/GetServices',function($req,$res)
{


$MyJson=$this->JsonOperations;
$testarray=array("first"=>true,"test"=>false);
$out=$MyJson->encode($testarray);
$res->getBody()->write($out);

});


$app->get('/MoreGetServices',function($req,$res)
{


$MyJson=$this->get('JsonOperations');
$testarray=array("first2"=>true,"test2"=>false);
$out=$MyJson->encode($testarray);
$res->getBody()->write($out);

});


