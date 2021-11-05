<?php
session_start();
include('../pdo.php');
$login = $_SESSION["login"];
$username = $_SESSION["username"];

$code=$pdo->prepare("select vkey from users where login=? limit 1");
$code->execute(array($_SESSION["login"]));
$vkey=$code->fetchColumn();



if(!empty($vkey)){
    
    $emails = "contact@spikeexcel.ga";
    $name = "Support SpikeExcel";
    $to  = $login; // notez la virgule

    // Sujet
    $subject = 'Email Verification';

    // message
    $message = '<!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <link rel="stylesheet" href="style.css">
        <title>Email</title>
    </head>
    <body>
    <style>
        
    .logo{
        width: 150px;
        padding: 5px 5px;
    }
    
    </style>
        <main class="container">
            <div class="logo">
                    <img src="https://www.spikeexcel.ga/assets/img/logo2.png" class="logo">
            </div>
            <div class="body">
                <h2>Email Confirmation</h2>
                <strong>Hi '." $username".',</strong>
                <p> Thanks for registering an account With SpikeExcel Team! 
                    Before we get started, we\'ll need to verify your account.</p>
               <p>link: <a href='."https://www.spikeexcel.ga/auth/register/verify.php?vkey=$vkey".'>Verify Email</a></p>
             <a href='."https://www.spikeexcel.ga/auth/register/verify.php?vkey=$vkey".'> <button>Verify Email</button></a>
            </div>
        </main>
    </div>
    </body>
    </html>';

    // Pour envoyer un mail HTML, l'en-tête Content-type doit être défini
    $headers[] = 'MIME-Version: 1.0';
    $headers[] = 'Content-type: text/html; charset=iso-8859-1';

    // En-têtes additionnels
    $headers[] = 'To:' . $login;
    $headers[] = 'From: ' . $emails;

    // Envoi
    mail($to, $subject, $message, implode("\r\n", $headers));
    header("location: ../../../index.php");
    var_dump($vkey);
}else{
    echo "error contact our services: contact@spikeexcel.ga";
   
}

?>