<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Client extends User_Controller {
	private $services = null;
    private $name = null;
    private $parent_page = 'user';
	private $current_page = 'user/client/';
	
	public function __construct(){
		parent::__construct();
		$this->load->library('services/Client_services');
		$this->services = new Client_services;
		$this->load->model(array(
			'group_model',
			'client_model',
		));

	}
	public function index()
	{
		$page = ($this->uri->segment(4)) ? ($this->uri->segment(4) -  1 ) : 0;
		// echo $page; return;
        //pagination parameter
        $pagination['base_url'] = base_url( $this->current_page ) .'/index';
        $pagination['total_records'] = $this->client_model->record_count() ;
        $pagination['limit_per_page'] = 10;
        $pagination['start_record'] = $page*$pagination['limit_per_page'];
        $pagination['uri_segment'] = 4;
		//set pagination
		if ($pagination['total_records'] > 0 ) $this->data['pagination_links'] = $this->setPagination($pagination);
		#################################################################3
		$table = $this->services->get_table_config( $this->current_page );
		$table[ "rows" ] = $this->client_model->clients( $pagination['start_record'], $pagination['limit_per_page'] )->result();
		$table['status'] = ['Tidak Aktif', 'Aktif'];
		// var_dump($table); die;
		$table = $this->load->view('templates/tables/plain_table_image_status', $table, true);
		$this->data[ "contents" ] = $table;
		$add_menu = array(
			"name" => "Tambah Klien",
			"modal_id" => "add_group_",
			"button_color" => "primary",
			"url" => site_url( $this->current_page."add/"),
			"form_data" => array(
				"name" => array(
					'type' => 'text',
					'label' => "Nama Klien",
					'value' => "",
				),
				"description" => array(
					'type' => 'textarea',
					'label' => "Deskripsi",
					'value' => "-",
				),
				"image" => array(
					'type' => 'file',
					'label' => "Logo Klien",
				),
				"status" => array(
					'type' => 'select',
					'label' => "Status Kerjasama",
					'options' => array(
						1 => 'Aktif',
						0 => 'Tidak Aktif',
					),
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
		$this->data["block_header"] = "Klien";
		$this->data["header"] = "Klien";
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

			$data['image'] = $this->upload_image();
			$data['description'] = $this->input->post( 'description' );
			$data['status'] = $this->input->post( 'status' );

			if( $this->client_model->create( $data ) ){
				$this->session->set_flashdata('alert', $this->alert->set_alert( Alert::SUCCESS, $this->client_model->messages() ) );
			}else{
				$this->session->set_flashdata('alert', $this->alert->set_alert( Alert::DANGER, $this->client_model->errors() ) );
			}
		}
        else
        {
          $this->data['message'] = (validation_errors() ? validation_errors() : ($this->m_account->errors() ? $this->client_model->errors() : $this->session->flashdata('message')));
          if(  validation_errors() || $this->client_model->errors() ) $this->session->set_flashdata('alert', $this->alert->set_alert( Alert::DANGER, $this->data['message'] ) );
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
			$data['status'] = $this->input->post( 'status' );
			
			if($_FILES['image']['name'])
				$data['image'] = $this->upload_image();

			$data_param['id'] = $this->input->post( 'id' );

			if( $this->client_model->update( $data, $data_param  ) ){
				$this->session->set_flashdata('alert', $this->alert->set_alert( Alert::SUCCESS, $this->client_model->messages() ) );
			}else{
				$this->session->set_flashdata('alert', $this->alert->set_alert( Alert::DANGER, $this->client_model->errors() ) );
			}
		}
        else
        {
          $this->data['message'] = (validation_errors() ? validation_errors() : ($this->m_account->errors() ? $this->client_model->errors() : $this->session->flashdata('message')));
          if(  validation_errors() || $this->client_model->errors() ) $this->session->set_flashdata('alert', $this->alert->set_alert( Alert::DANGER, $this->data['message'] ) );
		}
		
		redirect( site_url($this->current_page)  );
	}

	public function delete(  ) {
		$path = './uploads/client/';
		if( !($_POST) ) redirect( site_url($this->current_page) );
	  
		$data_param['id'] 	= $this->input->post('id');
		if( $this->client_model->delete( $data_param ) ){
			if(NULL !== $this->input->post('image_old')){
				if($this->input->post('image_old') != 'default.jpg')
					@unlink( $path.$this->input->post('image_old') );
			}
			$this->session->set_flashdata('alert', $this->alert->set_alert( Alert::SUCCESS, $this->client_model->messages() ) );
		}else{
			$this->session->set_flashdata('alert', $this->alert->set_alert( Alert::DANGER, $this->client_model->errors() ) );
		}
		redirect( site_url($this->current_page)  );
	}

	public function upload_image(  )
	{
		$upload = $this->config->item('upload', 'ion_auth');

		$file = $_FILES[ 'image' ];
		$upload_path = 'uploads/client/';

		$config 				= $upload;
		$config['file_name'] 	=  $file['name'];
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
