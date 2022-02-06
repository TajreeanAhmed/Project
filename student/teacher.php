<?php 
  require_once('../php/sessionstudent.php');
  $qs="select max(id) as lsem
      from sem";

  $res=mysqli_query($con, $qs);
  if($rs = mysqli_fetch_assoc($res)){
    $sem = $rs['lsem'];
  }

  $q="select *, t.name as tec_name, d.name as dep_name, t.phone, t.email, d2.name as c_dep_name, c.id as cour_id, s.sec_id as sec
      from section s, studentsec sc, teacher t, department d, course c, department d2
      where c.dep_id = d2.id and c.id = s.course_id and d.id = t.dep_id and s.id = sc.sec_id and t.id = s.te_id and s.sem_id = '".$sem."' and sc.st_id = '".$_SESSION['userid']."' and sc.sem_id ='".$sem."'";
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
                        
                        <a href="teacher.php" class="nav__link  active">
                            <i class='bx bx-user-voice'></i>
                            <span class="nav__name">Teacher</span>
                        </a>
                        <a href="classmate.php" class="nav__link">
                            <i class='bx bx-user-check' ></i>
                            <span class="nav__name">Classmate</span>
                        </a>
                        <a href="#" class="nav__link">
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
                    <h1 class="h22">Teachers</h1>
                    <hr>
                    <div class="row">
                        <?php
                          while($row = mysqli_fetch_assoc($re)){
                        ?>
                        <div class="col-12 col-sm-12 col-md-6 col-lg-6 ">
                            <div class="teachcon text-center">
                                <img src="img/tec.jpg" alt="">
                                <h2><?php echo $row['tec_name']; ?></h2>
                                <h6><?php echo $row['dep_name']; ?></h6>
                                <h5><i class='bx bxs-phone' ></i> <?php echo $row['phone']; ?></h5>
                                <h5><i class='bx bx-mail-send' ></i> <?php echo $row['email']; ?></h5>
                                <h4>Course: <?php echo $row['c_dep_name']; ?><?php echo $row['cour_id']; ?></h4>
                                <h6>Section: <?php echo $row['sec']; ?></h6>
                            </div>
                        </div>
                        <?php
                          }
                        ?>
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