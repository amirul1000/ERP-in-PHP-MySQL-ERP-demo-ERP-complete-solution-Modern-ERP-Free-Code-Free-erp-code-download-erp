<?php

/**
 * Author: Amirul Momenin
 * Desc:Inventory_warehouse Model
 */
class Inventory_warehouse_model extends CI_Model
{

    protected $inventory_warehouse = 'inventory_warehouse';

    function __construct()
    {
        parent::__construct();
    }

    /**
     * Get inventory_warehouse by id
     *
     * @param $id -
     *            primary key to get record
     *            
     */
    function get_inventory_warehouse($id)
    {
        $result = $this->db->get_where('inventory_warehouse', array(
            'id' => $id
        ))->row_array();
        if (! (array) $result) {
            $fields = $this->db->list_fields('inventory_warehouse');
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
     * Get all inventory_warehouse
     */
    function get_all_inventory_warehouse()
    {
        $this->db->order_by('id', 'desc');
        $result = $this->db->get('inventory_warehouse')->result_array();
        $db_error = $this->db->error();
        if (! empty($db_error['code'])) {
            echo 'Database error! Error Code [' . $db_error['code'] . '] Error: ' . $db_error['message'];
            exit();
        }
        return $result;
    }

    /**
     * Get limit inventory_warehouse
     *
     * @param $limit -
     *            limit of query , $start - start of db table index to get query
     *            
     */
    function get_limit_inventory_warehouse($limit, $start)
    {
        $this->db->order_by('id', 'desc');
        $this->db->limit($limit, $start);
        $result = $this->db->get('inventory_warehouse')->result_array();
        $db_error = $this->db->error();
        if (! empty($db_error['code'])) {
            echo 'Database error! Error Code [' . $db_error['code'] . '] Error: ' . $db_error['message'];
            exit();
        }
        return $result;
    }

    /**
     * Count inventory_warehouse rows
     */
    function get_count_inventory_warehouse()
    {
        $result = $this->db->from("inventory_warehouse")->count_all_results();
        $db_error = $this->db->error();
        if (! empty($db_error['code'])) {
            echo 'Database error! Error Code [' . $db_error['code'] . '] Error: ' . $db_error['message'];
            exit();
        }
        return $result;
    }

    /**
     * Get all users-inventory_warehouse
     */
    function get_all_users_inventory_warehouse()
    {
        $this->db->order_by('id', 'desc');
        $this->db->where('users_id', $this->session->userdata('id'));
        $result = $this->db->get('inventory_warehouse')->result_array();
        $db_error = $this->db->error();
        if (! empty($db_error['code'])) {
            echo 'Database error! Error Code [' . $db_error['code'] . '] Error: ' . $db_error['message'];
            exit();
        }
        return $result;
    }

    /**
     * Get limit users-inventory_warehouse
     *
     * @param $limit -
     *            limit of query , $start - start of db table index to get query
     *            
     */
    function get_limit_users_inventory_warehouse($limit, $start)
    {
        $this->db->order_by('id', 'desc');
        $this->db->limit($limit, $start);
        $this->db->where('users_id', $this->session->userdata('id'));
        $result = $this->db->get('inventory_warehouse')->result_array();
        $db_error = $this->db->error();
        if (! empty($db_error['code'])) {
            echo 'Database error! Error Code [' . $db_error['code'] . '] Error: ' . $db_error['message'];
            exit();
        }
        return $result;
    }

    /**
     * Count users-inventory_warehouse rows
     */
    function get_count_users_inventory_warehouse()
    {
        $this->db->where('users_id', $this->session->userdata('id'));
        $result = $this->db->from("inventory_warehouse")->count_all_results();
        $db_error = $this->db->error();
        if (! empty($db_error['code'])) {
            echo 'Database error! Error Code [' . $db_error['code'] . '] Error: ' . $db_error['message'];
            exit();
        }
        return $result;
    }

    /**
     * function to add new inventory_warehouse
     *
     * @param $params -
     *            data set to add record
     *            
     */
    function add_inventory_warehouse($params)
    {
        $this->db->insert('inventory_warehouse', $params);
        $id = $this->db->insert_id();
        $db_error = $this->db->error();
        if (! empty($db_error['code'])) {
            echo 'Database error! Error Code [' . $db_error['code'] . '] Error: ' . $db_error['message'];
            exit();
        }
        return $id;
    }

    /**
     * function to update inventory_warehouse
     *
     * @param $id -
     *            primary key to update record,$params - data set to add record
     *            
     */
    function update_inventory_warehouse($id, $params)
    {
        $this->db->where('id', $id);
        $status = $this->db->update('inventory_warehouse', $params);
        $db_error = $this->db->error();
        if (! empty($db_error['code'])) {
            echo 'Database error! Error Code [' . $db_error['code'] . '] Error: ' . $db_error['message'];
            exit();
        }
        return $status;
    }

    /**
     * function to delete inventory_warehouse
     *
     * @param $id -
     *            primary key to delete record
     *            
     */
    function delete_inventory_warehouse($id)
    {
        $status = $this->db->delete('inventory_warehouse', array(
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
