<?php

/**
 * Author: Amirul Momenin
 * Desc:Attendance_leave Model
 */
class Attendance_leave_model extends CI_Model
{

    protected $attendance_leave = 'attendance_leave';

    function __construct()
    {
        parent::__construct();
    }

    /**
     * Get attendance_leave by id
     *
     * @param $id -
     *            primary key to get record
     *            
     */
    function get_attendance_leave($id)
    {
        $result = $this->db->get_where('attendance_leave', array(
            'id' => $id
        ))->row_array();
        if (! (array) $result) {
            $fields = $this->db->list_fields('attendance_leave');
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
     * Get all attendance_leave
     */
    function get_all_attendance_leave()
    {
        $this->db->order_by('id', 'desc');
        $result = $this->db->get('attendance_leave')->result_array();
        $db_error = $this->db->error();
        if (! empty($db_error['code'])) {
            echo 'Database error! Error Code [' . $db_error['code'] . '] Error: ' . $db_error['message'];
            exit();
        }
        return $result;
    }

    /**
     * Get limit attendance_leave
     *
     * @param $limit -
     *            limit of query , $start - start of db table index to get query
     *            
     */
    function get_limit_attendance_leave($limit, $start)
    {
        $this->db->order_by('id', 'desc');
        $this->db->limit($limit, $start);
        $result = $this->db->get('attendance_leave')->result_array();
        $db_error = $this->db->error();
        if (! empty($db_error['code'])) {
            echo 'Database error! Error Code [' . $db_error['code'] . '] Error: ' . $db_error['message'];
            exit();
        }
        return $result;
    }

    /**
     * Count attendance_leave rows
     */
    function get_count_attendance_leave()
    {
        $result = $this->db->from("attendance_leave")->count_all_results();
        $db_error = $this->db->error();
        if (! empty($db_error['code'])) {
            echo 'Database error! Error Code [' . $db_error['code'] . '] Error: ' . $db_error['message'];
            exit();
        }
        return $result;
    }

    /**
     * Get all users-attendance_leave
     */
    function get_all_users_attendance_leave()
    {
        $this->db->order_by('id', 'desc');
        $this->db->where('users_id', $this->session->userdata('id'));
        $result = $this->db->get('attendance_leave')->result_array();
        $db_error = $this->db->error();
        if (! empty($db_error['code'])) {
            echo 'Database error! Error Code [' . $db_error['code'] . '] Error: ' . $db_error['message'];
            exit();
        }
        return $result;
    }

    /**
     * Get limit users-attendance_leave
     *
     * @param $limit -
     *            limit of query , $start - start of db table index to get query
     *            
     */
    function get_limit_users_attendance_leave($limit, $start)
    {
        $this->db->order_by('id', 'desc');
        $this->db->limit($limit, $start);
        $this->db->where('users_id', $this->session->userdata('id'));
        $result = $this->db->get('attendance_leave')->result_array();
        $db_error = $this->db->error();
        if (! empty($db_error['code'])) {
            echo 'Database error! Error Code [' . $db_error['code'] . '] Error: ' . $db_error['message'];
            exit();
        }
        return $result;
    }

    /**
     * Count users-attendance_leave rows
     */
    function get_count_users_attendance_leave()
    {
        $this->db->where('users_id', $this->session->userdata('id'));
        $result = $this->db->from("attendance_leave")->count_all_results();
        $db_error = $this->db->error();
        if (! empty($db_error['code'])) {
            echo 'Database error! Error Code [' . $db_error['code'] . '] Error: ' . $db_error['message'];
            exit();
        }
        return $result;
    }

    /**
     * function to add new attendance_leave
     *
     * @param $params -
     *            data set to add record
     *            
     */
    function add_attendance_leave($params)
    {
        $this->db->insert('attendance_leave', $params);
        $id = $this->db->insert_id();
        $db_error = $this->db->error();
        if (! empty($db_error['code'])) {
            echo 'Database error! Error Code [' . $db_error['code'] . '] Error: ' . $db_error['message'];
            exit();
        }
        return $id;
    }

    /**
     * function to update attendance_leave
     *
     * @param $id -
     *            primary key to update record,$params - data set to add record
     *            
     */
    function update_attendance_leave($id, $params)
    {
        $this->db->where('id', $id);
        $status = $this->db->update('attendance_leave', $params);
        $db_error = $this->db->error();
        if (! empty($db_error['code'])) {
            echo 'Database error! Error Code [' . $db_error['code'] . '] Error: ' . $db_error['message'];
            exit();
        }
        return $status;
    }

    /**
     * function to delete attendance_leave
     *
     * @param $id -
     *            primary key to delete record
     *            
     */
    function delete_attendance_leave($id)
    {
        $status = $this->db->delete('attendance_leave', array(
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
