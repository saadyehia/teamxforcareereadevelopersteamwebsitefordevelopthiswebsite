<?php

    session_start();
    include "php/init.php";
    $pageTitle = "Job Name";
?>

<!DOCTYPE html>
<html lang="en">
    <?php require 'head.php'; ?>
    <body>
    
        <?php include 'navbar.php'; ?>
        
        <!-- Start Section View Job Details -->
        <section class="viewJobDetails">
            <div class="container">
                <div class="row">
                    <?php include 'applyBox-compareBox.php'; ?>
                    <div class="col-sm-9 col-xs-12 thumbnail">
                        <div class="col-xs-3">
                            <img class="img-responsive" src="images/profile/activity/dell.png" alt="Dell">
                        </div>
                        <div class="col-xs-9">
                            <h1 class="courseInfo"> Job Title</h1>
                            <h3> Andrriod Developer </h3>
                            <h2 class="courseInfo">Company Name </h2>
                            <h3> IBM </h3>
                            <h2 class="courseInfo">Location</h2>
                            <h3>6-october</h3>
                        </div>
                        <div class="col-xs-12">
                            <div class="text-center">
                                <table class="table table-hover">
                                    <tr>
                                        <td class="courseInfo">Salary</td>
                                        <td class="courseInfo">Level</td>
                                        <td class="courseInfo">Applied</td>
                                        <td class="courseInfo">Date Posted </td>
                                    </tr>
                                    <tr>
                                        <td>300LE</td>
                                        <td>Senior</td>
                                        <td>15</td>
                                        <td>15 April</td>
                                    </tr>
                                </table>
                            </div>
                            <div class=" viewCourseFormMobile text-center visible-xs">
                                <button class="formButton btn btn-danger btn-lg applyJob">Apply </button>  
                                <button class="formButton btn btn-danger btn-lg compareSkills">Compare With my Skills</button>
                                <button class="formButton bnn btn-danger btn-lg followButton">Follow</button>
                            </div> 
                        </div>
                    </div>
                    <div class="col-sm-3 hidden-xs">
                        <div class="viewCourseForm text-center">
                            <button class="formButton btn btn-danger btn-lg applyJob">Apply</button>  
                            <button class="formButton btn btn-danger btn-lg compareSkills">Compare With my Skills</button> 
                            <button class="formButton bnn btn-danger btn-lg followButton">Follow</button>
                            <p class="lead followText">"Follow To Be Notified with Every Job Posted By This Company"</p>
                        </div> 
                    </div> 
                    <div class="col-sm-9 col-xs-12">
                        <div class="viewCourseTabs">
                            <ul class="myTabs nav nav-tabs">
                                <li id="tab1">Job Requirments</li>
                                <li id="tab2" class="inactive">Job Describtion</li>
                                <li id="tab3" class="inactive">About Company</li>
                            </ul>
                        </div>
                        <div class="tabsDetails">
                            <!-- Start Tab Job Requirements -->
                            <div id="tab1Job">
                                <div class="jobRequirements">
                                    <div class="row">
                                        <div class="col-sm-12 col-xs-12">
                                            <div class="text-center jobRequirementsButtons text-center">
                                                <button id="mainRequirements"    class="btn btn-danger">Main Requirements</button>
                                                <button id="skillsNeeded"       class="btn btn-danger inactive">Skills Needed</button>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="activityBoxs">
                                        <div id="mainRequirementsBox">
                                            <div class="row">
                                                <div class="col-xs-12">
                                                    <div class="content">
                                                        <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry.</p>
                                                        <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry.</p>
                                                        <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry.</p>
                                                        <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry.</p>
                                                    </div>
                                                </div>
                                                
                                            </div>
                                        </div>
                                        <div id="skillsNeededBox">
                                             <div class="row tabHeader text-center">
                                                <div class="col-xs-6">
                                                    <h1>Content</h1>
                                                </div>
                                                <div class="col-xs-6">
                                                    <h1>View Details</h1>
                                                </div>
                                            </div>
                                            <hr class="viewCoursDetailsHR">
                                            <div class="row test text-center">
                                                <div class="col-xs-6">
                                                    <h2>PHP</h2>
                                                </div>
                                                <div class="col-xs-6">
                                                    <a href="#" target="_blank"><i class="fa fa-eye fa-lg fa-fw"></i></a>
                                                </div>
                                            </div>
                                            <div class="row test text-center">
                                                <div class="col-xs-6">
                                                    <h2>Java</h2>
                                                </div>
                                                <div class="col-xs-6">
                                                    <a href="#" target="_blank"><i class="fa fa-eye fa-lg fa-fw"></i></a>
                                                </div>
                                            </div>
                                            <div class="row test text-center">
                                                <div class="col-xs-6">
                                                    <h2>HTML5</h2>
                                                </div>
                                                <div class="col-xs-6">
                                                    <a href="#" target="_blank"><i class="fa fa-eye fa-lg fa-fw"></i></a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>  
                            <!-- End Tab Job Requiremens -->
                            <!-- Start Tab Job Describtion -->
                            <div id="tab2Job">
                                <div class="jobDescribtion">
                                    <div class="activityBoxs">
                                        <div class="row">
                                            <div class="col-xs-12">
                                                <h1> Main Rules in this Job in Company <span>HP</span></h1>
                                                <div class="content">
                                                    <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry.</p>
                                                    <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry.</p>
                                                    <p> Lorem Ipsum is simply dummy text of the printing and typesetting industry.</p>
                                                    <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry.</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    
                                </div>
                            </div>
                            <!-- End Tab Job Describtion -->
                            <!-- Start Tab About Company -->
                            <div id="tab3Job">
                                <section class="aboutCompany">
                                    <div class="row">
                                        <div class="col-xs-3">
                                            <div class="instructorImage">
                                                <img class="img-circle img-responsive" src="images/jobs/htc.png"> 
                                            </div>
                                            <div class="instrucorInfo text-center">
                                                <h3>HTC</h3>
                                                <h4>13 Job</h4>
                                                <h5>69 Applicant</h5>
                                                <span class="InstrucotrSocial">
                                                    <a target="_blank" href="http://www.facebook.com"><i class="fa fa-facebook fa-lg fa-fw"></i></a>
                                                    <a target="_blank" href="http://www.twitter.com"><i class="fa fa-twitter fa-lg fa-fw"></i></a>
                                                    <a target="_blank" href="http://www.youtube.com"><i class="fa fa-youtube fa-lg fa-fw"></i></a>
                                                    <a target="_blank" href="http://www.linkedin.com"><i class="fa fa-linkedin fa-lg fa-fw"></i></a>
                                                </span>
                                            </div>
                                        </div>
                                        <div class="col-xs-9">
                                            <p class="lead">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum</p>
                                            <button class="btn btn-danger">See More</button>
                                        </div>
                                    </div>
                                </section>
                            </div>
                            <!-- End Tab About Company -->
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- End Section View Job Details -->
        
        <?php include 'footer.php'; ?>
        <?php require 'scripts.php'; ?>	
    </body>
</html>