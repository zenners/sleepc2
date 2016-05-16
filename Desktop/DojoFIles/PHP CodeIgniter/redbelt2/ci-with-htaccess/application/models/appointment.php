<?php 
class appointment extends CI_Model {

	public function add_appointment($data)
 	{
         $query = "INSERT INTO appointments (task,users_id, date, time, created_at) VALUES (?,?,?,?,?)";
         $values = array($data['task'], $data['user_id'], $data['date'],$data['time'], date("Y-m-d")); 
         return $this->db->query($query, $values);
	}

	public function get_all_appointments($id)
	{
		return $this->db->query("SELECT * FROM appointments  WHERE users_id = ? ORDER BY date ASC", array($id))->result_array();
	}

	public function remove_apt($id)
	{
		// $this->db->empty_table('courses');
		$this->db->where('id',$id);
		$this->db->delete('appointments');
	}

	public function get_apt_by_id($id)
    {
         return $this->db->query("SELECT * FROM courses WHERE id = ?", array($id))->row_array();
    }

    public function edit_apt($id)
    {
    	return $this->db->query("UPDATE ");
    }
}