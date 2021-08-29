<?php

/**
 * Author: Amirul Momenin
 * Desc:Accounting_accounttype Model
 */
class Accounting_accounttype_model extends CI_Model
{
	protected $accounting_accounttype = 'accounting_accounttype';
	
    function __construct(){
        parent::__construct();
    }
	
    /** Get accounting_accounttype by id
	 *@param $id - primary key to get record
	 *
     */
    function get_accounting_accounttype($id){
        $result = $this->db->get_where('accounting_accounttype',array('id'=>$id))->row_array();
		if(!(array)$result){
			$fields = $this->db->list_fields('accounting_accounttype');
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
	
    /** Get all accounting_accounttype
	 *
     */
    function get_all_accounting_accounttype(){
        $this->db->order_by('id', 'desc');
        $result = $this->db->get('accounting_accounttype')->result_array();
		$db_error = $this->db->error();
		if (!empty($db_error['code'])){
			echo 'Database error! Error Code [' . $db_error['code'] . '] Error: ' . $db_error['message'];
			exit;
		}
		return $result;
    }
	
	/** Get limit accounting_accounttype
	 *@param $limit - limit of query , $start - start of db table index to get query
	 *
     */
    function get_limit_accounting_accounttype($limit, $start){
		$this->db->order_by('id', 'desc');
        $this->db->limit($limit, $start);
        $result = $this->db->get('accounting_accounttype')->result_array();
		$db_error = $this->db->error();
		if (!empty($db_error['code'])){
			echo 'Database error! Error Code [' . $db_error['code'] . '] Error: ' . $db_error['message'];
			exit;
		}
		return $result;
    }
	
    /** Count accounting_accounttype rows
	 *
     */
	function get_count_accounting_accounttype(){
       $result = $this->db->from("accounting_accounttype")->count_all_results();
	   $db_error = $this->db->error();
		if (!empty($db_error['code'])){
			echo 'Database error! Error Code [' . $db_error['code'] . '] Error: ' . $db_error['message'];
			exit;
		}
		return $result;
    }
	
	
	 /** Get all users-accounting_accounttype
	 *
     */
    function get_all_users_accounting_accounttype(){
        $this->db->order_by('id', 'desc');
		$this->db->where('users_id', $this->session->userdata('id'));
        $result = $this->db->get('accounting_accounttype')->result_array();
		$db_error = $this->db->error();
		if (!empty($db_error['code'])){
			echo 'Database error! Error Code [' . $db_error['code'] . '] Error: ' . $db_error['message'];
			exit;
		}
		return $result;
    }
	
	/** Get limit users-accounting_accounttype
	 *@param $limit - limit of query , $start - start of db table index to get query
	 *
     */
    function get_limit_users_accounting_accounttype($limit, $start){
		$this->db->order_by('id', 'desc');
        $this->db->limit($limit, $start);
		$this->db->where('users_id', $this->session->userdata('id'));
        $result = $this->db->get('accounting_accounttype')->result_array();
		$db_error = $this->db->error();
		if (!empty($db_error['code'])){
			echo 'Database error! Error Code [' . $db_error['code'] . '] Error: ' . $db_error['message'];
			exit;
		}
		return $result;
    }
	
    /** Count users-accounting_accounttype rows
	 *
     */
	function get_count_users_accounting_accounttype(){
	   $this->db->where('users_id', $this->session->userdata('id'));
       $result = $this->db->from("accounting_accounttype")->count_all_results();
	   $db_error = $this->db->error();
		if (!empty($db_error['code'])){
			echo 'Database error! Error Code [' . $db_error['code'] . '] Error: ' . $db_error['message'];
			exit;
		}
		return $result;
    }
	
    /** function to add new accounting_accounttype
	 *@param $params - data set to add record
	 *
     */
    function add_accounting_accounttype($params){
        $this->db->insert('accounting_accounttype',$params);
        $id = $this->db->insert_id();
		$db_error = $this->db->error();
		if (!empty($db_error['code'])){
			echo 'Database error! Error Code [' . $db_error['code'] . '] Error: ' . $db_error['message'];
			exit;
		}
		return $id;
    }
	
    /** function to update accounting_accounttype
	 *@param $id - primary key to update record,$params - data set to add record
	 *
     */
    function update_accounting_accounttype($id,$params){
        $this->db->where('id',$id);
        $status = $this->db->update('accounting_accounttype',$params);
		$db_error = $this->db->error();
		if (!empty($db_error['code'])){
			echo 'Database error! Error Code [' . $db_error['code'] . '] Error: ' . $db_error['message'];
			exit;
		}
		return $status;
    }
	
    /** function to delete accounting_accounttype
	 *@param $id - primary key to delete record
	 *
     */
    function delete_accounting_accounttype($id){
        $status = $this->db->delete('accounting_accounttype',array('id'=>$id));
		$db_error = $this->db->error();
		if (!empty($db_error['code'])){
			echo 'Database error! Error Code [' . $db_error['code'] . '] Error: ' . $db_error['message'];
			exit;
		}
		return $status;
    }
}
