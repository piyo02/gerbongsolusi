<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Event extends Public_Controller {
	private $parent_page = 'visitor';
	private $current_page = 'visitor/event/';

	function __construct()
	{
		parent::__construct();
		$this->load->model(array(
			'gallery_model',
			'event_model',
			'contact_model',
			'comment_model',
			'category_model',
		));
	}
	public function index()
	{
		$start = 0; $limit = 3; $is_news = 0;
		$this->data['popular_event'] = $this->event_model->events_most_popular( $start, $limit, $is_news )->result();
		// var_dump($this->data['popular_event']); die;

		$contacts = $this->contact_model->contacts( 1 )->result();

		$start = 0; $limit = NULL; $is_news = 0;
		$this->data['events'] = $this->event_model->events( $start, $limit, $is_news )->result();
		$this->data['current_page'] = site_url('visitor/event/');
		$this->data['contacts'] = $contacts;
		$this->render("visitor/event", 'visitor_master');
	}
	public function article( $article )
	{
		$start = 0; $limit = 3; $is_news = 0;
		$this->data['news'] = $this->event_model->events( $start, $limit, $is_news )->result();
		$news = $this->event_model->event_by_file_content( $article, 0 )->row();
		
		$data['hit'] = $news->hit + 1;
		$data_param['id'] = $news->id;
		$this->event_model->update( $data, $data_param )->row();
		
		$galleries = $this->gallery_model->galleries_by_event_id( $news->id )->result();
		
		
		$upload_path = 'uploads/event/';
		
		$config['upload_path'] = './'.$upload_path;
		$file = str_replace( "%20", " ", $article );
		$file_content = file_get_contents(  $config['upload_path'] . $file );
		
		$this->data['article'] = $news;
		$this->data['galleries'] = $galleries;
		$this->data['file_content'] = $file_content;
		$this->data['comments'] = $this->comment_model->tree( $news->id );
		$this->data['comment_list'] = $this->comment_model->get_comment_list(  );
		// var_dump( $this->data['comments'] ); die;
		$this->render("visitor/plain_article", 'visitor_master');
	}

	public function comment(  )
	{
		if( !($_POST) ) redirect(site_url(  $this->current_page ));  

		// echo var_dump( $data );return;
		$article = $this->input->post( 'article' );
		$this->form_validation->set_rules( 'message', "Komentar", 'required|trim' );
        if ($this->form_validation->run() === TRUE )
        {
			// echo 'oke'; die;
			$data['event_id'] = $this->input->post( 'event_id' );
			$data['comment_id'] = $this->input->post( 'comment_id' );
			$data['visitor_id'] = 1;
			$data['message'] = $this->input->post( 'message' );
			$data['timestamp'] = time();

			if( $this->comment_model->create( $data ) ){
				$this->session->set_flashdata('alert', $this->alert->set_alert( Alert::SUCCESS, $this->comment_model->messages() ) );
			}else{
				$this->session->set_flashdata('alert', $this->alert->set_alert( Alert::DANGER, $this->comment_model->errors() ) );
			}
		}
        else
        {
          $this->data['message'] = (validation_errors() ? validation_errors() : ($this->m_account->errors() ? $this->comment_model->errors() : $this->session->flashdata('message')));
          if(  validation_errors() || $this->comment_model->errors() ) $this->session->set_flashdata('alert', $this->alert->set_alert( Alert::DANGER, $this->data['message'] ) );
		}
		
		redirect( site_url($this->current_page) . 'article/' . $article );
	}
}
