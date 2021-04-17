<?php
defined('BASEPATH') OR exit('No direct script access allowed');


/**
*| --------------------------------------------------------------------------
*| Form Workout Log List Controller
*| --------------------------------------------------------------------------
*| Form Workout Log List site
*|
*/
class Form_workout_log_list extends Admin	
{
	
	public function __construct()
	{
		parent::__construct();

		$this->load->model('model_form_workout_log_list');
		$this->lang->load('web_lang', $this->current_lang);
	}

	/**
	* show all Form Workout Log Lists
	*
	* @var $offset String
	*/
	public function index($offset = 0)
	{
		$this->is_allowed('form_workout_log_list_list');

		$filter = $this->input->get('q');
		$field 	= $this->input->get('f');

		$this->data['form_workout_log_lists'] = $this->model_form_workout_log_list->get($filter, $field, $this->limit_page, $offset);
		$this->data['form_workout_log_list_counts'] = $this->model_form_workout_log_list->count_all($filter, $field);

		$config = [
			'base_url'     => 'administrator/form_workout_log_list/index/',
			'total_rows'   => $this->data['form_workout_log_list_counts'],
			'per_page'     => $this->limit_page,
			'uri_segment'  => 4,
		];

		$this->data['pagination'] = $this->pagination($config);

		$this->template->title('Form Workout Log List List');
		$this->render('backend/standart/administrator/form_workout_log_list/form_workout_log_list_list', $this->data);
	}
	
	/**
	* Add new form_workout_log_lists
	*
	*/
	public function add()
	{
		$this->is_allowed('form_workout_log_list_add');

		$this->template->title('Form Workout Log List New');
		$this->render('backend/standart/administrator/form_workout_log_list/form_workout_log_list_add', $this->data);
	}

