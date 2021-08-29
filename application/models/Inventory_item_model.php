<?php

/**
 * Author: Amirul Momenin
 * Desc:Inventory_item Model
 */
class Inventory_item_model extends CI_Model
{

    protected $inventory_item = 'inventory_item';

    function __construct()
    {
        parent::__construct();
    }

    /**
     * Get inventory_item by id
     *
     * @param $id -
     *            primary key to get record
     *            
     */
    function get_inventory_item($id)
    {
        $result = $this->db->get_where('inventory_item', array(
            'id' => $id
        ))->row_array();
        if (! (array) $result) {
            $fields = $this->db->list_fields('inventory_item');
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
     * Get all inventory_item
     */
    function get_all_inventory_item()
    {
        $this->db->order_by('id', 'desc');
        $result = $this->db->get('inventory_item')->result_array();
        $db_error = $this->db->error();
        if (! empty($db_error['code'])) {
            echo 'Database error! Error Code [' . $db_error['code'] . '] Error: ' . $db_error['message'];
            exit();
        }
        return $result;
    }

    /**
     * Get limit inventory_item
     *
     * @param $limit -
     *            limit of query , $start - start of db table index to get query
     *            
     */
    function get_limit_inventory_item($limit, $start)
    {
        $this->db->order_by('id', 'desc');
        $this->db->limit($limit, $start);
        $result = $this->db->get('inventory_item')->result_array();
        $db_error = $this->db->error();
        if (! empty($db_error['code'])) {
            echo 'Database error! Error Code [' . $db_error['code'] . '] Error: ' . $db_error['message'];
            exit();
        }
        return $result;
    }

    /**
     * Count inventory_item rows
     */
    function get_count_inventory_item()
    {
        $result = $this->db->from("inventory_item")->count_all_results();
        $db_error = $this->db->error();
        if (! empty($db_error['code'])) {
            echo 'Database error! Error Code [' . $db_error['code'] . '] Error: ' . $db_error['message'];
            exit();
        }
        return $result;
    }

    /**
     * Get all users-inventory_item
     */
    function get_all_users_inventory_item()
    {
        $this->db->order_by('id', 'desc');
        $this->db->where('users_id', $this->session->userdata('id'));
        $result = $this->db->get('inventory_item')->result_array();
        $db_error = $this->db->error();
        if (! empty($db_error['code'])) {
            echo 'Database error! Error Code [' . $db_error['code'] . '] Error: ' . $db_error['message'];
            exit();
        }
        return $result;
    }

    /**
     * Get limit users-inventory_item
     *
     * @param $limit -
     *            limit of query , $start - start of db table index to get query
     *            
     */
    function get_limit_users_inventory_item($limit, $start)
    {
        $this->db->order_by('id', 'desc');
        $this->db->limit($limit, $start);
        $this->db->where('users_id', $this->session->userdata('id'));
        $result = $this->db->get('inventory_item')->result_array();
        $db_error = $this->db->error();
        if (! empty($db_error['code'])) {
            echo 'Database error! Error Code [' . $db_error['code'] . '] Error: ' . $db_error['message'];
            exit();
        }
        return $result;
    }

    /**
     * Count users-inventory_item rows
     */
    function get_count_users_inventory_item()
    {
        $this->db->where('users_id', $this->session->userdata('id'));
        $result = $this->db->from("inventory_item")->count_all_results();
        $db_error = $this->db->error();
        if (! empty($db_error['code'])) {
            echo 'Database error! Error Code [' . $db_error['code'] . '] Error: ' . $db_error['message'];
            exit();
        }
        return $result;
    }

    /**
     * function to add new inventory_item
     *
     * @param $params -
     *            data set to add record
     *            
     */
    function add_inventory_item($params)
    {
        $this->db->insert('inventory_item', $params);
        $id = $this->db->insert_id();
        $db_error = $this->db->error();
        if (! empty($db_error['code'])) {
            echo 'Database error! Error Code [' . $db_error['code'] . '] Error: ' . $db_error['message'];
            exit();
        }
        return $id;
    }

    /**
     * function to update inventory_item
     *
     * @param $id -
     *            primary key to update record,$params - data set to add record
     *            
     */
    function update_inventory_item($id, $params)
    {
        $this->db->where('id', $id);
        $status = $this->db->update('inventory_item', $params);
        $db_error = $this->db->error();
        if (! empty($db_error['code'])) {
            echo 'Database error! Error Code [' . $db_error['code'] . '] Error: ' . $db_error['message'];
            exit();
        }
        return $status;
    }

    /**
     * function to delete inventory_item
     *
     * @param $id -
     *            primary key to delete record
     *            
     */
    function delete_inventory_item($id)
    {
        $status = $this->db->delete('inventory_item', array(
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
