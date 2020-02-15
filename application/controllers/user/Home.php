<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends User_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->model(array(
			'client_model',
			'division_model',
			'event_model',
			'employee_model',
			'category_model',
		));

	}
	public function index()
	{
		$this->data['client'] = $this->client_model->clients()->num_rows();
		$this->data['employee'] = $this->employee_model->employees()->num_rows();
		$this->data['event'] = $this->event_model->events()->num_rows();
		$this->data['news'] = $this->event_model->events( 0, NULL, 1 )->num_rows();
		$this->data[ "page_title" ] = "Beranda";
		$this->render( "user/dashboard/content" );
	}
}