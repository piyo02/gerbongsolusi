<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Gallery extends User_Controller {
	private $services = null;
    private $name = null;
    private $parent_page = 'user';
	private $current_page = 'user/gallery/';
	
	public function __construct(){
		parent::__construct();
		$this->load->library('services/Gallery_services');
		$this->services = new Gallery_services;
		$this->load->model(array(
			'gallery_model',
		));
		// $this->data['menu_list_id'] = 'event_index';
	}
	public function event( $event_id )
	{
		#################################################################3
		$table = $this->services->get_table_config( $this->current_page );
		$table[ "rows" ] = $this->gallery_model->galleries_by_event_id( $event_id )->result();
		$table = $this->load->view('templates/tables/plain_table_image', $table, true);
		$this->data[ "contents" ] = $table;
		$add_menu = array(
			"name" => "Tambah Galeri",
			"modal_id" => "add_group_",
			"button_color" => "primary",
			"url" => site_url( $this->current_page."add/"),
			"form_data" => array(
				"event_id" => array(
					'type' => 'hidden',
					'label' => "Nama",
					'value' => $event_id,
				),
				"image" => array(
					'type' => 'file',
					'label' => "Dokumentasi",
				),
				"thumbnail" => array(
					'type' => 'text',
					'label' => "Preview",
					'value' => "-",
				),
			),
			'data' => NULL
		);

		$add_menu= $this->load->view('templates/actions/modal_form_multipart', $add_menu, true ); 

		$this->data[ "header_button" ] =  $add_menu;
		// return;
		#################################################################3
		$alert = $this->session->flashdata('alert');
		$this->data["key"] = $this->input->get('key', FALSE);
		$this->data["alert"] = (isset($alert)) ? $alert : NULL ;
		$this->data["current_page"] = $this->current_page;
		$this->data["block_header"] = "Galeri";
		$this->data["header"] = "Galeri";
		$this->data["sub_header"] = 'Klik Tombol Action Untuk Aksi Lebih Lanjut';
		$this->render( "templates/contents/plain_content" );
	}


	public function add(  )
	{
		if( !($_POST) ) redirect(site_url(  $this->current_page ));  
		
		// echo var_dump( $data );return;
		$event_id = $this->input->post( 'event_id' );
		$this->form_validation->set_rules( $this->services->validation_config() );
        if ($this->form_validation->run() === TRUE )
        {
			$data['event_id'] = $this->input->post( 'event_id' );
			$data['thumbnail'] = $this->input->post( 'thumbnail' );
			$data['file'] = $this->upload_image( $event_id );
			$data['name'] = $data['file'];
			
			if( $this->gallery_model->create( $data ) ){
				$this->session->set_flashdata('alert', $this->alert->set_alert( Alert::SUCCESS, $this->gallery_model->messages() ) );
			}else{
				$this->session->set_flashdata('alert', $this->alert->set_alert( Alert::DANGER, $this->gallery_model->errors() ) );
			}
		}
        else
        {
          $this->data['message'] = (validation_errors() ? validation_errors() : ($this->m_account->errors() ? $this->gallery_model->errors() : $this->session->flashdata('message')));
          if(  validation_errors() || $this->gallery_model->errors() ) $this->session->set_flashdata('alert', $this->alert->set_alert( Alert::DANGER, $this->data['message'] ) );
		}
		
		redirect( site_url($this->current_page) . 'event/' . $event_id );
	}

	public function edit(  )
	{
		if( !($_POST) ) redirect(site_url(  $this->current_page ));  
		
		// echo var_dump( $data );return;
		$event_id = $this->input->post( 'event_id' );
		$this->form_validation->set_rules( $this->services->validation_config() );
        if ($this->form_validation->run() === TRUE )
        {
			$data['name'] = $this->input->post( 'name' );
			$data['thumbnail'] = $this->input->post( 'thumbnail' );

			if($_FILES['file']['name']){
				$data['file'] = $this->upload_image( $event_id );
				$data['name'] = $data['file'];
			}

			$data_param['id'] = $this->input->post( 'id' );

			if( $this->gallery_model->update( $data, $data_param  ) ){
				$this->session->set_flashdata('alert', $this->alert->set_alert( Alert::SUCCESS, $this->gallery_model->messages() ) );
			}else{
				$this->session->set_flashdata('alert', $this->alert->set_alert( Alert::DANGER, $this->gallery_model->errors() ) );
			}
		}
        else
        {
          $this->data['message'] = (validation_errors() ? validation_errors() : ($this->m_account->errors() ? $this->gallery_model->errors() : $this->session->flashdata('message')));
          if(  validation_errors() || $this->gallery_model->errors() ) $this->session->set_flashdata('alert', $this->alert->set_alert( Alert::DANGER, $this->data['message'] ) );
		}
		
		redirect( site_url($this->current_page) . 'event/' . $event_id );
	}

	public function delete(  ) {
		if( !($_POST) ) redirect( site_url($this->current_page) );
		$path = './uploads/gallery/';
		$event_id = $this->input->post( 'event_id' );
		$data_param['id'] 	= $this->input->post('id');
		if( $this->gallery_model->delete( $data_param ) ){
			if(NULL !== $this->input->post('image_old')){
				if($this->input->post('image_old') != 'default.jpg')
					@unlink( $path.$this->input->post('image_old') );
			}
		  $this->session->set_flashdata('alert', $this->alert->set_alert( Alert::SUCCESS, $this->gallery_model->messages() ) );
		}else{
		  $this->session->set_flashdata('alert', $this->alert->set_alert( Alert::DANGER, $this->gallery_model->errors() ) );
		}
		redirect( site_url($this->current_page) . 'event/' . $event_id );
	}
	public function upload_image( $event_id = 1 )
	{
		$upload = $this->config->item('upload', 'ion_auth');

		$file = $_FILES[ 'image' ];
		$upload_path = 'uploads/gallery/';

		$config 				= $upload;
		$config['file_name'] 	=  'GALLERY_EVENT_' . $event_id . "__" . time();
		$config['upload_path']	= './' . $upload_path;
		// var_dump($file['name']); die;
		$this->load->library('upload', $config);
		
		if ( ! $this->upload->do_upload( 'image' ) )
		{
			// $this->set_error( $this->upload->display_errors() );
			// $this->set_error( 'upload_unsuccessful' );
			return FALSE;
		}
		else
		{
			if(NULL !== $this->input->post('image_old')){
				if($this->input->post('image_old') != 'default.jpg')
					@unlink( $config['upload_path'].$this->input->post('image_old') );
			}
			$file_data = $this->upload->data();
			return $file_data['file_name'];
		}
	}
}
