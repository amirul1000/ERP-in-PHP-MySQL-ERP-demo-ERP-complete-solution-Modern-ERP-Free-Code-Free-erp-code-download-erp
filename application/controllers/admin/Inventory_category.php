<?php

/**
 * Author: Amirul Momenin
 * Desc:Inventory_category Controller
 *
 */
class Inventory_category extends CI_Controller
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
        $this->load->model('Inventory_category_model');
        if (! $this->session->userdata('validated')) {
            redirect('admin/login/index');
        }
    }

    /**
     * Index Page for this controller.
     *
     * @param $start -
     *            Starting of inventory_category table's index to get query
     *            
     */
    function index($start = 0)
    {
        $limit = 10;
        $data['inventory_category'] = $this->Inventory_category_model->get_limit_inventory_category($limit, $start);
        // pagination
        $config['base_url'] = site_url('admin/inventory_category/index');
        $config['total_rows'] = $this->Inventory_category_model->get_count_inventory_category();
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

        $data['_view'] = 'admin/inventory_category/index';
        $this->load->view('layouts/admin/body', $data);
    }

    /**
     * Save inventory_category
     *
     * @param $id -
     *            primary key to update
     *            
     */
    function save($id = - 1)
    {
        $params = array(
            'description' => html_escape($this->input->post('description')),
            'slug' => html_escape($this->input->post('slug')),
            'name' => html_escape($this->input->post('name')),
            'parent_inventory_category_id' => html_escape($this->input->post('parent_inventory_category_id'))
        );

        $data['id'] = $id;
        // update
        if (isset($id) && $id > 0) {
            $data['inventory_category'] = $this->Inventory_category_model->get_inventory_category($id);
            if (isset($_POST) && count($_POST) > 0) {
                $this->Inventory_category_model->update_inventory_category($id, $params);
                $this->session->set_flashdata('msg', 'Inventory_category has been updated successfully');
                redirect('admin/inventory_category/index');
            } else {
                $data['_view'] = 'admin/inventory_category/form';
                $this->load->view('layouts/admin/body', $data);
            }
        } // save
        else {
            if (isset($_POST) && count($_POST) > 0) {
                $inventory_category_id = $this->Inventory_category_model->add_inventory_category($params);
                $this->session->set_flashdata('msg', 'Inventory_category has been saved successfully');
                redirect('admin/inventory_category/index');
            } else {
                $data['inventory_category'] = $this->Inventory_category_model->get_inventory_category(0);
                $data['_view'] = 'admin/inventory_category/form';
                $this->load->view('layouts/admin/body', $data);
            }
        }
    }

    /**
     * Details inventory_category
     *
     * @param $id -
     *            primary key to get record
     *            
     */
    function details($id)
    {
        $data['inventory_category'] = $this->Inventory_category_model->get_inventory_category($id);
        $data['id'] = $id;
        $data['_view'] = 'admin/inventory_category/details';
        $this->load->view('layouts/admin/body', $data);
    }

    /**
     * Deleting inventory_category
     *
     * @param $id -
     *            primary key to delete record
     *            
     */
    function remove($id)
    {
        $inventory_category = $this->Inventory_category_model->get_inventory_category($id);

        // check if the inventory_category exists before trying to delete it
        if (isset($inventory_category['id'])) {
            $this->Inventory_category_model->delete_inventory_category($id);
            $this->session->set_flashdata('msg', 'Inventory_category has been deleted successfully');
            redirect('admin/inventory_category/index');
        } else
            show_error('The inventory_category you are trying to delete does not exist.');
    }

    /**
     * Search inventory_category
     *
     * @param $start -
     *            Starting of inventory_category table's index to get query
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
        $this->db->or_like('description', $key, 'both');
        $this->db->or_like('slug', $key, 'both');
        $this->db->or_like('name', $key, 'both');
        $this->db->or_like('parent_inventory_category_id', $key, 'both');

        $this->db->order_by('id', 'desc');

        $this->db->limit($limit, $start);
        $data['inventory_category'] = $this->db->get('inventory_category')->result_array();
        $db_error = $this->db->error();
        if (! empty($db_error['code'])) {
            echo 'Database error! Error Code [' . $db_error['code'] . '] Error: ' . $db_error['message'];
            exit();
        }

        // pagination
        $config['base_url'] = site_url('admin/inventory_category/search');
        $this->db->reset_query();
        $this->db->like('id', $key, 'both');
        $this->db->or_like('description', $key, 'both');
        $this->db->or_like('slug', $key, 'both');
        $this->db->or_like('name', $key, 'both');
        $this->db->or_like('parent_inventory_category_id', $key, 'both');

        $config['total_rows'] = $this->db->from("inventory_category")->count_all_results();
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
        $data['_view'] = 'admin/inventory_category/index';
        $this->load->view('layouts/admin/body', $data);
    }

    /**
     * Export inventory_category
     *
     * @param $export_type -
     *            CSV or PDF type
     */
    function export($export_type = 'CSV')
    {
        if ($export_type == 'CSV') {
            // file name
            $filename = 'inventory_category_' . date('Ymd') . '.csv';
            header("Content-Description: File Transfer");
            header("Content-Disposition: attachment; filename=$filename");
            header("Content-Type: application/csv; ");
            // get data
            $this->db->order_by('id', 'desc');
            $inventory_categoryData = $this->Inventory_category_model->get_all_inventory_category();
            // file creation
            $file = fopen('php://output', 'w');
            $header = array(
                "Id",
                "Description",
                "Slug",
                "Name",
                "Parent Inventory Category Id"
            );
            fputcsv($file, $header);
            foreach ($inventory_categoryData as $key => $line) {
                fputcsv($file, $line);
            }
            fclose($file);
            exit();
        } else if ($export_type == 'Pdf') {
            $this->db->order_by('id', 'desc');
            $inventory_category = $this->db->get('inventory_category')->result_array();
            // get the HTML
            ob_start();
            include (APPPATH . 'views/admin/inventory_category/print_template.php');
            $html = ob_get_clean();
            require_once FCPATH . 'vendor/autoload.php';
            $mpdf = new \Mpdf\Mpdf();
            $mpdf->WriteHTML($html);
            $mpdf->Output();
            exit();
        }
    }
}
//End of Inventory_category controller