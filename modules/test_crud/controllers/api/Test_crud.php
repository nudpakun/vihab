<?php
defined('BASEPATH') OR exit('No direct script access allowed');

use \Firebase\JWT\JWT;

class Test_crud extends API
{
	
	public function __construct()
	{
		parent::__construct();
		$this->load->model('model_api_test_crud');
	}

	/**
	 * @api {get} /test_crud/all Get all test_cruds.
	 * @apiVersion 0.1.0
	 * @apiName AllTestcrud 
	 * @apiGroup test_crud
	 * @apiHeader {String} X-Api-Key Test cruds unique access-key.
	 * @apiHeader {String} X-Token Test cruds unique token.
	 * @apiPermission Test crud Cant be Accessed permission name : api_test_crud_all
	 *
	 * @apiParam {String} [Filter=null] Optional filter of Test cruds.
	 * @apiParam {String} [Field="All Field"] Optional field of Test cruds : no, definition.
	 * @apiParam {String} [Start=0] Optional start index of Test cruds.
	 * @apiParam {String} [Limit=10] Optional limit data of Test cruds.
	 *
	 *
	 * @apiSuccess {Boolean} Status status response api.
	 * @apiSuccess {String} Message message response api.
	 * @apiSuccess {Array} Data data of test_crud.
	 *
	 * @apiSuccessExample Success-Response:
	 *     HTTP/1.1 200 OK
	 *
	 * @apiError NoDataTest crud Test crud data is nothing.
	 *
	 * @apiErrorExample Error-Response:
	 *     HTTP/1.1 403 Not Acceptable
	 *
	 */
	public function all_get()
	{
		$this->is_allowed('api_test_crud_all');

		$filter = $this->get('filter');
		$field = $this->get('field');
		$limit = $this->get('limit') ? $this->get('limit') : $this->limit_page;
		$start = $this->get('start');

		$select_field = ['no', 'definition'];
		$test_cruds = $this->model_api_test_crud->get($filter, $field, $limit, $start, $select_field);
		$total = $this->model_api_test_crud->count_all($filter, $field);
		$test_cruds = array_map(function($row){
						
			return $row;
		}, $test_cruds);

		$data['test_crud'] = $test_cruds;
				
		$this->response([
			'status' 	=> true,
			'message' 	=> 'Data Test crud',
			'data'	 	=> $data,
			'total' 	=> $total,
		], API::HTTP_OK);
	}

		/**
	 * @api {get} /test_crud/detail Detail Test crud.
	 * @apiVersion 0.1.0
	 * @apiName DetailTest crud
	 * @apiGroup test_crud
	 * @apiHeader {String} X-Api-Key Test cruds unique access-key.
	 * @apiHeader {String} X-Token Test cruds unique token.
	 * @apiPermission Test crud Cant be Accessed permission name : api_test_crud_detail
	 *
	 * @apiParam {Integer} Id Mandatory id of Test cruds.
	 *
	 * @apiSuccess {Boolean} Status status response api.
	 * @apiSuccess {String} Message message response api.
	 * @apiSuccess {Array} Data data of test_crud.
	 *
	 * @apiSuccessExample Success-Response:
	 *     HTTP/1.1 200 OK
	 *
	 * @apiError Test crudNotFound Test crud data is not found.
	 *
	 * @apiErrorExample Error-Response:
	 *     HTTP/1.1 403 Not Acceptable
	 *
	 */
	public function detail_get()
	{
		$this->is_allowed('api_test_crud_detail');

		$this->requiredInput(['no']);

		$id = $this->get('no');

		$select_field = ['no', 'definition'];
		$test_crud = $this->model_api_test_crud->find($id, $select_field);

		if (!$test_crud) {
			$this->response([
					'status' 	=> false,
					'message' 	=> 'Blog not found'
				], API::HTTP_NOT_FOUND);
		}

					
		$data['test_crud'] = $test_crud;
		if ($data['test_crud']) {
			
			$this->response([
				'status' 	=> true,
				'message' 	=> 'Detail Test crud',
				'data'	 	=> $data
			], API::HTTP_OK);
		} else {
			$this->response([
				'status' 	=> false,
				'message' 	=> 'Test crud not found'
			], API::HTTP_NOT_ACCEPTABLE);
		}
	}

	
	/**
	 * @api {post} /test_crud/add Add Test crud.
	 * @apiVersion 0.1.0
	 * @apiName AddTest crud
	 * @apiGroup test_crud
	 * @apiHeader {String} X-Api-Key Test cruds unique access-key.
	 * @apiHeader {String} X-Token Test cruds unique token.
	 * @apiPermission Test crud Cant be Accessed permission name : api_test_crud_add
	 *
 	 *
	 * @apiSuccess {Boolean} Status status response api.
	 * @apiSuccess {String} Message message response api.
	 *
	 * @apiSuccessExample Success-Response:
	 *     HTTP/1.1 200 OK
	 *
	 * @apiError ValidationError Error validation.
	 *
	 * @apiErrorExample Error-Response:
	 *     HTTP/1.1 403 Not Acceptable
	 *
	 */
	public function add_post()
	{
		$this->is_allowed('api_test_crud_add');

		
		if ($this->form_validation->run()) {

			$save_data = [
			];
			
			$save_test_crud = $this->model_api_test_crud->store($save_data);

			if ($save_test_crud) {
				$this->response([
					'status' 	=> true,
					'message' 	=> 'Your data has been successfully stored into the database'
				], API::HTTP_OK);

			} else {
				$this->response([
					'status' 	=> false,
					'message' 	=> cclang('data_not_change')
				], API::HTTP_NOT_ACCEPTABLE);
			}

		} else {
			$this->response([
				'status' 	=> false,
				'message' 	=> 'Validation Errors.',
				'errors' 	=> $this->form_validation->error_array()
			], API::HTTP_NOT_ACCEPTABLE);
		}
	}

