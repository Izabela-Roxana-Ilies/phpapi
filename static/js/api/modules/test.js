API.handlers.test = {
	"hello": function(answer){
		$("#api_answers").append("<li>"+"answer: " + answer + ""+"</li>");
	},
	"math": function(answer){
		$("#math_result").html(answer);
	}
}
