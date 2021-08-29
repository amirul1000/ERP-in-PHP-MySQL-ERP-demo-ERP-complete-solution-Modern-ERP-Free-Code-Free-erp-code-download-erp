<?php

/**
 * Author: Amirul Momenin
 * Desc:Utility_companybranch Model
 */
class Utility_companybranch_model extends CI_Model
{

    protected $utility_companybranch = 'utility_companybranch';

    function __construct()
    {
        parent::__construct();
    }

    /**
     * Get utility_companybranch by id
     *
     * @param $id -
     *            primary key to get record
     *            
     */
    function get_utility_companybranch($id)
    {
        $result = $this->db->get_where('utility_companybranch', array(
            'id' => $id
        ))->row_array();
        if (! (array) $result) {
            $fields = $this->db->list_fields('utility_companybranch');
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
     * Get all utility_companybranch
     */
    function get_all_utility_companybranch()
    {
        $this->db->order_by('id', 'desc');
        $result = $this->db->get('utility_companybranch')->result_array();
        $db_error = $this->db->error();
        if (! empty($db_error['code'])) {
            echo 'Database error! Error Code [' . $db_error['code'] . '] Error: ' . $db_error['message'];
            exit();
        }
        return $result;
    }

    /**
     * Get limit utility_companybranch
     *
     * @param $limit -
     *            limit of query , $start - start of db table index to get query
     *            
     */
    function get_limit_utility_companybranch($limit, $start)
    {
        $this->db->order_by('id', 'desc');
        $this->db->limit($limit, $start);
        $result = $this->db->get('utility_companybranch')->result_array();
        $db_error = $this->db->error();
        if (! empty($db_error['code'])) {
            echo 'Database error! Error Code [' . $db_error['code'] . '] Error: ' . $db_error['message'];
            exit();
        }
        return $result;
    }

    /**
     * Count utility_companybranch rows
     */
    function get_count_utility_companybranch()
    {
        $result = $this->db->from("utility_companybranch")->count_all_results();
        $db_error = $this->db->error();
        if (! empty($db_error['code'])) {
            echo 'Database error! Error Code [' . $db_error['code'] . '] Error: ' . $db_error['message'];
            exit();
        }
        return $result;
    }

    /**
     * Get all users-utility_companybranch
     */
    function get_all_users_utility_companybranch()
    {
        $this->db->order_by('id', 'desc');
        $this->db->where('users_id', $this->session->userdata('id'));
        $result = $this->db->get('utility_companybranch')->result_array();
        $db_error = $this->db->error();
        if (! empty($db_error['code'])) {
            echo 'Database error! Error Code [' . $db_error['code'] . '] Error: ' . $db_error['message'];
            exit();
        }
        return $result;
    }

    /**
     * Get limit users-utility_companybranch
     *
     * @param $limit -
     *            limit of query , $start - start of db table index to get query
     *            
     */
    function get_limit_users_utility_companybranch($limit, $start)
    {
        $this->db->order_by('id', 'desc');
        $this->db->limit($limit, $start);
        $this->db->where('users_id', $this->session->userdata('id'));
        $result = $this->db->get('utility_companybranch')->result_array();
        $db_error = $this->db->error();
        if (! empty($db_error['code'])) {
            echo 'Database error! Error Code [' . $db_error['code'] . '] Error: ' . $db_error['message'];
            exit();
        }
        return $result;
    }

    /**
     * Count users-utility_companybranch rows
     */
    function get_count_users_utility_companybranch()
    {
        $this->db->where('users_id', $this->session->userdata('id'));
        $result = $this->db->from("utility_companybranch")->count_all_results();
        $db_error = $this->db->error();
        if (! empty($db_error['code'])) {
            echo 'Database error! Error Code [' . $db_error['code'] . '] Error: ' . $db_error['message'];
            exit();
        }
        return $result;
    }

    /**
     * function to add new utility_companybranch
     *
     * @param $params -
     *            data set to add record
     *            
     */
    function add_utility_companybranch($params)
    {
        $this->db->insert('utility_companybranch', $params);
        $id = $this->db->insert_id();
        $db_error = $this->db->error();
        if (! empty($db_error['code'])) {
            echo 'Database error! Error Code [' . $db_error['code'] . '] Error: ' . $db_error['message'];
            exit();
        }
        return $id;
    }

    /**
     * function to update utility_companybranch
     *
     * @param $id -
     *            primary key to update record,$params - data set to add record
     *            
     */
    function update_utility_companybranch($id, $params)
    {
        $this->db->where('id', $id);
        $status = $this->db->update('utility_companybranch', $params);
        $db_error = $this->db->error();
        if (! empty($db_error['code'])) {
            echo 'Database error! Error Code [' . $db_error['code'] . '] Error: ' . $db_error['message'];
            exit();
        }
        return $status;
    }

    /**
     * function to delete utility_companybranch
     *
     * @param $id -
     *            primary key to delete record
     *            
     */
    function delete_utility_companybranch($id)
    {
        $status = $this->db->delete('utility_companybranch', array(
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
