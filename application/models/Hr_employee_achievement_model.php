<?php

/**
 * Author: Amirul Momenin
 * Desc:Hr_employee_achievement Model
 */
class Hr_employee_achievement_model extends CI_Model
{

    protected $hr_employee_achievement = 'hr_employee_achievement';

    function __construct()
    {
        parent::__construct();
    }

    /**
     * Get hr_employee_achievement by id
     *
     * @param $id -
     *            primary key to get record
     *            
     */
    function get_hr_employee_achievement($id)
    {
        $result = $this->db->get_where('hr_employee_achievement', array(
            'id' => $id
        ))->row_array();
        if (! (array) $result) {
            $fields = $this->db->list_fields('hr_employee_achievement');
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
     * Get all hr_employee_achievement
     */
    function get_all_hr_employee_achievement()
    {
        $this->db->order_by('id', 'desc');
        $result = $this->db->get('hr_employee_achievement')->result_array();
        $db_error = $this->db->error();
        if (! empty($db_error['code'])) {
            echo 'Database error! Error Code [' . $db_error['code'] . '] Error: ' . $db_error['message'];
            exit();
        }
        return $result;
    }

    /**
     * Get limit hr_employee_achievement
     *
     * @param $limit -
     *            limit of query , $start - start of db table index to get query
     *            
     */
    function get_limit_hr_employee_achievement($limit, $start)
    {
        $this->db->order_by('id', 'desc');
        $this->db->limit($limit, $start);
        $result = $this->db->get('hr_employee_achievement')->result_array();
        $db_error = $this->db->error();
        if (! empty($db_error['code'])) {
            echo 'Database error! Error Code [' . $db_error['code'] . '] Error: ' . $db_error['message'];
            exit();
        }
        return $result;
    }

    /**
     * Count hr_employee_achievement rows
     */
    function get_count_hr_employee_achievement()
    {
        $result = $this->db->from("hr_employee_achievement")->count_all_results();
        $db_error = $this->db->error();
        if (! empty($db_error['code'])) {
            echo 'Database error! Error Code [' . $db_error['code'] . '] Error: ' . $db_error['message'];
            exit();
        }
        return $result;
    }

    /**
     * Get all users-hr_employee_achievement
     */
    function get_all_users_hr_employee_achievement()
    {
        $this->db->order_by('id', 'desc');
        $this->db->where('users_id', $this->session->userdata('id'));
        $result = $this->db->get('hr_employee_achievement')->result_array();
        $db_error = $this->db->error();
        if (! empty($db_error['code'])) {
            echo 'Database error! Error Code [' . $db_error['code'] . '] Error: ' . $db_error['message'];
            exit();
        }
        return $result;
    }

    /**
     * Get limit users-hr_employee_achievement
     *
     * @param $limit -
     *            limit of query , $start - start of db table index to get query
     *            
     */
    function get_limit_users_hr_employee_achievement($limit, $start)
    {
        $this->db->order_by('id', 'desc');
        $this->db->limit($limit, $start);
        $this->db->where('users_id', $this->session->userdata('id'));
        $result = $this->db->get('hr_employee_achievement')->result_array();
        $db_error = $this->db->error();
        if (! empty($db_error['code'])) {
            echo 'Database error! Error Code [' . $db_error['code'] . '] Error: ' . $db_error['message'];
            exit();
        }
        return $result;
    }

    /**
     * Count users-hr_employee_achievement rows
     */
    function get_count_users_hr_employee_achievement()
    {
        $this->db->where('users_id', $this->session->userdata('id'));
        $result = $this->db->from("hr_employee_achievement")->count_all_results();
        $db_error = $this->db->error();
        if (! empty($db_error['code'])) {
            echo 'Database error! Error Code [' . $db_error['code'] . '] Error: ' . $db_error['message'];
            exit();
        }
        return $result;
    }

    /**
     * function to add new hr_employee_achievement
     *
     * @param $params -
     *            data set to add record
     *            
     */
    function add_hr_employee_achievement($params)
    {
        $this->db->insert('hr_employee_achievement', $params);
        $id = $this->db->insert_id();
        $db_error = $this->db->error();
        if (! empty($db_error['code'])) {
            echo 'Database error! Error Code [' . $db_error['code'] . '] Error: ' . $db_error['message'];
            exit();
        }
        return $id;
    }

    /**
     * function to update hr_employee_achievement
     *
     * @param $id -
     *            primary key to update record,$params - data set to add record
     *            
     */
    function update_hr_employee_achievement($id, $params)
    {
        $this->db->where('id', $id);
        $status = $this->db->update('hr_employee_achievement', $params);
        $db_error = $this->db->error();
        if (! empty($db_error['code'])) {
            echo 'Database error! Error Code [' . $db_error['code'] . '] Error: ' . $db_error['message'];
            exit();
        }
        return $status;
    }

    /**
     * function to delete hr_employee_achievement
     *
     * @param $id -
     *            primary key to delete record
     *            
     */
    function delete_hr_employee_achievement($id)
    {
        $status = $this->db->delete('hr_employee_achievement', array(
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
