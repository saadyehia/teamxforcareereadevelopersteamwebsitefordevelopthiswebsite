<?php

    session_start();
    include "php/init.php";
    $pageTitle = "Edit Profile";
?>

<!DOCTYPE html>
<html>
    <?php require 'head.php'; ?>
    <body>
        <?php include 'navbar.php'; ?>
        <div class="editProfile">
            <div class="container">
                <h1>Edit my profile</h1>
                <form class="text-left" action="profile.php" method="post">
                    <label>Name</label>
                    <input type="text" />
                    <label>Phone number</label>
                    <input type="tel" />
                    <label>E-mail</label>
                    <input type="email" />
                    <label>CV.</label>
                    <input type="file" />
                    <div class="profile">
                        <img src="" alt="Profile Photo"/>
                        <div class="editFile">
                            Upload
                            <input type="file" id="profileImage" class="hideInput" />
                        </div>
                    </div>
                    <div>
                        <button type="submit" class="btn">Finish</button>
                    </div>
                </form>
            </div>
        </div>
        <?php include 'footer.php'; ?>
        <?php require 'scripts.php'; ?>
    </body>
</html>