<?php

    $gettingSkills = $connect->prepare("SELECT skill_name FROM skills");
    $gettingSkills->execute();


    if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['saveSkill'])) {

        $skills = $_POST['skills'];

        foreach($skills as $skill) {

            $gettingSkills = $connect->prepare("SELECT skill_ID FROM skills WHERE skill_name = ?");
            $gettingSkills->execute(array($skill));

            $rowSkills = $gettingSkills->fetch();

            $newSkillId = $rowSkills['skill_ID'];

            $insertSkillsForApplicant = $connect->prepare("INSERT INTO applicant_skills (applicant_ID, skill_ID) 
                                                            VALUES (:applicantIDForSkill, :skillId)");

            $insertSkillsForApplicant->execute(array(
                'applicantIDForSkill' => $_SESSION['userID'],
                'skillId' => $newSkillId
            ));

        }

    }

    if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['editSkill'])) {

        $skill = $_POST['skill'];
        $newSkill = $_POST['newSkill'];

        $gettingSkill = $connect->prepare("SELECT skill_ID FROM skills WHERE skill_name = ?");
        $gettingSkill->execute(array($skill));
        $rowSkill = $gettingSkill->fetch();
        $skillId = $rowSkill['skill_ID'];

        $gettingNewSkill = $connect->prepare("SELECT skill_ID FROM skills WHERE skill_name = ?");
        $gettingNewSkill->execute(array($newSkill));
        $rowNewSkill = $gettingNewSkill->fetch();
        $newSkillId = $rowNewSkill['skill_ID'];

        $updateSkillId = $connect->prepare("UPDATE applicant_skills SET skill_ID = ? WHERE skill_ID = ? AND applicant_ID = ?");
        $updateSkillId->execute(array($newSkillId, $skillId, $_SESSION['userID']));



    }


?>

<div class="addSkill">
    <div>
        <h1>Add Skills</h1>
        <i class="fa fa-close fa-fw fa-lg"></i>
    </div>
    <form action="<?php $_SERVER['PHP_SELF'] ?>" method="post">
        <label>Skills Names</label><br />
        <select class="chosen-select1" multiple name="skills[]">
            <option></option>
            <?php
                while ($row = $gettingSkills->fetch(PDO::FETCH_ASSOC)) {

                    $skillName = $row['skill_name'];

                    echo '<option value="'. $skillName .'">'. $skillName .'</option>';

                }
            ?>
        </select>
        <button type="submit" class="btn" name="saveSkill">Save</button>
    </form>
</div>

<div class="editSkill">
    <div>
        <h1>Edit Skills</h1>
        <i class="fa fa-close fa-fw fa-lg"></i>
    </div>
    <form action="<?php $_SERVER['PHP_SELF'] ?>" method="POST">
        <label>Skill Name</label><br />
        <select class="chosen-select2" name="skill">
            <option></option>
            <?php

                $gettingSkills2 = $connect->prepare("SELECT DISTINCT skills.skill_name 
                                                        FROM skills
                                                        JOIN applicant_skills ON skills.skill_ID = applicant_skills.skill_ID
                                                        WHERE applicant_skills.applicant_ID = ?");
                $gettingSkills2->execute(array($_SESSION['userID']));

                while ($row2 = $gettingSkills2->fetch(PDO::FETCH_ASSOC)) {

                    $skillName = $row2['skill_name'];

                    echo '<option value="'. $skillName .'">'. $skillName .'</option>';

                }
            ?>
        </select>
        <button class="btn" type="button">Edit</button>
        <button class="btn btn-danger" type="button">Delete</button>
        <div class="editBox">
            <select class="chosen-select3" name="newSkill">
                <option></option>
                <?php

                    $gettingSkills3 = $connect->prepare("SELECT skill_name FROM skills");
                    $gettingSkills3->execute();

                    while ($row3 = $gettingSkills3->fetch(PDO::FETCH_ASSOC)) {

                        $skillName = $row3['skill_name'];

                        echo '<option value="'. $skillName .'">'. $skillName .'</option>';

                    }
                ?>
            </select>
            <button class="btn" type="submit" name="editSkill">Save</button>
        </div>
    </form>
</div>

<div class="pinSkill">
    <div>
        <h1>Pin Skills</h1>
        <i class="fa fa-close fa-fw fa-lg"></i>
    </div>
    <div class="form">
        <label>Type skill name..</label>
        <div class="search">
            <input type="search" autocomplete="on" />
            <i class="fa fa-search fa-fw"></i>
        </div>
        <div class="pins">
            <div>
                <label>php</label>
                <span class="glyphicon glyphicon-pushpin" aria-hidden="true"></span>
            </div>
            <div>
                <label>Java</label>
                <span class="glyphicon glyphicon-pushpin" aria-hidden="true"></span>
            </div>
            <div>
                <label>C++</label>
                <span class="glyphicon glyphicon-pushpin" aria-hidden="true"></span>
            </div>
            <div>
                <label>Laravel</label>
                <span class="glyphicon glyphicon-pushpin" aria-hidden="true"></span>
            </div>
            <div>
                <label>php</label>
                <span class="glyphicon glyphicon-pushpin" aria-hidden="true"></span>
            </div>
            <div>
                <label>Java</label>
                <span class="glyphicon glyphicon-pushpin" aria-hidden="true"></span>
            </div>
            <div>
                <label>C++</label>
                <span class="glyphicon glyphicon-pushpin" aria-hidden="true"></span>
            </div>
            <div>
                <label>Laravel</label>
                <span class="glyphicon glyphicon-pushpin" aria-hidden="true"></span>
            </div>
        </div>
        <button class="btn" type="button">Save</button>
        <button class="btn" type="button">Cancel</button>
    </div>
</div>