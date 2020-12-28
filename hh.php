<?php
// include('adodb/tohtml.inc.php');
// include('adodb/adodb.inc.php');

// $server="localhost";
// $user="root";
// $password="";
// $database="news";

//          $db = ADONewConnection("mysqli"); 
//     $db->Connect($server, $user, $password, $database);
// echo date('d-m-Y');
//          $rs = $db->Execute('insert into news values(\'www\',\'ewedw\',\'uuuuuu\',null,\'4\')');

//          $db->debug = true;

$type=null;
$imgname=sha1(date("dd-mm-yyyy/hh:mm:ss:ff").random_bytes(3));
$data = explode(',',$_POST['image']);
$type=explode('/',$data[0]);
$type=explode(';',$type[1]);
$_type=$imgname.".".$type[0];
$ifp=fopen($_type,'wb');
var_dump($data);
fwrite($ifp,base64_decode($data[1]));
fclose($ifp);
exit;
?>