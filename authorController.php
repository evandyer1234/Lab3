<?php

// your path will be different 
require_once(__DIR__ . '/php/repo/authorRepo.php'); 

class authorController{

public static function author($id)
{
    // your path will be different 
    $h = require (__DIR__ . '/php/repo/pubs_connect.php');

    $auRepo = new authorRepo($h);

    $au = $auRepo->find($id); 

    echo json_encode($au);  
}

}; 



?> 