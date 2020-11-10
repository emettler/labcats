<!DOCTYPE html>
<html lang="en">
<head>
  <title>Bootstrap Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="pop.css">
	<!-- header info for jQuery and BootStrap -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>
<body>
<?php
	include("functions.php");
	//write SQL & get data
	    $conn = connect_db();	
			$sql = "SELECT * FROM CulturalRegions";
			$result = $conn->query($sql);
		
		  //loop through results
			if($result){
				if($result->num_rows > 0){
					while($row = $result->fetch_array()){
						echo "<p><a href ='#' data-toggle='popover' title='".$row['Name']."' data-content='".$row['Description']."'> ".$row['Name']."</a></p>";
					}	
				} else{
					echo "No records matching your query were found.";
				}
			}else{
				echo "ERROR:  Could not execute SQL $sql. ".$conn->error;
			}

			//close connection
			$conn->close();
?>
<!--<div class="container">
  <h3>Popover Example</h3>
  <a href="#" data-toggle="popover" title="Popover Header" data-content="Some content inside the popover">Toggle popover</a>
</div>

//script to make popover
-->
<script>
$(document).ready(function(){
    $('[data-toggle="popover"]').popover();   
});
</script>

</body>
</html>