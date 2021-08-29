<?php

/**
 * Author: Amirul Momenin
 * Desc:Marketing_mail_group Controller
 *
 */
class Marketing_mail_group extends CI_Controller
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
        $this->load->model('Marketing_mail_group_model');
        if (! $this->session->userdata('validated')) {
            redirect('admin/login/index');
        }
    }

    /**
     * Index Page for this controller.
     *
     * @param $start -
     *            Starting of marketing_mail_group table's index to get query
     *            
     */
    function index($start = 0)
    {
        $limit = 10;
        $data['marketing_mail_group'] = $this->Marketing_mail_group_model->get_limit_marketing_mail_group($limit, $start);
        // pagination
        $config['base_url'] = site_url('admin/marketing_mail_group/index');
        $config['total_rows'] = $this->Marketing_mail_group_model->get_count_marketing_mail_group();
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

        $data['_view'] = 'admin/marketing_mail_group/index';
        $this->load->view('layouts/admin/body', $data);
    }

    /**
     * Save marketing_mail_group
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
            'group_name' => html_escape($this->input->post('group_name')),
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
            $data['marketing_mail_group'] = $this->Marketing_mail_group_model->get_marketing_mail_group($id);
            if (isset($_POST) && count($_POST) > 0) {
                $this->Marketing_mail_group_model->update_marketing_mail_group($id, $params);
                $this->session->set_flashdata('msg', 'Marketing_mail_group has been updated successfully');
                redirect('admin/marketing_mail_group/index');
            } else {
                $data['_view'] = 'admin/marketing_mail_group/form';
                $this->load->view('layouts/admin/body', $data);
            }
        } // save
        else {
            if (isset($_POST) && count($_POST) > 0) {
                $marketing_mail_group_id = $this->Marketing_mail_group_model->add_marketing_mail_group($params);
                $this->session->set_flashdata('msg', 'Marketing_mail_group has been saved successfully');
                redirect('admin/marketing_mail_group/index');
            } else {
                $data['marketing_mail_group'] = $this->Marketing_mail_group_model->get_marketing_mail_group(0);
                $data['_view'] = 'admin/marketing_mail_group/form';
                $this->load->view('layouts/admin/body', $data);
            }
        }
    }

    /**
     * Details marketing_mail_group
     *
     * @param $id -
     *            primary key to get record
     *            
     */
    function details($id)
    {
        $data['marketing_mail_group'] = $this->Marketing_mail_group_model->get_marketing_mail_group($id);
        $data['id'] = $id;
        $data['_view'] = 'admin/marketing_mail_group/details';
        $this->load->view('layouts/admin/body', $data);
    }

    /**
     * Deleting marketing_mail_group
     *
     * @param $id -
     *            primary key to delete record
     *            
     */
    function remove($id)
    {
        $marketing_mail_group = $this->Marketing_mail_group_model->get_marketing_mail_group($id);

        // check if the marketing_mail_group exists before trying to delete it
        if (isset($marketing_mail_group['id'])) {
            $this->Marketing_mail_group_model->delete_marketing_mail_group($id);
            $this->session->set_flashdata('msg', 'Marketing_mail_group has been deleted successfully');
            redirect('admin/marketing_mail_group/index');
        } else
            show_error('The marketing_mail_group you are trying to delete does not exist.');
    }

    /**
     * Search marketing_mail_group
     *
     * @param $start -
     *            Starting of marketing_mail_group table's index to get query
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
        $this->db->or_like('group_name', $key, 'both');
        $this->db->or_like('created_at', $key, 'both');
        $this->db->or_like('updated_at', $key, 'both');

        $this->db->order_by('id', 'desc');

        $this->db->limit($limit, $start);
        $data['marketing_mail_group'] = $this->db->get('marketing_mail_group')->result_array();
        $db_error = $this->db->error();
        if (! empty($db_error['code'])) {
            echo 'Database error! Error Code [' . $db_error['code'] . '] Error: ' . $db_error['message'];
            exit();
        }

        // pagination
        $config['base_url'] = site_url('admin/marketing_mail_group/search');
        $this->db->reset_query();
        $this->db->like('id', $key, 'both');
        $this->db->or_like('group_name', $key, 'both');
        $this->db->or_like('created_at', $key, 'both');
        $this->db->or_like('updated_at', $key, 'both');

        $config['total_rows'] = $this->db->from("marketing_mail_group")->count_all_results();
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
        $data['_view'] = 'admin/marketing_mail_group/index';
        $this->load->view('layouts/admin/body', $data);
    }

    /**
     * Export marketing_mail_group
     *
     * @param $export_type -
     *            CSV or PDF type
     */
    function export($export_type = 'CSV')
    {
        if ($export_type == 'CSV') {
            // file name
            $filename = 'marketing_mail_group_' . date('Ymd') . '.csv';
            header("Content-Description: File Transfer");
            header("Content-Disposition: attachment; filename=$filename");
            header("Content-Type: application/csv; ");
            // get data
            $this->db->order_by('id', 'desc');
            $marketing_mail_groupData = $this->Marketing_mail_group_model->get_all_marketing_mail_group();
            // file creation
            $file = fopen('php://output', 'w');
            $header = array(
                "Id",
                "Group Name",
                "Created At",
                "Updated At"
            );
            fputcsv($file, $header);
            foreach ($marketing_mail_groupData as $key => $line) {
                fputcsv($file, $line);
            }
            fclose($file);
            exit();
        } else if ($export_type == 'Pdf') {
            $this->db->order_by('id', 'desc');
            $marketing_mail_group = $this->db->get('marketing_mail_group')->result_array();
            // get the HTML
            ob_start();
            include (APPPATH . 'views/admin/marketing_mail_group/print_template.php');
            $html = ob_get_clean();
            require_once FCPATH . 'vendor/autoload.php';
            $mpdf = new \Mpdf\Mpdf();
            $mpdf->WriteHTML($html);
            $mpdf->Output();
            exit();
        }
    }
}
//End of Marketing_mail_group controller