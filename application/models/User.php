<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class User extends CI_Model {

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
		$password =	$userData['password'];		
		$query = "SELECT * FROM user where ucid = '$username' and password = '$password';";
		$result = mysql_query($query);
		$result = mysql_fetch_array($result, MYSQL_ASSOC);
		if($result){
			return true;
		} else {
			return false;
		}
	}

}
