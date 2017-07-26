<?php

    session_start();
    include "php/init.php";
    $pageTitle = "Courses";
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
                                <input name="search" class="form-control input-lg inputSearchMain " type="text" placeholder="Course name.../ Course Title"/>
                                <div class="mainSearchButtonBox">
                                    <button name="searchCourse" class="btn btn-lg searchButton text-center"><i class="fa fa-search fa-lg fa-fw"></i> Search </button>
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
                                        <label class="filterListWebLabel" for="categoryOne">All </label>
                                        <input type="checkbox" name="category" id="categoryTwo" />
                                        <label class="filterListWebLabel" for="categoryTwo">Most Enrolled</label>
                                        <input type="checkbox" name="category" id="categoryThree" />
                                        <label class="filterListWebLabel" for="categoryThree">Top Rated</label>
                                        <input type="checkbox" name="category" id="categoryFour" />
                                        <label class="filterListWebLabel" for="categoryFour">Most Searched</label>
                                    </div>
                                    <hr>
                                    <p class="lead dateTitle"><span> + </span> By Date Added  </p>
                                    <div class="dateFilter">
                                        <input type="checkbox" name="date" id="dateOne" />
                                        <label class="filterListWebLabel" for="dateOne">This Day</label>
                                        <input type="checkbox" name="date" id="dateTwo" />
                                        <label class="filterListWebLabel" for="dateTwo">This Month</label>
                                        <input type="checkbox" name="date" id="dateThree" />
                                        <label class="filterListWebLabel"  for="dateThree">This Year</label>
                                        <input type="checkbox" name="date" id="dateFour" />
                                        <label class="filterListWebLabel"  for="dateFour">Later</label>
                                    </div>
                                    <hr>
                                    <p class="lead languageTitle"><span> + </span> By Language </p>
                                    <div class="languageFilter">
                                        <input type="checkbox" name="language" id="languageOne" />
                                        <label class="filterListWebLabel" for="languageOne">English</label>
                                        <input type="checkbox" name="language" id="languageTwo" />
                                        <label class="filterListWebLabel"  for="languageTwo">Hendi</label>
                                        <input type="checkbox" name="language" id="languageThree" />
                                        <label class="filterListWebLabel"  for="languageThree">Arabic</label>
                                    </div>
                                    <hr>
                                    <p class="lead levelTitle"><span> + </span> By Level </p>
                                    <div class="levelFilter">
                                        <input type="checkbox" name="level" id="levelOne" />
                                        <label class="filterListWebLabel" for="levelOne">Beginner</label>
                                        <input type="checkbox" name="level" id="levelTwo" />
                                        <label class="filterListWebLabel" for="levelTwo">Intermediate</label>
                                        <input type="checkbox" name="level" id="levelThree" />
                                        <label class="filterListWebLabel" for="levelThree">Advanced</label>
                                    </div>
                                    <hr>
                                    <p class="lead fieldTitle"><span> + </span> By Field </p>
                                    <div class="fieldFilter">
                                        <input type="checkbox" name="field" id="fieldOne" />
                                        <label class="filterListWebLabel" for="fieldOne">Design</label>
                                        <input type="checkbox" name="field" id="fieldTwo" />
                                        <label class="filterListWebLabel" for="fieldTwo">Programming</label>
                                        <input type="checkbox" name="field" id="fieldThree" />
                                        <label class="filterListWebLabel" for="fieldThree">Software Engineering</label>
                                    </div>
                                    <hr>
                                </form>                
                            </div> 
                        </div>
                        <!-- end filter search -->
                        <?php include 'takeCourse.php'; ?>
                        <div class="col-sm-9 coursesContainer">
                            <div class="row text-center">
                                <?php


                                    if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['searchCourse'])) {

                                        $search = $_POST['search'];

                                        $gettingCourses = $connect->prepare("SELECT course_ID FROM courses WHERE course_title = '$search'");
                                        $gettingCourses->execute();

                                    } else {

                                        $gettingCourses = $connect->prepare("SELECT course_ID FROM courses");
                                        $gettingCourses->execute();

                                    }

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
                                            <div class="imgBox">
                                                <img class="img-responsive" src="courses/pics/' . $courseLogo . '">
                                            </div>

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
                        
                    </div>
                </section>
            </div> 
        </section>   
        <!-- End courses -->
        
        <!-- Start filterSearchMobile -->   
        <div class="row formMobileSearch">
            <div class="container ">
                <div class="filterMobile col-xs-12 col-xs-visible">
                    <h3 class=text-center>Filter Results</h3>
                    <form class="form-inline" method="post">
                        <p class="text-center lead categoryTitle"><span> + </span> By Category </p>
                        <div class="categoryFilterMobile">
                            <input type="checkbox" name="categoryMobile" id="categoryOneMobile" />
                            <label class="filterListWebLabelMobile" for="categoryOneMobile">Most Viewed</label>
                            <input type="checkbox" name="categoryMobile" id="categoryTwoMobile" />
                            <label class="filterListWebLabelMobile" for="categoryTwoMobile">Most Searched</label>
                            <input type="checkbox" name="categoryMobile" id="categoryThreeMobile" />
                            <label class="filterListWebLabelMobile" for="categoryThreeMobile">Top Rated</label>
                        </div>
                            <hr>
                            <p class="text-center lead dateTitle"><span> + </span> By Date </p>
                            <div class="dateFilterMobile">
                            <input type="checkbox" name="dateMobile" id="dateOneMobile" />
                                <label class="filterListWebLabelMobile" for="dateOneMobile">Most Viewed</label>
                                <input type="checkbox" name="dateMobile" id="dateTwoMobile" />
                                <label class="filterListWebLabelMobile" for="dateTwoMobile">Most Searched</label>
                                <input type="checkbox" name="dateMobile" id="dateThreeMobile" />
                                <label class="filterListWebLabelMobile"  for="dateThreeMobile">Top Rated</label>
                            </div>
                            <hr>
                            <p class="text-center lead languageTitle"><span> + </span> By Language</p>
                            <div class="languageFilterMobile">
                                <input type="checkbox" name="languageMobile" id="languageOneMobile" />
                                <label class="filterListWebLabelMobile" for="languageOneMobile">English</label>
                                <input type="checkbox" name="languageMobile" id="languageTwoMobile" />
                                <label class="filterListWebLabelMobile"  for="languageTwoMobile">Arabic</label>
                            </div>
                            <hr>
                            <p class="text-center lead levelTitle"><span> + </span> By Level</p>
                            <div class="levelFilterMobile">
                                <input type="checkbox" name="levelMobile" id="levelOneMobile" />
                                <label class="filterListWebLabelMobile" for="levelOneMobile">Beginner</label>
                                <input type="checkbox" name="levelMobile" id="levelTwoMobile" />
                                <label class="filterListWebLabelMobile" for="levelTwoMobile">Advanced</label>
                            </div>
                            <hr>
                            <p class="text-center lead fieldTitle"><span> + </span> By Field</p>
                            <div class="feildFilterMobile">
                                <input type="checkbox" name="feildMobile" id="feildOneMobile" />
                                <label class="filterListWebLabelMobile" for="feildOneMobile">Design</label>
                                <input type="checkbox" name="feildMobile" id="feildTwoMobile" />
                                <label class="filterListWebLabelMobile" for="feildTwoMobile">Programming</label>
                                <input type="checkbox" name="feildMobile" id="feildThreeMobile" />
                                <label class="filterListWebLabelMobile" for="feildThreeMobile">Software Engineering</label>
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