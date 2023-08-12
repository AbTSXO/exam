<?php 
function connect_db()
{
    define("HOST", "localhost");
    define("USER", "root");
    define("PWD", "");
    define("DB_NAME", "act");
    
    $con = new mysqli(HOST, USER, PWD, DB_NAME);
    
    if($con->connect_errno){
        echo "connection failed: " . $con->connect_error;
        exit();
    }
    
   return $con;
}
?>