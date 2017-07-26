<?php

    session_start();
    include "php/init.php";

    $pageTitle = "About Us";
?>

<!DOCTYPE html>
<html lang="en">
    <?php require 'head.php'; ?>
    <body>
        <?php include 'navbar.php'; ?>

        <div class="aboutPage"></div>
        <div class="aboutDescription">
            <div class="container">
                <p class="lead">- Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium totam rem These guys are incredible! I get my project in 10 days and it was awesome! Very good service! Highly recommended! PRINT DESIGN Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit WEB DESIGN Incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam APP DESIGN Quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis LOGO DESIGN Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat</p>
            </div>
        </div>
        
        <?php include 'footer.php'; ?>
        <?php require 'scripts.php'; ?>
    </body>
</html>