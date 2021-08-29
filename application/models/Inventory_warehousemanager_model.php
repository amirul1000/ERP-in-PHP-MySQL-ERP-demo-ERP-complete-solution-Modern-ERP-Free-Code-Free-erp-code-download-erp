<?php

/**
 * Author: Amirul Momenin
 * Desc:Inventory_warehousemanager Model
 */
class Inventory_warehousemanager_model extends CI_Model
{

    protected $inventory_warehousemanager = 'inventory_warehousemanager';

    function __construct()
    {
        parent::__construct();
    }

    /**
     * Get inventory_warehousemanager by id
     *
     * @param $id -
     *            primary key to get record
     *            
     */
    function get_inventory_warehousemanager($id)
    {
        $result = $this->db->get_where('inventory_warehousemanager', array(
            'id' => $id
        ))->row_array();
        if (! (array) $result) {
            $fields = $this->db->list_fields('inventory_warehousemanager');
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
     * Get all inventory_warehousemanager
     */
    function get_all_inventory_warehousemanager()
    {
        $this->db->order_by('id', 'desc');
        $result = $this->db->get('inventory_warehousemanager')->result_array();
        $db_error = $this->db->error();
        if (! empty($db_error['code'])) {
            echo 'Database error! Error Code [' . $db_error['code'] . '] Error: ' . $db_error['message'];
            exit();
        }
        return $result;
    }

    /**
     * Get limit inventory_warehousemanager
     *
     * @param $limit -
     *            limit of query , $start - start of db table index to get query
     *            
     */
    function get_limit_inventory_warehousemanager($limit, $start)
    {
        $this->db->order_by('id', 'desc');
        $this->db->limit($limit, $start);
        $result = $this->db->get('inventory_warehousemanager')->result_array();
        $db_error = $this->db->error();
        if (! empty($db_error['code'])) {
            echo 'Database error! Error Code [' . $db_error['code'] . '] Error: ' . $db_error['message'];
            exit();
        }
        return $result;
    }

    /**
     * Count inventory_warehousemanager rows
     */
    function get_count_inventory_warehousemanager()
    {
        $result = $this->db->from("inventory_warehousemanager")->count_all_results();
        $db_error = $this->db->error();
        if (! empty($db_error['code'])) {
            echo 'Database error! Error Code [' . $db_error['code'] . '] Error: ' . $db_error['message'];
            exit();
        }
        return $result;
    }

    /**
     * Get all users-inventory_warehousemanager
     */
    function get_all_users_inventory_warehousemanager()
    {
        $this->db->order_by('id', 'desc');
        $this->db->where('users_id', $this->session->userdata('id'));
        $result = $this->db->get('inventory_warehousemanager')->result_array();
        $db_error = $this->db->error();
        if (! empty($db_error['code'])) {
            echo 'Database error! Error Code [' . $db_error['code'] . '] Error: ' . $db_error['message'];
            exit();
        }
        return $result;
    }

    /**
     * Get limit users-inventory_warehousemanager
     *
     * @param $limit -
     *            limit of query , $start - start of db table index to get query
     *            
     */
    function get_limit_users_inventory_warehousemanager($limit, $start)
    {
        $this->db->order_by('id', 'desc');
        $this->db->limit($limit, $start);
        $this->db->where('users_id', $this->session->userdata('id'));
        $result = $this->db->get('inventory_warehousemanager')->result_array();
        $db_error = $this->db->error();
        if (! empty($db_error['code'])) {
            echo 'Database error! Error Code [' . $db_error['code'] . '] Error: ' . $db_error['message'];
            exit();
        }
        return $result;
    }

    /**
     * Count users-inventory_warehousemanager rows
     */
    function get_count_users_inventory_warehousemanager()
    {
        $this->db->where('users_id', $this->session->userdata('id'));
        $result = $this->db->from("inventory_warehousemanager")->count_all_results();
        $db_error = $this->db->error();
        if (! empty($db_error['code'])) {
            echo 'Database error! Error Code [' . $db_error['code'] . '] Error: ' . $db_error['message'];
            exit();
        }
        return $result;
    }

    /**
     * function to add new inventory_warehousemanager
     *
     * @param $params -
     *            data set to add record
     *            
     */
    function add_inventory_warehousemanager($params)
    {
        $this->db->insert('inventory_warehousemanager', $params);
        $id = $this->db->insert_id();
        $db_error = $this->db->error();
        if (! empty($db_error['code'])) {
            echo 'Database error! Error Code [' . $db_error['code'] . '] Error: ' . $db_error['message'];
            exit();
        }
        return $id;
    }

    /**
     * function to update inventory_warehousemanager
     *
     * @param $id -
     *            primary key to update record,$params - data set to add record
     *            
     */
    function update_inventory_warehousemanager($id, $params)
    {
        $this->db->where('id', $id);
        $status = $this->db->update('inventory_warehousemanager', $params);
        $db_error = $this->db->error();
        if (! empty($db_error['code'])) {
            echo 'Database error! Error Code [' . $db_error['code'] . '] Error: ' . $db_error['message'];
            exit();
        }
        return $status;
    }

    /**
     * function to delete inventory_warehousemanager
     *
     * @param $id -
     *            primary key to delete record
     *            
     */
    function delete_inventory_warehousemanager($id)
    {
        $status = $this->db->delete('inventory_warehousemanager', array(
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
