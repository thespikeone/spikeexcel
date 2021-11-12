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
//function for empty social media database
function social_empty(){
  $pdo = pdoConnexion();
  $verif_social = $pdo->prepare("INSERT INTO `social` (`id`, `login`, `website`, `github`, `twitter`, `instagram`, `facebook`) VALUES (NULL, ?, '', '', '', '', '')");
  $verif_social->execute(array($_SESSION['login']));
}
//function for empty adress database
function adress_empty(){
  $pdo = pdoConnexion();
  $verif_mail = $pdo->prepare("INSERT INTO `adress` (`id`, `login`, `bio`, `adress`, `country`, `street`, `postal_code`, `phone_area`, `phone_number`, `date_of_birth`) VALUES (NULL, ?, '', '', '', '', '', '', '', '')");
  $verif_mail->execute(array($_SESSION['login']));
}
//function for empty avatar database
function avatar_empty(){
  $pdo = pdoConnexion();
 
  $verif_avatar = $pdo->prepare("INSERT INTO profile_image (login,path) VALUES (?, ?)");
  $verif_avatar->execute(array($_SESSION['login'],""));
}
//function upload profile image
function upload_profile_photo(){
  $pdo = pdoConnexion();
  extract($_POST); 
        if(isset($_POST['upload_photo'])){
            $folder = "../assets/php/avatar/" . $_SESSION['login'] . "/";
            
            if(!is_dir($folder)){
                mkdir($folder);
            }

            $list_extension = array('jpg' => 'image/jpg', 'jpeg' => 'image/jpeg', 'png' => 'image/png', 'gif' => 'image/gif');
            $list_extensionIE = array('jpg' => 'image/pjpg', 'jpeg' => 'image/pjpeg'); //extension autoriser pour internet explorer
            $extension_valid = array('jpg', 'jpeg', 'gif', 'png');
            

            $fichier = basename($_FILES['new_profile_img']['name']);
            $fichier_extension = strtolower(substr(strrchr($fichier, '.'), 1));
            
                if(in_array($fichier_extension, $extension_valid)){


                $fichier = md5(uniqid(rand(), true)) . '.' . $fichier_extension;
                if(move_uploaded_file($_FILES['new_profile_img']['tmp_name'], $folder . $fichier)){

              

                    $verif_ext = getimagesize($folder . $fichier);
                  

                    if ($verif_ext['mime'] == $list_extension[$fichier_extension] || $verif_ext['mime'] == $list_extensionIE[$fichier_extension]) {
                        $req = $pdo->prepare("UPDATE profile_image SET  path=? where login =?");
                        $req->execute(array($fichier,  $_SESSION['login']));
                        $_SESSION['path'] = $fichier;
                        
                        header("Refresh:1");
                        header("location: profile.php?error=profile_avatar1");
                    }else{
                        //echo 'l\'extension n\'est pas valide';
                        header("Refresh:1");
                        header("location: profile.php?error=profile_avatar");
                       
                    }
                }else{
                  header("Refresh:1");
                  header("location: profile.php?error=profile_avatar0");
                }

                header("Refresh:1");
                header("location: profile.php?succes=profile_avatar");
            }else{
              header("Refresh:1");
              header("location: profile.php?error=profile_avatar2");
            }
            
        }
  var_dump($_POST);
  var_dump($_FILES);
  exit;
}


//function update social media
function social_add(){
  $pdo = pdoConnexion();
  $website = $_POST['website'];
  $github = $_POST['github'];
  $twitter = $_POST['twitter'];
  $instagram = $_POST['instagram'];
  $facebook = $_POST['facebook'];
  $req = $pdo->prepare("UPDATE social SET website=?,github=?,twitter=?,instagram=?,facebook=? WHERE login = ?");
  $req->execute(array($website,$github,$twitter,$instagram,$facebook,$_SESSION['login']));
  header("Refresh:1");
}

//function update password security
function update_profile_pass(){
  $pdo = pdoConnexion();
  $old_pass = md5($_POST['old-pass']);
  $new_pass = md5($_POST['new-pass']);
  $con_pass = md5($_POST['con-pass']);
  $pass = $pdo->prepare("SELECT login from users where password=? limit 1 ");
  $pass->execute(array($old_pass));
  $fpass = $pass->fetchAll();  
  if(count($fpass) > 0){
    if($old_pass == $new_pass){
      header("Refresh:1");
      header("location: profile_settings.php?error=pass_same");
    }elseif($new_pass != $con_pass){
      header("Refresh:1");
      header("location: profile_settings.php?error=pass_not_match");
     
    }else{
      $req = $pdo->prepare("UPDATE users SET password=? WHERE login = ?");
      $req->execute(array($con_pass,$fpass[0]['login']));
      header("Refresh:1");
    }
  }else{
    header("Refresh:1");
    header("location: profile_settings.php?error=pass_old_not_same");
  }
}

