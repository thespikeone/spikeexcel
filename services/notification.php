<?php require_once('../assets/php/func.php'); 
 $pdo = pdoConnexion();
 $notification = $pdo->prepare("SELECT * from notification WHERE login =? ");
 $notification->execute(array($_SESSION['login']));
 $notif = $notification->fetchAll();
?>

<ul class="navbar-nav navbar-nav-right">
    <li class="nav-item dropdown">
        <a class="nav-link count-indicator dropdown-toggle" id="notificationDropdown" href="#" data-toggle="dropdown">
            <i class="icon-bell mx-0"></i>
            <span class="count"></span>
        </a>
        <div class="dropdown-menu dropdown-menu-right navbar-dropdown preview-list"
            aria-labelledby="notificationDropdown">
            <p class="mb-0 font-weight-normal float-left dropdown-header">Notifications</p>

            <?php foreach($notif as $nf){ ?>
            <a class="dropdown-item preview-item">
                <div class="preview-thumbnail">
                    <div class="preview-icon bg-<?= $nf['bg']; ?>">
                        <i class="<?= $nf['icon']; ?> mx-0"></i>
                    </div>
                </div>

                <div class="preview-item-content">
                    <h6 class="preview-subject font-weight-normal"> <?= $nf['title']; ?></h6>
                    <!-- mybe add desc<h6 class="preview-subject font-weight-normal"> // $nf['desc']; </h6>-->
                    <p class="font-weight-light small-text mb-0 text-muted">
                        <?= $nf['date']; ?>
                    </p>
                </div>


            </a>
            <?php } ?>
        </div>
    </li>


    <li class="nav-item nav-profile dropdown">
        <a id="notif" href="#" data-toggle="dropdown" class="nav-link dropdown-toggle" href="#" data-toggle="dropdown"
            id="profileDropdown">
            <?php
      if(file_exists("../assets/php/avatar/". $_SESSION['login'] . "/" . $_SESSION['path']) && isset($_SESSION['path'])){
   ?>
            <img src="<?= "../assets/php/avatar/". $_SESSION['login'] . "/" . $_SESSION['path']; ?>" alt="Admin"
                class="rounded-circle" width="150">

            <?php
      }else{
   ?>
            <img src="https://bootdey.com/img/Content/avatar/avatar7.png" alt="Admin" class="rounded-circle"
                width="150">
            <?php
      }
   ?>


        </a>
        <div class="dropdown-menu dropdown-menu-right navbar-dropdown preview-list" aria-labelledby="notif">
            <p class="mb-0 font-weight-normal float-left dropdown-header"><?php echo $_SESSION['username'] ?></p>
            <a href="../index.php" class="dropdown-item">
                <i class="ti-home text-primary"></i>
                Home
            </a>
            <a href="../profile/profile_settings.php" class="dropdown-item">
                <i class="ti-settings text-primary"></i>
                Settings
            </a>
            <a href="../auth/logout.php" class="dropdown-item">
                <i class="ti-power-off text-primary"></i>
                Logout
            </a>
        </div>
        </a>

</ul>



<br>