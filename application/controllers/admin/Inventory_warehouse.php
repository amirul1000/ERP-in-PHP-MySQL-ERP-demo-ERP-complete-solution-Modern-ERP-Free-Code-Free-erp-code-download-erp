<?php

/**
 * Author: Amirul Momenin
 * Desc:Inventory_warehouse Controller
 *
 */
class Inventory_warehouse extends CI_Controller
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
        $this->load->model('Inventory_warehouse_model');
        if (! $this->session->userdata('validated')) {
            redirect('admin/login/index');
        }
    }

    /**
     * Index Page for this controller.
     *
     * @param $start -
     *            Starting of inventory_warehouse table's index to get query
     *            
     */
    function index($start = 0)
    {
        $limit = 10;
        $data['inventory_warehouse'] = $this->Inventory_warehouse_model->get_limit_inventory_warehouse($limit, $start);
        // pagination
        $config['base_url'] = site_url('admin/inventory_warehouse/index');
        $config['total_rows'] = $this->Inventory_warehouse_model->get_count_inventory_warehouse();
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

        $data['_view'] = 'admin/inventory_warehouse/index';
        $this->load->view('layouts/admin/body', $data);
    }

    /**
     * Save inventory_warehouse
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
            'code' => html_escape($this->input->post('code')),
            'name' => html_escape($this->input->post('name')),
            'location' => html_escape($this->input->post('location')),
            'date_start' => html_escape($this->input->post('date_start')),
            'date_end' => html_escape($this->input->post('date_end')),
            'status' => html_escape($this->input->post('status')),
            'created_by_users_id' => html_escape($this->input->post('created_by_users_id')),
            'modified_by_users_id' => html_escape($this->input->post('modified_by_users_id'))
        );

        $data['id'] = $id;
        // update
        if (isset($id) && $id > 0) {
            $data['inventory_warehouse'] = $this->Inventory_warehouse_model->get_inventory_warehouse($id);
            if (isset($_POST) && count($_POST) > 0) {
                $this->Inventory_warehouse_model->update_inventory_warehouse($id, $params);
                $this->session->set_flashdata('msg', 'Inventory_warehouse has been updated successfully');
                redirect('admin/inventory_warehouse/index');
            } else {
                $data['_view'] = 'admin/inventory_warehouse/form';
                $this->load->view('layouts/admin/body', $data);
            }
        } // save
        else {
            if (isset($_POST) && count($_POST) > 0) {
                $inventory_warehouse_id = $this->Inventory_warehouse_model->add_inventory_warehouse($params);
                $this->session->set_flashdata('msg', 'Inventory_warehouse has been saved successfully');
                redirect('admin/inventory_warehouse/index');
            } else {
                $data['inventory_warehouse'] = $this->Inventory_warehouse_model->get_inventory_warehouse(0);
                $data['_view'] = 'admin/inventory_warehouse/form';
                $this->load->view('layouts/admin/body', $data);
            }
        }
    }

    /**
     * Details inventory_warehouse
     *
     * @param $id -
     *            primary key to get record
     *            
     */
    function details($id)
    {
        $data['inventory_warehouse'] = $this->Inventory_warehouse_model->get_inventory_warehouse($id);
        $data['id'] = $id;
        $data['_view'] = 'admin/inventory_warehouse/details';
        $this->load->view('layouts/admin/body', $data);
    }

    /**
     * Deleting inventory_warehouse
     *
     * @param $id -
     *            primary key to delete record
     *            
     */
    function remove($id)
    {
        $inventory_warehouse = $this->Inventory_warehouse_model->get_inventory_warehouse($id);

        // check if the inventory_warehouse exists before trying to delete it
        if (isset($inventory_warehouse['id'])) {
            $this->Inventory_warehouse_model->delete_inventory_warehouse($id);
            $this->session->set_flashdata('msg', 'Inventory_warehouse has been deleted successfully');
            redirect('admin/inventory_warehouse/index');
        } else
            show_error('The inventory_warehouse you are trying to delete does not exist.');
    }

    /**
     * Search inventory_warehouse
     *
     * @param $start -
     *            Starting of inventory_warehouse table's index to get query
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
        $this->db->or_like('code', $key, 'both');
        $this->db->or_like('name', $key, 'both');
        $this->db->or_like('location', $key, 'both');
        $this->db->or_like('date_start', $key, 'both');
        $this->db->or_like('date_end', $key, 'both');
        $this->db->or_like('status', $key, 'both');
        $this->db->or_like('created_by_users_id', $key, 'both');
        $this->db->or_like('modified_by_users_id', $key, 'both');

        $this->db->order_by('id', 'desc');

        $this->db->limit($limit, $start);
        $data['inventory_warehouse'] = $this->db->get('inventory_warehouse')->result_array();
        $db_error = $this->db->error();
        if (! empty($db_error['code'])) {
            echo 'Database error! Error Code [' . $db_error['code'] . '] Error: ' . $db_error['message'];
            exit();
        }

        // pagination
        $config['base_url'] = site_url('admin/inventory_warehouse/search');
        $this->db->reset_query();
        $this->db->like('id', $key, 'both');
        $this->db->or_like('created_on', $key, 'both');
        $this->db->or_like('modified_on', $key, 'both');
        $this->db->or_like('code', $key, 'both');
        $this->db->or_like('name', $key, 'both');
        $this->db->or_like('location', $key, 'both');
        $this->db->or_like('date_start', $key, 'both');
        $this->db->or_like('date_end', $key, 'both');
        $this->db->or_like('status', $key, 'both');
        $this->db->or_like('created_by_users_id', $key, 'both');
        $this->db->or_like('modified_by_users_id', $key, 'both');

        $config['total_rows'] = $this->db->from("inventory_warehouse")->count_all_results();
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
        $data['_view'] = 'admin/inventory_warehouse/index';
        $this->load->view('layouts/admin/body', $data);
    }

    /**
     * Export inventory_warehouse
     *
     * @param $export_type -
     *            CSV or PDF type
     */
    function export($export_type = 'CSV')
    {
        if ($export_type == 'CSV') {
            // file name
            $filename = 'inventory_warehouse_' . date('Ymd') . '.csv';
            header("Content-Description: File Transfer");
            header("Content-Disposition: attachment; filename=$filename");
            header("Content-Type: application/csv; ");
            // get data
            $this->db->order_by('id', 'desc');
            $inventory_warehouseData = $this->Inventory_warehouse_model->get_all_inventory_warehouse();
            // file creation
            $file = fopen('php://output', 'w');
            $header = array(
                "Id",
                "Created On",
                "Modified On",
                "Code",
                "Name",
                "Location",
                "Date Start",
                "Date End",
                "Status",
                "Created By Users Id",
                "Modified By Users Id"
            );
            fputcsv($file, $header);
            foreach ($inventory_warehouseData as $key => $line) {
                fputcsv($file, $line);
            }
            fclose($file);
            exit();
        } else if ($export_type == 'Pdf') {
            $this->db->order_by('id', 'desc');
            $inventory_warehouse = $this->db->get('inventory_warehouse')->result_array();
            // get the HTML
            ob_start();
            include (APPPATH . 'views/admin/inventory_warehouse/print_template.php');
            $html = ob_get_clean();
            require_once FCPATH . 'vendor/autoload.php';
            $mpdf = new \Mpdf\Mpdf();
            $mpdf->WriteHTML($html);
            $mpdf->Output();
            exit();
        }
    }
}
//End of Inventory_warehouse controller