//function update data profile information
function update_profile_info(){
  $pdo = pdoConnexion();
  $name = $_POST['name'];
  $username = $_POST['username'];
  $req = $pdo->prepare("UPDATE users SET name = ?, username= ? WHERE login = ?");
  $req->execute(array($name,$username,$_SESSION['login']));
  $bio = $_POST['bio'];
  $req = $pdo->prepare("UPDATE adress SET bio=? WHERE login = ?");
  $req->execute(array($bio,$_SESSION['login']));
  header("Refresh:1");
}

//function update data profile adress
function update_profile_adress(){
  $pdo = pdoConnexion();
  $adress =  $_POST['location'];
  $country = $_POST['country'];
  $street =  $_POST['street'];
  $postal_code =  $_POST['postal_code'];
  $phone_area =str_replace(' ', '',$_POST['phone_area']);
  $date_of_birth = "test";
  $phone_number = str_replace(' ', '',$_POST['phone_area']);
  $phone_number .= $_POST['phone_number'];
  $number = str_replace(' ', '',$phone_number);
  $req = $pdo->prepare("UPDATE adress SET adress=?,country=?,street=?,postal_code=?,phone_area=?,phone_number=?,date_of_birth=? WHERE login = ?");
  $req->execute(array($adress,$country,$street,$postal_code,$phone_area,$number,$date_of_birth,$_SESSION['login']));
  header("Refresh:1");
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
//function for change passowrd
function verif_token(){
    $pdo = pdoConnexion();
    if (isset($_GET['token'])) {
        $token_link = $_GET['token'];

        $stmt = $pdo->prepare("SELECT login from users WHERE token = '$token_link' ");
        $stmt->execute();
        $email = $stmt->fetchColumn();

        $stmtu = $pdo->prepare("SELECT username from users WHERE token = '$token_link' ");
        $stmtu->execute();
        $username = $stmtu->fetchColumn();
    }
    if (empty($email)){
     header('location: ../../auth/password/not_found.php');
    

    }
}
function change_password(){
    $pdo = pdoConnexion();
    @$password1 = $_POST['password1'];
    @$password2 =$_POST['password2'];
    if (isset($_GET['token'])) {
        $token_link = $_GET['token'];

        $stmt = $pdo->prepare("SELECT login from users WHERE token = '$token_link' ");
        $stmt->execute();
        $email = $stmt->fetchColumn();

        $stmtu = $pdo->prepare("SELECT username from users WHERE token = '$token_link' ");
        $stmtu->execute();
        $username = $stmtu->fetchColumn();
    }
    if (empty($email)){
        exit;
    }
    if (isset($_POST['ch-pass'])) {
        if ($password1 !== $password2) {
            $success = "Confirm password not matched!";
        } else {
            $hashpsw = md5($_POST['password2']);
            $change = $pdo->prepare("UPDATE users Set password = '$hashpsw', token= NULL where login = '$email'");
            $change->execute();
            $emails = "contact@spikeexcel.ga";
            $name = "Support Ultimate-Team";
            $to  = $email; // notez la virgule
            $userl = $username;
            // Sujet
            $subject = 'Password Changed';
        
            // message
            $message = '<!doctype html>
            <html>
              <head>
                <meta name="viewport" content="width=device-width" />
                <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
                <title>Email Verification</title>
                <style>
           
                  /*All the styling goes here*/
                  
                  img {
                    border: none;
                    -ms-interpolation-mode: bicubic;
                    max-width: 100%; 
                  }
            
                  body {
                    background-color: #f6f6f6;
                    font-family: sans-serif;
                    -webkit-font-smoothing: antialiased;
                    font-size: 14px;
                    line-height: 1.4;
                    margin: 0;
                    padding: 0;
                    -ms-text-size-adjust: 100%;
                    -webkit-text-size-adjust: 100%; 
                  }
            
                  table {
                    border-collapse: separate;
                    mso-table-lspace: 0pt;
                    mso-table-rspace: 0pt;
                    width: 100%; }
                    table td {
                      font-family: sans-serif;
                      font-size: 14px;
                      vertical-align: top; 
                  }
            
                
            
                  .body {
                    background-color: #f6f6f6;
                    width: 100%; 
                  }
            
                  .container {
                    display: block;
                    margin: 0 auto !important;
                    /* makes it centered */
                    max-width: 580px;
                    padding: 10px;
                    width: 580px; 
                  }
            
              
                  .content {
                    box-sizing: border-box;
                    display: block;
                    margin: 0 auto;
                    max-width: 580px;
                    padding: 10px; 
                  }
            
                  .main {
                    background: #ffffff;
                    border-radius: 3px;
                    width: 100%; 
                  }
            
                  .wrapper {
                    box-sizing: border-box;
                    padding: 20px; 
                  }
            
                  .content-block {
                    padding-bottom: 10px;
                    padding-top: 10px;
                  }
            
                  .footer {
                    clear: both;
                    margin-top: 10px;
                    text-align: center;
                    width: 100%; 
                  }
                    .footer td,
                    .footer p,
                    .footer span,
                    .footer a {
                      color: #999999;
                      font-size: 12px;
                      text-align: center; 
                  }
            
              
                  h1,
                  h2,
                  h3,
                  h4 {
                    color: #000000;
                    font-family: sans-serif;
                    font-weight: 400;
                    line-height: 1.4;
                    margin: 0;
                    margin-bottom: 30px; 
                  }
            
                  h1 {
                    font-size: 35px;
                    font-weight: 300;
                    text-align: center;
                    text-transform: capitalize; 
                  }
            
                  p,
                  ul,
                  ol {
                    font-family: sans-serif;
                    font-size: 14px;
                    font-weight: normal;
                    margin: 0;
                    margin-bottom: 15px; 
                  }
                    p li,
                    ul li,
                    ol li {
                      list-style-position: inside;
                      margin-left: 5px; 
                  }
            
                  a {
                    color: #3498db;
                    text-decoration: underline; 
                  }
            
           
                  .btn {
                    box-sizing: border-box;
                    width: 100%; }
                    .btn > tbody > tr > td {
                      padding-bottom: 15px; }
                    .btn table {
                      width: auto; 
                  }
                    .btn table td {
                      background-color: #ffffff;
                      border-radius: 5px;
                      text-align: center; 
                  }
                    .btn a {
                      background-color: #ffffff;
                      border: solid 1px #3498db;
                      border-radius: 5px;
                      box-sizing: border-box;
                      color: #3498db;
                      cursor: pointer;
                      display: inline-block;
                      font-size: 14px;
                      font-weight: bold;
                      margin: 0;
                      padding: 12px 25px;
                      text-decoration: none;
                      text-transform: capitalize; 
                  }
            
                  .btn-primary table td {
                    background-color: #3498db; 
                  }
            
                  .btn-primary a {
                    background-color: #3498db;
                    border-color: #3498db;
                    color: #ffffff; 
                  }
          
                  .last {
                    margin-bottom: 0; 
                  }
            
                  .first {
                    margin-top: 0; 
                  }
            
                  .align-center {
                    text-align: center; 
                  }
            
                  .align-right {
                    text-align: right; 
                  }
            
                  .align-left {
                    text-align: left; 
                  }
            
                  .clear {
                    clear: both; 
                  }
            
                  .mt0 {
                    margin-top: 0; 
                  }
            
                  .mb0 {
                    margin-bottom: 0; 
                  }
            
                  .preheader {
                    color: transparent;
                    display: none;
                    height: 0;
                    max-height: 0;
                    max-width: 0;
                    opacity: 0;
                    overflow: hidden;
                    mso-hide: all;
                    visibility: hidden;
                    width: 0; 
                  }
            
                  .powered-by a {
                    text-decoration: none; 
                  }
            
                  hr {
                    border: 0;
                    border-bottom: 1px solid #f6f6f6;
                    margin: 20px 0; 
                  }
            
          
                  @media only screen and (max-width: 620px) {
                    table[class=body] h1 {
                      font-size: 28px !important;
                      margin-bottom: 10px !important; 
                    }
                    table[class=body] p,
                    table[class=body] ul,
                    table[class=body] ol,
                    table[class=body] td,
                    table[class=body] span,
                    table[class=body] a {
                      font-size: 16px !important; 
                    }
                    table[class=body] .wrapper,
                    table[class=body] .article {
                      padding: 10px !important; 
                    }
                    table[class=body] .content {
                      padding: 0 !important; 
                    }
                    table[class=body] .container {
                      padding: 0 !important;
                      width: 100% !important; 
                    }
                    table[class=body] .main {
                      border-left-width: 0 !important;
                      border-radius: 0 !important;
                      border-right-width: 0 !important; 
                    }
                    table[class=body] .btn table {
                      width: 100% !important; 
                    }
                    table[class=body] .btn a {
                      width: 100% !important; 
                    }
                    table[class=body] .img-responsive {
                      height: auto !important;
                      max-width: 100% !important;
                      width: auto !important; 
                    }
                  }
           
                  @media all {
                    .ExternalClass {
                      width: 100%; 
                    }
                    .ExternalClass,
                    .ExternalClass p,
                    .ExternalClass span,
                    .ExternalClass font,
                    .ExternalClass td,
                    .ExternalClass div {
                      line-height: 100%; 
                    }
                    .apple-link a {
                      color: inherit !important;
                      font-family: inherit !important;
                      font-size: inherit !important;
                      font-weight: inherit !important;
                      line-height: inherit !important;
                      text-decoration: none !important; 
                    }
                    #MessageViewBody a {
                      color: inherit;
                      text-decoration: none;
                      font-size: inherit;
                      font-family: inherit;
                      font-weight: inherit;
                      line-height: inherit;
                    }
                    .btn-primary table td:hover {
                      background-color: #34495e !important; 
                    }
                    .btn-primary a:hover {
                      background-color: #34495e !important;
                      border-color: #34495e !important; 
                    } 
                  }
            
                </style>
              </head>
              <body class="">
                <span class="preheader">Your Password Request</span>
                <table role="presentation" border="0" cellpadding="0" cellspacing="0" class="body">
                  <tr>
                    <td>&nbsp;</td>
                    <td class="container">
                      <div class="content">
                        <table role="presentation" class="main">
                          <tr>
                            <td class="wrapper">
                              <table role="presentation" border="0" cellpadding="0" cellspacing="0">
                                <tr>
                                  <td>
                                    <center>
                                      <img  style="width:auto;"src="https://www.spikeexcel.ga/assets/img/logo2.png" alt="">
                                    </center>
                                      <center>
                                      <p>Hi <strong>'." $userl;".'</strong></p>
                                    <strong>  <p>We wanted to let you Know that you SpikeExcel password was reset <br></strong>
                                      </p>
                                    </center>
                                    <center>
                                    <table role="presentation" border="0" cellpadding="0" cellspacing="0" class="btn btn-primary">
                                      <tbody>
                                        <tr>
                                         
                                        </tr>
                                      </tbody>
                                    </table>
                                    <p>If you did not initiate this request, please contact us immediately at contact@spikeexcel.ga</p>
                                  </center>
                                  </td>
                                </tr>
                              </table>
                            </td>
                          </tr>
                        </table>
                        <div class="footer">
                          <table role="presentation" border="0" cellpadding="0" cellspacing="0">
                            <tr>
                              <td class="content-block">
                                <span class="apple-link">Company SpikeExcel</span>
                              </td>
                            </tr>
                            <tr>
                            </tr>
                          </table>
                        </div>
                      </div>
                    </td>
                    <td>&nbsp;</td>
                  </tr>
                </table>
              </body>
             </html>';
            // Pour envoyer un mail HTML, l'en-tête Content-type doit être défini
            $headers[] = 'MIME-Version: 1.0';
            $headers[] = 'Content-type: text/html; charset=iso-8859-1';
            // En-têtes additionnels
            $headers[] = 'To:' . $email;
            $headers[] = "From: SpikeExcel < $emails >\n";
            if (mail($email, $subject, $message, implode("\r\n", $headers))) {
                
                header('location: ../../auth/login/login.php');
            }
        }
    }
}

