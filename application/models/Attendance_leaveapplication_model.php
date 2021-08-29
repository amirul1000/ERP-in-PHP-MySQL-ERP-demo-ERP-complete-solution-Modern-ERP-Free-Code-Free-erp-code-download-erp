<?php

/**
 * Author: Amirul Momenin
 * Desc:Attendance_leaveapplication Model
 */
class Attendance_leaveapplication_model extends CI_Model
{

    protected $attendance_leaveapplication = 'attendance_leaveapplication';

    function __construct()
    {
        parent::__construct();
    }

    /**
     * Get attendance_leaveapplication by id
     *
     * @param $id -
     *            primary key to get record
     *            
     */
    function get_attendance_leaveapplication($id)
    {
        $result = $this->db->get_where('attendance_leaveapplication', array(
            'id' => $id
        ))->row_array();
        if (! (array) $result) {
            $fields = $this->db->list_fields('attendance_leaveapplication');
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
     * Get all attendance_leaveapplication
     */
    function get_all_attendance_leaveapplication()
    {
        $this->db->order_by('id', 'desc');
        $result = $this->db->get('attendance_leaveapplication')->result_array();
        $db_error = $this->db->error();
        if (! empty($db_error['code'])) {
            echo 'Database error! Error Code [' . $db_error['code'] . '] Error: ' . $db_error['message'];
            exit();
        }
        return $result;
    }

    /**
     * Get limit attendance_leaveapplication
     *
     * @param $limit -
     *            limit of query , $start - start of db table index to get query
     *            
     */
    function get_limit_attendance_leaveapplication($limit, $start)
    {
        $this->db->order_by('id', 'desc');
        $this->db->limit($limit, $start);
        $result = $this->db->get('attendance_leaveapplication')->result_array();
        $db_error = $this->db->error();
        if (! empty($db_error['code'])) {
            echo 'Database error! Error Code [' . $db_error['code'] . '] Error: ' . $db_error['message'];
            exit();
        }
        return $result;
    }

    /**
     * Count attendance_leaveapplication rows
     */
    function get_count_attendance_leaveapplication()
    {
        $result = $this->db->from("attendance_leaveapplication")->count_all_results();
        $db_error = $this->db->error();
        if (! empty($db_error['code'])) {
            echo 'Database error! Error Code [' . $db_error['code'] . '] Error: ' . $db_error['message'];
            exit();
        }
        return $result;
    }

    /**
     * Get all users-attendance_leaveapplication
     */
    function get_all_users_attendance_leaveapplication()
    {
        $this->db->order_by('id', 'desc');
        $this->db->where('users_id', $this->session->userdata('id'));
        $result = $this->db->get('attendance_leaveapplication')->result_array();
        $db_error = $this->db->error();
        if (! empty($db_error['code'])) {
            echo 'Database error! Error Code [' . $db_error['code'] . '] Error: ' . $db_error['message'];
            exit();
        }
        return $result;
    }

    /**
     * Get limit users-attendance_leaveapplication
     *
     * @param $limit -
     *            limit of query , $start - start of db table index to get query
     *            
     */
    function get_limit_users_attendance_leaveapplication($limit, $start)
    {
        $this->db->order_by('id', 'desc');
        $this->db->limit($limit, $start);
        $this->db->where('users_id', $this->session->userdata('id'));
        $result = $this->db->get('attendance_leaveapplication')->result_array();
        $db_error = $this->db->error();
        if (! empty($db_error['code'])) {
            echo 'Database error! Error Code [' . $db_error['code'] . '] Error: ' . $db_error['message'];
            exit();
        }
        return $result;
    }

    /**
     * Count users-attendance_leaveapplication rows
     */
    function get_count_users_attendance_leaveapplication()
    {
        $this->db->where('users_id', $this->session->userdata('id'));
        $result = $this->db->from("attendance_leaveapplication")->count_all_results();
        $db_error = $this->db->error();
        if (! empty($db_error['code'])) {
            echo 'Database error! Error Code [' . $db_error['code'] . '] Error: ' . $db_error['message'];
            exit();
        }
        return $result;
    }

    /**
     * function to add new attendance_leaveapplication
     *
     * @param $params -
     *            data set to add record
     *            
     */
    function add_attendance_leaveapplication($params)
    {
        $this->db->insert('attendance_leaveapplication', $params);
        $id = $this->db->insert_id();
        $db_error = $this->db->error();
        if (! empty($db_error['code'])) {
            echo 'Database error! Error Code [' . $db_error['code'] . '] Error: ' . $db_error['message'];
            exit();
        }
        return $id;
    }

    /**
     * function to update attendance_leaveapplication
     *
     * @param $id -
     *            primary key to update record,$params - data set to add record
     *            
     */
    function update_attendance_leaveapplication($id, $params)
    {
        $this->db->where('id', $id);
        $status = $this->db->update('attendance_leaveapplication', $params);
        $db_error = $this->db->error();
        if (! empty($db_error['code'])) {
            echo 'Database error! Error Code [' . $db_error['code'] . '] Error: ' . $db_error['message'];
            exit();
        }
        return $status;
    }

    /**
     * function to delete attendance_leaveapplication
     *
     * @param $id -
     *            primary key to delete record
     *            
     */
    function delete_attendance_leaveapplication($id)
    {
        $status = $this->db->delete('attendance_leaveapplication', array(
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
