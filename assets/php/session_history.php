<?php
    include('pdo.php');
    // ip du client
    if (!empty($_SERVER['HTTP_CLIENT_IP'])) {
    $ip = $_SERVER['HTTP_CLIENT_IP'];
    } elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
    $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
    } else {
    $ip = $_SERVER['REMOTE_ADDR'];
    }
                                                               
   
    $details = json_decode(file_get_contents("http://ipinfo.io/{$ip}/json"));
    $timezone = $details->timezone;
    $conutry = $details->country;
    $postal = $details->postal;
    $city_name = $details->city;
    $location = $timezone . " " .  $city_name . " "  . $conutry . " " . $postal;
  

    $verif_ip = $pdo->prepare("SELECT * from session_history where ip=?");
    $verif_ip->execute(array($ip));
    $result = $verif_ip->fetchAll();
 
                                               
    // si l'utilisateur n'est pas deja dans la table
    if(count($result) == 0){
    
    $ins=$pdo->prepare("insert into session_history(login,ip,country,location) values(?,?,?,?)");
    $ins->execute(array('',$ip,$timezone,$location));
                                                                   

    }
    // mise-à-jour
    else{
  
        $req = $pdo->prepare("UPDATE session_history SET login=? WHERE ip= ?");
        $req->execute(array($_SESSION['login'],$ip));                                              
    }
                                                            
?>