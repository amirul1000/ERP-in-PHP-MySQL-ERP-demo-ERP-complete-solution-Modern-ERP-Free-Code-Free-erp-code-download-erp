<?php

/**
 * Author: Amirul Momenin
 * Desc:Marketing_smtp Model
 */
class Marketing_smtp_model extends CI_Model
{

    protected $marketing_smtp = 'marketing_smtp';

    function __construct()
    {
        parent::__construct();
    }

    /**
     * Get marketing_smtp by id
     *
     * @param $id -
     *            primary key to get record
     *            
     */
    function get_marketing_smtp($id)
    {
        $result = $this->db->get_where('marketing_smtp', array(
            'id' => $id
        ))->row_array();
        if (! (array) $result) {
            $fields = $this->db->list_fields('marketing_smtp');
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
     * Get all marketing_smtp
     */
    function get_all_marketing_smtp()
    {
        $this->db->order_by('id', 'desc');
        $result = $this->db->get('marketing_smtp')->result_array();
        $db_error = $this->db->error();
        if (! empty($db_error['code'])) {
            echo 'Database error! Error Code [' . $db_error['code'] . '] Error: ' . $db_error['message'];
            exit();
        }
        return $result;
    }

    /**
     * Get limit marketing_smtp
     *
     * @param $limit -
     *            limit of query , $start - start of db table index to get query
     *            
     */
    function get_limit_marketing_smtp($limit, $start)
    {
        $this->db->order_by('id', 'desc');
        $this->db->limit($limit, $start);
        $result = $this->db->get('marketing_smtp')->result_array();
        $db_error = $this->db->error();
        if (! empty($db_error['code'])) {
            echo 'Database error! Error Code [' . $db_error['code'] . '] Error: ' . $db_error['message'];
            exit();
        }
        return $result;
    }

    /**
     * Count marketing_smtp rows
     */
    function get_count_marketing_smtp()
    {
        $result = $this->db->from("marketing_smtp")->count_all_results();
        $db_error = $this->db->error();
        if (! empty($db_error['code'])) {
            echo 'Database error! Error Code [' . $db_error['code'] . '] Error: ' . $db_error['message'];
            exit();
        }
        return $result;
    }

    /**
     * Get all users-marketing_smtp
     */
    function get_all_users_marketing_smtp()
    {
        $this->db->order_by('id', 'desc');
        $this->db->where('users_id', $this->session->userdata('id'));
        $result = $this->db->get('marketing_smtp')->result_array();
        $db_error = $this->db->error();
        if (! empty($db_error['code'])) {
            echo 'Database error! Error Code [' . $db_error['code'] . '] Error: ' . $db_error['message'];
            exit();
        }
        return $result;
    }

    /**
     * Get limit users-marketing_smtp
     *
     * @param $limit -
     *            limit of query , $start - start of db table index to get query
     *            
     */
    function get_limit_users_marketing_smtp($limit, $start)
    {
        $this->db->order_by('id', 'desc');
        $this->db->limit($limit, $start);
        $this->db->where('users_id', $this->session->userdata('id'));
        $result = $this->db->get('marketing_smtp')->result_array();
        $db_error = $this->db->error();
        if (! empty($db_error['code'])) {
            echo 'Database error! Error Code [' . $db_error['code'] . '] Error: ' . $db_error['message'];
            exit();
        }
        return $result;
    }

    /**
     * Count users-marketing_smtp rows
     */
    function get_count_users_marketing_smtp()
    {
        $this->db->where('users_id', $this->session->userdata('id'));
        $result = $this->db->from("marketing_smtp")->count_all_results();
        $db_error = $this->db->error();
        if (! empty($db_error['code'])) {
            echo 'Database error! Error Code [' . $db_error['code'] . '] Error: ' . $db_error['message'];
            exit();
        }
        return $result;
    }

    /**
     * function to add new marketing_smtp
     *
     * @param $params -
     *            data set to add record
     *            
     */
    function add_marketing_smtp($params)
    {
        $this->db->insert('marketing_smtp', $params);
        $id = $this->db->insert_id();
        $db_error = $this->db->error();
        if (! empty($db_error['code'])) {
            echo 'Database error! Error Code [' . $db_error['code'] . '] Error: ' . $db_error['message'];
            exit();
        }
        return $id;
    }

    /**
     * function to update marketing_smtp
     *
     * @param $id -
     *            primary key to update record,$params - data set to add record
     *            
     */
    function update_marketing_smtp($id, $params)
    {
        $this->db->where('id', $id);
        $status = $this->db->update('marketing_smtp', $params);
        $db_error = $this->db->error();
        if (! empty($db_error['code'])) {
            echo 'Database error! Error Code [' . $db_error['code'] . '] Error: ' . $db_error['message'];
            exit();
        }
        return $status;
    }

    /**
     * function to delete marketing_smtp
     *
     * @param $id -
     *            primary key to delete record
     *            
     */
    function delete_marketing_smtp($id)
    {
        $status = $this->db->delete('marketing_smtp', array(
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
