<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class User extends CI_Model {

	   public function __construct() {
            parent::__construct();
            $this->load->library('encrypt');
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

}
