<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class News_services
{
  const CONTENT_PATH = './uploads/news/';
  protected $id;
  protected $category_id;
  protected $title;
  protected $date;
  protected $image;
  protected $preview;
  protected $file_content;

  function __construct(){
    $this->id           = 0;
  	$this->category_id  = 0;
  	$this->title        = "";
  	$this->date      = "";
  	$this->image        = "";
  	$this->preview        = "-";
  	$this->file_content = "default.html";
  }

  public function __get($var)
  {
    return get_instance()->$var;
  }
  
  public function get_photo_upload_config( $name )
  {
    $filename = "NEWS_".$name."_".time();
    $upload_path = 'uploads/news/photo/';

    $config['upload_path'] = './'.$upload_path;
    $config['allowed_types'] = "gif|jpg|png|jpeg";
    $config['overwrite']="true";
    $config['max_size']="2048";
    $config['file_name'] = ''.$filename;

    return $config;
  }
  public function get_file_upload_config( $name )
  {
    // $name = str_replace( "(" )
    // $filename = "NEWS_".$name."_".time().".html";
    $filename = "NEWS__" .time().".html";
    $upload_path = 'uploads/news/';

    $config['upload_path'] = './'.$upload_path;
    $config['file_name'] = ''.$filename;

    return $config;
  }

  public function get_table_config( $_page, $start_number = 1 )
  {
      $table["header"] = array(
        'title' => 'Judul',
        'date' => 'Tanggal Berita',
        'preview' => 'Preview',
        'image' => 'Gambar Depan',
        'hit' => 'Dilihat',
      );
      $table["number"] = $start_number;
      $table[ "action" ] = array(
              array(
                "name" => 'Edit',
                "type" => "link",
                "url" => site_url( $_page."edit/"),
                "button_color" => "primary",
                "param" => "id",
                "title" => "Group",
                "data_name" => "name",
              ),
              array(
                "name" => 'Galeri',
                "type" => "link",
                "url" => site_url( "user/gallery/event/"),
                "button_color" => "success",
                "param" => "id",
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
                    'label' => "Nama Group",
                  ),
                  "file_content" => array(
                      'type' => 'hidden',
                      'label' => "Nama Group",
                  ),
                ),
                "title" => "Group",
                "data_name" => "title",
              ),
    );
    return $table;
  }
  public function validation_config( ){
    $config = array(
      array(
        'field' => 'category_id',
        'label' => 'Kategori Event',
        'rules' =>  'trim|required',
      ),
      array(
        'field' => 'title',
        'label' => 'Judul',
        'rules' =>  'trim|required',
      ),
      array(
        'field' => 'date',
        'label' => 'Tanggal Event',
        'rules' =>  'trim|required',
      ),
      array(
        'field' => 'summernote',
        'label' => 'Deskripsi Event',
        'rules' =>  'trim|required',
      ),
      array(
        'field' => 'preview',
        'label' => 'Konten Preview',
        'rules' =>  'trim|required',
      ),
    );
    
    return $config;
  }
  public function get_form_data( $event_id = NULL )
	{
    $this->load->model(array(
			'category_model',
			'event_model',
    ));
    if( $event_id != NULL )
    {
        $event = $this->event_model->event( $event_id, 1 )->row();
        $this->id           = $event->id;
        $this->category_id  = $event->category_id;
        $this->title        = $event->title;
        $this->date      = $event->date;
        $this->image        = $event->image;
        $this->preview        = $event->preview;
        $this->file_content = $event->file_content;
    }
    $categories = $this->category_model->categories()->result();
    $category_select = [];
    foreach( $categories as $item )
    {
      $category_select[ $item->id ] =  $item->name ;
    }

    // try {
    //   $file_content = file_get_contents( News_services::CONTENT_PATH . $this->file_content );
    // }
    // catch (InvalidArgumentException $e) {
    //   $file_content = "";
    // }
    // finally {
    //     //optional code that always runs
    // }
    if( file_exists( News_services::CONTENT_PATH . $this->file_content ) )
    {
      $file_content = file_get_contents( News_services::CONTENT_PATH . $this->file_content );
    }
    else
    {
      $file_content = "";
    }
		$_data["form_data"] = array(
			"id" => array(
				'type' => 'hidden',
				'label' => "ID",
				'value' => $this->form_validation->set_value('id', $this->id),
			  ),
			"category_id" => array(
			  'type' => 'select',
			  'label' => "Kategori",
			  'options' => $category_select,
			  'selected' =>  $this->category_id,
			),
			"title" => array(
			  'type' => 'text',
			  'label' => "Judul",
			  'value' => $this->form_validation->set_value('title', $this->title),

			),
			"date" => array(
			  'type' => 'date',
			  'label' => "Tanggal Event",
			  'value' => $this->form_validation->set_value('date', $this->date ),
      ),
      "file_content" => array(
			  'type' => 'hidden',
			  'label' => "user_id",
			  'value' => $this->form_validation->set_value('file_content', $this->file_content ),
      ),
      "file_image" => array(
			  'type' => 'hidden',
			  'label' => "user_id",
			  'value' => $this->form_validation->set_value( 'image', $this->image  ),
			),
			"image" => array(
			  'type' => 'file',
			  'label' => "Gambar Depan",
			  'value' => $this->form_validation->set_value( 'image', $this->image),
      ),
      "preview" => array(
			  'type' => 'textarea',
			  'label' => "Konten Preview",
			  'value' => $this->form_validation->set_value('preview', $this->preview  ),
			),
      "summernote" => array(
			  'type' => 'textarea',
			  'label' => "Konten",
			  'value' => $this->form_validation->set_value('image', $file_content  ),
			),
    );
		return $_data;
	}
}
?>
