<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Appointments extends CI_Controller {


	public function __construct()
	{
		parent::__construct();
		
		$this->load->model("appointment");
	}
	public function add()
	{
		$this->load->helper(array('form','url'));
		$this->load->library('form_validation');

		$this->form_validation->set_rules('date', 'Date', 'callback_date_check');

		if($this->form_validation->run() === FALSE)
		{
			$this->view_data['errors'] = validation_errors();

			$this->session->set_flashdata("apt_error",$this->view_data['errors']);
			redirect('/Appointments/show_tasks');
					      
		}
		else 
		{


		
		$data = array(
			'task' => $this->input->post('task'),
			'date' => $this->input->post('date'),
			'user_id' => $this->session->userdata('user_id'),
			'time' => $this->input->post('time')

			);
		$add_appt = $this->appointment->add_appointment($data);
		
		redirect('/Appointments/show_tasks');
		}

	}

	public function date_check()
	{
		date_default_timezone_set('America/Los_Angeles');
		$date = date('Y-m-d');
		if ($this->input->post('date') >= $date)
		{
			
			return TRUE;
		}

		else
		{
			$this->form_validation->set_message('date_check', 'The date must be a current or future date');
			return FALSE;
		}
	}
	
		
		
	public function show_tasks()
	{
		
		$view_data['apts'] = $this->appointment->get_all_appointments($this->session->userdata('user_id'));
		$this->load->view('appointment_view.php',$view_data);
	}


	public function edit()
	{
		$this->load->view('edit_view');
	}

	public function delete_apt()
	{
		
		$id=$this->input->post('id');
		$remove_apt = $this->appointment->remove_apt($id);
		redirect('/Appointments/show_tasks');

	}

	

	



}
