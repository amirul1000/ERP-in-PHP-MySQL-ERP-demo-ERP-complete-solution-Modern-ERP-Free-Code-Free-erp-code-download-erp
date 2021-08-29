<?php

/**
 * Author: Amirul Momenin
 * Desc:Hr_education Controller
 *
 */
class Hr_education extends CI_Controller
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
        $this->load->model('Hr_education_model');
        if (! $this->session->userdata('validated')) {
            redirect('admin/login/index');
        }
    }

    /**
     * Index Page for this controller.
     *
     * @param $start -
     *            Starting of hr_education table's index to get query
     *            
     */
    function index($start = 0)
    {
        $limit = 10;
        $data['hr_education'] = $this->Hr_education_model->get_limit_hr_education($limit, $start);
        // pagination
        $config['base_url'] = site_url('admin/hr_education/index');
        $config['total_rows'] = $this->Hr_education_model->get_count_hr_education();
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

        $data['_view'] = 'admin/hr_education/index';
        $this->load->view('layouts/admin/body', $data);
    }

    /**
     * Save hr_education
     *
     * @param $id -
     *            primary key to update
     *            
     */
    function save($id = - 1)
    {
        $params = array(
            'hr_employee_id' => html_escape($this->input->post('hr_employee_id')),
            'name_institution' => html_escape($this->input->post('name_institution')),
            'principals_subject' => html_escape($this->input->post('principals_subject')),
            'degree' => html_escape($this->input->post('degree')),
            'year' => html_escape($this->input->post('year')),
            'division' => html_escape($this->input->post('division'))
        );

        $data['id'] = $id;
        // update
        if (isset($id) && $id > 0) {
            $data['hr_education'] = $this->Hr_education_model->get_hr_education($id);
            if (isset($_POST) && count($_POST) > 0) {
                $this->Hr_education_model->update_hr_education($id, $params);
                $this->session->set_flashdata('msg', 'Hr_education has been updated successfully');
                redirect('admin/hr_education/index');
            } else {
                $data['_view'] = 'admin/hr_education/form';
                $this->load->view('layouts/admin/body', $data);
            }
        } // save
        else {
            if (isset($_POST) && count($_POST) > 0) {
                $hr_education_id = $this->Hr_education_model->add_hr_education($params);
                $this->session->set_flashdata('msg', 'Hr_education has been saved successfully');
                redirect('admin/hr_education/index');
            } else {
                $data['hr_education'] = $this->Hr_education_model->get_hr_education(0);
                $data['_view'] = 'admin/hr_education/form';
                $this->load->view('layouts/admin/body', $data);
            }
        }
    }

    /**
     * Details hr_education
     *
     * @param $id -
     *            primary key to get record
     *            
     */
    function details($id)
    {
        $data['hr_education'] = $this->Hr_education_model->get_hr_education($id);
        $data['id'] = $id;
        $data['_view'] = 'admin/hr_education/details';
        $this->load->view('layouts/admin/body', $data);
    }

    /**
     * Deleting hr_education
     *
     * @param $id -
     *            primary key to delete record
     *            
     */
    function remove($id)
    {
        $hr_education = $this->Hr_education_model->get_hr_education($id);

        // check if the hr_education exists before trying to delete it
        if (isset($hr_education['id'])) {
            $this->Hr_education_model->delete_hr_education($id);
            $this->session->set_flashdata('msg', 'Hr_education has been deleted successfully');
            redirect('admin/hr_education/index');
        } else
            show_error('The hr_education you are trying to delete does not exist.');
    }

    /**
     * Search hr_education
     *
     * @param $start -
     *            Starting of hr_education table's index to get query
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
        $this->db->or_like('name_institution', $key, 'both');
        $this->db->or_like('principals_subject', $key, 'both');
        $this->db->or_like('degree', $key, 'both');
        $this->db->or_like('year', $key, 'both');
        $this->db->or_like('division', $key, 'both');

        $this->db->order_by('id', 'desc');

        $this->db->limit($limit, $start);
        $data['hr_education'] = $this->db->get('hr_education')->result_array();
        $db_error = $this->db->error();
        if (! empty($db_error['code'])) {
            echo 'Database error! Error Code [' . $db_error['code'] . '] Error: ' . $db_error['message'];
            exit();
        }

        // pagination
        $config['base_url'] = site_url('admin/hr_education/search');
        $this->db->reset_query();
        $this->db->like('id', $key, 'both');
        $this->db->or_like('hr_employee_id', $key, 'both');
        $this->db->or_like('name_institution', $key, 'both');
        $this->db->or_like('principals_subject', $key, 'both');
        $this->db->or_like('degree', $key, 'both');
        $this->db->or_like('year', $key, 'both');
        $this->db->or_like('division', $key, 'both');

        $config['total_rows'] = $this->db->from("hr_education")->count_all_results();
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
        $data['_view'] = 'admin/hr_education/index';
        $this->load->view('layouts/admin/body', $data);
    }

    /**
     * Export hr_education
     *
     * @param $export_type -
     *            CSV or PDF type
     */
    function export($export_type = 'CSV')
    {
        if ($export_type == 'CSV') {
            // file name
            $filename = 'hr_education_' . date('Ymd') . '.csv';
            header("Content-Description: File Transfer");
            header("Content-Disposition: attachment; filename=$filename");
            header("Content-Type: application/csv; ");
            // get data
            $this->db->order_by('id', 'desc');
            $hr_educationData = $this->Hr_education_model->get_all_hr_education();
            // file creation
            $file = fopen('php://output', 'w');
            $header = array(
                "Id",
                "Hr Employee Id",
                "Name Institution",
                "Principals Subject",
                "Degree",
                "Year",
                "Division"
            );
            fputcsv($file, $header);
            foreach ($hr_educationData as $key => $line) {
                fputcsv($file, $line);
            }
            fclose($file);
            exit();
        } else if ($export_type == 'Pdf') {
            $this->db->order_by('id', 'desc');
            $hr_education = $this->db->get('hr_education')->result_array();
            // get the HTML
            ob_start();
            include (APPPATH . 'views/admin/hr_education/print_template.php');
            $html = ob_get_clean();
            require_once FCPATH . 'vendor/autoload.php';
            $mpdf = new \Mpdf\Mpdf();
            $mpdf->WriteHTML($html);
            $mpdf->Output();
            exit();
        }
    }
}
//End of Hr_education controller