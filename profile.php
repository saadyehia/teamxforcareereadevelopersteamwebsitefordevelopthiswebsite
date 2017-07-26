<?php

    session_start();
    include "php/init.php";
    $pageTitle = "Profile";

    $profileData = $connect->prepare("SELECT * FROM applicants WHERE applicant_ID = ?");
    $profileData->execute(array($_SESSION['userID']));
    $row = $profileData->fetch();

    $ApplicantPhone = $row['phone'];
    $ApplicantBio = $row['bio'];
    $ApplicantFacebook = $row['facebook'];
    $ApplicantLinkedIn = $row['linkedin'];
    $ApplicantGit = $row['git'];

?>

<!DOCTYPE html>
<html lang="en">
    <?php require 'head.php'; ?>
    <body>
    
        <?php include 'navbar.php'; ?>
        
        <!-- Start Profile Section -->
        <?php include 'skills.php'; ?>
        <?php echo '<section class="profile">'; ?>
            <?php include 'takeCourse.php'; ?>
            <?php include 'applyBox-compareBox.php'; ?>
            <?php echo '<div class="profileCover"></div>
            <div class="container">
                <div class="profileInfo"> 
                    <div class="profileContent">
                        <div class="row">
                            <div class="col-xs-9">                                
                                <section class="profileImage" >
                                    <img class="img-circle userImage img-responsive" src="applicants/profile_pics/'. $ApplicantProfilePhoto .'">
                                    <div class="profileOver">
                                        <form class="fileUploader">
                                            <label class="inputImage" for="fileInput">
                                                <span class="iconCamera glyphicon glyphicon-camera"></span> Change Picture 
                                            </label>
                                            <input id="fileInput" type="file" />
                                        </form>
                                    </div>
                                </section>
                                <section class="profileUsername">
                                    <h2>'. $ApplicantName .'</h2>
                                    <h4>Web Developer</h4>
                                </section>
                                <section class="userContactInfo">
                                    <h4><i class="fa fa-phone"></i>'. $ApplicantPhone .'</h4>  
                                    <span class="profileSocial">
                                        <a target="_blank" href="http://www.'. $ApplicantFacebook .'"><i class="fa fa-facebook fa-lg fa-fw"></i></a>
                                        <a target="_blank" href="http://www.twitter.com"><i class="fa fa-twitter fa-lg fa-fw"></i></a>
                                        <a target="_blank" href="http://www.youtube.com"><i class="fa fa-youtube fa-lg fa-fw"></i></a>
                                        <a target="_blank" href="http://www.'. $ApplicantLinkedIn .'"><i class="fa fa-linkedin fa-lg fa-fw"></i></a>
                                    </span>
                                </section>
                                <section class="userBio">
                                <h1>BIO</h1>
                                    <h3>'. $ApplicantBio .'</h3>
                                </section>
                                
                            </div>
                            <div class="col-sm-3">
                                <div class="editProfile"><i class="fa fa-edit fa-3x fa-fw" id="editProfileButton"></i></div>
                                <div class="text-center hidden-xs userButtonsMediaL">
                                    <form class="form-inline">
                                        <div class="userCv">
                                            Upload Your CV
                                            <input type="file" class="hideInput form-control"/>
                                        </div>
                                    </form>
                                </div> 
                            </div>
                            <div class="col-xs-12 visible-xs">
                                <section class="userButtons visible-xs text-center">
                                    <<form class="form-inline">
                                        <div class="userCv">
                                            Upload Your CV
                                            <input type="file" class="hideInput form-control"/>
                                        </div>
                                    </form>
                                </section>
                            </div>
                        </div>'; ?>
                        
                        <div class="profileAbout">
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="profileAboutTabs">
                                        <ul class="myTabs nav nav-tabs">
                                            <li id="tab1">Skills</li>
                                            <li id="tab2" class="inactive">Activity</li>
                                            <li id="tab3" class="inactive">Enrolled Courses</li>
                                            <li id="tab4" class="inactive">Applied Jobs</li>
                                            <li id="tab5" class="inactive">Portfolio</li>
                                            <li id="tab6" class="inactive">Favourits</li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="tabsDetails">
                                <!-- Start Skills -->
                                <div id="tab1Content">
                                    <div class="row">
                                        <div class="col-xs-12">
                                            <div class="text-center ">
                                                <button class="skillsButton btn btn-danger addSkillButton">Add Skills</button>
                                                <button class="skillsButton btn btn-danger arrangeSkillButton">Arrange Skills</button>
                                                <button class="skillsButton btn btn-danger editSkillButton">Edit Skills</button>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row text-center">
                                        <?php

                                        $gettingSkills = $connect->prepare("SELECT DISTINCT skills.skill_name 
                                                                            FROM skills
                                                                            JOIN applicant_skills ON skills.skill_ID = applicant_skills.skill_ID
                                                                            WHERE applicant_skills.applicant_ID = ?");
                                        $gettingSkills->execute(array($_SESSION['userID']));

                                        while ($row = $gettingSkills->fetch(PDO::FETCH_ASSOC)) {

                                            $skillName = $row['skill_name'];

                                            echo '<div class="col-sm-4">
                                                    <div class="skillBox text-center">
                                                        <h3>' . $skillName . '</h3>
                                                    </div>
                                                </div>';

                                        }
                                        ?>
                                    </div>       
                                </div>
                                <!-- End Skills -->
                                <!-- Start Activity -->
                                <div id="tab2Content">
                                    <div class="row">
                                        <div class="col-sm-12 col-xs-12">
                                            <div class="text-center activityButtons">
                                                <button id="activityCourses"    class="btn btn-danger">Courses</button>
                                                <button id="activityJobs"       class="btn btn-danger inactive">Jobs</button>
                                                <button id="activityProfiles"   class="btn btn-danger inactive">Profiles</button>
                                                <button id="activityPortfolios" class="btn btn-danger inactive">Portfolios</button>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="activityBoxs">
                                        <div id="activityCoursesBox">
                                            <div class="row">
                                                <div class="col-sm-4">
                                                    <div class="thumbnail activityCourse">
                                                        <a href="images/profile/activity/dell.png" target="_blank">
                                                            <img class="img-responsive" src="images/profile/activity/dell.png" alt="Dell">
                                                        </a>
                                                        <div class="caption">
                                                            <div class="activityCourseTitle text-center">
                                                                <h4>Android Developer</h4>
                                                            </div>
                                                            <div class="text-center">
                                                                <table class="table">
                                                                    <tr>
                                                                        <td class="courseInfo">Hours</td>
                                                                        <td class="courseInfo">video</td>
                                                                        <td class="courseInfo">Enrolled</td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td>18</td>
                                                                        <td>98</td>
                                                                        <td>105</td>
                                                                    </tr>
                                                                    
                                                                </table>
                                                            </div>
                                                             <div class="activityCoursePrerequisites text-center">
                                                                <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry.
                                                                </p>
                                                            </div>
                                                            <div class="text-center">
                                                                <div class="starWrapper">
                                                                    <span class="glyphicon glyphicon-star" aria-hidden="true"></span>
                                                                    <span class="glyphicon glyphicon-star" aria-hidden="true"></span>
                                                                    <span class="glyphicon glyphicon-star" aria-hidden="true"></span>
                                                                    <span class="glyphicon glyphicon-star" aria-hidden="true"></span>
                                                                    <span class="glyphicon glyphicon-star" aria-hidden="true"></span>
                                                                    <div class="starTop" style="width:89%">
                                                                        <span class="glyphicon glyphicon-star" aria-hidden="true"></span>
                                                                        <span class="glyphicon glyphicon-star" aria-hidden="true"></span>
                                                                        <span class="glyphicon glyphicon-star" aria-hidden="true"></span>
                                                                        <span class="glyphicon glyphicon-star" aria-hidden="true"></span>
                                                                        <span class="glyphicon glyphicon-star" aria-hidden="true"></span>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="text-center visible-xs">
                                                                <button class="btn btn-danger takeCourse">Take It Now</button>
                                                                <button class="btn btn-danger"> Add To Favourite</button>
                                                                <button class="btn btn-danger courseDetails"> See This Course </button>
                                                            </div>
                                                        </div>
                                                        <!-- end Activity course -->
                                                        <div class="activityCourseOver">
                                                            <button class="btn btn-danger takeCourse">Take It Now</button>
                                                            <button class="btn btn-danger"> Add To Favourite</button>
                                                            <button class="btn btn-danger courseDetails"> See This Course </button>
                                                        </div>
                                                        <!-- End Activity course Over -->
                                                    </div>
                                                </div>	
                                                <!-- -->
                                                <div class="col-sm-4">
                                                    <div class="thumbnail activityCourse">
                                                        <a href="images/profile/activity/apple.png" target="_blank">
                                                            <img class="img-responsive" src="images/profile/activity/apple.png" alt="Apple">
                                                        </a>
                                                        <div class="caption">
                                                            <div class="activityCourseTitle text-center">
                                                                <h4>IOS Developer</h4>
                                                            </div>
                                                            <div class="text-center">
                                                                <table class="table ">
                                                                    <tr>
                                                                        <td class="courseInfo">Hours</td>
                                                                        <td class="courseInfo">video</td>
                                                                        <td class="courseInfo">Enrolled</td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td>18</td>
                                                                        <td>98</td>
                                                                        <td>105</td>
                                                                    </tr>
                                                                    
                                                                </table>
                                                            </div>
                                                             <div class="activityCoursePrerequisites text-center">
                                                                <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry.
                                                                </p>
                                                            </div>
                                                            <div class="text-center">
                                                                <div class="starWrapper">
                                                                    <span class="glyphicon glyphicon-star" aria-hidden="true"></span>
                                                                    <span class="glyphicon glyphicon-star" aria-hidden="true"></span>
                                                                    <span class="glyphicon glyphicon-star" aria-hidden="true"></span>
                                                                    <span class="glyphicon glyphicon-star" aria-hidden="true"></span>
                                                                    <span class="glyphicon glyphicon-star" aria-hidden="true"></span>
                                                                    <div class="starTop" style="width:89%">
                                                                        <span class="glyphicon glyphicon-star" aria-hidden="true"></span>
                                                                        <span class="glyphicon glyphicon-star" aria-hidden="true"></span>
                                                                        <span class="glyphicon glyphicon-star" aria-hidden="true"></span>
                                                                        <span class="glyphicon glyphicon-star" aria-hidden="true"></span>
                                                                        <span class="glyphicon glyphicon-star" aria-hidden="true"></span>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="text-center visible-xs">
                                                                <button class="btn btn-danger takeCourse">Take It Now</button>
                                                                <button class="btn btn-danger"> Add To Favourite</button>
                                                                <button class="btn btn-danger courseDetails"> See This Course </button>
                                                            </div>
                                                        </div>
                                                        <!-- end Activity course -->
                                                        <div class="activityCourseOver">
                                                            <button class="btn btn-danger takeCourse">Take It Now</button>
                                                            <button class="btn btn-danger"> Add To Favourite</button>
                                                            <button class="btn btn-danger courseDetails"> See This Course </button>
                                                        </div>
                                                        <!-- End Activity course Over -->
                                                    </div>
                                                </div>
                                                <!-- -->
                                               <div class="col-sm-4">
                                                    <div class="thumbnail activityCourse">
                                                        <a href="images/profile/activity/php.png" target="_blank">
                                                            <img class="img-responsive" src="images/profile/activity/hp.png" alt="HP">
                                                        </a>
                                                        <div class="caption">
                                                            <div class="activityCourseTitle text-center">
                                                                <h4>IOS Developer</h4>
                                                            </div>
                                                            <div class="text-center">
                                                                <table class="table">
                                                                    <tr>
                                                                        <td class="courseInfo">Hours</td>
                                                                        <td class=courseInfo>video</td>
                                                                        <td class="courseInfo">Enrolled</td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td>18</td>
                                                                        <td>98</td>
                                                                        <td>105</td>
                                                                    </tr>
                                                                    
                                                                </table>
                                                            </div>
                                                             <div class="activityCoursePrerequisites text-center">
                                                                <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry.
                                                                </p>
                                                            </div>
                                                            <div class="text-center">
                                                                <div class="starWrapper">
                                                                    <span class="glyphicon glyphicon-star" aria-hidden="true"></span>
                                                                    <span class="glyphicon glyphicon-star" aria-hidden="true"></span>
                                                                    <span class="glyphicon glyphicon-star" aria-hidden="true"></span>
                                                                    <span class="glyphicon glyphicon-star" aria-hidden="true"></span>
                                                                    <span class="glyphicon glyphicon-star" aria-hidden="true"></span>
                                                                    <div class="starTop" style="width:89%">
                                                                        <span class="glyphicon glyphicon-star" aria-hidden="true"></span>
                                                                        <span class="glyphicon glyphicon-star" aria-hidden="true"></span>
                                                                        <span class="glyphicon glyphicon-star" aria-hidden="true"></span>
                                                                        <span class="glyphicon glyphicon-star" aria-hidden="true"></span>
                                                                        <span class="glyphicon glyphicon-star" aria-hidden="true"></span>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="text-center visible-xs">
                                                                <button class="btn btn-danger takeCourse">Take It Now</button>
                                                                <button class="btn btn-danger"> Add To Favourite</button>
                                                                <button class="btn btn-danger courseDetails"> See This Course </button>
                                                            </div>
                                                        </div>
                                                        <!-- end Activity course -->
                                                        <div class="activityCourseOver">
                                                            <button class="btn btn-danger takeCourse">Take It Now</button>
                                                            <button class="btn btn-danger"> Add To Favourite</button>
                                                            <button class="btn btn-danger courseDetails"> See This Course </button>
                                                        </div>
                                                        <!-- End Activity course Over -->
                                                    </div>
                                                </div>
                                                <!-- -->
                                            </div>
                                        </div>
                                        <!-- End Activity Courses -->
                                        <div id="activityJobsBox">
                                                 <div class="row">
                                                    <div class="col-sm-4">
                                                        <div class="thumbnail activityCourse">
                                                            <a href="images/profile/activity/dell.png" target="_blank">
                                                                <img class="img-responsive" src="images/profile/activity/dell.png" alt="Dell">
                                                            </a>
                                                            <div class="caption">
                                                                <div class="activityCourseTitle text-center">
                                                                    <h4>Dell</h4>
                                                                    <h5>Android Developer</h5>
                                                                </div>
                                                                 <div class="activityCoursePrerequisites text-center">
                                                                    <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry.
                                                                    </p>
                                                                </div>
                                                                <div class="text-center">
                                                                    <table class="table">
                                                                        <tr>
                                                                            <td class="jobInfo">Salary</td>
                                                                            <td class="jobInfo">Posted At</td>
                                                                            <td class="jobInfo">Location</td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td>300$</td>
                                                                            <td>13 April</td>
                                                                            <td>Cairo</td>
                                                                        </tr>
                                                                    </table>
                                                                </div>
                                                            </div>
                                                            <!-- end job 1 -->
                                                            <div class="activityCourseOver">
                                                                <div class="text-center">
                                                                    <table class="table">
                                                                        <tr>
                                                                            <td>Viewed</td>
                                                                            <td>Applied</td>
                                                                            <td>Compare</td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td>215</td>
                                                                            <td>120</td>
                                                                            <td>90</td>
                                                                        </tr>
                                                                    </table>
                                                                </div>
                                                                <button class="btn btn-danger activityButton text-center applyJob">Apply Now</button>
                                                                <button class="btn btn-danger activityButton text-center compareSkills">Compare With My Skills</button>
                                                                <button class="btn btn-danger activityButton text-center">Add To Favourite</button>
                                                                <button class="btn btn-danger activityButton text-center jobDetails">See This Job</button>
                                                                
                                                            </div>
                                                            <!-- End Activity job Over -->
                                                            <div class="visible-xs text-center">
                                                                <table class="table">
                                                                    <tr>
                                                                        <td class="jobInfo">Viewed</td>
                                                                        <td class="jobInfo">Applied</td>
                                                                        <td class="jobInfo">Compared</td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td>215</td>
                                                                        <td>120</td>
                                                                        <td>120</td>
                                                                    </tr>
                                                                </table>
                                                                <button class="btn btn-danger activityButton text-center applyJob">Apply Now</button>
                                                                <button class="btn btn-danger activityButton text-center compareSkills">Compare With My Skills</button>
                                                                <button class="btn btn-danger activityButton text-center">Add To Favourite</button>
                                                                <button class="btn btn-danger activityButton text-center jobDetails">See This Job</button>
                                                            </div>
                                                        </div>
                                                    </div>	
                                                    <!-- -->
                                                    <div class="col-sm-4">
                                                        <div class="thumbnail activityCourse">
                                                            <a href="images/profile/activity/hp.png" target="_blank">
                                                                <img class="img-responsive" src="images/profile/activity/hp.png" alt="Hp">
                                                            </a>
                                                            <div class="caption">
                                                                <div class="activityCourseTitle text-center">
                                                                    <h4>HP</h4>
                                                                    <h5>Android Developer</h5>
                                                                </div>
                                                                 <div class="activityCoursePrerequisites text-center">
                                                                    <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry.
                                                                    </p>
                                                                </div>
                                                                <div class="text-center">
                                                                    <table class="table">
                                                                        <tr>
                                                                            <td class="jobInfo">Salary</td>
                                                                            <td class="jobInfo">Posted At</td>
                                                                            <td class="jobInfo">Location</td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td>300$</td>
                                                                            <td>13 April</td>
                                                                            <td>Cairo</td>
                                                                        </tr>
                                                                    </table>
                                                                </div>
                                                            </div>
                                                            <!-- end job 2 -->
                                                            <div class="activityCourseOver">
                                                                <div class="text-center">
                                                                    <table class="table">
                                                                        <tr>
                                                                            <td>Viewed</td>
                                                                            <td>Applied</td>
                                                                            <td>Compare</td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td>215</td>
                                                                            <td>120</td>
                                                                            <td>90</td>
                                                                        </tr>
                                                                    </table>
                                                                </div>
                                                                <button class="btn btn-danger activityButton text-center applyJob">Apply Now</button>
                                                                <button class="btn btn-danger activityButton text-center compareSkills">Compare With My Skills</button>
                                                                <button class="btn btn-danger activityButton text-center">Add To Favourite</button>
                                                                <button class="btn btn-danger activityButton text-center jobDetails">See This Job</button>
                                                            </div>
                                                            <!-- End Activity job Over -->
                                                            <div class="visible-xs text-center">
                                                                <table class="table">
                                                                    <tr>
                                                                        <td class="jobInfo">Viewed</td>
                                                                        <td class="jobInfo">Applied</td>
                                                                        <td class="jobInfo">Compared</td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td>215</td>
                                                                        <td>120</td>
                                                                        <td>120</td>
                                                                    </tr>
                                                                </table>
                                                                <button class="btn btn-danger activityButton text-center applyJob">Apply Now</button>
                                                                <button class="btn btn-danger activityButton text-center compareSkills">Compare With My Skills</button>
                                                                <button class="btn btn-danger activityButton text-center">Add To Favourite</button>
                                                                <button class="btn btn-danger activityButton text-center jobDetails">See This Job</button>
                                                            </div>
                                                        </div>
                                                    </div>	
                                                    <!-- -->
                                                    <div class="col-sm-4">
                                                        <div class="thumbnail activityCourse">
                                                            <a href="images/profile/activity/apple.png" target="_blank">
                                                                <img class="img-responsive" src="images/profile/activity/apple.png" alt="Apple">
                                                            </a>
                                                            <div class="caption">
                                                                <div class="activityCourseTitle text-center">
                                                                    <h4>Apple</h4>
                                                                    <h5>Android Developer</h5>
                                                                </div>
                                                                 <div class="activityCoursePrerequisites text-center">
                                                                    <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry.
                                                                    </p>
                                                                </div>
                                                                <div class="text-center">
                                                                    <table class="table">
                                                                        <tr>
                                                                            <td class="jobInfo">Salary</td>
                                                                            <td class="jobInfo">Posted At</td>
                                                                            <td class="jobInfo">Location</td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td>300$</td>
                                                                            <td>13 April</td>
                                                                            <td>Cairo</td>
                                                                        </tr>
                                                                    </table>
                                                                </div>
                                                            </div>
                                                            <!-- end job 3 -->
                                                            <div class="activityCourseOver">
                                                                <div class="text-center">
                                                                    <table class="table">
                                                                        <tr>
                                                                            <td>Viewed</td>
                                                                            <td>Applied</td>
                                                                            <td>Compare</td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td>215</td>
                                                                            <td>120</td>
                                                                            <td>90</td>
                                                                        </tr>
                                                                    </table>
                                                                </div>
                                                                <button class="btn btn-danger activityButton text-center applyJob">Apply Now</button>
                                                                <button class="btn btn-danger activityButton text-center compareSkills">Compare With My Skills</button>
                                                                <button class="btn btn-danger activityButton text-center">Add To Favourite</button>
                                                                <button class="btn btn-danger activityButton text-center jobDetails">See This Job</button>
                                                            </div>
                                                            <!-- End Activity job Over -->
                                                           <div class="visible-xs text-center">
                                                                <table class="table">
                                                                    <tr>
                                                                        <td class="jobInfo">Viewed</td>
                                                                        <td class="jobInfo">Applied</td>
                                                                        <td class="jobInfo">Compared</td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td>215</td>
                                                                        <td>120</td>
                                                                        <td>120</td>
                                                                    </tr>
                                                                </table>
                                                                <button class="btn btn-danger activityButton text-center applyJob">Apply Now</button>
                                                                <button class="btn btn-danger activityButton text-center compareSkills">Compare With My Skills</button>
                                                                <button class="btn btn-danger activityButton text-center">Add To Favourite</button>
                                                                <button class="btn btn-danger activityButton text-center jobDetails">See This Job</button>
                                                            </div>
                                                        </div>
                                                    </div>	
                                                    <!-- -->
                                                </div>
                                            </div>
                                        <!-- End Activity Jobs -->
                                        <div id="activityProfilesBox">
                                            <div class="row">
                                                <div class="col-sm-4">
                                                    <div class="thumbnail activityAvatar">
                                                        <a href="/w3images/lights.jpg" target="_blank">
                                                          <img class="img-responsive" src="images/profile/profiles/steve.jpg" alt="Lights" style="width:100%">
                                                        </a>
                                                        <div class="caption">
                                                            <h1 class="text-center">Steve Jobs</h1>
                                                        </div>
                                                        <div class="activityAvatarOver">
                                                            <button class="btn btn-danger avatarButton"> View More </button> 
                                                        </div>
                                                        <div class="activityAvatarMobileButton text-center visible-xs">
                                                             <button class="btn btn-danger avatarButton"> View More </button>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-sm-4">
                                                    <div class="thumbnail activityAvatar">
                                                        <a href="/w3images/lights.jpg" target="_blank">
                                                          <img class="img-responsive" src="images/profile/profiles/steve.jpg" alt="Lights" style="width:100%">
                                                        </a>
                                                        <div class="caption">
                                                            <h1 class="text-center">Steve Jobs</h1>
                                                        </div>
                                                        <div class="activityAvatarOver">
                                                            <button class="btn btn-danger avatarButton"> View More </button> 
                                                        </div>
                                                        <div class="activityAvatarMobileButton text-center visible-xs">
                                                             <button class="btn btn-danger avatarButton"> View More </button>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-sm-4">
                                                    <div class="thumbnail activityAvatar">
                                                        <a href="/w3images/lights.jpg" target="_blank">
                                                          <img class="img-responsive" src="images/profile/profiles/steve.jpg" alt="Lights" style="width:100%">
                                                        </a>
                                                        <div class="caption activityAvatar">
                                                            <h1 class="text-center">Steve Jobs</h1>
                                                        </div>
                                                        <div class="activityAvatarOver">
                                                            <button class="btn btn-danger avatarButton"> View More </button> 
                                                        </div>
                                                        <div class="activityAvatarMobileButton text-center visible-xs">
                                                             <button class="btn btn-danger avatarButton"> View More </button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- End Activity profiles -->
                                        <div id="activityPortfoliosBox">
                                            <div class="row">
                                                <div class="col-sm-4">
                                                    <div class="thumbnail portfolioItem">
                                                        <div class="portfolioDetails text-center">
                                                            <h1>Axit Template</h1>
                                                            <h2>Viewed</h2>
                                                            <h3>15</h3>
                                                        </div>
                                                        <div class="text-center">
                                                            <div class="starWrapper">
                                                                <span class="glyphicon glyphicon-star" aria-hidden="true"></span>
                                                                <span class="glyphicon glyphicon-star" aria-hidden="true"></span>
                                                                <span class="glyphicon glyphicon-star" aria-hidden="true"></span>
                                                                <span class="glyphicon glyphicon-star" aria-hidden="true"></span>
                                                                <span class="glyphicon glyphicon-star" aria-hidden="true"></span>
                                                                <div class="starTop" style="width:89%">
                                                                    <span class="glyphicon glyphicon-star" aria-hidden="true"></span>
                                                                    <span class="glyphicon glyphicon-star" aria-hidden="true"></span>
                                                                    <span class="glyphicon glyphicon-star" aria-hidden="true"></span>
                                                                    <span class="glyphicon glyphicon-star" aria-hidden="true"></span>
                                                                    <span class="glyphicon glyphicon-star" aria-hidden="true"></span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="portfolioOver">
                                                            <div class="portfolioButtons text-center">
                                                                <button class="btn btn-danger">Add To Favourite</button>
                                                                <button class="btn btn-danger">Share</button>
                                                            </div>
                                                        </div>
                                                        <div class="portfolioMobileButtons visible-xs">
                                                            <div class="portfolioButtons text-center">
                                                                <button class="btn btn-danger">Add To Favourite</button>
                                                                <button class="btn btn-danger">Share</button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- end item 1 -->
                                                <div class="col-sm-4">
                                                    <div class="thumbnail portfolioItem">
                                                        <div class="portfolioDetails text-center">
                                                            <h1>Axit Template</h1>
                                                            <h2>Viewed</h2>
                                                            <h3>15</h3>
                                                        </div>
                                                        <div class="text-center">
                                                            <div class="starWrapper">
                                                                <span class="glyphicon glyphicon-star" aria-hidden="true"></span>
                                                                <span class="glyphicon glyphicon-star" aria-hidden="true"></span>
                                                                <span class="glyphicon glyphicon-star" aria-hidden="true"></span>
                                                                <span class="glyphicon glyphicon-star" aria-hidden="true"></span>
                                                                <span class="glyphicon glyphicon-star" aria-hidden="true"></span>
                                                                <div class="starTop" style="width:89%">
                                                                    <span class="glyphicon glyphicon-star" aria-hidden="true"></span>
                                                                    <span class="glyphicon glyphicon-star" aria-hidden="true"></span>
                                                                    <span class="glyphicon glyphicon-star" aria-hidden="true"></span>
                                                                    <span class="glyphicon glyphicon-star" aria-hidden="true"></span>
                                                                    <span class="glyphicon glyphicon-star" aria-hidden="true"></span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="portfolioOver">
                                                            <div class="portfolioButtons text-center">
                                                                <button class="btn btn-danger">Add To Favourite</button>
                                                                <button class="btn btn-danger">Share</button>
                                                            </div>
                                                        </div>
                                                        <div class="portfolioMobileButtons visible-xs">
                                                            <div class="portfolioButtons text-center">
                                                                <button class="btn btn-danger">Add To Favourite</button>
                                                                <button class="btn btn-danger">Share</button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- end item 2 -->
                                                <div class="col-sm-4">
                                                    <div class="thumbnail portfolioItem">
                                                        <div class="portfolioDetails text-center">
                                                            <h1>Axit Template</h1>
                                                            <h2>Viewed</h2>
                                                            <h3>15</h3>
                                                        </div>
                                                        <div class="text-center">
                                                            <div class="starWrapper">
                                                                <span class="glyphicon glyphicon-star" aria-hidden="true"></span>
                                                                <span class="glyphicon glyphicon-star" aria-hidden="true"></span>
                                                                <span class="glyphicon glyphicon-star" aria-hidden="true"></span>
                                                                <span class="glyphicon glyphicon-star" aria-hidden="true"></span>
                                                                <span class="glyphicon glyphicon-star" aria-hidden="true"></span>
                                                                <div class="starTop" style="width:89%">
                                                                    <span class="glyphicon glyphicon-star" aria-hidden="true"></span>
                                                                    <span class="glyphicon glyphicon-star" aria-hidden="true"></span>
                                                                    <span class="glyphicon glyphicon-star" aria-hidden="true"></span>
                                                                    <span class="glyphicon glyphicon-star" aria-hidden="true"></span>
                                                                    <span class="glyphicon glyphicon-star" aria-hidden="true"></span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="portfolioOver">
                                                            <div class="portfolioButtons text-center">
                                                                <button class="btn btn-danger">Add To Favourite</button>
                                                                <button class="btn btn-danger">Share</button>
                                                            </div>
                                                        </div>
                                                        <div class="portfolioMobileButtons visible-xs">
                                                            <div class="portfolioButtons text-center">
                                                                <button class="btn btn-danger">Add To Favourite</button>
                                                                <button class="btn btn-danger">Share</button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- end item 3 -->
                                            </div>
                                        </div>
                                        <!-- End Activity Portfolios -->
                                    </div>
                                </div>
                                 <!-- End Activity -->
                                <!-- Start  Enrolled Courses -->
                                <div id="tab3Content">
                                    <div class="row">
                                        <?php

                                            $gettingCourses = $connect->prepare("SELECT courses.course_ID 
                                                                                FROM courses
                                                                                JOIN enrolled_courses ON courses.course_ID = enrolled_courses.course_ID
                                                                                WHERE enrolled_courses.applicant_ID = ?");
                                            $gettingCourses->execute(array($_SESSION['userID']));

                                            while ($row = $gettingCourses->fetch(PDO::FETCH_ASSOC)) {

                                                $courseId = $row['course_ID'];

                                                $gettingCourseDetails = $connect->prepare("SELECT courses.course_title,courses.course_logo,courses.course_hours,courses.course_rate,COUNT( DISTINCT enrolled_courses.enrolled_course_ID) AS enrolled_numbers ,
                                                                                COUNT( DISTINCT courses_content.courses_content_ID) AS video_numbers 
                                                                                FROM courses 
                                                                                JOIN enrolled_courses ON courses.course_ID = enrolled_courses.course_ID 
                                                                                JOIN courses_content ON courses.course_ID = courses_content.course_ID 
                                                                                WHERE courses.course_ID = ?");
                                                $gettingCourseDetails->execute(array($courseId));
                                                $row = $gettingCourseDetails->fetch();

                                                $courseTitle = $row['course_title'];
                                                $courseLogo = $row['course_logo'];
                                                $courseHours = $row['course_hours'];
                                                $courseRate = $row['course_rate'];
                                                $enrolled = $row['enrolled_numbers'];
                                                $content = $row['video_numbers'];

                                                $prerequisites = [];
                                                $gettingPrerequisites = $connect->prepare("SELECT prerequisites.prerequisite_name 
                                                                                    FROM prerequisites 
                                                                                    JOIN course_prerequisites ON prerequisites.prerequisite_ID = course_prerequisites.prerequisite_ID
                                                                                    WHERE course_prerequisites.course_ID = ?");
                                                $gettingPrerequisites->execute(array($courseId));
                                                $rowPrerequisites = $gettingPrerequisites->fetch();

                                                $prerequisites[] = $rowPrerequisites['prerequisite_name'];

                                                while ($rowPrerequisites = $gettingPrerequisites->fetch(PDO::FETCH_ASSOC)) {

                                                    $prerequisites[] = $rowPrerequisites['prerequisite_name'];

                                                }

                                                echo '<div class="col-sm-4">
                                            <div class="thumbnail activityCourse">
                                                <a href="images/profile/activity/dell.png" target="_blank">
                                                    <img class="img-responsive" src="courses/pics/' . $courseLogo . '" alt="Dell">
                                                </a>
                                                <div class="caption">
                                                    <div class="activityCourseTitle text-center">
                                                        <h4>' . $courseTitle . '</h4>
                                                    </div>
                                                    <div class="text-center">
                                                        <table class="table">
                                                            <tr>
                                                                <td class="courseInfo">Hours</td>
                                                                <td class="courseInfo">video</td>
                                                                <td class="courseInfo">Enrolled</td>
                                                            </tr>
                                                            <tr>
                                                                <td>' . $courseHours . '</td>
                                                                <td>' . $content . '</td>
                                                                <td>' . $enrolled . '</td>
                                                            </tr>
                                                            
                                                        </table>
                                                    </div>
                                                    <div class="activityCoursePrerequisites text-center">
                                                        <p>';

                                                foreach ($prerequisites as $prerequisiteName) {

                                                    if (key($prerequisites) == count($prerequisites) - 1) {
                                                        echo $prerequisiteName;
                                                    } else {
                                                        echo $prerequisiteName . ' - ';
                                                    }

                                                }

                                                echo '</p>
                                                    </div>
                                                    <div class="text-center">
                                                        <div class="starWrapper">
                                                            <span class="glyphicon glyphicon-star" aria-hidden="true"></span>
                                                            <span class="glyphicon glyphicon-star" aria-hidden="true"></span>
                                                            <span class="glyphicon glyphicon-star" aria-hidden="true"></span>
                                                            <span class="glyphicon glyphicon-star" aria-hidden="true"></span>
                                                            <span class="glyphicon glyphicon-star" aria-hidden="true"></span>
                                                            <div class="starTop" style="width:';

                                                echo ($courseRate / 5) * 100 . '%';

                                                echo '">
                                                                <span class="glyphicon glyphicon-star" aria-hidden="true"></span>
                                                                <span class="glyphicon glyphicon-star" aria-hidden="true"></span>
                                                                <span class="glyphicon glyphicon-star" aria-hidden="true"></span>
                                                                <span class="glyphicon glyphicon-star" aria-hidden="true"></span>
                                                                <span class="glyphicon glyphicon-star" aria-hidden="true"></span>
                                                            </div>
                                                        </div>  
                                                    </div>
                                                    <div class="text-center visible-xs">
                                                        <button class="btn btn-danger takeCourse" >Take It Now</button>
                                                        <button class="btn btn-danger"> Add To Favourite</button>
                                                        <button class="btn btn-danger courseDetails"> See This Course </button>
                                                    </div>
                                                </div>
                                                <!-- end Activity course -->
                                                <div class="activityCourseOver">
                                                    <button class="btn btn-danger takeCourse">Take It Now</button>
                                                    <button class="btn btn-danger"> Add To Favourite</button>
                                                    <button class="btn btn-danger courseDetails"> See This Course </button>
                                                </div>
                                                <!-- End Activity course Over -->
                                            </div>
                                        </div>';
                                            }
                                        ?>
                                    </div>
                                </div>
                                <!-- End  Enrolled Courses -->
                                <!-- Start  Applied jobs -->
                                <div id="tab4Content">
                                    <div class="row">
                                        <?php

                                            $gettingJobs = $connect->prepare("SELECT jobs.job_ID
                                                                                FROM jobs
                                                                                JOIN applied_jobs ON jobs.job_ID = applied_jobs.job_ID
                                                                                WHERE applied_jobs.applicant_ID = ?");
                                            $gettingJobs->execute(array($_SESSION['userID']));

                                            while ($row = $gettingJobs->fetch(PDO::FETCH_ASSOC)) {

                                                $jobId = $row['job_ID'];

                                                $gettingJobDetails = $connect->prepare("SELECT COUNT( DISTINCT applied_jobs.applied_jobs_ID) AS applied,jobs.viewed, COUNT( DISTINCT skills_compared_jobs.skills_compared_jobs_ID) AS compared,jobs.job_title,jobs.salary,jobs.date_posted,companies.name,companies.location,companies.logo
                                                                                        FROM jobs 
                                                                                        JOIN applied_jobs ON jobs.job_ID = applied_jobs.job_ID 
                                                                                        JOIN skills_compared_jobs ON jobs.job_ID = skills_compared_jobs.job_ID
                                                                                        JOIN companies on jobs.company_ID = companies.company_ID
                                                                                        WHERE jobs.job_ID = ?");
                                                $gettingJobDetails->execute(array($jobId));
                                                $row = $gettingJobDetails->fetch();

                                                $jobTitle = $row['job_title'];
                                                $appliedNumber = $row['applied'];
                                                $comparedNumber = $row['compared'];
                                                $viewedNumber = $row['viewed'];
                                                $salary = $row['salary'];
                                                $date = $row['date_posted'];
                                                $companyName = $row['name'];
                                                $companyLocation = $row['location'];
                                                $companyLogo = $row['logo'];

                                                $skills = [];
                                                $gettingSkills = $connect->prepare("SELECT skills.skill_name FROM skills JOIN job_main_skills ON skills.skill_ID = job_main_skills.skill_ID WHERE job_main_skills.job_ID = ?");
                                                $gettingSkills->execute(array($jobId));
                                                $rowSkill = $gettingSkills->fetch();

                                                $skills[] = $rowSkill['skill_name'];

                                                while ($rowSkill = $gettingSkills->fetch(PDO::FETCH_ASSOC)) {

                                                    $skills[] = $rowSkill['skill_name'];

                                                }

                                                echo '<div class="col-sm-4">
                                                <div class="thumbnail activityCourse">
                                                    <a href="images/profile/activity/dell.png" target="_blank">
                                                        <img class="img-responsive" src="companies/pics/'. $companyLogo .'" alt="Dell">
                                                    </a>
                                                    <div class="caption">
                                                        <div class="activityCourseTitle text-center">
                                                            <h4>'. $companyName .'</h4>
                                                            <h5>'. $jobTitle .'</h5>
                                                        </div>
                                                        <div class="activityCoursePrerequisites text-center">
                                                            <p>';

                                                foreach($skills as $skillName){

                                                    if (key($skills) == count($skills)-1){
                                                        echo $skillName;
                                                    } else {
                                                        echo $skillName . ' - ';
                                                    }

                                                }

                                                echo '</p>
                                                        </div>
                                                        <div class="text-center">
                                                            <table class="table">
                                                                <tr>
                                                                    <td class="jobInfo">Salary</td>
                                                                    <td class="jobInfo">Date</td>
                                                                    <td class="jobInfo">Location</td>
                                                                </tr>
                                                                <tr>
                                                                    <td>'. $salary .'</td>
                                                                    <td>'. $date .'</td>
                                                                    <td>'. $companyLocation .'</td>
                                                                </tr>
                                                            </table>
                                                        </div>
                                                        <div class="text-center visible-xs">
                                                            <table class="table">
                                                                <tr>
                                                                    <td class="jobInfo">Viewed</td>
                                                                    <td class="jobInfo">Applied</td>
                                                                    <td class="jobInfo">Compared</td>
                                                                </tr>
                                                                <tr>
                                                                    <td>'. $viewedNumber .'</td>
                                                                    <td>'. $appliedNumber .'</td>
                                                                    <td>'. $comparedNumber .'</td>
                                                                </tr>
                                                            </table>
                                                        </div> 
                                                        <div class="text-center visible-xs">
                                                            <button class="btn btn-danger activityButton text-center applyJob ">Apply Now</button>
                                                            <button class="btn btn-danger activityButton text-center compareSkills ">Compare With My Skills</button>
                                                            <button class="btn btn-danger activityButton text-center ">Add To Favourite</button>
                                                            <button class="btn btn-danger activityButton text-center jobDetails">See This Job</button>
                                                        </div>
                                                        
                                                    </div>
                                                    <!-- end job 1 content  -->
                                                    <div class="activityCourseOver">
                                                        <div class="text-center">
                                                            <table class="table">
                                                                <tr>
                                                                    <td>Viwed</td>
                                                                    <td>Applied</td>
                                                                    <td>Compared</td>
                                                                </tr>
                                                                <tr>
                                                                    <td>'. $viewedNumber .'</td>
                                                                    <td>'. $appliedNumber .'</td>
                                                                    <td>'. $comparedNumber .'</td>
                                                                </tr>
                                                            </table>
                                                        </div>
                                                        <button class="btn btn-danger activityButton text-center applyJob">Apply Now</button>
                                                        <button class="btn btn-danger activityButton text-center compareSkills">Compare With My Skills</button>
                                                        <button class="btn btn-danger activityButton text-center">Add To Favourite</button>
                                                        <button class="btn btn-danger activityButton text-center jobDetails">See This Job</button>
                                                    </div>
                                                    <!-- End Activity job Over -->
                                                </div>
                                            </div>';
                                            }
                                        ?>
                                    </div>
                                </div>
                                <!-- End  Applied jobs -->
                                <!-- Start portfolio -->
                                <div id="tab5Content">
                                    <div class="row">
                                        <div class="col-sm-4">
                                            <div class="thumbnail portfolioItem">
                                                <div class="portfolioDetails text-center">
                                                    <h1>Axit Template</h1>
                                                    <h2>Viewed</h2>
                                                    <h3>15</h3>
                                                </div>
                                                <div class="text-center">
                                                    <div class="starWrapper">
                                                        <span class="glyphicon glyphicon-star" aria-hidden="true"></span>
                                                        <span class="glyphicon glyphicon-star" aria-hidden="true"></span>
                                                        <span class="glyphicon glyphicon-star" aria-hidden="true"></span>
                                                        <span class="glyphicon glyphicon-star" aria-hidden="true"></span>
                                                        <span class="glyphicon glyphicon-star" aria-hidden="true"></span>
                                                        <div class="starTop" style="width:89%">
                                                            <span class="glyphicon glyphicon-star" aria-hidden="true"></span>
                                                            <span class="glyphicon glyphicon-star" aria-hidden="true"></span>
                                                            <span class="glyphicon glyphicon-star" aria-hidden="true"></span>
                                                            <span class="glyphicon glyphicon-star" aria-hidden="true"></span>
                                                            <span class="glyphicon glyphicon-star" aria-hidden="true"></span>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="portfolioOver">
                                                    <div class="portfolioButtons text-center">
                                                        <button class="btn btn-danger">Add To Favourite</button>
                                                        <button class="btn btn-danger">Share</button>
                                                    </div>
                                                </div>
                                                <div class="portfolioMobileButtons visible-xs">
                                                    <div class="portfolioButtons text-center">
                                                        <button class="btn btn-danger">Add To Favourite</button>
                                                        <button class="btn btn-danger">Share</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- end item 1 -->   
                                        <div class="col-sm-4">
                                            <div class="thumbnail portfolioItem">
                                                <div class="portfolioDetails text-center">
                                                    <h1>Axit Template</h1>
                                                    <h2>Viewed</h2>
                                                    <h3>15</h3>
                                                </div>
                                                <div class="text-center">
                                                    <div class="starWrapper">
                                                        <span class="glyphicon glyphicon-star" aria-hidden="true"></span>
                                                        <span class="glyphicon glyphicon-star" aria-hidden="true"></span>
                                                        <span class="glyphicon glyphicon-star" aria-hidden="true"></span>
                                                        <span class="glyphicon glyphicon-star" aria-hidden="true"></span>
                                                        <span class="glyphicon glyphicon-star" aria-hidden="true"></span>
                                                        <div class="starTop" style="width:89%">
                                                            <span class="glyphicon glyphicon-star" aria-hidden="true"></span>
                                                            <span class="glyphicon glyphicon-star" aria-hidden="true"></span>
                                                            <span class="glyphicon glyphicon-star" aria-hidden="true"></span>
                                                            <span class="glyphicon glyphicon-star" aria-hidden="true"></span>
                                                            <span class="glyphicon glyphicon-star" aria-hidden="true"></span>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="portfolioOver">
                                                    <div class="portfolioButtons text-center">
                                                        <button class="btn btn-danger">Add To Favourite</button>
                                                        <button class="btn btn-danger">Share</button>
                                                    </div>
                                                </div>
                                                <div class="portfolioMobileButtons visible-xs">
                                                    <div class="portfolioButtons text-center">
                                                        <button class="btn btn-danger">Add To Favourite</button>
                                                        <button class="btn btn-danger">Share</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- end item 2 -->  
                                        <div class="col-sm-4">
                                            <div class="thumbnail portfolioItem">
                                                <div class="portfolioDetails text-center">
                                                    <h1>Axit Template</h1>
                                                    <h2>Viewed</h2>
                                                    <h3>15</h3>
                                                </div>
                                                <div class="text-center">
                                                    <div class="starWrapper">
                                                        <span class="glyphicon glyphicon-star" aria-hidden="true"></span>
                                                        <span class="glyphicon glyphicon-star" aria-hidden="true"></span>
                                                        <span class="glyphicon glyphicon-star" aria-hidden="true"></span>
                                                        <span class="glyphicon glyphicon-star" aria-hidden="true"></span>
                                                        <span class="glyphicon glyphicon-star" aria-hidden="true"></span>
                                                        <div class="starTop" style="width:89%">
                                                            <span class="glyphicon glyphicon-star" aria-hidden="true"></span>
                                                            <span class="glyphicon glyphicon-star" aria-hidden="true"></span>
                                                            <span class="glyphicon glyphicon-star" aria-hidden="true"></span>
                                                            <span class="glyphicon glyphicon-star" aria-hidden="true"></span>
                                                            <span class="glyphicon glyphicon-star" aria-hidden="true"></span>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="portfolioOver">
                                                    <div class="portfolioButtons text-center">
                                                        <button class="btn btn-danger">Add To Favourite</button>
                                                        <button class="btn btn-danger">Share</button>
                                                    </div>
                                                </div>
                                                <div class="portfolioMobileButtons visible-xs">
                                                    <div class="portfolioButtons text-center">
                                                        <button class="btn btn-danger">Add To Favourite</button>
                                                        <button class="btn btn-danger">Share</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- end item 3 -->    
                                        
                                    </div>
                                </div>
                                <!-- Start tab favourtis -->
                                 <div id="tab6Content">
                                    <div class="row">
                                        <div class="col-sm-12 col-xs-12">
                                            <div class="text-center favouritButtons">
                                                <button id="favouritCourses"    class="btn btn-danger">Courses</button>
                                                <button id="favouritJobs"       class="btn btn-danger inactive">Jobs</button>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="activityBoxs">
                                        <div id="favouritCoursesBox">
                                            <div class="row">
                                                <div class="col-sm-4">
                                                    <div class="thumbnail activityCourse">
                                                        <a href="images/profile/activity/dell.png" target="_blank">
                                                            <img class="img-responsive" src="images/profile/activity/dell.png" alt="Dell">
                                                        </a>
                                                        <div class="caption">
                                                            <div class="activityCourseTitle text-center">
                                                                <h4>Android Developer</h4>
                                                            </div>
                                                            <div class="text-center">
                                                                <table class="table">
                                                                    <tr>
                                                                        <td class="courseInfo">Hours</td>
                                                                        <td class="courseInfo">video</td>
                                                                        <td class="courseInfo">Enrolled</td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td>18</td>
                                                                        <td>98</td>
                                                                        <td>105</td>
                                                                    </tr>
                                                                   
                                                                </table>
                                                            </div>
                                                            <div class="activityCoursePrerequisites text-center">
                                                                <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry.</p>
                                                            </div>
                                                            <div class="text-center">
                                                                <div class="starWrapper">
                                                                    <span class="glyphicon glyphicon-star" aria-hidden="true"></span>
                                                                    <span class="glyphicon glyphicon-star" aria-hidden="true"></span>
                                                                    <span class="glyphicon glyphicon-star" aria-hidden="true"></span>
                                                                    <span class="glyphicon glyphicon-star" aria-hidden="true"></span>
                                                                    <span class="glyphicon glyphicon-star" aria-hidden="true"></span>
                                                                    <div class="starTop" style="width:89%">
                                                                        <span class="glyphicon glyphicon-star" aria-hidden="true"></span>
                                                                        <span class="glyphicon glyphicon-star" aria-hidden="true"></span>
                                                                        <span class="glyphicon glyphicon-star" aria-hidden="true"></span>
                                                                        <span class="glyphicon glyphicon-star" aria-hidden="true"></span>
                                                                        <span class="glyphicon glyphicon-star" aria-hidden="true"></span>
                                                                    </div>
                                                                </div>  
                                                            </div>
                                                            <div class="text-center visible-xs">
                                                                <button class="btn btn-danger">Take It Now</button>
                                                                <button class="btn btn-danger"> Add To Favourite</button>
                                                            </div>
                                                        </div>
                                                        <!-- end Activity course -->
                                                        <div class="activityCourseOver">
                                                            <button class="btn btn-danger">Take It Now</button>
                                                            <button class="btn btn-danger"> Add To Favourite</button>
                                                        </div>
                                                        <!-- End Activity course Over -->
                                                    </div>
                                                </div>	
                                                <!-- -->
                                                <div class="col-sm-4">
                                                    <div class="thumbnail activityCourse">
                                                        <a href="images/profile/activity/apple.png" target="_blank">
                                                            <img class="img-responsive" src="images/profile/activity/apple.png" alt="Apple">
                                                        </a>
                                                        <div class="caption">
                                                            <div class="activityCourseTitle text-center">
                                                                <h4>IOS Developer</h4>
                                                            </div>
                                                            <div class="text-center">
                                                                <table class="table ">
                                                                    <tr>
                                                                        <td class="courseInfo">Hours</td>
                                                                        <td class="courseInfo">video</td>
                                                                        <td class="courseInfo">Enrolled</td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td>18</td>
                                                                        <td>98</td>
                                                                        <td>105</td>
                                                                    </tr>
                                                                    
                                                                </table>
                                                            </div>
                                                             <div class="activityCoursePrerequisites text-center">
                                                                <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry.
                                                                </p>
                                                            </div>
                                                            <div class="text-center">
                                                                <div class="starWrapper">
                                                                    <span class="glyphicon glyphicon-star" aria-hidden="true"></span>
                                                                    <span class="glyphicon glyphicon-star" aria-hidden="true"></span>
                                                                    <span class="glyphicon glyphicon-star" aria-hidden="true"></span>
                                                                    <span class="glyphicon glyphicon-star" aria-hidden="true"></span>
                                                                    <span class="glyphicon glyphicon-star" aria-hidden="true"></span>
                                                                    <div class="starTop" style="width:89%">
                                                                        <span class="glyphicon glyphicon-star" aria-hidden="true"></span>
                                                                        <span class="glyphicon glyphicon-star" aria-hidden="true"></span>
                                                                        <span class="glyphicon glyphicon-star" aria-hidden="true"></span>
                                                                        <span class="glyphicon glyphicon-star" aria-hidden="true"></span>
                                                                        <span class="glyphicon glyphicon-star" aria-hidden="true"></span>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="text-center visible-xs">
                                                                <button class="btn btn-danger">Take It Now</button>
                                                                <button class="btn btn-danger"> Add To Favourite</button>
                                                            </div>
                                                        </div>
                                                        <!-- end Activity course -->
                                                        <div class="activityCourseOver">
                                                            <button class="btn btn-danger">Take It Now</button>
                                                            <button class="btn btn-danger"> Add To Favourite</button>
                                                        </div>
                                                        <!-- End Activity course Over -->
                                                    </div>
                                                </div>
                                                <!-- -->
                                               <div class="col-sm-4">
                                                    <div class="thumbnail activityCourse">
                                                        <a href="images/profile/activity/php.png" target="_blank">
                                                            <img class="img-responsive" src="images/profile/activity/hp.png" alt="HP">
                                                        </a>
                                                        <div class="caption">
                                                            <div class="activityCourseTitle text-center">
                                                                <h4>IOS Developer</h4>
                                                            </div>
                                                            <div class="text-center">
                                                                <table class="table ">
                                                                    <tr>
                                                                        <td class="courseInfo">Hours</td>
                                                                        <td class="courseInfo">video</td>
                                                                        <td class="courseInfo">Enrolled</td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td>18</td>
                                                                        <td>98</td>
                                                                        <td>105</td>
                                                                    </tr>
                                                                   
                                                                </table>
                                                            </div>
                                                             <div class="activityCoursePrerequisites text-center">
                                                                <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry.
                                                                </p>
                                                            </div>
                                                            <div class="text-center">
                                                                <div class="starWrapper">
                                                                    <span class="glyphicon glyphicon-star" aria-hidden="true"></span>
                                                                    <span class="glyphicon glyphicon-star" aria-hidden="true"></span>
                                                                    <span class="glyphicon glyphicon-star" aria-hidden="true"></span>
                                                                    <span class="glyphicon glyphicon-star" aria-hidden="true"></span>
                                                                    <span class="glyphicon glyphicon-star" aria-hidden="true"></span>
                                                                    <div class="starTop" style="width:89%">
                                                                        <span class="glyphicon glyphicon-star" aria-hidden="true"></span>
                                                                        <span class="glyphicon glyphicon-star" aria-hidden="true"></span>
                                                                        <span class="glyphicon glyphicon-star" aria-hidden="true"></span>
                                                                        <span class="glyphicon glyphicon-star" aria-hidden="true"></span>
                                                                        <span class="glyphicon glyphicon-star" aria-hidden="true"></span>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="text-center visible-xs">
                                                                <button class="btn btn-danger">Take It Now</button>
                                                                <button class="btn btn-danger"> Add To Favourite</button>
                                                            </div>
                                                        </div>
                                                        <!-- end Activity course -->
                                                        <div class="activityCourseOver">
                                                            <button class="btn btn-danger">Take It Now</button>
                                                            <button class="btn btn-danger"> Add To Favourite</button>
                                                        </div>
                                                        <!-- End Activity course Over -->
                                                    </div>
                                                </div>
                                                <!-- -->
                                            </div>
                                        </div>
                                        <!-- End Activity Courses -->
                                        
                                        <div id="favouritJobsBox">
                                                 <div class="row">
                                                    <div class="col-sm-4">
                                                        <div class="thumbnail activityCourse">
                                                            <a href="images/profile/activity/dell.png" target="_blank">
                                                                <img class="img-responsive" src="images/profile/activity/dell.png" alt="Dell">
                                                            </a>
                                                            <div class="caption">
                                                                <div class="activityCourseTitle text-center">
                                                                    <h4>Dell</h4>
                                                                    <h5>Android Developer</h5>
                                                                </div>
                                                                 <div class="activityCoursePrerequisites text-center">
                                                                    <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry.
                                                                    </p>
                                                                </div>
                                                                <div class="text-center">
                                                                    <table class="table">
                                                                        <tr>
                                                                            <td class="jobInfo">Salary</td>
                                                                            <td class="jobInfo">Posted At</td>
                                                                            <td class="jobInfo">Location</td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td>300$</td>
                                                                            <td>13 April</td>
                                                                            <td>Cairo</td>
                                                                        </tr>
                                                                    </table>
                                                                </div>
                                                            </div>
                                                            <!-- end job 1 -->
                                                            <div class="activityCourseOver">
                                                                <div class="text-center">
                                                                    <table class="table">
                                                                        <tr>
                                                                            <td>Viewed</td>
                                                                            <td>Applied</td>
                                                                            <td>Compare</td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td>215</td>
                                                                            <td>120</td>
                                                                            <td>90</td>
                                                                        </tr>
                                                                    </table>
                                                                </div>
                                                                <button class="btn btn-danger activityButton text-center">Apply Now</button>
                                                                <button class="btn btn-danger activityButton text-center">Compare With My Skills</button>
                                                                <button class="btn btn-danger activityButton text-center">Add To Favourite</button>
                                                            </div>
                                                            <!-- End Activity job Over -->
                                                            <div class="visible-xs text-center">
                                                                <table class="table">
                                                                    <tr>
                                                                        <td class="jobInfo">Viewed</td>
                                                                        <td class="jobInfo">Applied</td>
                                                                        <td class="jobInfo">Compared</td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td>215</td>
                                                                        <td>120</td>
                                                                        <td>120</td>
                                                                    </tr>
                                                                </table>
                                                                <button class="btn btn-danger activityButton">Apply Now</button>
                                                                <button class="btn btn-danger activityButton">Compare With My Skills</button>
                                                                <button class="btn btn-danger activityButton">Add To Favourite</button>
                                                            </div>
                                                        </div>
                                                    </div>	
                                                    <!-- -->
                                                    <div class="col-sm-4">
                                                        <div class="thumbnail activityCourse">
                                                            <a href="images/profile/activity/hp.png" target="_blank">
                                                                <img class="img-responsive" src="images/profile/activity/hp.png" alt="Hp">
                                                            </a>
                                                            <div class="caption">
                                                                <div class="activityCourseTitle text-center">
                                                                    <h4>HP</h4>
                                                                    <h5>Android Developer</h5>
                                                                </div>
                                                                 <div class="activityCoursePrerequisites text-center">
                                                                    <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry.
                                                                    </p>
                                                                </div>
                                                                <div class="text-center">
                                                                    <table class="table">
                                                                        <tr>
                                                                            <td class="jobInfo">Salary</td>
                                                                            <td class="jobInfo">Date</td>
                                                                            <td class="jobInfo">Location</td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td>300$</td>
                                                                            <td>13 April</td>
                                                                            <td>Cairo</td>
                                                                        </tr>
                                                                    </table>
                                                                </div>
                                                                <div class="text-center visible-xs">
                                                                    <table class="table">
                                                                        <tr>
                                                                            <td class="jobInfo">Viewed</td>
                                                                            <td class="jobInfo">Applied</td>
                                                                            <td class="jobInfo">Compared</td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td>215</td>
                                                                            <td>120</td>
                                                                            <td>120</td>
                                                                        </tr>
                                                                    </table>
                                                                    <button class="btn btn-danger activityButton text-center ">Apply Now</button>
                                                                    <button class="btn btn-danger activityButton text-center ">Compare With My Skills</button>
                                                                    <button class="btn btn-danger activityButton text-center ">Add To Favourite</button>
                                                                </div>

                                                            </div>
                                                            <!-- end job 1 content  -->
                                                            <div class="activityCourseOver">
                                                                <div class="text-center">
                                                                    <table class="table">
                                                                        <tr>
                                                                            <td>Viwed</td>
                                                                            <td>Applied</td>
                                                                            <td>Compared</td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td>215</td>
                                                                            <td>120</td>
                                                                            <td>120</td>
                                                                        </tr>
                                                                    </table>
                                                                </div>
                                                                <button class="btn btn-danger activityButton text-center">Apply Now</button>
                                                                <button class="btn btn-danger activityButton text-center">Compare With My Skills</button>
                                                                <button class="btn btn-danger activityButton text-center">Add To Favourite</button>
                                                            </div>
                                                            <!-- End Activity job Over -->
                                                        </div>
                                                    </div>	
                                                    <!-- -->
                                                    <div class="col-sm-4">
                                                        <div class="thumbnail activityCourse">
                                                            <a href="images/profile/activity/apple.png" target="_blank">
                                                                <img class="img-responsive" src="images/profile/activity/apple.png" alt="Apple">
                                                            </a>
                                                            <div class="caption">
                                                                <div class="activityCourseTitle text-center">
                                                                    <h4>Apple</h4>
                                                                    <h5>Android Developer</h5>
                                                                </div>
                                                                 <div class="activityCoursePrerequisites text-center">
                                                                    <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry.
                                                                    </p>
                                                                </div>
                                                                <div class="text-center">
                                                                    <table class="table">
                                                                        <tr>
                                                                            <td class="jobInfo">Salary</td>
                                                                            <td class="jobInfo">Date</td>
                                                                            <td class="jobInfo">Location</td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td>300$</td>
                                                                            <td>13 April</td>
                                                                            <td>Cairo</td>
                                                                        </tr>
                                                                    </table>
                                                                </div>
                                                                <div class="text-center visible-xs">
                                                                    <table class="table">
                                                                        <tr>
                                                                            <td class="jobInfo">Viewed</td>
                                                                            <td class="jobInfo">Applied</td>
                                                                            <td class="jobInfo">Compared</td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td>215</td>
                                                                            <td>120</td>
                                                                            <td>120</td>
                                                                        </tr>
                                                                    </table>
                                                                </div> 
                                                                <div class="text-center visible-xs">
                                                                    <button class="btn btn-danger activityButton text-center ">Apply Now</button>
                                                                    <button class="btn btn-danger activityButton text-center ">Compare With My Skills</button>
                                                                    <button class="btn btn-danger activityButton text-center ">Add To Favourite</button>
                                                                </div>

                                                            </div>
                                                            <!-- end job 1 content  -->
                                                            <div class="activityCourseOver">
                                                                <div class="text-center">
                                                                    <table class="table">
                                                                        <tr>
                                                                            <td>Viwed</td>
                                                                            <td>Applied</td>
                                                                            <td>Compared</td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td>215</td>
                                                                            <td>120</td>
                                                                            <td>120</td>
                                                                        </tr>
                                                                    </table>
                                                                </div>
                                                                <button class="btn btn-danger activityButton text-center">Apply Now</button>
                                                                <button class="btn btn-danger activityButton text-center">Compare With My Skills</button>
                                                                <button class="btn btn-danger activityButton text-center">Add To Favourite</button>
                                                            </div>
                                                            <!-- End Activity job Over -->
                                                        </div>
                                                    </div>	
                                                    <!-- -->
                                                </div>
                                            </div>
                                        <!-- End Activity Jobs -->
                                        
                                    </div>
                                 <!-- End Activity -->
                            </div>
                        </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- End Profile Section -->

        <?php include 'footer.php'; ?>
        <?php require 'scripts.php'; ?>		
    </body>
</html>