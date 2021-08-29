<?php

/**
 * Author: Amirul Momenin
 * Desc:Crm_lead Model
 */
class Crm_lead_model extends CI_Model
{

    protected $crm_lead = 'crm_lead';

    function __construct()
    {
        parent::__construct();
    }

    /**
     * Get crm_lead by id
     *
     * @param $id -
     *            primary key to get record
     *            
     */
    function get_crm_lead($id)
    {
        $result = $this->db->get_where('crm_lead', array(
            'id' => $id
        ))->row_array();
        if (! (array) $result) {
            $fields = $this->db->list_fields('crm_lead');
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
     * Get all crm_lead
     */
    function get_all_crm_lead()
    {
        $this->db->order_by('id', 'desc');
        $result = $this->db->get('crm_lead')->result_array();
        $db_error = $this->db->error();
        if (! empty($db_error['code'])) {
            echo 'Database error! Error Code [' . $db_error['code'] . '] Error: ' . $db_error['message'];
            exit();
        }
        return $result;
    }

    /**
     * Get limit crm_lead
     *
     * @param $limit -
     *            limit of query , $start - start of db table index to get query
     *            
     */
    function get_limit_crm_lead($limit, $start)
    {
        $this->db->order_by('id', 'desc');
        $this->db->limit($limit, $start);
        $result = $this->db->get('crm_lead')->result_array();
        $db_error = $this->db->error();
        if (! empty($db_error['code'])) {
            echo 'Database error! Error Code [' . $db_error['code'] . '] Error: ' . $db_error['message'];
            exit();
        }
        return $result;
    }

    /**
     * Count crm_lead rows
     */
    function get_count_crm_lead()
    {
        $result = $this->db->from("crm_lead")->count_all_results();
        $db_error = $this->db->error();
        if (! empty($db_error['code'])) {
            echo 'Database error! Error Code [' . $db_error['code'] . '] Error: ' . $db_error['message'];
            exit();
        }
        return $result;
    }

    /**
     * Get all users-crm_lead
     */
    function get_all_users_crm_lead()
    {
        $this->db->order_by('id', 'desc');
        $this->db->where('users_id', $this->session->userdata('id'));
        $result = $this->db->get('crm_lead')->result_array();
        $db_error = $this->db->error();
        if (! empty($db_error['code'])) {
            echo 'Database error! Error Code [' . $db_error['code'] . '] Error: ' . $db_error['message'];
            exit();
        }
        return $result;
    }

    /**
     * Get limit users-crm_lead
     *
     * @param $limit -
     *            limit of query , $start - start of db table index to get query
     *            
     */
    function get_limit_users_crm_lead($limit, $start)
    {
        $this->db->order_by('id', 'desc');
        $this->db->limit($limit, $start);
        $this->db->where('users_id', $this->session->userdata('id'));
        $result = $this->db->get('crm_lead')->result_array();
        $db_error = $this->db->error();
        if (! empty($db_error['code'])) {
            echo 'Database error! Error Code [' . $db_error['code'] . '] Error: ' . $db_error['message'];
            exit();
        }
        return $result;
    }

    /**
     * Count users-crm_lead rows
     */
    function get_count_users_crm_lead()
    {
        $this->db->where('users_id', $this->session->userdata('id'));
        $result = $this->db->from("crm_lead")->count_all_results();
        $db_error = $this->db->error();
        if (! empty($db_error['code'])) {
            echo 'Database error! Error Code [' . $db_error['code'] . '] Error: ' . $db_error['message'];
            exit();
        }
        return $result;
    }

    /**
     * function to add new crm_lead
     *
     * @param $params -
     *            data set to add record
     *            
     */
    function add_crm_lead($params)
    {
        $this->db->insert('crm_lead', $params);
        $id = $this->db->insert_id();
        $db_error = $this->db->error();
        if (! empty($db_error['code'])) {
            echo 'Database error! Error Code [' . $db_error['code'] . '] Error: ' . $db_error['message'];
            exit();
        }
        return $id;
    }

    /**
     * function to update crm_lead
     *
     * @param $id -
     *            primary key to update record,$params - data set to add record
     *            
     */
    function update_crm_lead($id, $params)
    {
        $this->db->where('id', $id);
        $status = $this->db->update('crm_lead', $params);
        $db_error = $this->db->error();
        if (! empty($db_error['code'])) {
            echo 'Database error! Error Code [' . $db_error['code'] . '] Error: ' . $db_error['message'];
            exit();
        }
        return $status;
    }

    /**
     * function to delete crm_lead
     *
     * @param $id -
     *            primary key to delete record
     *            
     */
    function delete_crm_lead($id)
    {
        $status = $this->db->delete('crm_lead', array(
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
