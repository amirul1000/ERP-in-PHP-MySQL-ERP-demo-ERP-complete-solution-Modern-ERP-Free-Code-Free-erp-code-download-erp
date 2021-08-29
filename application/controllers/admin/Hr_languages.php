<?php

/**
 * Author: Amirul Momenin
 * Desc:Hr_languages Controller
 *
 */
class Hr_languages extends CI_Controller
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
        $this->load->model('Hr_languages_model');
        if (! $this->session->userdata('validated')) {
            redirect('admin/login/index');
        }
    }

    /**
     * Index Page for this controller.
     *
     * @param $start -
     *            Starting of hr_languages table's index to get query
     *            
     */
    function index($start = 0)
    {
        $limit = 10;
        $data['hr_languages'] = $this->Hr_languages_model->get_limit_hr_languages($limit, $start);
        // pagination
        $config['base_url'] = site_url('admin/hr_languages/index');
        $config['total_rows'] = $this->Hr_languages_model->get_count_hr_languages();
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

        $data['_view'] = 'admin/hr_languages/index';
        $this->load->view('layouts/admin/body', $data);
    }

    /**
     * Save hr_languages
     *
     * @param $id -
     *            primary key to update
     *            
     */
    function save($id = - 1)
    {
        $params = array(
            'hr_employee_id' => html_escape($this->input->post('hr_employee_id')),
            'languages' => html_escape($this->input->post('languages')),
            'read' => html_escape($this->input->post('read')),
            'write' => html_escape($this->input->post('write')),
            'speak' => html_escape($this->input->post('speak'))
        );

        $data['id'] = $id;
        // update
        if (isset($id) && $id > 0) {
            $data['hr_languages'] = $this->Hr_languages_model->get_hr_languages($id);
            if (isset($_POST) && count($_POST) > 0) {
                $this->Hr_languages_model->update_hr_languages($id, $params);
                $this->session->set_flashdata('msg', 'Hr_languages has been updated successfully');
                redirect('admin/hr_languages/index');
            } else {
                $data['_view'] = 'admin/hr_languages/form';
                $this->load->view('layouts/admin/body', $data);
            }
        } // save
        else {
            if (isset($_POST) && count($_POST) > 0) {
                $hr_languages_id = $this->Hr_languages_model->add_hr_languages($params);
                $this->session->set_flashdata('msg', 'Hr_languages has been saved successfully');
                redirect('admin/hr_languages/index');
            } else {
                $data['hr_languages'] = $this->Hr_languages_model->get_hr_languages(0);
                $data['_view'] = 'admin/hr_languages/form';
                $this->load->view('layouts/admin/body', $data);
            }
        }
    }

    /**
     * Details hr_languages
     *
     * @param $id -
     *            primary key to get record
     *            
     */
    function details($id)
    {
        $data['hr_languages'] = $this->Hr_languages_model->get_hr_languages($id);
        $data['id'] = $id;
        $data['_view'] = 'admin/hr_languages/details';
        $this->load->view('layouts/admin/body', $data);
    }

    /**
     * Deleting hr_languages
     *
     * @param $id -
     *            primary key to delete record
     *            
     */
    function remove($id)
    {
        $hr_languages = $this->Hr_languages_model->get_hr_languages($id);

        // check if the hr_languages exists before trying to delete it
        if (isset($hr_languages['id'])) {
            $this->Hr_languages_model->delete_hr_languages($id);
            $this->session->set_flashdata('msg', 'Hr_languages has been deleted successfully');
            redirect('admin/hr_languages/index');
        } else
            show_error('The hr_languages you are trying to delete does not exist.');
    }

    /**
     * Search hr_languages
     *
     * @param $start -
     *            Starting of hr_languages table's index to get query
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
        $this->db->or_like('languages', $key, 'both');
        $this->db->or_like('read', $key, 'both');
        $this->db->or_like('write', $key, 'both');
        $this->db->or_like('speak', $key, 'both');

        $this->db->order_by('id', 'desc');

        $this->db->limit($limit, $start);
        $data['hr_languages'] = $this->db->get('hr_languages')->result_array();
        $db_error = $this->db->error();
        if (! empty($db_error['code'])) {
            echo 'Database error! Error Code [' . $db_error['code'] . '] Error: ' . $db_error['message'];
            exit();
        }

        // pagination
        $config['base_url'] = site_url('admin/hr_languages/search');
        $this->db->reset_query();
        $this->db->like('id', $key, 'both');
        $this->db->or_like('hr_employee_id', $key, 'both');
        $this->db->or_like('languages', $key, 'both');
        $this->db->or_like('read', $key, 'both');
        $this->db->or_like('write', $key, 'both');
        $this->db->or_like('speak', $key, 'both');

        $config['total_rows'] = $this->db->from("hr_languages")->count_all_results();
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
        $data['_view'] = 'admin/hr_languages/index';
        $this->load->view('layouts/admin/body', $data);
    }

    /**
     * Export hr_languages
     *
     * @param $export_type -
     *            CSV or PDF type
     */
    function export($export_type = 'CSV')
    {
        if ($export_type == 'CSV') {
            // file name
            $filename = 'hr_languages_' . date('Ymd') . '.csv';
            header("Content-Description: File Transfer");
            header("Content-Disposition: attachment; filename=$filename");
            header("Content-Type: application/csv; ");
            // get data
            $this->db->order_by('id', 'desc');
            $hr_languagesData = $this->Hr_languages_model->get_all_hr_languages();
            // file creation
            $file = fopen('php://output', 'w');
            $header = array(
                "Id",
                "Hr Employee Id",
                "Languages",
                "Read",
                "Write",
                "Speak"
            );
            fputcsv($file, $header);
            foreach ($hr_languagesData as $key => $line) {
                fputcsv($file, $line);
            }
            fclose($file);
            exit();
        } else if ($export_type == 'Pdf') {
            $this->db->order_by('id', 'desc');
            $hr_languages = $this->db->get('hr_languages')->result_array();
            // get the HTML
            ob_start();
            include (APPPATH . 'views/admin/hr_languages/print_template.php');
            $html = ob_get_clean();
            require_once FCPATH . 'vendor/autoload.php';
            $mpdf = new \Mpdf\Mpdf();
            $mpdf->WriteHTML($html);
            $mpdf->Output();
            exit();
        }
    }
}
//End of Hr_languages controller