<?php

/**
 * Author: Amirul Momenin
 * Desc:Accounting_transactiondetails Model
 */
class Accounting_transactiondetails_model extends CI_Model
{
	protected $accounting_transactiondetails = 'accounting_transactiondetails';
	
    function __construct(){
        parent::__construct();
    }
	
    /** Get accounting_transactiondetails by id
	 *@param $id - primary key to get record
	 *
     */
    function get_accounting_transactiondetails($id){
        $result = $this->db->get_where('accounting_transactiondetails',array('id'=>$id))->row_array();
		if(!(array)$result){
			$fields = $this->db->list_fields('accounting_transactiondetails');
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
	
    /** Get all accounting_transactiondetails
	 *
     */
    function get_all_accounting_transactiondetails(){
        $this->db->order_by('id', 'desc');
        $result = $this->db->get('accounting_transactiondetails')->result_array();
		$db_error = $this->db->error();
		if (!empty($db_error['code'])){
			echo 'Database error! Error Code [' . $db_error['code'] . '] Error: ' . $db_error['message'];
			exit;
		}
		return $result;
    }
	
	/** Get limit accounting_transactiondetails
	 *@param $limit - limit of query , $start - start of db table index to get query
	 *
     */
    function get_limit_accounting_transactiondetails($limit, $start){
		$this->db->order_by('id', 'desc');
        $this->db->limit($limit, $start);
        $result = $this->db->get('accounting_transactiondetails')->result_array();
		$db_error = $this->db->error();
		if (!empty($db_error['code'])){
			echo 'Database error! Error Code [' . $db_error['code'] . '] Error: ' . $db_error['message'];
			exit;
		}
		return $result;
    }
	
    /** Count accounting_transactiondetails rows
	 *
     */
	function get_count_accounting_transactiondetails(){
       $result = $this->db->from("accounting_transactiondetails")->count_all_results();
	   $db_error = $this->db->error();
		if (!empty($db_error['code'])){
			echo 'Database error! Error Code [' . $db_error['code'] . '] Error: ' . $db_error['message'];
			exit;
		}
		return $result;
    }
	
	
	 /** Get all users-accounting_transactiondetails
	 *
     */
    function get_all_users_accounting_transactiondetails(){
        $this->db->order_by('id', 'desc');
		$this->db->where('users_id', $this->session->userdata('id'));
        $result = $this->db->get('accounting_transactiondetails')->result_array();
		$db_error = $this->db->error();
		if (!empty($db_error['code'])){
			echo 'Database error! Error Code [' . $db_error['code'] . '] Error: ' . $db_error['message'];
			exit;
		}
		return $result;
    }
	
	/** Get limit users-accounting_transactiondetails
	 *@param $limit - limit of query , $start - start of db table index to get query
	 *
     */
    function get_limit_users_accounting_transactiondetails($limit, $start){
		$this->db->order_by('id', 'desc');
        $this->db->limit($limit, $start);
		$this->db->where('users_id', $this->session->userdata('id'));
        $result = $this->db->get('accounting_transactiondetails')->result_array();
		$db_error = $this->db->error();
		if (!empty($db_error['code'])){
			echo 'Database error! Error Code [' . $db_error['code'] . '] Error: ' . $db_error['message'];
			exit;
		}
		return $result;
    }
	
    /** Count users-accounting_transactiondetails rows
	 *
     */
	function get_count_users_accounting_transactiondetails(){
	   $this->db->where('users_id', $this->session->userdata('id'));
       $result = $this->db->from("accounting_transactiondetails")->count_all_results();
	   $db_error = $this->db->error();
		if (!empty($db_error['code'])){
			echo 'Database error! Error Code [' . $db_error['code'] . '] Error: ' . $db_error['message'];
			exit;
		}
		return $result;
    }
	
    /** function to add new accounting_transactiondetails
	 *@param $params - data set to add record
	 *
     */
    function add_accounting_transactiondetails($params){
        $this->db->insert('accounting_transactiondetails',$params);
        $id = $this->db->insert_id();
		$db_error = $this->db->error();
		if (!empty($db_error['code'])){
			echo 'Database error! Error Code [' . $db_error['code'] . '] Error: ' . $db_error['message'];
			exit;
		}
		return $id;
    }
	
    /** function to update accounting_transactiondetails
	 *@param $id - primary key to update record,$params - data set to add record
	 *
     */
    function update_accounting_transactiondetails($id,$params){
        $this->db->where('id',$id);
        $status = $this->db->update('accounting_transactiondetails',$params);
		$db_error = $this->db->error();
		if (!empty($db_error['code'])){
			echo 'Database error! Error Code [' . $db_error['code'] . '] Error: ' . $db_error['message'];
			exit;
		}
		return $status;
    }
	
    /** function to delete accounting_transactiondetails
	 *@param $id - primary key to delete record
	 *
     */
    function delete_accounting_transactiondetails($id){
        $status = $this->db->delete('accounting_transactiondetails',array('id'=>$id));
		$db_error = $this->db->error();
		if (!empty($db_error['code'])){
			echo 'Database error! Error Code [' . $db_error['code'] . '] Error: ' . $db_error['message'];
			exit;
		}
		return $status;
    }
}
