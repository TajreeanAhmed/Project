<?php 
require('connectdb.php');
session_start();

if(isset($_SESSION['role']))
    {
        if($_SESSION['role'] == 'Administrator'){
                  header("location:../admin/index.php");
                }
        else if($_SESSION['role'] == 'Teacher'){
            header("location:../teacher/index.php");
        }
    }
    else
    {
        header("location:../index.php");
    }
?>