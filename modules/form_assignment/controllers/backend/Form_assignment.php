<?php
defined('BASEPATH') OR exit('No direct script access allowed');


/**
*| --------------------------------------------------------------------------
*| Form Assignment Controller
*| --------------------------------------------------------------------------
*| Form Assignment site
*|
*/
class Form_assignment extends Admin	
{
	
	public function __construct()
	{
		parent::__construct();

		$this->load->model('model_form_assignment');
        $this->load->model('model_form_assignmentlist');
        $this->load->model('model_form_user');
        $this->load->model('model_user');
		$this->lang->load('web_lang', $this->current_lang);
	}

	/**
	* show all Form Assignments
	*
	* @var $offset String
	*/
	public function index($offset = 0)
	{
		$this->is_allowed('form_assignment_list');

		$filter = $this->input->get('q');
		$field 	= $this->input->get('f');

		$this->data['form_assignments'] = $this->model_form_assignment->get($filter, $field, $this->limit_page, $offset);
		$this->data['form_assignment_counts'] = $this->model_form_assignment->count_all($filter, $field);

		$config = [
			'base_url'     => 'administrator/form_assignment/index/',
			'total_rows'   => $this->data['form_assignment_counts'],
			'per_page'     => $this->limit_page,
			'uri_segment'  => 4,
		];

		$this->data['pagination'] = $this->pagination($config);

		$this->template->title('Form Assignment List');
		$this->render('backend/standart/administrator/form_assignment/form_assignment_list', $this->data);
	}
	
	/**
	* Add new form_assignments
	*
	*/
	public function add()
	{
		$this->is_allowed('form_assignment_add');

		$this->template->title('Form Assignment New');
		$this->render('backend/standart/administrator/form_assignment/form_assignment_add', $this->data);
	}

