<!DOCTYPE html>
<html class="no-js" lang="en"  >
<head>
    <style >
        a{text-decoration: none;
        }
    </style>
    <meta charset="utf-8">
    <title>CBS</title>
    <meta name="description" content="">
    <meta name="author" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <link rel="stylesheet" href="_css/main.css">
    <link rel="stylesheet" href="_css/base.css">
    <script src="_js/modernizr.js"></script>
    <link rel="icon" type="image/png" href="images/icons/favicon.ico"/>
    <link rel="stylesheet" type="text/css" href="fonts/Linearicons-Free-v1.0.0/icon-font.min.css">
    <link rel="stylesheet" type="text/css" href="css/main.css">
    <script type="text/javascript" src="js/validateCourse.js"></script>
    <?php include("controller/fetchList.php");?>
</head>

<body id="top">
<?php
session_start();
if(!isset($_SESSION['username']))
{
    header("location:index.html");
}

?>
<header class="s-header header">

    <div class="header__logo">
        <a class="logo" href="adminhome.php">
            <img src="images/logo.svg" alt="Homepage">
        </a>
    </div>



    <a class="header__toggle-menu" href="#0" title="Menu"><span>Menu</span></a>
    <nav class="header__nav-wrap">

        <h2 class="header__nav-heading h6">Navigate to</h2>

        <ul class="header__nav">
            <li class="current"><a href="adminhome.php" title="">Home</a></li>

                       <li class="has-children">
                <a href="#0" title="">Booking</a>
                <ul class="sub-menu">
           <li><a href="adminnewbookings.php">Create Booking</a></li>
            <li><a href="adminCancelBookings.php">View Booking</a></li>
                </ul>
            </li>


            <li><a href="adminbookinglog.php" title="">Booking Log</a></li>
            <li class="has-children">
                <a href="#0" title="">Adding</a>
                <ul class="sub-menu">
                    <li><a href="departmentAdding.php"">Department</a></li>
                    <li><a href="courseAdding.php">Course</a></li>
                    <li><a href="roomAdding.php">Room</a></li>
                </ul>
            </li>
            <li><a href="adminprofile.php" title="">Profile</a></li>
            <li><a href="controller/logout.php" title="">Log Out</a></li>
        </ul>

        <a href="#0" title="Close Menu" class="header__overlay-close close-mobile-menu">Close</a>

    </nav>



</header>
<section class="s-content s-content--top-padding s-content--narrow" style="background-image: url('images/pic.jpg');">

    <div class="limiter">
        <div class="container-login100" >
            <div class="wrap-login100 p-t-30 p-b-50">
                <span class="login100-form-title p-b-41">
                    New COURSE
                    <br><br>
                </span>
                <form class="login100-form validate-form p-b-33 p-t-5" action="controller/addCourse.php" onsubmit="return validateFormCourse()" method="post" >
                    <div >
                        <input id = "coursename" class="input100" type="text" name="coursename" placeholder="Course Name" onkeyup="checkCourseName(this.value)">
                        <span class="stopp" id="courseSpan"></span>
                    </div>

                    <p class="input100">Department</p>
                    <select id="dept" name="department" class="input102">
                        <option value="select">SELECT</option>
                        <?php
                        $dept = getDeptName();
                        foreach($dept as $d) {
                            if($d['deptname']!="admin"){?>
                                <option value="<?php echo $d['deptname']?>"><?php echo $d['deptname']?></option>
                            <?php }}?>
                    </select>
                    <span class="stopp" id="deptSpan"></span>

                    <div class="container-login100-form-btn m-t-32" >
                        <button class="login100-form-btn" type="submit" value="submit">
                            CONFIRM
                        </button>
                    </div>

                    <br><br>
                </form>

            </div>
            <div style="overflow: scroll" class="row login102-form">
                <h1> Course List</h1>
                <table  class="login100-form validate-form p-b-33 p-t-5">
                    <tr>
                        <th>COURSE NAME</th>
                        <th>DEPARTMENT</th>
                    </tr>
                    <?php
                    $courseList = allCourseList();
                    foreach ($courseList as $b) {
                        $deptname = deptIdForCourse($b['deptid']);
                        ?>
                        <tr>
                            <td><?php echo $b['coursename'];?></td>
                            <td><?php echo $deptname['deptname'];?></td>
                        </tr>
                    <?php }?>
                </table>
            </div>
        </div>
    </div>

</section>
<footer class="s-footer">
    <div class="row">
        <div class="col-six tab-full s-footer__about">

            <h4>ABOUT CBS</h4>

            <p style="color: #58905f">It is a class booking system</p>

        </div>
        <div class="col-six tab-full s-footer__subscribe ">

            <h4>DEVELOPED BY</h4>

            <p ><h5 style="color: #58905f">Chetana Dharavathu(200005011)</h5></p>
        </div>
    </div>
</footer>

<script src="_js/jquery-3.2.1.min.js"></script>
<script src="_js/main.js"></script>

</body>

</html>