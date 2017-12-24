var delete_cookie = function(name) {
    document.cookie = name + '=;expires=Thu, 01 Jan 1970 00:00:01 GMT;';
};

function logoutFuntion(){
	delete_cookie('username');
    window.location='Bus Information.php';
};

document.getElementById("logout").onclick = function(){logoutFuntion()};