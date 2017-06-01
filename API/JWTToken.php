<?php

$app->get('/JWTToken',function($req,$res){

$MyJWT=$this->JWT;
    $now = new DateTime();
    $future = new DateTime("now +1 minutes");
   // $server = $request->getServerParams();
    $payload = [
        "iat" => $now->getTimeStamp(),
        "exp" => $future->getTimeStamp(),
        "sub" =>"test for JWT",
    ];
    $secret = "supersecretkeyyoushouldnotcommittogithub";
    $token = $MyJWT->encode($payload, $secret, "HS512");
    $data["status"] = "ok";
    $data["token"] = $token;
    return $res->withStatus(201)
        ->withHeader("Content-Type", "application/json")
        ->write(json_encode($data, JSON_UNESCAPED_SLASHES | JSON_PRETTY_PRINT));





});