<!DOCTYPE html>
<html>
  <head>
    <title>Animated Login Form</title>
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <link href="https://fonts.googleapis.com/css?family=Poppins:600&display=swap" rel="stylesheet">
    <meta name="viewport" content="width=device-width, initial-scale=1">
  </head>
  <body>
    <div class="head-div">
      <div class="lftt">
        <a href="#"><img class="logo" src="img/logo.png"></a>
      </div>
      <div class="ritt">
        <select>
          <option value="">LogIn Info</option>
          <option value="volvo"></option>
          <option value="volvo">Admin: </option>
          <option value="saab">UserName: admin</option>
          <option value="saab">Pass: admin183</option>
          <option value="volvo"></option>
          <option value="volvo">Teacher: </option>
          <option value="saab">UserName: teachercse</option>
          <option value="saab">Pass: tec183</option>
          <option value="volvo"></option>
          <option value="volvo">Students: </option>
          <option value="saab">UserID: 18311</option>
          <option value="saab">Pass: shah183</option>
          <option value="saab">UserName: tayeb</option>
          <option value="saab">Pass: tay183</option>
        </select>
      </div>
    </div>
    
    <div class="container">
      <img class="wave" src="img/wave.png">
      <div class="img">
        <img src="img/bg.svg">
      </div>
      <div class="login-content">
        <form action="php/login.php" method="post">
          <img src="img/avatar.svg">
          <h2 class="title">RDS LOG IN</h2>
          <div class="input-div one">
            <div class="i">
              <i class="fas fa-user"></i>
            </div>
            <div class="div">
              <h5>UserID</h5>
              <input type="text" name="userid" class="input">
            </div>
          </div>
          <div class="input-div pass">
            <div class="i">
              <i class="fas fa-lock"></i>
            </div>
            <div class="div">
              <h5>Password</h5>
              <input type="password" name="password" class="input">
            </div>
          </div>
          <a href="#">Forgot Password?</a>
          <input type="submit" class="btn" name="login" value="Login">

          <?php 
            if(@$_GET['Empty']==true){
          ?>

              <p style="color: #ff0000"><?php echo $_GET['Empty'] ?></p>

          <?php
            }
          ?>

          <?php 
            if(@$_GET['Invalid']==true){
          ?>

              <p style="color: #ff0000"><?php echo $_GET['Invalid'] ?></p>

          <?php
            }
          ?>

        </form>
      </div>
    </div>
    <script src="https://kit.fontawesome.com/a81368914c.js"></script>
    <script type="text/javascript" src="js/main.js"></script>
  </body>
</html>
