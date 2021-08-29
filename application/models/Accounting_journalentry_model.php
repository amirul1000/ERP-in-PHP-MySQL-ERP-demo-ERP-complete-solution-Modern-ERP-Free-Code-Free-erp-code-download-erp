<?php

/**
 * Author: Amirul Momenin
 * Desc:Accounting_journalentry Model
 */
class Accounting_journalentry_model extends CI_Model
{
	protected $accounting_journalentry = 'accounting_journalentry';
	
    function __construct(){
        parent::__construct();
    }
	
    /** Get accounting_journalentry by id
	 *@param $id - primary key to get record
	 *
     */
    function get_accounting_journalentry($id){
        $result = $this->db->get_where('accounting_journalentry',array('id'=>$id))->row_array();
		if(!(array)$result){
			$fields = $this->db->list_fields('accounting_journalentry');
			foreach ($fields as $field)
			{
			   $result[$field] = ''; 	  
			}
		}
		$db_error = $this->db->error();
		if (!empty($db_error['code'])){
			echo 'Database error! Error Code [' . $db_error['code'] . '] Error: ' . $db_error['message'];
			exit;
		}
		return $result;
    } 
	
    /** Get all accounting_journalentry
	 *
     */
    function get_all_accounting_journalentry(){
        $this->db->order_by('id', 'desc');
        $result = $this->db->get('accounting_journalentry')->result_array();
		$db_error = $this->db->error();
		if (!empty($db_error['code'])){
			echo 'Database error! Error Code [' . $db_error['code'] . '] Error: ' . $db_error['message'];
			exit;
		}
		return $result;
    }
	
	/** Get limit accounting_journalentry
	 *@param $limit - limit of query , $start - start of db table index to get query
	 *
     */
    function get_limit_accounting_journalentry($limit, $start){
		$this->db->order_by('id', 'desc');
        $this->db->limit($limit, $start);
        $result = $this->db->get('accounting_journalentry')->result_array();
		$db_error = $this->db->error();
		if (!empty($db_error['code'])){
			echo 'Database error! Error Code [' . $db_error['code'] . '] Error: ' . $db_error['message'];
			exit;
		}
		return $result;
    }
	
    /** Count accounting_journalentry rows
	 *
     */
	function get_count_accounting_journalentry(){
       $result = $this->db->from("accounting_journalentry")->count_all_results();
	   $db_error = $this->db->error();
		if (!empty($db_error['code'])){
			echo 'Database error! Error Code [' . $db_error['code'] . '] Error: ' . $db_error['message'];
			exit;
		}
		return $result;
    }
	
	
	 /** Get all users-accounting_journalentry
	 *
     */
    function get_all_users_accounting_journalentry(){
        $this->db->order_by('id', 'desc');
		$this->db->where('users_id', $this->session->userdata('id'));
        $result = $this->db->get('accounting_journalentry')->result_array();
		$db_error = $this->db->error();
		if (!empty($db_error['code'])){
			echo 'Database error! Error Code [' . $db_error['code'] . '] Error: ' . $db_error['message'];
			exit;
		}
		return $result;
    }
	
	/** Get limit users-accounting_journalentry
	 *@param $limit - limit of query , $start - start of db table index to get query
	 *
     */
    function get_limit_users_accounting_journalentry($limit, $start){
		$this->db->order_by('id', 'desc');
        $this->db->limit($limit, $start);
		$this->db->where('users_id', $this->session->userdata('id'));
        $result = $this->db->get('accounting_journalentry')->result_array();
		$db_error = $this->db->error();
		if (!empty($db_error['code'])){
			echo 'Database error! Error Code [' . $db_error['code'] . '] Error: ' . $db_error['message'];
			exit;
		}
		return $result;
    }
	
    /** Count users-accounting_journalentry rows
	 *
     */
	function get_count_users_accounting_journalentry(){
	   $this->db->where('users_id', $this->session->userdata('id'));
       $result = $this->db->from("accounting_journalentry")->count_all_results();
	   $db_error = $this->db->error();
		if (!empty($db_error['code'])){
			echo 'Database error! Error Code [' . $db_error['code'] . '] Error: ' . $db_error['message'];
			exit;
		}
		return $result;
    }
	
    /** function to add new accounting_journalentry
	 *@param $params - data set to add record
	 *
     */
    function add_accounting_journalentry($params){
        $this->db->insert('accounting_journalentry',$params);
        $id = $this->db->insert_id();
		$db_error = $this->db->error();
		if (!empty($db_error['code'])){
			echo 'Database error! Error Code [' . $db_error['code'] . '] Error: ' . $db_error['message'];
			exit;
		}
		return $id;
    }
	
    /** function to update accounting_journalentry
	 *@param $id - primary key to update record,$params - data set to add record
	 *
     */
    function update_accounting_journalentry($id,$params){
        $this->db->where('id',$id);
        $status = $this->db->update('accounting_journalentry',$params);
		$db_error = $this->db->error();
		if (!empty($db_error['code'])){
			echo 'Database error! Error Code [' . $db_error['code'] . '] Error: ' . $db_error['message'];
			exit;
		}
		return $status;
    }
	
    /** function to delete accounting_journalentry
	 *@param $id - primary key to delete record
	 *
     */
    function delete_accounting_journalentry($id){
        $status = $this->db->delete('accounting_journalentry',array('id'=>$id));
		$db_error = $this->db->error();
		if (!empty($db_error['code'])){
			echo 'Database error! Error Code [' . $db_error['code'] . '] Error: ' . $db_error['message'];
			exit;
		}
		return $status;
    }
}
