
function SearchBus(str) {
	var xhttp;
	if (str.length == 0) { 
    	document.getElementById("SearchError").innerHTML = "Vui lòng nhập vô";
  	}
	xhttp = new XMLHttpRequest();
  	xhttp.onreadystatechange = function() {
  		if (this.readyState == 4 && this.status == 200) {
  			document.getElementById("txtHint3").innerHTML = this.responseText;
  			document.getElementById("txtHint4").innerHTML = this.readyState + " " + this.status;
  			if (this.responseText == 'Không có nhà xe') {
  				document.getElementById("SearchError").innerHTML = this.responseText;
          document.getElementById("Bus_Name").innerHTML = "";
          document.getElementById("Ownwe_Name").innerHTML = "";
          document.getElementById("Bus_Email").innerHTML = "";
          document.getElementById("Bus_Service").innerHTML = "";
          document.getElementById("Bus_Info").innerHTML = "";
  			} else {
          var string = this.responseText;
          var Owner_Name = string.search("OwnerName:");
          var Bus_Email = string.search("Email:");
          var Bus_Service = string.search("Service:");
          var Bus_Info = string.search("Info:");
          document.getElementById("Bus_Name").innerHTML = string.substring(0, Owner_Name);
          document.getElementById("Ownwe_Name").innerHTML = string.substring(Owner_Name, Bus_Email);
          document.getElementById("Bus_Email").innerHTML = string.substring(Bus_Email, Bus_Service);
          document.getElementById("Bus_Service").innerHTML = string.substring(Bus_Service, Bus_Info);
          document.getElementById("Bus_Info").innerHTML = string.substring(Bus_Info);
        }
  		}
  	};

  	if (str.length != 0) {
      xhttp.open("GET", "FindBusInfo.php?BusName="+str, true);
      xhttp.send();   
  }
}