$(document).ready(function(){
	$("#add_operand").unbind("click").bind("click", function(){
		$("#operands_holder").append('<div><label>Operand:</label><input type="text" name="operand" value="0.0" rel="calculator_sum" api_type="array" /></div>');
	});
	$("[rel='api']").unbind("click").bind("click",function(){
		var name = $(this).attr("name");
		var params = {};
		$("[rel='"+name+"']").each(function(){
			switch($(this).attr("api_type")){
				case "array":
					if(!params[$(this).attr("name")]){
						params[$(this).attr("name")] = new Array();
					}
					params[$(this).attr("name")].push($(this).val());
				break;
				default:
					params[$(this).attr("name")] = $(this).val();
				break;
			}
		});
		var method = name.replace("_","/");
		Do.API({
			method: method,
			data: params,
			callback: API_Handlers[name]
		});
	});
});
API_Handlers = {
	calculator_sum: function(result){
		$("#calculator_sum_result").val(result.returned.sum);
	}
}
