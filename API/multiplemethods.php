<?php
//Multiple Methods
$app->map(['PUT','GET'],'multipleMethodsTest/{id}',function($req,$res,$args){

$id=$args['id'];
if($req->isPut()){
$res->getBody()->write("This id =$id will be updated");

}
if($req->isGet()){
$res->getBody()->write("This id =$id will be retrieved");

}

});