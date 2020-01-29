<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Contact_model extends MY_Model
{
  protected $table = "contact";

  function __construct() {
      parent::__construct( $this->table );
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
    $this->db->trans_begin();

    $this->db->delete($this->table, $data_param );
    if ($this->db->trans_status() === FALSE)
    {
      $this->db->trans_rollback();

      $this->set_error("gagal");//('contact_delete_unsuccessful');
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
  public function contact( $id = NULL  )
  {
      if (isset($id))
      {
        $this->where($this->table.'.id', $id);
      }

      $this->limit(1);
      $this->order_by($this->table.'.id', 'desc');

      $this->contacts(  );

      return $this;
  }
  // /**
  //  * contacts
  //  *
  //  *
  //  * @return static
  //  * @author madukubah
  //  */
  // public function contacts(  )
  // {
      
  //     $this->order_by($this->table.'.id', 'asc');
  //     return $this->fetch_data();
  // }

  /**
   * contacts
   *
   *
   * @return static
   * @author madukubah
   */
  public function contacts( $where = NULL )
  {
    $this->select( $this->table . '.*' );
    $this->select( 'icon.name AS icon_name' );
    $this->select( 'icon.icon AS icon' );
    $this->select('CONCAT( "'.base_url('uploads/icon/').'", icon.file ) AS image');
    $this->join(
      'icon',
      'icon.id = contact.icon_id',
      'right'
    );
    if( $where ){
      $this->where("contact.contact !=", NULL);
    }
      $this->order_by($this->table.'.id', 'asc');
      return $this->fetch_data();
  }

}
?>
