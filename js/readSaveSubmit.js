function readFile(evt) {
    var file = evt.target.files[0]; 

    if (file) {
        var result = new FileReader();
        result.onload = function(e) { $("#textInput").val(e.target.result); }
        result.readAsText(file);
    } 
    else alert("Failed to load file");
}


function saveFile() {
 var file     = $("#savedFileName").val();
 var filename = file != "" ? file +".txt" : "file.txt";
    var http     = new XMLHttpRequest();
    var data     = $("#textInput").val();
 var saving   = document.createElement('a');

 data         = data.replace(/(?:\r\n|\r|\n)/g, '\r\n');
 contentType  =  'data:application/octet-stream,';
 uriContent   = contentType + encodeURIComponent(data);
 saving.setAttribute('href', uriContent);
 saving.setAttribute('download', filename);

 document.body.appendChild(saving);
 saving.click();
 document.body.removeChild(saving);
}

function submitFormQuery() {
	$('#sendQuery').button('loading');
	var http = new XMLHttpRequest();

	http.open("POST", "http://localhost/Analytic/resultQuery.php", true);
	http.setRequestHeader("Content-type","application/x-www-form-urlencoded");
	var paramsQuery = "textInput=" + encodeURIComponent($("#textInput").val()) ; 
	http.send(paramsQuery);
	http.onload = function() {
	 	$("#result").html(http.responseText);
		$('#sendQuery').button('reset');
	}
}

function submitFormSearchTerm() {
	$('#sendSearchTerm').button('loading');
  	var http = new XMLHttpRequest();

  	http.open("POST", "http://localhost/Analytic/resultSearchTerm.php", true);
  	http.setRequestHeader("Content-type","application/x-www-form-urlencoded");
  	var params = "textInput=" + encodeURIComponent($("#textInput").val()) ;
  	http.send(params);
  	http.onload = function() {
    	$("#result").html(http.responseText);   
    	$('#sendSearchTerm').button('reset');
  	}
}

$(document).ready(function() {
	$("#textQuery").click(function (e) {
  		var id = e.target.id;
    		$("#Example p:first-child").html(id);
  	});

  	$("#textDimension").click(function (e) {
  		var id = e.target.id;
      	$("#Example p:first-child").html(id);
  	});
  
  	$("#textFilter").click(function (e) {
  		var id = e.target.id;
      	$("#Example p:first-child").html(id);
	});
  
  	$("#textOperator").click(function (e) {
  		var id = e.target.id;
      	$("#Example p:first-child").html(id);
  	});

  	$("#textSearch").click(function (e) {
    	var id = e.target.id;
      		$("#Example p:first-child").html(id);
  	});
  
  	$("#textAllPage").click(function (e) {
    	var id = e.target.id;
      		$("#Example p:first-child").html(id);
  	});
  	
  	$(function () {
    	$.scrollUp({
	  		scrollName: 'scrollUp', 
		  	scrollDistance: 300, 
		  	scrollFrom: 'top', 
		  	scrollSpeed: 300, 
		  	easingType: 'linear', 
		  	animation: 'fade', 
		  	animationSpeed: 200, 
		  	scrollTrigger: false, 
	      	scrollText: '<i class="fa fa-angle-up"></i>', 
		    scrollTitle: false, 
		    scrollImg: false, 
		    activeOverlay: false, 
	        zIndex: 2147483647
		});
	});
});
