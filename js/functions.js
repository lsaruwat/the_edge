window.addEventListener("load", start, false);

function start()
{
	area.addEventListener("click", setArea, false);
	company.addEventListener("click", setQueryVal, false);
}


function setQueryVal()
{
	var theId = company.value;
	var city = area.value;

	var xmlhttp;
		if (window.XMLHttpRequest)
		  {// code for IE7+, Firefox, Chrome, Opera, Safari
		  xmlhttp=new XMLHttpRequest();
		  }
		else
		  {// code for IE6, IE5
		  xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
		  }
		xmlhttp.onreadystatechange=function()
		  {
		  if (xmlhttp.readyState==4 && xmlhttp.status==200)
		    {
		   		var response_text = xmlhttp.responseText;
		   		document.getElementById("top-stats").innerHTML = response_text;
		    }
		}
		xmlhttp.open("POST","data.php",true);
		xmlhttp.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
		xmlhttp.send("theId="+theId+"&city="+city);
		
}

function setArea()
{
	var city = area.value;

	var xmlhttp;
		if (window.XMLHttpRequest)
		  {// code for IE7+, Firefox, Chrome, Opera, Safari
		  xmlhttp=new XMLHttpRequest();
		  }
		else
		  {// code for IE6, IE5
		  xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
		  }
		xmlhttp.onreadystatechange=function()
		  {
		  if (xmlhttp.readyState==4 && xmlhttp.status==200)
		    {
		   		var response_text = xmlhttp.responseText;
		   		company.innerHTML = response_text;
		    }
		}
		xmlhttp.open("POST","companies.php",true);
		xmlhttp.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
		xmlhttp.send("city="+city);
		getList(city);
		
}

function getList(city)
{
	console.log(city);

	var xmlhttp;
		if (window.XMLHttpRequest)
		  {// code for IE7+, Firefox, Chrome, Opera, Safari
		  xmlhttp=new XMLHttpRequest();
		  }
		else
		  {// code for IE6, IE5
		  xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
		  }
		xmlhttp.onreadystatechange=function()
		  {
		  if (xmlhttp.readyState==4 && xmlhttp.status==200)
		    {
		   		var response_text = xmlhttp.responseText;
		   		document.getElementById("bottom-left").innerHTML = response_text;
		    }
		}
		xmlhttp.open("POST","listRank.php",true);
		xmlhttp.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
		xmlhttp.send("city="+city);
		
}

