<?php 

function pdoConnexion(){
    return new  PDO("mysql:host=mysql-younes.alwaysdata.net;dbname=younes_spikeexcel","younes","MOLImoli1");
}

function upload(){
    $pdo = pdoConnexion();
    echo "test";
    var_dump($_POST);
    exit;
}

//function for notif confirmation email
function confirme(){
    $pdo = pdoConnexion();
    $verif_mail = $pdo->prepare("SELECT confirme from users where login=? ");
    $verif_mail->execute(array($_SESSION['login']));
    $confirme = $verif_mail->fetchColumn();

    $vkey = $pdo->prepare("SELECT vkey from users where login=? ");
    $vkey->execute(array($_SESSION['login']));
    $vconfirme = $vkey->fetchColumn();
    if ($_SESSION["autoriser"]=='oui') {
        if ($confirme !== "1") {
            echo  '<div class="alert alert-primary" role="alert"><strong> Verify your email to activate your account</strong><br> An email with verification code has been sent to your email: <strong>'. $_SESSION['login'] .'</strong><br>if you would like a new code , or you haven\'t receeived the, <a href="assets/php/verif/email_verif.php">Click here<a> to send a new one</a></a></div>';
        }
    }
}

?>