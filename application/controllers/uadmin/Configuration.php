<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Configuration extends Uadmin_Controller {
	private $services = null;
    private $name = null;
    private $parent_page = 'uadmin';
	private $current_page = 'uadmin/configuration/';
	
	public function __construct(){
		parent::__construct();
		$this->load->library('services/Configuration_services');
		$this->services = new Configuration_services;
		$this->load->model(array(
			'group_model',
			'icon_model',
		));

	}
	public function index()
	{
		#################################################################3
		$table = $this->services->get_table_config( $this->current_page );
		$table[ "rows" ] = $this->icon_model->icons(  )->result();
		$table = $this->load->view('templates/tables/plain_table_image', $table, true);
		$this->data[ "contents" ] = $table;
		$add_menu = array(
			"name" => "Tambah Icon",
			"modal_id" => "add_group_",
			"button_color" => "primary",
			"url" => site_url( $this->current_page."add/"),
			"form_data" => array(
				"name" => array(
					'type' => 'text',
					'label' => "Nama Icon",
					'value' => "",
				),
				"description" => array(
					'type' => 'textarea',
					'label' => "Deskripsi",
					'value' => "-",
				),
				"image" => array(
					'type' => 'file',
					'label' => "File Icon",
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
		$this->data["block_header"] = "Konfigurasi";
		$this->data["header"] = "Konfigurasi";
		$this->data["sub_header"] = 'Klik Tombol Action Untuk Aksi Lebih Lanjut';
		$this->render( "templates/contents/plain_content" );
	}


	public function add(  )
	{
		if( !($_POST) ) redirect(site_url(  $this->current_page ));  

		// echo var_dump( $data );return;
		$this->form_validation->set_rules( $this->services->validation_config() );
        if ($this->form_validation->run() === TRUE )
        {
			$data['name'] = $this->input->post( 'name' );
			$data['description'] = $this->input->post( 'description' );
			
			// $title = str_replace( ".", "_",   $data['title']  ); // Load librari upload
			// $title = str_replace( "/", "_",   $title  ); // Load librari upload
			
			$data['file'] = $this->upload_image( $data['name'] );

			if( $this->icon_model->create( $data ) ){
				$this->session->set_flashdata('alert', $this->alert->set_alert( Alert::SUCCESS, $this->icon_model->messages() ) );
			}else{
				$this->session->set_flashdata('alert', $this->alert->set_alert( Alert::DANGER, $this->icon_model->errors() ) );
			}
		}
        else
        {
          $this->data['message'] = (validation_errors() ? validation_errors() : ($this->m_account->errors() ? $this->icon_model->errors() : $this->session->flashdata('message')));
          if(  validation_errors() || $this->icon_model->errors() ) $this->session->set_flashdata('alert', $this->alert->set_alert( Alert::DANGER, $this->data['message'] ) );
		}
		
		redirect( site_url($this->current_page)  );
	}

	public function edit(  )
	{
		if( !($_POST) ) redirect(site_url(  $this->current_page ));  

		// echo var_dump( $data );return;
		$this->form_validation->set_rules( $this->services->validation_config() );
        if ($this->form_validation->run() === TRUE )
        {
			$data['name'] = $this->input->post( 'name' );
			$data['description'] = $this->input->post( 'description' );

			if($_FILES['image']['name'])
				$data['file'] = $this->upload_image( $data['name'] );
			
			$data_param['id'] = $this->input->post( 'id' );

			if( $this->icon_model->update( $data, $data_param  ) ){
				$this->session->set_flashdata('alert', $this->alert->set_alert( Alert::SUCCESS, $this->icon_model->messages() ) );
			}else{
				$this->session->set_flashdata('alert', $this->alert->set_alert( Alert::DANGER, $this->icon_model->errors() ) );
			}
		}
        else
        {
          $this->data['message'] = (validation_errors() ? validation_errors() : ($this->m_account->errors() ? $this->icon_model->errors() : $this->session->flashdata('message')));
          if(  validation_errors() || $this->icon_model->errors() ) $this->session->set_flashdata('alert', $this->alert->set_alert( Alert::DANGER, $this->data['message'] ) );
		}
		
		redirect( site_url($this->current_page)  );
	}

	public function delete(  ) {
		if( !($_POST) ) redirect( site_url($this->current_page) );
	  
		$path = './uploads/icon/';

		$data_param['id'] 	= $this->input->post('id');
		if( $this->icon_model->delete( $data_param ) ){
			if(NULL !== $this->input->post('image_old')){
				if($this->input->post('image_old') != 'default.jpg')
					@unlink( $path.$this->input->post('image_old') );
			}
			$this->session->set_flashdata('alert', $this->alert->set_alert( Alert::SUCCESS, $this->icon_model->messages() ) );
		}else{
			$this->session->set_flashdata('alert', $this->alert->set_alert( Alert::DANGER, $this->icon_model->errors() ) );
		}
		redirect( site_url($this->current_page)  );
	}

	public function upload_image( $name )
	{
		$upload = $this->config->item('upload', 'ion_auth');

		$file = $_FILES[ 'image' ];
		$upload_path = 'uploads/icon/';

		$config 				= $upload;
		$config['file_name'] 	=  $name;
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
