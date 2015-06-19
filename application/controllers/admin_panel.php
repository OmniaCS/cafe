<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class admin_panel extends CI_Controller {
	function __construct()
	{
		parent::__construct();
		ob_start();
		$this->load->database();
        $this->load->helper('url');
		$this->load->library('grocery_CRUD');
		$this->load->model('grocery_CRUD_Model');
	}
	function _add_employees_output($output = null){
		$this->load->view('add_employee_view',$output);
	}
	public function add_employees(){
		$crud = new grocery_CRUD();
		$crud->set_theme('Flexigrid');
		$crud->set_subject('New Employee');
		$crud->set_table('employees');
		$crud->fields('emp_first_name','emp_last_name','emp_email','station_number','createdBy');
		$crud->set_rules('emp_first_name','First name','required')->display_as('emp_first_name','First name')
			 ->set_rules('emp_last_name','Last name','required')->display_as('emp_last_name','Last name')
			 ->set_rules('emp_email','Email Address','required')->display_as('emp_email','Email Address')
			 ->set_rules('station_number','Station number','required')->display_as('station_number','Station number')
			 ->set_rules('createdBy','CreatedBy','required')->display_as('createdBy','CreatedBy');
		$output = $crud->render();
		$this->_add_employees_output($output);


	} 

}
