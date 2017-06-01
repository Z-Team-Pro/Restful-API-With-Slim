<?php
//Put Resource 
$app->put('/testput',function($Request ,$Response){
$NewJson=$this->JsonOperations;
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