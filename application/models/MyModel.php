<?php

class MyModel extends CI_model
{

  public function cekLogin($username, $password) {
    $exec = $this->db->select('username')
      ->from('user')
      ->where('username', $username)
      ->where('password', $password)
      ->get()
      ->result();
    return $exec;
  }

  public function getRack() {
    $exec = $this->db->select('id, name')
      ->from('racks')
      ->get()
      ->result();
    return $exec;
  }

  public function getBook() {
    $exec = $this->db->select('id, name')
      ->from('books')
      ->get()
      ->result();
    return $exec;
  }

  public function getData() {
    $exec = $this->db->select('a.rack_id, b.name AS book')
      ->from('rack_book a')
      ->join('books b', 'a.book_id = b.id')
      ->get()
      ->result();
    return $exec;
  }

  public function getAllData() {
    $exec = $this->db->select('a.id, b.name AS rack, c.name AS book')
      ->from('rack_book a')
      ->join('racks b', 'a.rack_id = b.id')
      ->join('books c', 'a.book_id = c.id')
      ->get()
      ->result();
    return $exec;
  }

  public function getDataById($id) {
    $exec = $this->db->select('rack_id, book_id')
      ->from('rack_book')
      ->where('id', $id)
      ->get()
      ->result();
    return $exec;
  }  

  	public function addData($data) {
		$this->db->trans_start();
	  	$this->db->insert('rack_book', $data);
	  	$this->db->trans_complete();
	  	if ($this->db->trans_status() === FALSE) {
	  		$this->db->trans_rollback();
	  		echo "failed";
	  	} else {
	  		$this->db->trans_commit();
	  		echo "success";
	  	}
	}

	public function editData($data, $id) 
	{
		$this->db->trans_start();
		$this->db->set($data);
    	$this->db->where('id', $id);
      	$this->db->update('rack_book');
      	$this->db->trans_complete();
      	if ($this->db->trans_status() === FALSE) {
      		$this->db->trans_rollback();
	  		echo "failed";
      	} else {
      		$this->db->trans_commit();
	  		echo "success";
      	}
    }

	public function deleteData($id)
   	{
		$this->db->trans_start();
    	$this->db->where('id', $id);
     	$this->db->delete('rack_book');
      	$this->db->trans_complete();
      	if ($this->db->trans_status() === FALSE) {
      		$this->db->trans_rollback();
	  		echo "failed";
		} else {
      		$this->db->trans_commit();
	  		echo "success";
		}
   	}

}