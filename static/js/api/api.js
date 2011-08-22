var API = {};
API.config={
	modules_path: "/static/js/api/modules/"
};
API.call = function(module,method){
	var data = {};
	if(arguments.length > 2){data = arguments[2];}
	$.ajax({
		url: "API/"+module+"/"+method,
		type: "POST",
		data: JSON.stringify(data),
		success: API.handler,
		error: API.errorHandler
	});
}
API.errorHandler = function(){
	
}
API.handler = function(response){
	if(typeof(response) == "string"){
		response = JSON.parse(response);
	}
	try{
		if(!API.handlers[response.module]){
			var passedResponse = response;
			$.getScript(API.config.modules_path+response.module+".js", function() {
				try{
    	        API.handlers[passedResponse.module][passedResponse.method](passedResponse["return"]);
    	       }catch(e){}
	        });

		}else{
			API.handlers[response.module][response.method](response["return"]);
		}
		
	}catch(e){
		
	}
}
API.handlers = {}