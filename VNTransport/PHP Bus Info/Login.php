<?php
include 'connect.php';
// get the username and password parameter from URL
$UserName = $_REQUEST["UserName"];
$PassWord = $_REQUEST["PassWord"];
$result_user_name = mysqli_query($con,"SELECT * FROM `login` WHERE username = '$UserName';");
$user = mysqli_fetch_object($result_user_name);


if (mysqli_num_rows($result_user_name) <= 0) {
	echo "Sai tên đăng nhập vui lòng nhập lại";
}
if (mysqli_num_rows($result_user_name) > 0 && $PassWord != $user->password) {
    echo "Sai mập khẩu vui lòng nhập lại";
}
if (mysqli_num_rows($result_user_name) > 0 && $PassWord == $user->password) {
	setcookie("username", $UserName);
	echo "Đăng nhập thành công";
}
?>