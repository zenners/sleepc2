<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Users extends CI_Controller {

	public function index()
	{
		$this->load->view('welcome_message');
	}

	public function register()
	{
	
		$this->load->helper(array('form','url'));
		$this->load->library('form_validation');

		$this->form_validation->set_rules('name', 'Name', 'required|trim');
		$this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email|xss_clean|is_unique[users.email]');
		$this->form_validation->set_rules('password', 'Password', 'trim|required|min_length[8]|matches[confirm_password]');
		$this->form_validation->set_rules('confirm_password', 'Password Confirmation', 'trim|required');
		$this->form_validation->set_rules('birthdate', 'Date of Birth', 'trim|required');
		
		if($this->form_validation->run() === FALSE)
		{
			$this->view_data['errors'] = validation_errors();

			$this->session->set_flashdata("registration_error",$this->view_data['errors']);
			redirect('/');
					      
		}
		else
		{
			$this->load->model('user');
			$user = array(
				'name' => $this->input->post('name'),
				'email' => $this->input->post('email'),
				'password' => $this->input->post('password'),
				'birthdate' => $this->input->post('birthdate')
				);
			$add_user = $this->user->add_user($user);
			$this->view_data['success'] = "You are registered, please log in";
			$this->session->set_flashdata("added_user", $this->view_data['success']);

			redirect('/');


		}
	}

	public function login()
    {
    	$this->load->model('user');

        $email = $this->input->post('email');
        $password = ($this->input->post('password'));
		$user = $this->user->get_user_by_email($email);

        if($user && $user['password'] == $password)
        {
            $user = array(
               'user_id' => $user['id'],
               'user_email' => $user['email'],
               'user_name' => $user['name'],
               'is_logged_in' => true
            );
            $this->session->set_userdata($user);
            
            redirect('/Appointments/show_tasks');

        }
        else
        {
            $this->session->set_flashdata("login_error", "Invalid email or password!");
            redirect('/');
        }
    }



	public function logout()
    {
    	$this->session->sess_destroy();
		redirect('/Users/index');
    }
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */