<?php 
require_once('connectdb.php');
session_start();

if(isset($_POST['login']))
    {
       if(empty($_POST['userid']) || empty($_POST['password']))
       {
            header("location:../index.php?Empty= ** Please Fill Up Username , Password **");
       }
       else
       {
            $query="select * 
                    from login 
                    where userid='".$_POST['userid']."' and pass='".$_POST['password']."'";

            $result=mysqli_query($con, $query);

            if($r = mysqli_fetch_assoc($result))
            {
                $_SESSION['userid'] = $_POST['userid'];
                $_SESSION['role'] = $r['role'];
                $_SESSION['pass'] = $r['pass'];

                if($_SESSION['role'] == 'Administrator'){
                  header("location:../admin/index.php");
                }
                else if($_SESSION['role'] == 'Teacher'){
                  header("location:../teacher/index.php");
                }
                else if($_SESSION['role'] == 'Student'){
                  header("location:../student/index.php");
                }
            }
            else
            {
                header("location:../index.php?Invalid= ** Please Enter Correct User Name and Password ** ");
            }
       }
    }
    else
    {
        header("location:../index.php");
    }
?>

    