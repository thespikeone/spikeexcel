<?php
session_start();

   if($_SESSION["autoriser"]=="oui"){
	header("location:../../index.php");
	exit();
  } 
require("../../assets/php/pdo.php");
@$login=$_POST["login"];
@$username=$_POST["username"];
@$name=$_POST["name"];
@$pass=$_POST["pass"];
@$repass=$_POST["repass"];

@$file_url = 'upload/' .$nom;
$php = 'index.php';
$erreur="";
   if(isset($_POST['signup'])){

      if(empty($login)) $erreur="Login left blank!";
      elseif(empty($username)) $erreur="username Left blank!";
      elseif(empty($name)) $erreur="name Left blank";
      elseif(empty($pass)) $erreur="Password left blank!";
      elseif($pass!=$repass) $erreur="Passwords are not the same!";
      else{
         
         $sel=$pdo->prepare("select id from users where login=?  limit 1");
         $sel->execute(array($login));
         $tab=$sel->fetchAll();
         if (count($tab)>0) {
             $erreur="Login Already exists";
         } else{

        $sels=$pdo->prepare("select id from users where username=? limit 1");
        $sels->execute(array($username));
        $tabs=$sels->fetchAll();
        if (count($tabs)>0) {
            $erreur="username Already exists!";

        }else{
          
            $vkey = md5(time().$username);
            $ins=$pdo->prepare("insert into users(login,name,username,password,vkey) values(?,?,?,?,?)");
            if($ins->execute(array($login,$name,$username,md5($pass),$vkey))){
                $emails = "contact@spikeexcel.ga";
                $name = "Support SpikeExcel-Team";
                $to  = $login; // notez la virgule

                // Sujet
                $subject = 'Email Verification';

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
                  <span class="preheader">THANK YOU FOR REGISTERING, Verify your account</span>
                  <table role="presentation" border="0" cellpadding="0" cellspacing="0" class="body">
                    <tr>
                      <td>&nbsp;</td>
                      <td class="container">
                        <div class="content">
              
                          <!-- START CENTERED WHITE CONTAINER -->
                          <table role="presentation" class="main">
              
                            <!-- START MAIN CONTENT AREA -->
                            <tr>
                              <td class="wrapper">
                                <table role="presentation" border="0" cellpadding="0" cellspacing="0">
                                  <tr>
                                    <td>
                                      <center>
                                        <img  style="width:auto;"src="https://www.spikeexcel.ga/assets/img/logo2.png" alt="">
                                      </center>
                                        <center>
                                          <h1>Email Confirmation</h1>
                                        <p>Hi '." $username".',</p>
                                        <p>You\'re almost ready to get started. <br>
                                          Please click on the button below to verify your email address 
                                           and enjoy exclusive cleaning services with us!
              
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
                                                    <td> <a href='."https://www.spikeexcel.ga/auth/register/verify.php?vkey=$vkey".' target="_blank">VERIFY YOUR EMAIL</a> </td>
                                                  </center>
                                                  </tr>
                                                </tbody>
                                              </table>
                                            </td>
                                          </tr>
                                        </tbody>
                                      </table>
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

                // Pour envoyer un mail HTML, l"en-tête Content-type doit être défini
                $headers[] = "MIME-Version: 1.0";
                $headers[] = "Content-type: text/html; charset=iso-8859-1";

                // En-têtes additionnels
                $headers[] = 'To:' . $login;
                $headers[] = 'From: ' . $emails;


                // Envoi
                mail($to, $subject, $message, implode("\r\n", $headers));
                header("location:success.php");
            }else{
                echo "error";
            }
                
              
               
         }   
      }
    }
   }
?>
<!DOCTYPE html>
<html lang="en">
<head>
<link rel="icon" type="image/png" href="../../assets/img/logo3.png" />
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Sign Up</title>
   
    <!-- Font Icon -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/material-design-iconic-font/2.2.0/css/material-design-iconic-font.min.css">


    <!-- Main css -->
    <link rel="stylesheet" href="../../assets/css/register/register.css">
</head>
<body>

    <div class="main">

      

         <!-- Sign up form -->
         <section class="signup">
            <div class="container">
                <div class="signup-content">
                    <div class="signup-form">
                        <h2 class="form-title">Sign up</h2>
                      <span style="color: red;">  <?php 
                            echo $erreur; ?></span>
                        <form method="POST" class="register-form" id="register-form">
                            <div class="form-group">
                                <label for="name"><i class="zmdi zmdi-account material-icons-name"></i></label>
                                <input type="text" name="name" id="name" placeholder="Your name" require/>
                            </div>
                            <div class="form-group">
                                <label for="name"><i class="zmdi zmdi-account-box-o material-icons-name"></i></label>
                                <input type="text" name="username" id="name" placeholder="Username" require/>
                            </div>
                            <div class="form-group">
                                <label for="email"><i class="zmdi zmdi-email"></i></label>
                                <input type="email" name="login" id="email" placeholder="Your Email" require/>
                            </div>
                           
                            <div class="form-group">
                                <label for="pass"><i class="zmdi zmdi-lock"></i></label>
                                <input type="password" name="pass" id="pass" placeholder="Password" require/>
                            </div>
                            <div class="form-group">
                                <label for="re-pass"><i class="zmdi zmdi-lock-outline"></i></label>
                                <input type="password" name="repass" id="re_pass" placeholder="Repeat your password" require/>
                            </div>
                            <div class="form-group">
                                <input type="checkbox" name="agree-term" id="agree-term" class="agree-term" required />
                                <label for="agree-term" class="label-agree-term"><span><span></span></span>I agree all statements in  <a href="#" class="term-service">Terms of service</a></label>
                            </div>
                            <div class="form-group form-button">
                                <input type="submit" name="signup" id="signup" class="form-submit" value="Register"/>
                            </div>
                        </form>
                    </div>
                    <div class="signup-image">
                        <figure><img src="../../assets/img/features-2.png" alt="sing up image"></figure>
                        <a href="../login/login.php" class="signup-image-link">I am already member</a>
                    </div>
                </div>
            </div>
        </section>

    </div>

    <!-- JS -->
    <script src="../../assets/vendor/jquery/jquery.min.js"></script>
    
</body><!-- This templates was made by Colorlib (https://colorlib.com) -->
</html>