<?php

/**
 * Author: Amirul Momenin
 * Desc:Hr_disciplinaryaction Model
 */
class Hr_disciplinaryaction_model extends CI_Model
{

    protected $hr_disciplinaryaction = 'hr_disciplinaryaction';

    function __construct()
    {
        parent::__construct();
    }

    /**
     * Get hr_disciplinaryaction by id
     *
     * @param $id -
     *            primary key to get record
     *            
     */
    function get_hr_disciplinaryaction($id)
    {
        $result = $this->db->get_where('hr_disciplinaryaction', array(
            'id' => $id
        ))->row_array();
        if (! (array) $result) {
            $fields = $this->db->list_fields('hr_disciplinaryaction');
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
     * Get all hr_disciplinaryaction
     */
    function get_all_hr_disciplinaryaction()
    {
        $this->db->order_by('id', 'desc');
        $result = $this->db->get('hr_disciplinaryaction')->result_array();
        $db_error = $this->db->error();
        if (! empty($db_error['code'])) {
            echo 'Database error! Error Code [' . $db_error['code'] . '] Error: ' . $db_error['message'];
            exit();
        }
        return $result;
    }

    /**
     * Get limit hr_disciplinaryaction
     *
     * @param $limit -
     *            limit of query , $start - start of db table index to get query
     *            
     */
    function get_limit_hr_disciplinaryaction($limit, $start)
    {
        $this->db->order_by('id', 'desc');
        $this->db->limit($limit, $start);
        $result = $this->db->get('hr_disciplinaryaction')->result_array();
        $db_error = $this->db->error();
        if (! empty($db_error['code'])) {
            echo 'Database error! Error Code [' . $db_error['code'] . '] Error: ' . $db_error['message'];
            exit();
        }
        return $result;
    }

    /**
     * Count hr_disciplinaryaction rows
     */
    function get_count_hr_disciplinaryaction()
    {
        $result = $this->db->from("hr_disciplinaryaction")->count_all_results();
        $db_error = $this->db->error();
        if (! empty($db_error['code'])) {
            echo 'Database error! Error Code [' . $db_error['code'] . '] Error: ' . $db_error['message'];
            exit();
        }
        return $result;
    }

    /**
     * Get all users-hr_disciplinaryaction
     */
    function get_all_users_hr_disciplinaryaction()
    {
        $this->db->order_by('id', 'desc');
        $this->db->where('users_id', $this->session->userdata('id'));
        $result = $this->db->get('hr_disciplinaryaction')->result_array();
        $db_error = $this->db->error();
        if (! empty($db_error['code'])) {
            echo 'Database error! Error Code [' . $db_error['code'] . '] Error: ' . $db_error['message'];
            exit();
        }
        return $result;
    }

    /**
     * Get limit users-hr_disciplinaryaction
     *
     * @param $limit -
     *            limit of query , $start - start of db table index to get query
     *            
     */
    function get_limit_users_hr_disciplinaryaction($limit, $start)
    {
        $this->db->order_by('id', 'desc');
        $this->db->limit($limit, $start);
        $this->db->where('users_id', $this->session->userdata('id'));
        $result = $this->db->get('hr_disciplinaryaction')->result_array();
        $db_error = $this->db->error();
        if (! empty($db_error['code'])) {
            echo 'Database error! Error Code [' . $db_error['code'] . '] Error: ' . $db_error['message'];
            exit();
        }
        return $result;
    }

    /**
     * Count users-hr_disciplinaryaction rows
     */
    function get_count_users_hr_disciplinaryaction()
    {
        $this->db->where('users_id', $this->session->userdata('id'));
        $result = $this->db->from("hr_disciplinaryaction")->count_all_results();
        $db_error = $this->db->error();
        if (! empty($db_error['code'])) {
            echo 'Database error! Error Code [' . $db_error['code'] . '] Error: ' . $db_error['message'];
            exit();
        }
        return $result;
    }

    /**
     * function to add new hr_disciplinaryaction
     *
     * @param $params -
     *            data set to add record
     *            
     */
    function add_hr_disciplinaryaction($params)
    {
        $this->db->insert('hr_disciplinaryaction', $params);
        $id = $this->db->insert_id();
        $db_error = $this->db->error();
        if (! empty($db_error['code'])) {
            echo 'Database error! Error Code [' . $db_error['code'] . '] Error: ' . $db_error['message'];
            exit();
        }
        return $id;
    }

    /**
     * function to update hr_disciplinaryaction
     *
     * @param $id -
     *            primary key to update record,$params - data set to add record
     *            
     */
    function update_hr_disciplinaryaction($id, $params)
    {
        $this->db->where('id', $id);
        $status = $this->db->update('hr_disciplinaryaction', $params);
        $db_error = $this->db->error();
        if (! empty($db_error['code'])) {
            echo 'Database error! Error Code [' . $db_error['code'] . '] Error: ' . $db_error['message'];
            exit();
        }
        return $status;
    }

    /**
     * function to delete hr_disciplinaryaction
     *
     * @param $id -
     *            primary key to delete record
     *            
     */
    function delete_hr_disciplinaryaction($id)
    {
        $status = $this->db->delete('hr_disciplinaryaction', array(
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
