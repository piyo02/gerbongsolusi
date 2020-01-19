<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Team_services
{


  function __construct(){

  }

  public function __get($var)
  {
    return get_instance()->$var;
  }
  
  public function get_table_division_config( $_page, $start_number = 1 )
  {
      $table["header"] = array(
        'name' => 'Nama Divisi',
        'description' => 'Deskripsi',
      );
      $table["number"] = $start_number;
      $table[ "action" ] = array(
        array(
          "name" => 'Detail',
          "type" => "link",
          "url" => site_url( $_page."division/"),
          "button_color" => "primary",
          "param" => "id",
          "title" => "Group",
          "data_name" => "name",
        ),
    );
    return $table;
  }
  public function get_table_config( $_page, $start_number = 1 )
  {
    $this->load->model(array(
			'division_model',
			'position_model',
    ));
    
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

      $table["header"] = array(
        'name' => 'Nama Pegawai',
        'image' => 'Foto Pegawai',
        'position_name' => 'Jabatan',
        'description' => 'Deskripsi',
      );
      $table["number"] = $start_number;
      $table[ "action" ] = array(
              array(
                "name" => 'Edit',
                "type" => "modal_form_multipart",
                "modal_id" => "edit_",
                "url" => site_url( $_page."edit/"),
                "button_color" => "primary",
                "param" => "id",
                "form_data" => array(
                    "id" => array(
                        'type' => 'hidden',
                        'label' => "id",
                    ),
                    "name" => array(
                        'type' => 'text',
                        'label' => "Nama Group",
                    ),
                    "division_id" => array(
                      'type' => 'hidden',
                      'label' => "Divisi",
                    ),
                    "position_id" => array(
                      'type' => 'select',
                      'label' => "Jabatan",
                      'options' => $list_position,
                    ),
                    "description" => array(
                        'type' => 'textarea',
                        'label' => "Deskripsi",
                    ),
                    "image" => array(
                      'type' => 'file',
                      'label' => "Foto Pegawai",
                    ),
                    "image_old" => array(
                      'type' => 'hidden',
                      'label' => "Foto Pegawai",
                    ),
                ),
                "title" => "Group",
                "data_name" => "name",
              ),
              array(
                "name" => 'X',
                "type" => "modal_delete",
                "modal_id" => "delete_",
                "url" => site_url( $_page."delete/"),
                "button_color" => "danger",
                "param" => "id",
                "form_data" => array(
                  "id" => array(
                    'type' => 'hidden',
                    'label' => "id",
                  ),
                  "image_old" => array(
                    'type' => 'hidden',
                    'label' => "Foto Pegawai",
                  ),
                  "division_id" => array(
                    'type' => 'hidden',
                    'label' => "Divisi",
                  ),
                ),
                "title" => "Group",
                "data_name" => "name",
              ),
    );
    return $table;
  }
  public function validation_config( ){
    $config = array(
        array(
          'field' => 'name',
          'label' => 'name',
          'rules' =>  'trim|required',
        ),
        array(
          'field' => 'description',
          'label' => 'description',
          'rules' =>  'trim|required',
        ),
        array(
          'field' => 'division_id',
          'label' => 'Divisi',
          'rules' =>  'trim|required',
        ),
        array(
          'field' => 'position_id',
          'label' => 'Jabatan',
          'rules' =>  'trim|required',
        ),
    );
    
    return $config;
  }
}
?>
