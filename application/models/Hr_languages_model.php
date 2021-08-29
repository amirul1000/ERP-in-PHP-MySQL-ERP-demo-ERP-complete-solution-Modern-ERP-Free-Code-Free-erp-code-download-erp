<?php

/**
 * Author: Amirul Momenin
 * Desc:Hr_languages Model
 */
class Hr_languages_model extends CI_Model
{

    protected $hr_languages = 'hr_languages';

    function __construct()
    {
        parent::__construct();
    }

    /**
     * Get hr_languages by id
     *
     * @param $id -
     *            primary key to get record
     *            
     */
    function get_hr_languages($id)
    {
        $result = $this->db->get_where('hr_languages', array(
            'id' => $id
        ))->row_array();
        if (! (array) $result) {
            $fields = $this->db->list_fields('hr_languages');
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
     * Get all hr_languages
     */
    function get_all_hr_languages()
    {
        $this->db->order_by('id', 'desc');
        $result = $this->db->get('hr_languages')->result_array();
        $db_error = $this->db->error();
        if (! empty($db_error['code'])) {
            echo 'Database error! Error Code [' . $db_error['code'] . '] Error: ' . $db_error['message'];
            exit();
        }
        return $result;
    }

    /**
     * Get limit hr_languages
     *
     * @param $limit -
     *            limit of query , $start - start of db table index to get query
     *            
     */
    function get_limit_hr_languages($limit, $start)
    {
        $this->db->order_by('id', 'desc');
        $this->db->limit($limit, $start);
        $result = $this->db->get('hr_languages')->result_array();
        $db_error = $this->db->error();
        if (! empty($db_error['code'])) {
            echo 'Database error! Error Code [' . $db_error['code'] . '] Error: ' . $db_error['message'];
            exit();
        }
        return $result;
    }

    /**
     * Count hr_languages rows
     */
    function get_count_hr_languages()
    {
        $result = $this->db->from("hr_languages")->count_all_results();
        $db_error = $this->db->error();
        if (! empty($db_error['code'])) {
            echo 'Database error! Error Code [' . $db_error['code'] . '] Error: ' . $db_error['message'];
            exit();
        }
        return $result;
    }

    /**
     * Get all users-hr_languages
     */
    function get_all_users_hr_languages()
    {
        $this->db->order_by('id', 'desc');
        $this->db->where('users_id', $this->session->userdata('id'));
        $result = $this->db->get('hr_languages')->result_array();
        $db_error = $this->db->error();
        if (! empty($db_error['code'])) {
            echo 'Database error! Error Code [' . $db_error['code'] . '] Error: ' . $db_error['message'];
            exit();
        }
        return $result;
    }

    /**
     * Get limit users-hr_languages
     *
     * @param $limit -
     *            limit of query , $start - start of db table index to get query
     *            
     */
    function get_limit_users_hr_languages($limit, $start)
    {
        $this->db->order_by('id', 'desc');
        $this->db->limit($limit, $start);
        $this->db->where('users_id', $this->session->userdata('id'));
        $result = $this->db->get('hr_languages')->result_array();
        $db_error = $this->db->error();
        if (! empty($db_error['code'])) {
            echo 'Database error! Error Code [' . $db_error['code'] . '] Error: ' . $db_error['message'];
            exit();
        }
        return $result;
    }

    /**
     * Count users-hr_languages rows
     */
    function get_count_users_hr_languages()
    {
        $this->db->where('users_id', $this->session->userdata('id'));
        $result = $this->db->from("hr_languages")->count_all_results();
        $db_error = $this->db->error();
        if (! empty($db_error['code'])) {
            echo 'Database error! Error Code [' . $db_error['code'] . '] Error: ' . $db_error['message'];
            exit();
        }
        return $result;
    }

    /**
     * function to add new hr_languages
     *
     * @param $params -
     *            data set to add record
     *            
     */
    function add_hr_languages($params)
    {
        $this->db->insert('hr_languages', $params);
        $id = $this->db->insert_id();
        $db_error = $this->db->error();
        if (! empty($db_error['code'])) {
            echo 'Database error! Error Code [' . $db_error['code'] . '] Error: ' . $db_error['message'];
            exit();
        }
        return $id;
    }

    /**
     * function to update hr_languages
     *
     * @param $id -
     *            primary key to update record,$params - data set to add record
     *            
     */
    function update_hr_languages($id, $params)
    {
        $this->db->where('id', $id);
        $status = $this->db->update('hr_languages', $params);
        $db_error = $this->db->error();
        if (! empty($db_error['code'])) {
            echo 'Database error! Error Code [' . $db_error['code'] . '] Error: ' . $db_error['message'];
            exit();
        }
        return $status;
    }

    /**
     * function to delete hr_languages
     *
     * @param $id -
     *            primary key to delete record
     *            
     */
    function delete_hr_languages($id)
    {
        $status = $this->db->delete('hr_languages', array(
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
