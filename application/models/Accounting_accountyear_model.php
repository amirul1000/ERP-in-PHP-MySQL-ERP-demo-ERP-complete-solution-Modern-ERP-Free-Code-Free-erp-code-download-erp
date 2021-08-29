<?php

/**
 * Author: Amirul Momenin
 * Desc:Accounting_accountyear Model
 */
class Accounting_accountyear_model extends CI_Model
{
	protected $accounting_accountyear = 'accounting_accountyear';
	
    function __construct(){
        parent::__construct();
    }
	
    /** Get accounting_accountyear by id
	 *@param $id - primary key to get record
	 *
     */
    function get_accounting_accountyear($id){
        $result = $this->db->get_where('accounting_accountyear',array('id'=>$id))->row_array();
		if(!(array)$result){
			$fields = $this->db->list_fields('accounting_accountyear');
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
	
    /** Get all accounting_accountyear
	 *
     */
    function get_all_accounting_accountyear(){
        $this->db->order_by('id', 'desc');
        $result = $this->db->get('accounting_accountyear')->result_array();
		$db_error = $this->db->error();
		if (!empty($db_error['code'])){
			echo 'Database error! Error Code [' . $db_error['code'] . '] Error: ' . $db_error['message'];
			exit;
		}
		return $result;
    }
	
	/** Get limit accounting_accountyear
	 *@param $limit - limit of query , $start - start of db table index to get query
	 *
     */
    function get_limit_accounting_accountyear($limit, $start){
		$this->db->order_by('id', 'desc');
        $this->db->limit($limit, $start);
        $result = $this->db->get('accounting_accountyear')->result_array();
		$db_error = $this->db->error();
		if (!empty($db_error['code'])){
			echo 'Database error! Error Code [' . $db_error['code'] . '] Error: ' . $db_error['message'];
			exit;
		}
		return $result;
    }
	
    /** Count accounting_accountyear rows
	 *
     */
	function get_count_accounting_accountyear(){
       $result = $this->db->from("accounting_accountyear")->count_all_results();
	   $db_error = $this->db->error();
		if (!empty($db_error['code'])){
			echo 'Database error! Error Code [' . $db_error['code'] . '] Error: ' . $db_error['message'];
			exit;
		}
		return $result;
    }
	
	
	 /** Get all users-accounting_accountyear
	 *
     */
    function get_all_users_accounting_accountyear(){
        $this->db->order_by('id', 'desc');
		$this->db->where('users_id', $this->session->userdata('id'));
        $result = $this->db->get('accounting_accountyear')->result_array();
		$db_error = $this->db->error();
		if (!empty($db_error['code'])){
			echo 'Database error! Error Code [' . $db_error['code'] . '] Error: ' . $db_error['message'];
			exit;
		}
		return $result;
    }
	
	/** Get limit users-accounting_accountyear
	 *@param $limit - limit of query , $start - start of db table index to get query
	 *
     */
    function get_limit_users_accounting_accountyear($limit, $start){
		$this->db->order_by('id', 'desc');
        $this->db->limit($limit, $start);
		$this->db->where('users_id', $this->session->userdata('id'));
        $result = $this->db->get('accounting_accountyear')->result_array();
		$db_error = $this->db->error();
		if (!empty($db_error['code'])){
			echo 'Database error! Error Code [' . $db_error['code'] . '] Error: ' . $db_error['message'];
			exit;
		}
		return $result;
    }
	
    /** Count users-accounting_accountyear rows
	 *
     */
	function get_count_users_accounting_accountyear(){
	   $this->db->where('users_id', $this->session->userdata('id'));
       $result = $this->db->from("accounting_accountyear")->count_all_results();
	   $db_error = $this->db->error();
		if (!empty($db_error['code'])){
			echo 'Database error! Error Code [' . $db_error['code'] . '] Error: ' . $db_error['message'];
			exit;
		}
		return $result;
    }
	
    /** function to add new accounting_accountyear
	 *@param $params - data set to add record
	 *
     */
    function add_accounting_accountyear($params){
        $this->db->insert('accounting_accountyear',$params);
        $id = $this->db->insert_id();
		$db_error = $this->db->error();
		if (!empty($db_error['code'])){
			echo 'Database error! Error Code [' . $db_error['code'] . '] Error: ' . $db_error['message'];
			exit;
		}
		return $id;
    }
	
    /** function to update accounting_accountyear
	 *@param $id - primary key to update record,$params - data set to add record
	 *
     */
    function update_accounting_accountyear($id,$params){
        $this->db->where('id',$id);
        $status = $this->db->update('accounting_accountyear',$params);
		$db_error = $this->db->error();
		if (!empty($db_error['code'])){
			echo 'Database error! Error Code [' . $db_error['code'] . '] Error: ' . $db_error['message'];
			exit;
		}
		return $status;
    }
	
    /** function to delete accounting_accountyear
	 *@param $id - primary key to delete record
	 *
     */
    function delete_accounting_accountyear($id){
        $status = $this->db->delete('accounting_accountyear',array('id'=>$id));
		$db_error = $this->db->error();
		if (!empty($db_error['code'])){
			echo 'Database error! Error Code [' . $db_error['code'] . '] Error: ' . $db_error['message'];
			exit;
		}
		return $status;
    }
}
