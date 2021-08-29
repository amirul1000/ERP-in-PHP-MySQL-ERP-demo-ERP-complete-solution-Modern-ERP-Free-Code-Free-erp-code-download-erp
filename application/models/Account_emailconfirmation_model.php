<?php

/**
 * Author: Amirul Momenin
 * Desc:Account_emailconfirmation Model
 */
class Account_emailconfirmation_model extends CI_Model
{
	protected $account_emailconfirmation = 'account_emailconfirmation';
	
    function __construct(){
        parent::__construct();
    }
	
    /** Get account_emailconfirmation by id
	 *@param $id - primary key to get record
	 *
     */
    function get_account_emailconfirmation($id){
        $result = $this->db->get_where('account_emailconfirmation',array('id'=>$id))->row_array();
		if(!(array)$result){
			$fields = $this->db->list_fields('account_emailconfirmation');
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
	
    /** Get all account_emailconfirmation
	 *
     */
    function get_all_account_emailconfirmation(){
        $this->db->order_by('id', 'desc');
        $result = $this->db->get('account_emailconfirmation')->result_array();
		$db_error = $this->db->error();
		if (!empty($db_error['code'])){
			echo 'Database error! Error Code [' . $db_error['code'] . '] Error: ' . $db_error['message'];
			exit;
		}
		return $result;
    }
	
	/** Get limit account_emailconfirmation
	 *@param $limit - limit of query , $start - start of db table index to get query
	 *
     */
    function get_limit_account_emailconfirmation($limit, $start){
		$this->db->order_by('id', 'desc');
        $this->db->limit($limit, $start);
        $result = $this->db->get('account_emailconfirmation')->result_array();
		$db_error = $this->db->error();
		if (!empty($db_error['code'])){
			echo 'Database error! Error Code [' . $db_error['code'] . '] Error: ' . $db_error['message'];
			exit;
		}
		return $result;
    }
	
    /** Count account_emailconfirmation rows
	 *
     */
	function get_count_account_emailconfirmation(){
       $result = $this->db->from("account_emailconfirmation")->count_all_results();
	   $db_error = $this->db->error();
		if (!empty($db_error['code'])){
			echo 'Database error! Error Code [' . $db_error['code'] . '] Error: ' . $db_error['message'];
			exit;
		}
		return $result;
    }
	
	
	 /** Get all users-account_emailconfirmation
	 *
     */
    function get_all_users_account_emailconfirmation(){
        $this->db->order_by('id', 'desc');
		$this->db->where('users_id', $this->session->userdata('id'));
        $result = $this->db->get('account_emailconfirmation')->result_array();
		$db_error = $this->db->error();
		if (!empty($db_error['code'])){
			echo 'Database error! Error Code [' . $db_error['code'] . '] Error: ' . $db_error['message'];
			exit;
		}
		return $result;
    }
	
	/** Get limit users-account_emailconfirmation
	 *@param $limit - limit of query , $start - start of db table index to get query
	 *
     */
    function get_limit_users_account_emailconfirmation($limit, $start){
		$this->db->order_by('id', 'desc');
        $this->db->limit($limit, $start);
		$this->db->where('users_id', $this->session->userdata('id'));
        $result = $this->db->get('account_emailconfirmation')->result_array();
		$db_error = $this->db->error();
		if (!empty($db_error['code'])){
			echo 'Database error! Error Code [' . $db_error['code'] . '] Error: ' . $db_error['message'];
			exit;
		}
		return $result;
    }
	
    /** Count users-account_emailconfirmation rows
	 *
     */
	function get_count_users_account_emailconfirmation(){
	   $this->db->where('users_id', $this->session->userdata('id'));
       $result = $this->db->from("account_emailconfirmation")->count_all_results();
	   $db_error = $this->db->error();
		if (!empty($db_error['code'])){
			echo 'Database error! Error Code [' . $db_error['code'] . '] Error: ' . $db_error['message'];
			exit;
		}
		return $result;
    }
	
    /** function to add new account_emailconfirmation
	 *@param $params - data set to add record
	 *
     */
    function add_account_emailconfirmation($params){
        $this->db->insert('account_emailconfirmation',$params);
        $id = $this->db->insert_id();
		$db_error = $this->db->error();
		if (!empty($db_error['code'])){
			echo 'Database error! Error Code [' . $db_error['code'] . '] Error: ' . $db_error['message'];
			exit;
		}
		return $id;
    }
	
    /** function to update account_emailconfirmation
	 *@param $id - primary key to update record,$params - data set to add record
	 *
     */
    function update_account_emailconfirmation($id,$params){
        $this->db->where('id',$id);
        $status = $this->db->update('account_emailconfirmation',$params);
		$db_error = $this->db->error();
		if (!empty($db_error['code'])){
			echo 'Database error! Error Code [' . $db_error['code'] . '] Error: ' . $db_error['message'];
			exit;
		}
		return $status;
    }
	
    /** function to delete account_emailconfirmation
	 *@param $id - primary key to delete record
	 *
     */
    function delete_account_emailconfirmation($id){
        $status = $this->db->delete('account_emailconfirmation',array('id'=>$id));
		$db_error = $this->db->error();
		if (!empty($db_error['code'])){
			echo 'Database error! Error Code [' . $db_error['code'] . '] Error: ' . $db_error['message'];
			exit;
		}
		return $status;
    }
}
