<?php
class API{
    public static $ACCEPT_METHOD = "POST";
    public static $ACCEPT_ENCODING = "JSON";
    private $path;
    private $path_modules;
    private $parameters;
    private $response;
    private $callee;
    public function __construct($path, $parameters) {
        $this->path = $path;
        $this->path_modules = explode("/",$this->path);
		$this->parameters = new stdClass();
		try{
			$this->parameters = json_decode($parameters);
		}catch(Exception $e){
			try{
				$this->parameters = json_decode(json_encode($_POST));
			}catch(Exception $e){
				
			}
		}
        
    }
	public function checkRequest(){
    	if($this->path_modules[1] != API_INIT_STRING){
            header('HTTP/1.1 404 Not Found'); 
            die("File not found");
			$this->response["return"] = array(
				"header"=>"HTTP/1.1 404 Not Found",
				"action"=>"die",
				"display"=>"File not found"
			);
			
        }else{
            if(!class_exists($this->path_modules[2])){
                $this->response["return"] = array(
					"header"=>"HTTP/1.1 400 Bad Request",
					"action"=>"die",
					"display"=>"Bad request 1"
				);
            }
        }
        $this->callee = new $this->path_modules[2];
        if(!method_exists($this->callee, $this->path_modules[3])){
            $this->response["return"] = array(
					"header"=>"HTTP/1.1 400 Bad Request",
					"action"=>"die",
					"display"=>"Bad request 1"
				);
        }
        
		
        $this->response["module"] = $this->path_modules[2];
        $this->response["method"] = $this->path_modules[3];
        $this->response["params"] = $this->parameters;
        $this->response["return"] = $this->callMethod($this->path_modules[3]);
		
    }
    public function callMethod($method){
        return call_user_func(array($this->callee,$method), $this->parameters);
    }
    public function getResponse(){
        return $this->response;
    }
}
?>