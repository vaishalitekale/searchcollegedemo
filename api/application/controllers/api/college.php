<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

require APPPATH.'/libraries/REST_Controller.php';

class College extends REST_Controller
{
    public function colleges_get()
    {
        // Display all colleges
		$this->load->database();
		$this->response($this->db->get('colleges')->result());
    }
	
	public function singlecollege_get()
    {
	    if(!$this->get('id'))
        {
        	$this->response(NULL, 400);
        }
        // Display all colleges
		$this->load->database();
		
		$query = $this->db->query('SELECT id,name,address FROM colleges WHERE id='.$this->get('id'));
		$row = $query->row_array();
		
		$this->response($row);
    }

    public function college_post()
    {
        // Create a new college
    }
	function deletecollege_post()
    {
        if(!$this->post('id'))
        {
        	$this->response(NULL, 400);
        }
        // Display all colleges
		$this->load->database();
		
		//$query = $this->db->query('DELETE * FROM colleges WHERE id='.$this->get('id'));
		$this->db->where('id', $this->post('id'));
		$this->db->delete('colleges');
		//$row = $query->row_array();
		$message = array('id' => $this->post('id'), 'message' => 'DELETED!');
        
		$this->response($message, 200);
    }
	 public function addcollege_post()
    {
	/*    if(!$this->get('id'))
        {
        	$this->response(NULL, 400);
        }*/
        // Display all colleges
		$this->load->database();
		$data = array(
               'name' =>  $this->post('name'),
               'address' =>  $this->post('address')
            );
		$query = $this->db->insert('colleges', $data); 
		$message = array("message" => "Added Successfuly");
		$this->response($message, 200);
    }
	/*public function update_college()
    {
	    if(!$this->get('id'))
        {
        	$this->response(NULL, 400);
        }
        // Display all colleges
		$this->load->database();
		$data = array(
               'name' => $name,
               'address' => $address
            );

		$query = $this->db->where('id', $id);
		$query = $this->db->update('colleges', $data); 

		
		$row = $query->row_array();
		
		$this->response($row);
    } */
	
	
	
}