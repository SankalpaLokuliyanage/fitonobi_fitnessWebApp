<?php
  require 'header.php';
?>
<title>Register</title>




<center><div class = "register-form" >
<div class="text-center col-5">

    <br />

    <!-- register -->
    <?php
      if (isset($_GET['error'])) {
        if ($_GET['error'] == "emptyfields") {
          echo '<p>Fill in all fields!</p>';
        } else if ($_GET['error'] == "invalidmailuid") {
          echo '<p>Invalid username and e-mail!</p>';
        } else if ($_GET['error'] == "invaliduid") {
          echo '<p>Invalid username!</p>';
        } else if ($_GET['error'] == "invalidmail") {
          echo '<p>Invalid e-mail!</p>';
        } else if ($_GET['error'] == "passwordcheck") {
          echo '<p>Your passwords do not match!</p>';
        } else if ($_GET['error'] == "usertaken") {
          echo '<p>Username is already taken!</p>';
        }
      } else if (isset($_GET['register'])) {
        if ($_GET['register'] == "success") {
          echo '<p>Registration was successful!</p>';
        }
      }
    ?>


    <!-- login -->
<?php
  if (isset($_GET['error'])) {
    if ($_GET['error'] == "wrongpwd") {
      echo '<p class="m-3 text-center" style="color: red;">Incorrect password! Try again.</p>';
    } else if ($_GET['error'] == "nouser") {
      echo '<p class="m-3 text-center" style="color: red;">Incorrect username! Try again.</p>';
    }  else if ($_GET['error'] == "emptyfields") {
      echo '<p class="m-3 text-center" style="color: red;">Please fill all fields.</p>';
    }
  }
?>
    <!-- Registration Form -->
    <!-- <form class="form-group" action="includes/register.inc.php" method="post">
      <input class="form-control mr-sm-2" type="text" name="uid" placeholder="Username"><br>
      <input class="form-control mr-sm-2" type="email" name="mail" placeholder="E-mail"><br>
      <input class="form-control mr-sm-2" type="password" name="pwd" placeholder="Password"><br>
      <input class="form-control mr-sm-2" type="password" name="pwd-repeat" placeholder="Repeat Password"><br>
      <button class="btn btn-primary my-2 my-sm-0 mr-3" type="submit" name="register-submit">Register</button>

    </form> -->

   <!--  <form class="form-group" action="includes/login.inc.php" method="post">
    <center><img src="img/logo1.png" alt="" width="200"></center>
 
    <input style="margin: 20px;" type="text" name="mailuid" class="form-control" placeholder="Username" aria-label="Username">
    <input style="margin: 20px;" type="password" name="pwd" class="form-control" placeholder="Password" aria-label="Password">
  
    <center><button type="submit" name="login-submit" class="btn btn-info">LOGIN</button></center>

  </form> -->

  </div>
</div></center>


