function TestUser(str,str1) {
  var xhttp;
  if (str.length == 0) { 
    document.getElementById("UserError").innerHTML = "Vui lòng nhập UserName";
  }
  else{
    document.getElementById("UserError").innerHTML = "";
  }
  if (str1.length == 0) { 
    document.getElementById("PassError").innerHTML = "Vui lòng nhập PassWord";
  }
  else{
    document.getElementById("PassError").innerHTML = "";
  }
  xhttp = new XMLHttpRequest();
  xhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
      document.getElementById("txtHint").innerHTML = this.responseText;
      if (this.responseText == 'Sai tên đăng nhập vui lòng nhập lại') {
        document.getElementById("PassError").innerHTML = '';
        document.getElementById("UserError").innerHTML = this.responseText;
      }
      if (this.responseText == 'Sai mập khẩu vui lòng nhập lại') {
        document.getElementById("UserError").innerHTML = '';
        document.getElementById("PassError").innerHTML = this.responseText;
      }
      else if (this.responseText == 'Đăng nhập thành công') {
        window.location = 'LoginSuccess.php';
      }
    }
  };
  if (str.length != 0 && str1.length != 0) {
      xhttp.open("GET", "login.php?UserName="+str+"&PassWord="+str1, true);
      xhttp.send();   
  }

}