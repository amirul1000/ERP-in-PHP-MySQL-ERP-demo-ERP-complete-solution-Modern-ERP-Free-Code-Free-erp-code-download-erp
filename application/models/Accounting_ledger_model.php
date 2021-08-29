<?php

/**
 * Author: Amirul Momenin
 * Desc:Accounting_ledger Model
 */
class Accounting_ledger_model extends CI_Model
{
	protected $accounting_ledger = 'accounting_ledger';
	
    function __construct(){
        parent::__construct();
    }
	
    /** Get accounting_ledger by id
	 *@param $id - primary key to get record
	 *
     */
    function get_accounting_ledger($id){
        $result = $this->db->get_where('accounting_ledger',array('id'=>$id))->row_array();
		if(!(array)$result){
			$fields = $this->db->list_fields('accounting_ledger');
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
	
    /** Get all accounting_ledger
	 *
     */
    function get_all_accounting_ledger(){
        $this->db->order_by('id', 'desc');
        $result = $this->db->get('accounting_ledger')->result_array();
		$db_error = $this->db->error();
		if (!empty($db_error['code'])){
			echo 'Database error! Error Code [' . $db_error['code'] . '] Error: ' . $db_error['message'];
			exit;
		}
		return $result;
    }
	
	/** Get limit accounting_ledger
	 *@param $limit - limit of query , $start - start of db table index to get query
	 *
     */
    function get_limit_accounting_ledger($limit, $start){
		$this->db->order_by('id', 'desc');
        $this->db->limit($limit, $start);
        $result = $this->db->get('accounting_ledger')->result_array();
		$db_error = $this->db->error();
		if (!empty($db_error['code'])){
			echo 'Database error! Error Code [' . $db_error['code'] . '] Error: ' . $db_error['message'];
			exit;
		}
		return $result;
    }
	
    /** Count accounting_ledger rows
	 *
     */
	function get_count_accounting_ledger(){
       $result = $this->db->from("accounting_ledger")->count_all_results();
	   $db_error = $this->db->error();
		if (!empty($db_error['code'])){
			echo 'Database error! Error Code [' . $db_error['code'] . '] Error: ' . $db_error['message'];
			exit;
		}
		return $result;
    }
	
	
	 /** Get all users-accounting_ledger
	 *
     */
    function get_all_users_accounting_ledger(){
        $this->db->order_by('id', 'desc');
		$this->db->where('users_id', $this->session->userdata('id'));
        $result = $this->db->get('accounting_ledger')->result_array();
		$db_error = $this->db->error();
		if (!empty($db_error['code'])){
			echo 'Database error! Error Code [' . $db_error['code'] . '] Error: ' . $db_error['message'];
			exit;
		}
		return $result;
    }
	
	/** Get limit users-accounting_ledger
	 *@param $limit - limit of query , $start - start of db table index to get query
	 *
     */
    function get_limit_users_accounting_ledger($limit, $start){
		$this->db->order_by('id', 'desc');
        $this->db->limit($limit, $start);
		$this->db->where('users_id', $this->session->userdata('id'));
        $result = $this->db->get('accounting_ledger')->result_array();
		$db_error = $this->db->error();
		if (!empty($db_error['code'])){
			echo 'Database error! Error Code [' . $db_error['code'] . '] Error: ' . $db_error['message'];
			exit;
		}
		return $result;
    }
	
    /** Count users-accounting_ledger rows
	 *
     */
	function get_count_users_accounting_ledger(){
	   $this->db->where('users_id', $this->session->userdata('id'));
       $result = $this->db->from("accounting_ledger")->count_all_results();
	   $db_error = $this->db->error();
		if (!empty($db_error['code'])){
			echo 'Database error! Error Code [' . $db_error['code'] . '] Error: ' . $db_error['message'];
			exit;
		}
		return $result;
    }
	
    /** function to add new accounting_ledger
	 *@param $params - data set to add record
	 *
     */
    function add_accounting_ledger($params){
        $this->db->insert('accounting_ledger',$params);
        $id = $this->db->insert_id();
		$db_error = $this->db->error();
		if (!empty($db_error['code'])){
			echo 'Database error! Error Code [' . $db_error['code'] . '] Error: ' . $db_error['message'];
			exit;
		}
		return $id;
    }
	
    /** function to update accounting_ledger
	 *@param $id - primary key to update record,$params - data set to add record
	 *
     */
    function update_accounting_ledger($id,$params){
        $this->db->where('id',$id);
        $status = $this->db->update('accounting_ledger',$params);
		$db_error = $this->db->error();
		if (!empty($db_error['code'])){
			echo 'Database error! Error Code [' . $db_error['code'] . '] Error: ' . $db_error['message'];
			exit;
		}
		return $status;
    }
	
    /** function to delete accounting_ledger
	 *@param $id - primary key to delete record
	 *
     */
    function delete_accounting_ledger($id){
        $status = $this->db->delete('accounting_ledger',array('id'=>$id));
		$db_error = $this->db->error();
		if (!empty($db_error['code'])){
			echo 'Database error! Error Code [' . $db_error['code'] . '] Error: ' . $db_error['message'];
			exit;
		}
		return $status;
    }
}
