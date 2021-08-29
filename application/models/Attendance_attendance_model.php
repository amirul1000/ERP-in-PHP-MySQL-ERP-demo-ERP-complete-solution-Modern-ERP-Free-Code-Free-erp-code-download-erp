<?php

/**
 * Author: Amirul Momenin
 * Desc:Attendance_attendance Model
 */
class Attendance_attendance_model extends CI_Model
{

    protected $attendance_attendance = 'attendance_attendance';

    function __construct()
    {
        parent::__construct();
    }

    /**
     * Get attendance_attendance by id
     *
     * @param $id -
     *            primary key to get record
     *            
     */
    function get_attendance_attendance($id)
    {
        $result = $this->db->get_where('attendance_attendance', array(
            'id' => $id
        ))->row_array();
        if (! (array) $result) {
            $fields = $this->db->list_fields('attendance_attendance');
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
     * Get all attendance_attendance
     */
    function get_all_attendance_attendance()
    {
        $this->db->order_by('id', 'desc');
        $result = $this->db->get('attendance_attendance')->result_array();
        $db_error = $this->db->error();
        if (! empty($db_error['code'])) {
            echo 'Database error! Error Code [' . $db_error['code'] . '] Error: ' . $db_error['message'];
            exit();
        }
        return $result;
    }

    /**
     * Get limit attendance_attendance
     *
     * @param $limit -
     *            limit of query , $start - start of db table index to get query
     *            
     */
    function get_limit_attendance_attendance($limit, $start)
    {
        $this->db->order_by('id', 'desc');
        $this->db->limit($limit, $start);
        $result = $this->db->get('attendance_attendance')->result_array();
        $db_error = $this->db->error();
        if (! empty($db_error['code'])) {
            echo 'Database error! Error Code [' . $db_error['code'] . '] Error: ' . $db_error['message'];
            exit();
        }
        return $result;
    }

    /**
     * Count attendance_attendance rows
     */
    function get_count_attendance_attendance()
    {
        $result = $this->db->from("attendance_attendance")->count_all_results();
        $db_error = $this->db->error();
        if (! empty($db_error['code'])) {
            echo 'Database error! Error Code [' . $db_error['code'] . '] Error: ' . $db_error['message'];
            exit();
        }
        return $result;
    }

    /**
     * Get all users-attendance_attendance
     */
    function get_all_users_attendance_attendance()
    {
        $this->db->order_by('id', 'desc');
        $this->db->where('users_id', $this->session->userdata('id'));
        $result = $this->db->get('attendance_attendance')->result_array();
        $db_error = $this->db->error();
        if (! empty($db_error['code'])) {
            echo 'Database error! Error Code [' . $db_error['code'] . '] Error: ' . $db_error['message'];
            exit();
        }
        return $result;
    }

    /**
     * Get limit users-attendance_attendance
     *
     * @param $limit -
     *            limit of query , $start - start of db table index to get query
     *            
     */
    function get_limit_users_attendance_attendance($limit, $start)
    {
        $this->db->order_by('id', 'desc');
        $this->db->limit($limit, $start);
        $this->db->where('users_id', $this->session->userdata('id'));
        $result = $this->db->get('attendance_attendance')->result_array();
        $db_error = $this->db->error();
        if (! empty($db_error['code'])) {
            echo 'Database error! Error Code [' . $db_error['code'] . '] Error: ' . $db_error['message'];
            exit();
        }
        return $result;
    }

    /**
     * Count users-attendance_attendance rows
     */
    function get_count_users_attendance_attendance()
    {
        $this->db->where('users_id', $this->session->userdata('id'));
        $result = $this->db->from("attendance_attendance")->count_all_results();
        $db_error = $this->db->error();
        if (! empty($db_error['code'])) {
            echo 'Database error! Error Code [' . $db_error['code'] . '] Error: ' . $db_error['message'];
            exit();
        }
        return $result;
    }

    /**
     * function to add new attendance_attendance
     *
     * @param $params -
     *            data set to add record
     *            
     */
    function add_attendance_attendance($params)
    {
        $this->db->insert('attendance_attendance', $params);
        $id = $this->db->insert_id();
        $db_error = $this->db->error();
        if (! empty($db_error['code'])) {
            echo 'Database error! Error Code [' . $db_error['code'] . '] Error: ' . $db_error['message'];
            exit();
        }
        return $id;
    }

    /**
     * function to update attendance_attendance
     *
     * @param $id -
     *            primary key to update record,$params - data set to add record
     *            
     */
    function update_attendance_attendance($id, $params)
    {
        $this->db->where('id', $id);
        $status = $this->db->update('attendance_attendance', $params);
        $db_error = $this->db->error();
        if (! empty($db_error['code'])) {
            echo 'Database error! Error Code [' . $db_error['code'] . '] Error: ' . $db_error['message'];
            exit();
        }
        return $status;
    }

    /**
     * function to delete attendance_attendance
     *
     * @param $id -
     *            primary key to delete record
     *            
     */
    function delete_attendance_attendance($id)
    {
        $status = $this->db->delete('attendance_attendance', array(
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
