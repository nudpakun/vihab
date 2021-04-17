<?php
defined('BASEPATH') OR exit('No direct script access allowed');


/**
*| --------------------------------------------------------------------------
*| Form Workout Controller
*| --------------------------------------------------------------------------
*| Form Workout site
*|
*/
class Form_workout extends Admin	
{
	
	public function __construct()
	{
		parent::__construct();

		$this->load->model('model_form_workout');
		$this->lang->load('web_lang', $this->current_lang);
	}

	/**
	* show all Form Workouts
	*
	* @var $offset String
	*/
	public function index($offset = 0)
	{
		$this->is_allowed('form_workout_list');

		$filter = $this->input->get('q');
		$field 	= $this->input->get('f');

		$this->data['form_workouts'] = $this->model_form_workout->get($filter, $field, $this->limit_page, $offset);
		$this->data['form_workout_counts'] = $this->model_form_workout->count_all($filter, $field);

		$config = [
			'base_url'     => 'administrator/form_workout/index/',
			'total_rows'   => $this->data['form_workout_counts'],
			'per_page'     => $this->limit_page,
			'uri_segment'  => 4,
		];

		$this->data['pagination'] = $this->pagination($config);

		$this->template->title('Form Workout List');
		$this->render('backend/standart/administrator/form_workout/form_workout_list', $this->data);
	}
	
	/**
	* Add new form_workouts
	*
	*/
	public function add()
	{
		$this->is_allowed('form_workout_add');

		$this->template->title('Form Workout New');
		$this->render('backend/standart/administrator/form_workout/form_workout_add', $this->data);
	}

	/**
	* Add New Form Workouts
	*
	* @return JSON
	*/
	public function add_save()
	{
		if (!$this->is_allowed('form_workout_add', false)) {
			echo json_encode([
				'success' => false,
				'message' => cclang('sorry_you_do_not_have_permission_to_access')
				]);
			exit;
		}

		// $this->form_validation->set_rules('trainer_id', 'Trainer Id', 'trim|required|max_length[225]');
		$this->form_validation->set_rules('name', 'Name', 'trim|required|max_length[225]');
		$this->form_validation->set_rules('description', 'Description', 'trim|required');
		$this->form_validation->set_rules('method', 'Method', 'trim|required');
		// $this->form_validation->set_rules('total_step', 'Total Step', 'trim|required|max_length[11]');
		$this->form_validation->set_rules('total_second', 'Total Second', 'trim|required|max_length[11]');
		// $this->form_validation->set_rules('tracking_point', 'Tracking Point', 'trim|required|max_length[512]');
		$this->form_validation->set_rules('total_count', 'Total Count', 'trim|required');
		

		if ($this->form_validation->run()) {
		
			$save_data = [
				// 'trainer_id' => $this->input->post('trainer_id'),
				'name' => $this->input->post('name'),
				'description' => $this->input->post('description'),
				'method' => $this->input->post('method'),
				// 'total_step' => $this->input->post('total_step'),
				'total_second' => $this->input->post('total_second'),
				// 'tracking_point' => $this->input->post('tracking_point'),
				// 'created_at' => date('Y-m-d H:i:s'),
				'total_count' => $this->input->post('total_count'),
			];

			
			$save_form_workout = $this->model_form_workout->store($save_data);
            

			if ($save_form_workout) {
				if ($this->input->post('save_type') == 'stay') {
					$this->data['success'] = true;
					$this->data['id'] 	   = $save_form_workout;
					$this->data['message'] = cclang('success_save_data_stay', [
						anchor('administrator/form_workout/edit/' . $save_form_workout, 'Edit Form Workout'),
						anchor('administrator/form_workout', ' Go back to list')
					]);
				} else {
					set_message(
						cclang('success_save_data_redirect', [
						anchor('administrator/form_workout/edit/' . $save_form_workout, 'Edit Form Workout')
					]), 'success');

            		$this->data['success'] = true;
					$this->data['redirect'] = base_url('administrator/form_workout');
				}
			} else {
				if ($this->input->post('save_type') == 'stay') {
					$this->data['success'] = false;
					$this->data['message'] = cclang('data_not_change');
				} else {
            		$this->data['success'] = false;
            		$this->data['message'] = cclang('data_not_change');
					$this->data['redirect'] = base_url('administrator/form_workout');
				}
			}

		} else {
			$this->data['success'] = false;
			$this->data['message'] = 'Opss validation failed';
			$this->data['errors'] = $this->form_validation->error_array();
		}

		echo json_encode($this->data);
	}
	
		/**
	* Update view Form Workouts
	*
	* @var $id String
	*/
	public function edit($id)
	{
		$this->is_allowed('form_workout_update');

		$this->data['form_workout'] = $this->model_form_workout->find($id);

		$this->template->title('Form Workout Update');
		$this->render('backend/standart/administrator/form_workout/form_workout_update', $this->data);
	}

