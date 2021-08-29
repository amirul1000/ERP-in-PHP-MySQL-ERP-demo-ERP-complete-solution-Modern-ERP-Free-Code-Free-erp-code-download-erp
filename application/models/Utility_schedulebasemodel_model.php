<?php

/**
 * Author: Amirul Momenin
 * Desc:Utility_schedulebasemodel Model
 */
class Utility_schedulebasemodel_model extends CI_Model
{

    protected $utility_schedulebasemodel = 'utility_schedulebasemodel';

    function __construct()
    {
        parent::__construct();
    }

    /**
     * Get utility_schedulebasemodel by id
     *
     * @param $id -
     *            primary key to get record
     *            
     */
    function get_utility_schedulebasemodel($id)
    {
        $result = $this->db->get_where('utility_schedulebasemodel', array(
            'id' => $id
        ))->row_array();
        if (! (array) $result) {
            $fields = $this->db->list_fields('utility_schedulebasemodel');
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
     * Get all utility_schedulebasemodel
     */
    function get_all_utility_schedulebasemodel()
    {
        $this->db->order_by('id', 'desc');
        $result = $this->db->get('utility_schedulebasemodel')->result_array();
        $db_error = $this->db->error();
        if (! empty($db_error['code'])) {
            echo 'Database error! Error Code [' . $db_error['code'] . '] Error: ' . $db_error['message'];
            exit();
        }
        return $result;
    }

    /**
     * Get limit utility_schedulebasemodel
     *
     * @param $limit -
     *            limit of query , $start - start of db table index to get query
     *            
     */
    function get_limit_utility_schedulebasemodel($limit, $start)
    {
        $this->db->order_by('id', 'desc');
        $this->db->limit($limit, $start);
        $result = $this->db->get('utility_schedulebasemodel')->result_array();
        $db_error = $this->db->error();
        if (! empty($db_error['code'])) {
            echo 'Database error! Error Code [' . $db_error['code'] . '] Error: ' . $db_error['message'];
            exit();
        }
        return $result;
    }

    /**
     * Count utility_schedulebasemodel rows
     */
    function get_count_utility_schedulebasemodel()
    {
        $result = $this->db->from("utility_schedulebasemodel")->count_all_results();
        $db_error = $this->db->error();
        if (! empty($db_error['code'])) {
            echo 'Database error! Error Code [' . $db_error['code'] . '] Error: ' . $db_error['message'];
            exit();
        }
        return $result;
    }

    /**
     * Get all users-utility_schedulebasemodel
     */
    function get_all_users_utility_schedulebasemodel()
    {
        $this->db->order_by('id', 'desc');
        $this->db->where('users_id', $this->session->userdata('id'));
        $result = $this->db->get('utility_schedulebasemodel')->result_array();
        $db_error = $this->db->error();
        if (! empty($db_error['code'])) {
            echo 'Database error! Error Code [' . $db_error['code'] . '] Error: ' . $db_error['message'];
            exit();
        }
        return $result;
    }

    /**
     * Get limit users-utility_schedulebasemodel
     *
     * @param $limit -
     *            limit of query , $start - start of db table index to get query
     *            
     */
    function get_limit_users_utility_schedulebasemodel($limit, $start)
    {
        $this->db->order_by('id', 'desc');
        $this->db->limit($limit, $start);
        $this->db->where('users_id', $this->session->userdata('id'));
        $result = $this->db->get('utility_schedulebasemodel')->result_array();
        $db_error = $this->db->error();
        if (! empty($db_error['code'])) {
            echo 'Database error! Error Code [' . $db_error['code'] . '] Error: ' . $db_error['message'];
            exit();
        }
        return $result;
    }

    /**
     * Count users-utility_schedulebasemodel rows
     */
    function get_count_users_utility_schedulebasemodel()
    {
        $this->db->where('users_id', $this->session->userdata('id'));
        $result = $this->db->from("utility_schedulebasemodel")->count_all_results();
        $db_error = $this->db->error();
        if (! empty($db_error['code'])) {
            echo 'Database error! Error Code [' . $db_error['code'] . '] Error: ' . $db_error['message'];
            exit();
        }
        return $result;
    }

    /**
     * function to add new utility_schedulebasemodel
     *
     * @param $params -
     *            data set to add record
     *            
     */
    function add_utility_schedulebasemodel($params)
    {
        $this->db->insert('utility_schedulebasemodel', $params);
        $id = $this->db->insert_id();
        $db_error = $this->db->error();
        if (! empty($db_error['code'])) {
            echo 'Database error! Error Code [' . $db_error['code'] . '] Error: ' . $db_error['message'];
            exit();
        }
        return $id;
    }

    /**
     * function to update utility_schedulebasemodel
     *
     * @param $id -
     *            primary key to update record,$params - data set to add record
     *            
     */
    function update_utility_schedulebasemodel($id, $params)
    {
        $this->db->where('id', $id);
        $status = $this->db->update('utility_schedulebasemodel', $params);
        $db_error = $this->db->error();
        if (! empty($db_error['code'])) {
            echo 'Database error! Error Code [' . $db_error['code'] . '] Error: ' . $db_error['message'];
            exit();
        }
        return $status;
    }

    /**
     * function to delete utility_schedulebasemodel
     *
     * @param $id -
     *            primary key to delete record
     *            
     */
    function delete_utility_schedulebasemodel($id)
    {
        $status = $this->db->delete('utility_schedulebasemodel', array(
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
