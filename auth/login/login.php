<?php 
require_once('../../assets/php/pdo.php');
@$login=$_POST["login"];
@$pass=md5($_POST["pass"]);
@$username=$_POST["username"];
$erreur= "";
  
session_start();
   if($_SESSION["autoriser"]=="oui"){
	header("location:../../index.php");
	exit();
  } 

   if(isset($_POST['submit'])){
                 /* collect data */
            $sel=$pdo->prepare("select * from users where login=? and password=? limit 1");
            $sel->execute(array($login,$pass));
            $user=$sel->fetchAll();

            $sel=$pdo->prepare("select path from profile_image where login=? limit 1");
            $sel->execute(array($login));
            $user2=$sel->fetchAll();
            
             /* Stock data on session */
            if (count($user)>0) {
              $erreur="";
                $_SESSION["username"]=(strtolower($user[0]["username"]));
                $_SESSION["login"]=(strtolower($user[0]["login"]));
                $_SESSION["password"]=(strtolower($user[0]["password"]));
                $_SESSION["confirme"]=(strtolower($user[0]["confirme"]));
                $_SESSION["path"]=(strtolower($user2[0]["path"]));
                $_SESSION["id"]=(strtolower($user[0]["id"]));
                $_SESSION["autoriser"]="oui";

                header("location:../../index.php");
                sleep(3);
                header("Refresh:1");
                


            }else{
              $erreur = '<span style="color: red; font-color: red;">Wrong password Or emaill try again!</span>';
            }

                                /* systeme de cookie */
            }  else {
              $eror = "true";
                
            }

?>
<!DOCTYPE html>
<html>

<head>
<link rel="icon" type="image/png" href="../../assets/img/logo3.png" />
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Log-In</title>
      <!-- Font Icon -->
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/material-design-iconic-font/2.2.0/css/material-design-iconic-font.min.css">


<!-- Main css -->
<link rel="stylesheet" href="../../assets/css/register/register.css">
</head>

<body>
  <!-- Sing in  Form -->
  <section class="sign-in">
            <div class="container">
                <div class="signin-content">
                    <div class="signin-image">
                        <figure><img src="../../assets/img/uNGdWHi.png" alt="sing up image"></figure>
                        <a href="../register/register.php" class="signup-image-link">Create an account</a>
                    </div>

                    <div class="signin-form">
                        <h2 class="form-title">Login In</h2>
                        <?php 
                            echo $erreur; ?>
                            
                        
                        <form method="POST" class="register-form" id="login-form">
                            <div class="form-group">
                                <label for="your_name"><i class="zmdi zmdi-account material-icons-name"></i></label>
                                <input type="text" name="login" id="your_name" placeholder="Your Email"/>
                            </div>
                            <div class="form-group">
                                <label for="your_pass"><i class="zmdi zmdi-lock"></i></label>
                                <input type="password" name="pass" id="your_pass" placeholder="Password"/>
                            </div>
                            <div class="form-group">
                                <input type="checkbox" name="remember-me" id="remember-me" class="agree-term" />
                                <label for="remember-me" class="label-agree-term"><span><span></span></span>Remember me</label> <span><a href="../password/password-forgot.php" class="signup-image-link">Forgot password ?</a></a></span>
                            </div>
                            <div class="form-group form-button">
                                <input type="submit" name="submit" id="signin" class="form-submit" />
                            </div>
                        </form>
                        <div class="social-login">
                            <span class="social-label">Or login with</span>
                            <ul class="socials">
                                <li><a href="#"><i class="display-flex-center zmdi zmdi-facebook"></i></a></li>
                                <li><a href="#"><i class="display-flex-center zmdi zmdi-twitter"></i></a></li>
                                <li><a href="#"><i class="display-flex-center zmdi zmdi-google"></i></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <script src="../../assets/vendor/jquery/jquery.min.js"></script>
</body>
</html>