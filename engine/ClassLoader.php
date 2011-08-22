<?php
class ClassAutoloader {
		private $paths;
		public function __construct($paths = array()) {
            $this->paths = $paths;
			$this->Init();
        }
		public function  AddPath($path){
			array_push($this->paths,$path);
		}
		private function Init(){
			spl_autoload_register(array($this, 'Loader'));
		}
		private function Loader($className){
			for($i = 0; $i < count($this->paths); $i++){
				if(file_exists($this->paths[$i] . $className . ".php") && !class_exists($className)){
					require_once($this->paths[$i] . $className . ".php");
				}
			}
		}
}
?>