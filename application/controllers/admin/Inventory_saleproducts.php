<?php

/**
 * Author: Amirul Momenin
 * Desc:Inventory_saleproducts Controller
 *
 */
class Inventory_saleproducts extends CI_Controller
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
        $this->load->model('Inventory_saleproducts_model');
        if (! $this->session->userdata('validated')) {
            redirect('admin/login/index');
        }
    }

    /**
     * Index Page for this controller.
     *
     * @param $start -
     *            Starting of inventory_saleproducts table's index to get query
     *            
     */
    function index($start = 0)
    {
        $limit = 10;
        $data['inventory_saleproducts'] = $this->Inventory_saleproducts_model->get_limit_inventory_saleproducts($limit, $start);
        // pagination
        $config['base_url'] = site_url('admin/inventory_saleproducts/index');
        $config['total_rows'] = $this->Inventory_saleproducts_model->get_count_inventory_saleproducts();
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

        $data['_view'] = 'admin/inventory_saleproducts/index';
        $this->load->view('layouts/admin/body', $data);
    }

    /**
     * Save inventory_saleproducts
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
            'inventory_item_id' => html_escape($this->input->post('inventory_item_id')),
            'inventory_sale_id' => html_escape($this->input->post('inventory_sale_id')),
            'utility_unit_id' => html_escape($this->input->post('utility_unit_id'))
        );

        $data['id'] = $id;
        // update
        if (isset($id) && $id > 0) {
            $data['inventory_saleproducts'] = $this->Inventory_saleproducts_model->get_inventory_saleproducts($id);
            if (isset($_POST) && count($_POST) > 0) {
                $this->Inventory_saleproducts_model->update_inventory_saleproducts($id, $params);
                $this->session->set_flashdata('msg', 'Inventory_saleproducts has been updated successfully');
                redirect('admin/inventory_saleproducts/index');
            } else {
                $data['_view'] = 'admin/inventory_saleproducts/form';
                $this->load->view('layouts/admin/body', $data);
            }
        } // save
        else {
            if (isset($_POST) && count($_POST) > 0) {
                $inventory_saleproducts_id = $this->Inventory_saleproducts_model->add_inventory_saleproducts($params);
                $this->session->set_flashdata('msg', 'Inventory_saleproducts has been saved successfully');
                redirect('admin/inventory_saleproducts/index');
            } else {
                $data['inventory_saleproducts'] = $this->Inventory_saleproducts_model->get_inventory_saleproducts(0);
                $data['_view'] = 'admin/inventory_saleproducts/form';
                $this->load->view('layouts/admin/body', $data);
            }
        }
    }

    /**
     * Details inventory_saleproducts
     *
     * @param $id -
     *            primary key to get record
     *            
     */
    function details($id)
    {
        $data['inventory_saleproducts'] = $this->Inventory_saleproducts_model->get_inventory_saleproducts($id);
        $data['id'] = $id;
        $data['_view'] = 'admin/inventory_saleproducts/details';
        $this->load->view('layouts/admin/body', $data);
    }

    /**
     * Deleting inventory_saleproducts
     *
     * @param $id -
     *            primary key to delete record
     *            
     */
    function remove($id)
    {
        $inventory_saleproducts = $this->Inventory_saleproducts_model->get_inventory_saleproducts($id);

        // check if the inventory_saleproducts exists before trying to delete it
        if (isset($inventory_saleproducts['id'])) {
            $this->Inventory_saleproducts_model->delete_inventory_saleproducts($id);
            $this->session->set_flashdata('msg', 'Inventory_saleproducts has been deleted successfully');
            redirect('admin/inventory_saleproducts/index');
        } else
            show_error('The inventory_saleproducts you are trying to delete does not exist.');
    }

    /**
     * Search inventory_saleproducts
     *
     * @param $start -
     *            Starting of inventory_saleproducts table's index to get query
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
        $this->db->or_like('inventory_item_id', $key, 'both');
        $this->db->or_like('inventory_sale_id', $key, 'both');
        $this->db->or_like('utility_unit_id', $key, 'both');

        $this->db->order_by('id', 'desc');

        $this->db->limit($limit, $start);
        $data['inventory_saleproducts'] = $this->db->get('inventory_saleproducts')->result_array();
        $db_error = $this->db->error();
        if (! empty($db_error['code'])) {
            echo 'Database error! Error Code [' . $db_error['code'] . '] Error: ' . $db_error['message'];
            exit();
        }

        // pagination
        $config['base_url'] = site_url('admin/inventory_saleproducts/search');
        $this->db->reset_query();
        $this->db->like('id', $key, 'both');
        $this->db->or_like('quantity', $key, 'both');
        $this->db->or_like('discount', $key, 'both');
        $this->db->or_like('tax', $key, 'both');
        $this->db->or_like('date_added', $key, 'both');
        $this->db->or_like('slug', $key, 'both');
        $this->db->or_like('inventory_item_id', $key, 'both');
        $this->db->or_like('inventory_sale_id', $key, 'both');
        $this->db->or_like('utility_unit_id', $key, 'both');

        $config['total_rows'] = $this->db->from("inventory_saleproducts")->count_all_results();
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
        $data['_view'] = 'admin/inventory_saleproducts/index';
        $this->load->view('layouts/admin/body', $data);
    }

    /**
     * Export inventory_saleproducts
     *
     * @param $export_type -
     *            CSV or PDF type
     */
    function export($export_type = 'CSV')
    {
        if ($export_type == 'CSV') {
            // file name
            $filename = 'inventory_saleproducts_' . date('Ymd') . '.csv';
            header("Content-Description: File Transfer");
            header("Content-Disposition: attachment; filename=$filename");
            header("Content-Type: application/csv; ");
            // get data
            $this->db->order_by('id', 'desc');
            $inventory_saleproductsData = $this->Inventory_saleproducts_model->get_all_inventory_saleproducts();
            // file creation
            $file = fopen('php://output', 'w');
            $header = array(
                "Id",
                "Quantity",
                "Discount",
                "Tax",
                "Date Added",
                "Slug",
                "Inventory Item Id",
                "Inventory Sale Id",
                "Utility Unit Id"
            );
            fputcsv($file, $header);
            foreach ($inventory_saleproductsData as $key => $line) {
                fputcsv($file, $line);
            }
            fclose($file);
            exit();
        } else if ($export_type == 'Pdf') {
            $this->db->order_by('id', 'desc');
            $inventory_saleproducts = $this->db->get('inventory_saleproducts')->result_array();
            // get the HTML
            ob_start();
            include (APPPATH . 'views/admin/inventory_saleproducts/print_template.php');
            $html = ob_get_clean();
            require_once FCPATH . 'vendor/autoload.php';
            $mpdf = new \Mpdf\Mpdf();
            $mpdf->WriteHTML($html);
            $mpdf->Output();
            exit();
        }
    }
}
//End of Inventory_saleproducts controller