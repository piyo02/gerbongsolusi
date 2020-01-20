<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Company_services
{
  private $id = null;
  private $name = null;
  private $perspective = null;
  private $objectif = null;
  private $exist = null;
  private $address = null;
  private $image = null;
  private $image_old = null;
  private $description = null;

  function __construct(){

  }

  public function __get($var)
  {
    return get_instance()->$var;
  }
  
  public function get_table_config( $_page, $start_number = 1 )
  {
      $table["header"] = array(
        'name' => 'Nama Group',
        'description' => 'Deskripsi',
      );
      $table["number"] = $start_number;
    return $table;
  }
  public function get_file_upload_config( $name )
  {
    // $name = str_replace( "(" )
    // $filename = "EVENT_".$name."_".time().".html";
    $filename = "COMPANY__.html";
    $upload_path = 'uploads/logo/';

    $config['upload_path'] = './'.$upload_path;
    $config['file_name'] = ''.$filename;

    return $config;
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
          'field' => 'perspective',
          'label' => 'Visi',
          'rules' =>  'trim|required',
        ),
        array(
          'field' => 'objectif',
          'label' => 'Misi',
          'rules' =>  'trim|required',
        ),
        array(
          'field' => 'exist',
          'label' => 'Tanggal Berdiri',
          'rules' =>  'trim|required',
        ),
        array(
          'field' => 'address',
          'label' => 'Alamat',
          'rules' =>  'trim|required',
        ),
    );
    
    return $config;
  }

  public function form_data_readonly( $company = NULL )
  {

    if( $company ){
      $this->id = $company->id;
      $this->name = $company->name;
      $this->perspective = $company->perspective;
      $this->objectif = $company->objectif;
      $this->exist = $company->exist;
      $this->address = $company->address;
      $this->image = $company->image;
      $this->image_old = $company->image_old;
      $this->description = $company->description;
    }

    $form_data['form_data'] = array(
      'id' => array(
        'type' => 'hidden',
        'label' => 'Id',
        'value' => $this->form_validation->set_value('id', $this->id),
      ),
      'name' => array(
        'type' => 'text',
        'label' => 'Nama Perusahaan',
        'value' => $this->form_validation->set_value('name', $this->name),
      ),
      'perspective' => array(
        'type' => 'text',
        'label' => 'Visi Perusahaan',
        'value' => $this->form_validation->set_value('perspective', $this->perspective),
      ),
      'objectif' => array(
        'type' => 'text',
        'label' => 'Misi Perusahaan',
        'value' => $this->form_validation->set_value('objectif', $this->objectif),
      ),
      'exist' => array(
        'type' => 'date',
        'label' => 'Tanggal Berdiri',
        'value' => $this->form_validation->set_value('exist', date('d/m/Y', strtotime($this->exist))),
      ),
      'address' => array(
        'type' => 'textarea',
        'label' => 'Alamat Perusahaan',
        'value' => $this->form_validation->set_value('address', $this->address),
      ),
      // 'image' => array(
      //   'type' => 'text',
      //   'label' => 'Logo Perusahaan',
      //   'value' => $this->form_validation->set_value('image', $this->image),
      // ),
      'image_old' => array(
        'type' => 'hidden',
        'label' => 'Id',
        'value' => $this->form_validation->set_value('image_old', $this->image_old),
      ),
      // 'description' => array(
      //   'type' => 'textarea',
      //   'label' => 'Deskripsi Perusahaan',
      //   'value' => $this->form_validation->set_value('description', $this->description),
      // ),
      'summernote' => array(
        'type' => 'textarea',
        'label' => 'Deskripsi Perusahaan',
        'value' => $this->form_validation->set_value('description', $this->description),
      ),
    );
    return $form_data;
  }
}
?>
