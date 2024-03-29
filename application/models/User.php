<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class User extends CI_Model {

   	public function __construct() {
        parent::__construct();
        $this->load->library('encrypt');
   	}

   	public function get($user_id){
   		$this->connect();
		$query = "SELECT u.*, l.city as hometown_city, l.state_code as hometown_state, p.url,
			c.city as current_city, c.state_code as current_state
			FROM user u 
			left JOIN location l  on u.hometown_id = l.location_id 
			left JOIN location c  on u.current_location_id = c.location_id 
			left JOIN photos p on u.profile_photo_id = p.photo_id
			WHERE u.user_id = '$user_id'";

   		$result = mysql_query($query);
		$user = mysql_fetch_array($result, MYSQL_ASSOC);

		return $user;
   	}

	public function login($userData){
		$this->connect();
		$username = $userData['username'];
		$password =	$this->encrypt->sha1($userData['password']);	
		$query = "SELECT * FROM user where ucid = '$username' and password = '$password';";
		$result = mysql_query($query);
		$user = mysql_fetch_array($result, MYSQL_ASSOC);
		if($result){
			return $user;
		} else {
			return false;
		}
	}

	public function register($userData){
		$this->connect();
		$username = $userData['username'];
		$password =	$this->encrypt->sha1($userData['password']);
		$email = $userData['email'];
		$firstname = $userData['firstname'];
		$lastname = $userData['lastname'];
		$query = "INSERT INTO user (ucid,first_name,last_name, email, password) values('$username', '$firstname', '$lastname', '$email', '$password');";
		$result = mysql_query($query);
		if($result){
			return true;
		} else {
			return false;
		}
	}

	public function get_friends($user_id){
		$this->connect();
		$query = "SELECT u.* FROM friends f
			join user u ON f.friend_id = u.user_id
			where f.user_id = '$user_id'";

		$result = mysql_query($query);
   		$friends = $this->mysql_fetch_all($result);
   		
   		return $friends;
	}

	public function add_friend($user_id, $friend_id){
		$this->connect();
		$query = "INSERT into friends (user_id, friend_id) values('$user_id','$friend_id')";
		$result = mysql_query($query);
		if($result){
			return true;
		} else {
			return false;
		}
	}

	public function get_albums($user_id){
		$this->connect();
		$query = "SELECT p.* FROM album a
					JOIN photos p on a.album_id = p.album_id
					WHERE a.user_id = '$user_id'";

		$result = mysql_query($query);
   		$photos = $this->mysql_fetch_all($result);					
   		return $photos;

	}

	public function get_events($user_id){
		$this->connect();
		$query = "SELECT *
					FROM events 
					left outer JOIN user  on  events.user_id = user.user_id
					WHERE events.user_id = '$user_id'";

		$result = mysql_query($query);
   		$events = $this->mysql_fetch_all($result);					
   		return $events;

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
