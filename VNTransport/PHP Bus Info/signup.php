<?php 
include 'connect.php';
$email = $_REQUEST["email"];
$username = $_REQUEST["username"];
$password = $_REQUEST["password"];
$repass = $_REQUEST["repassword"];


/*function test_input($data) {
	//remove whitespaces from both sides of a data
	$data = trim($data);
	//remove the backslash
	$data = stripslashes($data);
	//converts some predefined characters to HTML entities
	$data = htmlspecialchars($data);
	return $data;
}*/

function test_username($userN){
	//$userN = test_input($userN);
    // check if name only contains letters and whitespace
	if (!preg_match("/^[a-zA-Z ]*$/",$userN)) {
		return 0;
	}
	return 1;
}
	
function test_email($EM){
	//$EM = test_input($EM);
    // check if e-mail address is well-formed
	if (!filter_var($EM, FILTER_VALIDATE_EMAIL)) {
 	    return 0;
  	}
  	return 1;
}
    
function test_pass($PassW){
	if (strlen($PassW) < 6) {
  		return 0;
  	}
  	return 1;
}

function test_repass($ReP,$PassW){
	if ($ReP != $PassW) {
  		return 0;
  	}
  	return 1;
}  	

  	if (test_email($email)==0 && test_username($username)==0 && test_pass($password)==0) {
  		echo "error email username pass";
  	}
  	if (test_email($email)==1 && test_username($username)==0 && test_pass($password)==0) {
  		echo "error username pass";
  	}
  	if (test_email($email)==0 && test_username($username)==1 && test_pass($password)==0) {
  		echo "error email pass";
  	}
  	if (test_email($email)==1 && test_username($username)==1 && test_pass($password)==0) {
  		echo "error pass";
  	}
  	if (test_email($email)==0 && test_username($username)==0 && test_pass($password)==1) {
  		if (test_repass($repass,$password) == 0) {
  			echo "error email username repass";
  		}
  		else{
  			echo "error email username";
  		}
  		
  	}
  	if (test_email($email)==1 && test_username($username)==0 && test_pass($password)==1) {
  		if (test_repass($repass,$password) == 0) {
  			echo "error username repass";
  		}
  		else{
  			echo "error username";
  		}
  	}
  	if (test_email($email)==0 && test_username($username)==1 && test_pass($password)==1) {
  		if (test_repass($repass,$password) == 0) {
  			echo "error email repass";
  		}
  		else{
  			echo "error email";
  		}
  	}
  	if (test_email($email)==1 && test_username($username)==1 && test_pass($password)==1) {
  		if (test_repass($repass,$password) == 0) {
  			echo "error repass";
  		}
  		else{
  			mysqli_query($con, "INSERT INTO `login`(`Email`, `username`, `password`) VALUES ('$email', '$username', '$password')");
  			echo "not error";
  		}
  	}
?>