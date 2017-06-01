<?php

$app->get('/token',function($req,$res)
{

return$res->withJson("success",200);

});