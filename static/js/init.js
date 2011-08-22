google.load("jquery", "1.6.2");
google.load("jqueryui", "1.8.8");
var BOOT = {};
BOOT.init = function(){
	$("[rel='api_call']").unbind("click").bind("click", function(event){
		var href_split = $(this).attr("href").split("/");
		API.call(href_split[2],href_split[3]);
		event.preventDefault();
		return false;
	});
	$("[rel='api_call_math']").unbind("click").bind("click", function(event){
		var params = {
			operand1: $("[name=operand1]").val(),
			operand2: $("[name=operand2]").val(),
			operator: $("[name=operator]").val()
		};
		API.call("test", "math", params);
		event.preventDefault();
		return false;
	});
};

google.setOnLoadCallback(function() {

BOOT.init();	
	
});