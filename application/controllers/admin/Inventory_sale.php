<?php

/**
 * Author: Amirul Momenin
 * Desc:Inventory_sale Controller
 *
 */
class Inventory_sale extends CI_Controller
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
        $this->load->model('Inventory_sale_model');
        if (! $this->session->userdata('validated')) {
            redirect('admin/login/index');
        }
    }

    /**
     * Index Page for this controller.
     *
     * @param $start -
     *            Starting of inventory_sale table's index to get query
     *            
     */
    function index($start = 0)
    {
        $limit = 10;
        $data['inventory_sale'] = $this->Inventory_sale_model->get_limit_inventory_sale($limit, $start);
        // pagination
        $config['base_url'] = site_url('admin/inventory_sale/index');
        $config['total_rows'] = $this->Inventory_sale_model->get_count_inventory_sale();
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

        $data['_view'] = 'admin/inventory_sale/index';
        $this->load->view('layouts/admin/body', $data);
    }

    /**
     * Save inventory_sale
     *
     * @param $id -
     *            primary key to update
     *            
     */
    function save($id = - 1)
    {
        $params = array(
            'created_on' => html_escape($this->input->post('created_on')),
            'modified_on' => html_escape($this->input->post('modified_on')),
            'status' => html_escape($this->input->post('status')),
            'crm_billingaddress_id' => html_escape($this->input->post('crm_billingaddress_id')),
            'created_by_users_id' => html_escape($this->input->post('created_by_users_id')),
            'crm_customer_id' => html_escape($this->input->post('crm_customer_id')),
            'modified_by_users_id' => html_escape($this->input->post('modified_by_users_id')),
            'crm_supplier_id' => html_escape($this->input->post('crm_supplier_id')),
            'crm_shippingaddress_id' => html_escape($this->input->post('crm_shippingaddress_id'))
        );

        $data['id'] = $id;
        // update
        if (isset($id) && $id > 0) {
            $data['inventory_sale'] = $this->Inventory_sale_model->get_inventory_sale($id);
            if (isset($_POST) && count($_POST) > 0) {
                $this->Inventory_sale_model->update_inventory_sale($id, $params);
                $this->session->set_flashdata('msg', 'Inventory_sale has been updated successfully');
                redirect('admin/inventory_sale/index');
            } else {
                $data['_view'] = 'admin/inventory_sale/form';
                $this->load->view('layouts/admin/body', $data);
            }
        } // save
        else {
            if (isset($_POST) && count($_POST) > 0) {
                $inventory_sale_id = $this->Inventory_sale_model->add_inventory_sale($params);
                $this->session->set_flashdata('msg', 'Inventory_sale has been saved successfully');
                redirect('admin/inventory_sale/index');
            } else {
                $data['inventory_sale'] = $this->Inventory_sale_model->get_inventory_sale(0);
                $data['_view'] = 'admin/inventory_sale/form';
                $this->load->view('layouts/admin/body', $data);
            }
        }
    }

    /**
     * Details inventory_sale
     *
     * @param $id -
     *            primary key to get record
     *            
     */
    function details($id)
    {
        $data['inventory_sale'] = $this->Inventory_sale_model->get_inventory_sale($id);
        $data['id'] = $id;
        $data['_view'] = 'admin/inventory_sale/details';
        $this->load->view('layouts/admin/body', $data);
    }

    /**
     * Deleting inventory_sale
     *
     * @param $id -
     *            primary key to delete record
     *            
     */
    function remove($id)
    {
        $inventory_sale = $this->Inventory_sale_model->get_inventory_sale($id);

        // check if the inventory_sale exists before trying to delete it
        if (isset($inventory_sale['id'])) {
            $this->Inventory_sale_model->delete_inventory_sale($id);
            $this->session->set_flashdata('msg', 'Inventory_sale has been deleted successfully');
            redirect('admin/inventory_sale/index');
        } else
            show_error('The inventory_sale you are trying to delete does not exist.');
    }

    /**
     * Search inventory_sale
     *
     * @param $start -
     *            Starting of inventory_sale table's index to get query
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
        $this->db->or_like('created_on', $key, 'both');
        $this->db->or_like('modified_on', $key, 'both');
        $this->db->or_like('status', $key, 'both');
        $this->db->or_like('crm_billingaddress_id', $key, 'both');
        $this->db->or_like('created_by_users_id', $key, 'both');
        $this->db->or_like('crm_customer_id', $key, 'both');
        $this->db->or_like('modified_by_users_id', $key, 'both');
        $this->db->or_like('crm_supplier_id', $key, 'both');
        $this->db->or_like('crm_shippingaddress_id', $key, 'both');

        $this->db->order_by('id', 'desc');

        $this->db->limit($limit, $start);
        $data['inventory_sale'] = $this->db->get('inventory_sale')->result_array();
        $db_error = $this->db->error();
        if (! empty($db_error['code'])) {
            echo 'Database error! Error Code [' . $db_error['code'] . '] Error: ' . $db_error['message'];
            exit();
        }

        // pagination
        $config['base_url'] = site_url('admin/inventory_sale/search');
        $this->db->reset_query();
        $this->db->like('id', $key, 'both');
        $this->db->or_like('created_on', $key, 'both');
        $this->db->or_like('modified_on', $key, 'both');
        $this->db->or_like('status', $key, 'both');
        $this->db->or_like('crm_billingaddress_id', $key, 'both');
        $this->db->or_like('created_by_users_id', $key, 'both');
        $this->db->or_like('crm_customer_id', $key, 'both');
        $this->db->or_like('modified_by_users_id', $key, 'both');
        $this->db->or_like('crm_supplier_id', $key, 'both');
        $this->db->or_like('crm_shippingaddress_id', $key, 'both');

        $config['total_rows'] = $this->db->from("inventory_sale")->count_all_results();
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
        $data['_view'] = 'admin/inventory_sale/index';
        $this->load->view('layouts/admin/body', $data);
    }

    /**
     * Export inventory_sale
     *
     * @param $export_type -
     *            CSV or PDF type
     */
    function export($export_type = 'CSV')
    {
        if ($export_type == 'CSV') {
            // file name
            $filename = 'inventory_sale_' . date('Ymd') . '.csv';
            header("Content-Description: File Transfer");
            header("Content-Disposition: attachment; filename=$filename");
            header("Content-Type: application/csv; ");
            // get data
            $this->db->order_by('id', 'desc');
            $inventory_saleData = $this->Inventory_sale_model->get_all_inventory_sale();
            // file creation
            $file = fopen('php://output', 'w');
            $header = array(
                "Id",
                "Created On",
                "Modified On",
                "Status",
                "Crm Billingaddress Id",
                "Created By Users Id",
                "Crm Customer Id",
                "Modified By Users Id",
                "Crm Supplier Id",
                "Crm Shippingaddress Id"
            );
            fputcsv($file, $header);
            foreach ($inventory_saleData as $key => $line) {
                fputcsv($file, $line);
            }
            fclose($file);
            exit();
        } else if ($export_type == 'Pdf') {
            $this->db->order_by('id', 'desc');
            $inventory_sale = $this->db->get('inventory_sale')->result_array();
            // get the HTML
            ob_start();
            include (APPPATH . 'views/admin/inventory_sale/print_template.php');
            $html = ob_get_clean();
            require_once FCPATH . 'vendor/autoload.php';
            $mpdf = new \Mpdf\Mpdf();
            $mpdf->WriteHTML($html);
            $mpdf->Output();
            exit();
        }
    }
}
//End of Inventory_sale controller