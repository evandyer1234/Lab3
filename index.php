<?php

// https://www.youtube.com/watch?v=2_dqDpSSpsc

//declare ( strict_types = 1 );

require_once ('router.php'); // instead of composer 
require_once ('sampleController.php'); 
require_once ('authorController.php'); 

//use App; 

$router = new router(); 

// setup routes 
$router->get("/", function (){

    //echo 'Home page'; 
    require_once 'ajax.html'; // 'index.html'; 
    //require_once 'author.html'; 
}); 

$router->get('/author', function ($id){

    require_once 'author.html'; 
    
}); 

$router->post('/authorg', function($form){ // buggy 
    
    $id = $form['id']; 

    authorController::author($id); 

}); 


$router->get('/about', function (){


    //echo 'about page'; 

    sampleController::about(); 

}); 

$router->get('/hello', function ( $args )
{
    //echo var_dump($args); 
    echo $args['str1']; 
}); 

$router->post('/hello', function ( $args )
{
    //echo var_dump($args); 
    echo $args['str2']; 
}); 

$router->addNotFoundHandler( function ()
{
    // using __DIR__ 
    // https://www.tutorialspoint.com/how-to-use-dir-in-php

    
    require_once '404.html'; 
}
); 

// excute requiested route 
$router->run(); 


?>

