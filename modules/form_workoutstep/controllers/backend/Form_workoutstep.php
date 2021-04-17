<?php
defined('BASEPATH') OR exit('No direct script access allowed');


/**
*| --------------------------------------------------------------------------
*| Form Workoutstep Controller
*| --------------------------------------------------------------------------
*| Form Workoutstep site
*|
*/
class Form_workoutstep extends Admin	
{
	
	public function __construct()
	{
		parent::__construct();

		$this->load->model('model_form_workoutstep');
		$this->lang->load('web_lang', $this->current_lang);
	}

	/**
	* show all Form Workoutsteps
	*
	* @var $offset String
	*/
	public function index($offset = 0)
	{
		$this->is_allowed('form_workoutstep_list');

		$filter = $this->input->get('q');
		$field 	= $this->input->get('f');

		$this->data['form_workoutsteps'] = $this->model_form_workoutstep->get($filter, $field, $this->limit_page, $offset);
		$this->data['form_workoutstep_counts'] = $this->model_form_workoutstep->count_all($filter, $field);

		$config = [
			'base_url'     => 'administrator/form_workoutstep/index/',
			'total_rows'   => $this->data['form_workoutstep_counts'],
			'per_page'     => $this->limit_page,
			'uri_segment'  => 4,
		];

		$this->data['pagination'] = $this->pagination($config);

		$this->template->title('Form Workoutstep List');
		$this->render('backend/standart/administrator/form_workoutstep/form_workoutstep_list', $this->data);
	}
	
	/**
	* Add new form_workoutsteps
	*
	*/
	public function add()
	{
		$this->is_allowed('form_workoutstep_add');

		$this->template->title('Form Workoutstep New');
		$this->render('backend/standart/administrator/form_workoutstep/form_workoutstep_add', $this->data);
	}

