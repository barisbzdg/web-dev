<?php
if(isset($_GET['code'])){
    $code = $_GET['code'];
    
     $mysqli = new MySQLi('localhost','id12115800_motorsports','666666','id12115800_66');
     
     $resultSet = $mysqli->query("SELECT verified,code FROM kullanicilar WHERE verified = 0 AND code = '$code' LIMIT 1");
    
     if($resultSet->num_rows == 1){
         
         $update = $mysqli->query("UPDATE kullanicilar SET verified = 1 WHERE code = '$code' LIMIT 30");
     
         if($update){
             echo "Onaylandı";
         }else{
             echo $mysqli->error;
         }
     }else{
         echo "Üye bilgileri yanlış";
     }
}else{
    die("Bir şeyler ters gitti");
}
?>

<html>
    <body>
        
    </body>
</html>