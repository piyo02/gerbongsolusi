<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Company extends Public_Controller {

	function __construct()
	{
			parent::__construct();
			$this->load->model(array(
				'group_model',
				'company_model',
				'contact_model',
				'icon_model',
			));
	}
	public function index()
	{
		$company = $this->company_model->company()->row();
		$contacts = $this->contact_model->contacts( 1 )->result();
		$upload_path = 'uploads/logo/';

		$config['upload_path'] = './'.$upload_path;
		$file_content = file_get_contents(  $config['upload_path'] . $company->description );

		$this->data['file_content'] = $file_content;
		$this->data['company'] = $company;
		$this->data['contacts'] = $contacts;
		// var_dump($company); die;
		// TODO : tampilkan landing page bagi user yang belum daftar
		$this->render("visitor/company", 'visitor_master');
	}
}