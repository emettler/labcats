<?php
    $mysqli = new mysqli("localhost", "labcatsc_apps", "M1$$edC0nnection", "labcatsc_apps");
    $result = $mysqli->query("SELECT * from users");
	var_dump($result);
?>
