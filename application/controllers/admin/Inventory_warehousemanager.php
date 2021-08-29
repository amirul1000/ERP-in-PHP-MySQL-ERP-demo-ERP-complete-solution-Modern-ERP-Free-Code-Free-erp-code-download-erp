<?php

/**
 * Author: Amirul Momenin
 * Desc:Inventory_warehousemanager Controller
 *
 */
class Inventory_warehousemanager extends CI_Controller
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
        $this->load->model('Inventory_warehousemanager_model');
        if (! $this->session->userdata('validated')) {
            redirect('admin/login/index');
        }
    }

    /**
     * Index Page for this controller.
     *
     * @param $start -
     *            Starting of inventory_warehousemanager table's index to get query
     *            
     */
    function index($start = 0)
    {
        $limit = 10;
        $data['inventory_warehousemanager'] = $this->Inventory_warehousemanager_model->get_limit_inventory_warehousemanager($limit, $start);
        // pagination
        $config['base_url'] = site_url('admin/inventory_warehousemanager/index');
        $config['total_rows'] = $this->Inventory_warehousemanager_model->get_count_inventory_warehousemanager();
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

        $data['_view'] = 'admin/inventory_warehousemanager/index';
        $this->load->view('layouts/admin/body', $data);
    }

    /**
     * Save inventory_warehousemanager
     *
     * @param $id -
     *            primary key to update
     *            
     */
    function save($id = - 1)
    {
        $params = array(
            'appointed_date' => html_escape($this->input->post('appointed_date')),
            'date_end' => html_escape($this->input->post('date_end')),
            'status' => html_escape($this->input->post('status')),
            'manager_hr_employee_id' => html_escape($this->input->post('manager_hr_employee_id')),
            'inventory_warehouse_id' => html_escape($this->input->post('inventory_warehouse_id'))
        );

        $data['id'] = $id;
        // update
        if (isset($id) && $id > 0) {
            $data['inventory_warehousemanager'] = $this->Inventory_warehousemanager_model->get_inventory_warehousemanager($id);
            if (isset($_POST) && count($_POST) > 0) {
                $this->Inventory_warehousemanager_model->update_inventory_warehousemanager($id, $params);
                $this->session->set_flashdata('msg', 'Inventory_warehousemanager has been updated successfully');
                redirect('admin/inventory_warehousemanager/index');
            } else {
                $data['_view'] = 'admin/inventory_warehousemanager/form';
                $this->load->view('layouts/admin/body', $data);
            }
        } // save
        else {
            if (isset($_POST) && count($_POST) > 0) {
                $inventory_warehousemanager_id = $this->Inventory_warehousemanager_model->add_inventory_warehousemanager($params);
                $this->session->set_flashdata('msg', 'Inventory_warehousemanager has been saved successfully');
                redirect('admin/inventory_warehousemanager/index');
            } else {
                $data['inventory_warehousemanager'] = $this->Inventory_warehousemanager_model->get_inventory_warehousemanager(0);
                $data['_view'] = 'admin/inventory_warehousemanager/form';
                $this->load->view('layouts/admin/body', $data);
            }
        }
    }

    /**
     * Details inventory_warehousemanager
     *
     * @param $id -
     *            primary key to get record
     *            
     */
    function details($id)
    {
        $data['inventory_warehousemanager'] = $this->Inventory_warehousemanager_model->get_inventory_warehousemanager($id);
        $data['id'] = $id;
        $data['_view'] = 'admin/inventory_warehousemanager/details';
        $this->load->view('layouts/admin/body', $data);
    }

    /**
     * Deleting inventory_warehousemanager
     *
     * @param $id -
     *            primary key to delete record
     *            
     */
    function remove($id)
    {
        $inventory_warehousemanager = $this->Inventory_warehousemanager_model->get_inventory_warehousemanager($id);

        // check if the inventory_warehousemanager exists before trying to delete it
        if (isset($inventory_warehousemanager['id'])) {
            $this->Inventory_warehousemanager_model->delete_inventory_warehousemanager($id);
            $this->session->set_flashdata('msg', 'Inventory_warehousemanager has been deleted successfully');
            redirect('admin/inventory_warehousemanager/index');
        } else
            show_error('The inventory_warehousemanager you are trying to delete does not exist.');
    }

    /**
     * Search inventory_warehousemanager
     *
     * @param $start -
     *            Starting of inventory_warehousemanager table's index to get query
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
        $this->db->or_like('appointed_date', $key, 'both');
        $this->db->or_like('date_end', $key, 'both');
        $this->db->or_like('status', $key, 'both');
        $this->db->or_like('manager_hr_employee_id', $key, 'both');
        $this->db->or_like('inventory_warehouse_id', $key, 'both');

        $this->db->order_by('id', 'desc');

        $this->db->limit($limit, $start);
        $data['inventory_warehousemanager'] = $this->db->get('inventory_warehousemanager')->result_array();
        $db_error = $this->db->error();
        if (! empty($db_error['code'])) {
            echo 'Database error! Error Code [' . $db_error['code'] . '] Error: ' . $db_error['message'];
            exit();
        }

        // pagination
        $config['base_url'] = site_url('admin/inventory_warehousemanager/search');
        $this->db->reset_query();
        $this->db->like('id', $key, 'both');
        $this->db->or_like('appointed_date', $key, 'both');
        $this->db->or_like('date_end', $key, 'both');
        $this->db->or_like('status', $key, 'both');
        $this->db->or_like('manager_hr_employee_id', $key, 'both');
        $this->db->or_like('inventory_warehouse_id', $key, 'both');

        $config['total_rows'] = $this->db->from("inventory_warehousemanager")->count_all_results();
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
        $data['_view'] = 'admin/inventory_warehousemanager/index';
        $this->load->view('layouts/admin/body', $data);
    }

    /**
     * Export inventory_warehousemanager
     *
     * @param $export_type -
     *            CSV or PDF type
     */
    function export($export_type = 'CSV')
    {
        if ($export_type == 'CSV') {
            // file name
            $filename = 'inventory_warehousemanager_' . date('Ymd') . '.csv';
            header("Content-Description: File Transfer");
            header("Content-Disposition: attachment; filename=$filename");
            header("Content-Type: application/csv; ");
            // get data
            $this->db->order_by('id', 'desc');
            $inventory_warehousemanagerData = $this->Inventory_warehousemanager_model->get_all_inventory_warehousemanager();
            // file creation
            $file = fopen('php://output', 'w');
            $header = array(
                "Id",
                "Appointed Date",
                "Date End",
                "Status",
                "Manager Hr Employee Id",
                "Inventory Warehouse Id"
            );
            fputcsv($file, $header);
            foreach ($inventory_warehousemanagerData as $key => $line) {
                fputcsv($file, $line);
            }
            fclose($file);
            exit();
        } else if ($export_type == 'Pdf') {
            $this->db->order_by('id', 'desc');
            $inventory_warehousemanager = $this->db->get('inventory_warehousemanager')->result_array();
            // get the HTML
            ob_start();
            include (APPPATH . 'views/admin/inventory_warehousemanager/print_template.php');
            $html = ob_get_clean();
            require_once FCPATH . 'vendor/autoload.php';
            $mpdf = new \Mpdf\Mpdf();
            $mpdf->WriteHTML($html);
            $mpdf->Output();
            exit();
        }
    }
}
//End of Inventory_warehousemanager controller