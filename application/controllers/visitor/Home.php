<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends Public_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->model(array(
			'group_model',
			'event_model',
			'category_model',
			'client_model',
			'visitor_model',
		));
	}
	public function index()
	{
		$ip_address = $this->input->ip_address();
		$visitor = $this->visitor_model->visitor_by_ip_address( $ip_address )->row();

		if( isset( $visitor->id ) ){
			$session['visitor_id'] = $visitor->id;
			$session['visitor_name'] = $visitor->username;
			$session['visitor_image'] = $visitor->image;

			$this->session->set_userdata( $session );
		}

		// var_dump( $this->input->ip_address() ); die;
		$start = 0;
		$limit = 3;
		$is_news = 0;
		$this->data['events'] = $this->event_model->events( $start, $limit, $is_news )->result();
		
		// $this->data['clients'] = array();
		$this->data['clients'] = $this->client_model->clients(  )->result();

		$limit = 5;
		$gallery['events'] = $this->event_model->events_most_popular( $start, $limit, $is_news )->result();
		// $data['gallery'] = $this->load->view('visitor/gallery', $gallery, true );
		$data['logo'] = $this->load->view('visitor/logo', null, true );
		$slider['content_heroArea'] = $this->load->view('visitor/slider', $data, true );
		$this->data['heroArea'] = $this->load->view('templates/_visitor_parts/hero_area', $slider, true);
		// var_dump($this->data['events']); die;
		$this->render("visitor/home", 'visitor_master');
	}
}