	/**
	* Add New Form Workout Log Lists
	*
	* @return JSON
	*/
	public function add_save()
	{
		if (!$this->is_allowed('form_workout_log_list_add', false)) {
			echo json_encode([
				'success' => false,
				'message' => cclang('sorry_you_do_not_have_permission_to_access')
				]);
			exit;
		}

		$this->form_validation->set_rules('workout_log_id', 'Workout Log Id', 'trim|required|max_length[11]');
		$this->form_validation->set_rules('workout_id', 'Workout Id', 'trim|required|max_length[11]');
		$this->form_validation->set_rules('count', 'Count', 'trim|required|max_length[11]');
		$this->form_validation->set_rules('accuracy', 'Accuracy', 'trim|required|max_length[11]');
		$this->form_validation->set_rules('step_spend_time', 'Step Spend Time', 'trim|required|max_length[11]');
		

		if ($this->form_validation->run()) {
		
			$save_data = [
				'workout_log_id' => $this->input->post('workout_log_id'),
				'workout_id' => $this->input->post('workout_id'),
				'count' => $this->input->post('count'),
				'accuracy' => $this->input->post('accuracy'),
				'step_spend_time' => $this->input->post('step_spend_time'),
				'created_at' => date('Y-m-d H:i:s'),
			];

			
			$save_form_workout_log_list = $this->model_form_workout_log_list->store($save_data);
            

			if ($save_form_workout_log_list) {
				if ($this->input->post('save_type') == 'stay') {
					$this->data['success'] = true;
					$this->data['id'] 	   = $save_form_workout_log_list;
					$this->data['message'] = cclang('success_save_data_stay', [
						anchor('administrator/form_workout_log_list/edit/' . $save_form_workout_log_list, 'Edit Form Workout Log List'),
						anchor('administrator/form_workout_log_list', ' Go back to list')
					]);
				} else {
					set_message(
						cclang('success_save_data_redirect', [
						anchor('administrator/form_workout_log_list/edit/' . $save_form_workout_log_list, 'Edit Form Workout Log List')
					]), 'success');

            		$this->data['success'] = true;
					$this->data['redirect'] = base_url('administrator/form_workout_log_list');
				}
			} else {
				if ($this->input->post('save_type') == 'stay') {
					$this->data['success'] = false;
					$this->data['message'] = cclang('data_not_change');
				} else {
            		$this->data['success'] = false;
            		$this->data['message'] = cclang('data_not_change');
					$this->data['redirect'] = base_url('administrator/form_workout_log_list');
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
	* Update view Form Workout Log Lists
	*
	* @var $id String
	*/
	public function edit($id)
	{
		$this->is_allowed('form_workout_log_list_update');

		$this->data['form_workout_log_list'] = $this->model_form_workout_log_list->find($id);

		$this->template->title('Form Workout Log List Update');
		$this->render('backend/standart/administrator/form_workout_log_list/form_workout_log_list_update', $this->data);
	}

	/**
	* Update Form Workout Log Lists
	*
	* @var $id String
	*/
	public function edit_save($id)
	{
		if (!$this->is_allowed('form_workout_log_list_update', false)) {
			echo json_encode([
				'success' => false,
				'message' => cclang('sorry_you_do_not_have_permission_to_access')
				]);
			exit;
		}
		
		$this->form_validation->set_rules('workout_log_id', 'Workout Log Id', 'trim|required|max_length[11]');
		$this->form_validation->set_rules('workout_id', 'Workout Id', 'trim|required|max_length[11]');
		$this->form_validation->set_rules('count', 'Count', 'trim|required|max_length[11]');
		$this->form_validation->set_rules('accuracy', 'Accuracy', 'trim|required|max_length[11]');
		$this->form_validation->set_rules('step_spend_time', 'Step Spend Time', 'trim|required|max_length[11]');
		
		if ($this->form_validation->run()) {
		
			$save_data = [
				'workout_log_id' => $this->input->post('workout_log_id'),
				'workout_id' => $this->input->post('workout_id'),
				'count' => $this->input->post('count'),
				'accuracy' => $this->input->post('accuracy'),
				'step_spend_time' => $this->input->post('step_spend_time'),
				'created_at' => date('Y-m-d H:i:s'),
			];

			
			$save_form_workout_log_list = $this->model_form_workout_log_list->change($id, $save_data);

			if ($save_form_workout_log_list) {
				if ($this->input->post('save_type') == 'stay') {
					$this->data['success'] = true;
					$this->data['id'] 	   = $id;
					$this->data['message'] = cclang('success_update_data_stay', [
						anchor('administrator/form_workout_log_list', ' Go back to list')
					]);
				} else {
					set_message(
						cclang('success_update_data_redirect', [
					]), 'success');

            		$this->data['success'] = true;
					$this->data['redirect'] = base_url('administrator/form_workout_log_list');
				}
			} else {
				if ($this->input->post('save_type') == 'stay') {
					$this->data['success'] = false;
					$this->data['message'] = cclang('data_not_change');
				} else {
            		$this->data['success'] = false;
            		$this->data['message'] = cclang('data_not_change');
					$this->data['redirect'] = base_url('administrator/form_workout_log_list');
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
	* delete Form Workout Log Lists
	*
	* @var $id String
	*/
	public function delete($id = null)
	{
		$this->is_allowed('form_workout_log_list_delete');

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
            set_message(cclang('has_been_deleted', 'form_workout_log_list'), 'success');
        } else {
            set_message(cclang('error_delete', 'form_workout_log_list'), 'error');
        }

		redirect_back();
	}

		/**
	* View view Form Workout Log Lists
	*
	* @var $id String
	*/
	public function view($id)
	{
		$this->is_allowed('form_workout_log_list_view');

		$this->data['form_workout_log_list'] = $this->model_form_workout_log_list->join_avaiable()->filter_avaiable()->find($id);

		$this->template->title('Form Workout Log List Detail');
		$this->render('backend/standart/administrator/form_workout_log_list/form_workout_log_list_view', $this->data);
	}
	
	/**
	* delete Form Workout Log Lists
	*
	* @var $id String
	*/
	private function _remove($id)
	{
		$form_workout_log_list = $this->model_form_workout_log_list->find($id);

		
		
		return $this->model_form_workout_log_list->remove($id);
	}
	
	
	/**
	* Export to excel
	*
	* @return Files Excel .xls
	*/
	public function export()
	{
		$this->is_allowed('form_workout_log_list_export');

		$this->model_form_workout_log_list->export(
			'form_workout_log_list', 
			'form_workout_log_list',
			$this->model_form_workout_log_list->field_search
		);
	}

	/**
	* Export to PDF
	*
	* @return Files PDF .pdf
	*/
	public function export_pdf()
	{
		$this->is_allowed('form_workout_log_list_export');

		$this->model_form_workout_log_list->pdf('form_workout_log_list', 'form_workout_log_list');
	}


	public function single_pdf($id = null)
	{
		$this->is_allowed('form_workout_log_list_export');

		$table = $title = 'form_workout_log_list';
		$this->load->library('HtmlPdf');
      
        $config = array(
            'orientation' => 'p',
            'format' => 'a4',
            'marges' => array(5, 5, 5, 5)
        );

        $this->pdf = new HtmlPdf($config);
        $this->pdf->setDefaultFont('stsongstdlight'); 

        $result = $this->db->get($table);
       
        $data = $this->model_form_workout_log_list->find($id);
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


/* End of file form_workout_log_list.php */
/* Location: ./application/controllers/administrator/Form Workout Log List.php */