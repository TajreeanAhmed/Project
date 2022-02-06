<?php 
  require_once('../php/sessionstudent.php');
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
                        <a href="index.php" class="nav__link">
                            <i class='bx bx-grid-alt nav__icon' ></i>
                            <span class="nav__name">Dashboard</span>
                        </a>
                        <a href="course.php" class="nav__link ">
                            <i class='bx bx-book-reader' ></i>
                            <span class="nav__name">Course</span>
                        </a>
                        
                        <a href="teacher.php" class="nav__link ">
                            <i class='bx bx-user-voice'></i>
                            <span class="nav__name">Teacher</span>
                        </a>
                        <a href="classmate.php" class="nav__link">
                            <i class='bx bx-user-check' ></i>
                            <span class="nav__name">Classmate</span>
                        </a>
                        <a href="grade.php" class="nav__link ">
                            <i class='bx bx-book-reader' ></i>
                            <span class="nav__name">Grade</span>
                        </a>
                        <a href="allgrades.php" class="nav__link active">
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
            <!-- classes -->
            <div class="container-fluid classf">
                <div class="container teach">
                    <h1 class="h22">All Grades</h1>
                    <hr>
                    <div class="row">
                        <?php 
                           $q="select DISTINCT g.course_id, g.sem_id, d.name as dep_name, c.name as cor_name, g.grade, g.cgpa
                            from grade g, course c, department d
                            where d.id = c.dep_id and c.id = g.course_id and g.st_id = '".$_SESSION['userid']."'";
                           $re=mysqli_query($con, $q);

                           while($row = mysqli_fetch_assoc($re)){
                        ?>
                        <div class="col-12 col-sm-12 col-md-4 col-lg-4 ">
                            <div class="teachcon text-center">
                                <h1><?php echo $row['dep_name']; ?><?php echo $row['course_id']; ?></h1>
                                <h5 style="color: #000"><?php echo $row['cor_name']; ?></h5>
                                <h1><?php echo $row['grade']; ?></h1>
                                <h5 style="color: #000">CGPA: <?php echo $row['cgpa']; ?></h5>
                            </div>
                        </div>
                        <?php
                        }
                        ?>
                    </div>
                    <hr>
                </div>
            </div>
            <div class="container-fluid">
                <div class="container">
                    <div class="row">
                        <?php 
                           $q="select count(DISTINCT g.course_id) as t_cor, round(avg(g.cgpa),2) as t_cg
                               from grade g, course c, department d
                               where d.id = c.dep_id and c.id = g.course_id and g.st_id = '".$_SESSION['userid']."'";
                           $re=mysqli_query($con, $q);

                           if($row = mysqli_fetch_assoc($re)){
                        ?>
                        <div class="col-12 col-sm-12 col-md-6 col-lg-6 ">
                            <h4>Total Course: <?php echo $row['t_cor']; ?></h4>
                        </div>
                        <div class="col-12 col-sm-12 col-md-6 col-lg-6 ">
                            <h4>Total Grade: <?php echo $row['t_cg']; ?></h4>
                        </div>
                        <?php } ?>
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