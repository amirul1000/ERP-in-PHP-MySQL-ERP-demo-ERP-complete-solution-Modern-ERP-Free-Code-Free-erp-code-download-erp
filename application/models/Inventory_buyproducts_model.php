<?php

/**
 * Author: Amirul Momenin
 * Desc:Inventory_buyproducts Model
 */
class Inventory_buyproducts_model extends CI_Model
{

    protected $inventory_buyproducts = 'inventory_buyproducts';

    function __construct()
    {
        parent::__construct();
    }

    /**
     * Get inventory_buyproducts by id
     *
     * @param $id -
     *            primary key to get record
     *            
     */
    function get_inventory_buyproducts($id)
    {
        $result = $this->db->get_where('inventory_buyproducts', array(
            'id' => $id
        ))->row_array();
        if (! (array) $result) {
            $fields = $this->db->list_fields('inventory_buyproducts');
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
     * Get all inventory_buyproducts
     */
    function get_all_inventory_buyproducts()
    {
        $this->db->order_by('id', 'desc');
        $result = $this->db->get('inventory_buyproducts')->result_array();
        $db_error = $this->db->error();
        if (! empty($db_error['code'])) {
            echo 'Database error! Error Code [' . $db_error['code'] . '] Error: ' . $db_error['message'];
            exit();
        }
        return $result;
    }

    /**
     * Get limit inventory_buyproducts
     *
     * @param $limit -
     *            limit of query , $start - start of db table index to get query
     *            
     */
    function get_limit_inventory_buyproducts($limit, $start)
    {
        $this->db->order_by('id', 'desc');
        $this->db->limit($limit, $start);
        $result = $this->db->get('inventory_buyproducts')->result_array();
        $db_error = $this->db->error();
        if (! empty($db_error['code'])) {
            echo 'Database error! Error Code [' . $db_error['code'] . '] Error: ' . $db_error['message'];
            exit();
        }
        return $result;
    }

    /**
     * Count inventory_buyproducts rows
     */
    function get_count_inventory_buyproducts()
    {
        $result = $this->db->from("inventory_buyproducts")->count_all_results();
        $db_error = $this->db->error();
        if (! empty($db_error['code'])) {
            echo 'Database error! Error Code [' . $db_error['code'] . '] Error: ' . $db_error['message'];
            exit();
        }
        return $result;
    }

    /**
     * Get all users-inventory_buyproducts
     */
    function get_all_users_inventory_buyproducts()
    {
        $this->db->order_by('id', 'desc');
        $this->db->where('users_id', $this->session->userdata('id'));
        $result = $this->db->get('inventory_buyproducts')->result_array();
        $db_error = $this->db->error();
        if (! empty($db_error['code'])) {
            echo 'Database error! Error Code [' . $db_error['code'] . '] Error: ' . $db_error['message'];
            exit();
        }
        return $result;
    }

    /**
     * Get limit users-inventory_buyproducts
     *
     * @param $limit -
     *            limit of query , $start - start of db table index to get query
     *            
     */
    function get_limit_users_inventory_buyproducts($limit, $start)
    {
        $this->db->order_by('id', 'desc');
        $this->db->limit($limit, $start);
        $this->db->where('users_id', $this->session->userdata('id'));
        $result = $this->db->get('inventory_buyproducts')->result_array();
        $db_error = $this->db->error();
        if (! empty($db_error['code'])) {
            echo 'Database error! Error Code [' . $db_error['code'] . '] Error: ' . $db_error['message'];
            exit();
        }
        return $result;
    }

    /**
     * Count users-inventory_buyproducts rows
     */
    function get_count_users_inventory_buyproducts()
    {
        $this->db->where('users_id', $this->session->userdata('id'));
        $result = $this->db->from("inventory_buyproducts")->count_all_results();
        $db_error = $this->db->error();
        if (! empty($db_error['code'])) {
            echo 'Database error! Error Code [' . $db_error['code'] . '] Error: ' . $db_error['message'];
            exit();
        }
        return $result;
    }

    /**
     * function to add new inventory_buyproducts
     *
     * @param $params -
     *            data set to add record
     *            
     */
    function add_inventory_buyproducts($params)
    {
        $this->db->insert('inventory_buyproducts', $params);
        $id = $this->db->insert_id();
        $db_error = $this->db->error();
        if (! empty($db_error['code'])) {
            echo 'Database error! Error Code [' . $db_error['code'] . '] Error: ' . $db_error['message'];
            exit();
        }
        return $id;
    }

    /**
     * function to update inventory_buyproducts
     *
     * @param $id -
     *            primary key to update record,$params - data set to add record
     *            
     */
    function update_inventory_buyproducts($id, $params)
    {
        $this->db->where('id', $id);
        $status = $this->db->update('inventory_buyproducts', $params);
        $db_error = $this->db->error();
        if (! empty($db_error['code'])) {
            echo 'Database error! Error Code [' . $db_error['code'] . '] Error: ' . $db_error['message'];
            exit();
        }
        return $status;
    }

    /**
     * function to delete inventory_buyproducts
     *
     * @param $id -
     *            primary key to delete record
     *            
     */
    function delete_inventory_buyproducts($id)
    {
        $status = $this->db->delete('inventory_buyproducts', array(
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
