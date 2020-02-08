<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Visitor_model extends MY_Model
{
  protected $table = "visitor";

  function __construct() {
      parent::__construct( $this->table );
      parent::set_join_key( 'visitor_id' );
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
    if( $this->exist_data( $data_param, ['comment'] ) ){
      $this->set_error("Icon ini sedang dipakai");//('group_delete_unsuccessful');
      return FALSE;
    }
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
  public function visitor( $id = NULL  )
  {
      if (isset($id))
      {
        $this->where($this->table.'.id', $id);
      }

      $this->limit(1);
      $this->order_by($this->table.'.id', 'desc');

      $this->visitors(  );

      return $this;
  }
  public function visitor_by_email( $email = NULL  )
  {
      if (isset($email))
      {
        $this->where($this->table.'.email', $email);
      }

      $this->limit(1);
      $this->order_by($this->table.'.id', 'desc');

      $this->visitors(  );

      return $this;
  }
  public function visitor_by_ip_address( $ip_address = NULL  )
  {
      if (isset($ip_address))
      {
        $this->where($this->table.'.ip_address', $ip_address);
      }

      $this->limit(1);
      $this->order_by($this->table.'.id', 'desc');

      $this->visitors(  );

      return $this;
  }
  // /**
  //  * visitors
  //  *
  //  *
  //  * @return static
  //  * @author madukubah
  //  */

  /**
   * visitors
   *
   *
   * @return static
   * @author madukubah
   */
  public function visitors( $start = 0 , $limit = NULL )
  {
    $this->select( $this->table . '.*' );
      if (isset( $limit ))
      {
        $this->limit( $limit );
      }
      $this->offset( $start );
      $this->order_by($this->table.'.id', 'asc');
      return $this->fetch_data();
  }

}
?>
