<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Team extends Public_Controller {

	function __construct()
	{
			parent::__construct();
	}
	public function index()
	{
		// TODO : tampilkan landing page bagi user yang belum daftar
		$this->render("visitor/team", 'visitor_master');
	}
}