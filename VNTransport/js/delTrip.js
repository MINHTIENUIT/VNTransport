
function delTrip(str,str1) {
	var xhttp;
	if (str.length == 0) { 
    	document.getElementById("TripBusError").innerHTML = "Vui lòng nhập tên nhà xe muốn xóa";
  	}
  if (str1.length == 0) { 
      document.getElementById("TripError").innerHTML = "Vui lòng nhập chuyến đi muốn xóa";
    }
	xhttp = new XMLHttpRequest();
  	xhttp.onreadystatechange = function() {
  		if (this.readyState == 4 && this.status == 200) {
        document.getElementById("NoTrip").innerHTML = this.responseText;
        if (this.responseText == 'Không Tìm được chuyến đi vui lòng kiểm tra lại') {
          document.getElementById("NoTrip").innerHTML = this.responseText;
  		  }else {
          document.getElementById("NoTrip").innerHTML = this.responseText;
        }
  	};

  	if (str.length != 0 && str1.length != 0) {
      xhttp.open("GET", "delTrip.php?BusName="+str+"Trip="+str1, true);
      xhttp.send();   
  }
}