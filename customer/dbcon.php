<?php
// Enter your Host, username, password, database below.
$con = mysqli_connect("localhost","root","","fiver_clone");
if(!$con){
	die("Connection Error !!".mysqli_connect_error());
}
 ?>