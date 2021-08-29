<?php

/**
 * Author: Amirul Momenin
 * Desc:Marketing_leads Controller
 *
 */
class Marketing_leads extends CI_Controller
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
        $this->load->model('Marketing_leads_model');
        if (! $this->session->userdata('validated')) {
            redirect('admin/login/index');
        }
    }

    /**
     * Index Page for this controller.
     *
     * @param $start -
     *            Starting of marketing_leads table's index to get query
     *            
     */
    function index($start = 0)
    {
        $limit = 10;
        $data['marketing_leads'] = $this->Marketing_leads_model->get_limit_marketing_leads($limit, $start);
        // pagination
        $config['base_url'] = site_url('admin/marketing_leads/index');
        $config['total_rows'] = $this->Marketing_leads_model->get_count_marketing_leads();
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

        $data['_view'] = 'admin/marketing_leads/index';
        $this->load->view('layouts/admin/body', $data);
    }

    /**
     * Save marketing_leads
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
            'first_name' => html_escape($this->input->post('first_name')),
            'last_name' => html_escape($this->input->post('last_name')),
            'email' => html_escape($this->input->post('email')),
            'cell_phone' => html_escape($this->input->post('cell_phone')),
            'land_phone' => html_escape($this->input->post('land_phone')),
            'address' => html_escape($this->input->post('address')),
            'created_at' => $created_at,
            'updated_at' => $updated_at,
            'status' => html_escape($this->input->post('status'))
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
            $data['marketing_leads'] = $this->Marketing_leads_model->get_marketing_leads($id);
            if (isset($_POST) && count($_POST) > 0) {
                $this->Marketing_leads_model->update_marketing_leads($id, $params);
                $this->session->set_flashdata('msg', 'Marketing_leads has been updated successfully');
                redirect('admin/marketing_leads/index');
            } else {
                $data['_view'] = 'admin/marketing_leads/form';
                $this->load->view('layouts/admin/body', $data);
            }
        } // save
        else {
            if (isset($_POST) && count($_POST) > 0) {
                $marketing_leads_id = $this->Marketing_leads_model->add_marketing_leads($params);
                $this->session->set_flashdata('msg', 'Marketing_leads has been saved successfully');
                redirect('admin/marketing_leads/index');
            } else {
                $data['marketing_leads'] = $this->Marketing_leads_model->get_marketing_leads(0);
                $data['_view'] = 'admin/marketing_leads/form';
                $this->load->view('layouts/admin/body', $data);
            }
        }
    }

    /**
     * Details marketing_leads
     *
     * @param $id -
     *            primary key to get record
     *            
     */
    function details($id)
    {
        $data['marketing_leads'] = $this->Marketing_leads_model->get_marketing_leads($id);
        $data['id'] = $id;
        $data['_view'] = 'admin/marketing_leads/details';
        $this->load->view('layouts/admin/body', $data);
    }

    /**
     * Deleting marketing_leads
     *
     * @param $id -
     *            primary key to delete record
     *            
     */
    function remove($id)
    {
        $marketing_leads = $this->Marketing_leads_model->get_marketing_leads($id);

        // check if the marketing_leads exists before trying to delete it
        if (isset($marketing_leads['id'])) {
            $this->Marketing_leads_model->delete_marketing_leads($id);
            $this->session->set_flashdata('msg', 'Marketing_leads has been deleted successfully');
            redirect('admin/marketing_leads/index');
        } else
            show_error('The marketing_leads you are trying to delete does not exist.');
    }

    /**
     * Search marketing_leads
     *
     * @param $start -
     *            Starting of marketing_leads table's index to get query
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
        $this->db->or_like('first_name', $key, 'both');
        $this->db->or_like('last_name', $key, 'both');
        $this->db->or_like('email', $key, 'both');
        $this->db->or_like('cell_phone', $key, 'both');
        $this->db->or_like('land_phone', $key, 'both');
        $this->db->or_like('address', $key, 'both');
        $this->db->or_like('created_at', $key, 'both');
        $this->db->or_like('updated_at', $key, 'both');
        $this->db->or_like('status', $key, 'both');

        $this->db->order_by('id', 'desc');

        $this->db->limit($limit, $start);
        $data['marketing_leads'] = $this->db->get('marketing_leads')->result_array();
        $db_error = $this->db->error();
        if (! empty($db_error['code'])) {
            echo 'Database error! Error Code [' . $db_error['code'] . '] Error: ' . $db_error['message'];
            exit();
        }

        // pagination
        $config['base_url'] = site_url('admin/marketing_leads/search');
        $this->db->reset_query();
        $this->db->like('id', $key, 'both');
        $this->db->or_like('first_name', $key, 'both');
        $this->db->or_like('last_name', $key, 'both');
        $this->db->or_like('email', $key, 'both');
        $this->db->or_like('cell_phone', $key, 'both');
        $this->db->or_like('land_phone', $key, 'both');
        $this->db->or_like('address', $key, 'both');
        $this->db->or_like('created_at', $key, 'both');
        $this->db->or_like('updated_at', $key, 'both');
        $this->db->or_like('status', $key, 'both');

        $config['total_rows'] = $this->db->from("marketing_leads")->count_all_results();
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
        $data['_view'] = 'admin/marketing_leads/index';
        $this->load->view('layouts/admin/body', $data);
    }

    /**
     * Export marketing_leads
     *
     * @param $export_type -
     *            CSV or PDF type
     */
    function export($export_type = 'CSV')
    {
        if ($export_type == 'CSV') {
            // file name
            $filename = 'marketing_leads_' . date('Ymd') . '.csv';
            header("Content-Description: File Transfer");
            header("Content-Disposition: attachment; filename=$filename");
            header("Content-Type: application/csv; ");
            // get data
            $this->db->order_by('id', 'desc');
            $marketing_leadsData = $this->Marketing_leads_model->get_all_marketing_leads();
            // file creation
            $file = fopen('php://output', 'w');
            $header = array(
                "Id",
                "First Name",
                "Last Name",
                "Email",
                "Cell Phone",
                "Land Phone",
                "Address",
                "Created At",
                "Updated At",
                "Status"
            );
            fputcsv($file, $header);
            foreach ($marketing_leadsData as $key => $line) {
                fputcsv($file, $line);
            }
            fclose($file);
            exit();
        } else if ($export_type == 'Pdf') {
            $this->db->order_by('id', 'desc');
            $marketing_leads = $this->db->get('marketing_leads')->result_array();
            // get the HTML
            ob_start();
            include (APPPATH . 'views/admin/marketing_leads/print_template.php');
            $html = ob_get_clean();
            require_once FCPATH . 'vendor/autoload.php';
            $mpdf = new \Mpdf\Mpdf();
            $mpdf->WriteHTML($html);
            $mpdf->Output();
            exit();
        }
    }
}
//End of Marketing_leads controller