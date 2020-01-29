<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Team extends Public_Controller {

	function __construct()
	{
			parent::__construct();
			$this->load->model(array(
				'employee_model',
				'division_model',
			));
	}
	public function index()
	{
		// TODO : tampilkan landing page bagi user yang belum daftar
		$divisions = $this->division_model->divisions()->result();

		foreach ($divisions as $key => $division) {
			$teams[] = $this->employee_model->employees_by_division_id( 0, NULL, $division->id )->result();
		}
		$this->data['teams'] = $teams;
		$this->render("visitor/team", 'visitor_master');
	}
}