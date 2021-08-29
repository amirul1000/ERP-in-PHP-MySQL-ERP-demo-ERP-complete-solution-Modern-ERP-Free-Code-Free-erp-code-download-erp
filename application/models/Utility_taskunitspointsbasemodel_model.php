<?php

/**
 * Author: Amirul Momenin
 * Desc:Utility_taskunitspointsbasemodel Model
 */
class Utility_taskunitspointsbasemodel_model extends CI_Model
{

    protected $utility_taskunitspointsbasemodel = 'utility_taskunitspointsbasemodel';

    function __construct()
    {
        parent::__construct();
    }

    /**
     * Get utility_taskunitspointsbasemodel by id
     *
     * @param $id -
     *            primary key to get record
     *            
     */
    function get_utility_taskunitspointsbasemodel($id)
    {
        $result = $this->db->get_where('utility_taskunitspointsbasemodel', array(
            'id' => $id
        ))->row_array();
        if (! (array) $result) {
            $fields = $this->db->list_fields('utility_taskunitspointsbasemodel');
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
     * Get all utility_taskunitspointsbasemodel
     */
    function get_all_utility_taskunitspointsbasemodel()
    {
        $this->db->order_by('id', 'desc');
        $result = $this->db->get('utility_taskunitspointsbasemodel')->result_array();
        $db_error = $this->db->error();
        if (! empty($db_error['code'])) {
            echo 'Database error! Error Code [' . $db_error['code'] . '] Error: ' . $db_error['message'];
            exit();
        }
        return $result;
    }

    /**
     * Get limit utility_taskunitspointsbasemodel
     *
     * @param $limit -
     *            limit of query , $start - start of db table index to get query
     *            
     */
    function get_limit_utility_taskunitspointsbasemodel($limit, $start)
    {
        $this->db->order_by('id', 'desc');
        $this->db->limit($limit, $start);
        $result = $this->db->get('utility_taskunitspointsbasemodel')->result_array();
        $db_error = $this->db->error();
        if (! empty($db_error['code'])) {
            echo 'Database error! Error Code [' . $db_error['code'] . '] Error: ' . $db_error['message'];
            exit();
        }
        return $result;
    }

    /**
     * Count utility_taskunitspointsbasemodel rows
     */
    function get_count_utility_taskunitspointsbasemodel()
    {
        $result = $this->db->from("utility_taskunitspointsbasemodel")->count_all_results();
        $db_error = $this->db->error();
        if (! empty($db_error['code'])) {
            echo 'Database error! Error Code [' . $db_error['code'] . '] Error: ' . $db_error['message'];
            exit();
        }
        return $result;
    }

    /**
     * Get all users-utility_taskunitspointsbasemodel
     */
    function get_all_users_utility_taskunitspointsbasemodel()
    {
        $this->db->order_by('id', 'desc');
        $this->db->where('users_id', $this->session->userdata('id'));
        $result = $this->db->get('utility_taskunitspointsbasemodel')->result_array();
        $db_error = $this->db->error();
        if (! empty($db_error['code'])) {
            echo 'Database error! Error Code [' . $db_error['code'] . '] Error: ' . $db_error['message'];
            exit();
        }
        return $result;
    }

    /**
     * Get limit users-utility_taskunitspointsbasemodel
     *
     * @param $limit -
     *            limit of query , $start - start of db table index to get query
     *            
     */
    function get_limit_users_utility_taskunitspointsbasemodel($limit, $start)
    {
        $this->db->order_by('id', 'desc');
        $this->db->limit($limit, $start);
        $this->db->where('users_id', $this->session->userdata('id'));
        $result = $this->db->get('utility_taskunitspointsbasemodel')->result_array();
        $db_error = $this->db->error();
        if (! empty($db_error['code'])) {
            echo 'Database error! Error Code [' . $db_error['code'] . '] Error: ' . $db_error['message'];
            exit();
        }
        return $result;
    }

    /**
     * Count users-utility_taskunitspointsbasemodel rows
     */
    function get_count_users_utility_taskunitspointsbasemodel()
    {
        $this->db->where('users_id', $this->session->userdata('id'));
        $result = $this->db->from("utility_taskunitspointsbasemodel")->count_all_results();
        $db_error = $this->db->error();
        if (! empty($db_error['code'])) {
            echo 'Database error! Error Code [' . $db_error['code'] . '] Error: ' . $db_error['message'];
            exit();
        }
        return $result;
    }

    /**
     * function to add new utility_taskunitspointsbasemodel
     *
     * @param $params -
     *            data set to add record
     *            
     */
    function add_utility_taskunitspointsbasemodel($params)
    {
        $this->db->insert('utility_taskunitspointsbasemodel', $params);
        $id = $this->db->insert_id();
        $db_error = $this->db->error();
        if (! empty($db_error['code'])) {
            echo 'Database error! Error Code [' . $db_error['code'] . '] Error: ' . $db_error['message'];
            exit();
        }
        return $id;
    }

    /**
     * function to update utility_taskunitspointsbasemodel
     *
     * @param $id -
     *            primary key to update record,$params - data set to add record
     *            
     */
    function update_utility_taskunitspointsbasemodel($id, $params)
    {
        $this->db->where('id', $id);
        $status = $this->db->update('utility_taskunitspointsbasemodel', $params);
        $db_error = $this->db->error();
        if (! empty($db_error['code'])) {
            echo 'Database error! Error Code [' . $db_error['code'] . '] Error: ' . $db_error['message'];
            exit();
        }
        return $status;
    }

    /**
     * function to delete utility_taskunitspointsbasemodel
     *
     * @param $id -
     *            primary key to delete record
     *            
     */
    function delete_utility_taskunitspointsbasemodel($id)
    {
        $status = $this->db->delete('utility_taskunitspointsbasemodel', array(
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
