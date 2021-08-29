<?php

/**
 * Author: Amirul Momenin
 * Desc:Utility_unit Controller
 *
 */
class Utility_unit extends CI_Controller
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
        $this->load->model('Utility_unit_model');
        if (! $this->session->userdata('validated')) {
            redirect('admin/login/index');
        }
    }

    /**
     * Index Page for this controller.
     *
     * @param $start -
     *            Starting of utility_unit table's index to get query
     *            
     */
    function index($start = 0)
    {
        $limit = 10;
        $data['utility_unit'] = $this->Utility_unit_model->get_limit_utility_unit($limit, $start);
        // pagination
        $config['base_url'] = site_url('admin/utility_unit/index');
        $config['total_rows'] = $this->Utility_unit_model->get_count_utility_unit();
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

        $data['_view'] = 'admin/utility_unit/index';
        $this->load->view('layouts/admin/body', $data);
    }

    /**
     * Save utility_unit
     *
     * @param $id -
     *            primary key to update
     *            
     */
    function save($id = - 1)
    {
        $params = array(
            'name' => html_escape($this->input->post('name')),
            'description' => html_escape($this->input->post('description'))
        );

        $data['id'] = $id;
        // update
        if (isset($id) && $id > 0) {
            $data['utility_unit'] = $this->Utility_unit_model->get_utility_unit($id);
            if (isset($_POST) && count($_POST) > 0) {
                $this->Utility_unit_model->update_utility_unit($id, $params);
                $this->session->set_flashdata('msg', 'Utility_unit has been updated successfully');
                redirect('admin/utility_unit/index');
            } else {
                $data['_view'] = 'admin/utility_unit/form';
                $this->load->view('layouts/admin/body', $data);
            }
        } // save
        else {
            if (isset($_POST) && count($_POST) > 0) {
                $utility_unit_id = $this->Utility_unit_model->add_utility_unit($params);
                $this->session->set_flashdata('msg', 'Utility_unit has been saved successfully');
                redirect('admin/utility_unit/index');
            } else {
                $data['utility_unit'] = $this->Utility_unit_model->get_utility_unit(0);
                $data['_view'] = 'admin/utility_unit/form';
                $this->load->view('layouts/admin/body', $data);
            }
        }
    }

    /**
     * Details utility_unit
     *
     * @param $id -
     *            primary key to get record
     *            
     */
    function details($id)
    {
        $data['utility_unit'] = $this->Utility_unit_model->get_utility_unit($id);
        $data['id'] = $id;
        $data['_view'] = 'admin/utility_unit/details';
        $this->load->view('layouts/admin/body', $data);
    }

    /**
     * Deleting utility_unit
     *
     * @param $id -
     *            primary key to delete record
     *            
     */
    function remove($id)
    {
        $utility_unit = $this->Utility_unit_model->get_utility_unit($id);

        // check if the utility_unit exists before trying to delete it
        if (isset($utility_unit['id'])) {
            $this->Utility_unit_model->delete_utility_unit($id);
            $this->session->set_flashdata('msg', 'Utility_unit has been deleted successfully');
            redirect('admin/utility_unit/index');
        } else
            show_error('The utility_unit you are trying to delete does not exist.');
    }

    /**
     * Search utility_unit
     *
     * @param $start -
     *            Starting of utility_unit table's index to get query
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
        $this->db->or_like('description', $key, 'both');

        $this->db->order_by('id', 'desc');

        $this->db->limit($limit, $start);
        $data['utility_unit'] = $this->db->get('utility_unit')->result_array();
        $db_error = $this->db->error();
        if (! empty($db_error['code'])) {
            echo 'Database error! Error Code [' . $db_error['code'] . '] Error: ' . $db_error['message'];
            exit();
        }

        // pagination
        $config['base_url'] = site_url('admin/utility_unit/search');
        $this->db->reset_query();
        $this->db->like('id', $key, 'both');
        $this->db->or_like('name', $key, 'both');
        $this->db->or_like('description', $key, 'both');

        $config['total_rows'] = $this->db->from("utility_unit")->count_all_results();
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
        $data['_view'] = 'admin/utility_unit/index';
        $this->load->view('layouts/admin/body', $data);
    }

    /**
     * Export utility_unit
     *
     * @param $export_type -
     *            CSV or PDF type
     */
    function export($export_type = 'CSV')
    {
        if ($export_type == 'CSV') {
            // file name
            $filename = 'utility_unit_' . date('Ymd') . '.csv';
            header("Content-Description: File Transfer");
            header("Content-Disposition: attachment; filename=$filename");
            header("Content-Type: application/csv; ");
            // get data
            $this->db->order_by('id', 'desc');
            $utility_unitData = $this->Utility_unit_model->get_all_utility_unit();
            // file creation
            $file = fopen('php://output', 'w');
            $header = array(
                "Id",
                "Name",
                "Description"
            );
            fputcsv($file, $header);
            foreach ($utility_unitData as $key => $line) {
                fputcsv($file, $line);
            }
            fclose($file);
            exit();
        } else if ($export_type == 'Pdf') {
            $this->db->order_by('id', 'desc');
            $utility_unit = $this->db->get('utility_unit')->result_array();
            // get the HTML
            ob_start();
            include (APPPATH . 'views/admin/utility_unit/print_template.php');
            $html = ob_get_clean();
            require_once FCPATH . 'vendor/autoload.php';
            $mpdf = new \Mpdf\Mpdf();
            $mpdf->WriteHTML($html);
            $mpdf->Output();
            exit();
        }
    }
}
//End of Utility_unit controller