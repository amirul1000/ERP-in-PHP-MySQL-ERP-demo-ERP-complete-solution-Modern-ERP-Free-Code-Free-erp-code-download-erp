<?php

/**
 * Author: Amirul Momenin
 * Desc:Marketing_leads Model
 */
class Marketing_leads_model extends CI_Model
{

    protected $marketing_leads = 'marketing_leads';

    function __construct()
    {
        parent::__construct();
    }

    /**
     * Get marketing_leads by id
     *
     * @param $id -
     *            primary key to get record
     *            
     */
    function get_marketing_leads($id)
    {
        $result = $this->db->get_where('marketing_leads', array(
            'id' => $id
        ))->row_array();
        if (! (array) $result) {
            $fields = $this->db->list_fields('marketing_leads');
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
     * Get all marketing_leads
     */
    function get_all_marketing_leads()
    {
        $this->db->order_by('id', 'desc');
        $result = $this->db->get('marketing_leads')->result_array();
        $db_error = $this->db->error();
        if (! empty($db_error['code'])) {
            echo 'Database error! Error Code [' . $db_error['code'] . '] Error: ' . $db_error['message'];
            exit();
        }
        return $result;
    }

    /**
     * Get limit marketing_leads
     *
     * @param $limit -
     *            limit of query , $start - start of db table index to get query
     *            
     */
    function get_limit_marketing_leads($limit, $start)
    {
        $this->db->order_by('id', 'desc');
        $this->db->limit($limit, $start);
        $result = $this->db->get('marketing_leads')->result_array();
        $db_error = $this->db->error();
        if (! empty($db_error['code'])) {
            echo 'Database error! Error Code [' . $db_error['code'] . '] Error: ' . $db_error['message'];
            exit();
        }
        return $result;
    }

    /**
     * Count marketing_leads rows
     */
    function get_count_marketing_leads()
    {
        $result = $this->db->from("marketing_leads")->count_all_results();
        $db_error = $this->db->error();
        if (! empty($db_error['code'])) {
            echo 'Database error! Error Code [' . $db_error['code'] . '] Error: ' . $db_error['message'];
            exit();
        }
        return $result;
    }

    /**
     * Get all users-marketing_leads
     */
    function get_all_users_marketing_leads()
    {
        $this->db->order_by('id', 'desc');
        $this->db->where('users_id', $this->session->userdata('id'));
        $result = $this->db->get('marketing_leads')->result_array();
        $db_error = $this->db->error();
        if (! empty($db_error['code'])) {
            echo 'Database error! Error Code [' . $db_error['code'] . '] Error: ' . $db_error['message'];
            exit();
        }
        return $result;
    }

    /**
     * Get limit users-marketing_leads
     *
     * @param $limit -
     *            limit of query , $start - start of db table index to get query
     *            
     */
    function get_limit_users_marketing_leads($limit, $start)
    {
        $this->db->order_by('id', 'desc');
        $this->db->limit($limit, $start);
        $this->db->where('users_id', $this->session->userdata('id'));
        $result = $this->db->get('marketing_leads')->result_array();
        $db_error = $this->db->error();
        if (! empty($db_error['code'])) {
            echo 'Database error! Error Code [' . $db_error['code'] . '] Error: ' . $db_error['message'];
            exit();
        }
        return $result;
    }

    /**
     * Count users-marketing_leads rows
     */
    function get_count_users_marketing_leads()
    {
        $this->db->where('users_id', $this->session->userdata('id'));
        $result = $this->db->from("marketing_leads")->count_all_results();
        $db_error = $this->db->error();
        if (! empty($db_error['code'])) {
            echo 'Database error! Error Code [' . $db_error['code'] . '] Error: ' . $db_error['message'];
            exit();
        }
        return $result;
    }

    /**
     * function to add new marketing_leads
     *
     * @param $params -
     *            data set to add record
     *            
     */
    function add_marketing_leads($params)
    {
        $this->db->insert('marketing_leads', $params);
        $id = $this->db->insert_id();
        $db_error = $this->db->error();
        if (! empty($db_error['code'])) {
            echo 'Database error! Error Code [' . $db_error['code'] . '] Error: ' . $db_error['message'];
            exit();
        }
        return $id;
    }

    /**
     * function to update marketing_leads
     *
     * @param $id -
     *            primary key to update record,$params - data set to add record
     *            
     */
    function update_marketing_leads($id, $params)
    {
        $this->db->where('id', $id);
        $status = $this->db->update('marketing_leads', $params);
        $db_error = $this->db->error();
        if (! empty($db_error['code'])) {
            echo 'Database error! Error Code [' . $db_error['code'] . '] Error: ' . $db_error['message'];
            exit();
        }
        return $status;
    }

    /**
     * function to delete marketing_leads
     *
     * @param $id -
     *            primary key to delete record
     *            
     */
    function delete_marketing_leads($id)
    {
        $status = $this->db->delete('marketing_leads', array(
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
