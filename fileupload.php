<!DOCTYPE html>
<html>
<head>
   <title>File Upload Form</title>
   <link rel="stylesheet" href="style.css" type="text/css"></link>
</head>
<?php include("header.php");?>
<body>
	      <form action = "uploadfile.php" method = "POST" enctype = "multipart/form-data">
         <input type = "file" name = "image" />
         <input type = "submit"/>
					

   </form>
	
	
</body>
</html>