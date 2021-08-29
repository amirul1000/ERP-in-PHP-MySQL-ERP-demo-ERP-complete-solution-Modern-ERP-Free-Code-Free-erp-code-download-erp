<?php

/**
 * Author: Amirul Momenin
 * Desc:Utility_predfinedpointsrule Model
 */
class Utility_predfinedpointsrule_model extends CI_Model
{

    protected $utility_predfinedpointsrule = 'utility_predfinedpointsrule';

    function __construct()
    {
        parent::__construct();
    }

    /**
     * Get utility_predfinedpointsrule by id
     *
     * @param $id -
     *            primary key to get record
     *            
     */
    function get_utility_predfinedpointsrule($id)
    {
        $result = $this->db->get_where('utility_predfinedpointsrule', array(
            'id' => $id
        ))->row_array();
        if (! (array) $result) {
            $fields = $this->db->list_fields('utility_predfinedpointsrule');
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
     * Get all utility_predfinedpointsrule
     */
    function get_all_utility_predfinedpointsrule()
    {
        $this->db->order_by('id', 'desc');
        $result = $this->db->get('utility_predfinedpointsrule')->result_array();
        $db_error = $this->db->error();
        if (! empty($db_error['code'])) {
            echo 'Database error! Error Code [' . $db_error['code'] . '] Error: ' . $db_error['message'];
            exit();
        }
        return $result;
    }

    /**
     * Get limit utility_predfinedpointsrule
     *
     * @param $limit -
     *            limit of query , $start - start of db table index to get query
     *            
     */
    function get_limit_utility_predfinedpointsrule($limit, $start)
    {
        $this->db->order_by('id', 'desc');
        $this->db->limit($limit, $start);
        $result = $this->db->get('utility_predfinedpointsrule')->result_array();
        $db_error = $this->db->error();
        if (! empty($db_error['code'])) {
            echo 'Database error! Error Code [' . $db_error['code'] . '] Error: ' . $db_error['message'];
            exit();
        }
        return $result;
    }

    /**
     * Count utility_predfinedpointsrule rows
     */
    function get_count_utility_predfinedpointsrule()
    {
        $result = $this->db->from("utility_predfinedpointsrule")->count_all_results();
        $db_error = $this->db->error();
        if (! empty($db_error['code'])) {
            echo 'Database error! Error Code [' . $db_error['code'] . '] Error: ' . $db_error['message'];
            exit();
        }
        return $result;
    }

    /**
     * Get all users-utility_predfinedpointsrule
     */
    function get_all_users_utility_predfinedpointsrule()
    {
        $this->db->order_by('id', 'desc');
        $this->db->where('users_id', $this->session->userdata('id'));
        $result = $this->db->get('utility_predfinedpointsrule')->result_array();
        $db_error = $this->db->error();
        if (! empty($db_error['code'])) {
            echo 'Database error! Error Code [' . $db_error['code'] . '] Error: ' . $db_error['message'];
            exit();
        }
        return $result;
    }

    /**
     * Get limit users-utility_predfinedpointsrule
     *
     * @param $limit -
     *            limit of query , $start - start of db table index to get query
     *            
     */
    function get_limit_users_utility_predfinedpointsrule($limit, $start)
    {
        $this->db->order_by('id', 'desc');
        $this->db->limit($limit, $start);
        $this->db->where('users_id', $this->session->userdata('id'));
        $result = $this->db->get('utility_predfinedpointsrule')->result_array();
        $db_error = $this->db->error();
        if (! empty($db_error['code'])) {
            echo 'Database error! Error Code [' . $db_error['code'] . '] Error: ' . $db_error['message'];
            exit();
        }
        return $result;
    }

    /**
     * Count users-utility_predfinedpointsrule rows
     */
    function get_count_users_utility_predfinedpointsrule()
    {
        $this->db->where('users_id', $this->session->userdata('id'));
        $result = $this->db->from("utility_predfinedpointsrule")->count_all_results();
        $db_error = $this->db->error();
        if (! empty($db_error['code'])) {
            echo 'Database error! Error Code [' . $db_error['code'] . '] Error: ' . $db_error['message'];
            exit();
        }
        return $result;
    }

    /**
     * function to add new utility_predfinedpointsrule
     *
     * @param $params -
     *            data set to add record
     *            
     */
    function add_utility_predfinedpointsrule($params)
    {
        $this->db->insert('utility_predfinedpointsrule', $params);
        $id = $this->db->insert_id();
        $db_error = $this->db->error();
        if (! empty($db_error['code'])) {
            echo 'Database error! Error Code [' . $db_error['code'] . '] Error: ' . $db_error['message'];
            exit();
        }
        return $id;
    }

    /**
     * function to update utility_predfinedpointsrule
     *
     * @param $id -
     *            primary key to update record,$params - data set to add record
     *            
     */
    function update_utility_predfinedpointsrule($id, $params)
    {
        $this->db->where('id', $id);
        $status = $this->db->update('utility_predfinedpointsrule', $params);
        $db_error = $this->db->error();
        if (! empty($db_error['code'])) {
            echo 'Database error! Error Code [' . $db_error['code'] . '] Error: ' . $db_error['message'];
            exit();
        }
        return $status;
    }

    /**
     * function to delete utility_predfinedpointsrule
     *
     * @param $id -
     *            primary key to delete record
     *            
     */
    function delete_utility_predfinedpointsrule($id)
    {
        $status = $this->db->delete('utility_predfinedpointsrule', array(
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
