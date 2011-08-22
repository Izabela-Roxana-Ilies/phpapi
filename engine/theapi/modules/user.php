<?php
class user{
	private $facebook;
	private $user;
	private $DBLink;
	public function __construct(){
		global $facebook, $DBLink;
		$this->DBLink = $DBLink;
		$this->facebook = $facebook;
		$this->user = $this->facebook->getUser();
	}
	public function login($params=null){
			return array("action"=>"redirect","location"=>$this->facebook->getLoginUrl(
				array(
				"redirect_uri"=>APP_URL."API/user/login_callback"
				)
			));
	}
	public function login_callback($params=null){
		
		if($this->facebook->getUser()){
			
			$this->DBLink->query("SELECT * FROM `users` WHERE fb_id='{$this->user}'");
				
			if(!$this->DBLink->numberOfSelectedRows()){
				try{
					$user_profile = $this->facebook->api("/me");
					$this->DBLink->insert("users",array("fb_id"=>$this->user,"fb_name"=>$user_profile["first_name"]." ".$user_profile["last_name"],"fb_username"=>$user_profile["username"]));
				}catch(Exception $e){}
			}
			
			//$this->friends();
			
			return array("action"=>"redirect","location"=>APP_URL);
		}else{
			
			return array("action"=>"die","display"=>"Please allow WBM into your FB account");
		}
	
	}
	public function logout($params = null){
		
		return array("action"=>"redirect","location"=>$this->facebook->getLogoutUrl(array("next"=>APP_URL."API/user/logout_callback")));
	}
	public function logout_callback($params = null){
		$_SESSION = array();
		return array("action"=>"redirect","location"=>APP_URL);
	}
	public function friends($params = null){
		if(!$this->facebook->getUser()){
			return array();
		}
		try{
			$friends = $this->facebook->api("/me/friends");
			
			//foreach($friends["data"] as $friend){
				for($i =0; $i < count($friends["data"]); $i++){
					$friend = $friends["data"][$i];
					
				try{
					$this->DBLink->query("SELECT * FROM `friends` WHERE friend_id = '{$friend["id"]} AND fb_id = '{$this->user}'");
					
					if($this->DBLink->numberOfSelectedRows() == 0){
						$this->DBLink->insert("friends",array("fb_id"=>$this->user,"friend_id"=>$friend["id"],"friend_name"=>$friend["name"]));
						
					}
				}catch(Exception $ex){
					print_r($ex);
				}
			}
		}catch(Exception $e){}
		return $friends["data"];
	}
	public function ping($params = null){
		if(!$this->facebook->getUser()){
			return array("is_logged_in"=>0);
		}
		return array("is_logged_in"=>1);
	}
};
?>