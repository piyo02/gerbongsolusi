<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class News extends Public_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->model(array(
			'gallery_model',
			'event_model',
			'contact_model',
			'category_model',
		));
	}
	public function index()
	{
		// TODO : tampilkan landing page bagi user yang belum daftar
		$contacts = $this->contact_model->contacts( 1 )->result();
		$this->data['news'] = $this->event_model->events( 0, NULL, 1 )->result();
		$this->data['current_page'] = site_url('visitor/news/');
		$this->data['contacts'] = $contacts;
		// var_dump($this->data['news']); die;
		$this->render("visitor/news", 'visitor_master');
	}
	public function article( $article )
	{
		$news = $this->event_model->event_by_file_content( $article, 1 )->row();
		
		// $data['hit'] = $news->hit + 1;
		// $data_param['id'] = $news->id;
		// $this->event_model->update( $data, $data_param )->row();
		
		$galleries = $this->gallery_model->galleries_by_event_id( $news->id )->result();
		// var_dump( $galleries ); die;
		
		$upload_path = 'uploads/news/';

		$config['upload_path'] = './'.$upload_path;
		$file = str_replace( "%20", " ", $article );
		$file_content = file_get_contents(  $config['upload_path'] . $file );

		$this->data['article'] = $news;
		$this->data['galleries'] = $galleries;
		$this->data['file_content'] = $file_content;
		$this->render("visitor/plain_article", 'visitor_master');
	}
}