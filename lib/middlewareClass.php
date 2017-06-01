<?php

class middelwareClass{


public function __invoke($req,$res,$next){


$res->getBody()->write("----this is my middleware Class--- ");
$res=$next($req,$res);
return $res;


}


}