<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class News extends Public_Controller {

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
		$this->data['news'] = $this->event_model->events( 0, NULL, 1 )->result();
		// var_dump($this->data['news']); die;
		$this->render("visitor/news", 'visitor_master');
	}
}