	/**
	 * @api {post} /test_crud/update Update Test crud.
	 * @apiVersion 0.1.0
	 * @apiName UpdateTest crud
	 * @apiGroup test_crud
	 * @apiHeader {String} X-Api-Key Test cruds unique access-key.
	 * @apiHeader {String} X-Token Test cruds unique token.
	 * @apiPermission Test crud Cant be Accessed permission name : api_test_crud_update
	 *
	 * @apiParam {Integer} no Mandatory no of Test Crud.
	 *
	 * @apiSuccess {Boolean} Status status response api.
	 * @apiSuccess {String} Message message response api.
	 *
	 * @apiSuccessExample Success-Response:
	 *     HTTP/1.1 200 OK
	 *
	 * @apiError ValidationError Error validation.
	 *
	 * @apiErrorExample Error-Response:
	 *     HTTP/1.1 403 Not Acceptable
	 *
	 */
	public function update_post()
	{
		$this->is_allowed('api_test_crud_update');

		
		
		if ($this->form_validation->run()) {

			$save_data = [
			];
			
			$save_test_crud = $this->model_api_test_crud->change($this->post('no'), $save_data);

			if ($save_test_crud) {
				$this->response([
					'status' 	=> true,
					'message' 	=> 'Your data has been successfully updated into the database'
				], API::HTTP_OK);

			} else {
				$this->response([
					'status' 	=> false,
					'message' 	=> cclang('data_not_change')
				], API::HTTP_NOT_ACCEPTABLE);
			}

		} else {
			$this->response([
				'status' 	=> false,
				'message' 	=> 'Validation Errors.',
				'errors' 	=> $this->form_validation->error_array()
			], API::HTTP_NOT_ACCEPTABLE);
		}
	}
	
	/**
	 * @api {post} /test_crud/delete Delete Test crud. 
	 * @apiVersion 0.1.0
	 * @apiName DeleteTest crud
	 * @apiGroup test_crud
	 * @apiHeader {String} X-Api-Key Test cruds unique access-key.
	 * @apiHeader {String} X-Token Test cruds unique token.
	 	 * @apiPermission Test crud Cant be Accessed permission name : api_test_crud_delete
	 *
	 * @apiParam {Integer} Id Mandatory id of Test cruds .
	 *
	 * @apiSuccess {Boolean} Status status response api.
	 * @apiSuccess {String} Message message response api.
	 *
	 * @apiSuccessExample Success-Response:
	 *     HTTP/1.1 200 OK
	 *
	 * @apiError ValidationError Error validation.
	 *
	 * @apiErrorExample Error-Response:
	 *     HTTP/1.1 403 Not Acceptable
	 *
	 */
	public function delete_post()
	{
		$this->is_allowed('api_test_crud_delete');

		$test_crud = $this->model_api_test_crud->find($this->post('no'));

		if (!$test_crud) {
			$this->response([
				'status' 	=> false,
				'message' 	=> 'Test crud not found'
			], API::HTTP_NOT_ACCEPTABLE);
		} else {
			$delete = $this->model_api_test_crud->remove($this->post('no'));

			}
		
		if ($delete) {
			$this->response([
				'status' 	=> true,
				'message' 	=> 'Test crud deleted',
			], API::HTTP_OK);
		} else {
			$this->response([
				'status' 	=> false,
				'message' 	=> 'Test crud not delete'
			], API::HTTP_NOT_ACCEPTABLE);
		}
	}
	
}

/* End of file Test crud.php */
/* Location: ./application/controllers/api/Test crud.php */