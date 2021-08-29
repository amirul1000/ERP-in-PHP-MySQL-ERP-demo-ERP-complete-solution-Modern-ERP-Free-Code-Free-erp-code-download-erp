<?php

/**
 * Author: Amirul Momenin
 * Desc:Marketing_mail_group Model
 */
class Marketing_mail_group_model extends CI_Model
{

    protected $marketing_mail_group = 'marketing_mail_group';

    function __construct()
    {
        parent::__construct();
    }

    /**
     * Get marketing_mail_group by id
     *
     * @param $id -
     *            primary key to get record
     *            
     */
    function get_marketing_mail_group($id)
    {
        $result = $this->db->get_where('marketing_mail_group', array(
            'id' => $id
        ))->row_array();
        if (! (array) $result) {
            $fields = $this->db->list_fields('marketing_mail_group');
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
     * Get all marketing_mail_group
     */
    function get_all_marketing_mail_group()
    {
        $this->db->order_by('id', 'desc');
        $result = $this->db->get('marketing_mail_group')->result_array();
        $db_error = $this->db->error();
        if (! empty($db_error['code'])) {
            echo 'Database error! Error Code [' . $db_error['code'] . '] Error: ' . $db_error['message'];
            exit();
        }
        return $result;
    }

    /**
     * Get limit marketing_mail_group
     *
     * @param $limit -
     *            limit of query , $start - start of db table index to get query
     *            
     */
    function get_limit_marketing_mail_group($limit, $start)
    {
        $this->db->order_by('id', 'desc');
        $this->db->limit($limit, $start);
        $result = $this->db->get('marketing_mail_group')->result_array();
        $db_error = $this->db->error();
        if (! empty($db_error['code'])) {
            echo 'Database error! Error Code [' . $db_error['code'] . '] Error: ' . $db_error['message'];
            exit();
        }
        return $result;
    }

    /**
     * Count marketing_mail_group rows
     */
    function get_count_marketing_mail_group()
    {
        $result = $this->db->from("marketing_mail_group")->count_all_results();
        $db_error = $this->db->error();
        if (! empty($db_error['code'])) {
            echo 'Database error! Error Code [' . $db_error['code'] . '] Error: ' . $db_error['message'];
            exit();
        }
        return $result;
    }

    /**
     * Get all users-marketing_mail_group
     */
    function get_all_users_marketing_mail_group()
    {
        $this->db->order_by('id', 'desc');
        $this->db->where('users_id', $this->session->userdata('id'));
        $result = $this->db->get('marketing_mail_group')->result_array();
        $db_error = $this->db->error();
        if (! empty($db_error['code'])) {
            echo 'Database error! Error Code [' . $db_error['code'] . '] Error: ' . $db_error['message'];
            exit();
        }
        return $result;
    }

    /**
     * Get limit users-marketing_mail_group
     *
     * @param $limit -
     *            limit of query , $start - start of db table index to get query
     *            
     */
    function get_limit_users_marketing_mail_group($limit, $start)
    {
        $this->db->order_by('id', 'desc');
        $this->db->limit($limit, $start);
        $this->db->where('users_id', $this->session->userdata('id'));
        $result = $this->db->get('marketing_mail_group')->result_array();
        $db_error = $this->db->error();
        if (! empty($db_error['code'])) {
            echo 'Database error! Error Code [' . $db_error['code'] . '] Error: ' . $db_error['message'];
            exit();
        }
        return $result;
    }

    /**
     * Count users-marketing_mail_group rows
     */
    function get_count_users_marketing_mail_group()
    {
        $this->db->where('users_id', $this->session->userdata('id'));
        $result = $this->db->from("marketing_mail_group")->count_all_results();
        $db_error = $this->db->error();
        if (! empty($db_error['code'])) {
            echo 'Database error! Error Code [' . $db_error['code'] . '] Error: ' . $db_error['message'];
            exit();
        }
        return $result;
    }

    /**
     * function to add new marketing_mail_group
     *
     * @param $params -
     *            data set to add record
     *            
     */
    function add_marketing_mail_group($params)
    {
        $this->db->insert('marketing_mail_group', $params);
        $id = $this->db->insert_id();
        $db_error = $this->db->error();
        if (! empty($db_error['code'])) {
            echo 'Database error! Error Code [' . $db_error['code'] . '] Error: ' . $db_error['message'];
            exit();
        }
        return $id;
    }

    /**
     * function to update marketing_mail_group
     *
     * @param $id -
     *            primary key to update record,$params - data set to add record
     *            
     */
    function update_marketing_mail_group($id, $params)
    {
        $this->db->where('id', $id);
        $status = $this->db->update('marketing_mail_group', $params);
        $db_error = $this->db->error();
        if (! empty($db_error['code'])) {
            echo 'Database error! Error Code [' . $db_error['code'] . '] Error: ' . $db_error['message'];
            exit();
        }
        return $status;
    }

    /**
     * function to delete marketing_mail_group
     *
     * @param $id -
     *            primary key to delete record
     *            
     */
    function delete_marketing_mail_group($id)
    {
        $status = $this->db->delete('marketing_mail_group', array(
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
