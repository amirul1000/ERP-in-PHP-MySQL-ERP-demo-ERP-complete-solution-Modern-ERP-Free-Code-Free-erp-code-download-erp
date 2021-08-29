<?php

/**
 * Author: Amirul Momenin
 * Desc:Crm_supplier Model
 */
class Crm_supplier_model extends CI_Model
{

    protected $crm_supplier = 'crm_supplier';

    function __construct()
    {
        parent::__construct();
    }

    /**
     * Get crm_supplier by id
     *
     * @param $id -
     *            primary key to get record
     *            
     */
    function get_crm_supplier($id)
    {
        $result = $this->db->get_where('crm_supplier', array(
            'id' => $id
        ))->row_array();
        if (! (array) $result) {
            $fields = $this->db->list_fields('crm_supplier');
            foreach ($fields as $field) {
                $result[$field] = '';
            }
        }
        $db_error = $this->db->error();
        if (! empty($db_error['code'])) {
            echo 'Database error! Error Code [' . $db_error['code'] . '] Error: ' . $db_error['message'];
            exit();
        }
        return $result;
    }

    /**
     * Get all crm_supplier
     */
    function get_all_crm_supplier()
    {
        $this->db->order_by('id', 'desc');
        $result = $this->db->get('crm_supplier')->result_array();
        $db_error = $this->db->error();
        if (! empty($db_error['code'])) {
            echo 'Database error! Error Code [' . $db_error['code'] . '] Error: ' . $db_error['message'];
            exit();
        }
        return $result;
    }

    /**
     * Get limit crm_supplier
     *
     * @param $limit -
     *            limit of query , $start - start of db table index to get query
     *            
     */
    function get_limit_crm_supplier($limit, $start)
    {
        $this->db->order_by('id', 'desc');
        $this->db->limit($limit, $start);
        $result = $this->db->get('crm_supplier')->result_array();
        $db_error = $this->db->error();
        if (! empty($db_error['code'])) {
            echo 'Database error! Error Code [' . $db_error['code'] . '] Error: ' . $db_error['message'];
            exit();
        }
        return $result;
    }

    /**
     * Count crm_supplier rows
     */
    function get_count_crm_supplier()
    {
        $result = $this->db->from("crm_supplier")->count_all_results();
        $db_error = $this->db->error();
        if (! empty($db_error['code'])) {
            echo 'Database error! Error Code [' . $db_error['code'] . '] Error: ' . $db_error['message'];
            exit();
        }
        return $result;
    }

    /**
     * Get all users-crm_supplier
     */
    function get_all_users_crm_supplier()
    {
        $this->db->order_by('id', 'desc');
        $this->db->where('users_id', $this->session->userdata('id'));
        $result = $this->db->get('crm_supplier')->result_array();
        $db_error = $this->db->error();
        if (! empty($db_error['code'])) {
            echo 'Database error! Error Code [' . $db_error['code'] . '] Error: ' . $db_error['message'];
            exit();
        }
        return $result;
    }

    /**
     * Get limit users-crm_supplier
     *
     * @param $limit -
     *            limit of query , $start - start of db table index to get query
     *            
     */
    function get_limit_users_crm_supplier($limit, $start)
    {
        $this->db->order_by('id', 'desc');
        $this->db->limit($limit, $start);
        $this->db->where('users_id', $this->session->userdata('id'));
        $result = $this->db->get('crm_supplier')->result_array();
        $db_error = $this->db->error();
        if (! empty($db_error['code'])) {
            echo 'Database error! Error Code [' . $db_error['code'] . '] Error: ' . $db_error['message'];
            exit();
        }
        return $result;
    }

    /**
     * Count users-crm_supplier rows
     */
    function get_count_users_crm_supplier()
    {
        $this->db->where('users_id', $this->session->userdata('id'));
        $result = $this->db->from("crm_supplier")->count_all_results();
        $db_error = $this->db->error();
        if (! empty($db_error['code'])) {
            echo 'Database error! Error Code [' . $db_error['code'] . '] Error: ' . $db_error['message'];
            exit();
        }
        return $result;
    }

    /**
     * function to add new crm_supplier
     *
     * @param $params -
     *            data set to add record
     *            
     */
    function add_crm_supplier($params)
    {
        $this->db->insert('crm_supplier', $params);
        $id = $this->db->insert_id();
        $db_error = $this->db->error();
        if (! empty($db_error['code'])) {
            echo 'Database error! Error Code [' . $db_error['code'] . '] Error: ' . $db_error['message'];
            exit();
        }
        return $id;
    }

    /**
     * function to update crm_supplier
     *
     * @param $id -
     *            primary key to update record,$params - data set to add record
     *            
     */
    function update_crm_supplier($id, $params)
    {
        $this->db->where('id', $id);
        $status = $this->db->update('crm_supplier', $params);
        $db_error = $this->db->error();
        if (! empty($db_error['code'])) {
            echo 'Database error! Error Code [' . $db_error['code'] . '] Error: ' . $db_error['message'];
            exit();
        }
        return $status;
    }

    /**
     * function to delete crm_supplier
     *
     * @param $id -
     *            primary key to delete record
     *            
     */
    function delete_crm_supplier($id)
    {
        $status = $this->db->delete('crm_supplier', array(
            'id' => $id
        ));
        $db_error = $this->db->error();
        if (! empty($db_error['code'])) {
            echo 'Database error! Error Code [' . $db_error['code'] . '] Error: ' . $db_error['message'];
            exit();
        }
        return $status;
    }
}
