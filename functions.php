<?php
//connect to database
function connect_db(){
 $dbhost = "localhost";
 $dbuser = "labcatsc_apps";
 $dbpass = "M!ssedC0nnect!0n";
 $db = "labcatsc_apps";
 $conn = new mysqli($dbhost, $dbuser, $dbpass,$db);
 if ($conn->connect_error) {
    return false;
 }else{
		return $conn;
	}
}
function clean_input($str){
	echo "str is $str";
  $conn = connect_db();
	
    $str = trim($str);
    $str = stripslashes($str);
    $str = htmlspecialchars($str);
    $str = $conn->real_escape_string($str);
    $conn->close();
  return $str;  
}
function redirect($url){
	flush();
	header("Location: $url");
	exit();
}


function runQuery($sql){
	echo "in function";
	$conn = connect_db();
	echo "SQL in runQuery is $sql";
	$result = $conn->query($sql);
	echo "in function";
	if($result){
		return $result;
	}else{
		die("cannot run query");
	}
}

//return single value result from a query
function return_value($sql){
		$conn = connect_db();
		$result = $conn->query($sql);
		if($result){
    	$row = $result->fetch_row();
    	$value = $row[0];
			//echo "<p>Value is ".$value."</p>";
		}
		$conn->close();
	  return $value;
}

function Record_Count($sqlCount){
		$conn = connect_db();
		$result = $conn->query($sqlCount);
	
		if($result->num_rows > 0){
			$count = mysqli_num_rows($result);
			echo "Count is ".$count;
			return $count;
			}   
		}

// This cleans the characters that get passed through from WordPress and returns a 
//  correctly formatted filename
function clean_file_name($file){
		$fileireplaced = str_ireplace("%2F", "/", $file);
  	//echo "<br>Now filename is $fileireplaced";
		
		//add in :
		$fileireplaced2 = str_ireplace("%3A", ":", $fileireplaced);
  	//echo "<br>Now filename is $fileireplaced2";
	  return $fileireplaced2;
}

function UsernameExists($username){
	$sql = "SELECT * from users WHERE username LIKE '".$username."'";
	$result = runQuery($sql);
	if($result->num_rows>0){
		return True;
	}else{
		False;
	}
}
	
function check_login($username, $password){
		$conn = connect_db();
	  $valid = False;
	  $sql = "SELECT * From Users WHERE UserID = ".$username."'";
	  echo "Checking login...SQL is $sql";
		$result = $conn->query($sql);
		if($result){
    	$row = $result->fetch_row();
    	$dbpassword = $row[0];
			if (password_verify($password,$dbpassword)){
				$valid = True;
			}
		}	
		return $valid;
}

// Checks to see if a School District has been uploaded in the past.  
// If it has - it finds and returns the LEA ID for that district.
// If not - it creates a record in frac_LEA and returns the LEA ID that was created.
/*function check_LEA_exists($LEA){
  $tablename = "frac_LEA";
  $sql = "SELECT * FROM ".$tablename." WHERE LEA LIKE '".$LEA."'";
	//echo "<br>sql is ".$sql;
	$conn = connect_db();

	//if it didn't connect - kill the process and send error message
	if(!$conn){
		die("cannot connect");
	}	
	$result = $conn->query($sql);
	if($result){
		//echo "result";
		if($result->num_rows > 0){
			while($row = $result->fetch_array()){
				$value = $row['LEAID'];
				//echo "Value is ".$value;		
				return $value;
			}   
		} else{
			//echo "No school - INSERT!";
			$insertSQL = "INSERT INTO `frac_LEA`(`LEAID`, `LEA`) VALUES (NULL,'".$LEA."')";
			//echo "<br>InsertSQL is ".$insertSQL;
			if(mysqli_query($conn, $insertSQL)){
				$last_id = $conn->insert_id;
				//echo "Record added.  Newest ID is: ".$last_id;
				return $last_id;
			}else{
				echo "Error";
			}					
		}
	}else{
		echo "ERROR:  Could not execute SQL $sql. ".$conn->error;
	}		
	$conn->close();
}*/
?>