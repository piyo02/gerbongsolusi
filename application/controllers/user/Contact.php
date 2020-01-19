<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Contact extends User_Controller {
	private $services = null;
    private $name = null;
    private $parent_page = 'user';
	private $current_page = 'user/contact/';
	
	public function __construct(){
		parent::__construct();
		$this->load->library('services/Contact_services');
		$this->services = new Contact_services;
		$this->load->model(array(
			'group_model',
			'contact_model',
			'icon_model',
		));

	}
	public function index()
	{
		$icons = $this->icon_model->icons()->result();

		foreach ($icons as $key => $icon) {
			$list_icon[$icon->id] = $icon->name;
		}
		#################################################################3
		$table = $this->services->get_table_config( $this->current_page, 1, $list_icon );
		$table[ "rows" ] = $this->contact_model->contacts( 1 )->result();
		$table = $this->load->view('templates/tables/plain_table_image', $table, true);
		$this->data[ "contents" ] = $table;
		$add_menu = array(
			"name" => "Tambah Kontak",
			"modal_id" => "add_group_",
			"button_color" => "primary",
			"url" => site_url( $this->current_page."add/"),
			"form_data" => array(
				"contact" => array(
					'type' => 'text',
					'label' => "Kontak",
					'value' => "",
				),
				"icon_id" => array(
					'type' => 'select',
					'label' => "Icon Kontak",
					'options' => $list_icon,
				),
			),
			'data' => NULL
		);

		$add_menu= $this->load->view('templates/actions/modal_form', $add_menu, true ); 

		$this->data[ "header_button" ] =  $add_menu;
		// return;
		#################################################################3
		$alert = $this->session->flashdata('alert');
		$this->data["key"] = $this->input->get('key', FALSE);
		$this->data["alert"] = (isset($alert)) ? $alert : NULL ;
		$this->data["current_page"] = $this->current_page;
		$this->data["block_header"] = "Kontak";
		$this->data["header"] = "Kontak / Sosmed";
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
			$data['contact'] = $this->input->post( 'contact' );
			$data['icon_id'] = $this->input->post( 'icon_id' );

			if( $this->contact_model->create( $data ) ){
				$this->session->set_flashdata('alert', $this->alert->set_alert( Alert::SUCCESS, $this->contact_model->messages() ) );
			}else{
				$this->session->set_flashdata('alert', $this->alert->set_alert( Alert::DANGER, $this->contact_model->errors() ) );
			}
		}
        else
        {
          $this->data['message'] = (validation_errors() ? validation_errors() : ($this->m_account->errors() ? $this->contact_model->errors() : $this->session->flashdata('message')));
          if(  validation_errors() || $this->contact_model->errors() ) $this->session->set_flashdata('alert', $this->alert->set_alert( Alert::DANGER, $this->data['message'] ) );
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
			$data['contact'] = $this->input->post( 'contact' );
			$data['icon_id'] = $this->input->post( 'icon_id' );

			$data_param['id'] = $this->input->post( 'id' );

			if( $this->contact_model->update( $data, $data_param  ) ){
				$this->session->set_flashdata('alert', $this->alert->set_alert( Alert::SUCCESS, $this->contact_model->messages() ) );
			}else{
				$this->session->set_flashdata('alert', $this->alert->set_alert( Alert::DANGER, $this->contact_model->errors() ) );
			}
		}
        else
        {
          $this->data['message'] = (validation_errors() ? validation_errors() : ($this->m_account->errors() ? $this->contact_model->errors() : $this->session->flashdata('message')));
          if(  validation_errors() || $this->contact_model->errors() ) $this->session->set_flashdata('alert', $this->alert->set_alert( Alert::DANGER, $this->data['message'] ) );
		}
		
		redirect( site_url($this->current_page)  );
	}

	public function delete(  ) {
		if( !($_POST) ) redirect( site_url($this->current_page) );
	  
		$data_param['id'] 	= $this->input->post('id');
		if( $this->contact_model->delete( $data_param ) ){
		  $this->session->set_flashdata('alert', $this->alert->set_alert( Alert::SUCCESS, $this->contact_model->messages() ) );
		}else{
		  $this->session->set_flashdata('alert', $this->alert->set_alert( Alert::DANGER, $this->contact_model->errors() ) );
		}
		redirect( site_url($this->current_page)  );
	}
}
