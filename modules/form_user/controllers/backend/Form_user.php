<?php
defined('BASEPATH') OR exit('No direct script access allowed');


/**
*| --------------------------------------------------------------------------
*| Form User Controller
*| --------------------------------------------------------------------------
*| Form User site
*|
*/
class Form_user extends Admin	
{
	
	public function __construct()
	{
		parent::__construct();

		$this->load->model('model_form_user');
		$this->lang->load('web_lang', $this->current_lang);
	}

	/**
	* show all Form Users
	*
	* @var $offset String
	*/
	public function index($offset = 0)
	{
		$this->is_allowed('form_user_list');

		$filter = $this->input->get('q');
		$field 	= $this->input->get('f');

		$this->data['form_users'] = $this->model_form_user->get($filter, $field, $this->limit_page, $offset);
		$this->data['form_user_counts'] = $this->model_form_user->count_all($filter, $field);

		$config = [
			'base_url'     => 'administrator/form_user/index/',
			'total_rows'   => $this->data['form_user_counts'],
			'per_page'     => $this->limit_page,
			'uri_segment'  => 4,
		];

		$this->data['pagination'] = $this->pagination($config);

		$this->template->title('Form User List');
		$this->render('backend/standart/administrator/form_user/form_user_list', $this->data);
	}
	
	/**
	* Add new form_users
	*
	*/
	public function add()
	{
		$this->is_allowed('form_user_add');

		$this->template->title('Form User New');
		$this->render('backend/standart/administrator/form_user/form_user_add', $this->data);
	}

