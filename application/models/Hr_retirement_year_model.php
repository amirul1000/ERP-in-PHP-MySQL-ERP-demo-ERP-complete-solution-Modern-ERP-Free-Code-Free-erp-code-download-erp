<?php

/**
 * Author: Amirul Momenin
 * Desc:Hr_retirement_year Model
 */
class Hr_retirement_year_model extends CI_Model
{

    protected $hr_retirement_year = 'hr_retirement_year';

    function __construct()
    {
        parent::__construct();
    }

    /**
     * Get hr_retirement_year by id
     *
     * @param $id -
     *            primary key to get record
     *            
     */
    function get_hr_retirement_year($id)
    {
        $result = $this->db->get_where('hr_retirement_year', array(
            'id' => $id
        ))->row_array();
        if (! (array) $result) {
            $fields = $this->db->list_fields('hr_retirement_year');
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
     * Get all hr_retirement_year
     */
    function get_all_hr_retirement_year()
    {
        $this->db->order_by('id', 'desc');
        $result = $this->db->get('hr_retirement_year')->result_array();
        $db_error = $this->db->error();
        if (! empty($db_error['code'])) {
            echo 'Database error! Error Code [' . $db_error['code'] . '] Error: ' . $db_error['message'];
            exit();
        }
        return $result;
    }

    /**
     * Get limit hr_retirement_year
     *
     * @param $limit -
     *            limit of query , $start - start of db table index to get query
     *            
     */
    function get_limit_hr_retirement_year($limit, $start)
    {
        $this->db->order_by('id', 'desc');
        $this->db->limit($limit, $start);
        $result = $this->db->get('hr_retirement_year')->result_array();
        $db_error = $this->db->error();
        if (! empty($db_error['code'])) {
            echo 'Database error! Error Code [' . $db_error['code'] . '] Error: ' . $db_error['message'];
            exit();
        }
        return $result;
    }

    /**
     * Count hr_retirement_year rows
     */
    function get_count_hr_retirement_year()
    {
        $result = $this->db->from("hr_retirement_year")->count_all_results();
        $db_error = $this->db->error();
        if (! empty($db_error['code'])) {
            echo 'Database error! Error Code [' . $db_error['code'] . '] Error: ' . $db_error['message'];
            exit();
        }
        return $result;
    }

    /**
     * Get all users-hr_retirement_year
     */
    function get_all_users_hr_retirement_year()
    {
        $this->db->order_by('id', 'desc');
        $this->db->where('users_id', $this->session->userdata('id'));
        $result = $this->db->get('hr_retirement_year')->result_array();
        $db_error = $this->db->error();
        if (! empty($db_error['code'])) {
            echo 'Database error! Error Code [' . $db_error['code'] . '] Error: ' . $db_error['message'];
            exit();
        }
        return $result;
    }

    /**
     * Get limit users-hr_retirement_year
     *
     * @param $limit -
     *            limit of query , $start - start of db table index to get query
     *            
     */
    function get_limit_users_hr_retirement_year($limit, $start)
    {
        $this->db->order_by('id', 'desc');
        $this->db->limit($limit, $start);
        $this->db->where('users_id', $this->session->userdata('id'));
        $result = $this->db->get('hr_retirement_year')->result_array();
        $db_error = $this->db->error();
        if (! empty($db_error['code'])) {
            echo 'Database error! Error Code [' . $db_error['code'] . '] Error: ' . $db_error['message'];
            exit();
        }
        return $result;
    }

    /**
     * Count users-hr_retirement_year rows
     */
    function get_count_users_hr_retirement_year()
    {
        $this->db->where('users_id', $this->session->userdata('id'));
        $result = $this->db->from("hr_retirement_year")->count_all_results();
        $db_error = $this->db->error();
        if (! empty($db_error['code'])) {
            echo 'Database error! Error Code [' . $db_error['code'] . '] Error: ' . $db_error['message'];
            exit();
        }
        return $result;
    }

    /**
     * function to add new hr_retirement_year
     *
     * @param $params -
     *            data set to add record
     *            
     */
    function add_hr_retirement_year($params)
    {
        $this->db->insert('hr_retirement_year', $params);
        $id = $this->db->insert_id();
        $db_error = $this->db->error();
        if (! empty($db_error['code'])) {
            echo 'Database error! Error Code [' . $db_error['code'] . '] Error: ' . $db_error['message'];
            exit();
        }
        return $id;
    }

    /**
     * function to update hr_retirement_year
     *
     * @param $id -
     *            primary key to update record,$params - data set to add record
     *            
     */
    function update_hr_retirement_year($id, $params)
    {
        $this->db->where('id', $id);
        $status = $this->db->update('hr_retirement_year', $params);
        $db_error = $this->db->error();
        if (! empty($db_error['code'])) {
            echo 'Database error! Error Code [' . $db_error['code'] . '] Error: ' . $db_error['message'];
            exit();
        }
        return $status;
    }

    /**
     * function to delete hr_retirement_year
     *
     * @param $id -
     *            primary key to delete record
     *            
     */
    function delete_hr_retirement_year($id)
    {
        $status = $this->db->delete('hr_retirement_year', array(
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
