<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Event_model extends MY_Model
{
  protected $table = "event";

  function __construct() {
      parent::__construct( $this->table );
      parent::set_join_key( 'event_id' );
  }

  /**
   * create
   *
   * @param array  $data
   * @return static
   * @author madukubah
   */
  public function create( $data )
  {
      // Filter the data passed
      $data = $this->_filter_data($this->table, $data);

      $this->db->insert($this->table, $data);
      $id = $this->db->insert_id($this->table . '_id_seq');
    
      if( isset($id) )
      {
        $this->set_message("berhasil");
        return $id;
      }
      $this->set_error("gagal");
          return FALSE;
  }
  /**
   * update
   *
   * @param array  $data
   * @param array  $data_param
   * @return bool
   * @author madukubah
   */
  public function update( $data, $data_param  )
  {
    $this->db->trans_begin();
    $data = $this->_filter_data($this->table, $data);

    $this->db->update($this->table, $data, $data_param );
    if ($this->db->trans_status() === FALSE)
    {
      $this->db->trans_rollback();

      $this->set_error("gagal");
      return FALSE;
    }

    $this->db->trans_commit();

    $this->set_message("berhasil");
    return TRUE;
  }
  /**
   * delete
   *
   * @param array  $data_param
   * @return bool
   * @author madukubah
   */
  public function delete( $data_param  )
  {
    if( $this->exist_data( $data_param, ['gallery', 'comment'] ) ){
      $this->set_error("Divisi ini memiliki data pegawai");//('group_delete_unsuccessful');
      return FALSE;
    }
    //foreign
    // //delete_foreign( $data_param. $models[]  )
    // if( !$this->delete_foreign( $data_param, ['menu_model'] ) )
    // {
    //   $this->set_error("gagal");//('group_delete_unsuccessful');
    //   return FALSE;
    // }
    //foreign
    $this->db->trans_begin();

    $this->db->delete($this->table, $data_param );
    if ($this->db->trans_status() === FALSE)
    {
      $this->db->trans_rollback();

      $this->set_error("gagal");//('group_delete_unsuccessful');
      return FALSE;
    }

    $this->db->trans_commit();

    $this->set_message("berhasil");//('group_delete_successful');
    return TRUE;
  }

    /**
   * group
   *
   * @param int|array|null $id = id_groups
   * @return static
   * @author madukubah
   */
  public function event( $id = NULL, $is_news = 0 )
  {
      if (isset($id))
      {
        $this->where($this->table.'.id', $id);
      }

      $this->limit(1);
      $this->order_by($this->table.'.id', 'desc');

      $this->events( 0, NULL, $is_news );

      return $this;
  }

  public function event_by_file_content( $file_content = NULL, $is_news = 0 )
  {
      if (isset($file_content))
      {
        $this->where($this->table.'.file_content', $file_content);
      }

      $this->limit(1);
      $this->order_by($this->table.'.id', 'desc');

      $this->events( 0, NULL, $is_news );

      return $this;
  }
  // /**
  //  * events
  //  *
  //  *
  //  * @return static
  //  * @author madukubah
  //  */
  // public function events(  )
  // {
      
  //     $this->order_by($this->table.'.id', 'asc');
  //     return $this->fetch_data();
  // }

  /**
   * events
   *
   *
   * @return static
   * @author madukubah
   */
  public function events( $start = 0 , $limit = NULL, $is_news = 0 )
  {
    $this->select($this->table . '.*');
    $this->select($this->table . '.image AS image_old');
    if( $is_news ){
      $this->select('CONCAT( "'.base_url('uploads/news/photo/').'", image ) AS image');
      $this->select('CONCAT( "'.base_url('visitor/news/article/').'", file_content ) AS file_article');
    }
    else{
      $this->select('CONCAT( "'.base_url('uploads/event/photo/').'", image ) AS image');
      $this->select('CONCAT( "'.base_url('visitor/event/article/').'", file_content ) AS file_article');
    }
    if (isset( $limit ))
      {
        $this->limit( $limit );
      }
      $this->offset( $start );
      $this->order_by($this->table.'.date', 'asc');
      $this->where( $this->table . '.is_news', $is_news );
      return $this->fetch_data();
  }

  public function events_most_popular( $start = 0, $limit = NULL, $is_news = 0 )
  {
    $this->select($this->table . '.*');
    $this->select($this->table . '.image AS image_old');
    if( $is_news ){
      $this->select('CONCAT( "'.base_url('uploads/news/photo/').'", image ) AS image');
      $this->select('CONCAT( "'.base_url('visitor/news/article/').'", file_content ) AS file_article');
    }
    else{
      $this->select('CONCAT( "'.base_url('uploads/event/photo/').'", image ) AS image');
      $this->select('CONCAT( "'.base_url('visitor/event/article/').'", file_content ) AS file_article');
    }
    if (isset( $limit ))
      {
        $this->limit( $limit );
      }
      $this->offset( $start );
      $this->order_by($this->table.'.hit', 'desc');
      $this->where( $this->table . '.is_news', $is_news );
      return $this->fetch_data();
  }
}
?>
