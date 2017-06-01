<?php

class JsonService{

public function encode($array){

return json_encode($array);



}


public function decode($array){

return json_decode($array);


}



}