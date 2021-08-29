<?php

/**
 * Author: Amirul Momenin
 * Desc:Hr_rest_of_recreation Controller
 *
 */
class Hr_rest_of_recreation extends CI_Controller
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
        $this->load->model('Hr_rest_of_recreation_model');
        if (! $this->session->userdata('validated')) {
            redirect('admin/login/index');
        }
    }

    /**
     * Index Page for this controller.
     *
     * @param $start -
     *            Starting of hr_rest_of_recreation table's index to get query
     *            
     */
    function index($start = 0)
    {
        $limit = 10;
        $data['hr_rest_of_recreation'] = $this->Hr_rest_of_recreation_model->get_limit_hr_rest_of_recreation($limit, $start);
        // pagination
        $config['base_url'] = site_url('admin/hr_rest_of_recreation/index');
        $config['total_rows'] = $this->Hr_rest_of_recreation_model->get_count_hr_rest_of_recreation();
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

        $data['_view'] = 'admin/hr_rest_of_recreation/index';
        $this->load->view('layouts/admin/body', $data);
    }

    /**
     * Save hr_rest_of_recreation
     *
     * @param $id -
     *            primary key to update
     *            
     */
    function save($id = - 1)
    {
        $params = array(
            'hr_employee_id' => html_escape($this->input->post('hr_employee_id')),
            'date_from' => html_escape($this->input->post('date_from')),
            'coming_date' => html_escape($this->input->post('coming_date'))
        );

        $data['id'] = $id;
        // update
        if (isset($id) && $id > 0) {
            $data['hr_rest_of_recreation'] = $this->Hr_rest_of_recreation_model->get_hr_rest_of_recreation($id);
            if (isset($_POST) && count($_POST) > 0) {
                $this->Hr_rest_of_recreation_model->update_hr_rest_of_recreation($id, $params);
                $this->session->set_flashdata('msg', 'Hr_rest_of_recreation has been updated successfully');
                redirect('admin/hr_rest_of_recreation/index');
            } else {
                $data['_view'] = 'admin/hr_rest_of_recreation/form';
                $this->load->view('layouts/admin/body', $data);
            }
        } // save
        else {
            if (isset($_POST) && count($_POST) > 0) {
                $hr_rest_of_recreation_id = $this->Hr_rest_of_recreation_model->add_hr_rest_of_recreation($params);
                $this->session->set_flashdata('msg', 'Hr_rest_of_recreation has been saved successfully');
                redirect('admin/hr_rest_of_recreation/index');
            } else {
                $data['hr_rest_of_recreation'] = $this->Hr_rest_of_recreation_model->get_hr_rest_of_recreation(0);
                $data['_view'] = 'admin/hr_rest_of_recreation/form';
                $this->load->view('layouts/admin/body', $data);
            }
        }
    }

    /**
     * Details hr_rest_of_recreation
     *
     * @param $id -
     *            primary key to get record
     *            
     */
    function details($id)
    {
        $data['hr_rest_of_recreation'] = $this->Hr_rest_of_recreation_model->get_hr_rest_of_recreation($id);
        $data['id'] = $id;
        $data['_view'] = 'admin/hr_rest_of_recreation/details';
        $this->load->view('layouts/admin/body', $data);
    }

    /**
     * Deleting hr_rest_of_recreation
     *
     * @param $id -
     *            primary key to delete record
     *            
     */
    function remove($id)
    {
        $hr_rest_of_recreation = $this->Hr_rest_of_recreation_model->get_hr_rest_of_recreation($id);

        // check if the hr_rest_of_recreation exists before trying to delete it
        if (isset($hr_rest_of_recreation['id'])) {
            $this->Hr_rest_of_recreation_model->delete_hr_rest_of_recreation($id);
            $this->session->set_flashdata('msg', 'Hr_rest_of_recreation has been deleted successfully');
            redirect('admin/hr_rest_of_recreation/index');
        } else
            show_error('The hr_rest_of_recreation you are trying to delete does not exist.');
    }

    /**
     * Search hr_rest_of_recreation
     *
     * @param $start -
     *            Starting of hr_rest_of_recreation table's index to get query
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
        $this->db->or_like('hr_employee_id', $key, 'both');
        $this->db->or_like('date_from', $key, 'both');
        $this->db->or_like('coming_date', $key, 'both');

        $this->db->order_by('id', 'desc');

        $this->db->limit($limit, $start);
        $data['hr_rest_of_recreation'] = $this->db->get('hr_rest_of_recreation')->result_array();
        $db_error = $this->db->error();
        if (! empty($db_error['code'])) {
            echo 'Database error! Error Code [' . $db_error['code'] . '] Error: ' . $db_error['message'];
            exit();
        }

        // pagination
        $config['base_url'] = site_url('admin/hr_rest_of_recreation/search');
        $this->db->reset_query();
        $this->db->like('id', $key, 'both');
        $this->db->or_like('hr_employee_id', $key, 'both');
        $this->db->or_like('date_from', $key, 'both');
        $this->db->or_like('coming_date', $key, 'both');

        $config['total_rows'] = $this->db->from("hr_rest_of_recreation")->count_all_results();
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
        $data['_view'] = 'admin/hr_rest_of_recreation/index';
        $this->load->view('layouts/admin/body', $data);
    }

    /**
     * Export hr_rest_of_recreation
     *
     * @param $export_type -
     *            CSV or PDF type
     */
    function export($export_type = 'CSV')
    {
        if ($export_type == 'CSV') {
            // file name
            $filename = 'hr_rest_of_recreation_' . date('Ymd') . '.csv';
            header("Content-Description: File Transfer");
            header("Content-Disposition: attachment; filename=$filename");
            header("Content-Type: application/csv; ");
            // get data
            $this->db->order_by('id', 'desc');
            $hr_rest_of_recreationData = $this->Hr_rest_of_recreation_model->get_all_hr_rest_of_recreation();
            // file creation
            $file = fopen('php://output', 'w');
            $header = array(
                "Id",
                "Hr Employee Id",
                "Date From",
                "Coming Date"
            );
            fputcsv($file, $header);
            foreach ($hr_rest_of_recreationData as $key => $line) {
                fputcsv($file, $line);
            }
            fclose($file);
            exit();
        } else if ($export_type == 'Pdf') {
            $this->db->order_by('id', 'desc');
            $hr_rest_of_recreation = $this->db->get('hr_rest_of_recreation')->result_array();
            // get the HTML
            ob_start();
            include (APPPATH . 'views/admin/hr_rest_of_recreation/print_template.php');
            $html = ob_get_clean();
            require_once FCPATH . 'vendor/autoload.php';
            $mpdf = new \Mpdf\Mpdf();
            $mpdf->WriteHTML($html);
            $mpdf->Output();
            exit();
        }
    }
}
//End of Hr_rest_of_recreation controller