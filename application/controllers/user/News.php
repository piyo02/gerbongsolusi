<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class News extends User_Controller {
	private $services = null;
    private $name = null;
    private $parent_page = 'user';
	private $current_page = 'user/news/';
	
	public function __construct(){
		parent::__construct();
		$this->load->library('services/News_services');
		$this->services = new News_services;
		$this->load->model(array(
			'group_model',
			'event_model',
			'category_model',
		));
		$this->data['menu_list_id'] = 'news_index';
	}
	public function index()
	{
		$page = ($this->uri->segment(4)) ? ($this->uri->segment(4) -  1 ) : 0;
		// echo $page; return;
        //pagination parameter
        $pagination['base_url'] = base_url( $this->current_page ) .'/index';
        $pagination['total_records'] = $this->event_model->record_count() ;
        $pagination['limit_per_page'] = 10;
        $pagination['start_record'] = $page*$pagination['limit_per_page'];
        $pagination['uri_segment'] = 4;
		//set pagination
		if ($pagination['total_records'] > 0 ) $this->data['pagination_links'] = $this->setPagination($pagination);
		#################################################################3
		$table = $this->services->get_table_config( $this->current_page );
		$table[ "rows" ] = $this->event_model->events( $pagination['start_record'], $pagination['limit_per_page'], 1 )->result();
		$table = $this->load->view('templates/tables/plain_table_image', $table, true);
		$this->data[ "contents" ] = $table;
		$add_menu = array(
			"name" => "Tambah Berita",
			"modal_id" => "add_group_",
			"button_color" => "primary",
			"url" => site_url( $this->current_page."add/"),
			'data' => NULL
		);

		$add_menu= $this->load->view('templates/actions/link', $add_menu, true ); 

		$this->data[ "header_button" ] =  $add_menu;
		// return;
		#################################################################3
		$alert = $this->session->flashdata('alert');
		$this->data["key"] = $this->input->get('key', FALSE);
		$this->data["alert"] = (isset($alert)) ? $alert : NULL ;
		$this->data["current_page"] = $this->current_page;
		$this->data["block_header"] = "Berita";
		$this->data["header"] = "Berita";
		$this->data["sub_header"] = 'Klik Tombol Action Untuk Aksi Lebih Lanjut';
		$this->render( "templates/contents/plain_content" );
	}


	public function add(  )
	{
		// echo var_dump( $data );return;
		$this->form_validation->set_rules( $this->services->validation_config() );
        if ($this->form_validation->run() === TRUE )
        {
			$data['category_id'] = $this->input->post( 'category_id' );
			$data['title'] = $this->input->post( 'title' );
			$data['date'] = date('Y-m-d', strtotime($this->input->post( 'date' )));
			$data['preview'] = $this->input->post( 'preview' );
			$data['hit'] = 0;
			$data['is_news'] = 1;
			$data['timestamp'] = time();

			// $a = file_get_contents($upload_path.$file_name);

			// echo $a ;
			$this->load->library('upload');
			$title = str_replace( ".", "_",   $data['title']  ); // Load librari upload
			$title = str_replace( "/", "_",   $title  ); // Load librari upload
			$config = $this->services->get_photo_upload_config( $title );

			$this->upload->initialize( $config );
			// echo var_dump( $_FILES ); return;
			// if( $_FILES['image']['name'] != "" )
			if( $this->upload->do_upload("image") )
			{
				$data['image'] = $this->upload->data()["file_name"];
				// if( !@unlink( $config['upload_path'].$this->input->post( 'file' ) ) );
			}
			else
			{
				$this->session->set_flashdata('alert', $this->alert->set_alert( Alert::DANGER, $this->upload->display_errors() ) );
				redirect( site_url($this->current_page."add/")  );
			}
			// buat content html
			$config =  $this->services->get_file_upload_config( $title );

			if( file_put_contents( $config['upload_path'].$config['file_name'] , $this->input->post( 'summernote' ))  )
			{
				$data['file_content'] = $config['file_name'];
			}
			else
			{
				$data['file_content'] = "default.html";
			}

			if( $this->event_model->create( $data ) ){
				$this->session->set_flashdata('alert', $this->alert->set_alert( Alert::SUCCESS, $this->event_model->messages() ) );
			}else{
				$this->session->set_flashdata('alert', $this->alert->set_alert( Alert::DANGER, $this->event_model->errors() ) );
			}
			redirect( site_url($this->current_page)  );
		}
        else
        {
          $this->data['message'] = (validation_errors() ? validation_errors() : ($this->event_model->errors() ? $this->event_model->errors() : $this->session->flashdata('message')));
		  if(  validation_errors() || $this->event_model->errors() ) $this->session->set_flashdata('alert', $this->alert->set_alert( Alert::DANGER, $this->data['message'] ) );
		  
		  $alert = $this->session->flashdata('alert');
			$this->data["key"] = $this->input->get('key', FALSE);
			$this->data["alert"] = (isset($alert)) ? $alert : NULL ;
			$this->data["current_page"] = $this->current_page;
			$this->data["block_header"] = "Buat Berita ";
			$this->data["header"] = "Buat Berita ";
			$this->data["sub_header"] = 'Klik Tombol Action Untuk Aksi Lebih Lanjut';

            $form_data = $this->services->get_form_data();
            $form_data = $this->load->view('templates/form/plain_form', $form_data , TRUE ) ;

            $this->data[ "contents" ] =  $form_data;
            $this->render( "user/event/plain_content_form" );
		}
	}

	public function edit( $news_id = NULL )
	{

		// echo var_dump( $data );return;
		$this->form_validation->set_rules( $this->services->validation_config() );
        if ($this->form_validation->run() === TRUE )
        {
			$data['category_id'] = $this->input->post( 'category_id' );
			$data['title'] = $this->input->post( 'title' );
			$data['date'] = date('Y-m-d', strtotime($this->input->post( 'date' )));
			$data['preview'] = $this->input->post( 'preview' );
			$data['timestamp'] = time();

			// $a = file_get_contents($upload_path.$file_name);

			// echo $a ;
			$this->load->library('upload');
			$title = str_replace( ".", "_",   $data['title']  ); // Load librari upload
			$title = str_replace( "/", "_",   $title  ); // Load librari upload
			$config = $this->services->get_photo_upload_config( $title );

			$this->upload->initialize( $config );
			// echo var_dump( $_FILES ); return;
			if( $_FILES['image']['name'] != "" )
			if( $this->upload->do_upload("image") )
			{
				$data['image'] = $this->upload->data()["file_name"];
				if( !@unlink( $config['upload_path'].$this->input->post( 'file_image' ) ) );
			}
			else
			{
				$this->session->set_flashdata('alert', $this->alert->set_alert( Alert::DANGER, $this->upload->display_errors() ) );
				redirect( site_url($this->current_page)  );
			}
			// buat content html

			$config =  $this->services->get_file_upload_config( $title );
			if( file_put_contents( $config['upload_path'].$config['file_name'], $this->input->post( 'summernote' ))  )
			{
				$data['file_content'] = $config['file_name'];
				if( $this->input->post( 'file_content' ) != "default.html" )
					if( !@unlink( $config['upload_path'].$this->input->post( 'file_content' ) ) ) return;
			}
			else
			{
				$data['file_content'] = "default.html";
			}

			$data_param['id'] = $this->input->post( 'id' );

			if( $this->event_model->update( $data, $data_param  ) ){
				$this->session->set_flashdata('alert', $this->alert->set_alert( Alert::SUCCESS, $this->event_model->messages() ) );
			}else{
				$this->session->set_flashdata('alert', $this->alert->set_alert( Alert::DANGER, $this->event_model->errors() ) );
			}
			redirect( site_url($this->current_page)  );
		}
        else
        {
          $this->data['message'] = (validation_errors() ? validation_errors() : ($this->event_model->errors() ? $this->event_model->errors() : $this->session->flashdata('message')));
		  if(  validation_errors() || $this->event_model->errors() ) $this->session->set_flashdata('alert', $this->alert->set_alert( Alert::DANGER, $this->data['message'] ) );
		  
		  $this->data["key"] = $this->input->get('key', FALSE);
			$this->data["alert"] = (isset($alert)) ? $alert : NULL ;
			$this->data["current_page"] = $this->current_page;
			$this->data["block_header"] = "Buat Berita ";
			$this->data["header"] = "Buat Berita ";
			$this->data["sub_header"] = 'Klik Tombol Action Untuk Aksi Lebih Lanjut';

            $form_data = $this->services->get_form_data( $news_id );
            $form_data = $this->load->view('templates/form/plain_form', $form_data , TRUE ) ;

            $this->data[ "contents" ] =  $form_data;
            $this->render( "user/event/plain_content_form" );
		}
		
	}

	public function delete(  ) {
		$upload_path = 'uploads/news/';

		$config['upload_path'] = './'.$upload_path;

		if( !($_POST) ) redirect( site_url($this->current_page) );
	  
		$data_param['id'] 	= $this->input->post('id');
		if( $this->event_model->delete( $data_param ) ){
			// delete file
			if( !@unlink( $config['upload_path'].$this->input->post( 'file_content' ) ) )return;
			// delete image
			if( !@unlink( $config['upload_path']."photo/".$this->input->post( 'image_old' ) ) )return;

		  $this->session->set_flashdata('alert', $this->alert->set_alert( Alert::SUCCESS, $this->event_model->messages() ) );
		}else{
		  $this->session->set_flashdata('alert', $this->alert->set_alert( Alert::DANGER, $this->event_model->errors() ) );
		}
		redirect( site_url($this->current_page)  );
	}
}
