<?php
defined('BASEPATH') OR exit('No direct script access allowed');


/**
*| --------------------------------------------------------------------------
*| Form Assignmentlist Controller
*| --------------------------------------------------------------------------
*| Form Assignmentlist site
*|
*/
class Form_assignmentlist extends Admin	
{
	
	public function __construct()
	{
		parent::__construct();

		$this->load->model('model_form_assignmentlist');
		$this->lang->load('web_lang', $this->current_lang);
	}

	/**
	* show all Form Assignmentlists
	*
	* @var $offset String
	*/
	public function index($offset = 0)
	{
		$this->is_allowed('form_assignmentlist_list');

		$filter = $this->input->get('q');
		$field 	= $this->input->get('f');

		$this->data['form_assignmentlists'] = $this->model_form_assignmentlist->get($filter, $field, $this->limit_page, $offset);
		$this->data['form_assignmentlist_counts'] = $this->model_form_assignmentlist->count_all($filter, $field);

		$config = [
			'base_url'     => 'administrator/form_assignmentlist/index/',
			'total_rows'   => $this->data['form_assignmentlist_counts'],
			'per_page'     => $this->limit_page,
			'uri_segment'  => 4,
		];

		$this->data['pagination'] = $this->pagination($config);

		$this->template->title('Form Assignmentlist List');
		$this->render('backend/standart/administrator/form_assignmentlist/form_assignmentlist_list', $this->data);
	}
	
	/**
	* Add new form_assignmentlists
	*
	*/
	public function add()
	{
		$this->is_allowed('form_assignmentlist_add');

        // Fix ID By Nadoo V.1.0 //
        if( $this->input->get('id') !== null && $this->input->get('id') != ""  ){
            $this->data['form_assignmentlistid'] = $this->input->get('id');
        }
        // Assignment By Nadoo V.1.0 
        $this->load->model('model_form_assignment');
        $this->data['form_assignments'] = $this->model_form_assignment->get(null, null, 0, 0);
        $this->data['form_assignment_counts'] = $this->model_form_assignment->count_all(null, null);
        // Workout By Nadoo V.1.0 
        $this->load->model('model_form_workout');
        $this->data['form_workouts'] = $this->model_form_workout->get(null, null, 0, 0);
        $this->data['form_workout_counts'] = $this->model_form_workout->count_all(null, null);

		$this->template->title('Form Assignmentlist New');
		$this->render('backend/standart/administrator/form_assignmentlist/form_assignmentlist_add', $this->data);
	}

