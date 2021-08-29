<?php

/**
 * Author: Amirul Momenin
 * Desc:Hr_servicehistory Controller
 *
 */
class Hr_servicehistory extends CI_Controller
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
        $this->load->model('Hr_servicehistory_model');
        if (! $this->session->userdata('validated')) {
            redirect('admin/login/index');
        }
    }

    /**
     * Index Page for this controller.
     *
     * @param $start -
     *            Starting of hr_servicehistory table's index to get query
     *            
     */
    function index($start = 0)
    {
        $limit = 10;
        $data['hr_servicehistory'] = $this->Hr_servicehistory_model->get_limit_hr_servicehistory($limit, $start);
        // pagination
        $config['base_url'] = site_url('admin/hr_servicehistory/index');
        $config['total_rows'] = $this->Hr_servicehistory_model->get_count_hr_servicehistory();
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

        $data['_view'] = 'admin/hr_servicehistory/index';
        $this->load->view('layouts/admin/body', $data);
    }

    /**
     * Save hr_servicehistory
     *
     * @param $id -
     *            primary key to update
     *            
     */
    function save($id = - 1)
    {
        $params = array(
            'hr_employee_id' => html_escape($this->input->post('hr_employee_id')),
            'designation' => html_escape($this->input->post('designation')),
            'office_name' => html_escape($this->input->post('office_name')),
            'section' => html_escape($this->input->post('section')),
            'date_from' => html_escape($this->input->post('date_from'))
        );

        $data['id'] = $id;
        // update
        if (isset($id) && $id > 0) {
            $data['hr_servicehistory'] = $this->Hr_servicehistory_model->get_hr_servicehistory($id);
            if (isset($_POST) && count($_POST) > 0) {
                $this->Hr_servicehistory_model->update_hr_servicehistory($id, $params);
                $this->session->set_flashdata('msg', 'Hr_servicehistory has been updated successfully');
                redirect('admin/hr_servicehistory/index');
            } else {
                $data['_view'] = 'admin/hr_servicehistory/form';
                $this->load->view('layouts/admin/body', $data);
            }
        } // save
        else {
            if (isset($_POST) && count($_POST) > 0) {
                $hr_servicehistory_id = $this->Hr_servicehistory_model->add_hr_servicehistory($params);
                $this->session->set_flashdata('msg', 'Hr_servicehistory has been saved successfully');
                redirect('admin/hr_servicehistory/index');
            } else {
                $data['hr_servicehistory'] = $this->Hr_servicehistory_model->get_hr_servicehistory(0);
                $data['_view'] = 'admin/hr_servicehistory/form';
                $this->load->view('layouts/admin/body', $data);
            }
        }
    }

    /**
     * Details hr_servicehistory
     *
     * @param $id -
     *            primary key to get record
     *            
     */
    function details($id)
    {
        $data['hr_servicehistory'] = $this->Hr_servicehistory_model->get_hr_servicehistory($id);
        $data['id'] = $id;
        $data['_view'] = 'admin/hr_servicehistory/details';
        $this->load->view('layouts/admin/body', $data);
    }

    /**
     * Deleting hr_servicehistory
     *
     * @param $id -
     *            primary key to delete record
     *            
     */
    function remove($id)
    {
        $hr_servicehistory = $this->Hr_servicehistory_model->get_hr_servicehistory($id);

        // check if the hr_servicehistory exists before trying to delete it
        if (isset($hr_servicehistory['id'])) {
            $this->Hr_servicehistory_model->delete_hr_servicehistory($id);
            $this->session->set_flashdata('msg', 'Hr_servicehistory has been deleted successfully');
            redirect('admin/hr_servicehistory/index');
        } else
            show_error('The hr_servicehistory you are trying to delete does not exist.');
    }

    /**
     * Search hr_servicehistory
     *
     * @param $start -
     *            Starting of hr_servicehistory table's index to get query
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
        $this->db->or_like('designation', $key, 'both');
        $this->db->or_like('office_name', $key, 'both');
        $this->db->or_like('section', $key, 'both');
        $this->db->or_like('date_from', $key, 'both');

        $this->db->order_by('id', 'desc');

        $this->db->limit($limit, $start);
        $data['hr_servicehistory'] = $this->db->get('hr_servicehistory')->result_array();
        $db_error = $this->db->error();
        if (! empty($db_error['code'])) {
            echo 'Database error! Error Code [' . $db_error['code'] . '] Error: ' . $db_error['message'];
            exit();
        }

        // pagination
        $config['base_url'] = site_url('admin/hr_servicehistory/search');
        $this->db->reset_query();
        $this->db->like('id', $key, 'both');
        $this->db->or_like('hr_employee_id', $key, 'both');
        $this->db->or_like('designation', $key, 'both');
        $this->db->or_like('office_name', $key, 'both');
        $this->db->or_like('section', $key, 'both');
        $this->db->or_like('date_from', $key, 'both');

        $config['total_rows'] = $this->db->from("hr_servicehistory")->count_all_results();
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
        $data['_view'] = 'admin/hr_servicehistory/index';
        $this->load->view('layouts/admin/body', $data);
    }

    /**
     * Export hr_servicehistory
     *
     * @param $export_type -
     *            CSV or PDF type
     */
    function export($export_type = 'CSV')
    {
        if ($export_type == 'CSV') {
            // file name
            $filename = 'hr_servicehistory_' . date('Ymd') . '.csv';
            header("Content-Description: File Transfer");
            header("Content-Disposition: attachment; filename=$filename");
            header("Content-Type: application/csv; ");
            // get data
            $this->db->order_by('id', 'desc');
            $hr_servicehistoryData = $this->Hr_servicehistory_model->get_all_hr_servicehistory();
            // file creation
            $file = fopen('php://output', 'w');
            $header = array(
                "Id",
                "Hr Employee Id",
                "Designation",
                "Office Name",
                "Section",
                "Date From"
            );
            fputcsv($file, $header);
            foreach ($hr_servicehistoryData as $key => $line) {
                fputcsv($file, $line);
            }
            fclose($file);
            exit();
        } else if ($export_type == 'Pdf') {
            $this->db->order_by('id', 'desc');
            $hr_servicehistory = $this->db->get('hr_servicehistory')->result_array();
            // get the HTML
            ob_start();
            include (APPPATH . 'views/admin/hr_servicehistory/print_template.php');
            $html = ob_get_clean();
            require_once FCPATH . 'vendor/autoload.php';
            $mpdf = new \Mpdf\Mpdf();
            $mpdf->WriteHTML($html);
            $mpdf->Output();
            exit();
        }
    }
}
//End of Hr_servicehistory controller