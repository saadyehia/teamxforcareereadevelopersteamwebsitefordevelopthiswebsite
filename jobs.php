<?php

    session_start();
    include "php/init.php";
    $pageTitle = "Jobs";

?>

<!DOCTYPE html>
<html lang="en">
    <?php require 'head.php'; ?>
    <body>
    
        <?php include 'navbar.php'; ?>
                    
        <!-- Start Courses -->
        <section class="coursesPage">
            <div class="container-fluid">
                <section class="mainSearchBox text-center">
                    <div class="row">
                        <div class="col-xs-12">
                            <form class="form-inline text-center" method="POST" action="<?php $_SERVER['PHP_SELF'] ?>">
                                <input name="search" class="form-control input-lg inputSearchMain" type="text" placeholder="Job Name .. / Job Title"/>
                                <div class="mainSearchButtonBox">
                                    <button name="searchJob" class="btn btn-lg searchButton text-center"><i class="fa fa-search fa-lg fa-fw"></i> Search </button>
                                    <a class="btn btn-lg showFilterMobile visible-xs"><i class="fa fa-search fa-lg fa-fw"></i> Filter Search </a>
                                </div>
                            </form>
                        </div>
                    </div>
                </section>
                
                <!-- -->
                <section>
                    <div class="row">
                        <div class="col-sm-3 hidden-xs">
                            <div class="mainFilterSearch">
                                <form class="form-inline" method="post"> 
                                    <div class="filterButtons text-center">
                                        <h3 class="filterSearchHeader">Filter Results</h3>
                                        <button class="btn btn-md btn-primary reset" type="reset">Reset </button>
                                    </div>
                                    <p class="lead categoryTitle"><span> + </span> By Category  </p>
                                    <div class="categoryFilter">
                                        <input type="checkbox" name="category" id="categoryOne" />
                                        <label class="filterListWebLabel" for="categoryOne">Most Viewed </label>
                                        <input type="checkbox" name="category" id="categoryTwo" />
                                        <label class="filterListWebLabel" for="categoryTwo">Most Searched</label>
                                        <input type="checkbox" name="category" id="categoryThree" />
                                        <label class="filterListWebLabel" for="categoryThree">Top Rated</label>
                                    </div>
                                    <hr>
                                    <p class="lead dateTitle"><span> + </span> By Date  </p>
                                    <div class="dateFilter">
                                        <input type="checkbox" name="date" id="dateOne" />
                                        <label class="filterListWebLabel" for="dateOne">Most Viewed</label>
                                        <input type="checkbox" name="date" id="dateTwo" />
                                        <label class="filterListWebLabel" for="dateTwo">Most Searched</label>
                                        <input type="checkbox" name="date" id="dateThree" />
                                        <label class="filterListWebLabel"  for="dateThree">Top Rated</label>
                                    </div>
                                    <hr>
                                    <p class="lead languageTitle"><span> + </span> By Language </p>
                                    <div class="languageFilter">
                                        <input type="checkbox" name="language" id="languageOne" />
                                        <label class="filterListWebLabel" for="languageOne">English</label>
                                        <input type="checkbox" name="language" id="languageTwo" />
                                        <label class="filterListWebLabel"  for="languageTwo">Arabic</label>
                                    </div>
                                    <hr>
                                    <p class="lead levelTitle"><span> + </span> By Level </p>
                                    <div class="levelFilter">
                                        <input type="checkbox" name="level" id="levelOne" />
                                        <label class="filterListWebLabel" for="levelOne">Beginner</label>
                                        <input type="checkbox" name="level" id="levelTwo" />
                                        <label class="filterListWebLabel" for="levelTwo">Advanced</label>
                                    </div>
                                    <hr>
                                    <p class="lead locationTitle"><span> + </span> By Location </p>
                                    <div class="locationFilter">
                                        <input type="checkbox" name="location" id="locationOne" />
                                        <label class="filterListWebLabel" for="locationOne">Near To Me</label>
                                        <input type="checkbox" name="location" id="locationTwo" />
                                        <label class="filterListWebLabel" for="locationTwo">Cairo</label>
                                        <input type="checkbox" name="location" id="locationThree" />
                                        <label class="filterListWebLabel" for="locationThree">Giza</label>
                                        <input type="checkbox" name="location" id="locationFour" />
                                        <label class="filterListWebLabel" for="locationFour">Alex</label>
                                    </div>

                                    <hr>
                                    <p class="lead typeTitle"><span> + </span> By Type </p>
                                    <div class="typeFilter">
                                        <input type="checkbox" name="type" id="typeOne" />
                                        <label class="filterListWebLabel" for="typeOne">Full Time</label>
                                        <input type="checkbox" name="type" id="typeTwo" />
                                        <label class="filterListWebLabel" for="typeTwo">Part Time</label>
                                    </div>
                                    <hr>
                                </form>                
                            </div> 
                        </div>
                        <!-- end filter search -->
                        <div class="col-sm-9  jobsContainer">
                            <div class="row text-center">

                                <?php

                                if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['searchJob'])) {

                                    $search = $_POST['search'];

                                    $gettingJobs = $connect->prepare("SELECT job_ID FROM jobs WHERE job_title = '$search'");
                                    $gettingJobs->execute();

                                } else {

                                    $gettingJobs = $connect->prepare("SELECT job_ID FROM jobs");
                                    $gettingJobs->execute();

                                }

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
                                                <div class="imgBox">
                                                    <img class="img-responsive" src="companies/pics/'. $companyLogo .'">
                                                </div>
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
                    </div>
                </section>
            </div> 
        </section>
        <!-- End courses -->
        
        <!-- Start filterSearchMobile -->
        <div class="row formMobileSearch">
            <div class="container">
                <div class="filterMobile col-xs-12 col-xs-visible">
                    <h3 class=text-center>Filter Results</h3>
                    <p class="text-center lead categoryTitle">By Category</p>
                    <form class="form-inline" method="post"> 
                        <div class="categoryFilterMobile">
                            <input type="checkbox" name="categoryMobile" id="categoryOneMobile" />
                            <label class="filterListWebLabelMobile" for="categoryOneMobile">All</label>
                            <input type="checkbox" name="categoryMobile" id="categoryTwoMobile" />
                            <label class="filterListWebLabelMobile" for="categoryTwoMobile">Most Viewed</label>
                            <input type="checkbox" name="categoryMobile" id="categoryThreeMobile" />
                            <label class="filterListWebLabelMobile" for="categoryThreeMobile">Most Applied</label>
                        </div>
                            <hr>
                            <p class="text-center lead dateTitle">By Date Posted</p>
                            <div class="dateFilterMobile">
                            <input type="checkbox" name="dateMobile" id="dateOneMobile" />
                                <label class="filterListWebLabelMobile" for="dateOneMobile">Last 24 hours</label>
                                <input type="checkbox" name="dateMobile" id="dateTwoMobile" />
                                <label class="filterListWebLabelMobile" for="dateTwoMobile">This Week</label>
                                <input type="checkbox" name="dateMobile" id="dateThreeMobile" />
                                <label class="filterListWebLabelMobile"  for="dateThreeMobile">This Month</label>
                                 <input type="checkbox" name="dateMobile" id="dateFourMobile" />
                                <label class="filterListWebLabelMobile"  for="dateFourMobile">Last 2 Month</label>
                            </div>
                            <hr>
                            <p class="text-center lead levelTitle">By Level</p>
                            <div class="levelFilterMobile">
                                <input type="checkbox" name="levelMobile" id="levelOneMobile" />
                                <label class="filterListWebLabelMobile" for="levelOneMobile">Junior</label>
                                <input type="checkbox" name="levelMobile" id="levelTwoMobile" />
                                <label class="filterListWebLabelMobile" for="levelTwoMobile">Senior</label>
                            </div>
                            <hr>
                            <p class="text-center lead locationTitle">By Location</p>
                            <div class="locationFilterMobile">
                                <input type="checkbox" name="locationMobile" id="locationOneMobile" />
                                <label class="filterListWebLabelMobile" for="locationOneMobile">Near To Me</label>
                                <input type="checkbox" name="locationMobile" id="locationTwoMobile" />
                                <label class="filterListWebLabelMobile" for="locationTwoMobile">Cairo</label>
                                <input type="checkbox" name="locationMobile" id="locationThreeMobile" />
                                <label class="filterListWebLabelMobile" for="locationThreeMobile">Giza</label>
                                <input type="checkbox" name="locationMobile" id="locationFourMobile" />
                                <label class="filterListWebLabelMobile" for="locationFourMobile">Alex</label>
                            </div>
                        
                            <hr>
                            <p class="text-center lead typeTitle">By Type</p>
                            <div class="typeFilterMobile">
                                <input type="checkbox" name="typeMobile" id="typeOneMobile" />
                                <label class="filterListWebLabelMobile" for="typeOneMobile">Full Time</label>
                                <input type="checkbox" name="typeMobile" id="typeTwoMobile" />
                                <label class="filterListWebLabelMobile" for="typeTwoMobile">Part Time</label>
                            </div>
                            <hr>
                            <input class="form-control inputFilterMobile  text-center input-md" type="text" placeholder="Enter Course name"/>
                            <div class="filterButtons text-center">
                            <button class="btn btn-md searchFilterMobile" type="submit">Search </button>
                            <button class="btn btn-md btn-primary" type="reset">Reset </button>
                            </div>
                        </form>                            
                    </div>
                </div>
            </div>
        <!--End filterSearchMobile -->

        <?php include 'footer.php'; ?>
        <?php require 'scripts.php'; ?>			
    </body>
</html>