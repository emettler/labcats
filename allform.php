<!DOCTYPE html>
<html>
<head>
   <title>Members Form</title>
   <link rel="stylesheet" href="style.css" type="text/css"></link>
</head>
<body>

<?php include("header.php");?>
<body>
   <?php
   //set up checking
   include("functions.php");
   if($_SERVER["REQUEST_METHOD"] == "POST"){
      $valid = True;
      $err_msg = "";
      $firstName= clean_input($_POST['firstName']);
      $lastName= clean_input($_POST['lastName']);
      $age= clean_input($_POST['age']);
      $email= clean_input($_POST['email']);
      $language= clean_input($_POST['language']);
      $description= clean_input($_POST['description']);
      //$valid = checkData($firstName,$lastName, $age, $email);
		 echo "firstname is $firstName";
      if ($valid){
				echo "valid";
         redirect("insert.php?firstName=$firstName&lastName=$lastName&age=$age&email=$email&language=$language&description=$description");
      }else{
         $err_msg = "Your information was not correct. Please try again.";
      }
    }
?>
  <h1>Members Form </h1>
  <!-- Start of FORM -->
<form name="create_member" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>" method="post">
    <table>
    <tr>
      <td>First Name</td>
       <td><input type="text" name="firstName" size="20" value="<?php echo htmlspecialchars($firstName);?>" required></td>
    </tr>
    <tr>
      <td>Last Name:</td>
       <td><input type="text" name="lastName" size="20" value="<?php echo htmlspecialchars($lastName);?>" required></td>
    </tr>
    <tr>
      <td>Age</td> 
       <td><input type="number" name="age" size="20" value="<?php echo htmlspecialchars($age);?>" required></td>
    </tr>
    <tr>
      <td>Email:</td>
       <td><input type="email" name="email" size="20" value="<?php echo htmlspecialchars($email);?>" required></td>
    </tr>
    <tr>
      <td>Language:</td>
      <td>
        <ul class="nobullets">
          <li><input type="radio" name="language" value="Chinese" <?php if ($language=="Chinese"){echo "selected";}?>>Chinese</li>
          <li><input type="radio" name="language" value="French" <?php if ($language=="French"){echo "selected";}?>>French</li>
          <li><input type="radio" name="language" value="Spanish" <?php if ($language=="Spanish"){echo "selected";}?>>Spanish</li>
        </ul>
      </td>
    </tr>
    <tr>
      <td>Description:</td>
      <td><textarea name="desc" rows="3" cols="50"><?php echo htmlspecialchars($description);?></textarea></td>
    </tr>
    <tr><td rowspan="2"><input type="submit" name="submit" value="submit"></td></tr>
    </table>
  </form>
  <!-- End of FORM -->
</body>
</html>