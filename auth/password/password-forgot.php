<?php
include_once('../../assets/php/func.php');
if(isset($_POST['forgot'])){
    forgot_password();
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">

    <title>Forgot password</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script src="https://code.jquery.com/jquery-1.10.2.min.js"></script>
    <link href="https://netdna.bootstrapcdn.com/bootstrap/3.1.1/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://netdna.bootstrapcdn.com/bootstrap/3.1.1/js/bootstrap.min.js"></script>
</head>

<body>
    <div class="container bootstrap snippets bootdey">
        <div class="row">
            <div class="row">
                <div class="col-md-4 col-md-offset-4">
                    <div class="text-center">
                        <img src="../../assets/img/avatar/def.svg" width="180" class="img-thumbnail logo img-circle">
                        <div>
                            <h3 class="text-center">Forgot password?</h3>
                        </div>
                        <div class="panel-body">
                            <?php if($_GET['error']==1){
                            ?>
                            <div class="alert alert-danger">
                                <a class="close" data-dismiss="alert" href="#">×</a>Incorrect Email Address!
                            </div>
                            <?php
                            } ?>  
                             <?php if($_GET['error']==2){
                            ?>
                            <div class="alert alert-success">
                                <a class="close" data-dismiss="alert" href="#">×</a><strong>Check your email..</strong> There should be a link to recover your account.
                            </div>
                            <?php
                            } ?>  
                            <form action="" method="POST">
                                <fieldset>
                                    <div class="form-group">
                                        <input class="form-control input-lg" placeholder="E-mail Address" name="login"
                                            type="text">
                                    </div>
                                    <input class="btn btn-lg btn-primary btn-block" value="SEND ME PASSzWORD"
                                        name="forgot" type="submit">
                                </fieldset>
                            </form>
                            <span><a href="../../index.php" class="signup-image-link">Return</a></a></span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <style type="text/css">
    body {
        background: #eee;
    }

    .img-thumbnail {
        border: 0px;
    }

    .btn,
    .input-lg,
    .alert {
        border-radius: 2px !important;
    }
    </style>

    <script type="text/javascript">

    </script>
</body>

</html>