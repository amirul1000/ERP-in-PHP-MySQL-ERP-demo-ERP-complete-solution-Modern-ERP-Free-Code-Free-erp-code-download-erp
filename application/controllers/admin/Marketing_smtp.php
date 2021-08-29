<?php

/**
 * Author: Amirul Momenin
 * Desc:Marketing_smtp Controller
 *
 */
class Marketing_smtp extends CI_Controller
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
        $this->load->model('Marketing_smtp_model');
        if (! $this->session->userdata('validated')) {
            redirect('admin/login/index');
        }
    }

    /**
     * Index Page for this controller.
     *
     * @param $start -
     *            Starting of marketing_smtp table's index to get query
     *            
     */
    function index($start = 0)
    {
        $limit = 10;
        $data['marketing_smtp'] = $this->Marketing_smtp_model->get_limit_marketing_smtp($limit, $start);
        // pagination
        $config['base_url'] = site_url('admin/marketing_smtp/index');
        $config['total_rows'] = $this->Marketing_smtp_model->get_count_marketing_smtp();
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

        $data['_view'] = 'admin/marketing_smtp/index';
        $this->load->view('layouts/admin/body', $data);
    }

    /**
     * Save marketing_smtp
     *
     * @param $id -
     *            primary key to update
     *            
     */
    function save($id = - 1)
    {
        $created_at = "";
        $updated_at = "";

        if ($id <= 0) {
            $created_at = date("Y-m-d H:i:s");
        } else if ($id > 0) {
            $updated_at = date("Y-m-d H:i:s");
        }

        $params = array(
            'smtp_name' => html_escape($this->input->post('smtp_name')),
            'host' => html_escape($this->input->post('host')),
            'email' => html_escape($this->input->post('email')),
            'password' => html_escape($this->input->post('password')),
            'port' => html_escape($this->input->post('port')),
            'status' => html_escape($this->input->post('status')),
            'created_at' => $created_at,
            'updated_at' => $updated_at
        );

        if ($id > 0) {
            unset($params['created_at']);
        }
        if ($id <= 0) {
            unset($params['updated_at']);
        }
        $data['id'] = $id;
        // update
        if (isset($id) && $id > 0) {
            $data['marketing_smtp'] = $this->Marketing_smtp_model->get_marketing_smtp($id);
            if (isset($_POST) && count($_POST) > 0) {
                $this->Marketing_smtp_model->update_marketing_smtp($id, $params);
                $this->session->set_flashdata('msg', 'Marketing_smtp has been updated successfully');
                redirect('admin/marketing_smtp/index');
            } else {
                $data['_view'] = 'admin/marketing_smtp/form';
                $this->load->view('layouts/admin/body', $data);
            }
        } // save
        else {
            if (isset($_POST) && count($_POST) > 0) {
                $marketing_smtp_id = $this->Marketing_smtp_model->add_marketing_smtp($params);
                $this->session->set_flashdata('msg', 'Marketing_smtp has been saved successfully');
                redirect('admin/marketing_smtp/index');
            } else {
                $data['marketing_smtp'] = $this->Marketing_smtp_model->get_marketing_smtp(0);
                $data['_view'] = 'admin/marketing_smtp/form';
                $this->load->view('layouts/admin/body', $data);
            }
        }
    }

    /**
     * Details marketing_smtp
     *
     * @param $id -
     *            primary key to get record
     *            
     */
    function details($id)
    {
        $data['marketing_smtp'] = $this->Marketing_smtp_model->get_marketing_smtp($id);
        $data['id'] = $id;
        $data['_view'] = 'admin/marketing_smtp/details';
        $this->load->view('layouts/admin/body', $data);
    }

    /**
     * Deleting marketing_smtp
     *
     * @param $id -
     *            primary key to delete record
     *            
     */
    function remove($id)
    {
        $marketing_smtp = $this->Marketing_smtp_model->get_marketing_smtp($id);

        // check if the marketing_smtp exists before trying to delete it
        if (isset($marketing_smtp['id'])) {
            $this->Marketing_smtp_model->delete_marketing_smtp($id);
            $this->session->set_flashdata('msg', 'Marketing_smtp has been deleted successfully');
            redirect('admin/marketing_smtp/index');
        } else
            show_error('The marketing_smtp you are trying to delete does not exist.');
    }

    /**
     * Search marketing_smtp
     *
     * @param $start -
     *            Starting of marketing_smtp table's index to get query
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
        $this->db->or_like('smtp_name', $key, 'both');
        $this->db->or_like('host', $key, 'both');
        $this->db->or_like('email', $key, 'both');
        $this->db->or_like('password', $key, 'both');
        $this->db->or_like('port', $key, 'both');
        $this->db->or_like('status', $key, 'both');
        $this->db->or_like('created_at', $key, 'both');
        $this->db->or_like('updated_at', $key, 'both');

        $this->db->order_by('id', 'desc');

        $this->db->limit($limit, $start);
        $data['marketing_smtp'] = $this->db->get('marketing_smtp')->result_array();
        $db_error = $this->db->error();
        if (! empty($db_error['code'])) {
            echo 'Database error! Error Code [' . $db_error['code'] . '] Error: ' . $db_error['message'];
            exit();
        }

        // pagination
        $config['base_url'] = site_url('admin/marketing_smtp/search');
        $this->db->reset_query();
        $this->db->like('id', $key, 'both');
        $this->db->or_like('smtp_name', $key, 'both');
        $this->db->or_like('host', $key, 'both');
        $this->db->or_like('email', $key, 'both');
        $this->db->or_like('password', $key, 'both');
        $this->db->or_like('port', $key, 'both');
        $this->db->or_like('status', $key, 'both');
        $this->db->or_like('created_at', $key, 'both');
        $this->db->or_like('updated_at', $key, 'both');

        $config['total_rows'] = $this->db->from("marketing_smtp")->count_all_results();
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
        $data['_view'] = 'admin/marketing_smtp/index';
        $this->load->view('layouts/admin/body', $data);
    }

    /**
     * Export marketing_smtp
     *
     * @param $export_type -
     *            CSV or PDF type
     */
    function export($export_type = 'CSV')
    {
        if ($export_type == 'CSV') {
            // file name
            $filename = 'marketing_smtp_' . date('Ymd') . '.csv';
            header("Content-Description: File Transfer");
            header("Content-Disposition: attachment; filename=$filename");
            header("Content-Type: application/csv; ");
            // get data
            $this->db->order_by('id', 'desc');
            $marketing_smtpData = $this->Marketing_smtp_model->get_all_marketing_smtp();
            // file creation
            $file = fopen('php://output', 'w');
            $header = array(
                "Id",
                "Smtp Name",
                "Host",
                "Email",
                "Password",
                "Port",
                "Status",
                "Created At",
                "Updated At"
            );
            fputcsv($file, $header);
            foreach ($marketing_smtpData as $key => $line) {
                fputcsv($file, $line);
            }
            fclose($file);
            exit();
        } else if ($export_type == 'Pdf') {
            $this->db->order_by('id', 'desc');
            $marketing_smtp = $this->db->get('marketing_smtp')->result_array();
            // get the HTML
            ob_start();
            include (APPPATH . 'views/admin/marketing_smtp/print_template.php');
            $html = ob_get_clean();
            require_once FCPATH . 'vendor/autoload.php';
            $mpdf = new \Mpdf\Mpdf();
            $mpdf->WriteHTML($html);
            $mpdf->Output();
            exit();
        }
    }
}
//End of Marketing_smtp controller