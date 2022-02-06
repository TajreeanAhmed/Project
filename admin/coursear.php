<?php 
  require_once('../php/sessionadmin.php');
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
                        <a href="student.php" class="nav__link">
                            <i class='bx bx-book-reader' ></i>
                            <span class="nav__name">Student</span>
                        </a>
                        <a href="studgrade.php" class="nav__link">
                            <i class='bx bx-user-voice' ></i>
                            <span class="nav__name">Student Grade</span>
                        </a>
                        <a href="teacher.php" class="nav__link">
                            <i class='bx bx-user-check' ></i>
                            <span class="nav__name">Teacher</span>
                        </a>
                        <a href="studentaru.php" class="nav__link">
                            <i class='bx bx-book-reader' ></i>
                            <span class="nav__name">Student Add/Rem/ Update</span>
                        </a>
                        <a href="teacheraru.php" class="nav__link">
                            <i class='bx bx-book-reader' ></i>
                            <span class="nav__name">Teacher Add/Rem/ Update</span>
                        </a>
                        <a href="section.php" class="nav__link">
                            <i class='bx bx-user-voice' ></i>
                            <span class="nav__name">Section Add/Rem</span>
                        </a>
                        <a href="studentsecar.php" class="nav__link">
                            <i class='bx bx-user-check' ></i>
                            <span class="nav__name">Add/Rem Student to Section</span>
                        </a>
                        <a href="coursear.php" class="nav__link active">
                            <i class='bx bx-book-reader' ></i>
                            <span class="nav__name">Course Add/Rem</span>
                        </a>
                        <a href="depar.php" class="nav__link">
                            <i class='bx bx-book-alt' ></i>
                            <span class="nav__name">Department Add/Rem</span>
                        </a>
                        <a href="semar.php" class="nav__link">
                            <i class='bx bx-user-check' ></i>
                            <span class="nav__name">Semester Add/Rem</span>
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
            <div class="container-fluid">
                <div class="container teach">
                    <h1 class="h22">Course Add/ Rem / Update</h1>
                    <hr>
                </div>
            </div>
            <div class="container-fluid">
                <div class="container clsmm" style="margin-bottom: 20px;">
                    <div class="row teach">
                        <div class="col-12 col-md-4 col-lg-4">
                            <h3>Addition</h3>
                            <hr>
                        <form action="coursear.php" method="post">
                            Course ID: <input style="margin-bottom: 10px;" type="text" name="co_id" placeholder="Enter Course id.."><br>
                            Course Name: <input style="margin-bottom: 10px;" type="text" name="co_name" placeholder="Enter Course Number.."><br>
                            Department ID: <input style="margin-bottom: 10px;" type="text" name="de_id" placeholder="Enter Department id.."><br>
                            <input type="submit" name="enta" value="Enter">
                        </form>
                        <?php 
                           if(!empty($_POST['co_id']) && !empty($_POST['co_name']) && !empty($_POST['de_id'])){
                            $q="insert into `course`(`id`, `name`, `dep_id`) 
                                values ('".$_POST['co_id']."', '".$_POST['co_name']."', '".$_POST['de_id']."')";

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
                        <div class="col-12 col-md-4 col-lg-4">
                            <h3>Remove</h3>
                            <hr>
                        <form action="coursear.php" method="post">
                            Course ID: <input style="margin-bottom: 10px;" type="text" name="co_idr" placeholder="Enter Course Number.."><br>
                            <input type="submit" name="enta2" value="Enter">
                        </form>
                        <?php 
                           if(!empty($_POST['co_idr'])){
                            $q="delete from `course` 
                                where id = '".$_POST['co_idr']."'";

                             $r=mysqli_query($con, $q);
                             
                             if($r == 1){
                                echo "<script>alert('Delete Successful!');</script>";
                             }else{
                                echo "<script>alert('Delete Not Successful!');</script>";
                             }
                         }else{
                        ?>
                        <h4>Fill The Blank!!</h4>
                        <?php
                        }
                        ?>
                        </div>
                    </div>
                </div>
            </div>
            
            <!-- classes -->
            <div class="container-fluid classf">
                <div class="container teach">
                    <h1 class="h22">Students</h1>
                    <hr>
                    <form action="coursear.php" method="post">
                            Course ID: <input style="margin-bottom: 10px;" type="text" name="dep_name" placeholder="Enter Course Number..">
                            <input type="submit" name="search" value="Enter">
                        </form>
                    <div class="row">
                        
                                <?php
                        if(!empty($_POST['dep_name'])){
                        $qm="select count(d.name) as Dep_count
                             from department d
                             WHERE d.name = '".$_POST['dep_name']."'";
                        $rem=mysqli_query($con, $qm);
                        if($rsm = mysqli_fetch_assoc($rem)){
                        $depcount = $rsm['Dep_count'];
                        }
                        
                        if($depcount > 0){
                            ?>
                            <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th scope="col">Course ID</th>
                                    <th scope="col">Course Name</th>
                                    <th scope="col">Department ID</th>
                                    <th scope="col">Department Name</th>
                                </tr>
                            </thead>
                            <tbody>

                            <?php  
                        $q="select *,c.name as cor_name, c.id as cor_id
                            from course c, department d 
                            WHERE c.dep_id = d.id and d.name = '".$_POST['dep_name']."'";
                        $re=mysqli_query($con, $q);
                        while($row = mysqli_fetch_assoc($re)){
                        ?>
                        <tr>
                            <th scope="row"><?php echo $row['cor_id']; ?></th>
                            <td><?php echo $row['cor_name']; ?></td>
                            <td><?php echo $row['id']; ?></td>
                            <td><?php echo $row['name']; ?></td>
                        </tr>
                        <?php
                        }
                        ?>
                        </tbody>
                        </table>
                        <?php 
                        }else{
                        ?>
                        <h4>There Is No Department of This Name<br>**Enter Valid Department**</h4>
                        <?php
                        }
                        }else{
                        ?>
                        <h4>Enter Department .. (Example: CSE)</h4>
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