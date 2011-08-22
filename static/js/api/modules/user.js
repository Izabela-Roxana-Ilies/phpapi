API.handlers["user"] = {
		"friends": function(answer){
			//alert(answer.toSource());
		},
		"ping": function(answer){
			if(answer.is_logged_in){
				
			}else{
				alert("You've beed logged out");
				window.location.href="/";
			}
		}
	}