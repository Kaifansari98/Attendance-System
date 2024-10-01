<?php 
include 'php/db.php';
$adminemail = $_SESSION['email'];
if(empty($adminemail)){
    header("Location: login.php");
}

?>


<div class="navigation" id="navigation">
            <ul>
                <li>
                    <a href="admin.php">
                        <span class="icon"><i class="fa-solid fa-list-check"></i></span>
                        <span class="title">
                            <h2>Bright Future</h2>
                        </span>
                    </a>
                </li>
                <li id="home">
                    <a href="admin.php">
                        <span class="icon"><i class="fa-solid fa-house" aria-hidden="true"></i></span>
                        <span class="title">Dashboard</span>
                    </a>
                </li>
                <li id="classes">
                    <a href="classes.php">
                        <span class="icon"><i class="fa-solid fa-people-roof"></i></span>
                        <span class="title">Classes</span>
                    </a>
                </li>
                <li id="teachers">
                    <a href="teachers.php">
                        <span class="icon"><i class="fa-solid fa-chalkboard-user"></i></span>
                        <span class="title">Teachers</span>
                    </a>
                </li>
                <li id="students">
                    <a href="students.php">
                        <span class="icon"><i class="fa-solid fa-user"></i></span>
                        <span class="title">Students</span>
                    </a>
                </li>
                <li id="attendance">
                    <a href="attendance.php">
                        <span class="icon"><i class="fa-solid fa-chart-simple"></i></span>
                        <span class="title">Attendance</span>
                    </a>
                </li>
                <li>
                    <a href="php/logout.php?logout_id=<?php echo $adminemail?>">
                        <span class="icon"><i class="fa-solid fa-right-to-bracket"></i></span>
                        <span class="title">Sign out</span>
                    </a>
                </li>
            </ul>

        <!-- theme switcher -->
        <div class="theme_switcher">
            <div class="sun" id="sun">
                <div class="line1"></div>
                <div class="line2"></div>
                <div class="line3"></div>
                <div class="line4"></div>
            </div>
        </div>
        <!-- theme switcher end -->
        </div>
        <!-- navigation end -->
        
        <!-- top navbar -->
        <div class="main">
            <div class="primary_menu">
                <div class="toggle" id="toggle"></div>
                <div class="search">
                    <label for="">
                        <input type="text" placeholder="Search here">
                        <div class="icon-container">
                            <i class="fa fa-search" aria-hidden="true"></i>
                        </div>
                    </label>
                </div>
                <div class="user">
                    <img src="img/User.jpg" alt="">
                </div>
            </div>

            

    