<?php

/**
 * Author: Amirul Momenin
 * Desc:Utility_tax Model
 */
class Utility_tax_model extends CI_Model
{

    protected $utility_tax = 'utility_tax';

    function __construct()
    {
        parent::__construct();
    }

    /**
     * Get utility_tax by id
     *
     * @param $id -
     *            primary key to get record
     *            
     */
    function get_utility_tax($id)
    {
        $result = $this->db->get_where('utility_tax', array(
            'id' => $id
        ))->row_array();
        if (! (array) $result) {
            $fields = $this->db->list_fields('utility_tax');
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
     * Get all utility_tax
     */
    function get_all_utility_tax()
    {
        $this->db->order_by('id', 'desc');
        $result = $this->db->get('utility_tax')->result_array();
        $db_error = $this->db->error();
        if (! empty($db_error['code'])) {
            echo 'Database error! Error Code [' . $db_error['code'] . '] Error: ' . $db_error['message'];
            exit();
        }
        return $result;
    }

    /**
     * Get limit utility_tax
     *
     * @param $limit -
     *            limit of query , $start - start of db table index to get query
     *            
     */
    function get_limit_utility_tax($limit, $start)
    {
        $this->db->order_by('id', 'desc');
        $this->db->limit($limit, $start);
        $result = $this->db->get('utility_tax')->result_array();
        $db_error = $this->db->error();
        if (! empty($db_error['code'])) {
            echo 'Database error! Error Code [' . $db_error['code'] . '] Error: ' . $db_error['message'];
            exit();
        }
        return $result;
    }

    /**
     * Count utility_tax rows
     */
    function get_count_utility_tax()
    {
        $result = $this->db->from("utility_tax")->count_all_results();
        $db_error = $this->db->error();
        if (! empty($db_error['code'])) {
            echo 'Database error! Error Code [' . $db_error['code'] . '] Error: ' . $db_error['message'];
            exit();
        }
        return $result;
    }

    /**
     * Get all users-utility_tax
     */
    function get_all_users_utility_tax()
    {
        $this->db->order_by('id', 'desc');
        $this->db->where('users_id', $this->session->userdata('id'));
        $result = $this->db->get('utility_tax')->result_array();
        $db_error = $this->db->error();
        if (! empty($db_error['code'])) {
            echo 'Database error! Error Code [' . $db_error['code'] . '] Error: ' . $db_error['message'];
            exit();
        }
        return $result;
    }

    /**
     * Get limit users-utility_tax
     *
     * @param $limit -
     *            limit of query , $start - start of db table index to get query
     *            
     */
    function get_limit_users_utility_tax($limit, $start)
    {
        $this->db->order_by('id', 'desc');
        $this->db->limit($limit, $start);
        $this->db->where('users_id', $this->session->userdata('id'));
        $result = $this->db->get('utility_tax')->result_array();
        $db_error = $this->db->error();
        if (! empty($db_error['code'])) {
            echo 'Database error! Error Code [' . $db_error['code'] . '] Error: ' . $db_error['message'];
            exit();
        }
        return $result;
    }

    /**
     * Count users-utility_tax rows
     */
    function get_count_users_utility_tax()
    {
        $this->db->where('users_id', $this->session->userdata('id'));
        $result = $this->db->from("utility_tax")->count_all_results();
        $db_error = $this->db->error();
        if (! empty($db_error['code'])) {
            echo 'Database error! Error Code [' . $db_error['code'] . '] Error: ' . $db_error['message'];
            exit();
        }
        return $result;
    }

    /**
     * function to add new utility_tax
     *
     * @param $params -
     *            data set to add record
     *            
     */
    function add_utility_tax($params)
    {
        $this->db->insert('utility_tax', $params);
        $id = $this->db->insert_id();
        $db_error = $this->db->error();
        if (! empty($db_error['code'])) {
            echo 'Database error! Error Code [' . $db_error['code'] . '] Error: ' . $db_error['message'];
            exit();
        }
        return $id;
    }

    /**
     * function to update utility_tax
     *
     * @param $id -
     *            primary key to update record,$params - data set to add record
     *            
     */
    function update_utility_tax($id, $params)
    {
        $this->db->where('id', $id);
        $status = $this->db->update('utility_tax', $params);
        $db_error = $this->db->error();
        if (! empty($db_error['code'])) {
            echo 'Database error! Error Code [' . $db_error['code'] . '] Error: ' . $db_error['message'];
            exit();
        }
        return $status;
    }

    /**
     * function to delete utility_tax
     *
     * @param $id -
     *            primary key to delete record
     *            
     */
    function delete_utility_tax($id)
    {
        $status = $this->db->delete('utility_tax', array(
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
