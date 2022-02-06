<?php 
  require_once('../php/sessionstudent.php');
  $q="select *, d.name as dep_name, s.id as s_id, COUNT(g.grade) as course_com, round(avg(g.cgpa),2) AS total_cg, s.name
      from login l, student s, department d, grade g
      where userid = s.id and dep_id = d.id and s.id = g.st_id and userid='".$_SESSION['userid']."'";

  $re=mysqli_query($con, $q);
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
                <a class="backgwt" href="user.php"><i class='bx bxs-user' ></i></a>
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
            
            <!-- classes -->
            <div class="container-fluid classf">
                <div class="container teach">
                    <h1 class="h22">My Profile</h1>
                    <hr>
                    <div class="row">
                        <div class="col-12 col-sm-12 col-md-2 col-lg-2 ">
                            
                        </div>
                        <div class="col-12 col-sm-12 col-md-8 col-lg-8 ">
                            <?php 
                              if($row = mysqli_fetch_assoc($re)){
                             ?>
                            <div class="teachcon text-center">
                                <img src="img/stud.jpg" alt="">
                                <h2><?php echo $row['name']; ?></h2>
                                <h3>ID: <?php echo $row['s_id']; ?></h3>
                                <h6>Department: <?php echo $row['dep_name']; ?></h6>
                                <h5><i class='bx bxs-phone' ></i><?php echo $row['phone']; ?></h5>
                                <h5><i class='bx bx-mail-send' ></i><?php echo $row['email']; ?></h5>
                                <h5><i class='bx bxs-map' ></i><?php echo $row['address']; ?></h5>
                                <h4>Semester Of Joining: <?php echo $row['sem']; ?></h4>
                                <h5>Course Completed: <?php echo $row['course_com']; ?></h5>
                                <h5>Grade: <?php echo $row['total_cg']; ?></h5>
                            </div>
                            <?php 
                              } 
                            ?>
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