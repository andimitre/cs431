<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Wall_message extends CI_Model {

   	public function __construct() {
        parent::__construct();
   	}

   	public function send($messageData){
   		$this->connect();
   		$sender_id = $messageData['sender_id'];
   		$receiver_id = $messageData['receiver_id'];
   		$text = $messageData['message_text'];
   		$query = "INSERT INTO messages (sender_id, receiver_id, text) values('$sender_id', '$receiver_id', '$text');";
   		$result = mysql_query($query);
		if($result){
			return true;
		} else {
			return false;
		}
   	}

   	public function get_for_user($user_id){
   		$this->connect();
   		$query = "SELECT m.*, u.first_name, u.last_name
			FROM messages m
			JOIN user u ON m.sender_id = u.user_id
			where m.receiver_id = '$user_id'
			order by m.created_time desc";
   		$result = mysql_query($query);
   		
   		$messages = $this->mysql_fetch_all($result);
   		return $messages;
   	}

   	public function connect(){
		$ucid = 'am484';
		$password = 'vd0HngQMx';
		$hostname = 'sql2.njit.edu';
		$connect = mysql_connect($hostname , $ucid, $password);
		if (!$connect){
		    die('Unable to connect. Please try again! ' . mysql_error());
		}
		mysql_select_db($ucid);
	}

	private function mysql_fetch_all($result) {
		$response = array();
		while($row=mysql_fetch_assoc($result)) {	     
	       array_push($response, $row);
	   	}
	    return $response;
	}


}
