<?php

/**
 * Author: Amirul Momenin
 * Desc:Crm_billingaddress Model
 */
class Crm_billingaddress_model extends CI_Model
{

    protected $crm_billingaddress = 'crm_billingaddress';

    function __construct()
    {
        parent::__construct();
    }

    /**
     * Get crm_billingaddress by id
     *
     * @param $id -
     *            primary key to get record
     *            
     */
    function get_crm_billingaddress($id)
    {
        $result = $this->db->get_where('crm_billingaddress', array(
            'id' => $id
        ))->row_array();
        if (! (array) $result) {
            $fields = $this->db->list_fields('crm_billingaddress');
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
     * Get all crm_billingaddress
     */
    function get_all_crm_billingaddress()
    {
        $this->db->order_by('id', 'desc');
        $result = $this->db->get('crm_billingaddress')->result_array();
        $db_error = $this->db->error();
        if (! empty($db_error['code'])) {
            echo 'Database error! Error Code [' . $db_error['code'] . '] Error: ' . $db_error['message'];
            exit();
        }
        return $result;
    }

    /**
     * Get limit crm_billingaddress
     *
     * @param $limit -
     *            limit of query , $start - start of db table index to get query
     *            
     */
    function get_limit_crm_billingaddress($limit, $start)
    {
        $this->db->order_by('id', 'desc');
        $this->db->limit($limit, $start);
        $result = $this->db->get('crm_billingaddress')->result_array();
        $db_error = $this->db->error();
        if (! empty($db_error['code'])) {
            echo 'Database error! Error Code [' . $db_error['code'] . '] Error: ' . $db_error['message'];
            exit();
        }
        return $result;
    }

    /**
     * Count crm_billingaddress rows
     */
    function get_count_crm_billingaddress()
    {
        $result = $this->db->from("crm_billingaddress")->count_all_results();
        $db_error = $this->db->error();
        if (! empty($db_error['code'])) {
            echo 'Database error! Error Code [' . $db_error['code'] . '] Error: ' . $db_error['message'];
            exit();
        }
        return $result;
    }

    /**
     * Get all users-crm_billingaddress
     */
    function get_all_users_crm_billingaddress()
    {
        $this->db->order_by('id', 'desc');
        $this->db->where('users_id', $this->session->userdata('id'));
        $result = $this->db->get('crm_billingaddress')->result_array();
        $db_error = $this->db->error();
        if (! empty($db_error['code'])) {
            echo 'Database error! Error Code [' . $db_error['code'] . '] Error: ' . $db_error['message'];
            exit();
        }
        return $result;
    }

    /**
     * Get limit users-crm_billingaddress
     *
     * @param $limit -
     *            limit of query , $start - start of db table index to get query
     *            
     */
    function get_limit_users_crm_billingaddress($limit, $start)
    {
        $this->db->order_by('id', 'desc');
        $this->db->limit($limit, $start);
        $this->db->where('users_id', $this->session->userdata('id'));
        $result = $this->db->get('crm_billingaddress')->result_array();
        $db_error = $this->db->error();
        if (! empty($db_error['code'])) {
            echo 'Database error! Error Code [' . $db_error['code'] . '] Error: ' . $db_error['message'];
            exit();
        }
        return $result;
    }

    /**
     * Count users-crm_billingaddress rows
     */
    function get_count_users_crm_billingaddress()
    {
        $this->db->where('users_id', $this->session->userdata('id'));
        $result = $this->db->from("crm_billingaddress")->count_all_results();
        $db_error = $this->db->error();
        if (! empty($db_error['code'])) {
            echo 'Database error! Error Code [' . $db_error['code'] . '] Error: ' . $db_error['message'];
            exit();
        }
        return $result;
    }

    /**
     * function to add new crm_billingaddress
     *
     * @param $params -
     *            data set to add record
     *            
     */
    function add_crm_billingaddress($params)
    {
        $this->db->insert('crm_billingaddress', $params);
        $id = $this->db->insert_id();
        $db_error = $this->db->error();
        if (! empty($db_error['code'])) {
            echo 'Database error! Error Code [' . $db_error['code'] . '] Error: ' . $db_error['message'];
            exit();
        }
        return $id;
    }

    /**
     * function to update crm_billingaddress
     *
     * @param $id -
     *            primary key to update record,$params - data set to add record
     *            
     */
    function update_crm_billingaddress($id, $params)
    {
        $this->db->where('id', $id);
        $status = $this->db->update('crm_billingaddress', $params);
        $db_error = $this->db->error();
        if (! empty($db_error['code'])) {
            echo 'Database error! Error Code [' . $db_error['code'] . '] Error: ' . $db_error['message'];
            exit();
        }
        return $status;
    }

    /**
     * function to delete crm_billingaddress
     *
     * @param $id -
     *            primary key to delete record
     *            
     */
    function delete_crm_billingaddress($id)
    {
        $status = $this->db->delete('crm_billingaddress', array(
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
