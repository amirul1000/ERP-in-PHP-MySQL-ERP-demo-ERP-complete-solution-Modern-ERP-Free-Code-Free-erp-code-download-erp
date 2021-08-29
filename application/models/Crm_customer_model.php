<?php

/**
 * Author: Amirul Momenin
 * Desc:Crm_customer Model
 */
class Crm_customer_model extends CI_Model
{

    protected $crm_customer = 'crm_customer';

    function __construct()
    {
        parent::__construct();
    }

    /**
     * Get crm_customer by id
     *
     * @param $id -
     *            primary key to get record
     *            
     */
    function get_crm_customer($id)
    {
        $result = $this->db->get_where('crm_customer', array(
            'id' => $id
        ))->row_array();
        if (! (array) $result) {
            $fields = $this->db->list_fields('crm_customer');
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
     * Get all crm_customer
     */
    function get_all_crm_customer()
    {
        $this->db->order_by('id', 'desc');
        $result = $this->db->get('crm_customer')->result_array();
        $db_error = $this->db->error();
        if (! empty($db_error['code'])) {
            echo 'Database error! Error Code [' . $db_error['code'] . '] Error: ' . $db_error['message'];
            exit();
        }
        return $result;
    }

    /**
     * Get limit crm_customer
     *
     * @param $limit -
     *            limit of query , $start - start of db table index to get query
     *            
     */
    function get_limit_crm_customer($limit, $start)
    {
        $this->db->order_by('id', 'desc');
        $this->db->limit($limit, $start);
        $result = $this->db->get('crm_customer')->result_array();
        $db_error = $this->db->error();
        if (! empty($db_error['code'])) {
            echo 'Database error! Error Code [' . $db_error['code'] . '] Error: ' . $db_error['message'];
            exit();
        }
        return $result;
    }

    /**
     * Count crm_customer rows
     */
    function get_count_crm_customer()
    {
        $result = $this->db->from("crm_customer")->count_all_results();
        $db_error = $this->db->error();
        if (! empty($db_error['code'])) {
            echo 'Database error! Error Code [' . $db_error['code'] . '] Error: ' . $db_error['message'];
            exit();
        }
        return $result;
    }

    /**
     * Get all users-crm_customer
     */
    function get_all_users_crm_customer()
    {
        $this->db->order_by('id', 'desc');
        $this->db->where('users_id', $this->session->userdata('id'));
        $result = $this->db->get('crm_customer')->result_array();
        $db_error = $this->db->error();
        if (! empty($db_error['code'])) {
            echo 'Database error! Error Code [' . $db_error['code'] . '] Error: ' . $db_error['message'];
            exit();
        }
        return $result;
    }

    /**
     * Get limit users-crm_customer
     *
     * @param $limit -
     *            limit of query , $start - start of db table index to get query
     *            
     */
    function get_limit_users_crm_customer($limit, $start)
    {
        $this->db->order_by('id', 'desc');
        $this->db->limit($limit, $start);
        $this->db->where('users_id', $this->session->userdata('id'));
        $result = $this->db->get('crm_customer')->result_array();
        $db_error = $this->db->error();
        if (! empty($db_error['code'])) {
            echo 'Database error! Error Code [' . $db_error['code'] . '] Error: ' . $db_error['message'];
            exit();
        }
        return $result;
    }

    /**
     * Count users-crm_customer rows
     */
    function get_count_users_crm_customer()
    {
        $this->db->where('users_id', $this->session->userdata('id'));
        $result = $this->db->from("crm_customer")->count_all_results();
        $db_error = $this->db->error();
        if (! empty($db_error['code'])) {
            echo 'Database error! Error Code [' . $db_error['code'] . '] Error: ' . $db_error['message'];
            exit();
        }
        return $result;
    }

    /**
     * function to add new crm_customer
     *
     * @param $params -
     *            data set to add record
     *            
     */
    function add_crm_customer($params)
    {
        $this->db->insert('crm_customer', $params);
        $id = $this->db->insert_id();
        $db_error = $this->db->error();
        if (! empty($db_error['code'])) {
            echo 'Database error! Error Code [' . $db_error['code'] . '] Error: ' . $db_error['message'];
            exit();
        }
        return $id;
    }

    /**
     * function to update crm_customer
     *
     * @param $id -
     *            primary key to update record,$params - data set to add record
     *            
     */
    function update_crm_customer($id, $params)
    {
        $this->db->where('id', $id);
        $status = $this->db->update('crm_customer', $params);
        $db_error = $this->db->error();
        if (! empty($db_error['code'])) {
            echo 'Database error! Error Code [' . $db_error['code'] . '] Error: ' . $db_error['message'];
            exit();
        }
        return $status;
    }

    /**
     * function to delete crm_customer
     *
     * @param $id -
     *            primary key to delete record
     *            
     */
    function delete_crm_customer($id)
    {
        $status = $this->db->delete('crm_customer', array(
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
