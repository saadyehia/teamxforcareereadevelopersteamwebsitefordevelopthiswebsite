<?php

    session_start();
    include "php/init.php";
    $pageTitle = "Settings";

    if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['saveAccount'])) {

        $name = $_POST['name'];
        $phone = $_POST['phone'];
        $email = $_POST['email'];

        $updateAccountInfo = $connect->prepare("UPDATE applicants SET name = '$name', phone = '$phone', email = '$email'");
        $updateAccountInfo->execute();

    }

?>

<!DOCTYPE html>
<html>
    <?php require 'head.php'; ?>
    <body>
        
        <?php include 'navbar.php'; ?>
        
        <div class="settings">
            <div class="container">
                <div class="subSettings">
                    <ul class="tabs">
                        <li class="active" data-tab="accountInfo"><i class="fa fa-user fa-fw fa-md"></i> Account Info.</li>
                        <li data-tab="security"><i class="fa fa-shield fa-fw fa-md"></i> Security</li>
                        <li data-tab="notification"><i class="fa fa-globe fa-fw fa-md"></i> Notification</li>
                        <li data-tab="language"><i class="fa fa-language fa-fw fa-md"></i> Language</li>
                    </ul>
                    <div class="content">
                        <div class="accountInfo">
                            <h1>Account Information</h1>
                            <i class="fa fa-pencil-square fa-fw fa-2x"></i>
                            <i class="fa fa-pencil fa-fw fa-2x"></i>
                            <?php

                                $profileData = $connect->prepare("SELECT * FROM applicants WHERE applicant_ID = ?");
                                $profileData->execute(array($_SESSION['userID']));
                                $row = $profileData->fetch();

                                $ApplicantPhone = $row['phone'];
                                $ApplicantName = $row['name'];
                                $ApplicantEmail = $row['email'];

                                echo '<form method="post" action="'.$_SERVER['PHP_SELF'].'">
                                        <label>Name</label>
                                        <input type="text" name="name" disabled value="'. $ApplicantName .'"/><br />
                                        <label>Phone</label>
                                        <input type="tel" name="phone" disabled value="'. $ApplicantPhone .'"/>
                                        <i class="fa fa-lock fa-fw fa-lg"></i><br />
                                        <label>E-mail</label>
                                        <input type="email" name="email" disabled value="'. $ApplicantEmail .'"/>
                                        <i class="fa fa-lock fa-fw fa-lg"></i><br />
                                        <label>Networks</label>
                                        <input type="text" disabled/>
                                        <i class="fa fa-plus-circle fa-fw fa-lg"></i><br />
                                        <ul>
                                            <li><i class="fa fa-facebook fa-fw fa-lg"></i></li>
                                            <li><i class="fa fa-linkedin fa-fw fa-lg"></i></li>
                                            <li><i class="fa fa-twitter fa-fw fa-lg"></i></li>
                                        </ul>
                                        <div class="text-center">
                                            <button type="button" class="btn">Cancel</button>
                                            <button type="submit" class="btn" name="saveAccount" >Save</button>
                                        </div>
                                    </form>';
                            ?>
                            </div>
                        <?php include 'changePassword.php'; ?>
                        <div class="security">
                            <h1>Security</h1>
                            <label>Password</label>
                            <button type="button" class="btn changePasswordButton">Change</button>
                            <div class="accordion">
                                <div class="head">
                                    <i class="fa fa-caret-right fa-fw fa-lg"></i>
                                    <h5>Two factor authertication</h5>
                                </div>
                                <div class="subContent">
                                    <form action="" method="post">
                                        <input type="radio" id="email" />
                                        <label for="email">Turn on using e-mail</label><br />
                                        <input type="email" placeholder="Your e-mail" />
                                        <button type="submit" class="btn">Activate</button>
                                    </form>
                                    <form action="" method="post">
                                        <input type="radio" id="phone" />
                                        <label for="phone">Turn on using phone number (SMS)</label><br />
                                        <input type="tel" placeholder="Your number" />
                                        <button type="submit" class="btn">Activate</button>
                                    </form>
                                </div>
                                <div class="head">
                                    <i class="fa fa-caret-right fa-fw fa-lg"></i>
                                    <h5>Login notification</h5>
                                </div>
                                <div class="subContent">
                                    <form action="" method="post">
                                        <span>Send me a notification with every login operation</span>
                                        <input type="checkbox" id="careereaNotification"/>
                                        <label for="careereaNotification">Careerea Notification</label><br />
                                        <input type="checkbox" id="emailNotification"/>
                                        <label for="emailNotification">E-mail Notification</label><br />
                                        <button type="button" class="btn">Cancel</button>
                                        <button type="button" class="btn">Save</button>
                                    </form>
                                </div>
                                <div class="head">
                                    <i class="fa fa-caret-right fa-fw fa-lg"></i>
                                    <h5>Login history</h5>
                                </div>
                                <div class="subContent">
                                    <table>
                                        <tr>
                                            <th>Device type</th>
                                            <th>Location</th>
                                            <th>Time</th>
                                            <th>Manage</th>
                                        </tr>
                                        <tr>
                                            <td>HTC-Android</td>
                                            <td>Egypt</td>
                                            <td>3:12 PM</td>
                                            <td>
                                                <button type="button" class="btn">Not you?</button>
                                                <button type="button" class="btn btn-danger">Delete</button>
                                            </td>
                                        </tr>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <div class="notification">
                            <h1>Notification</h1>
                            <div class="accordion">
                                <div class="head">
                                    <i class="fa fa-caret-right fa-fw fa-lg"></i>
                                    <h5>Jobs</h5>
                                </div>
                                <div class="subContent">
                                    <form action="" method="post">
                                        <input type="checkbox" class="selectAll" id="jAll"/><label for="jAll">Select All</label><br />
                                        <input type="checkbox" id="jaaf"/><label for="jaaf">Notify me when i'm accepted in every job i'm applying for</label><br />
                                        <input type="checkbox" id="jif"/><label for="jif">Notify me with every job posted in my interested fields</label><br />
                                        <input type="checkbox" id="jcf"/><label for="jcf">Notify me with every job posted from companies i follow</label><br />
                                        <input type="checkbox" id="jnl"/><label for="jnl">Notify me with every job posted near to my location</label><br />
                                        <input type="checkbox" id="jnlif"/><label for="jnlif">Notify me with every job posted near to my location in my interested fields</label><br />
                                        <input type="checkbox" id="jms"/><label for="jms">Notify me with every job suits my most skills</label><br />
                                        <input type="checkbox" id="jhsif"/><label for="jhsif">Notify me with every job posted with high salary in my interested fields</label><br />
                                        <button type="button" class="btn">cancel</button>
                                        <button type="button" class="btn">Save</button>
                                    </form>
                                </div>
                                <div class="head">
                                    <i class="fa fa-caret-right fa-fw fa-lg"></i>
                                    <h5>Courses</h5>
                                </div>
                                <div class="subContent">
                                    <form action="" method="post">
                                        <input type="checkbox" class="selectAll" id="cAll"/><label for="cAll">Select All</label><br />
                                        <input type="checkbox" id="cecap"/><label for="cecap">Notify me when it's time to continue my enrolled courses according their plans</label><br />
                                        <input type="checkbox" id="cif"/><label for="cif">Notify me with every uploaded course in my interested fields</label><br />
                                        <input type="checkbox" id="crs"/><label for="crs">Notify me with every uploaded course related with my skills</label><br />
                                        <input type="checkbox" id="cec"/><label for="cec">Notify me with every update for my enrolled courses</label><br />
                                        <button type="button" class="btn">cancel</button>
                                        <button type="button" class="btn">Save</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <div class="language">
                            <h1>Language</h1>
                            <form action="" method="post">
                                <input type="radio" name="lang" id="arabic" />
                                <label for="arabic">Arabic</label><br />
                                <input type="radio" name="lang" id="english" />
                                <label for="english">English</label><br />
                                <button type="button" class="btn">cancel</button>
                                <button type="button" class="btn">Save</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        <?php include 'footer.php'; ?>
        <?php require 'scripts.php'; ?>
    </body>
</html>