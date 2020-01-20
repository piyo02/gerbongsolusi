<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Company extends Public_Controller {

	function __construct()
	{
			parent::__construct();
	}
	public function index()
	{
		// TODO : tampilkan landing page bagi user yang belum daftar
		$this->render("visitor/company", 'visitor_master');
	}
}