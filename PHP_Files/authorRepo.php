<?php

include_once 'IRepo.php'; 

$h = require 'pubs_connect.php';

class authorRepo implements IRepository{

    private $handle;

    public function __construct($handle)
    {
        $this->handle = $handle;
    }

    //public function __destruct() {
       // $handle = null; 
   // }


    public function add($item){
        $sql = 'INSERT INTO authors (au_fname, au_lname, contract),  VALUES(:fname, :lname, :c)';
        $stmt = $this->handle->prepare($sql); 
        
        $stmt->bindParam(':fname', $item['au_fname'], PDO::PARAM_STR);
        $stmt->bindParam(':lname', $item['au_lname'], PDO::PARAM_STR);
        $stmt->bindParam(':c', $item['contract'], PDO::PARAM_STR);

        $stmt->execute(); 
        
        // FETCH_ASSOC = index by column name 
        $author = $stmt->fetchAll(PDO::FETCH_ASSOC)[0]; // get array 
        
        return $author;
    }

    public function find($id){

        $sql = 'SELECT * FROM authors WHERE au_id = :auid'; 

        
        $stmt = $this->handle->prepare($sql); 
        
        $stmt->bindParam(':auid', $id, PDO::PARAM_STR); 
        
        $stmt->execute(); 
        
        // FETCH_ASSOC = index by column name 
        $author = $stmt->fetchAll(PDO::FETCH_ASSOC)[0]; // get array 
        
        return $author; 

    }

    public function findAll(){
        $sql = 'SELECT * FROM authors';

        $stmt = $this->handle->query($sql);

        // FETCH_ASSOC = index by column name
        $authors = $stmt->fetchAll(PDO::FETCH_ASSOC); //get array

        return $authors;
    }
    public function update($item){
        $sql = 'UPDATE authors,
        SET au_fname = :fname, au_lname = :lname, contract = :c, 
        WHERE au_id = :auid';

        $stmt = $this->handle->prepare($sql); 
        
        $stmt->bindParam(':auid', $item['au_id'], PDO::PARAM_STR);
        $stmt->bindParam(':fname', $item['au_fname'], PDO::PARAM_STR);
        $stmt->bindParam(':lname', $item['au_lname'], PDO::PARAM_STR);
        $stmt->bindParam(':c', $item['contract'], PDO::PARAM_STR);

        $stmt->execute(); 

        // FETCH_ASSOC = index by column name 
        $author = $stmt->fetchAll(PDO::FETCH_ASSOC)[0]; // get array 

        return $author;
    }
    public function remove($id){
        $sql = 'DELETE FROM authors WHERE au_id = :auid'; 
        
        $stmt = $this->handle->prepare($sql); 
        
        $stmt->bindParam(':auid', $id, PDO::PARAM_STR); 
        
        $stmt->execute(); 

        //return true if !exist
    }
}

?>