<?php 
class user extends CI_Model {

	public function add_user($user)
 	{
         $query = "INSERT INTO Users (name, email, password, birthdate, created_at) VALUES (?,?,?,?,?)";
         $values = array($user['name'], $user['email'],$user['password'], $user['birthdate'], date("Y-m-d, H:i:s")); 
         return $this->db->query($query, $values);
	}

	public function get_user_by_email($email)
    { 
       return $this->db->query("SELECT * FROM users WHERE email = ?", array($email))->row_array();
    }
}