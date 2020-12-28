<?php
 
   
     $serverName="localhost";
     $userName="root";
     $password="";
     $databaseName="news";
     $pdo;
    
        try{
        $pdo=new PDO("mysql:host=$serverName;dbname=$databaseName",$userName,$password);
    }
        catch(PDOException $e){
            echo "Connection failed:".$e->getMessage();
        }
       


?>