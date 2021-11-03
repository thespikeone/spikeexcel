<?php
include('../../assets/php/pdo.php');
@$verifi = "";
@$error = "";
if(isset($_GET['vkey'])){
    $vkey = $_GET['vkey'];
    $req = $pdo->prepare("SELECT vkey,confirme from users WHERE confirme= 0 AND vkey = '$vkey' limit 1");
    $req->execute();
    $vek = $req->fetch();
    
    if(!empty($vek)){
        //validate
        $update = "UPDATE users SET confirme=1 WHERE vkey='$vkey' LIMIT 1";
            $pdo->prepare($update)->execute();
            if($update){
               $verifi = "Your account has been verified";
            }else{
              $error =  "error";
            }
    }else{
       $verifi = "this account invalid or already verified";
            

    }
}else{
    $error = "something Wrong";
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Code Verification</title>
    <link rel="icon" type="image/png" href="../../assets/img/logo3.png" />
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <div class="row">
            <div class="col-md-4 offset-md-4 form">
                <form action="https://ultimate-team.ga/" method="POST" autocomplete="off">
                    <h2 class="text-center">Verification</h2>
                  <?php if(!empty($verifi)){ ?>
                        <div class="alert alert-success text-center">
                          <?php echo  $verifi; ?>
                        </div>
                     <?php
                     }else{
                         ?>
                        <div class="alert alert-danger text-center">
                        <?php echo  $error; ?>
                        </div>
                       <?php
                     }
                       ?>
                    
                    <div class="form-group">
                       
                    <a href="https://ultimate-team.ga/"><button class="form-control button"  >Login</button></a>
                    </div>
                </form>
            </div>
        </div>
    </div>
    
</body>
</html>