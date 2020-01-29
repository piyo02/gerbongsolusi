<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Employee_model extends MY_Model
{
  protected $table = "employee";

  function __construct() {
      parent::__construct( $this->table );
      // parent::set_join_key( 'menu_id' );
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
  public function employee( $id = NULL  )
  {
      if (isset($id))
      {
        $this->where($this->table.'.id', $id);
      }

      $this->limit(1);
      $this->order_by($this->table.'.id', 'desc');

      $this->employees(  );

      return $this;
  }
  // /**
  //  * employees
  //  *
  //  *
  //  * @return static
  //  * @author madukubah
  //  */
  // public function employees(  )
  // {
      
  //     $this->order_by($this->table.'.id', 'asc');
  //     return $this->fetch_data();
  // }

  /**
   * employees
   *
   *
   * @return static
   * @author madukubah
   */
  public function employees( $start = 0 , $limit = NULL )
  {
      if (isset( $limit ))
      {
        $this->limit( $limit );
      }
      $this->offset( $start );
      $this->order_by($this->table.'.id', 'asc');
      return $this->fetch_data();
  }
  
  public function employees_by_division_id( $start = 0 , $limit = NULL, $division_id = NULL)
  {
    $this->select( $this->table . '.*' );
    $this->select( $this->table . '.position AS position_name' );
    $this->select( 'employee.image AS image_old' );
    $this->select('CONCAT( "'.base_url('uploads/employee/').'", employee.image ) AS image');
    $this->select( 'division.name AS division_name' );
    // $this->select( 'position.name AS position_name' );
    if (isset($division_id))
      {
        $this->where($this->table.'.division_id', $division_id);
      }
      $this->join(
        'division',
        'division.id = employee.division_id',
        'inner'
      );
      // $this->join(
      //   'position',
      //   'position.id = employee.position_id',
      //   'inner'
      // );
      $this->order_by($this->table.'.id', 'desc');

      $this->employees( $start, $limit );
      return $this;
  }
}
?>
