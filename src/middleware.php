<?php



use \Slim\Middleware\HttpBasicAuthentication\AuthenticatorInterface;



class AuthenticatorClass implements AuthenticatorInterface{



public function __invoke(array $arguments){



$user=$arguments['user'];
$password=$arguments['password'];

if($user=='ramy'&&$password=="1234"){

    return true;
}
else{

    return false;
}

}


}



$app->add( new \Slim\Middleware\HttpBasicAuthentication(
[
'path'=>'/token','authenticator'=> new AuthenticatorClass()
]

));

//middleware
/*
$app->add(function($req,$res,$next){

$res->getBody()->write("befor");
$res=$next($req,$res);
$res->getBody()->write("after");

return $res;




});
*/



