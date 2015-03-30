$(document).ready(function(){

	function getUrlParameter(sParam){
	    var sPageURL = window.location.search.substring(1);
	    var sURLVariables = sPageURL.split('&');
	    for (var i = 0; i < sURLVariables.length; i++) {
	        var sParameterName = sURLVariables[i].split('=');
	        if (sParameterName[0] == sParam) {
	            return sParameterName[1];
	        }
	    }
	}

	var schoolNum = getUrlParameter('school');

	if(schoolNum){
		$.ajax({
			method: "POST",
			url: "collegeInfo.php",
			data: {school: schoolNum}
		})
		.done(function(schoolInfo){
			var test = jQuery.parseJSON(schoolInfo);
			console.log(schoolInfo)
			console.log(test);

			for(var i = 0;  i<test.length; i++){
				$("#mytable").append("<tr><td style='border:1px solid black;'>"+test[i][0]+"</td><td style='border:1px solid black;'>"+test[i][1]+"</td></tr>");
			}
		})
	}

});