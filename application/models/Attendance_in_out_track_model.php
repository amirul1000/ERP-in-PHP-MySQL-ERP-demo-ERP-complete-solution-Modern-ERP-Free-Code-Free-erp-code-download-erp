<?php

/**
 * Author: Amirul Momenin
 * Desc:Attendance_in_out_track Model
 */
class Attendance_in_out_track_model extends CI_Model
{

    protected $attendance_in_out_track = 'attendance_in_out_track';

    function __construct()
    {
        parent::__construct();
    }

    /**
     * Get attendance_in_out_track by id
     *
     * @param $id -
     *            primary key to get record
     *            
     */
    function get_attendance_in_out_track($id)
    {
        $result = $this->db->get_where('attendance_in_out_track', array(
            'id' => $id
        ))->row_array();
        if (! (array) $result) {
            $fields = $this->db->list_fields('attendance_in_out_track');
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
     * Get all attendance_in_out_track
     */
    function get_all_attendance_in_out_track()
    {
        $this->db->order_by('id', 'desc');
        $result = $this->db->get('attendance_in_out_track')->result_array();
        $db_error = $this->db->error();
        if (! empty($db_error['code'])) {
            echo 'Database error! Error Code [' . $db_error['code'] . '] Error: ' . $db_error['message'];
            exit();
        }
        return $result;
    }

    /**
     * Get limit attendance_in_out_track
     *
     * @param $limit -
     *            limit of query , $start - start of db table index to get query
     *            
     */
    function get_limit_attendance_in_out_track($limit, $start)
    {
        $this->db->order_by('id', 'desc');
        $this->db->limit($limit, $start);
        $result = $this->db->get('attendance_in_out_track')->result_array();
        $db_error = $this->db->error();
        if (! empty($db_error['code'])) {
            echo 'Database error! Error Code [' . $db_error['code'] . '] Error: ' . $db_error['message'];
            exit();
        }
        return $result;
    }

    /**
     * Count attendance_in_out_track rows
     */
    function get_count_attendance_in_out_track()
    {
        $result = $this->db->from("attendance_in_out_track")->count_all_results();
        $db_error = $this->db->error();
        if (! empty($db_error['code'])) {
            echo 'Database error! Error Code [' . $db_error['code'] . '] Error: ' . $db_error['message'];
            exit();
        }
        return $result;
    }

    /**
     * Get all users-attendance_in_out_track
     */
    function get_all_users_attendance_in_out_track()
    {
        $this->db->order_by('id', 'desc');
        $this->db->where('users_id', $this->session->userdata('id'));
        $result = $this->db->get('attendance_in_out_track')->result_array();
        $db_error = $this->db->error();
        if (! empty($db_error['code'])) {
            echo 'Database error! Error Code [' . $db_error['code'] . '] Error: ' . $db_error['message'];
            exit();
        }
        return $result;
    }

    /**
     * Get limit users-attendance_in_out_track
     *
     * @param $limit -
     *            limit of query , $start - start of db table index to get query
     *            
     */
    function get_limit_users_attendance_in_out_track($limit, $start)
    {
        $this->db->order_by('id', 'desc');
        $this->db->limit($limit, $start);
        $this->db->where('users_id', $this->session->userdata('id'));
        $result = $this->db->get('attendance_in_out_track')->result_array();
        $db_error = $this->db->error();
        if (! empty($db_error['code'])) {
            echo 'Database error! Error Code [' . $db_error['code'] . '] Error: ' . $db_error['message'];
            exit();
        }
        return $result;
    }

    /**
     * Count users-attendance_in_out_track rows
     */
    function get_count_users_attendance_in_out_track()
    {
        $this->db->where('users_id', $this->session->userdata('id'));
        $result = $this->db->from("attendance_in_out_track")->count_all_results();
        $db_error = $this->db->error();
        if (! empty($db_error['code'])) {
            echo 'Database error! Error Code [' . $db_error['code'] . '] Error: ' . $db_error['message'];
            exit();
        }
        return $result;
    }

    /**
     * function to add new attendance_in_out_track
     *
     * @param $params -
     *            data set to add record
     *            
     */
    function add_attendance_in_out_track($params)
    {
        $this->db->insert('attendance_in_out_track', $params);
        $id = $this->db->insert_id();
        $db_error = $this->db->error();
        if (! empty($db_error['code'])) {
            echo 'Database error! Error Code [' . $db_error['code'] . '] Error: ' . $db_error['message'];
            exit();
        }
        return $id;
    }

    /**
     * function to update attendance_in_out_track
     *
     * @param $id -
     *            primary key to update record,$params - data set to add record
     *            
     */
    function update_attendance_in_out_track($id, $params)
    {
        $this->db->where('id', $id);
        $status = $this->db->update('attendance_in_out_track', $params);
        $db_error = $this->db->error();
        if (! empty($db_error['code'])) {
            echo 'Database error! Error Code [' . $db_error['code'] . '] Error: ' . $db_error['message'];
            exit();
        }
        return $status;
    }

    /**
     * function to delete attendance_in_out_track
     *
     * @param $id -
     *            primary key to delete record
     *            
     */
    function delete_attendance_in_out_track($id)
    {
        $status = $this->db->delete('attendance_in_out_track', array(
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
