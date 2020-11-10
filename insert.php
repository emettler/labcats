<?php
  //establish and test connection to database
	include("functions.php");
	$conn = connect_db();
  //Get fields from the form and store them in variables
$firstName = $conn->real_escape_string($_REQUEST['firstName']);
  //$firstName = clean_input($_POST['firstName']);
  $lastName = clean_input($_REQUEST['lastName']);
  $age = clean_input($_REQUEST['age']);
  $email = clean_input($_REQUEST['email']);
  $language = clean_input($_REQUEST['language']);
  $description = clean_input($_REQUEST['desc']);

  //Double check that all data returned - remove this before production
  echo "first name is ", $firstName, " last name is ", $lastName, " age is ", $age, " email is ", $email, " language is ", $language, " and description is ", $description;

  //attempt to insert data into database
  $sql = "INSERT INTO members(FirstName, LastName, Age, Email, Language, Description) VALUES('$firstName', '$lastName', '$age', '$email', '$language', '$description')";
  
  //Check to make sure data was added
  if(mysqli_query($conn, $sql)){
    echo "Record added.";
  }else{
    echo "Error - could not execute $conn. " . $conn->error;
  }
?>