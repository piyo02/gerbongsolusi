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
		
		$this->load->library('email');
		$config = array(
			'protocol'  => 'smtp',
			'smtp_host' => 'smtp.gmail.com',
			'smtp_user' => 'vncrms20@gmail.com',
			'smtp_pass' => '135qet246',
			'smtp_crypto' => 'tls',
			'smtp_auth' => TRUE,
			'send_multipart' => FALSE,
			'smtp_port' => 587,
			'mailtype'  => 'html',
			'wordwrap' => TRUE,
			'charset'   => 'utf-8',
		);
		$this->email->initialize( $config );

		$this->email->set_newline("\r\n");
		// var_dump( $config ); die;
		$name = $this->input->post('name');
		$email = $this->input->post('email');
		$subject = $this->input->post('subject');
		$message = $this->input->post('message');
		
		$Companysemail = 'alzidni2000@gmail.com';
		

		$this->email->from( $email , $name);
		$this->email->to( $Companysemail );
		// $this->email->cc('another@another-example.com');
		// $this->email->bcc('them@their-example.com');

		$this->email->subject( $subject );
		$this->email->message( $message );

		if( $this->email->send() ){
			echo 'true'; die;
		}else {
			echo $this->email->print_debugger();
			die;
		}
		
		redirect( 'visitor/contact' );
	}
}