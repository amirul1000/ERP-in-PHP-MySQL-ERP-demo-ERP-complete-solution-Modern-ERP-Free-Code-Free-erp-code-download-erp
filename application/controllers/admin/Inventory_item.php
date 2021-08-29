<?php

/**
 * Author: Amirul Momenin
 * Desc:Inventory_item Controller
 *
 */
class Inventory_item extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        $this->load->helper('url');
        $this->load->helper('form');
        $this->load->library('session');
        $this->load->library('pagination');
        $this->load->library('Customlib');
        $this->load->helper(array(
            'cookie',
            'url'
        ));
        $this->load->database();
        $this->load->model('Inventory_item_model');
        if (! $this->session->userdata('validated')) {
            redirect('admin/login/index');
        }
    }

    /**
     * Index Page for this controller.
     *
     * @param $start -
     *            Starting of inventory_item table's index to get query
     *            
     */
    function index($start = 0)
    {
        $limit = 10;
        $data['inventory_item'] = $this->Inventory_item_model->get_limit_inventory_item($limit, $start);
        // pagination
        $config['base_url'] = site_url('admin/inventory_item/index');
        $config['total_rows'] = $this->Inventory_item_model->get_count_inventory_item();
        $config['per_page'] = 10;
        // Bootstrap 4 Pagination fix
        $config['full_tag_open'] = '<div class="pagging text-center"><nav><ul class="pagination">';
        $config['full_tag_close'] = '</ul></nav></div>';
        $config['num_tag_open'] = '<li class="page-item"><span class="page-link">';
        $config['num_tag_close'] = '</span></li>';
        $config['cur_tag_open'] = '<li class="page-item active"><span class="page-link">';
        $config['cur_tag_close'] = '<span class="sr-only">(current)</span></span></li>';
        $config['next_tag_open'] = '<li class="page-item"><span class="page-link">';
        $config['next_tag_close'] = '<span aria-hidden="true"></span></span></li>';
        $config['next_tag_close'] = '<span aria-hidden="true">&raquo;</span></span></li>';
        $config['prev_tag_open'] = '<li class="page-item"><span class="page-link">';
        $config['prev_tag_close'] = '</span></li>';
        $config['first_tag_open'] = '<li class="page-item"><span class="page-link">';
        $config['first_tag_close'] = '</span></li>';
        $config['last_tag_open'] = '<li class="page-item"><span class="page-link">';
        $config['last_tag_close'] = '</span></li>';
        $this->pagination->initialize($config);
        $data['link'] = $this->pagination->create_links();

        $data['_view'] = 'admin/inventory_item/index';
        $this->load->view('layouts/admin/body', $data);
    }

    /**
     * Save inventory_item
     *
     * @param $id -
     *            primary key to update
     *            
     */
    function save($id = - 1)
    {
        $params = array(
            'name' => html_escape($this->input->post('name')),
            'brand' => html_escape($this->input->post('brand')),
            'model' => html_escape($this->input->post('model')),
            'item_quantity' => html_escape($this->input->post('item_quantity')),
            'date_added' => html_escape($this->input->post('date_added')),
            'slug' => html_escape($this->input->post('slug')),
            'inventory_category_id' => html_escape($this->input->post('inventory_category_id')),
            'item_utility_unit_id' => html_escape($this->input->post('item_utility_unit_id')),
            'inventory_warehouse_id' => html_escape($this->input->post('inventory_warehouse_id')),
            'orginal_price' => html_escape($this->input->post('orginal_price')),
            'sale_price' => html_escape($this->input->post('sale_price'))
        );

        $data['id'] = $id;
        // update
        if (isset($id) && $id > 0) {
            $data['inventory_item'] = $this->Inventory_item_model->get_inventory_item($id);
            if (isset($_POST) && count($_POST) > 0) {
                $this->Inventory_item_model->update_inventory_item($id, $params);
                $this->session->set_flashdata('msg', 'Inventory_item has been updated successfully');
                redirect('admin/inventory_item/index');
            } else {
                $data['_view'] = 'admin/inventory_item/form';
                $this->load->view('layouts/admin/body', $data);
            }
        } // save
        else {
            if (isset($_POST) && count($_POST) > 0) {
                $inventory_item_id = $this->Inventory_item_model->add_inventory_item($params);
                $this->session->set_flashdata('msg', 'Inventory_item has been saved successfully');
                redirect('admin/inventory_item/index');
            } else {
                $data['inventory_item'] = $this->Inventory_item_model->get_inventory_item(0);
                $data['_view'] = 'admin/inventory_item/form';
                $this->load->view('layouts/admin/body', $data);
            }
        }
    }

    /**
     * Details inventory_item
     *
     * @param $id -
     *            primary key to get record
     *            
     */
    function details($id)
    {
        $data['inventory_item'] = $this->Inventory_item_model->get_inventory_item($id);
        $data['id'] = $id;
        $data['_view'] = 'admin/inventory_item/details';
        $this->load->view('layouts/admin/body', $data);
    }

    /**
     * Deleting inventory_item
     *
     * @param $id -
     *            primary key to delete record
     *            
     */
    function remove($id)
    {
        $inventory_item = $this->Inventory_item_model->get_inventory_item($id);

        // check if the inventory_item exists before trying to delete it
        if (isset($inventory_item['id'])) {
            $this->Inventory_item_model->delete_inventory_item($id);
            $this->session->set_flashdata('msg', 'Inventory_item has been deleted successfully');
            redirect('admin/inventory_item/index');
        } else
            show_error('The inventory_item you are trying to delete does not exist.');
    }

    /**
     * Search inventory_item
     *
     * @param $start -
     *            Starting of inventory_item table's index to get query
     */
    function search($start = 0)
    {
        if (! empty($this->input->post('key'))) {
            $key = $this->input->post('key');
            $_SESSION['key'] = $key;
        } else {
            $key = $_SESSION['key'];
        }

        $limit = 10;
        $this->db->like('id', $key, 'both');
        $this->db->or_like('name', $key, 'both');
        $this->db->or_like('brand', $key, 'both');
        $this->db->or_like('model', $key, 'both');
        $this->db->or_like('item_quantity', $key, 'both');
        $this->db->or_like('date_added', $key, 'both');
        $this->db->or_like('slug', $key, 'both');
        $this->db->or_like('inventory_category_id', $key, 'both');
        $this->db->or_like('item_utility_unit_id', $key, 'both');
        $this->db->or_like('inventory_warehouse_id', $key, 'both');
        $this->db->or_like('orginal_price', $key, 'both');
        $this->db->or_like('sale_price', $key, 'both');

        $this->db->order_by('id', 'desc');

        $this->db->limit($limit, $start);
        $data['inventory_item'] = $this->db->get('inventory_item')->result_array();
        $db_error = $this->db->error();
        if (! empty($db_error['code'])) {
            echo 'Database error! Error Code [' . $db_error['code'] . '] Error: ' . $db_error['message'];
            exit();
        }

        // pagination
        $config['base_url'] = site_url('admin/inventory_item/search');
        $this->db->reset_query();
        $this->db->like('id', $key, 'both');
        $this->db->or_like('name', $key, 'both');
        $this->db->or_like('brand', $key, 'both');
        $this->db->or_like('model', $key, 'both');
        $this->db->or_like('item_quantity', $key, 'both');
        $this->db->or_like('date_added', $key, 'both');
        $this->db->or_like('slug', $key, 'both');
        $this->db->or_like('inventory_category_id', $key, 'both');
        $this->db->or_like('item_utility_unit_id', $key, 'both');
        $this->db->or_like('inventory_warehouse_id', $key, 'both');
        $this->db->or_like('orginal_price', $key, 'both');
        $this->db->or_like('sale_price', $key, 'both');

        $config['total_rows'] = $this->db->from("inventory_item")->count_all_results();
        $db_error = $this->db->error();
        if (! empty($db_error['code'])) {
            echo 'Database error! Error Code [' . $db_error['code'] . '] Error: ' . $db_error['message'];
            exit();
        }
        $config['per_page'] = 10;
        // Bootstrap 4 Pagination fix
        $config['full_tag_open'] = '<div class="pagging text-center"><nav><ul class="pagination">';
        $config['full_tag_close'] = '</ul></nav></div>';
        $config['num_tag_open'] = '<li class="page-item"><span class="page-link">';
        $config['num_tag_close'] = '</span></li>';
        $config['cur_tag_open'] = '<li class="page-item active"><span class="page-link">';
        $config['cur_tag_close'] = '<span class="sr-only">(current)</span></span></li>';
        $config['next_tag_open'] = '<li class="page-item"><span class="page-link">';
        $config['next_tag_close'] = '<span aria-hidden="true"></span></span></li>';
        $config['next_tag_close'] = '<span aria-hidden="true">&raquo;</span></span></li>';
        $config['prev_tag_open'] = '<li class="page-item"><span class="page-link">';
        $config['prev_tag_close'] = '</span></li>';
        $config['first_tag_open'] = '<li class="page-item"><span class="page-link">';
        $config['first_tag_close'] = '</span></li>';
        $config['last_tag_open'] = '<li class="page-item"><span class="page-link">';
        $config['last_tag_close'] = '</span></li>';
        $this->pagination->initialize($config);
        $data['link'] = $this->pagination->create_links();

        $data['key'] = $key;
        $data['_view'] = 'admin/inventory_item/index';
        $this->load->view('layouts/admin/body', $data);
    }

    /**
     * Export inventory_item
     *
     * @param $export_type -
     *            CSV or PDF type
     */
    function export($export_type = 'CSV')
    {
        if ($export_type == 'CSV') {
            // file name
            $filename = 'inventory_item_' . date('Ymd') . '.csv';
            header("Content-Description: File Transfer");
            header("Content-Disposition: attachment; filename=$filename");
            header("Content-Type: application/csv; ");
            // get data
            $this->db->order_by('id', 'desc');
            $inventory_itemData = $this->Inventory_item_model->get_all_inventory_item();
            // file creation
            $file = fopen('php://output', 'w');
            $header = array(
                "Id",
                "Name",
                "Brand",
                "Model",
                "Item Quantity",
                "Date Added",
                "Slug",
                "Inventory Category Id",
                "Item Utility Unit Id",
                "Inventory Warehouse Id",
                "Orginal Price",
                "Sale Price"
            );
            fputcsv($file, $header);
            foreach ($inventory_itemData as $key => $line) {
                fputcsv($file, $line);
            }
            fclose($file);
            exit();
        } else if ($export_type == 'Pdf') {
            $this->db->order_by('id', 'desc');
            $inventory_item = $this->db->get('inventory_item')->result_array();
            // get the HTML
            ob_start();
            include (APPPATH . 'views/admin/inventory_item/print_template.php');
            $html = ob_get_clean();
            require_once FCPATH . 'vendor/autoload.php';
            $mpdf = new \Mpdf\Mpdf();
            $mpdf->WriteHTML($html);
            $mpdf->Output();
            exit();
        }
    }
}
//End of Inventory_item controller