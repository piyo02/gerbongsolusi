<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Team extends User_Controller {
	private $services = null;
    private $name = null;
    private $parent_page = 'user';
	private $current_page = 'user/team/';
	
	public function __construct(){
		parent::__construct();
		$this->load->library('services/Team_services');
		$this->services = new Team_services;
		$this->load->model(array(
			'group_model',
			'employee_model',
			'division_model',
			'position_model',
		));
		$this->data['menu_list_id'] = 'team_index';
	}
	public function index()
	{
		#################################################################3
		$table = $this->services->get_table_division_config( $this->current_page );
		$table[ "rows" ] = $this->division_model->divisions(  )->result();
		$table = $this->load->view('templates/tables/plain_table', $table, true);
		$this->data[ "contents" ] = $table;
		
		// return;
		#################################################################3
		$alert = $this->session->flashdata('alert');
		$this->data["key"] = $this->input->get('key', FALSE);
		$this->data["alert"] = (isset($alert)) ? $alert : NULL ;
		$this->data["current_page"] = $this->current_page;
		$this->data["block_header"] = "Divisi";
		$this->data["header"] = "Divisi";
		$this->data["sub_header"] = 'Klik Tombol Action Untuk Aksi Lebih Lanjut';
		$this->render( "templates/contents/plain_content" );
	}

	public function division( $division_id )
	{
		$divisions = $this->division_model->divisions(  )->result();
		$list_division[] = '-- Pilih Divisi --';
		foreach ($divisions as $key => $division) {
			$list_division[$division->id] = $division->name;
		}
		

		$positions = $this->position_model->positions(  )->result();
		$list_position[] = '-- Pilih Jabatan --';
		foreach ($positions as $key => $position) {
			$list_position[$position->id] = $position->name;
		}
		$page = ($this->uri->segment(4 + 1)) ? ($this->uri->segment(4 + 1) -  1 ) : 0;
		// echo $page; return;
        //pagination parameter
        $pagination['base_url'] = base_url( $this->current_page ) .'/division' . '/' . $division_id ;
        $pagination['total_records'] = $this->employee_model->record_count() ;
        $pagination['limit_per_page'] = 10;
        $pagination['start_record'] = $page*$pagination['limit_per_page'];
        $pagination['uri_segment'] = 4 + 1;
		//set pagination
		if ($pagination['total_records'] > 0 ) $this->data['pagination_links'] = $this->setPagination($pagination);
		#################################################################3
		$table = $this->services->get_table_config( $this->current_page , ($pagination['start_record'] + 1));
		$table[ "rows" ] = $this->employee_model->employees_by_division_id( $pagination['start_record'], $pagination['limit_per_page'], $division_id )->result();
		$table = $this->load->view('templates/tables/plain_table_image', $table, true);
		$this->data[ "contents" ] = $table;
		$add_menu = array(
			"name" => "Tambah Pegawai",
			"modal_id" => "add_group_",
			"button_color" => "primary",
			"url" => site_url( $this->current_page."add/"),
			"form_data" => array(
				"name" => array(
					'type' => 'text',
					'label' => "Nama Pegawai",
					'value' => "",
				),
				"division" => array(
					'type' => 'text',
					'label' => "Divisi",
					'value' => $list_division[$division_id],
					'readonly' => TRUE
				),
				"division_id" => array(
					'type' => 'hidden',
					'label' => "Divisi",
					'value' => $division_id,
				),
				// "position_id" => array(
				// 	'type' => 'select',
				// 	'label' => "Jabatan",
				// 	'options' => $list_position,
				// ),
				"position" => array(
					'type' => 'text',
					'label' => "Jabatan",
				),
				"description" => array(
					'type' => 'textarea',
					'label' => "Deskripsi",
					'value' => "-",
				),
				"image" => array(
					'type' => 'file',
					'label' => "Foto Pegawai",
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
		$this->data["block_header"] = "Pegawai";
		$this->data["header"] = "Pegawai";
		$this->data["sub_header"] = 'Klik Tombol Action Untuk Aksi Lebih Lanjut';
		$this->render( "templates/contents/plain_content" );
	}


	public function add(  )
	{
		if( !($_POST) ) redirect(site_url(  $this->current_page ));  

		// echo var_dump( $data );return;
		$division_id = $this->input->post( 'division_id' );
		$this->form_validation->set_rules( $this->services->validation_config() );
        if ($this->form_validation->run() === TRUE )
        {
			$data['name'] = $this->input->post( 'name' );
			$data['division_id'] = $division_id;
			$data['position'] = $this->input->post( 'position' );
			$data['description'] = $this->input->post( 'description' );

			$data['image'] = $this->upload_image( $division_id );

			if( $this->employee_model->create( $data ) ){
				$this->session->set_flashdata('alert', $this->alert->set_alert( Alert::SUCCESS, $this->employee_model->messages() ) );
			}else{
				$this->session->set_flashdata('alert', $this->alert->set_alert( Alert::DANGER, $this->employee_model->errors() ) );
			}
		}
        else
        {
          $this->data['message'] = (validation_errors() ? validation_errors() : ($this->m_account->errors() ? $this->employee_model->errors() : $this->session->flashdata('message')));
          if(  validation_errors() || $this->employee_model->errors() ) $this->session->set_flashdata('alert', $this->alert->set_alert( Alert::DANGER, $this->data['message'] ) );
		}
		
		redirect( site_url($this->current_page) . 'division/' . $division_id );
	}

	public function edit(  )
	{
		if( !($_POST) ) redirect(site_url(  $this->current_page ));  

		// echo var_dump( $data );return;
		$division_id = $this->input->post( 'division_id' );
		$this->form_validation->set_rules( $this->services->validation_config() );
        if ($this->form_validation->run() === TRUE )
        {
			$data['name'] = $this->input->post( 'name' );
			$data['division_id'] = $division_id;
			$data['position'] = $this->input->post( 'position' );
			$data['description'] = $this->input->post( 'description' );

			if($_FILES['image']['name'])
				$data['image'] = $this->upload_image( $division_id );
		
			$data_param['id'] 	= $this->input->post('id');
			

			if( $this->employee_model->update( $data, $data_param  ) ){
				$this->session->set_flashdata('alert', $this->alert->set_alert( Alert::SUCCESS, $this->employee_model->messages() ) );
			}else{
				$this->session->set_flashdata('alert', $this->alert->set_alert( Alert::DANGER, $this->employee_model->errors() ) );
			}
		}
        else
        {
          $this->data['message'] = (validation_errors() ? validation_errors() : ($this->m_account->errors() ? $this->employee_model->errors() : $this->session->flashdata('message')));
          if(  validation_errors() || $this->employee_model->errors() ) $this->session->set_flashdata('alert', $this->alert->set_alert( Alert::DANGER, $this->data['message'] ) );
		}
		
		redirect( site_url($this->current_page) . 'division/' . $division_id );
	}

	public function delete(  ) {
		$path = './uploads/employee/';

		if( !($_POST) ) redirect( site_url($this->current_page) );
	  
		$division_id 	= $this->input->post('division_id');
		$data_param['id'] 	= $this->input->post('id');
		if( $this->employee_model->delete( $data_param ) ){
			if(NULL !== $this->input->post('image_old')){
				if($this->input->post('image_old') != 'default.jpg')
					@unlink( $path.$this->input->post('image_old') );
			}
		  $this->session->set_flashdata('alert', $this->alert->set_alert( Alert::SUCCESS, $this->employee_model->messages() ) );
		}else{
		  $this->session->set_flashdata('alert', $this->alert->set_alert( Alert::DANGER, $this->employee_model->errors() ) );
		}
		redirect( site_url($this->current_page) . 'division/' . $division_id );
	}

	public function upload_image( $division_id = 1 )
	{
		$upload = $this->config->item('upload', 'ion_auth');

		$file = $_FILES[ 'image' ];
		$upload_path = 'uploads/employee/';

		$config 				= $upload;
		$config['file_name'] 	=  "EMPLOYEE_DIVISION__" . $division_id . '__' . time();
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
