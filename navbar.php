<?php

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['signIn'])) {
    $email = $_POST['email'];
    $password = $_POST['pass'];
    $encPassword = sha1($password);

    $stmt = $connect->prepare("SELECT applicant_ID, email, password FROM applicants WHERE (email = '$email' OR phone = '$email') AND password = '$encPassword'");
    $stmt->execute();
    $row = $stmt->fetch();
    $check = $stmt-> rowCount();

    if ($check > 0) {
        $_SESSION['userID'] = $row['applicant_ID'];
        header("Location: index.php");
    } else {
        echo '<style>.signInBlock{display: block}</style>';
        $notify = '<div class="alert alert-danger custom-alert">Invalid <strong>Email</strong> or <strong>Password</strong>.</div>';
        //echo '<script>$(document).ready(function () {var overlay = $(\'<div></div>\').prependTo(\'body\').attr(\'class\', \'overlayForPage\'); overlay.add();}</script>';
    }

}

?>

<!-- Start Navbar -->

<nav class="navbar navbar-fixed-top navbar-inverse backgroundColor">
    <div class="container">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#our-nav">
                <span class="sr-only"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <span class="navbar-brand">Careerea</span>
        </div>
        <div class="collapse navbar-collapse navbar-right" id="our-nav">
            <ul class="nav navbar-nav">
                <li <?php if (basename($_SERVER['PHP_SELF']) == 'index.php') echo 'class="active"' ?>><a href="index.php">Home</a></li>
                <li <?php if (basename($_SERVER['PHP_SELF']) == 'about.php') echo 'class="active"' ?>><a href="about.php">About US</a></li>
                <li data-id="partners"><a href="#">Partners</a></li>
                <li <?php if (basename($_SERVER['PHP_SELF']) == 'jobs.php') echo 'class="active"' ?>><a href="jobs.php">Jobs</a></li>
                <li <?php if (basename($_SERVER['PHP_SELF']) == 'courses.php') echo 'class="active"' ?>><a href="courses.php">Courses</a></li>
            </ul>
            <?php if(!isset($_SESSION['userID'])): ?>
            <button type="button" class="sign navbar-right navbar-btn">
                <i class="fa fa-sign-in fa-fw fa-lg" aria-hidden="true"></i>
                <span>Login</span>
            </button>
            <a href="signUp.php">
                <button type="button" class="sign navbar-right navbar-btn">
                    <i class="fa fa-user-plus fa-fw fa-lg" aria-hidden="true"></i>
                    <span>Sign Up</span>
                </button>
            </a>
            <?php else:
                echo '<div class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                            <img src="applicants/profile_pics/'. $ApplicantProfilePhoto .'" />
                            <span>'. $ApplicantName .'</span>
                            <span class="caret"></span>
                        </a>
                        <ul class="dropdown-menu">
                            <i class="fa fa-caret-down fa-fw fa-3x"></i>
                            <li><a href="profile.php"><i class="fa fa-user fa-fw fa-lg"></i>Profile</a></li>
                            <li><a href="notification.php"><i class="fa fa-globe fa-fw fa-lg"></i>Notification<span>4</span></a></li>
                            <li><a href="settings.php"><i class="fa fa-wrench fa-fw fa-lg"></i>Settings</a></li>
                            <li><a href="php/logout.php"><i class="fa fa-sign-out fa-fw fa-lg"></i>Logout</a></li>
                        </ul>
                    </div>';
            endif; ?>
        </div>
    </div>
</nav>

<!-- End Navbar -->

<!-- Start SignIn Block -->
<div class="signInBlock">
    <div>
        <span>Login</span>
        <i class="fa fa-close fa-fw fa-lg"></i>
    </div>
    <form action="<?php $_SERVER['PHP_SELF']; ?>" method="POST">
        <input type="text" placeholder="Email or Phone" name="email"/>
        <div class="password">
            <input class="passwordField" type="password" placeholder="Password" name="pass" />
            <span class="glyphicon glyphicon-eye-open"></span>
        </div>
        <?php
            if(isset($notify)) {
                echo $notify;
            }
        ?>
        <button class="btn" type="submit" name="signIn">Sign in</button>
        <span><a href="#">Forgotten account?</a></span>
        <br />
        <span>Not a member? <a href="signUp.php">Sign up now <i class="fa fa-arrow-right"></i></a></span>
    </form>
</div>
<!-- End SignIn Block -->