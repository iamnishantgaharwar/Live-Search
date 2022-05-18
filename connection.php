<?php
$con = mysqli_connect('localhost','root','');
mysqli_select_db($con,'booksnearme');

if(!$con)
{
	echo '<script>alert("Internal Error")</script>';
}
?>