	/**
	* Update Form Workouts
	*
	* @var $id String
	*/
	public function edit_save($id)
	{
		if (!$this->is_allowed('form_workout_update', false)) {
			echo json_encode([
				'success' => false,
				'message' => cclang('sorry_you_do_not_have_permission_to_access')
				]);
			exit;
		}
		
		// $this->form_validation->set_rules('trainer_id', 'Trainer Id', 'trim|required|max_length[225]');
		$this->form_validation->set_rules('name', 'Name', 'trim|required|max_length[225]');
		$this->form_validation->set_rules('description', 'Description', 'trim|required');
		$this->form_validation->set_rules('method', 'Method', 'trim|required');
		// $this->form_validation->set_rules('total_step', 'Total Step', 'trim|required|max_length[11]');
		$this->form_validation->set_rules('total_second', 'Total Second', 'trim|required|max_length[11]');
		// $this->form_validation->set_rules('tracking_point', 'Tracking Point', 'trim|required|max_length[512]');
		$this->form_validation->set_rules('total_count', 'Total Count', 'trim|required');
		
		if ($this->form_validation->run()) {
		
			$save_data = [
				// 'trainer_id' => $this->input->post('trainer_id'),
				'name' => $this->input->post('name'),
				'description' => $this->input->post('description'),
				'method' => $this->input->post('method'),
				// 'total_step' => $this->input->post('total_step'),
				'total_second' => $this->input->post('total_second'),
				// 'tracking_point' => $this->input->post('tracking_point'),
				// 'created_at' => date('Y-m-d H:i:s'),
				'total_count' => $this->input->post('total_count'),
			];

			
			$save_form_workout = $this->model_form_workout->change($id, $save_data);

			if ($save_form_workout) {
				if ($this->input->post('save_type') == 'stay') {
					$this->data['success'] = true;
					$this->data['id'] 	   = $id;
					$this->data['message'] = cclang('success_update_data_stay', [
						anchor('administrator/form_workout', ' Go back to list')
					]);
				} else {
					set_message(
						cclang('success_update_data_redirect', [
					]), 'success');

            		$this->data['success'] = true;
					$this->data['redirect'] = base_url('administrator/form_workout');
				}
			} else {
				if ($this->input->post('save_type') == 'stay') {
					$this->data['success'] = false;
					$this->data['message'] = cclang('data_not_change');
				} else {
            		$this->data['success'] = false;
            		$this->data['message'] = cclang('data_not_change');
					$this->data['redirect'] = base_url('administrator/form_workout');
				}
			}
		} else {
			$this->data['success'] = false;
			$this->data['message'] = 'Opss validation failed';
			$this->data['errors'] = $this->form_validation->error_array();
		}

		echo json_encode($this->data);
	}
	
	/**
	* delete Form Workouts
	*
	* @var $id String
	*/
	public function delete($id = null)
	{
		$this->is_allowed('form_workout_delete');

		$this->load->helper('file');

		$arr_id = $this->input->get('id');
		$remove = false;

		if (!empty($id)) {
			$remove = $this->_remove($id);
		} elseif (count($arr_id) >0) {
			foreach ($arr_id as $id) {
				$remove = $this->_remove($id);
			}
		}

		if ($remove) {
            set_message(cclang('has_been_deleted', 'form_workout'), 'success');
        } else {
            set_message(cclang('error_delete', 'form_workout'), 'error');
        }

		redirect_back();
	}

		/**
	* View view Form Workouts
	*
	* @var $id String
	*/
	public function view($id)
	{
		$this->is_allowed('form_workout_view');

		$this->data['form_workout'] = $this->model_form_workout->join_avaiable()->filter_avaiable()->find($id);

		$this->template->title('Form Workout Detail');
		$this->render('backend/standart/administrator/form_workout/form_workout_view', $this->data);
	}
	
	/**
	* delete Form Workouts
	*
	* @var $id String
	*/
	private function _remove($id)
	{
		$form_workout = $this->model_form_workout->find($id);

		
		
		return $this->model_form_workout->remove($id);
	}
	
	
	/**
	* Export to excel
	*
	* @return Files Excel .xls
	*/
	public function export()
	{
		$this->is_allowed('form_workout_export');

		$this->model_form_workout->export(
			'form_workout', 
			'form_workout',
			$this->model_form_workout->field_search
		);
	}

	/**
	* Export to PDF
	*
	* @return Files PDF .pdf
	*/
	public function export_pdf()
	{
		$this->is_allowed('form_workout_export');

		$this->model_form_workout->pdf('form_workout', 'form_workout');
	}


	public function single_pdf($id = null)
	{
		$this->is_allowed('form_workout_export');

		$table = $title = 'form_workout';
		$this->load->library('HtmlPdf');
      
        $config = array(
            'orientation' => 'p',
            'format' => 'a4',
            'marges' => array(5, 5, 5, 5)
        );

        $this->pdf = new HtmlPdf($config);
        $this->pdf->setDefaultFont('stsongstdlight'); 

        $result = $this->db->get($table);
       
        $data = $this->model_form_workout->find($id);
        $fields = $result->list_fields();

        $content = $this->pdf->loadHtmlPdf('core_template/pdf/pdf_single', [
            'data' => $data,
            'fields' => $fields,
            'title' => $title
        ], TRUE);

        $this->pdf->initialize($config);
        $this->pdf->pdf->SetDisplayMode('fullpage');
        $this->pdf->writeHTML($content);
        $this->pdf->Output($table.'.pdf', 'H');
	}

	
}


/* End of file form_workout.php */
/* Location: ./application/controllers/administrator/Form Workout.php */