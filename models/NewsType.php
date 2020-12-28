<?php
include('../config.php');
class NewsType{
    public $id;
    public $type;
    function __construct(){
      
        
    }
function getAllType(){
      global $pdo;

    $pdo_statement=$pdo->prepare("SELECT * FROM types");
    $pdo_statement->execute();
    

    return $pdo_statement->fetchAll(PDO::FETCH_OBJ);

}
function addType(){
    try {
        global $pdo;
    $pdo_statement=$pdo->prepare("insert into types(type) valuse(?)");
   echo $pdo_statement->execute([$this->type]);
    return true;
    } catch (PDOException $e) {
        return false;
    }
}
function updateType(){
    try {
        global $pdo;
 $pdo_statement=$pdo->prepare("update types set type=? WHERE id=?");
       $pdo_statement->execute([$this->type,$this->id]); 
        return true;
       } catch (PDOException $e) {
         return false;
       }
   }

   
   function deleteType(){
       try {
        global $pdo;
$pdo_statement=$pdo->prepare("delete from  types WHERE id=?");
       $pdo_statement->execute([$this->id]); 
        return true;
       } catch (PDOException $e) {
         return false;
       }
   } 
    }
    
?>