	/**
	* Add New Form Assignments
	*
	* @return JSON
	*/
	public function add_save()
	{
		if (!$this->is_allowed('form_assignment_add', false)) {
			echo json_encode([
				'success' => false,
				'message' => cclang('sorry_you_do_not_have_permission_to_access')
				]);
			exit;
		}

		$this->form_validation->set_rules('assignment_no', 'Assignment No', 'trim|required|max_length[225]');
		$this->form_validation->set_rules('patient_id', 'Patient Id', 'trim|required|max_length[225]');
		$this->form_validation->set_rules('assignee_id', 'Assignee Id', 'trim|required|max_length[225]');
		$this->form_validation->set_rules('assignment_day', 'Assignment Day', 'trim|required');
		$this->form_validation->set_rules('assignment_time', 'Assignment Time', 'trim|required');
		$this->form_validation->set_rules('total_amount', 'Total Amount', 'trim|required|max_length[11]');
		$this->form_validation->set_rules('total_estimate_time', 'Total Estimate Time', 'trim|required');
		

		if ($this->form_validation->run()) {
		
			$save_data = [
				'assignment_no' => $this->input->post('assignment_no'),
				'patient_id' => $this->input->post('patient_id'),
				'assignee_id' => $this->input->post('assignee_id'),
				'assignment_day' => $this->input->post('assignment_day'),
				'assignment_time' => $this->input->post('assignment_time'),
				'total_amount' => $this->input->post('total_amount'),
				'total_estimate_time' => $this->input->post('total_estimate_time'),
			];

			
			$save_form_assignment = $this->model_form_assignment->store($save_data);
            

			if ($save_form_assignment) {
				if ($this->input->post('save_type') == 'stay') {
					$this->data['success'] = true;
					$this->data['id'] 	   = $save_form_assignment;
					$this->data['message'] = cclang('success_save_data_stay', [
						anchor('administrator/form_assignment/edit/' . $save_form_assignment, 'Edit Form Assignment'),
						anchor('administrator/form_assignment', ' Go back to list')
					]);
				} else {
					set_message(
						cclang('success_save_data_redirect', [
						anchor('administrator/form_assignment/edit/' . $save_form_assignment, 'Edit Form Assignment')
					]), 'success');

            		$this->data['success'] = true;
					$this->data['redirect'] = base_url('administrator/form_assignment');
				}
			} else {
				if ($this->input->post('save_type') == 'stay') {
					$this->data['success'] = false;
					$this->data['message'] = cclang('data_not_change');
				} else {
            		$this->data['success'] = false;
            		$this->data['message'] = cclang('data_not_change');
					$this->data['redirect'] = base_url('administrator/form_assignment');
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
	* Update view Form Assignments
	*
	* @var $id String
	*/
	public function edit($id)
	{
		$this->is_allowed('form_assignment_update');

		$this->data['form_assignment'] = $this->model_form_assignment->find($id);

        // By Nadoo V.1.0
        // Patient
        $this->data['form_users'] = $this->model_form_user->get(null, null, 0, 0);
		$this->data['form_user_counts'] = $this->model_form_user->count_all(null, null);
        // Assignee
        $this->data['users'] = $this->model_user->get(null, null, 0, 0);
		$this->data['user_counts'] = $this->model_user->count_all(null, null);
        // Assignment List
        $this->data['form_assignmentlists'] = $this->model_form_assignmentlist->get($this->data['form_assignment']->id, 'assignment_id', 0, 0);
		$this->data['form_assignmentlist_counts'] = $this->model_form_assignmentlist->count_all($this->data['form_assignment']->id, 'assignment_id');
        // By Nadoo V.1.0

		$this->template->title('Form Assignment Update');
		$this->render('backend/standart/administrator/form_assignment/form_assignment_update', $this->data);
	}

	/**
	* Update Form Assignments
	*
	* @var $id String
	*/
	public function edit_save($id)
	{
		if (!$this->is_allowed('form_assignment_update', false)) {
			echo json_encode([
				'success' => false,
				'message' => cclang('sorry_you_do_not_have_permission_to_access')
				]);
			exit;
		}
		
		// $this->form_validation->set_rules('assignment_no', 'Assignment No', 'trim|required|max_length[225]');
		$this->form_validation->set_rules('patient_id', 'Patient Id', 'trim|required|max_length[225]');
		$this->form_validation->set_rules('assignee_id', 'Assignee Id', 'trim|required|max_length[225]');
		$this->form_validation->set_rules('assignment_day', 'Assignment Day', 'trim|required');
		// $this->form_validation->set_rules('assignment_time', 'Assignment Time', 'trim|required');
		// $this->form_validation->set_rules('total_amount', 'Total Amount', 'trim|required|max_length[11]');
		// $this->form_validation->set_rules('total_estimate_time', 'Total Estimate Time', 'trim|required');
		
		if ($this->form_validation->run()) {
		
			$save_data = [
				// 'assignment_no' => $this->input->post('assignment_no'),
				'patient_id' => $this->input->post('patient_id'),
				'assignee_id' => $this->input->post('assignee_id'),
				'assignment_day' => $this->input->post('assignment_day'),
				// 'assignment_time' => $this->input->post('assignment_time'),
				// 'total_amount' => $this->input->post('total_amount'),
				// 'total_estimate_time' => $this->input->post('total_estimate_time'),
			];

			
			$save_form_assignment = $this->model_form_assignment->change($id, $save_data);

			if ($save_form_assignment) {
				if ($this->input->post('save_type') == 'stay') {
					$this->data['success'] = true;
					$this->data['id'] 	   = $id;
					$this->data['message'] = cclang('success_update_data_stay', [
						anchor('administrator/form_assignment', ' Go back to list')
					]);
				} else {
					set_message(
						cclang('success_update_data_redirect', [
					]), 'success');

            		$this->data['success'] = true;
					$this->data['redirect'] = base_url('administrator/form_assignment');
				}
			} else {
				if ($this->input->post('save_type') == 'stay') {
					$this->data['success'] = false;
					$this->data['message'] = cclang('data_not_change');
				} else {
            		$this->data['success'] = false;
            		$this->data['message'] = cclang('data_not_change');
					$this->data['redirect'] = base_url('administrator/form_assignment');
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
	* delete Form Assignments
	*
	* @var $id String
	*/
	public function delete($id = null)
	{
		$this->is_allowed('form_assignment_delete');

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
            set_message(cclang('has_been_deleted', 'form_assignment'), 'success');
        } else {
            set_message(cclang('error_delete', 'form_assignment'), 'error');
        }

		redirect_back();
	}

		/**
	* View view Form Assignments
	*
	* @var $id String
	*/
	public function view($id)
	{
		$this->is_allowed('form_assignment_view');

		$this->data['form_assignment'] = $this->model_form_assignment->join_avaiable()->filter_avaiable()->find($id);

		$this->template->title('Form Assignment Detail');
		$this->render('backend/standart/administrator/form_assignment/form_assignment_view', $this->data);
	}
	
	/**
	* delete Form Assignments
	*
	* @var $id String
	*/
	private function _remove($id)
	{
		$form_assignment = $this->model_form_assignment->find($id);

		
		
		return $this->model_form_assignment->remove($id);
	}
	
	
	/**
	* Export to excel
	*
	* @return Files Excel .xls
	*/
	public function export()
	{
		$this->is_allowed('form_assignment_export');

		$this->model_form_assignment->export(
			'form_assignment', 
			'form_assignment',
			$this->model_form_assignment->field_search
		);
	}

	/**
	* Export to PDF
	*
	* @return Files PDF .pdf
	*/
	public function export_pdf()
	{
		$this->is_allowed('form_assignment_export');

		$this->model_form_assignment->pdf('form_assignment', 'form_assignment');
	}


	public function single_pdf($id = null)
	{
		$this->is_allowed('form_assignment_export');

		$table = $title = 'form_assignment';
		$this->load->library('HtmlPdf');
      
        $config = array(
            'orientation' => 'p',
            'format' => 'a4',
            'marges' => array(5, 5, 5, 5)
        );

        $this->pdf = new HtmlPdf($config);
        $this->pdf->setDefaultFont('stsongstdlight'); 

        $result = $this->db->get($table);
       
        $data = $this->model_form_assignment->find($id);
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


/* End of file form_assignment.php */
/* Location: ./application/controllers/administrator/Form Assignment.php */