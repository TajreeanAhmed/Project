<?php 
  require_once('../php/sessionteacher.php');
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
                        <a href="index.php" class="nav__link">
                            <i class='bx bx-grid-alt nav__icon' ></i>
                            <span class="nav__name">Dashboard</span>
                        </a>
                        <a href="course.php" class="nav__link ">
                            <i class='bx bx-book-reader' ></i>
                            <span class="nav__name">Course</span>
                        </a>
                        <a href="student.php" class="nav__link">
                            <i class='bx bx-user-check' ></i>
                            <span class="nav__name">Student</span>
                        </a>
                        <a href="gradesub.php" class="nav__link active">
                            <i class='bx bx-book-reader'></i>
                            <span class="nav__name">Grade Submission</span>
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
            <div class="container-fluid classf">
                <div class="container teach">
                    <h1 class="h22">Submit Grades</h1>
                    <hr>
                </div>
            </div>
            <div class="container-fluid">
                <div class="container clsmm" style="margin-bottom: 20px;">
                    <div class="row">
                        <form action="gradesub.php" method="post">
                            Student ID: <input style="margin-bottom: 10px;" type="text" name="stu_id" placeholder="Enter Student id.."><br>
                            Course ID: <input style="margin-bottom: 10px;" type="text" name="coru_id" placeholder="Enter Course id.."><br>
                            Grade: <input style="margin-bottom: 10px;" type="text" name="grade" placeholder="Enter Grade .."><br>
                            CGPA: <input style="margin-bottom: 10px;" type="text" name="cg" placeholder="Enter CGPA.."><br>
                            <input type="submit" name="enter" value="Enter">
                        </form>
                        
                    </div>
                    <?php 
                          if(!empty($_POST['stu_id']) && !empty($_POST['coru_id']) && !empty($_POST['grade']) && !empty($_POST['cg'])){
                            $q="insert into grade(`sem_id`, `st_id`, `te_id`, `course_id`, `grade`, `cgpa`) 
                                values ('".$sem."','".$_POST['stu_id']."','".$_SESSION['userid']."','".$_POST['coru_id']."','".$_POST['grade']."','".$_POST['cg']."')";

                             $r=mysqli_query($con, $q);
                             
                             if($r == 1){
                                echo "<script>alert('Insertion Successful!');</script>";
                             }else{
                                echo "<script>alert('Insertion Not Successful!');</script>";
                             }

                        
                          }else{
                        ?>
                        <h4>Fill Up All The Blanks!!</h4>
                        <?php
                        }
                        ?>
                </div>
            </div>
            
            <!-- classes -->
            <div class="container-fluid classf">
                <div class="container teach">
                    <h1 class="h22">Students</h1>
                    <hr>
                    <form action="gradesub.php" method="post">
                            Section Number: <input style="margin-bottom: 10px;" type="text" name="sec_id2" placeholder="Enter Course Number..">
                            <input type="submit" name="search" value="Search">
                        </form>
                    <div class="row">
                        <table class="table table-striped">
                            
                                <?php
                        if(!empty($_POST['search'])){
                        $qm="select count(sec_id) as s_count
                             from section 
                             where sem_id = '".$sem."' and te_id= '".$_SESSION['userid']."' and sec_id = '".$_POST['sec_id2']."'";
                        $rem=mysqli_query($con, $qm);
                        if($rsm = mysqli_fetch_assoc($rem)){
                        $scount = $rsm['s_count'];
                        }
                        
                        if($scount > 0){
                        $q="select *, st.name as st_name
                            from section s, studentsec sc, student st
                            where s.id = sc.sec_id and sc.st_id = st.id and s.sem_id = '".$sem."' and s.te_id= '".$_SESSION['userid']."' and s.sec_id = '".$_POST['sec_id2']."'";
                        $re=mysqli_query($con, $q);
                        ?>
                        <thead>
                                <tr>
                                    <th scope="col">Section ID</th>
                                    <th scope="col">Student ID</th>
                                    <th scope="col">Student Name</th>
                                    <th scope="col">Course ID</th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php
                        while($row = mysqli_fetch_assoc($re)){
                        ?>
                            <tr>
                                <th scope="row"><?php echo $row['sec_id']; ?></th>
                                <td><?php echo $row['st_id']; ?></td>
                                 <td><?php echo $row['st_name']; ?></td>
                                <td><?php echo $row['course_id']; ?></td>
                                </tr>
                        </div>
                        <?php
                        }
                        }else{
                        ?>
                        <h4>This Is Not Your Section!!<br>**Enter Valid Section**</h4>
                        <?php
                        }
                        }else{
                        ?>
                        <h4>Enter Section Number In This Semester ..<br> (Example: 3)</h4>
                        <?php
                        }
                        ?>

                            </tbody>
                        </table>
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