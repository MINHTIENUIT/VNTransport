
// Ajax for signup
function TestUserSignup(str, str1, str2, str3) {
  var xhttp;
  if (str.length == 0) { 
    document.getElementById("SUemailError").innerHTML = "Vui lòng nhập Email";
  }
  else{
    document.getElementById("SUemailError").innerHTML = "";
  }
  if (str1.length == 0) { 
    document.getElementById("SUuserError").innerHTML = "Vui lòng nhập UserName";
  }else{
    document.getElementById("SUuserError").innerHTML = "";
  }
  if (str2.length == 0) { 
    document.getElementById("SUpassError").innerHTML = "Vui lòng nhập PassWord";
  }else{
    document.getElementById("SUpassError").innerHTML = "";
  }
  if (str3.length == 0) { 
    document.getElementById("SUrepassError").innerHTML = "Vui lòng nhập RePassWord";
  }
  else{
    document.getElementById("SUrepassError").innerHTML = "";
  }
  xhttp = new XMLHttpRequest();
  xhttp.onreadystatechange = function() {
    document.getElementById("txtHint2").innerHTML = this.readyState + " " + this.status;
    if (this.readyState == 4 && this.status == 200) {
      document.getElementById("txtHint1").innerHTML = this.responseText;
      switch(this.responseText){
      	case "error email username pass":
        	document.getElementById("SUemailError").innerHTML = "Email không hợp lệ";
        	document.getElementById("SUuserError").innerHTML = "UserName chỉ gồm chữ và khoảng trắng";
        	document.getElementById("SUpassError").innerHTML = "PassWord phải nhiều hơn 6 kí tự";
          break;
        case "error username pass":
        	document.getElementById("SUuserError").innerHTML = "UserName chỉ gồm chữ và khoảng trắng";
        	document.getElementById("SUpassError").innerHTML = "PassWord phải nhiều hơn 6 kí tự";
          break;
        case "error email pass":
        	document.getElementById("SUemailError").innerHTML = "Email không hợp lệ";
        	document.getElementById("SUpassError").innerHTML = "PassWord phải nhiều hơn 6 kí tự";
          break;
        case "error pass":
        	document.getElementById("SUpassError").innerHTML = "PassWord phải nhiều hơn 6 kí tự";
          break;
        case "error email username":
       		document.getElementById("SUemailError").innerHTML = "Email không hợp lệ";
        	document.getElementById("SUuserError").innerHTML = "UserName chỉ gồm chữ và khoảng trắng";
          break;
       	case "error username":
        	document.getElementById("SUuserError").innerHTML = "UserName chỉ gồm chữ và khoảng trắng";
          break;
       	case "error email":
       		document.getElementById("SUemailError").innerHTML = "Email không hợp lệ";
          break;
       	case "error email username repass":
       		document.getElementById("SUemailError").innerHTML = "Email không hợp lệ";
        	document.getElementById("SUuserError").innerHTML = "UserName chỉ gồm chữ và khoảng trắng";
        	document.getElementById("SUrepassError").innerHTML = "RePassWord không trùng khớp";
          break;
       	case "error username repass":
        	document.getElementById("SUuserError").innerHTML = "UserName chỉ gồm chữ và khoảng trắng";
        	document.getElementById("SUrepassError").innerHTML = "RePassWord không trùng khớp";
          break;
       	case "error email repass":
       		document.getElementById("SUemailError").innerHTML = "Email không hợp lệ";
        	document.getElementById("SUrepassError").innerHTML = "RePassWord không trùng khớp";
          break;
       	case "error repass":
        	document.getElementById("SUrepassError").innerHTML = "RePassWord không trùng khớp";
          break;
       	case "not error":
          window.location = 'SignUpSuccess.php';
       		break;
      }
    }
  };
  if (str.length != 0 && str1.length != 0 && str2.length != 0 && str3.length != 0) {
    xhttp.open("GET", "signup.php?email="+str+"&username="+str1+"&password="+str2+"&repassword="+str3, true);
    xhttp.send();  
  }
   
}