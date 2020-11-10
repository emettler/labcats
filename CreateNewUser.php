<?php session_start(); ?>
<!DOCTYPE html>
<html>
<head>
  <title>New User</title>
  <meta charset="utf-8"/>
  <link rel="stylesheet" href="style.css">
</head>
<body>
 <?php include ('header.php'); ?>
  <?php
  include("functions.php");
	if($_SERVER["REQUEST_METHOD"] == "POST"){
	  $email = clean_input($_POST['Email']);
	  $username = clean_input($_POST['Username']);
    $password = clean_input($_POST['Password']);
    $confirmpassword = clean_input($_POST['ConfirmPassword']);
    $username_err = $password_err = "";
    $valid = True;    
	  if(UsernameExists($username)){
      $username_err = "Sorry that username already exists. Create a new one or try logging in again";
      $valid = False;
    }elseif ($password != $confirmpassword){
      $password_err = "Your passwords don't match, silly.";
      $valid = False;
    }
   if($valid){
     $hashed_pwd = password_hash($password, PASSWORD_DEFAULT);
     $sql = "INSERT INTO users(UserID, Username, Password, Email) VALUES(NULL, '$username', '$hashed_pwd', '$email')";
		 echo"swl is $sql<br>";
     if (runQuery($sql)){
        //$url = "http://magicals.studio/index.php/";
       $_SESSION["user"] = "$username";
       //$_SESSION["avatar"] = createDefaultAvatar($firstname, $lastname);
       echo "<script type='text/javascript'>window.top.location='https://labcatscoding.com/courses/MakeApp/';</script>"; exit;
      //redirect('https://labcatscoding.com/courses/MakeApp/');
    
      }
    }
  }                   
?> 

<div id="newuserform">
      <h2 class=loginheader> New User? Welcome!</h2>
      <form action = "<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>"  method="post" name="NewUser"> 
        <?php echo $lastname_err;?>
        <p class="inputp">Email: <input type="email" name="Email" class="inputbutton" value = "<?php echo htmlspecialchars($email);?>" required></p>
        <?php echo $email_err;?>
        <p class="inputp">Username: <input type="text" name="Username" class="inputbutton" value = "<?php echo htmlspecialchars($username);?>" required> </p>
        <?php echo $username_err;?>
        <p class="inputp">New Password: <input type="password" name="Password" class="inputbutton" value = "<?php echo htmlspecialchars($password);?>" required> </p>
        <?php echo $password_err;?>
        <p class="inputp">Confirm Password: <input type="password" name="ConfirmPassword" class="inputbutton" value = "<?php echo htmlspecialchars($confirmpassword);?>" required</p>
        <?php echo $confirmpassword_err;?>
          <br><input type="submit" value="Sign Me Up!" class="submitbutton">
      </form>
  <a href = "login.php" class = "connectlink">Already have an account? Sign in here!</a>
    </div>
  </html>