<?php
	// include php file with functions in it
		include("functions.php");
		
		echo "hi";

		$sql = "SELECT * from users";
		$result = runQuery($sql);
		if($result){
			if($result->num_rows > 0){
				echo "<table class='datatable'><tr><th>User ID</th><th>User Name</th><th>email</th><th>Password</th></tr>";
				while($row = $result->fetch_array()){
					echo "<tr>";
					echo "<td>" . $row['UserID'] . "</td>";
					echo "<td>" . $row['UserName'] . "</td>";
					echo "<td>" . $row['Email'] . "</td>";
					echo "<td>" . $row['Password'] . "</td>";
					echo "</tr>";
				}
					echo "</table>";
			}else{
				echo "No rows";
			}
		}
		//$usrname = $email = $pwd1 = $pwd2 = "";
  //redirect("redirect_with_parameters.php?first=hello&second=world");
?>