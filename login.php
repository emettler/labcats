<?php session_start();?>
<!DOCTYPE html>
<html>
	<head>
  	<title>Login</title>
  	<link rel="stylesheet" href="style.css">
  	<script src="login.js"></script>
	</head>
	<body>
  	<?php
  	include("functions.php");
  	if($_SERVER["REQUEST_METHOD"] == "POST"){
    	$valid = True;
    	$err_msg = "";
    	$username = clean_input($_POST['Username']);
    	$password = clean_input($_POST['Password']);
    	$valid = checkLogin($username, $password);
      if ($valid){
    		//redirect("main.php");
    		$_SESSION["user"] = "$username";
				$url="https://labcatscoding.com/my-courses/";
				redirect($url);
  		}else{
    		$err_msg = "Your login information was not correct. Please try again or create a new account.";
  		}
		}
		?>
  
  <?php include ('header.php');?>
  <!--<div id="forms">-->
    <div id="loginform">
      <h2>Have an Account? Welcome Back! </h2>
      <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>" method="post" name = "LoginForm" onsubmit = "return validateForm()">
        <p class="inputp">Username: <input type="text" name="Username" class="inputbutton" value = "<?php echo htmlspecialchars($username);?>" required></p>
        <p class="inputp">Password: <input type="password" name="Password" class="inputbutton" value = "<?php echo htmlspecialchars($password);?>" required></p>
        <br><input type="submit" value="Login" class="submitbutton">
      </form>
      	<div id = "forgotbuttons">
          <a href="" class = "forgotid">Forgot Username</a>
           <a href="" class = "forgotid">Forgot Password</a>
        </div>
          <tr><td class = "errclass"><?php echo $err_msg;?></td></tr>
          <button onclick = "window.location.href = 'createnewuser.php'" class = "connectlink">Don't have an account? Create one here!</button> 
			
  </div>   

</body>

</html>