//function for send email token to change password
function forgot_password(){

    $pdo = pdoConnexion();
    $name = $pdo->prepare("SELECT username from users where login=? LIMIT 1");
    $name->execute(array($_POST['login']));
    $username = $name->fetchAll();
    if(count($username) <= 0){
        header('location: ../../auth/password/password-forgot.php?error=1');
    }
    $token = uniqid(rand());
    $userl = $username[0][0];
    $url = "https://spikeexcel.ga/auth/password/token.php?token=$token";
    $header = 'Content-Type: text/plain; charset="utf-8"'." ";
    $emails = "contact@spikeexcel.ga";
    $name = "Support Spike-Team";
    $to  = $_POST['login'];
    $subject = 'Reset Your Password';
    $message = 
    '<!doctype html>
      <html>
        <head>
          <meta name="viewport" content="width=device-width" />
          <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
          <title>Email Verification</title>
          <style>
     
            /*All the styling goes here*/
            
            img {
              border: none;
              -ms-interpolation-mode: bicubic;
              max-width: 100%; 
            }
      
            body {
              background-color: #f6f6f6;
              font-family: sans-serif;
              -webkit-font-smoothing: antialiased;
              font-size: 14px;
              line-height: 1.4;
              margin: 0;
              padding: 0;
              -ms-text-size-adjust: 100%;
              -webkit-text-size-adjust: 100%; 
            }
      
            table {
              border-collapse: separate;
              mso-table-lspace: 0pt;
              mso-table-rspace: 0pt;
              width: 100%; }
              table td {
                font-family: sans-serif;
                font-size: 14px;
                vertical-align: top; 
            }
      
          
      
            .body {
              background-color: #f6f6f6;
              width: 100%; 
            }
      
            .container {
              display: block;
              margin: 0 auto !important;
              /* makes it centered */
              max-width: 580px;
              padding: 10px;
              width: 580px; 
            }
      
        
            .content {
              box-sizing: border-box;
              display: block;
              margin: 0 auto;
              max-width: 580px;
              padding: 10px; 
            }
      
            .main {
              background: #ffffff;
              border-radius: 3px;
              width: 100%; 
            }
      
            .wrapper {
              box-sizing: border-box;
              padding: 20px; 
            }
      
            .content-block {
              padding-bottom: 10px;
              padding-top: 10px;
            }
      
            .footer {
              clear: both;
              margin-top: 10px;
              text-align: center;
              width: 100%; 
            }
              .footer td,
              .footer p,
              .footer span,
              .footer a {
                color: #999999;
                font-size: 12px;
                text-align: center; 
            }
      
        
            h1,
            h2,
            h3,
            h4 {
              color: #000000;
              font-family: sans-serif;
              font-weight: 400;
              line-height: 1.4;
              margin: 0;
              margin-bottom: 30px; 
            }
      
            h1 {
              font-size: 35px;
              font-weight: 300;
              text-align: center;
              text-transform: capitalize; 
            }
      
            p,
            ul,
            ol {
              font-family: sans-serif;
              font-size: 14px;
              font-weight: normal;
              margin: 0;
              margin-bottom: 15px; 
            }
              p li,
              ul li,
              ol li {
                list-style-position: inside;
                margin-left: 5px; 
            }
      
            a {
              color: #3498db;
              text-decoration: underline; 
            }
      
     
            .btn {
              box-sizing: border-box;
              width: 100%; }
              .btn > tbody > tr > td {
                padding-bottom: 15px; }
              .btn table {
                width: auto; 
            }
              .btn table td {
                background-color: #ffffff;
                border-radius: 5px;
                text-align: center; 
            }
              .btn a {
                background-color: #ffffff;
                border: solid 1px #3498db;
                border-radius: 5px;
                box-sizing: border-box;
                color: #3498db;
                cursor: pointer;
                display: inline-block;
                font-size: 14px;
                font-weight: bold;
                margin: 0;
                padding: 12px 25px;
                text-decoration: none;
                text-transform: capitalize; 
            }
      
            .btn-primary table td {
              background-color: #3498db; 
            }
      
            .btn-primary a {
              background-color: #3498db;
              border-color: #3498db;
              color: #ffffff; 
            }
    
            .last {
              margin-bottom: 0; 
            }
      
            .first {
              margin-top: 0; 
            }
      
            .align-center {
              text-align: center; 
            }
      
            .align-right {
              text-align: right; 
            }
      
            .align-left {
              text-align: left; 
            }
      
            .clear {
              clear: both; 
            }
      
            .mt0 {
              margin-top: 0; 
            }
      
            .mb0 {
              margin-bottom: 0; 
            }
      
            .preheader {
              color: transparent;
              display: none;
              height: 0;
              max-height: 0;
              max-width: 0;
              opacity: 0;
              overflow: hidden;
              mso-hide: all;
              visibility: hidden;
              width: 0; 
            }
      
            .powered-by a {
              text-decoration: none; 
            }
      
            hr {
              border: 0;
              border-bottom: 1px solid #f6f6f6;
              margin: 20px 0; 
            }
      
    
            @media only screen and (max-width: 620px) {
              table[class=body] h1 {
                font-size: 28px !important;
                margin-bottom: 10px !important; 
              }
              table[class=body] p,
              table[class=body] ul,
              table[class=body] ol,
              table[class=body] td,
              table[class=body] span,
              table[class=body] a {
                font-size: 16px !important; 
              }
              table[class=body] .wrapper,
              table[class=body] .article {
                padding: 10px !important; 
              }
              table[class=body] .content {
                padding: 0 !important; 
              }
              table[class=body] .container {
                padding: 0 !important;
                width: 100% !important; 
              }
              table[class=body] .main {
                border-left-width: 0 !important;
                border-radius: 0 !important;
                border-right-width: 0 !important; 
              }
              table[class=body] .btn table {
                width: 100% !important; 
              }
              table[class=body] .btn a {
                width: 100% !important; 
              }
              table[class=body] .img-responsive {
                height: auto !important;
                max-width: 100% !important;
                width: auto !important; 
              }
            }
     
            @media all {
              .ExternalClass {
                width: 100%; 
              }
              .ExternalClass,
              .ExternalClass p,
              .ExternalClass span,
              .ExternalClass font,
              .ExternalClass td,
              .ExternalClass div {
                line-height: 100%; 
              }
              .apple-link a {
                color: inherit !important;
                font-family: inherit !important;
                font-size: inherit !important;
                font-weight: inherit !important;
                line-height: inherit !important;
                text-decoration: none !important; 
              }
              #MessageViewBody a {
                color: inherit;
                text-decoration: none;
                font-size: inherit;
                font-family: inherit;
                font-weight: inherit;
                line-height: inherit;
              }
              .btn-primary table td:hover {
                background-color: #34495e !important; 
              }
              .btn-primary a:hover {
                background-color: #34495e !important;
                border-color: #34495e !important; 
              } 
            }
      
          </style>
        </head>
        <body class="">
          <span class="preheader">Your Password Request</span>
          <table role="presentation" border="0" cellpadding="0" cellspacing="0" class="body">
            <tr>
              <td>&nbsp;</td>
              <td class="container">
                <div class="content">
                  <table role="presentation" class="main">
                    <tr>
                      <td class="wrapper">
                        <table role="presentation" border="0" cellpadding="0" cellspacing="0">
                          <tr>
                            <td>
                              <center>
                                <img  style="width:auto;"src="https://www.spikeexcel.ga/assets/img/logo2.png" alt="">
                              </center>
                                <center>
                                <p>Hi <strong>'." $userl;".'</strong></p>
                              <strong>  <p>A request has been received to change the password for you SpikeExcel account.<br></strong>
                                </p>
                              </center>
                              <center>
                              <table role="presentation" border="0" cellpadding="0" cellspacing="0" class="btn btn-primary">
                                <tbody>
                                  <tr>
                                    <td align="center">
                                      <table role="presentation" border="0" cellpadding="0" cellspacing="0">
                                        <tbody>
                                          <tr>
                                            <center>
                                            <td> <a href='."https://spikeexcel.ga/auth/password/token.php?token=$token".' target="_blank">Reset Password</a> </td>
                                          </center>
                                          </tr>
                                        </tbody>
                                      </table>
                                    </td>
                                  </tr>
                                </tbody>
                              </table>
                              <p>If you did not initiate this request, please contact us immediately at contact@spikeexcel.ga</p>
                            </center>
                            </td>
                          </tr>
                        </table>
                      </td>
                    </tr>
                  </table>
                  <div class="footer">
                    <table role="presentation" border="0" cellpadding="0" cellspacing="0">
                      <tr>
                        <td class="content-block">
                          <span class="apple-link">Company SpikeExcel</span>
                        </td>
                      </tr>
                      <tr>
                      </tr>
                    </table>
                  </div>
                </div>
              </td>
              <td>&nbsp;</td>
            </tr>
          </table>
        </body>
      </html>
     ';
   
    // Pour envoyer un mail HTML, l'en-tête Content-type doit être défini
    $headers[] = 'MIME-Version: 1.0';
    $headers[] = 'Content-type: text/html; charset=iso-8859-1';
    // En-têtes additionnels
    $headers[] = 'To:' . $_POST['login'];
    $headers[] = "From: SpikeExcel < $emails >\n";

    if(mail($_POST['email'], $subject, $message, implode("\r\n", $headers))){
        $login = $_POST['login'];
        $change = $pdo->prepare("UPDATE users Set token = '$token' where login = '$login'");
        $change->execute();
        header('location: ../../auth/password/password-forgot.php?error=2');
    }else{
        echo "Error Contact Our service contact@ultimate-team.ga";
        exit;
    }
}

function del_notif(){
 
}

?>