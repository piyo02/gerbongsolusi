<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends Public_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->model(array(
			'group_model',
			'event_model',
			'category_model',
		));
	}
	public function index()
	{
		// TODO : tampilkan landing page bagi user yang belum daftar
		// var_dump($this->data['_menus']); die;
		$this->render("visitor/home", 'visitor_master');
	}
}