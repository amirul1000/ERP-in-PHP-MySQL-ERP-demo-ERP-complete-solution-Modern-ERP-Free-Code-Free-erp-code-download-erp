<?php

/**
 * Author: Amirul Momenin
 * Desc:Attendance_leaveapplicationdetails Model
 */
class Attendance_leaveapplicationdetails_model extends CI_Model
{

    protected $attendance_leaveapplicationdetails = 'attendance_leaveapplicationdetails';

    function __construct()
    {
        parent::__construct();
    }

    /**
     * Get attendance_leaveapplicationdetails by id
     *
     * @param $id -
     *            primary key to get record
     *            
     */
    function get_attendance_leaveapplicationdetails($id)
    {
        $result = $this->db->get_where('attendance_leaveapplicationdetails', array(
            'id' => $id
        ))->row_array();
        if (! (array) $result) {
            $fields = $this->db->list_fields('attendance_leaveapplicationdetails');
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
     * Get all attendance_leaveapplicationdetails
     */
    function get_all_attendance_leaveapplicationdetails()
    {
        $this->db->order_by('id', 'desc');
        $result = $this->db->get('attendance_leaveapplicationdetails')->result_array();
        $db_error = $this->db->error();
        if (! empty($db_error['code'])) {
            echo 'Database error! Error Code [' . $db_error['code'] . '] Error: ' . $db_error['message'];
            exit();
        }
        return $result;
    }

    /**
     * Get limit attendance_leaveapplicationdetails
     *
     * @param $limit -
     *            limit of query , $start - start of db table index to get query
     *            
     */
    function get_limit_attendance_leaveapplicationdetails($limit, $start)
    {
        $this->db->order_by('id', 'desc');
        $this->db->limit($limit, $start);
        $result = $this->db->get('attendance_leaveapplicationdetails')->result_array();
        $db_error = $this->db->error();
        if (! empty($db_error['code'])) {
            echo 'Database error! Error Code [' . $db_error['code'] . '] Error: ' . $db_error['message'];
            exit();
        }
        return $result;
    }

    /**
     * Count attendance_leaveapplicationdetails rows
     */
    function get_count_attendance_leaveapplicationdetails()
    {
        $result = $this->db->from("attendance_leaveapplicationdetails")->count_all_results();
        $db_error = $this->db->error();
        if (! empty($db_error['code'])) {
            echo 'Database error! Error Code [' . $db_error['code'] . '] Error: ' . $db_error['message'];
            exit();
        }
        return $result;
    }

    /**
     * Get all users-attendance_leaveapplicationdetails
     */
    function get_all_users_attendance_leaveapplicationdetails()
    {
        $this->db->order_by('id', 'desc');
        $this->db->where('users_id', $this->session->userdata('id'));
        $result = $this->db->get('attendance_leaveapplicationdetails')->result_array();
        $db_error = $this->db->error();
        if (! empty($db_error['code'])) {
            echo 'Database error! Error Code [' . $db_error['code'] . '] Error: ' . $db_error['message'];
            exit();
        }
        return $result;
    }

    /**
     * Get limit users-attendance_leaveapplicationdetails
     *
     * @param $limit -
     *            limit of query , $start - start of db table index to get query
     *            
     */
    function get_limit_users_attendance_leaveapplicationdetails($limit, $start)
    {
        $this->db->order_by('id', 'desc');
        $this->db->limit($limit, $start);
        $this->db->where('users_id', $this->session->userdata('id'));
        $result = $this->db->get('attendance_leaveapplicationdetails')->result_array();
        $db_error = $this->db->error();
        if (! empty($db_error['code'])) {
            echo 'Database error! Error Code [' . $db_error['code'] . '] Error: ' . $db_error['message'];
            exit();
        }
        return $result;
    }

    /**
     * Count users-attendance_leaveapplicationdetails rows
     */
    function get_count_users_attendance_leaveapplicationdetails()
    {
        $this->db->where('users_id', $this->session->userdata('id'));
        $result = $this->db->from("attendance_leaveapplicationdetails")->count_all_results();
        $db_error = $this->db->error();
        if (! empty($db_error['code'])) {
            echo 'Database error! Error Code [' . $db_error['code'] . '] Error: ' . $db_error['message'];
            exit();
        }
        return $result;
    }

    /**
     * function to add new attendance_leaveapplicationdetails
     *
     * @param $params -
     *            data set to add record
     *            
     */
    function add_attendance_leaveapplicationdetails($params)
    {
        $this->db->insert('attendance_leaveapplicationdetails', $params);
        $id = $this->db->insert_id();
        $db_error = $this->db->error();
        if (! empty($db_error['code'])) {
            echo 'Database error! Error Code [' . $db_error['code'] . '] Error: ' . $db_error['message'];
            exit();
        }
        return $id;
    }

    /**
     * function to update attendance_leaveapplicationdetails
     *
     * @param $id -
     *            primary key to update record,$params - data set to add record
     *            
     */
    function update_attendance_leaveapplicationdetails($id, $params)
    {
        $this->db->where('id', $id);
        $status = $this->db->update('attendance_leaveapplicationdetails', $params);
        $db_error = $this->db->error();
        if (! empty($db_error['code'])) {
            echo 'Database error! Error Code [' . $db_error['code'] . '] Error: ' . $db_error['message'];
            exit();
        }
        return $status;
    }

    /**
     * function to delete attendance_leaveapplicationdetails
     *
     * @param $id -
     *            primary key to delete record
     *            
     */
    function delete_attendance_leaveapplicationdetails($id)
    {
        $status = $this->db->delete('attendance_leaveapplicationdetails', array(
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
