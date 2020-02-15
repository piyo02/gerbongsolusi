<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Contact extends Public_Controller {

	function __construct()
	{
			parent::__construct();
			$this->load->model(array(
				'contact_model',
			));
	}
	public function index()
	{
		// TODO : tampilkan landing page bagi user yang belum daftar
		$this->data['logo'] = $this->load->view('visitor/logo', null, true );
		$this->render("visitor/contact", 'visitor_master');
	}

	public function sendEmail()
	{
		if(!$_POST) redirect( 'visitor/contact' );
		
		$config = array(
			'protocol'  => 'smtp',
			'smtp_host' => 'ssl://smtp.googlemail.com',
			'smtp_port' => 465,
			'smtp_user' => 'vncrms20@gmail.com',
			'smtp_pass' => '135qet246',
			'mailtype'  => 'html',
			'charset'   => 'utf-8',
			'wordwrap' => TRUE,
		);
		$this->load->library('email');
		$this->email->initialize( $config );

		$this->email->set_newline("\r\n");
		$name = $this->input->post('name');
		$email = $this->input->post('email');
		$subject = $this->input->post('subject');
		$message = $this->input->post('message');
		
		$Companysemail = 'gerbongsolusimanagementkendari@gmail.com';
		

		$this->email->from($email, $name);
		$this->email->to($Companysemail);

		$this->email->subject('test');
		$this->email->message('hello world');

		if( $this->email->send() ){
			echo 'true'; die;
		}else {
			show_error($this->email->print_debugger());
			die;
		}
		
		redirect( 'visitor/contact' );
	}
}