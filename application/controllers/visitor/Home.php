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
		));
	}
	public function index()
	{
		$start = 0;
		$limit = 3;
		$is_news = 1;
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