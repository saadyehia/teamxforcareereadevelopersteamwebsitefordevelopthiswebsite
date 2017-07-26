<?php

    session_start();
    include "php/init.php";
    $pageTitle = "Sign Up";

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['signUp'])) {

    $formErrors = array();

    $username = $_POST['username'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $birthDay = $_POST['birthday'];
    $gender = $_POST['sex'];
    $password = $_POST['password'];
    $password2 = $_POST['password2'];
    $interests = $_POST['interest'];
    $image_name = $_FILES['profilePhoto']['name'];
    $image_type = $_FILES['profilePhoto']['type'];
    $image_size = $_FILES['profilePhoto']['size'];
    $image_temp_name = $_FILES['profilePhoto']['tmp_name'];


    if (isset($username)){

        $filterdUser = filter_var($username, FILTER_SANITIZE_STRING);

        if (strlen($filterdUser) < 4) {

            $formErrors[] = "Username Must Be Larger Than 4 Characters.";

        }

    }

    if (isset($email)){

        $filterdEmail = filter_var($email, FILTER_SANITIZE_EMAIL);

        if (filter_var($email, FILTER_VALIDATE_EMAIL) != true) {

            $formErrors[] = "This Email is not valid.";

        }

    }

    if (isset($password) && isset($password2)){

        if(empty($password)) {

            $formErrors[] = "Password can\'t be Empty!";

        }

        if(sha1($password) !== sha1($password2)) {

            $formErrors[] = "Password is not match";

        }

    }

    if (empty($formErrors)) {

        $checkQuery = checkItem("email", "applicants", $filterdEmail);

        if ($checkQuery == 1) {

            $formErrors[] = "Sorry this email is exist.";

        } else {

            if($image_name == '') {

                $formErrors[] = "please choose an image to upload as profile photo";

            } else {

                $new_image_name = $filterdEmail . $image_name;

                move_uploaded_file($image_temp_name,"applicants/profile_pics/$new_image_name");



                $stmt = $connect->prepare("INSERT INTO applicants(name, phone, gender, birth_date, email, password, profile_photo) 
                                        VALUES(:zuser, :zphone, :zgender, :zbirthDay, :zemail, :zpassword, :zimage)");
                $stmt->execute(array(
                    'zuser' => $filterdUser,
                    'zemail' => $filterdEmail,
                    'zphone' => $phone,
                    'zbirthDay' => $birthDay,
                    'zgender' => $gender,
                    'zpassword' => sha1($password),
                    'zimage' => $new_image_name
                ));

                $gettingApplicantId = $connect->prepare("SELECT applicant_ID FROM applicants WHERE email = ?");
                $gettingApplicantId->execute(array($filterdEmail));
                $row = $gettingApplicantId->fetch();

                $newApplicantId = $row['applicant_ID'];

                $_SESSION['userID'] = $newApplicantId;

                foreach ($interests as $singleInterest) {

                    $fetchInterestId = $connect->prepare("SELECT interests_ID FROM interests WHERE Interests_name = ?");
                    $fetchInterestId->execute(array($singleInterest));
                    $row = $fetchInterestId->fetch();

                    $newInterestId = $row['interests_ID'];

                    $fillingInterestsToApplicant = $connect->prepare("INSERT INTO applicant_interests (Interests_ID, applicant_ID)
                                                                        VALUES(:interestsID, :applicantID)");

                    $fillingInterestsToApplicant->execute(array(
                        'applicantID' => $newApplicantId,
                        'interestsID' => $newInterestId
                    ));

                }

            }

            header('Location: index.php');

        }

    }

}
?>

<!DOCTYPE html>
<html lang="en">
    <?php require 'head.php'; ?>
    <body>
        
        <?php include 'navbar.php'; ?>
        
        <!-- Start SignUp -->
        
        <section class="signUp text-center">
            <div class="container">
                <div class="numbers hidden-xs">
                    <span class="active">1</span>
                    <hr />
                    <span>2</span>
                    <hr />
                    <span>3</span>
                </div>
                <div class="form1 row">
                    <div class="formOne col-md-6 col-xs-12">
                        <form action="<?php $_SERVER['PHP_SELF']; ?>" method="POST" id="form1" onsubmit="myFunction(); return false;" enctype="multipart/form-data">
                            <input class="username" name="username" type="text" placeholder="Username" required value="<?php if (isset($filterdUser)) { echo $filterdUser; } ?>"/>
                            <div class="alert alert-danger custom-alert">
                                Username must be larger than <strong>3</strong> characters.
                            </div>
                            <input class="email" name="email" type="email" placeholder="Email Address" required value="<?php if (isset($filterdEmail)) { echo $filterdEmail; } ?>"/>
                            <div class="alert alert-danger custom-alert">
                                Email can't be <strong>empty</strong>.
                            </div>
                            <input class="phone" name="phone" type="text" placeholder="Phone Number" required value="<?php if (isset($phone)) { echo $phone; } ?>"/>
                            <div class="alert alert-danger custom-alert">
                                Phone number must be <strong>11</strong> digit.
                            </div>
                            <input class="birthday" name="birthday" type="text" placeholder="Birthday" required onfocus="(this.type='date')" />
                            <div class="alert alert-danger custom-alert">
                                Email can't be <strong>empty</strong>.
                            </div>
                            <div class="radioBox">
                                <label class="radio inline"> 
                                    <input type="radio" name="sex" value="male" checked>
                                    <span> Male </span> 
                                </label>
                                <label class="radio inline"> 
                                    <input type="radio" name="sex" value="female">
                                    <span>Female </span>
                                </label>
                            </div>
                            <button type="button" class="btn form1Submit">Next</button>
                        </form>
                    </div>
                    <div class="formTwo col-md-6 col-xs-12">
                        <P class="lead">Careerea helps you find and learn more skills to apply for most convenient job.</P>
                        <img class="img-responsive" src="images/signUp.png" />
                    </div>
                </div>
                <div class="form2">
                    <div class="interests">
                        <h2>Fields you are interested in..</h2>
                        <h4>Choose at least 3 fields</h4>
                        <div>
                            <ul class="nav nav-tabs">
                                <li class="active"><a data-toggle="tab" href="#compterScience">Computer Science</a></li>
                                <li><a data-toggle="tab" href="#design">Design</a></li>
                                <li><a data-toggle="tab" href="#database">Database</a></li>
                                <li><a data-toggle="tab" href="#network">Network</a></li>
                            </ul>

                            <div class="tab-content">
                                <div id="compterScience" class="tab-pane fade in active">
                                    <?php

                                        $gettingInterestes = $connect->prepare("SELECT Interests_name FROM interests");
                                        $gettingInterestes->execute();

                                    while ($row = $gettingInterestes->fetch(PDO::FETCH_ASSOC)) {

                                        $interestName = $row['Interests_name'];

                                        echo '<div class="btn field">
                                                <input type="checkbox" name="interest[]" form="form1" id="'.$interestName.'" value="'.$interestName.'"/>
                                                <label class="clicked" for="'.$interestName.'">'.$interestName.'</label>
                                                <label class="select"><span class="glyphicon glyphicon-ok" aria-hidden="true"></span></label>
                                            </div>';
                                    }
                                    ?>
                                </div>
                                <div id="design" class="tab-pane fade">
                                    <div class="btn field">
                                        <input type="checkbox" name="interest[]" form="form1" id="jq" value="jq"/>
                                        <label class="clicked" for="jq">Jq</label>
                                        <label class="select"><span class="glyphicon glyphicon-ok" aria-hidden="true"></span></label>
                                    </div>
                                    <div class="btn field">
                                        <input type="checkbox" name="interest[]" form="form1" id="java" value=""/>
                                        <label class="clicked" for="java">Java</label>
                                        <label class="select"><span class="glyphicon glyphicon-ok" aria-hidden="true"></span></label>
                                    </div>
                                    <div class="btn field">
                                        <input type="checkbox" name="interest[]" form="form1" id="java" value=""/>
                                        <label class="clicked" for="java">Java</label>
                                        <label class="select"><span class="glyphicon glyphicon-ok" aria-hidden="true"></span></label>
                                    </div>
                                    <div class="btn field">
                                        <input type="checkbox" name="interest[]" form="form1" id="java" value=""/>
                                        <label class="clicked" for="java">Java</label>
                                        <label class="select"><span class="glyphicon glyphicon-ok" aria-hidden="true"></span></label>
                                    </div>
                                    <div class="btn field">
                                        <input type="checkbox" name="interest[]" form="form1" id="java" value=""/>
                                        <label class="clicked" for="java">Java</label>
                                        <label class="select"><span class="glyphicon glyphicon-ok" aria-hidden="true"></span></label>
                                    </div>
                                    <div class="btn field">
                                        <input type="checkbox" name="interest[]" form="form1" id="java" value=""/>
                                        <label class="clicked" for="java">Java</label>
                                        <label class="select"><span class="glyphicon glyphicon-ok" aria-hidden="true"></span></label>
                                    </div>
                                </div>
                                <div id="database" class="tab-pane fade">
                                    <div class="btn field">
                                        <input type="checkbox" name="interest[]" form="form1" id="java" value=""/>
                                        <label class="clicked" for="java">Java</label>
                                        <label class="select"><span class="glyphicon glyphicon-ok" aria-hidden="true"></span></label>
                                    </div>
                                    <div class="btn field">
                                        <input type="checkbox" name="interest[]" form="form1" id="java" value=""/>
                                        <label class="clicked" for="java">Java</label>
                                        <label class="select"><span class="glyphicon glyphicon-ok" aria-hidden="true"></span></label>
                                    </div>
                                    <div class="btn field">
                                        <input type="checkbox" name="interest[]" form="form1" id="java" value=""/>
                                        <label class="clicked" for="java">Java</label>
                                        <label class="select"><span class="glyphicon glyphicon-ok" aria-hidden="true"></span></label>
                                    </div>
                                    <div class="btn field">
                                        <input type="checkbox" name="interest[]" form="form1" id="java" value=""/>
                                        <label class="clicked" for="java">Java</label>
                                        <label class="select"><span class="glyphicon glyphicon-ok" aria-hidden="true"></span></label>
                                    </div>
                                </div>
                                <div id="network" class="tab-pane fade">
                                    <div class="btn field">
                                        <input type="checkbox" name="interest[]" form="form1" id="java" value=""/>
                                        <label class="clicked" for="java">Java</label>
                                        <label class="select"><span class="glyphicon glyphicon-ok" aria-hidden="true"></span></label>
                                    </div>
                                    <div class="btn field">
                                        <input type="checkbox" name="interest[]" form="form1" id="java" value=""/>
                                        <label class="clicked" for="java">Java</label>
                                        <label class="select"><span class="glyphicon glyphicon-ok" aria-hidden="true"></span></label>
                                    </div>
                                    <div class="btn field">
                                        <input type="checkbox" name="interest[]" form="form1" id="java" value=""/>
                                        <label class="clicked" for="java">Java</label>
                                        <label class="select"><span class="glyphicon glyphicon-ok" aria-hidden="true"></span></label>
                                    </div>
                                    <div class="btn field">
                                        <input type="checkbox" name="interest[]" form="form1" id="java" value=""/>
                                        <label class="clicked" for="java">Java</label>
                                        <label class="select"><span class="glyphicon glyphicon-ok" aria-hidden="true"></span></label>
                                    </div>
                                    <div class="btn field">
                                        <input type="checkbox" name="interest[]" form="form1" id="java" value=""/>
                                        <label class="clicked" for="java">Java</label>
                                        <label class="select"><span class="glyphicon glyphicon-ok" aria-hidden="true"></span></label>
                                    </div>
                                </div>
                            </div>
                            <div class="alert alert-danger custom-alert">
                                Must choose at least <strong>3</strong> interested fields.
                            </div>
                            <button class="btn form2Submit">Next</button>
                            <button class="btn back">Back</button>
                        </div>
                    </div>
                </div>
                <div class="form3">
                    <h2>Upload a profile photo</h2>
                    <form>
                        <div class="profile">
                            <img src="" alt="Profile Photo"/>
                            <input type="file" id="profileImage" form="form1" name="profilePhoto" required/>
                        </div>
                        <div class="password">
                            <input name="password" class="passwordField" type="password" required id="password" placeholder="Password" form="form1"/>
                            <span class="glyphicon glyphicon-eye-open"></span>
                        </div>
                        <div class="password">
                            <input name="password2" class="passwordFieldConfirm" type="password" required id="password_confirm" placeholder="Confirm Password" form="form1"/>
                            <span class="glyphicon glyphicon-eye-open"></span>
                        </div>
                        <br />
                        <input class="btn" type="submit" value="Finish" form="form1" name="signUp"/>
                    </form>
                    <button class="btn">Back to interests</button>
                </div>
                <div class="clearfix"></div>
                <div class="the-errors">
                    <?php

                        if (!empty($formErrors)) {

                            foreach ($formErrors as $error) {

                                echo '<div class="alert alert-danger msg">' . $error . '</div>';

                            }

                        }

                    ?>
                </div>
                <span>- Already have an account ?</span><br />
                <a href="#">- Careerea help !</a>
            </div>
        </section>
        
        <!-- End SignUp -->
        
        <?php include 'footer.php'; ?>
        
        <?php require 'scripts.php'; ?>
    </body>
</html>