	/**
	* Add New Form Workoutsteps
	*
	* @return JSON
	*/
	public function add_save()
	{
		if (!$this->is_allowed('form_workoutstep_add', false)) {
			echo json_encode([
				'success' => false,
				'message' => cclang('sorry_you_do_not_have_permission_to_access')
				]);
			exit;
		}

		$this->form_validation->set_rules('workout_id', 'Workout Id', 'trim|required|max_length[11]');
		$this->form_validation->set_rules('step_id', 'Step Id', 'trim|required|max_length[11]');
		$this->form_validation->set_rules('nose_x', 'Nose X', 'trim|required');
		$this->form_validation->set_rules('right_eye_x', 'Right Eye X', 'trim|required');
		$this->form_validation->set_rules('left_eye_x', 'Left Eye X', 'trim|required');
		$this->form_validation->set_rules('right_ear_x', 'Right Ear X', 'trim|required');
		$this->form_validation->set_rules('left_ear_x', 'Left Ear X', 'trim|required');
		$this->form_validation->set_rules('right_shoulder_x', 'Right Shoulder X', 'trim|required');
		$this->form_validation->set_rules('left_shoulder_x', 'Left Shoulder X', 'trim|required');
		$this->form_validation->set_rules('right_elbow_x', 'Right Elbow X', 'trim|required');
		$this->form_validation->set_rules('left_elbow_x', 'Left Elbow X', 'trim|required');
		$this->form_validation->set_rules('right_wrist_x', 'Right Wrist X', 'trim|required');
		$this->form_validation->set_rules('left_wrist_x', 'Left Wrist X', 'trim|required');
		$this->form_validation->set_rules('right_hip_x', 'Right Hip X', 'trim|required');
		$this->form_validation->set_rules('left_hip_x', 'Left Hip X', 'trim|required');
		$this->form_validation->set_rules('right_knee_x', 'Right Knee X', 'trim|required');
		$this->form_validation->set_rules('left_knee_x', 'Left Knee X', 'trim|required');
		$this->form_validation->set_rules('right_ankle_x', 'Right Ankle X', 'trim|required');
		$this->form_validation->set_rules('left_ankle_x', 'Left Ankle X', 'trim|required');
		$this->form_validation->set_rules('nose_y', 'Nose Y', 'trim|required');
		$this->form_validation->set_rules('right_eye_y', 'Right Eye Y', 'trim|required');
		$this->form_validation->set_rules('left_eye_y', 'Left Eye Y', 'trim|required');
		$this->form_validation->set_rules('right_ear_y', 'Right Ear Y', 'trim|required');
		$this->form_validation->set_rules('left_ear_y', 'Left Ear Y', 'trim|required');
		$this->form_validation->set_rules('right_shoulder_y', 'Right Shoulder Y', 'trim|required');
		$this->form_validation->set_rules('left_shoulder_y', 'Left Shoulder Y', 'trim|required');
		$this->form_validation->set_rules('right_elbow_y', 'Right Elbow Y', 'trim|required');
		$this->form_validation->set_rules('left_elbow_y', 'Left Elbow Y', 'trim|required');
		$this->form_validation->set_rules('right_wrist_y', 'Right Wrist Y', 'trim|required');
		$this->form_validation->set_rules('left_wrist_y', 'Left Wrist Y', 'trim|required');
		$this->form_validation->set_rules('right_hip_y', 'Right Hip Y', 'trim|required');
		$this->form_validation->set_rules('left_hip_y', 'Left Hip Y', 'trim|required');
		$this->form_validation->set_rules('right_knee_y', 'Right Knee Y', 'trim|required');
		$this->form_validation->set_rules('left_knee_y', 'Left Knee Y', 'trim|required');
		$this->form_validation->set_rules('right_ankle_y', 'Right Ankle Y', 'trim|required');
		$this->form_validation->set_rules('left_ankle_y', 'Left Ankle Y', 'trim|required');
		$this->form_validation->set_rules('nose_check', 'Nose Check', 'trim|required|max_length[1]');
		$this->form_validation->set_rules('eye_check', 'Eye Check', 'trim|required|max_length[1]');
		$this->form_validation->set_rules('ear_check', 'Ear Check', 'trim|required|max_length[1]');
		$this->form_validation->set_rules('shoulder_check', 'Shoulder Check', 'trim|required|max_length[1]');
		$this->form_validation->set_rules('elbow_check', 'Elbow Check', 'trim|required|max_length[1]');
		$this->form_validation->set_rules('wrist_check', 'Wrist Check', 'trim|required|max_length[1]');
		$this->form_validation->set_rules('hip_check', 'Hip Check', 'trim|required|max_length[1]');
		$this->form_validation->set_rules('knee_check', 'Knee Check', 'trim|required|max_length[1]');
		$this->form_validation->set_rules('foot_check', 'Foot Check', 'trim|required|max_length[1]');
		

		if ($this->form_validation->run()) {
		
			$save_data = [
				'workout_id' => $this->input->post('workout_id'),
				'step_id' => $this->input->post('step_id'),
				'nose_x' => $this->input->post('nose_x'),
				'right_eye_x' => $this->input->post('right_eye_x'),
				'left_eye_x' => $this->input->post('left_eye_x'),
				'right_ear_x' => $this->input->post('right_ear_x'),
				'left_ear_x' => $this->input->post('left_ear_x'),
				'right_shoulder_x' => $this->input->post('right_shoulder_x'),
				'left_shoulder_x' => $this->input->post('left_shoulder_x'),
				'right_elbow_x' => $this->input->post('right_elbow_x'),
				'left_elbow_x' => $this->input->post('left_elbow_x'),
				'right_wrist_x' => $this->input->post('right_wrist_x'),
				'left_wrist_x' => $this->input->post('left_wrist_x'),
				'right_hip_x' => $this->input->post('right_hip_x'),
				'left_hip_x' => $this->input->post('left_hip_x'),
				'right_knee_x' => $this->input->post('right_knee_x'),
				'left_knee_x' => $this->input->post('left_knee_x'),
				'right_ankle_x' => $this->input->post('right_ankle_x'),
				'left_ankle_x' => $this->input->post('left_ankle_x'),
				'nose_y' => $this->input->post('nose_y'),
				'right_eye_y' => $this->input->post('right_eye_y'),
				'left_eye_y' => $this->input->post('left_eye_y'),
				'right_ear_y' => $this->input->post('right_ear_y'),
				'left_ear_y' => $this->input->post('left_ear_y'),
				'right_shoulder_y' => $this->input->post('right_shoulder_y'),
				'left_shoulder_y' => $this->input->post('left_shoulder_y'),
				'right_elbow_y' => $this->input->post('right_elbow_y'),
				'left_elbow_y' => $this->input->post('left_elbow_y'),
				'right_wrist_y' => $this->input->post('right_wrist_y'),
				'left_wrist_y' => $this->input->post('left_wrist_y'),
				'right_hip_y' => $this->input->post('right_hip_y'),
				'left_hip_y' => $this->input->post('left_hip_y'),
				'right_knee_y' => $this->input->post('right_knee_y'),
				'left_knee_y' => $this->input->post('left_knee_y'),
				'right_ankle_y' => $this->input->post('right_ankle_y'),
				'left_ankle_y' => $this->input->post('left_ankle_y'),
				'nose_check' => $this->input->post('nose_check'),
				'eye_check' => $this->input->post('eye_check'),
				'ear_check' => $this->input->post('ear_check'),
				'shoulder_check' => $this->input->post('shoulder_check'),
				'elbow_check' => $this->input->post('elbow_check'),
				'wrist_check' => $this->input->post('wrist_check'),
				'hip_check' => $this->input->post('hip_check'),
				'knee_check' => $this->input->post('knee_check'),
				'foot_check' => $this->input->post('foot_check'),
			];

			
			$save_form_workoutstep = $this->model_form_workoutstep->store($save_data);
            

			if ($save_form_workoutstep) {
				if ($this->input->post('save_type') == 'stay') {
					$this->data['success'] = true;
					$this->data['id'] 	   = $save_form_workoutstep;
					$this->data['message'] = cclang('success_save_data_stay', [
						anchor('administrator/form_workoutstep/edit/' . $save_form_workoutstep, 'Edit Form Workoutstep'),
						anchor('administrator/form_workoutstep', ' Go back to list')
					]);
				} else {
					set_message(
						cclang('success_save_data_redirect', [
						anchor('administrator/form_workoutstep/edit/' . $save_form_workoutstep, 'Edit Form Workoutstep')
					]), 'success');

            		$this->data['success'] = true;
					$this->data['redirect'] = base_url('administrator/form_workoutstep');
				}
			} else {
				if ($this->input->post('save_type') == 'stay') {
					$this->data['success'] = false;
					$this->data['message'] = cclang('data_not_change');
				} else {
            		$this->data['success'] = false;
            		$this->data['message'] = cclang('data_not_change');
					$this->data['redirect'] = base_url('administrator/form_workoutstep');
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
	* Update view Form Workoutsteps
	*
	* @var $id String
	*/
	public function edit($id)
	{
		$this->is_allowed('form_workoutstep_update');

		$this->data['form_workoutstep'] = $this->model_form_workoutstep->find($id);

		$this->template->title('Form Workoutstep Update');
		$this->render('backend/standart/administrator/form_workoutstep/form_workoutstep_update', $this->data);
	}

	/**
	* Update Form Workoutsteps
	*
	* @var $id String
	*/
	public function edit_save($id)
	{
		if (!$this->is_allowed('form_workoutstep_update', false)) {
			echo json_encode([
				'success' => false,
				'message' => cclang('sorry_you_do_not_have_permission_to_access')
				]);
			exit;
		}
		
		$this->form_validation->set_rules('workout_id', 'Workout Id', 'trim|required|max_length[11]');
		$this->form_validation->set_rules('step_id', 'Step Id', 'trim|required|max_length[11]');
		$this->form_validation->set_rules('nose_x', 'Nose X', 'trim|required');
		$this->form_validation->set_rules('right_eye_x', 'Right Eye X', 'trim|required');
		$this->form_validation->set_rules('left_eye_x', 'Left Eye X', 'trim|required');
		$this->form_validation->set_rules('right_ear_x', 'Right Ear X', 'trim|required');
		$this->form_validation->set_rules('left_ear_x', 'Left Ear X', 'trim|required');
		$this->form_validation->set_rules('right_shoulder_x', 'Right Shoulder X', 'trim|required');
		$this->form_validation->set_rules('left_shoulder_x', 'Left Shoulder X', 'trim|required');
		$this->form_validation->set_rules('right_elbow_x', 'Right Elbow X', 'trim|required');
		$this->form_validation->set_rules('left_elbow_x', 'Left Elbow X', 'trim|required');
		$this->form_validation->set_rules('right_wrist_x', 'Right Wrist X', 'trim|required');
		$this->form_validation->set_rules('left_wrist_x', 'Left Wrist X', 'trim|required');
		$this->form_validation->set_rules('right_hip_x', 'Right Hip X', 'trim|required');
		$this->form_validation->set_rules('left_hip_x', 'Left Hip X', 'trim|required');
		$this->form_validation->set_rules('right_knee_x', 'Right Knee X', 'trim|required');
		$this->form_validation->set_rules('left_knee_x', 'Left Knee X', 'trim|required');
		$this->form_validation->set_rules('right_ankle_x', 'Right Ankle X', 'trim|required');
		$this->form_validation->set_rules('left_ankle_x', 'Left Ankle X', 'trim|required');
		$this->form_validation->set_rules('nose_y', 'Nose Y', 'trim|required');
		$this->form_validation->set_rules('right_eye_y', 'Right Eye Y', 'trim|required');
		$this->form_validation->set_rules('left_eye_y', 'Left Eye Y', 'trim|required');
		$this->form_validation->set_rules('right_ear_y', 'Right Ear Y', 'trim|required');
		$this->form_validation->set_rules('left_ear_y', 'Left Ear Y', 'trim|required');
		$this->form_validation->set_rules('right_shoulder_y', 'Right Shoulder Y', 'trim|required');
		$this->form_validation->set_rules('left_shoulder_y', 'Left Shoulder Y', 'trim|required');
		$this->form_validation->set_rules('right_elbow_y', 'Right Elbow Y', 'trim|required');
		$this->form_validation->set_rules('left_elbow_y', 'Left Elbow Y', 'trim|required');
		$this->form_validation->set_rules('right_wrist_y', 'Right Wrist Y', 'trim|required');
		$this->form_validation->set_rules('left_wrist_y', 'Left Wrist Y', 'trim|required');
		$this->form_validation->set_rules('right_hip_y', 'Right Hip Y', 'trim|required');
		$this->form_validation->set_rules('left_hip_y', 'Left Hip Y', 'trim|required');
		$this->form_validation->set_rules('right_knee_y', 'Right Knee Y', 'trim|required');
		$this->form_validation->set_rules('left_knee_y', 'Left Knee Y', 'trim|required');
		$this->form_validation->set_rules('right_ankle_y', 'Right Ankle Y', 'trim|required');
		$this->form_validation->set_rules('left_ankle_y', 'Left Ankle Y', 'trim|required');
		$this->form_validation->set_rules('nose_check', 'Nose Check', 'trim|required|max_length[1]');
		$this->form_validation->set_rules('eye_check', 'Eye Check', 'trim|required|max_length[1]');
		$this->form_validation->set_rules('ear_check', 'Ear Check', 'trim|required|max_length[1]');
		$this->form_validation->set_rules('shoulder_check', 'Shoulder Check', 'trim|required|max_length[1]');
		$this->form_validation->set_rules('elbow_check', 'Elbow Check', 'trim|required|max_length[1]');
		$this->form_validation->set_rules('wrist_check', 'Wrist Check', 'trim|required|max_length[1]');
		$this->form_validation->set_rules('hip_check', 'Hip Check', 'trim|required|max_length[1]');
		$this->form_validation->set_rules('knee_check', 'Knee Check', 'trim|required|max_length[1]');
		$this->form_validation->set_rules('foot_check', 'Foot Check', 'trim|required|max_length[1]');
		
		if ($this->form_validation->run()) {
		
			$save_data = [
				'workout_id' => $this->input->post('workout_id'),
				'step_id' => $this->input->post('step_id'),
				'nose_x' => $this->input->post('nose_x'),
				'right_eye_x' => $this->input->post('right_eye_x'),
				'left_eye_x' => $this->input->post('left_eye_x'),
				'right_ear_x' => $this->input->post('right_ear_x'),
				'left_ear_x' => $this->input->post('left_ear_x'),
				'right_shoulder_x' => $this->input->post('right_shoulder_x'),
				'left_shoulder_x' => $this->input->post('left_shoulder_x'),
				'right_elbow_x' => $this->input->post('right_elbow_x'),
				'left_elbow_x' => $this->input->post('left_elbow_x'),
				'right_wrist_x' => $this->input->post('right_wrist_x'),
				'left_wrist_x' => $this->input->post('left_wrist_x'),
				'right_hip_x' => $this->input->post('right_hip_x'),
				'left_hip_x' => $this->input->post('left_hip_x'),
				'right_knee_x' => $this->input->post('right_knee_x'),
				'left_knee_x' => $this->input->post('left_knee_x'),
				'right_ankle_x' => $this->input->post('right_ankle_x'),
				'left_ankle_x' => $this->input->post('left_ankle_x'),
				'nose_y' => $this->input->post('nose_y'),
				'right_eye_y' => $this->input->post('right_eye_y'),
				'left_eye_y' => $this->input->post('left_eye_y'),
				'right_ear_y' => $this->input->post('right_ear_y'),
				'left_ear_y' => $this->input->post('left_ear_y'),
				'right_shoulder_y' => $this->input->post('right_shoulder_y'),
				'left_shoulder_y' => $this->input->post('left_shoulder_y'),
				'right_elbow_y' => $this->input->post('right_elbow_y'),
				'left_elbow_y' => $this->input->post('left_elbow_y'),
				'right_wrist_y' => $this->input->post('right_wrist_y'),
				'left_wrist_y' => $this->input->post('left_wrist_y'),
				'right_hip_y' => $this->input->post('right_hip_y'),
				'left_hip_y' => $this->input->post('left_hip_y'),
				'right_knee_y' => $this->input->post('right_knee_y'),
				'left_knee_y' => $this->input->post('left_knee_y'),
				'right_ankle_y' => $this->input->post('right_ankle_y'),
				'left_ankle_y' => $this->input->post('left_ankle_y'),
				'nose_check' => $this->input->post('nose_check'),
				'eye_check' => $this->input->post('eye_check'),
				'ear_check' => $this->input->post('ear_check'),
				'shoulder_check' => $this->input->post('shoulder_check'),
				'elbow_check' => $this->input->post('elbow_check'),
				'wrist_check' => $this->input->post('wrist_check'),
				'hip_check' => $this->input->post('hip_check'),
				'knee_check' => $this->input->post('knee_check'),
				'foot_check' => $this->input->post('foot_check'),
			];

			
			$save_form_workoutstep = $this->model_form_workoutstep->change($id, $save_data);

			if ($save_form_workoutstep) {
				if ($this->input->post('save_type') == 'stay') {
					$this->data['success'] = true;
					$this->data['id'] 	   = $id;
					$this->data['message'] = cclang('success_update_data_stay', [
						anchor('administrator/form_workoutstep', ' Go back to list')
					]);
				} else {
					set_message(
						cclang('success_update_data_redirect', [
					]), 'success');

            		$this->data['success'] = true;
					$this->data['redirect'] = base_url('administrator/form_workoutstep');
				}
			} else {
				if ($this->input->post('save_type') == 'stay') {
					$this->data['success'] = false;
					$this->data['message'] = cclang('data_not_change');
				} else {
            		$this->data['success'] = false;
            		$this->data['message'] = cclang('data_not_change');
					$this->data['redirect'] = base_url('administrator/form_workoutstep');
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
	* delete Form Workoutsteps
	*
	* @var $id String
	*/
	public function delete($id = null)
	{
		$this->is_allowed('form_workoutstep_delete');

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
            set_message(cclang('has_been_deleted', 'form_workoutstep'), 'success');
        } else {
            set_message(cclang('error_delete', 'form_workoutstep'), 'error');
        }

		redirect_back();
	}

		/**
	* View view Form Workoutsteps
	*
	* @var $id String
	*/
	public function view($id)
	{
		$this->is_allowed('form_workoutstep_view');

		$this->data['form_workoutstep'] = $this->model_form_workoutstep->join_avaiable()->filter_avaiable()->find($id);

		$this->template->title('Form Workoutstep Detail');
		$this->render('backend/standart/administrator/form_workoutstep/form_workoutstep_view', $this->data);
	}
	
	/**
	* delete Form Workoutsteps
	*
	* @var $id String
	*/
	private function _remove($id)
	{
		$form_workoutstep = $this->model_form_workoutstep->find($id);

		
		
		return $this->model_form_workoutstep->remove($id);
	}
	
	
	/**
	* Export to excel
	*
	* @return Files Excel .xls
	*/
	public function export()
	{
		$this->is_allowed('form_workoutstep_export');

		$this->model_form_workoutstep->export(
			'form_workoutstep', 
			'form_workoutstep',
			$this->model_form_workoutstep->field_search
		);
	}

	/**
	* Export to PDF
	*
	* @return Files PDF .pdf
	*/
	public function export_pdf()
	{
		$this->is_allowed('form_workoutstep_export');

		$this->model_form_workoutstep->pdf('form_workoutstep', 'form_workoutstep');
	}


	public function single_pdf($id = null)
	{
		$this->is_allowed('form_workoutstep_export');

		$table = $title = 'form_workoutstep';
		$this->load->library('HtmlPdf');
      
        $config = array(
            'orientation' => 'p',
            'format' => 'a4',
            'marges' => array(5, 5, 5, 5)
        );

        $this->pdf = new HtmlPdf($config);
        $this->pdf->setDefaultFont('stsongstdlight'); 

        $result = $this->db->get($table);
       
        $data = $this->model_form_workoutstep->find($id);
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


/* End of file form_workoutstep.php */
/* Location: ./application/controllers/administrator/Form Workoutstep.php */