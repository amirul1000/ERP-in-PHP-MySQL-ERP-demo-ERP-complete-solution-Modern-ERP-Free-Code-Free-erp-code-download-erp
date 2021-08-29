<?php

/**
 * Author: Amirul Momenin
 * Desc:Inventory_buyproducts Controller
 *
 */
class Inventory_buyproducts extends CI_Controller
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
        $this->load->model('Inventory_buyproducts_model');
        if (! $this->session->userdata('validated')) {
            redirect('admin/login/index');
        }
    }

    /**
     * Index Page for this controller.
     *
     * @param $start -
     *            Starting of inventory_buyproducts table's index to get query
     *            
     */
    function index($start = 0)
    {
        $limit = 10;
        $data['inventory_buyproducts'] = $this->Inventory_buyproducts_model->get_limit_inventory_buyproducts($limit, $start);
        // pagination
        $config['base_url'] = site_url('admin/inventory_buyproducts/index');
        $config['total_rows'] = $this->Inventory_buyproducts_model->get_count_inventory_buyproducts();
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

        $data['_view'] = 'admin/inventory_buyproducts/index';
        $this->load->view('layouts/admin/body', $data);
    }

    /**
     * Save inventory_buyproducts
     *
     * @param $id -
     *            primary key to update
     *            
     */
    function save($id = - 1)
    {
        $params = array(
            'quantity' => html_escape($this->input->post('quantity')),
            'discount' => html_escape($this->input->post('discount')),
            'tax' => html_escape($this->input->post('tax')),
            'date_added' => html_escape($this->input->post('date_added')),
            'slug' => html_escape($this->input->post('slug')),
            'inventory_buy_id' => html_escape($this->input->post('inventory_buy_id')),
            'inventory_item_id' => html_escape($this->input->post('inventory_item_id')),
            'utility_unit_id' => html_escape($this->input->post('utility_unit_id'))
        );

        $data['id'] = $id;
        // update
        if (isset($id) && $id > 0) {
            $data['inventory_buyproducts'] = $this->Inventory_buyproducts_model->get_inventory_buyproducts($id);
            if (isset($_POST) && count($_POST) > 0) {
                $this->Inventory_buyproducts_model->update_inventory_buyproducts($id, $params);
                $this->session->set_flashdata('msg', 'Inventory_buyproducts has been updated successfully');
                redirect('admin/inventory_buyproducts/index');
            } else {
                $data['_view'] = 'admin/inventory_buyproducts/form';
                $this->load->view('layouts/admin/body', $data);
            }
        } // save
        else {
            if (isset($_POST) && count($_POST) > 0) {
                $inventory_buyproducts_id = $this->Inventory_buyproducts_model->add_inventory_buyproducts($params);
                $this->session->set_flashdata('msg', 'Inventory_buyproducts has been saved successfully');
                redirect('admin/inventory_buyproducts/index');
            } else {
                $data['inventory_buyproducts'] = $this->Inventory_buyproducts_model->get_inventory_buyproducts(0);
                $data['_view'] = 'admin/inventory_buyproducts/form';
                $this->load->view('layouts/admin/body', $data);
            }
        }
    }

    /**
     * Details inventory_buyproducts
     *
     * @param $id -
     *            primary key to get record
     *            
     */
    function details($id)
    {
        $data['inventory_buyproducts'] = $this->Inventory_buyproducts_model->get_inventory_buyproducts($id);
        $data['id'] = $id;
        $data['_view'] = 'admin/inventory_buyproducts/details';
        $this->load->view('layouts/admin/body', $data);
    }

    /**
     * Deleting inventory_buyproducts
     *
     * @param $id -
     *            primary key to delete record
     *            
     */
    function remove($id)
    {
        $inventory_buyproducts = $this->Inventory_buyproducts_model->get_inventory_buyproducts($id);

        // check if the inventory_buyproducts exists before trying to delete it
        if (isset($inventory_buyproducts['id'])) {
            $this->Inventory_buyproducts_model->delete_inventory_buyproducts($id);
            $this->session->set_flashdata('msg', 'Inventory_buyproducts has been deleted successfully');
            redirect('admin/inventory_buyproducts/index');
        } else
            show_error('The inventory_buyproducts you are trying to delete does not exist.');
    }

    /**
     * Search inventory_buyproducts
     *
     * @param $start -
     *            Starting of inventory_buyproducts table's index to get query
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
        $this->db->or_like('quantity', $key, 'both');
        $this->db->or_like('discount', $key, 'both');
        $this->db->or_like('tax', $key, 'both');
        $this->db->or_like('date_added', $key, 'both');
        $this->db->or_like('slug', $key, 'both');
        $this->db->or_like('inventory_buy_id', $key, 'both');
        $this->db->or_like('inventory_item_id', $key, 'both');
        $this->db->or_like('utility_unit_id', $key, 'both');

        $this->db->order_by('id', 'desc');

        $this->db->limit($limit, $start);
        $data['inventory_buyproducts'] = $this->db->get('inventory_buyproducts')->result_array();
        $db_error = $this->db->error();
        if (! empty($db_error['code'])) {
            echo 'Database error! Error Code [' . $db_error['code'] . '] Error: ' . $db_error['message'];
            exit();
        }

        // pagination
        $config['base_url'] = site_url('admin/inventory_buyproducts/search');
        $this->db->reset_query();
        $this->db->like('id', $key, 'both');
        $this->db->or_like('quantity', $key, 'both');
        $this->db->or_like('discount', $key, 'both');
        $this->db->or_like('tax', $key, 'both');
        $this->db->or_like('date_added', $key, 'both');
        $this->db->or_like('slug', $key, 'both');
        $this->db->or_like('inventory_buy_id', $key, 'both');
        $this->db->or_like('inventory_item_id', $key, 'both');
        $this->db->or_like('utility_unit_id', $key, 'both');

        $config['total_rows'] = $this->db->from("inventory_buyproducts")->count_all_results();
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
        $data['_view'] = 'admin/inventory_buyproducts/index';
        $this->load->view('layouts/admin/body', $data);
    }

    /**
     * Export inventory_buyproducts
     *
     * @param $export_type -
     *            CSV or PDF type
     */
    function export($export_type = 'CSV')
    {
        if ($export_type == 'CSV') {
            // file name
            $filename = 'inventory_buyproducts_' . date('Ymd') . '.csv';
            header("Content-Description: File Transfer");
            header("Content-Disposition: attachment; filename=$filename");
            header("Content-Type: application/csv; ");
            // get data
            $this->db->order_by('id', 'desc');
            $inventory_buyproductsData = $this->Inventory_buyproducts_model->get_all_inventory_buyproducts();
            // file creation
            $file = fopen('php://output', 'w');
            $header = array(
                "Id",
                "Quantity",
                "Discount",
                "Tax",
                "Date Added",
                "Slug",
                "Inventory Buy Id",
                "Inventory Item Id",
                "Utility Unit Id"
            );
            fputcsv($file, $header);
            foreach ($inventory_buyproductsData as $key => $line) {
                fputcsv($file, $line);
            }
            fclose($file);
            exit();
        } else if ($export_type == 'Pdf') {
            $this->db->order_by('id', 'desc');
            $inventory_buyproducts = $this->db->get('inventory_buyproducts')->result_array();
            // get the HTML
            ob_start();
            include (APPPATH . 'views/admin/inventory_buyproducts/print_template.php');
            $html = ob_get_clean();
            require_once FCPATH . 'vendor/autoload.php';
            $mpdf = new \Mpdf\Mpdf();
            $mpdf->WriteHTML($html);
            $mpdf->Output();
            exit();
        }
    }
}
//End of Inventory_buyproducts controller