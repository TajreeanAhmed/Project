<?php
require_once('../php/sessionstudent.php');
$qs="select max(id) as lsem
from sem";
$res=mysqli_query($con, $qs);
if($rs = mysqli_fetch_assoc($res)){
$sem = $rs['lsem'];
}
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <!-- ===== BOX ICONS ===== -->
        <link href='https://cdn.jsdelivr.net/npm/boxicons@2.0.5/css/boxicons.min.css' rel='stylesheet'>
        <!-- ===== CSS ===== -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
        <link rel="stylesheet" href="css/styles.css">
        <title>Sidebar menu responsive</title>
    </head>
    <body id="body-pd">
        <header class="header" id="header">
            <div class="header__toggle">
                <i class='bx bx-menu' id="header-toggle"></i>
            </div>
            <div class="proff">
                <a href="notice.php"><i class='bx bx-notepad'></i></a>
                <a href="user.php"><i class='bx bxs-user' ></i></a>
            </div>
        </header>
        <div class="l-navbar" id="nav-bar">
            <nav class="nav">
                <div>
                    <a href="index.php" class="nav__logo ttll">
                        <i><img  class='tittle-img' src="img/logo.png" alt=""></i>
                        <!--
                        <span class="nav__logo-name"></span> -->
                    </a>
                    <div class="nav__list">
                        <a href="index.php" class="nav__link active">
                            <i class='bx bx-grid-alt nav__icon' ></i>
                            <span class="nav__name">Dashboard</span>
                        </a>
                        <a href="course.php" class="nav__link">
                            <i class='bx bx-book-reader' ></i>
                            <span class="nav__name">Course</span>
                        </a>

                        <a href="teacher.php" class="nav__link">
                            <i class='bx bx-user-voice'></i>
                            <span class="nav__name">Teacher</span>
                        </a>
                        <a href="classmate.php" class="nav__link">
                            <i class='bx bx-user-check' ></i>
                            <span class="nav__name">Classmate</span>
                        </a>
                        <a href="grade.php" class="nav__link">
                            <i class='bx bx-book-reader' ></i>
                            <span class="nav__name">Grade</span>
                        </a>
                        <a href="allgrades.php" class="nav__link">
                            <i class='bx bx-book-alt' ></i>
                            <span class="nav__name">All Grades</span>
                        </a>
                    </div>
                </div>
                <a href="../php/logout.php" class="nav__link">
                    <i class='bx bx-log-out nav__icon' ></i>
                    <span class="nav__name">Log Out</span>
                </a>
            </nav>
        </div>

        <div class="body-main">
            <!-- counts -->
            <div class="container-fluid conttss-fluid">
                <div class="container">
                    <div class="row">
                        <div class="col-12 col-sm-12 col-md-3 col-lg-3 ">
                            <div class="contt cl1">
                                <h3>Semester</h3>
                                <h3><?php echo $sem; ?></h3>
                            </div>
                        </div>
                        <div class="col-12 col-sm-12 col-md-3 col-lg-3 ">
                            <div class="contt cl2">
                                <?php
                                $q="select round(avg(g.cgpa),2) as t_cg
                                from grade g, course c, department d
                                where d.id = c.dep_id and c.id = g.course_id and g.st_id = '".$_SESSION['userid']."'";
                                $re=mysqli_query($con, $q);
                                if($row = mysqli_fetch_assoc($re)){
                                ?>
                                <h3>CGPA</h3>
                                <h3><?php echo $row['t_cg']; ?></h3>
                            </div>
                            <?php } ?>
                        </div>
                        <div class="col-12 col-sm-12 col-md-3 col-lg-3 ">
                            <div class="contt cl2">
                                <?php
                                $q="select count(DISTINCT st.name) as t_clsm
                                from section s, studentsec sc, student st, department d
                                where st.dep_id = d.id and st.id = sc.st_id and sc.sec_id = s.id and s.sem_id = '".$sem."' and sc.st_id != '".$_SESSION['userid']."' and s.sec_id in (select s.sec_id
                                from section s, studentsec sc
                                where s.id = sc.sec_id and sc.st_id = '".$_SESSION['userid']."' and sc.sem_id = '".$sem."')";
                                $re=mysqli_query($con, $q);
                                if($row = mysqli_fetch_assoc($re)){
                                ?>
                                <h3>Classmates</h3>
                                <h3><?php echo $row['t_clsm']; ?></h3>
                            </div>
                            <?php } ?>
                        </div>
                        <div class="col-12 col-sm-12 col-md-3 col-lg-3 ">
                            <div class="contt cl2">
                                <?php
                                $q="select count(distinct t.name) as t_tec
                                from section s, studentsec sc, teacher t, department d, course c, department d2
                                where c.dep_id = d2.id and c.id = s.course_id and d.id = t.dep_id and s.id = sc.sec_id and t.id = s.te_id and s.sem_id = '".$sem."' and sc.st_id = '".$_SESSION['userid']."' and sc.sem_id ='".$sem."'";
                                $re=mysqli_query($con, $q);
                                if($row = mysqli_fetch_assoc($re)){
                                ?>
                                <h3>Teachers</h3>
                                <h3><?php echo $row['t_tec']; ?></h3>
                            </div>
                            <?php } ?>
                        </div>
                    </div>
                </div>
            </div>
            <div class="container-fluid grf-not-fluid">
                <div class="container">
                    <div class="row">
                        <div class="col-12 col-sm-12 col-md-8 col-lg-8 chart">
                            <canvas id="myChart2" width="500" height="320"></canvas>
                        </div>
                        <div class="col-12 col-sm-12 col-md-4 col-lg-4 notf">
                            <h2 class="text-center">Notice</h2>
                            <?php
                            $q="select tittle
                            from notice
                            limit 4";
                            $re=mysqli_query($con, $q);
                            while($row = mysqli_fetch_assoc($re)){
                            ?>
                            <a href="notice.php"><div class="notc">
                                <h3><?php echo $row['tittle']; ?></h3>
                            </div></a>
                            <?php } ?>
                        </div>
                    </div>
                </div>
            </div>
            <!-- classes -->
            <div class="container-fluid classf">
                <div class="container classess">
                    <h1 class="h22">Courses</h1>
                    <hr>
                    <div class="row">
                        <?php
                        $q="select  s.sec_id as section, d.name as depname, c.id as courseid, c.name as coursename, t.name as tec_name, s.time
                        from section s, course c, teacher t, studentsec sc, department d
                        where s.course_id = c.id and s.te_id = t.id and s.id = sc.sec_id and d.id = c.dep_id and s.sem_id ='".$sem."' and sc.st_id ='".$_SESSION['userid']."'";
                        $re=mysqli_query($con, $q);
                        while($row = mysqli_fetch_assoc($re)){
                        ?>
                        <div class="col-12 col-sm-12 col-md-4 col-lg-4 ">
                            <div class="courscon">
                                <h3>Section: <?php echo $row['section']; ?></h3>
                                <h3>Initial: <?php echo $row['depname']; ?><?php echo $row['courseid']; ?></h3>
                                <h4>Name: <?php echo $row['coursename']; ?></h4>
                                <h5>Teacher: <?php echo $row['tec_name']; ?></h5>
                                <h4>Time: <?php echo $row['time']; ?></h4>
                            </div>
                        </div>
                        <?php
                        }
                        ?>
                    </div>
                </div>
            </div>
            <div class="container-fluid classf">
                <div class="container classess">
                    <div class="row">
                        <div class="col-12 col-sm-12 col-md-8 col-lg-8">
                            <h5 class="text-center">Contact Us If You Have Any Questions !!</h5>
                            <form action="index.php" method="post" class="cf">
                                <div class="half left cf">
                                    <input name="name" type="text" id="input-name" placeholder="Name">
                                    <input name="email" type="email" id="input-email" placeholder="Email address">
                                    <input name="sub" type="text" id="input-subject" placeholder="Subject">
                                </div>
                                <div class="half right cf">
                                    <textarea name="msg" name="message" type="text" id="input-message" placeholder="Message"></textarea>
                                </div>
                                <input type="submit" value="Submit" id="input-submit">
                            </form>
                            <?php
                            if(isset($_POST['Submit'])){
                            $name=$_POST['name'];
                            $email=$_POST['email'];
                            $msg=$_POST['msg'];
                            $to='shaadsifat6@gmail.com';
                            $subject=$_POST['sub'];
                            $message="Name: ".$name."\n"."Email :".$email."\n"."Message :".$msg;
                            $headers="From: ".$email;
                            if(mail($to, $subject, $message, $headers)){
                            echo "<h5 style='color: green;'> The message has been sent SUCCESSFULLY!! h5>";
                            }
                            else{
                            echo "<h5 style='color: red;'> Something went WRONG!! <h5>";
                            }
                            }
                            ?>
                        </div>
                        <div class="col-12 col-sm-12 col-md-4 col-lg-4">
                            <div class="contato tx-wt">
                                <div class="ele fir">
                                    <i class='bx bxs-map'></i><span class="space1">Dhaka <b>Bangladesh</b></span> <br>
                                </div>
                                <div class="ele">
                                    <i class='bx bxs-phone' ></i><span class="space1">+880 546 454 4545 45</span><br>
                                </div>
                                <div class="ele">
                                    <i class='bx bx-mail-send' ></i><span class="space1">admin@gmail.com</span><br>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--===== MAIN JS =====-->
        <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/chart.js@2.8.0"></script>
        <script src="js/graph.js"></script>
        <script src="js/main.js"></script>
    </body>
</html>
