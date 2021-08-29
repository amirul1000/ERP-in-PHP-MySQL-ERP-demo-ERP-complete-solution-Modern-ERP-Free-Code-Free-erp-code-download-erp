<?php

/**
 * Author: Amirul Momenin
 * Desc:Accounting_transaction Model
 */
class Accounting_transaction_model extends CI_Model
{
	protected $accounting_transaction = 'accounting_transaction';
	
    function __construct(){
        parent::__construct();
    }
	
    /** Get accounting_transaction by id
	 *@param $id - primary key to get record
	 *
     */
    function get_accounting_transaction($id){
        $result = $this->db->get_where('accounting_transaction',array('id'=>$id))->row_array();
		if(!(array)$result){
			$fields = $this->db->list_fields('accounting_transaction');
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
	
    /** Get all accounting_transaction
	 *
     */
    function get_all_accounting_transaction(){
        $this->db->order_by('id', 'desc');
        $result = $this->db->get('accounting_transaction')->result_array();
		$db_error = $this->db->error();
		if (!empty($db_error['code'])){
			echo 'Database error! Error Code [' . $db_error['code'] . '] Error: ' . $db_error['message'];
			exit;
		}
		return $result;
    }
	
	/** Get limit accounting_transaction
	 *@param $limit - limit of query , $start - start of db table index to get query
	 *
     */
    function get_limit_accounting_transaction($limit, $start){
		$this->db->order_by('id', 'desc');
        $this->db->limit($limit, $start);
        $result = $this->db->get('accounting_transaction')->result_array();
		$db_error = $this->db->error();
		if (!empty($db_error['code'])){
			echo 'Database error! Error Code [' . $db_error['code'] . '] Error: ' . $db_error['message'];
			exit;
		}
		return $result;
    }
	
    /** Count accounting_transaction rows
	 *
     */
	function get_count_accounting_transaction(){
       $result = $this->db->from("accounting_transaction")->count_all_results();
	   $db_error = $this->db->error();
		if (!empty($db_error['code'])){
			echo 'Database error! Error Code [' . $db_error['code'] . '] Error: ' . $db_error['message'];
			exit;
		}
		return $result;
    }
	
	
	 /** Get all users-accounting_transaction
	 *
     */
    function get_all_users_accounting_transaction(){
        $this->db->order_by('id', 'desc');
		$this->db->where('users_id', $this->session->userdata('id'));
        $result = $this->db->get('accounting_transaction')->result_array();
		$db_error = $this->db->error();
		if (!empty($db_error['code'])){
			echo 'Database error! Error Code [' . $db_error['code'] . '] Error: ' . $db_error['message'];
			exit;
		}
		return $result;
    }
	
	/** Get limit users-accounting_transaction
	 *@param $limit - limit of query , $start - start of db table index to get query
	 *
     */
    function get_limit_users_accounting_transaction($limit, $start){
		$this->db->order_by('id', 'desc');
        $this->db->limit($limit, $start);
		$this->db->where('users_id', $this->session->userdata('id'));
        $result = $this->db->get('accounting_transaction')->result_array();
		$db_error = $this->db->error();
		if (!empty($db_error['code'])){
			echo 'Database error! Error Code [' . $db_error['code'] . '] Error: ' . $db_error['message'];
			exit;
		}
		return $result;
    }
	
    /** Count users-accounting_transaction rows
	 *
     */
	function get_count_users_accounting_transaction(){
	   $this->db->where('users_id', $this->session->userdata('id'));
       $result = $this->db->from("accounting_transaction")->count_all_results();
	   $db_error = $this->db->error();
		if (!empty($db_error['code'])){
			echo 'Database error! Error Code [' . $db_error['code'] . '] Error: ' . $db_error['message'];
			exit;
		}
		return $result;
    }
	
    /** function to add new accounting_transaction
	 *@param $params - data set to add record
	 *
     */
    function add_accounting_transaction($params){
        $this->db->insert('accounting_transaction',$params);
        $id = $this->db->insert_id();
		$db_error = $this->db->error();
		if (!empty($db_error['code'])){
			echo 'Database error! Error Code [' . $db_error['code'] . '] Error: ' . $db_error['message'];
			exit;
		}
		return $id;
    }
	
    /** function to update accounting_transaction
	 *@param $id - primary key to update record,$params - data set to add record
	 *
     */
    function update_accounting_transaction($id,$params){
        $this->db->where('id',$id);
        $status = $this->db->update('accounting_transaction',$params);
		$db_error = $this->db->error();
		if (!empty($db_error['code'])){
			echo 'Database error! Error Code [' . $db_error['code'] . '] Error: ' . $db_error['message'];
			exit;
		}
		return $status;
    }
	
    /** function to delete accounting_transaction
	 *@param $id - primary key to delete record
	 *
     */
    function delete_accounting_transaction($id){
        $status = $this->db->delete('accounting_transaction',array('id'=>$id));
		$db_error = $this->db->error();
		if (!empty($db_error['code'])){
			echo 'Database error! Error Code [' . $db_error['code'] . '] Error: ' . $db_error['message'];
			exit;
		}
		return $status;
    }
}
