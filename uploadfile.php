<?php
   $upload_dir = "Uploads/";
   if(isset($_FILES['image'])){
      $errors= array();
      $file_name = $upload_dir.$_FILES['image']['name'];
      $file_size = $_FILES['image']['size'];
      $file_tmp = $_FILES['image']['tmp_name'];
      $file_type = $_FILES['image']['type'];
		  $file_ext=strtolower(end(explode('.',$_FILES['image']['name'])));
      
      $extensions= array("jpeg","jpg","png", "gif");
      
      if(in_array($file_ext,$extensions)=== false){
         $errors[]="extension not allowed, please choose a JPEG or PNG file.";
      }
      
      if($file_size > 2097152) {
         $errors[]='File size must be less then 2 MB';
      }
      
      if(empty($errors)==true) {
				$where = "images/".$file_name;
  move_uploaded_file($file_tmp,$file_name);       //move_uploaded_file($file_tmp,"Uploads/".$file_name);
         echo "Success moved to $file_tmp or $where";
      }else{
         print_r($errors);
      }
   }
?>