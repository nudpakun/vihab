<?php
defined('BASEPATH') OR exit('No direct script access allowed');


/**
*| --------------------------------------------------------------------------
*| Form Workout Log Controller
*| --------------------------------------------------------------------------
*| Form Workout Log site
*|
*/
class Form_workout_log extends Admin	
{
	
	public function __construct()
	{
		parent::__construct();

		$this->load->model('model_form_workout_log');
		$this->lang->load('web_lang', $this->current_lang);
	}

	/**
	* show all Form Workout Logs
	*
	* @var $offset String
	*/
	public function index($offset = 0)
	{
		$this->is_allowed('form_workout_log_list');

		$filter = $this->input->get('q');
		$field 	= $this->input->get('f');

		$this->data['form_workout_logs'] = $this->model_form_workout_log->get($filter, $field, $this->limit_page, $offset);
		$this->data['form_workout_log_counts'] = $this->model_form_workout_log->count_all($filter, $field);

		$config = [
			'base_url'     => 'administrator/form_workout_log/index/',
			'total_rows'   => $this->data['form_workout_log_counts'],
			'per_page'     => $this->limit_page,
			'uri_segment'  => 4,
		];

		$this->data['pagination'] = $this->pagination($config);

		$this->template->title('Form Workout Log List');
		$this->render('backend/standart/administrator/form_workout_log/form_workout_log_list', $this->data);
	}
	
	/**
	* Add new form_workout_logs
	*
	*/
	public function add()
	{
		$this->is_allowed('form_workout_log_add');

		$this->template->title('Form Workout Log New');
		$this->render('backend/standart/administrator/form_workout_log/form_workout_log_add', $this->data);
	}

