var YES = true,NO = false,nil=null;
var SYSDOMAIN = ".phpapi.org";
var JS_SUBDOMAINS = new Array("www");
var Load = {};
var Do = {};
var UT = {};
UT.IsAttributeSupported = function(tagName, attrName) {
    var val = false;
    // Create element
    var input = document.createElement(tagName);
    // Check if attribute (attrName)
    // attribute exists
    if (attrName in input) {
        val = true;
    }
    // Delete "input" variable to
    // clear up its resources
    delete input;
    // Return detected value
    return val;
}
UT.setCaretPosition = function(elemId, caretPos) {
    var elem = document.getElementById(elemId);

    if(elem != null) {
        if(elem.createTextRange) {
            var range = elem.createTextRange();
            range.move('character', caretPos);
            range.select();
        }
        else {
            if(elem.selectionStart) {
                elem.focus();
                elem.setSelectionRange(caretPos, caretPos);
            }
            else
                elem.focus();
        }
    }
}
Do.API = function(options){
	$.ajax({
		url: "/api/"+options.method,
		type: "POST",
		data: options.data,
		success: options.callback
	});
}
Load.jsCallbacks = {};

Load.randomHash = function(){
	var chars = "0123456789ABCDEFGHIJKLMNOPQRSTUVWXTZ";
	var string_length = 21;
	if(arguments.length > 0){
		string_length = arguments[0];
	}
	if(arguments.length > 1){
		chars = arguments[1];
	}
	var randomstring = 'js';
	for (var i=0; i<string_length; i++) {
		var rnum = Math.floor(Math.random() * chars.length);
		randomstring += chars.substring(rnum,rnum+1);
	}
	return randomstring;
}
Load.jsA = function(options){
	try{
	var functionName = Load.randomHash();
	var script = document.createElement("script");
	script.setAttribute("id",functionName);
	if(JS_SUBDOMAINS.length == 0){
		options.url = options.url; // redundent
	}else{
		options.url = "http://"+JS_SUBDOMAINS[Math.floor(Math.random()*(JS_SUBDOMAINS.length-1))]+"."+SYSDOMAIN+options.url;
	}
	
	options.url += "?";
	if(options.data){
		for(var key in options.data){
			if(options.data[key] instanceof Array){
				for(var idx in options.data[key]){
					options.url += encodeURIComponent(key+"[]")+"="+encodeURIComponent(options.data[key][idx])+"&";
				}
			}else{
				options.url += encodeURIComponent(key)+"="+encodeURIComponent(options.data[key])+"&";
			}
		}
	}
	options.url += "callback=Load.jsCallbacks."+functionName+"&";
	script.src = options.url;
	Load.jsCallbacks[functionName] = options.callback;
	script.type = "text/javascript";
	document.getElementsByTagName("head")[0].appendChild(script);
	}catch(e){
		alert(e);
	}
}