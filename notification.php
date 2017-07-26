<?php

    session_start();
    include "php/init.php";
    $pageTitle = "Notification";
?>

<!DOCTYPE html>
<html>
    <?php require 'head.php'; ?>
    <body>
        
        <?php include 'navbar.php'; ?>
        
        <section class="notification">
            <div class="container">
                <div class="notificationContent">
                    <div class="row">
                        <div class="col-sm-12">
                            <h1> You Have 2b Notifications </h1>
                            <div class="notificationTabs">
                                <ul class="myTabs nav nav-tabs">
                                    <li id="tab1"> Courses <span> 8 </span> </li>
                                    <li id="tab2" class="inactive"> Jobs <span> 18 </span></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <?php include 'takeCourse.php'; ?>
                    <?php include 'applyBox-compareBox.php'; ?>
                    <div class="tabsDetails">
                    <div id="tab1Content">
                        <div class="row">
                            <div class="col-xs-12">
                                <div class="thumbnail activityCourse">
                                    <a href="images/profile/activity/dell.png" target="_blank">
                                        <img class="img-responsive" src="images/profile/activity/dell.png" alt="Dell">
                                    </a>
                                    <div class="courseTime">
                                         <h3> 12 <span> Hours</span></h3>
                                    </div>
                                   
                                    <div class="caption">
                                        <div class="activityCourseTitle text-center">
                                            <h4>Android Developer</h4>
                                        </div>
                                        <div class="activityCoursePrerequisites text-center">
                                            <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry.</p>
                                        </div>
                                        <div class="text-center">
                                            <button class="btn btn-danger courseDetails"> See This Course </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- -->
                        </div>
                    </div>
                    <div id="tab2Content">
                        <div class="row">
                            <div class="col-xs-12">
                                <div class="thumbnail activityCourse">
                                    <a href="images/profile/activity/dell.png" target="_blank">
                                        <img class="img-responsive" src="images/profile/activity/dell.png" alt="Dell">
                                    </a>
                                    <div class="courseTime">
                                        <h3> 12 <span> Hours</span></h3>
                                    </div>
                                    <div class="caption">
                                        <div class="activityCourseTitle text-center">
                                            <h4>Dell</h4>
                                            <h5>Android Developer</h5>
                                        </div>
                                        <div class="activityCoursePrerequisites text-center">
                                            <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry.</p>
                                        </div>
                                    </div>
                                    <div class="text-center">
                                        <button class="btn btn-danger activityButton jobDetails">See This Job</button>
                                    </div>
                                </div>
                            </div>	
                            <!-- -->
                        </div>
                    </div>
                </div>
                </div>
            </div>
        </section>
        
        <?php include 'footer.php'; ?>
        <?php require 'scripts.php'; ?>
    </body>
</html>