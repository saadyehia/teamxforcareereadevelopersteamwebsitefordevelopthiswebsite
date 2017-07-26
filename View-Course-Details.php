<?php

    session_start();
    include "php/init.php";
    $pageTitle = "Course Name";
?>

<!DOCTYPE html>
<html lang="en">
        <?php require 'head.php'; ?>
        
    <body>
    
        <?php include 'navbar.php'; ?>
        
        <!-- Start Secion View Course Details -->
        
        <section class="viewCourseDetails">
            <div class="container">
                <div class="row">
                    <?php include 'takeCourse.php'; ?>
                    <div class="col-sm-9 col-xs-12 thumbnail">
                        <div class="col-xs-3">
                            <img class="img-responsive" src="images/profile/activity/dell.png" alt="Dell">
                        </div>
                        <div class="col-xs-9">
                            <div class="courseDetails">
                                <h1 class="courseInfo"> Course Name</h1>
                                <h3> Andrriod Developer </h3>
                                <h2 class="courseInfo">Instructor Name</h2>
                                <h3> John Mina</h3>
                            </div>
                        </div>
                        <div class="col-xs-12">
                            <div class="text-center">
                                <table class="table table-hover">
                                    <tr>
                                        <td class="courseInfo">Enrolled</td>
                                        <td class="courseInfo">Videos</td>
                                        <td class="courseInfo">Hours</td>
                                        <td class="courseInfo">Last Update</td>
                                    </tr>
                                    <tr>
                                        <td>15</td>
                                        <td>98</td>
                                        <td>30</td>
                                        <td>15 April</td>
                                    </tr>
                                </table>
                            </div>
                            <div class=" viewCourseFormMobile text-center visible-xs">
                                <button class="formButton btn btn-danger btn-lg takeCourse">Take It Now </button>  
                                <button class="formButton btn btn-danger btn-lg">Add To Favourite</button>  
                            </div> 
                        </div>
                    </div>
                    <div class="col-sm-3 hidden-xs">
                        <div class="viewCourseForm text-center">
                            <button class="formButton btn btn-danger btn-lg takeCourse">Take It Now</button>  
                            <button class="formButton btn btn-danger btn-lg">Add To Favourite</button>  
                        </div> 
                    </div> 
                    <div class="col-sm-9 col-xs-12">
                        <div class="viewCourseTabs">
                            <ul class="myTabs nav nav-tabs">
                                <li id="tab1">Course Prerequisites<span><br> (5)</span></li>
                                <li id="tab2" class="inactive">You Will Learn</li>
                                <li id="tab3" class="inactive">Videos <span><br> (3)</span></li>
                                <li id="tab4" class="inactive">Q/A <span><br> (8) </span></li>
                                <li id="tab5" class="inactive">About Instructor</li>
                                <li id="tab6" class="inactive">Rate This Course</li>
                            </ul>
                        </div>
                        <div class="tabsDetails">
                            <!-- Start Tab Course Prequisites -->
                            <div id="tab1Course">
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
                            <!-- End Tab Course Prequisites -->
                            <!-- Start Tab You Will Learn --->
                            <div id="tab2Course">
                                <div class="row ">
                                    <div class="col-xs-12">
                                        <article class="courseDescription">
                                            <p> Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum
                                            </p>
                                        </article>
                                    </div>
                                    
                                </div>
                            </div>
                             <!-- End Tab You Will Learn --->
                            <!-- Start Tab Videos and exams -->
                            <div id="tab3Course">
                                <div class="row">
                                    <div class="agentVideo">
                                        <div class="gridrow">

                                            <div class="menu col-sm-3">
                                              <div class="logo"><p>Watch<br>Some<br>Videos!</p></div>
                                              <div class="links link1 active"><span>01.</span>&nbsp; Welcome </div>
                                              <div class="links link2"><span>02.</span>&nbsp; Prepare </div>
                                              <div class="links link3"><span>03.</span>&nbsp; Expect</div>
                                              <div class="links link4"><span>04.</span>&nbsp; Questions? </div>
                                              <div class="links link5"><span>05.</span>&nbsp; Learn </div>
                                            </div>
                                            <div class="content col-sm-9">
                                                <div class="pages page1 active">
                                                    <div class="videoBox">
                                                        <iframe src="https://www.youtube.com/embed/Uc3Ugnhe-b0" width="500" height="281" frameborder="0" webkitallowfullscreen mozallowfullscreen allowfullscreen></iframe>
                                                    </div>
                                                    <div class="gridrow">
                                                        <div class="text-center">
                                                            <div class="btn gray"><&nbsp; Go Back</div>
                                                            <div class="btn link2">Continue &nbsp;></div>
                                                            
                                                        </div>
                                                    </div>        
                                                </div>
                                                <div class="pages page2">
                                                    <div class="videoBox">
                                                            <iframe src="https://www.youtube.com/embed/Uc3Ugnhe-b0" width="500" height="281" frameborder="0" webkitallowfullscreen mozallowfullscreen allowfullscreen></iframe>
                                                        </div>
                                                    <div class="gridrow">
                                                      <div class="text-center">
                                                          <div class="btn link1"><&nbsp; Go Back</div>
                                                        <div class="btn link3">Continue &nbsp;></div>
                                                        
                                                      </div>
                                                    </div>
                                                </div>
                                                <div class="pages page3">
                                                    <div class="videoBox">
                                                        <iframe src="https://www.youtube.com/embed/Uc3Ugnhe-b0" width="500" height="281" frameborder="0" webkitallowfullscreen mozallowfullscreen allowfullscreen></iframe>
                                                    </div>
                                                    <div class="gridrow">
                                                      <div class="text-center">
                                                          <div class="btn link2"><&nbsp; Go Back</div>
                                                        <div class="btn link4">Continue &nbsp;></div>
                                                        
                                                      </div>
                                                    </div>
                                                </div>
                                                <div class="pages page4">
                                                    <div class="videoBox">
                                                            <iframe src="https://www.youtube.com/embed/Uc3Ugnhe-b0" width="500" height="281" frameborder="0" webkitallowfullscreen mozallowfullscreen allowfullscreen></iframe>
                                                    </div>
                                                    <div class="gridrow">
                                                     
                                                      <div class="text-center">
                                                          <div class="btn link3"><&nbsp; Go Back</div>
                                                        <div class="btn link5">Continue &nbsp;></div>
                                                        
                                                      </div>
                                                    </div>
                                                </div>
                                                <div class="pages page5">
                                                    <div class="videoBox">
                                                            <iframe src="https://www.youtube.com/embed/Uc3Ugnhe-b0" width="500" height="281" frameborder="0" webkitallowfullscreen mozallowfullscreen allowfullscreen></iframe>
                                                        </div>
                                                    <div class="gridrow">
                                                      <div class="text-center">
                                                          <div class="btn link4"><&nbsp; Go Back</div>
                                                        <div class="btn gray">Continue &nbsp;></div>
                                                        
                                                      </div>
                                                    </div>
                                              </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- End Tab Videos and exams -->
                            <!-- Start Tab َQ/A -->
                            <div id="tab4Course">
                                <div class="row">
                                    <div class="col-xs-12">
                                        <!-- Start FAQ Intro -->
                                        <section class="faq text-center">
                                            <h1>Frequently Asked Questions</h1>
                                            <p class="lead">Lorem Ipsum is simply dummy text of the printing and typesetting industry.</p>
                                        </section>
                                        <!-- End FAQ Intro -->
                                        <section class="faq-questions">
                                            <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
                                                <!-- Start Question 1 
                                                <div class="panel panel-default">
                                                   
                                                        <div class="panel-heading" role="tablist" id="heading-one">
                                                            <h4 class="panel-title">

                                                                <a class="collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapse-one" aria-expanded="true" aria-controls="collapse-one">
                                                                    <div class="row">
                                                                        <div class="col-xs-4">
                                                                            <img class="faqImage img-responsive img-circle" src="images/person1.jpg"/>
                                                                            <h3 class="text-center">Ahmed</h3>
                                                                        </div>
                                                                        <div class="col-xs-8">
                                                                            <p class="lead faqQuestion">I Don't UnderStand CSS3 in videos </p>
                                                                        </div>
                                                                    </div>
                                                                </a>
                                                            </h4>
                                                        
                                                    </div>
                                                        <!-- in ==> to make it default open 
                                                    <div id="collapse-one" class="panel-collapse collapse" aria-labelledby="heading-one">
                                                        <div class="panel-body">
                                                            <div class="row">
                                                                <div class="col-xs-4">
                                                                    <img class="faqImage img-responsive img-circle" src="images/person2.jpg"/>
                                                                    <h3 class="text-center">Instructor Name</h3>
                                                                </div>
                                                                <div class="col-xs-8">
                                                                    <p class="lead faqQuestion">You can check this link w3scools.com/css3 </p>
                                                                </div>
                                                            </div>                                        
                                                        </div>
                                                    </div>
                                                </div>
                                                 End Question 1 -->
                                                <!-- Start Question 2 -->
                                                <div class="panel panel-default">
                                                    <div class="panel-heading" role="tablist" id="heading-two">
                                                        <h4 class="panel-title">
                                                            <a class="collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapse-two" aria-expanded="true" aria-controls="collapse-two">
                                                               <p class="lead">#02 How TO Use Java Script?</p>
                                                            </a>
                                                        </h4>
                                                    </div>
                                                    <!-- in ==> to make it default open -->
                                                    <div id="collapse-two" class="panel-collapse collapse " aria-labelledby="heading-two">
                                                        <div class="panel-body">
                                                                if i want make override of same attribute of same element ... i add !important .. so this will execute .. and will ignore another ... i can get this file from google too .. but better when i made it by my-hand .. i just look at forms and texts must be at right .. and change float from left to right when i need it ..
                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- End Question 2 -->
                                            </div>
                                        </section>
                                    </div>
                                </div>
                            </div>                            
                            <!-- End Tab Q/A -->
                            <!-- Start Tab About Instructor -->
                            <div id="tab5Course">
                                <section class="aboutInstrcutor">
                                    <div class="row">
                                        <div class="col-xs-3">
                                            <div class="instructorImage">
                                                <img class="img-circle img-responsive" src="images/person2.jpg"> 
                                            </div>
                                            <div class="instrucorInfo text-center">
                                                <h3>Ahmed Hussein</h3>
                                                <h4>Java Software Development</h4>
                                                <h5>9 courses</h5>
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
                            <!-- End Tab About Instructor -->
                            <!-- Start Tab Rate This Course -->
                            <div id="tab6Course">
                                <section class="RateCourse">
                                    <div class="row">
                                        <div class="col-xs-12">
                                            <form>
                                                <div class="wrapper">
                                                    <div class="star-wrapper">
                                                        <input class="star star5" id="radio5" type="radio" name="rating" value="5">
                                                        <label class="star star5" for="radio5"></label>

                                                        <input class="star star4" id="radio4" type="radio" name="rating" value="4">
                                                        <label class="star star4" for="radio4"></label>

                                                        <input class="star star3" id="radio3" type="radio" name="rating" value="3">
                                                        <label class="star star3" for="radio3"></label>

                                                        <input class="star star2" id="radio2" type="radio" name="rating" value="2">
                                                        <label class="star star2" for="radio2"></label>

                                                        <input class="star star1" id="radio1" type="radio" name="rating" value="1">
                                                        <label class="star star1" for="radio1"></label>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <h1>Feed Back</h1>
                                                    <textarea class="form-control inpug-lg" placeholder="Your Message"></textarea>
                                                </div>
                                                
                                                <button class="btn btn-danger btn-lg btn-block" type="button">Finish</button>
                                            </form>
                                             
                                        </div>
                                    </div>
                                </section>
                            </div>
                            <!-- End Tab Rate This Course -->
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- End Section View Course Details -->
        <?php include 'footer.php'; ?>
        
        <?php require 'scripts.php'; ?>
        
    </body>
</html>