<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Home extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		ob_start();
		 $this->load->database();
        $this->load->helper('url');
		$this->load->library('grocery_CRUD');
		$this->load->model('grocery_CRUD_Model');
	}
	function _order_output($output = null)
	{
		$this->load->view('add_order_view',$output);
	}/*
	function _output($html = null)
	{
		echo $html;
	}
*/

	public function add_order()
	{
		$crud = new grocery_CRUD();
		$crud->set_theme('Flexigrid');
		$crud->set_subject('New Order');
		$crud->set_table('orders');
		$crud->fields('item_id','item_quantity','main_item_id');//,'order_start_date --> will be inserted automatically and order_status--> will be inserted from office boy;
		$crud->set_rules('item_id','Main Drink','required')->display_as('item_id','Main Drink')
			 ->set_rules('item_quantity','Item Quantity','required')->display_as('item_quantity','Item Quantity');
		//	 ->set_rules('main_item_id','','required')->display_as('main_item_id','Main');
	
		$output = $crud->render();
		$this->_order_output($output);
	}
	public function admin_panel()
	{
		echo "hi admin";
	}
}