	/**
	* Add New Form Assignmentlists
	*
	* @return JSON
	*/
	public function add_save()
	{
		if (!$this->is_allowed('form_assignmentlist_add', false)) {
			echo json_encode([
				'success' => false,
				'message' => cclang('sorry_you_do_not_have_permission_to_access')
				]);
			exit;
		}

		$this->form_validation->set_rules('assignment_id', 'Assignment Id', 'trim|required|max_length[225]');
		$this->form_validation->set_rules('workout_id', 'Workout Id', 'trim|required');
		$this->form_validation->set_rules('set_per_each', 'Set Per Each', 'trim|required|max_length[11]');
		$this->form_validation->set_rules('amount_per_set', 'Amount Per Set', 'trim|required|max_length[11]');
		$this->form_validation->set_rules('total_amount', 'Total Amount', 'trim|required|max_length[11]');
		$this->form_validation->set_rules('average_workout_time', 'Average Workout Time', 'trim|required');
		

		if ($this->form_validation->run()) {
		
			$save_data = [
				'assignment_id' => $this->input->post('assignment_id'),
				'workout_id' => $this->input->post('workout_id'),
				'set_per_each' => $this->input->post('set_per_each'),
				'amount_per_set' => $this->input->post('amount_per_set'),
				'total_amount' => $this->input->post('total_amount'),
				'average_workout_time' => $this->input->post('average_workout_time'),
			];

			
			$save_form_assignmentlist = $this->model_form_assignmentlist->store($save_data);
            

			if ($save_form_assignmentlist) {
				if ($this->input->post('save_type') == 'stay') {
					$this->data['success'] = true;
					$this->data['id'] 	   = $save_form_assignmentlist;
					$this->data['message'] = cclang('success_save_data_stay', [
						anchor('administrator/form_assignmentlist/edit/' . $save_form_assignmentlist, 'Edit Form Assignmentlist'),
						anchor('administrator/form_assignmentlist', ' Go back to list')
					]);
				} else {
					set_message(
						cclang('success_save_data_redirect', [
						anchor('administrator/form_assignmentlist/edit/' . $save_form_assignmentlist, 'Edit Form Assignmentlist')
					]), 'success');

            		$this->data['success'] = true;
					$this->data['redirect'] = base_url('administrator/form_assignmentlist');
				}
			} else {
				if ($this->input->post('save_type') == 'stay') {
					$this->data['success'] = false;
					$this->data['message'] = cclang('data_not_change');
				} else {
            		$this->data['success'] = false;
            		$this->data['message'] = cclang('data_not_change');
					$this->data['redirect'] = base_url('administrator/form_assignmentlist');
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
	* Update view Form Assignmentlists
	*
	* @var $id String
	*/
	public function edit($id)
	{
		$this->is_allowed('form_assignmentlist_update');

		$this->data['form_assignmentlist'] = $this->model_form_assignmentlist->find($id);

        // Workout By Nadoo V.1.0 
        $this->load->model('model_form_workout');
        $this->data['form_workouts'] = $this->model_form_workout->get(null, null, 0, 0);
		$this->data['form_workout_counts'] = $this->model_form_workout->count_all(null, null);
        // Workout By Nadoo V.1.0 

		$this->template->title('Form Assignmentlist Update');
		$this->render('backend/standart/administrator/form_assignmentlist/form_assignmentlist_update', $this->data);
	}

	/**
	* Update Form Assignmentlists
	*
	* @var $id String
	*/
	public function edit_save($id)
	{
		if (!$this->is_allowed('form_assignmentlist_update', false)) {
			echo json_encode([
				'success' => false,
				'message' => cclang('sorry_you_do_not_have_permission_to_access')
				]);
			exit;
		}
		
		$this->form_validation->set_rules('assignment_id', 'Assignment Id', 'trim|required|max_length[225]');
		$this->form_validation->set_rules('workout_id', 'Workout Id', 'trim|required');
		$this->form_validation->set_rules('set_per_each', 'Set Per Each', 'trim|required|max_length[11]');
		// $this->form_validation->set_rules('amount_per_set', 'Amount Per Set', 'trim|required|max_length[11]');
		$this->form_validation->set_rules('total_amount', 'Total Amount', 'trim|required|max_length[11]');
		// $this->form_validation->set_rules('average_workout_time', 'Average Workout Time', 'trim|required');
		
		if ($this->form_validation->run()) {
		
			$save_data = [
				'assignment_id' => $this->input->post('assignment_id'),
				'workout_id' => $this->input->post('workout_id'),
				'set_per_each' => $this->input->post('set_per_each'),
				// 'amount_per_set' => $this->input->post('amount_per_set'),
				'total_amount' => $this->input->post('total_amount'),
				// 'average_workout_time' => $this->input->post('average_workout_time'),
			];

			
			$save_form_assignmentlist = $this->model_form_assignmentlist->change($id, $save_data);

			if ($save_form_assignmentlist) {
				if ($this->input->post('save_type') == 'stay') {
					$this->data['success'] = true;
					$this->data['id'] 	   = $id;
					$this->data['message'] = cclang('success_update_data_stay', [
						anchor('administrator/form_assignmentlist', ' Go back to list')
					]);
				} else {
					set_message(
						cclang('success_update_data_redirect', [
					]), 'success');

            		$this->data['success'] = true;
					$this->data['redirect'] = base_url('administrator/form_assignmentlist');
				}
			} else {
				if ($this->input->post('save_type') == 'stay') {
					$this->data['success'] = false;
					$this->data['message'] = cclang('data_not_change');
				} else {
            		$this->data['success'] = false;
            		$this->data['message'] = cclang('data_not_change');
					$this->data['redirect'] = base_url('administrator/form_assignmentlist');
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
	* delete Form Assignmentlists
	*
	* @var $id String
	*/
	public function delete($id = null)
	{
		$this->is_allowed('form_assignmentlist_delete');

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
            set_message(cclang('has_been_deleted', 'form_assignmentlist'), 'success');
        } else {
            set_message(cclang('error_delete', 'form_assignmentlist'), 'error');
        }

		redirect_back();
	}

		/**
	* View view Form Assignmentlists
	*
	* @var $id String
	*/
	public function view($id)
	{
		$this->is_allowed('form_assignmentlist_view');

		$this->data['form_assignmentlist'] = $this->model_form_assignmentlist->join_avaiable()->filter_avaiable()->find($id);

		$this->template->title('Form Assignmentlist Detail');
		$this->render('backend/standart/administrator/form_assignmentlist/form_assignmentlist_view', $this->data);
	}
	
	/**
	* delete Form Assignmentlists
	*
	* @var $id String
	*/
	private function _remove($id)
	{
		$form_assignmentlist = $this->model_form_assignmentlist->find($id);

		
		
		return $this->model_form_assignmentlist->remove($id);
	}
	
	
	/**
	* Export to excel
	*
	* @return Files Excel .xls
	*/
	public function export()
	{
		$this->is_allowed('form_assignmentlist_export');

		$this->model_form_assignmentlist->export(
			'form_assignmentlist', 
			'form_assignmentlist',
			$this->model_form_assignmentlist->field_search
		);
	}

	/**
	* Export to PDF
	*
	* @return Files PDF .pdf
	*/
	public function export_pdf()
	{
		$this->is_allowed('form_assignmentlist_export');

		$this->model_form_assignmentlist->pdf('form_assignmentlist', 'form_assignmentlist');
	}


	public function single_pdf($id = null)
	{
		$this->is_allowed('form_assignmentlist_export');

		$table = $title = 'form_assignmentlist';
		$this->load->library('HtmlPdf');
      
        $config = array(
            'orientation' => 'p',
            'format' => 'a4',
            'marges' => array(5, 5, 5, 5)
        );

        $this->pdf = new HtmlPdf($config);
        $this->pdf->setDefaultFont('stsongstdlight'); 

        $result = $this->db->get($table);
       
        $data = $this->model_form_assignmentlist->find($id);
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


/* End of file form_assignmentlist.php */
/* Location: ./application/controllers/administrator/Form Assignmentlist.php */