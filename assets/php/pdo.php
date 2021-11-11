<?php
   try{
      $pdo=new PDO("mysql:host=mysql-younes.alwaysdata.net;dbname=younes_spikeexcel","younes","MOLImoli1");
   }catch(PDOException $e){
      echo $e->getMessage();

   }

    
?>