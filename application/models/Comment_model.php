<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Comment_model extends MY_Model
{
  protected $table = "comment";
  protected $comment_list = array();

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

    $this->set_message("Komentar telah di tambahkan");
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
  public function comment( $id = NULL  )
  {
      if (isset($id))
      {
        $this->where($this->table.'.id', $id);
      }

      $this->limit(1);
      $this->order_by($this->table.'.id', 'desc');

      $this->comments(  );

      return $this;
  }
  // /**
  //  * comments
  //  *
  //  *
  //  * @return static
  //  * @author madukubah
  //  */
  // public function comments(  )
  // {
      
  //     $this->order_by($this->table.'.id', 'asc');
  //     return $this->fetch_data();
  // }

  /**
   * comments
   *
   *
   * @return static
   * @author madukubah
   */
  public function comments( $start = 0 , $limit = NULL )
  {
      if (isset( $limit ))
      {
        $this->limit( $limit );
      }
      $this->offset( $start );
      $this->order_by($this->table.'.id', 'asc');
      return $this->fetch_data();
  }

  public function comments_by_event_id( $event_id = NULL, $comment_id = NULL )
  {
    $this->select( $this->table . '.*' );
    $this->select('visitor.username AS username');
    $this->select('visitor.image AS image');
    if( isset( $event_id ) )
      {
        $this->where($this->table.'.event_id', $event_id);
      }
      $this->where($this->table.'.comment_id', $comment_id);
      $this->join(
        'visitor',
        'visitor.id = comment.visitor_id',
        'inner'
      );
      $this->order_by($this->table.'.id', 'asc');
      return $this->fetch_data();
  }

  public function tree( $event_id = 0, $comment_id = NULL )
  {
    $tree = $this->comments_by_event_id( $event_id, $comment_id )->result();
    // echo json_encode( $tree );
    // echo "<br>";
    if( empty( $tree ) )
    {
      return array();
    }
    foreach( $tree as $branch )
    {
      $this->comment_list[] = $branch;
      $branch->branch = $this->tree( $event_id, $branch->id );
      // var_dump($this->tree( $event_id, $branch->id )); die;
    }

      return $tree;
  }

  public function get_comment_list( )
  {	
      return $this->comment_list;
  }
}
?>
