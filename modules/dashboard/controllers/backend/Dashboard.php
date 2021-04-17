<?php
defined('BASEPATH') OR exit('No direct script access allowed');


/**
*| --------------------------------------------------------------------------
*| Dashboard Controller
*| --------------------------------------------------------------------------
*| For see your board
*|
*/
class Dashboard extends Admin	
{
	
	public function __construct()
	{
		parent::__construct();
        
        $this->load->model('model_form_workout_log');
        $this->load->model('model_form_user');
        $this->load->model('model_form_workout');
	}

	public function index()
	{
		if (!$this->aauth->is_allowed('dashboard')) {
			redirect('/', 'refresh');
		}
		$data = [];

        // Workout
        $this->data['form_workouts'] = $this->model_form_workout->get(null, null, 0, 0);
        $this->data['form_workout_counts'] = $this->model_form_workout->count_all(null, null);

        // Workout Log
        $this->data['form_workout_logs'] = $this->model_form_workout_log->get(null, null, 0, 0);
		$this->data['form_workout_log_counts'] = $this->model_form_workout_log->count_all(null, null);

        // Patient User
        $this->data['form_users'] = $this->model_form_user->get('PATIENT', 'role', 0, 0);
		$this->data['form_user_counts'] = $this->model_form_user->count_all('PATIENT', 'role');

		$this->render('backend/standart/dashboard',  $this->data);
	}

	public function chart()
	{
		if (!$this->aauth->is_allowed('dashboard')) {
			redirect('/','refresh');
		}

		$data = [];
		$this->render('backend/standart/chart', $data);
	}
}

/* End of file Dashboard.php */
/* Location: ./application/controllers/administrator/Dashboard.php */