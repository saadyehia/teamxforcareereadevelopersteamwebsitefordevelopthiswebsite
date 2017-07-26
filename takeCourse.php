<div class="takeCourse1">
    <h1>Register for a course</h1>
    <div class="selectPlan">
        <p class="lead">Pick a suitable time plan for taking this course</p>
        <form id="selectForm" action="" method="post">
            <input type="radio" id="planA" name="plan" required checked/>
            <label for="planA">Plan A</label>
            <input type="radio" id="planB" name="plan" required/>
            <label for="planB">Plan B</label>
        </form>
    </div>
    <div class="plans">
        <ul class="tabs">
            <li class="active" data-tab="planA">Plan A</li>
            <li data-tab="planB">Plan B</li>
        </ul>
        <div class="content">
            <div class="planA">
                <span>- 1 section per day</span>
                <table>
                    <tr>
                        <th>Days (<span>18</span>)</th>
                        <th>Sections (<span>18</span>)</th>
                        <th>Time</th>
                    </tr>
                    <tr>
                        <td>Sat</td>
                        <td>Section 1 (<span>4 videos</span>)</td>
                        <td>1:30:20</td>
                    </tr>
                    <tr>
                        <td>Sat</td>
                        <td>Section 1 (<span>4 videos</span>)</td>
                        <td>1:30:20</td>
                    </tr>
                    <tr>
                        <td>Sat</td>
                        <td>Section 1 (<span>4 videos</span>)</td>
                        <td>1:30:20</td>
                    </tr>
                </table>
            </div>
            <div class="planB">
                <span>- 2 sections per day</span>
                <table>
                    <tr>
                        <th>Days (<span>9</span>)</th>
                        <th>Sections (<span>18</span>)</th>
                        <th>Time</th>
                    </tr>
                    <tr>
                        <td>Sat</td>
                        <td>Section 1,2 (<span>9 videos</span>)</td>
                        <td>1:30:20</td>
                    </tr>
                    <tr>
                        <td>Sat</td>
                        <td>Section 1,2 (<span>9 videos</span>)</td>
                        <td>1:30:20</td>
                    </tr>
                </table>
            </div>
        </div>
        <div class="text-center">
            <button class="btn" type="button" form="selectForm">Cancel</button>
            <button class="btn" type="submit" form="selectForm">Save</button>
        </div>
    </div>
</div>
<div class="takeCourse2">
    <h1>Congrates!</h1>
    <i class="fa fa-close fa-fw fa-lg"></i>
    <div>
        <p class="lead">This course is saved in your <a href="">Enrolled courses</a> with plan <span>A</span> <button class="btn">Edit my plan</button></p>
        <p class="lead">Now, you can start with <a href="">lecture 1</a></p>
        <div class="text-center">
            <a href=""><button class="btn" type="button">View my enrolled courses</button></a>
            <a href=""><button class="btn" type="button">Browse more courses</button></a>
        </div>
    </div>
</div>