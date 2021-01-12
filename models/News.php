<?php

include_once('../config.php');
class News{
    public $id;
    public $title;
    public $image;
    public $detail;
    public $date;
    public $type;
   

    function __construct(){
      
    
        
    }
    function Allnews(){
        global $pdo;
        $pdo_statement=$pdo->prepare("SELECT * FROM news ORDER BY `date` DESC");
        $pdo_statement->execute();
        
         
         $row=$pdo_statement->fetchAll(PDO::FETCH_OBJ);
         return $row;
     
     }
function getAllnewsInCategory_($type){
   global $pdo;
    $pdo_statement=$pdo->prepare("select * from news where type=?");
    $pdo_statement->execute([$type]);
    
    $row=$pdo_statement->fetchAll(PDO::FETCH_OBJ);
    return $row;

}
function getnews($n_id){
    global $pdo;
    $pdo_statement=$pdo->prepare("select * from news where id=?");
    $pdo_statement->execute([$n_id]);

    $row=$pdo_statement->fetchAll(PDO::FETCH_OBJ);
    return $row;

}
function addnews(){
        try {
        global $pdo;
        $pdo_statement=$pdo->prepare("insert into news (title, image, detail, date, type) values (?,?,?,?,?)");
       $pdo_statement->execute([$this->title,$this->image,$this->detail,date('yy-m-d'),$this->type]);
        return true;
    } catch (PDOException $e) {
        echo "Connection failed:".$e->getMessage();
        return false;
    }
   }
   function updateNews(){
    try {
        global $pdo;
        $pdo_statement=$pdo->prepare("update news set title=?,image=?,detail=?,date=?,type=? WHERE id=?");
        $pdo_statement->execute([$this->title,$this->image,$this->detail,$this->date,$this->type,$this->id]); 
        return true;
       } catch (PDOException $e) {
         return false;
       }
   }

   
   function deleteNews(){
       try {
        global $pdo;
        $pdo_statement=$pdo->prepare("delete from  news WHERE id=?");
        $pdo_statement->execute([$this->id]); 
        return true;
       } catch (PDOException $e) {
         return false;
       }
   }
}
?>