	/**
	* Add New Form Users
	*
	* @return JSON
	*/
	public function add_save()
	{
		if (!$this->is_allowed('form_user_add', false)) {
			echo json_encode([
				'success' => false,
				'message' => cclang('sorry_you_do_not_have_permission_to_access')
				]);
			exit;
		}

		$this->form_validation->set_rules('role', 'Role', 'trim|required');
		$this->form_validation->set_rules('username', 'Username', 'trim|required|max_length[225]');
		$this->form_validation->set_rules('password', 'Password', 'trim|required|max_length[225]');
		$this->form_validation->set_rules('first_name', 'First Name', 'trim|required|max_length[225]');
		$this->form_validation->set_rules('last_name', 'Last Name', 'trim|required|max_length[225]');
		$this->form_validation->set_rules('gender', 'Gender', 'trim|required');
		$this->form_validation->set_rules('age', 'Age', 'trim|required|max_length[11]');
		$this->form_validation->set_rules('height', 'Height', 'trim|required|max_length[11]');
		$this->form_validation->set_rules('weight', 'Weight', 'trim|required|max_length[11]');
		$this->form_validation->set_rules('bmi', 'Bmi', 'trim|required|max_length[11]');
		$this->form_validation->set_rules('position', 'Position', 'trim|required|max_length[225]');
		$this->form_validation->set_rules('institution', 'Institution', 'trim|required|max_length[225]');
		

		if ($this->form_validation->run()) {
		
			$save_data = [
				'role' => $this->input->post('role'),
				'username' => $this->input->post('username'),
				'password' => $this->input->post('password'),
				'first_name' => $this->input->post('first_name'),
				'last_name' => $this->input->post('last_name'),
				'gender' => $this->input->post('gender'),
				'age' => $this->input->post('age'),
				'height' => $this->input->post('height'),
				'weight' => $this->input->post('weight'),
				'bmi' => $this->input->post('bmi'),
				'position' => $this->input->post('position'),
				'institution' => $this->input->post('institution'),
			];

			
			$save_form_user = $this->model_form_user->store($save_data);
            

			if ($save_form_user) {
				if ($this->input->post('save_type') == 'stay') {
					$this->data['success'] = true;
					$this->data['id'] 	   = $save_form_user;
					$this->data['message'] = cclang('success_save_data_stay', [
						anchor('administrator/form_user/edit/' . $save_form_user, 'Edit Form User'),
						anchor('administrator/form_user', ' Go back to list')
					]);
				} else {
					set_message(
						cclang('success_save_data_redirect', [
						anchor('administrator/form_user/edit/' . $save_form_user, 'Edit Form User')
					]), 'success');

            		$this->data['success'] = true;
					$this->data['redirect'] = base_url('administrator/form_user');
				}
			} else {
				if ($this->input->post('save_type') == 'stay') {
					$this->data['success'] = false;
					$this->data['message'] = cclang('data_not_change');
				} else {
            		$this->data['success'] = false;
            		$this->data['message'] = cclang('data_not_change');
					$this->data['redirect'] = base_url('administrator/form_user');
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
	* Update view Form Users
	*
	* @var $id String
	*/
	public function edit($id)
	{
		$this->is_allowed('form_user_update');

		$this->data['form_user'] = $this->model_form_user->find($id);

		$this->template->title('Form User Update');
		$this->render('backend/standart/administrator/form_user/form_user_update', $this->data);
	}

	/**
	* Update Form Users
	*
	* @var $id String
	*/
	public function edit_save($id)
	{
		if (!$this->is_allowed('form_user_update', false)) {
			echo json_encode([
				'success' => false,
				'message' => cclang('sorry_you_do_not_have_permission_to_access')
				]);
			exit;
		}
		
		$this->form_validation->set_rules('role', 'Role', 'trim|required');
		$this->form_validation->set_rules('username', 'Username', 'trim|required|max_length[225]');
		$this->form_validation->set_rules('password', 'Password', 'trim|required|max_length[225]');
		$this->form_validation->set_rules('first_name', 'First Name', 'trim|required|max_length[225]');
		$this->form_validation->set_rules('last_name', 'Last Name', 'trim|required|max_length[225]');
		$this->form_validation->set_rules('gender', 'Gender', 'trim|required');
		$this->form_validation->set_rules('age', 'Age', 'trim|required|max_length[11]');
		$this->form_validation->set_rules('height', 'Height', 'trim|required|max_length[11]');
		$this->form_validation->set_rules('weight', 'Weight', 'trim|required|max_length[11]');
		$this->form_validation->set_rules('bmi', 'Bmi', 'trim|required|max_length[11]');
		$this->form_validation->set_rules('position', 'Position', 'trim|required|max_length[225]');
		$this->form_validation->set_rules('institution', 'Institution', 'trim|required|max_length[225]');
		
		if ($this->form_validation->run()) {
		
			$save_data = [
				'role' => $this->input->post('role'),
				'username' => $this->input->post('username'),
				'password' => $this->input->post('password'),
				'first_name' => $this->input->post('first_name'),
				'last_name' => $this->input->post('last_name'),
				'gender' => $this->input->post('gender'),
				'age' => $this->input->post('age'),
				'height' => $this->input->post('height'),
				'weight' => $this->input->post('weight'),
				'bmi' => $this->input->post('bmi'),
				'position' => $this->input->post('position'),
				'institution' => $this->input->post('institution'),
			];

			
			$save_form_user = $this->model_form_user->change($id, $save_data);

			if ($save_form_user) {
				if ($this->input->post('save_type') == 'stay') {
					$this->data['success'] = true;
					$this->data['id'] 	   = $id;
					$this->data['message'] = cclang('success_update_data_stay', [
						anchor('administrator/form_user', ' Go back to list')
					]);
				} else {
					set_message(
						cclang('success_update_data_redirect', [
					]), 'success');

            		$this->data['success'] = true;
					$this->data['redirect'] = base_url('administrator/form_user');
				}
			} else {
				if ($this->input->post('save_type') == 'stay') {
					$this->data['success'] = false;
					$this->data['message'] = cclang('data_not_change');
				} else {
            		$this->data['success'] = false;
            		$this->data['message'] = cclang('data_not_change');
					$this->data['redirect'] = base_url('administrator/form_user');
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
	* delete Form Users
	*
	* @var $id String
	*/
	public function delete($id = null)
	{
		$this->is_allowed('form_user_delete');

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
            set_message(cclang('has_been_deleted', 'form_user'), 'success');
        } else {
            set_message(cclang('error_delete', 'form_user'), 'error');
        }

		redirect_back();
	}

		/**
	* View view Form Users
	*
	* @var $id String
	*/
	public function view($id)
	{
		$this->is_allowed('form_user_view');

		$this->data['form_user'] = $this->model_form_user->join_avaiable()->filter_avaiable()->find($id);

		$this->template->title('Form User Detail');
		$this->render('backend/standart/administrator/form_user/form_user_view', $this->data);
	}
	
	/**
	* delete Form Users
	*
	* @var $id String
	*/
	private function _remove($id)
	{
		$form_user = $this->model_form_user->find($id);

		
		
		return $this->model_form_user->remove($id);
	}
	
	
	/**
	* Export to excel
	*
	* @return Files Excel .xls
	*/
	public function export()
	{
		$this->is_allowed('form_user_export');

		$this->model_form_user->export(
			'form_user', 
			'form_user',
			$this->model_form_user->field_search
		);
	}

	/**
	* Export to PDF
	*
	* @return Files PDF .pdf
	*/
	public function export_pdf()
	{
		$this->is_allowed('form_user_export');

		$this->model_form_user->pdf('form_user', 'form_user');
	}


	public function single_pdf($id = null)
	{
		$this->is_allowed('form_user_export');

		$table = $title = 'form_user';
		$this->load->library('HtmlPdf');
      
        $config = array(
            'orientation' => 'p',
            'format' => 'a4',
            'marges' => array(5, 5, 5, 5)
        );

        $this->pdf = new HtmlPdf($config);
        $this->pdf->setDefaultFont('stsongstdlight'); 

        $result = $this->db->get($table);
       
        $data = $this->model_form_user->find($id);
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


/* End of file form_user.php */
/* Location: ./application/controllers/administrator/Form User.php */