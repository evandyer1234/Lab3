<?php

// your path will be different 
require_once('authorRepo.php'); 

class authorController{

public static function author($id)
{
    // your path will be different 
    $h = require ('pubs_connect.php');

    $auRepo = new authorRepo($h);

    $au = $auRepo->find($id); 

    echo json_encode($au);  
}

public static function authors()
{
    // your path will be different 
    $h = require ('pubs_connect.php');

    $auRepo = new authorRepo($h);

    $authors = $auRepo->findAll(); 

    echo json_encode($authors);
}

public static function addAuthor($item)
{
    // your path will be different 
    $h = require ('pubs_connect.php');

    $auRepo = new authorRepo($h);

    $newauthor = $auRepo->add($item); 

    echo json_encode($newauthor);
}

public static function updateAuthor($item)
{
    // your path will be different 
    $h = require ('pubs_connect.php');

    $auRepo = new authorRepo($h);

    $updatedauthor = $auRepo->update($item); 

    echo json_encode($updatedauthor);
}

public static function removeAuthor($id)
{
    // your path will be different 
    $h = require ('pubs_connect.php');

    $auRepo = new authorRepo($h);

    $removedauthor = $auRepo->remove($id); 

    echo json_encode($removedauthor);
}
}; 



?> 