<?php

/**
 * Author: Amirul Momenin
 * Desc:Inventory_saleproducts Model
 */
class Inventory_saleproducts_model extends CI_Model
{

    protected $inventory_saleproducts = 'inventory_saleproducts';

    function __construct()
    {
        parent::__construct();
    }

    /**
     * Get inventory_saleproducts by id
     *
     * @param $id -
     *            primary key to get record
     *            
     */
    function get_inventory_saleproducts($id)
    {
        $result = $this->db->get_where('inventory_saleproducts', array(
            'id' => $id
        ))->row_array();
        if (! (array) $result) {
            $fields = $this->db->list_fields('inventory_saleproducts');
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
     * Get all inventory_saleproducts
     */
    function get_all_inventory_saleproducts()
    {
        $this->db->order_by('id', 'desc');
        $result = $this->db->get('inventory_saleproducts')->result_array();
        $db_error = $this->db->error();
        if (! empty($db_error['code'])) {
            echo 'Database error! Error Code [' . $db_error['code'] . '] Error: ' . $db_error['message'];
            exit();
        }
        return $result;
    }

    /**
     * Get limit inventory_saleproducts
     *
     * @param $limit -
     *            limit of query , $start - start of db table index to get query
     *            
     */
    function get_limit_inventory_saleproducts($limit, $start)
    {
        $this->db->order_by('id', 'desc');
        $this->db->limit($limit, $start);
        $result = $this->db->get('inventory_saleproducts')->result_array();
        $db_error = $this->db->error();
        if (! empty($db_error['code'])) {
            echo 'Database error! Error Code [' . $db_error['code'] . '] Error: ' . $db_error['message'];
            exit();
        }
        return $result;
    }

    /**
     * Count inventory_saleproducts rows
     */
    function get_count_inventory_saleproducts()
    {
        $result = $this->db->from("inventory_saleproducts")->count_all_results();
        $db_error = $this->db->error();
        if (! empty($db_error['code'])) {
            echo 'Database error! Error Code [' . $db_error['code'] . '] Error: ' . $db_error['message'];
            exit();
        }
        return $result;
    }

    /**
     * Get all users-inventory_saleproducts
     */
    function get_all_users_inventory_saleproducts()
    {
        $this->db->order_by('id', 'desc');
        $this->db->where('users_id', $this->session->userdata('id'));
        $result = $this->db->get('inventory_saleproducts')->result_array();
        $db_error = $this->db->error();
        if (! empty($db_error['code'])) {
            echo 'Database error! Error Code [' . $db_error['code'] . '] Error: ' . $db_error['message'];
            exit();
        }
        return $result;
    }

    /**
     * Get limit users-inventory_saleproducts
     *
     * @param $limit -
     *            limit of query , $start - start of db table index to get query
     *            
     */
    function get_limit_users_inventory_saleproducts($limit, $start)
    {
        $this->db->order_by('id', 'desc');
        $this->db->limit($limit, $start);
        $this->db->where('users_id', $this->session->userdata('id'));
        $result = $this->db->get('inventory_saleproducts')->result_array();
        $db_error = $this->db->error();
        if (! empty($db_error['code'])) {
            echo 'Database error! Error Code [' . $db_error['code'] . '] Error: ' . $db_error['message'];
            exit();
        }
        return $result;
    }

    /**
     * Count users-inventory_saleproducts rows
     */
    function get_count_users_inventory_saleproducts()
    {
        $this->db->where('users_id', $this->session->userdata('id'));
        $result = $this->db->from("inventory_saleproducts")->count_all_results();
        $db_error = $this->db->error();
        if (! empty($db_error['code'])) {
            echo 'Database error! Error Code [' . $db_error['code'] . '] Error: ' . $db_error['message'];
            exit();
        }
        return $result;
    }

    /**
     * function to add new inventory_saleproducts
     *
     * @param $params -
     *            data set to add record
     *            
     */
    function add_inventory_saleproducts($params)
    {
        $this->db->insert('inventory_saleproducts', $params);
        $id = $this->db->insert_id();
        $db_error = $this->db->error();
        if (! empty($db_error['code'])) {
            echo 'Database error! Error Code [' . $db_error['code'] . '] Error: ' . $db_error['message'];
            exit();
        }
        return $id;
    }

    /**
     * function to update inventory_saleproducts
     *
     * @param $id -
     *            primary key to update record,$params - data set to add record
     *            
     */
    function update_inventory_saleproducts($id, $params)
    {
        $this->db->where('id', $id);
        $status = $this->db->update('inventory_saleproducts', $params);
        $db_error = $this->db->error();
        if (! empty($db_error['code'])) {
            echo 'Database error! Error Code [' . $db_error['code'] . '] Error: ' . $db_error['message'];
            exit();
        }
        return $status;
    }

    /**
     * function to delete inventory_saleproducts
     *
     * @param $id -
     *            primary key to delete record
     *            
     */
    function delete_inventory_saleproducts($id)
    {
        $status = $this->db->delete('inventory_saleproducts', array(
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