<div style="height:100vh;
  min-height:550px;
  background-image: url(http://www.planwallpaper.com/static/images/Free-Wallpaper-Nature-Scenes.jpg);
  background-repeat: no-repeat;
  background-size:cover;
  background-position:center;
  position:relative;
    overflow-y: hidden;">

<div class="login-reg-panel">
    <div class="login-info-box">
      <h2>Have an account?</h2>
      <p>Let's Go!</p>
      <label id="label-register" for="log-reg-show">Login</label>
      <input type="radio" name="active-log-panel" id="log-reg-show"  checked="checked">
    </div>
              
    <div class="register-info-box">
      <h2>Don't have an account?</h2>
      <p>Create Now!</p>
      <label id="label-login" for="log-login-show">Register</label>
      <input type="radio" name="active-log-panel" id="log-login-show">
    </div>
              
    <div class="white-panel">
      <div class="login-show">
        <h2>LOGIN</h2>
        <form class="form-group" action="includes/login.inc.php" method="post">
        <input class="form-control mr-sm-2" type="text" name="mailuid" class="form-control" placeholder="Username" aria-label="Username">
        <input class="form-control mr-sm-2" type="password" name="pwd" class="form-control" placeholder="Password" aria-label="Password">
        <button type="submit" name="login-submit" class="btn btn-info">LOGIN</button>
        </form>
        <!-- <a href="">Forgot password?</a> -->
      </div>
      <div class="register-show">
        <h2>REGISTER</h2>
        <form class="form-group" action="includes/register.inc.php" method="post">
        <input class="form-control mr-sm-2" type="text" name="uid" placeholder="Username">
        <input class="form-control mr-sm-2" type="email" name="mail" placeholder="E-mail">
        <input class="form-control mr-sm-2" type="password" name="pwd" placeholder="Password">
        <input class="form-control mr-sm-2" type="password" name="pwd-repeat" placeholder="Repeat Password"><br>
        <button class="btn btn-primary my-2 my-sm-0 mr-3" type="submit" name="register-submit">Register</button>
      </form>
      </div>
    </div>
  </div>

  <style>
    
    a{
  text-decoration:none;
  color:#444444;
}
.login-reg-panel{
    position: relative;
    top: 50%;
    transform: translateY(-50%);
  text-align:center;
    width:70%;
  right:0;left:0;
    margin:auto;
    height:400px;
    background-color: blue;
}
.white-panel{
    background-color: rgba(255,255, 255, 1);
    height:500px;
    position:absolute;
    top:-50px;
    width:50%;
    right:calc(50% - 50px);
    transition:.3s ease-in-out;
    z-index:0;
    box-shadow: 0 0 15px 9px #00000096;
}
.login-reg-panel input[type="radio"]{
    position:relative;
    display:none;
}
.login-reg-panel{
    color: white;
}
.login-reg-panel #label-login, 
.login-reg-panel #label-register{
    border:2px solid white;
    color: white;
    padding:5px 5px;
    width:150px;
    display:block;
    text-align:center;
    border-radius:10px;
    cursor:pointer;
    font-weight: 600;
    font-size: 18px;
}
.login-info-box{
    width:30%;
    padding:0 50px;
    top:20%;
    left:0;
    position:absolute;
    text-align:left;
}
.register-info-box{
    width:30%;
    padding:0 50px;
    top:20%;
    right:0;
    position:absolute;
    text-align:left;
    
}
.right-log{right:50px !important;}

.login-show, 
.register-show{
    z-index: 1;
    display:none;
    opacity:0;
    transition:0.3s ease-in-out;
    color:#242424;
    text-align:left;
    padding:50px;
}
.show-log-panel{
    display:block;
    opacity:0.9;
}
.login-show input[type="text"], .login-show input[type="password"]{
    width: 100%;
    display: block;
    margin:20px 0;
    padding: 15px;
    border: 1px solid #b5b5b5;
    outline: none;
}

}
.login-show a{
    display:inline-block;
    padding:10px 0;
}

.register-show input[type="text"], .register-show input[type="password"]{
    width: 100%;
    display: block;
    margin:20px 0;
    padding: 15px;
    border: 1px solid #b5b5b5;
    outline: none;
}

}
.credit {
    position:absolute;
    bottom:10px;
    left:10px;
    color: #3B3B25;
    margin: 0;
    padding: 0;
    font-family: Arial,sans-serif;
    text-transform: uppercase;
    font-size: 12px;
    font-weight: bold;
    letter-spacing: 1px;
    z-index: 99;
}


  </style>

  <script>
    
    $(document).ready(function(){
    $('.login-info-box').fadeOut();
    $('.login-show').addClass('show-log-panel');
});


$('.login-reg-panel input[type="radio"]').on('change', function() {
    if($('#log-login-show').is(':checked')) {
        $('.register-info-box').fadeOut(); 
        $('.login-info-box').fadeIn();
        
        $('.white-panel').addClass('right-log');
        $('.register-show').addClass('show-log-panel');
        $('.login-show').removeClass('show-log-panel');
        
    }
    else if($('#log-reg-show').is(':checked')) {
        $('.register-info-box').fadeIn();
        $('.login-info-box').fadeOut();
        
        $('.white-panel').removeClass('right-log');
        
        $('.login-show').addClass('show-log-panel');
        $('.register-show').removeClass('show-log-panel');
    }
});
  

  </script>

</div>
<?php
  require 'footer.php';
?>