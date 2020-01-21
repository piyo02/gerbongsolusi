<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Company extends User_Controller {
	private $services = null;
    private $name = null;
    private $parent_page = 'user/';
	private $current_page = 'user/company/';
	
	public function __construct(){
		parent::__construct();
		$this->load->library('services/Company_services');
		$this->services = new Company_services;
		$this->load->model(array(
			'group_model',
			'company_model',
			'contact_model',
			'icon_model',
		));
		$this->data['menu_list_id'] = 'company_index';
	}
	public function index()
	{
		$company = $this->company_model->company()->row();
		$contacts = $this->contact_model->contacts()->result();
		$icons = $this->icon_model->icons()->result();

		foreach ($icons as $key => $icon) {
			$list_icon[$icon->id] = $icon->name;
		}

		$id = ( isset($company->id) ) ? $id = $company->id : NULL;
		$image_old = ( isset($company->image_old) ) ? $image_old = $company->image_old : NULL;

		#################################################################3
		$form_data = $this->services->form_data_readonly( $company );
		$form_data = $this->load->view('templates/form/plain_form_readonly', $form_data, true);
		$this->data[ "contents" ] = $form_data;
		$this->data[ "contacts" ] = $contacts;
		$this->data['logo'] = ( isset($company->image) ) ? $company->image : NULL;
		
		$btn_edit = array(
			"name" => "Edit Logo",
			"modal_id" => "add_group_",
			"button_color" => "primary",
			"url" => site_url( $this->current_page."edit_logo/"),
			"form_data" => array(
				"id" => array(
					'type' => 'hidden',
					'label' => "Nama Group",
					'value' => $id
				),
				"image_old" => array(
					'type' => 'hidden',
					'label' => "Nama Group",
					'value' => $image_old
				),
				"image" => array(
					'type' => 'file',
					'label' => "Logo Perusahaan",
				),
			),
			'data' => NULL
		);

		$btn_edit= $this->load->view('templates/actions/modal_form_multipart', $btn_edit, true ); 
		$this->data[ "btn_edit" ] =  $btn_edit;

		$btn_contact = array(
			"name" => "Edit Kontak",
			"button_color" => "primary",
			"url" => site_url( $this->parent_page."contact/"),
			'data' => NULL
		);

		$btn_contact= $this->load->view('templates/actions/link', $btn_contact, true ); 
		$this->data[ "btn_contact" ] =  $btn_contact;
		// return;
		#################################################################3
		$alert = $this->session->flashdata('alert');
		$this->data["key"] = $this->input->get('key', FALSE);
		$this->data["alert"] = (isset($alert)) ? $alert : NULL ;
		$this->data["current_page"] = $this->current_page;
		$this->data["block_header"] = "Data Perusahaan";
		$this->data["header"] = "Data Perusahaan";
		$this->data["sub_header"] = 'Klik Tombol Action Untuk Aksi Lebih Lanjut';
		$this->render( "user/company/detail" );
	}

	public function edit(  )
	{
		$company = $this->company_model->company()->row();
		$contacts = $this->contact_model->contacts( 1 )->result();

		// echo var_dump( $data );return;
		$this->form_validation->set_rules( $this->services->validation_config() );
        if ($this->form_validation->run() === TRUE )
        {
			$data['name'] = $this->input->post( 'name' );
			$data['perspective'] = $this->input->post( 'perspective' );
			$data['objectif'] = $this->input->post( 'objectif' );
			$data['exist'] = date( 'Y-m-d', strtotime($this->input->post( 'exist' )) );
			$data['address'] = $this->input->post( 'address' );
			// $data['description'] = $this->input->post( 'description' );
			// $data['description'] = $this->input->post( 'summernote' );
			// var_dump($this->input->post( 'summernote' )); die;
			$config =  $this->services->get_file_upload_config( 'description' );

			if( file_put_contents( $config['upload_path'].$config['file_name'] , $this->input->post( 'summernote' ))  )
			{
				$data['description'] = $config['file_name'];
			}
			else
			{
				$data['description'] = "default.html";
			}

			if( $this->input->post( 'id' ) ){
				$data_param['id'] = $this->input->post( 'id' );
				$id = $this->company_model->update( $data, $data_param  );
			}else {
				$id = $this->company_model->create( $data );
			}

			if( $id ){
				$this->session->set_flashdata('alert', $this->alert->set_alert( Alert::SUCCESS, $this->company_model->messages() ) );
			}else{
				$this->session->set_flashdata('alert', $this->alert->set_alert( Alert::DANGER, $this->company_model->errors() ) );
			}
			redirect( site_url($this->current_page)  );
		}
        else
        {
			$this->data['message'] = (validation_errors() ? validation_errors() : ($this->company_model->errors() ? $this->company_model->errors() : $this->session->flashdata('message')));
			if(  validation_errors() || $this->company_model->errors() ) $this->session->set_flashdata('alert', $this->alert->set_alert( Alert::DANGER, $this->data['message'] ) );
		  
			#################################################################3
			$form_data = $this->services->form_data_readonly( $company );
			$form_data = $this->load->view('templates/form/plain_form', $form_data, true);
			$this->data[ "contents" ] = $form_data;
			
			$this->data[ "contacts" ] = $contacts;
			// return;
			#################################################################3
			$alert = $this->session->flashdata('alert');
			$this->data["key"] = $this->input->get('key', FALSE);
			$this->data["alert"] = (isset($alert)) ? $alert : NULL ;
			$this->data["current_page"] = $this->current_page;
			$this->data["block_header"] = "Detail Perusahaan";
			$this->data["header"] = "Group";
			$this->data["sub_header"] = 'Klik Tombol Action Untuk Aksi Lebih Lanjut';
			$this->render( "user/company/edit" );
		}
		
	}
	public function edit_logo()
	{
		if( !($_POST) ) redirect( site_url($this->current_page) );
		
		$this->form_validation->set_rules( 'image', 'Logo Perusahaan', 'trim' );
        if ($this->form_validation->run() === TRUE )
        {
			$data['image'] = $this->upload_image();

			if( $this->input->post('id') ){
				$data_param['id'] = $this->input->post( 'id' );
				$result = $this->company_model->update( $data, $data_param  );
			}else {
				$result = $this->company_model->create( $data );
			}

			if( $result ){
				$this->session->set_flashdata('alert', $this->alert->set_alert( Alert::SUCCESS, $this->company_model->messages() ) );
			}else{
				$this->session->set_flashdata('alert', $this->alert->set_alert( Alert::DANGER, $this->company_model->errors() ) );
			}
		}
        else
        {
			$this->data['message'] = (validation_errors() ? validation_errors() : ($this->company_model->errors() ? $this->company_model->errors() : $this->session->flashdata('message')));
			if(  validation_errors() || $this->company_model->errors() ) $this->session->set_flashdata('alert', $this->alert->set_alert( Alert::DANGER, $this->data['message'] ) );
		}
		redirect( site_url($this->current_page)  );
	}
	// public function delete(  ) {
	// 	if( !($_POST) ) redirect( site_url($this->current_page) );
	  
	// 	$data_param['id'] 	= $this->input->post('id');
	// 	if( $this->company_model->delete( $data_param ) ){
	// 	  $this->session->set_flashdata('alert', $this->alert->set_alert( Alert::SUCCESS, $this->company_model->messages() ) );
	// 	}else{
	// 	  $this->session->set_flashdata('alert', $this->alert->set_alert( Alert::DANGER, $this->company_model->errors() ) );
	// 	}
	// 	redirect( site_url($this->current_page)  );
	// }

	public function upload_image( $name = 'logo' )
	{
		$upload = $this->config->item('upload', 'ion_auth');

		$file = $_FILES[ 'image' ];
		$upload_path = 'uploads/logo/';

		$config 				= $upload;
		$config['file_name'] 	=  $name . "_" . time();
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
