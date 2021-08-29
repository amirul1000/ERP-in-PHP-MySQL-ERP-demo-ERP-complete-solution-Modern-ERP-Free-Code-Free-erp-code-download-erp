<?php

/**
 * Author: Amirul Momenin
 * Desc:Account_emailaddress Model
 */
class Account_emailaddress_model extends CI_Model
{
	protected $account_emailaddress = 'account_emailaddress';
	
    function __construct(){
        parent::__construct();
    }
	
    /** Get account_emailaddress by id
	 *@param $id - primary key to get record
	 *
     */
    function get_account_emailaddress($id){
        $result = $this->db->get_where('account_emailaddress',array('id'=>$id))->row_array();
		if(!(array)$result){
			$fields = $this->db->list_fields('account_emailaddress');
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
	
    /** Get all account_emailaddress
	 *
     */
    function get_all_account_emailaddress(){
        $this->db->order_by('id', 'desc');
        $result = $this->db->get('account_emailaddress')->result_array();
		$db_error = $this->db->error();
		if (!empty($db_error['code'])){
			echo 'Database error! Error Code [' . $db_error['code'] . '] Error: ' . $db_error['message'];
			exit;
		}
		return $result;
    }
	
	/** Get limit account_emailaddress
	 *@param $limit - limit of query , $start - start of db table index to get query
	 *
     */
    function get_limit_account_emailaddress($limit, $start){
		$this->db->order_by('id', 'desc');
        $this->db->limit($limit, $start);
        $result = $this->db->get('account_emailaddress')->result_array();
		$db_error = $this->db->error();
		if (!empty($db_error['code'])){
			echo 'Database error! Error Code [' . $db_error['code'] . '] Error: ' . $db_error['message'];
			exit;
		}
		return $result;
    }
	
    /** Count account_emailaddress rows
	 *
     */
	function get_count_account_emailaddress(){
       $result = $this->db->from("account_emailaddress")->count_all_results();
	   $db_error = $this->db->error();
		if (!empty($db_error['code'])){
			echo 'Database error! Error Code [' . $db_error['code'] . '] Error: ' . $db_error['message'];
			exit;
		}
		return $result;
    }
	
	
	 /** Get all users-account_emailaddress
	 *
     */
    function get_all_users_account_emailaddress(){
        $this->db->order_by('id', 'desc');
		$this->db->where('users_id', $this->session->userdata('id'));
        $result = $this->db->get('account_emailaddress')->result_array();
		$db_error = $this->db->error();
		if (!empty($db_error['code'])){
			echo 'Database error! Error Code [' . $db_error['code'] . '] Error: ' . $db_error['message'];
			exit;
		}
		return $result;
    }
	
	/** Get limit users-account_emailaddress
	 *@param $limit - limit of query , $start - start of db table index to get query
	 *
     */
    function get_limit_users_account_emailaddress($limit, $start){
		$this->db->order_by('id', 'desc');
        $this->db->limit($limit, $start);
		$this->db->where('users_id', $this->session->userdata('id'));
        $result = $this->db->get('account_emailaddress')->result_array();
		$db_error = $this->db->error();
		if (!empty($db_error['code'])){
			echo 'Database error! Error Code [' . $db_error['code'] . '] Error: ' . $db_error['message'];
			exit;
		}
		return $result;
    }
	
    /** Count users-account_emailaddress rows
	 *
     */
	function get_count_users_account_emailaddress(){
	   $this->db->where('users_id', $this->session->userdata('id'));
       $result = $this->db->from("account_emailaddress")->count_all_results();
	   $db_error = $this->db->error();
		if (!empty($db_error['code'])){
			echo 'Database error! Error Code [' . $db_error['code'] . '] Error: ' . $db_error['message'];
			exit;
		}
		return $result;
    }
	
    /** function to add new account_emailaddress
	 *@param $params - data set to add record
	 *
     */
    function add_account_emailaddress($params){
        $this->db->insert('account_emailaddress',$params);
        $id = $this->db->insert_id();
		$db_error = $this->db->error();
		if (!empty($db_error['code'])){
			echo 'Database error! Error Code [' . $db_error['code'] . '] Error: ' . $db_error['message'];
			exit;
		}
		return $id;
    }
	
    /** function to update account_emailaddress
	 *@param $id - primary key to update record,$params - data set to add record
	 *
     */
    function update_account_emailaddress($id,$params){
        $this->db->where('id',$id);
        $status = $this->db->update('account_emailaddress',$params);
		$db_error = $this->db->error();
		if (!empty($db_error['code'])){
			echo 'Database error! Error Code [' . $db_error['code'] . '] Error: ' . $db_error['message'];
			exit;
		}
		return $status;
    }
	
    /** function to delete account_emailaddress
	 *@param $id - primary key to delete record
	 *
     */
    function delete_account_emailaddress($id){
        $status = $this->db->delete('account_emailaddress',array('id'=>$id));
		$db_error = $this->db->error();
		if (!empty($db_error['code'])){
			echo 'Database error! Error Code [' . $db_error['code'] . '] Error: ' . $db_error['message'];
			exit;
		}
		return $status;
    }
}
