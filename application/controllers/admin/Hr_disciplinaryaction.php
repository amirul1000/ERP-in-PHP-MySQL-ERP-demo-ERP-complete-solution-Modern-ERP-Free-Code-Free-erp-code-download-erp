<?php

/**
 * Author: Amirul Momenin
 * Desc:Hr_disciplinaryaction Controller
 *
 */
class Hr_disciplinaryaction extends CI_Controller
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
        $this->load->model('Hr_disciplinaryaction_model');
        if (! $this->session->userdata('validated')) {
            redirect('admin/login/index');
        }
    }

    /**
     * Index Page for this controller.
     *
     * @param $start -
     *            Starting of hr_disciplinaryaction table's index to get query
     *            
     */
    function index($start = 0)
    {
        $limit = 10;
        $data['hr_disciplinaryaction'] = $this->Hr_disciplinaryaction_model->get_limit_hr_disciplinaryaction($limit, $start);
        // pagination
        $config['base_url'] = site_url('admin/hr_disciplinaryaction/index');
        $config['total_rows'] = $this->Hr_disciplinaryaction_model->get_count_hr_disciplinaryaction();
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

        $data['_view'] = 'admin/hr_disciplinaryaction/index';
        $this->load->view('layouts/admin/body', $data);
    }

    /**
     * Save hr_disciplinaryaction
     *
     * @param $id -
     *            primary key to update
     *            
     */
    function save($id = - 1)
    {
        $params = array(
            'hr_employee_id' => html_escape($this->input->post('hr_employee_id')),
            'nature_offence' => html_escape($this->input->post('nature_offence')),
            'punishment' => html_escape($this->input->post('punishment')),
            'date' => html_escape($this->input->post('date'))
        );

        $data['id'] = $id;
        // update
        if (isset($id) && $id > 0) {
            $data['hr_disciplinaryaction'] = $this->Hr_disciplinaryaction_model->get_hr_disciplinaryaction($id);
            if (isset($_POST) && count($_POST) > 0) {
                $this->Hr_disciplinaryaction_model->update_hr_disciplinaryaction($id, $params);
                $this->session->set_flashdata('msg', 'Hr_disciplinaryaction has been updated successfully');
                redirect('admin/hr_disciplinaryaction/index');
            } else {
                $data['_view'] = 'admin/hr_disciplinaryaction/form';
                $this->load->view('layouts/admin/body', $data);
            }
        } // save
        else {
            if (isset($_POST) && count($_POST) > 0) {
                $hr_disciplinaryaction_id = $this->Hr_disciplinaryaction_model->add_hr_disciplinaryaction($params);
                $this->session->set_flashdata('msg', 'Hr_disciplinaryaction has been saved successfully');
                redirect('admin/hr_disciplinaryaction/index');
            } else {
                $data['hr_disciplinaryaction'] = $this->Hr_disciplinaryaction_model->get_hr_disciplinaryaction(0);
                $data['_view'] = 'admin/hr_disciplinaryaction/form';
                $this->load->view('layouts/admin/body', $data);
            }
        }
    }

    /**
     * Details hr_disciplinaryaction
     *
     * @param $id -
     *            primary key to get record
     *            
     */
    function details($id)
    {
        $data['hr_disciplinaryaction'] = $this->Hr_disciplinaryaction_model->get_hr_disciplinaryaction($id);
        $data['id'] = $id;
        $data['_view'] = 'admin/hr_disciplinaryaction/details';
        $this->load->view('layouts/admin/body', $data);
    }

    /**
     * Deleting hr_disciplinaryaction
     *
     * @param $id -
     *            primary key to delete record
     *            
     */
    function remove($id)
    {
        $hr_disciplinaryaction = $this->Hr_disciplinaryaction_model->get_hr_disciplinaryaction($id);

        // check if the hr_disciplinaryaction exists before trying to delete it
        if (isset($hr_disciplinaryaction['id'])) {
            $this->Hr_disciplinaryaction_model->delete_hr_disciplinaryaction($id);
            $this->session->set_flashdata('msg', 'Hr_disciplinaryaction has been deleted successfully');
            redirect('admin/hr_disciplinaryaction/index');
        } else
            show_error('The hr_disciplinaryaction you are trying to delete does not exist.');
    }

    /**
     * Search hr_disciplinaryaction
     *
     * @param $start -
     *            Starting of hr_disciplinaryaction table's index to get query
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
        $this->db->or_like('nature_offence', $key, 'both');
        $this->db->or_like('punishment', $key, 'both');
        $this->db->or_like('date', $key, 'both');

        $this->db->order_by('id', 'desc');

        $this->db->limit($limit, $start);
        $data['hr_disciplinaryaction'] = $this->db->get('hr_disciplinaryaction')->result_array();
        $db_error = $this->db->error();
        if (! empty($db_error['code'])) {
            echo 'Database error! Error Code [' . $db_error['code'] . '] Error: ' . $db_error['message'];
            exit();
        }

        // pagination
        $config['base_url'] = site_url('admin/hr_disciplinaryaction/search');
        $this->db->reset_query();
        $this->db->like('id', $key, 'both');
        $this->db->or_like('hr_employee_id', $key, 'both');
        $this->db->or_like('nature_offence', $key, 'both');
        $this->db->or_like('punishment', $key, 'both');
        $this->db->or_like('date', $key, 'both');

        $config['total_rows'] = $this->db->from("hr_disciplinaryaction")->count_all_results();
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
        $data['_view'] = 'admin/hr_disciplinaryaction/index';
        $this->load->view('layouts/admin/body', $data);
    }

    /**
     * Export hr_disciplinaryaction
     *
     * @param $export_type -
     *            CSV or PDF type
     */
    function export($export_type = 'CSV')
    {
        if ($export_type == 'CSV') {
            // file name
            $filename = 'hr_disciplinaryaction_' . date('Ymd') . '.csv';
            header("Content-Description: File Transfer");
            header("Content-Disposition: attachment; filename=$filename");
            header("Content-Type: application/csv; ");
            // get data
            $this->db->order_by('id', 'desc');
            $hr_disciplinaryactionData = $this->Hr_disciplinaryaction_model->get_all_hr_disciplinaryaction();
            // file creation
            $file = fopen('php://output', 'w');
            $header = array(
                "Id",
                "Hr Employee Id",
                "Nature Offence",
                "Punishment",
                "Date"
            );
            fputcsv($file, $header);
            foreach ($hr_disciplinaryactionData as $key => $line) {
                fputcsv($file, $line);
            }
            fclose($file);
            exit();
        } else if ($export_type == 'Pdf') {
            $this->db->order_by('id', 'desc');
            $hr_disciplinaryaction = $this->db->get('hr_disciplinaryaction')->result_array();
            // get the HTML
            ob_start();
            include (APPPATH . 'views/admin/hr_disciplinaryaction/print_template.php');
            $html = ob_get_clean();
            require_once FCPATH . 'vendor/autoload.php';
            $mpdf = new \Mpdf\Mpdf();
            $mpdf->WriteHTML($html);
            $mpdf->Output();
            exit();
        }
    }
}
//End of Hr_disciplinaryaction controller