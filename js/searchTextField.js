function searchTextField(str){
	if(str.length == 0){
		document.getElementById("searchOutput").innerHTML = "";
		document.getElementById("searchOutput").style.border = "0px";
    return;
	} else{  
		var xmlhttp = new XMLHttpRequest();
		xmlhttp.onreadystatechange=function(){
			if(this.readyState==4 && this.status==200){
                document.getElementById("searchOutput").innerHTML = this.responseText;
				document.getElementById("searchOutput").style.border =	"1px solid white"; 
			    document.getElementById("searchOutput").style.backgroundColor = "white";
				document.getElementById("searchOutput").style.color = "red";
			    document.getElementById("searchOutput").style.zIndex = "2";	
			}
		}
		xmlhttp.open("GET", "../php/searchField.php?q="+str, true);
		xmlhttp.send();		
	}
}
