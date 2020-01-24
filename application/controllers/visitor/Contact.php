<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Contact extends Public_Controller {

	function __construct()
	{
			parent::__construct();
	}
	public function index()
	{
		// TODO : tampilkan landing page bagi user yang belum daftar
		$this->data['logo'] = $this->load->view('visitor/logo', null, true );
		$this->render("visitor/contact", 'visitor_master');
	}
}