	/**
	* Add New Form Workout Logs
	*
	* @return JSON
	*/
	public function add_save()
	{
		if (!$this->is_allowed('form_workout_log_add', false)) {
			echo json_encode([
				'success' => false,
				'message' => cclang('sorry_you_do_not_have_permission_to_access')
				]);
			exit;
		}

		$this->form_validation->set_rules('workout_id', 'Workout Id', 'trim|required|max_length[11]');
		$this->form_validation->set_rules('patient_id', 'Patient Id', 'trim|required|max_length[11]');
		$this->form_validation->set_rules('average_accuracy', 'Average Accuracy', 'trim|required|max_length[10]');
		$this->form_validation->set_rules('average_time', 'Average Time', 'trim|required|max_length[50]');
		$this->form_validation->set_rules('average_pain_score', 'Average Pain Score', 'trim|required|max_length[10]');
		$this->form_validation->set_rules('pain_face', 'Pain Face', 'trim|required|max_length[10]');
		$this->form_validation->set_rules('pain_motion', 'Pain Motion', 'trim|required|max_length[10]');
		$this->form_validation->set_rules('pain_scream', 'Pain Scream', 'trim|required|max_length[10]');
		$this->form_validation->set_rules('pain_restless', 'Pain Restless', 'trim|required|max_length[10]');
		

		if ($this->form_validation->run()) {
		
			$save_data = [
				'workout_id' => $this->input->post('workout_id'),
				'patient_id' => $this->input->post('patient_id'),
				'average_accuracy' => $this->input->post('average_accuracy'),
				'average_time' => $this->input->post('average_time'),
				'average_pain_score' => $this->input->post('average_pain_score'),
				'pain_face' => $this->input->post('pain_face'),
				'pain_motion' => $this->input->post('pain_motion'),
				'pain_scream' => $this->input->post('pain_scream'),
				'pain_restless' => $this->input->post('pain_restless'),
				'created_at' => date('Y-m-d H:i:s'),
			];

			
			$save_form_workout_log = $this->model_form_workout_log->store($save_data);
            

			if ($save_form_workout_log) {
				if ($this->input->post('save_type') == 'stay') {
					$this->data['success'] = true;
					$this->data['id'] 	   = $save_form_workout_log;
					$this->data['message'] = cclang('success_save_data_stay', [
						anchor('administrator/form_workout_log/edit/' . $save_form_workout_log, 'Edit Form Workout Log'),
						anchor('administrator/form_workout_log', ' Go back to list')
					]);
				} else {
					set_message(
						cclang('success_save_data_redirect', [
						anchor('administrator/form_workout_log/edit/' . $save_form_workout_log, 'Edit Form Workout Log')
					]), 'success');

            		$this->data['success'] = true;
					$this->data['redirect'] = base_url('administrator/form_workout_log');
				}
			} else {
				if ($this->input->post('save_type') == 'stay') {
					$this->data['success'] = false;
					$this->data['message'] = cclang('data_not_change');
				} else {
            		$this->data['success'] = false;
            		$this->data['message'] = cclang('data_not_change');
					$this->data['redirect'] = base_url('administrator/form_workout_log');
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
	* Update view Form Workout Logs
	*
	* @var $id String
	*/
	public function edit($id)
	{
		$this->is_allowed('form_workout_log_update');

		$this->data['form_workout_log'] = $this->model_form_workout_log->find($id);

		$this->template->title('Form Workout Log Update');
		$this->render('backend/standart/administrator/form_workout_log/form_workout_log_update', $this->data);
	}

	/**
	* Update Form Workout Logs
	*
	* @var $id String
	*/
	public function edit_save($id)
	{
		if (!$this->is_allowed('form_workout_log_update', false)) {
			echo json_encode([
				'success' => false,
				'message' => cclang('sorry_you_do_not_have_permission_to_access')
				]);
			exit;
		}
		
		$this->form_validation->set_rules('workout_id', 'Workout Id', 'trim|required|max_length[11]');
		$this->form_validation->set_rules('patient_id', 'Patient Id', 'trim|required|max_length[11]');
		$this->form_validation->set_rules('average_accuracy', 'Average Accuracy', 'trim|required|max_length[10]');
		$this->form_validation->set_rules('average_time', 'Average Time', 'trim|required|max_length[50]');
		$this->form_validation->set_rules('average_pain_score', 'Average Pain Score', 'trim|required|max_length[10]');
		$this->form_validation->set_rules('pain_face', 'Pain Face', 'trim|required|max_length[10]');
		$this->form_validation->set_rules('pain_motion', 'Pain Motion', 'trim|required|max_length[10]');
		$this->form_validation->set_rules('pain_scream', 'Pain Scream', 'trim|required|max_length[10]');
		$this->form_validation->set_rules('pain_restless', 'Pain Restless', 'trim|required|max_length[10]');
		
		if ($this->form_validation->run()) {
		
			$save_data = [
				'workout_id' => $this->input->post('workout_id'),
				'patient_id' => $this->input->post('patient_id'),
				'average_accuracy' => $this->input->post('average_accuracy'),
				'average_time' => $this->input->post('average_time'),
				'average_pain_score' => $this->input->post('average_pain_score'),
				'pain_face' => $this->input->post('pain_face'),
				'pain_motion' => $this->input->post('pain_motion'),
				'pain_scream' => $this->input->post('pain_scream'),
				'pain_restless' => $this->input->post('pain_restless'),
				'created_at' => date('Y-m-d H:i:s'),
			];

			
			$save_form_workout_log = $this->model_form_workout_log->change($id, $save_data);

			if ($save_form_workout_log) {
				if ($this->input->post('save_type') == 'stay') {
					$this->data['success'] = true;
					$this->data['id'] 	   = $id;
					$this->data['message'] = cclang('success_update_data_stay', [
						anchor('administrator/form_workout_log', ' Go back to list')
					]);
				} else {
					set_message(
						cclang('success_update_data_redirect', [
					]), 'success');

            		$this->data['success'] = true;
					$this->data['redirect'] = base_url('administrator/form_workout_log');
				}
			} else {
				if ($this->input->post('save_type') == 'stay') {
					$this->data['success'] = false;
					$this->data['message'] = cclang('data_not_change');
				} else {
            		$this->data['success'] = false;
            		$this->data['message'] = cclang('data_not_change');
					$this->data['redirect'] = base_url('administrator/form_workout_log');
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
	* delete Form Workout Logs
	*
	* @var $id String
	*/
	public function delete($id = null)
	{
		$this->is_allowed('form_workout_log_delete');

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
            set_message(cclang('has_been_deleted', 'form_workout_log'), 'success');
        } else {
            set_message(cclang('error_delete', 'form_workout_log'), 'error');
        }

		redirect_back();
	}

		/**
	* View view Form Workout Logs
	*
	* @var $id String
	*/
	public function view($id)
	{
		$this->is_allowed('form_workout_log_view');

		$this->data['form_workout_log'] = $this->model_form_workout_log->join_avaiable()->filter_avaiable()->find($id);

		$this->template->title('Form Workout Log Detail');
		$this->render('backend/standart/administrator/form_workout_log/form_workout_log_view', $this->data);
	}
	
	/**
	* delete Form Workout Logs
	*
	* @var $id String
	*/
	private function _remove($id)
	{
		$form_workout_log = $this->model_form_workout_log->find($id);

		
		
		return $this->model_form_workout_log->remove($id);
	}
	
	
	/**
	* Export to excel
	*
	* @return Files Excel .xls
	*/
	public function export()
	{
		$this->is_allowed('form_workout_log_export');

		$this->model_form_workout_log->export(
			'form_workout_log', 
			'form_workout_log',
			$this->model_form_workout_log->field_search
		);
	}

	/**
	* Export to PDF
	*
	* @return Files PDF .pdf
	*/
	public function export_pdf()
	{
		$this->is_allowed('form_workout_log_export');

		$this->model_form_workout_log->pdf('form_workout_log', 'form_workout_log');
	}


	public function single_pdf($id = null)
	{
		$this->is_allowed('form_workout_log_export');

		$table = $title = 'form_workout_log';
		$this->load->library('HtmlPdf');
      
        $config = array(
            'orientation' => 'p',
            'format' => 'a4',
            'marges' => array(5, 5, 5, 5)
        );

        $this->pdf = new HtmlPdf($config);
        $this->pdf->setDefaultFont('stsongstdlight'); 

        $result = $this->db->get($table);
       
        $data = $this->model_form_workout_log->find($id);
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


/* End of file form_workout_log.php */
/* Location: ./application/controllers/administrator/Form Workout Log.php */