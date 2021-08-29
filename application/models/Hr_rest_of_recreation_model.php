<?php

/**
 * Author: Amirul Momenin
 * Desc:Hr_rest_of_recreation Model
 */
class Hr_rest_of_recreation_model extends CI_Model
{

    protected $hr_rest_of_recreation = 'hr_rest_of_recreation';

    function __construct()
    {
        parent::__construct();
    }

    /**
     * Get hr_rest_of_recreation by id
     *
     * @param $id -
     *            primary key to get record
     *            
     */
    function get_hr_rest_of_recreation($id)
    {
        $result = $this->db->get_where('hr_rest_of_recreation', array(
            'id' => $id
        ))->row_array();
        if (! (array) $result) {
            $fields = $this->db->list_fields('hr_rest_of_recreation');
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
     * Get all hr_rest_of_recreation
     */
    function get_all_hr_rest_of_recreation()
    {
        $this->db->order_by('id', 'desc');
        $result = $this->db->get('hr_rest_of_recreation')->result_array();
        $db_error = $this->db->error();
        if (! empty($db_error['code'])) {
            echo 'Database error! Error Code [' . $db_error['code'] . '] Error: ' . $db_error['message'];
            exit();
        }
        return $result;
    }

    /**
     * Get limit hr_rest_of_recreation
     *
     * @param $limit -
     *            limit of query , $start - start of db table index to get query
     *            
     */
    function get_limit_hr_rest_of_recreation($limit, $start)
    {
        $this->db->order_by('id', 'desc');
        $this->db->limit($limit, $start);
        $result = $this->db->get('hr_rest_of_recreation')->result_array();
        $db_error = $this->db->error();
        if (! empty($db_error['code'])) {
            echo 'Database error! Error Code [' . $db_error['code'] . '] Error: ' . $db_error['message'];
            exit();
        }
        return $result;
    }

    /**
     * Count hr_rest_of_recreation rows
     */
    function get_count_hr_rest_of_recreation()
    {
        $result = $this->db->from("hr_rest_of_recreation")->count_all_results();
        $db_error = $this->db->error();
        if (! empty($db_error['code'])) {
            echo 'Database error! Error Code [' . $db_error['code'] . '] Error: ' . $db_error['message'];
            exit();
        }
        return $result;
    }

    /**
     * Get all users-hr_rest_of_recreation
     */
    function get_all_users_hr_rest_of_recreation()
    {
        $this->db->order_by('id', 'desc');
        $this->db->where('users_id', $this->session->userdata('id'));
        $result = $this->db->get('hr_rest_of_recreation')->result_array();
        $db_error = $this->db->error();
        if (! empty($db_error['code'])) {
            echo 'Database error! Error Code [' . $db_error['code'] . '] Error: ' . $db_error['message'];
            exit();
        }
        return $result;
    }

    /**
     * Get limit users-hr_rest_of_recreation
     *
     * @param $limit -
     *            limit of query , $start - start of db table index to get query
     *            
     */
    function get_limit_users_hr_rest_of_recreation($limit, $start)
    {
        $this->db->order_by('id', 'desc');
        $this->db->limit($limit, $start);
        $this->db->where('users_id', $this->session->userdata('id'));
        $result = $this->db->get('hr_rest_of_recreation')->result_array();
        $db_error = $this->db->error();
        if (! empty($db_error['code'])) {
            echo 'Database error! Error Code [' . $db_error['code'] . '] Error: ' . $db_error['message'];
            exit();
        }
        return $result;
    }

    /**
     * Count users-hr_rest_of_recreation rows
     */
    function get_count_users_hr_rest_of_recreation()
    {
        $this->db->where('users_id', $this->session->userdata('id'));
        $result = $this->db->from("hr_rest_of_recreation")->count_all_results();
        $db_error = $this->db->error();
        if (! empty($db_error['code'])) {
            echo 'Database error! Error Code [' . $db_error['code'] . '] Error: ' . $db_error['message'];
            exit();
        }
        return $result;
    }

    /**
     * function to add new hr_rest_of_recreation
     *
     * @param $params -
     *            data set to add record
     *            
     */
    function add_hr_rest_of_recreation($params)
    {
        $this->db->insert('hr_rest_of_recreation', $params);
        $id = $this->db->insert_id();
        $db_error = $this->db->error();
        if (! empty($db_error['code'])) {
            echo 'Database error! Error Code [' . $db_error['code'] . '] Error: ' . $db_error['message'];
            exit();
        }
        return $id;
    }

    /**
     * function to update hr_rest_of_recreation
     *
     * @param $id -
     *            primary key to update record,$params - data set to add record
     *            
     */
    function update_hr_rest_of_recreation($id, $params)
    {
        $this->db->where('id', $id);
        $status = $this->db->update('hr_rest_of_recreation', $params);
        $db_error = $this->db->error();
        if (! empty($db_error['code'])) {
            echo 'Database error! Error Code [' . $db_error['code'] . '] Error: ' . $db_error['message'];
            exit();
        }
        return $status;
    }

    /**
     * function to delete hr_rest_of_recreation
     *
     * @param $id -
     *            primary key to delete record
     *            
     */
    function delete_hr_rest_of_recreation($id)
    {
        $status = $this->db->delete('hr_rest_of_recreation', array(
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
