<?php

/**
 * Author: Amirul Momenin
 * Desc:Crm_shippingaddress Model
 */
class Crm_shippingaddress_model extends CI_Model
{

    protected $crm_shippingaddress = 'crm_shippingaddress';

    function __construct()
    {
        parent::__construct();
    }

    /**
     * Get crm_shippingaddress by id
     *
     * @param $id -
     *            primary key to get record
     *            
     */
    function get_crm_shippingaddress($id)
    {
        $result = $this->db->get_where('crm_shippingaddress', array(
            'id' => $id
        ))->row_array();
        if (! (array) $result) {
            $fields = $this->db->list_fields('crm_shippingaddress');
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
     * Get all crm_shippingaddress
     */
    function get_all_crm_shippingaddress()
    {
        $this->db->order_by('id', 'desc');
        $result = $this->db->get('crm_shippingaddress')->result_array();
        $db_error = $this->db->error();
        if (! empty($db_error['code'])) {
            echo 'Database error! Error Code [' . $db_error['code'] . '] Error: ' . $db_error['message'];
            exit();
        }
        return $result;
    }

    /**
     * Get limit crm_shippingaddress
     *
     * @param $limit -
     *            limit of query , $start - start of db table index to get query
     *            
     */
    function get_limit_crm_shippingaddress($limit, $start)
    {
        $this->db->order_by('id', 'desc');
        $this->db->limit($limit, $start);
        $result = $this->db->get('crm_shippingaddress')->result_array();
        $db_error = $this->db->error();
        if (! empty($db_error['code'])) {
            echo 'Database error! Error Code [' . $db_error['code'] . '] Error: ' . $db_error['message'];
            exit();
        }
        return $result;
    }

    /**
     * Count crm_shippingaddress rows
     */
    function get_count_crm_shippingaddress()
    {
        $result = $this->db->from("crm_shippingaddress")->count_all_results();
        $db_error = $this->db->error();
        if (! empty($db_error['code'])) {
            echo 'Database error! Error Code [' . $db_error['code'] . '] Error: ' . $db_error['message'];
            exit();
        }
        return $result;
    }

    /**
     * Get all users-crm_shippingaddress
     */
    function get_all_users_crm_shippingaddress()
    {
        $this->db->order_by('id', 'desc');
        $this->db->where('users_id', $this->session->userdata('id'));
        $result = $this->db->get('crm_shippingaddress')->result_array();
        $db_error = $this->db->error();
        if (! empty($db_error['code'])) {
            echo 'Database error! Error Code [' . $db_error['code'] . '] Error: ' . $db_error['message'];
            exit();
        }
        return $result;
    }

    /**
     * Get limit users-crm_shippingaddress
     *
     * @param $limit -
     *            limit of query , $start - start of db table index to get query
     *            
     */
    function get_limit_users_crm_shippingaddress($limit, $start)
    {
        $this->db->order_by('id', 'desc');
        $this->db->limit($limit, $start);
        $this->db->where('users_id', $this->session->userdata('id'));
        $result = $this->db->get('crm_shippingaddress')->result_array();
        $db_error = $this->db->error();
        if (! empty($db_error['code'])) {
            echo 'Database error! Error Code [' . $db_error['code'] . '] Error: ' . $db_error['message'];
            exit();
        }
        return $result;
    }

    /**
     * Count users-crm_shippingaddress rows
     */
    function get_count_users_crm_shippingaddress()
    {
        $this->db->where('users_id', $this->session->userdata('id'));
        $result = $this->db->from("crm_shippingaddress")->count_all_results();
        $db_error = $this->db->error();
        if (! empty($db_error['code'])) {
            echo 'Database error! Error Code [' . $db_error['code'] . '] Error: ' . $db_error['message'];
            exit();
        }
        return $result;
    }

    /**
     * function to add new crm_shippingaddress
     *
     * @param $params -
     *            data set to add record
     *            
     */
    function add_crm_shippingaddress($params)
    {
        $this->db->insert('crm_shippingaddress', $params);
        $id = $this->db->insert_id();
        $db_error = $this->db->error();
        if (! empty($db_error['code'])) {
            echo 'Database error! Error Code [' . $db_error['code'] . '] Error: ' . $db_error['message'];
            exit();
        }
        return $id;
    }

    /**
     * function to update crm_shippingaddress
     *
     * @param $id -
     *            primary key to update record,$params - data set to add record
     *            
     */
    function update_crm_shippingaddress($id, $params)
    {
        $this->db->where('id', $id);
        $status = $this->db->update('crm_shippingaddress', $params);
        $db_error = $this->db->error();
        if (! empty($db_error['code'])) {
            echo 'Database error! Error Code [' . $db_error['code'] . '] Error: ' . $db_error['message'];
            exit();
        }
        return $status;
    }

    /**
     * function to delete crm_shippingaddress
     *
     * @param $id -
     *            primary key to delete record
     *            
     */
    function delete_crm_shippingaddress($id)
    {
        $status = $this->db->delete('crm_shippingaddress', array(
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
