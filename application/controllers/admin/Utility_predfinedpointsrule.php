<?php

/**
 * Author: Amirul Momenin
 * Desc:Utility_predfinedpointsrule Controller
 *
 */
class Utility_predfinedpointsrule extends CI_Controller
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
        $this->load->model('Utility_predfinedpointsrule_model');
        if (! $this->session->userdata('validated')) {
            redirect('admin/login/index');
        }
    }

    /**
     * Index Page for this controller.
     *
     * @param $start -
     *            Starting of utility_predfinedpointsrule table's index to get query
     *            
     */
    function index($start = 0)
    {
        $limit = 10;
        $data['utility_predfinedpointsrule'] = $this->Utility_predfinedpointsrule_model->get_limit_utility_predfinedpointsrule($limit, $start);
        // pagination
        $config['base_url'] = site_url('admin/utility_predfinedpointsrule/index');
        $config['total_rows'] = $this->Utility_predfinedpointsrule_model->get_count_utility_predfinedpointsrule();
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

        $data['_view'] = 'admin/utility_predfinedpointsrule/index';
        $this->load->view('layouts/admin/body', $data);
    }

    /**
     * Save utility_predfinedpointsrule
     *
     * @param $id -
     *            primary key to update
     *            
     */
    function save($id = - 1)
    {
        $params = array(
            'created_on' => html_escape($this->input->post('created_on')),
            'modified_on' => html_escape($this->input->post('modified_on')),
            'units_points' => html_escape($this->input->post('units_points')),
            'task_description' => html_escape($this->input->post('task_description')),
            'comments' => html_escape($this->input->post('comments')),
            'created_by_users_id' => html_escape($this->input->post('created_by_users_id')),
            'modified_by_users_id' => html_escape($this->input->post('modified_by_users_id'))
        );

        $data['id'] = $id;
        // update
        if (isset($id) && $id > 0) {
            $data['utility_predfinedpointsrule'] = $this->Utility_predfinedpointsrule_model->get_utility_predfinedpointsrule($id);
            if (isset($_POST) && count($_POST) > 0) {
                $this->Utility_predfinedpointsrule_model->update_utility_predfinedpointsrule($id, $params);
                $this->session->set_flashdata('msg', 'Utility_predfinedpointsrule has been updated successfully');
                redirect('admin/utility_predfinedpointsrule/index');
            } else {
                $data['_view'] = 'admin/utility_predfinedpointsrule/form';
                $this->load->view('layouts/admin/body', $data);
            }
        } // save
        else {
            if (isset($_POST) && count($_POST) > 0) {
                $utility_predfinedpointsrule_id = $this->Utility_predfinedpointsrule_model->add_utility_predfinedpointsrule($params);
                $this->session->set_flashdata('msg', 'Utility_predfinedpointsrule has been saved successfully');
                redirect('admin/utility_predfinedpointsrule/index');
            } else {
                $data['utility_predfinedpointsrule'] = $this->Utility_predfinedpointsrule_model->get_utility_predfinedpointsrule(0);
                $data['_view'] = 'admin/utility_predfinedpointsrule/form';
                $this->load->view('layouts/admin/body', $data);
            }
        }
    }

    /**
     * Details utility_predfinedpointsrule
     *
     * @param $id -
     *            primary key to get record
     *            
     */
    function details($id)
    {
        $data['utility_predfinedpointsrule'] = $this->Utility_predfinedpointsrule_model->get_utility_predfinedpointsrule($id);
        $data['id'] = $id;
        $data['_view'] = 'admin/utility_predfinedpointsrule/details';
        $this->load->view('layouts/admin/body', $data);
    }

    /**
     * Deleting utility_predfinedpointsrule
     *
     * @param $id -
     *            primary key to delete record
     *            
     */
    function remove($id)
    {
        $utility_predfinedpointsrule = $this->Utility_predfinedpointsrule_model->get_utility_predfinedpointsrule($id);

        // check if the utility_predfinedpointsrule exists before trying to delete it
        if (isset($utility_predfinedpointsrule['id'])) {
            $this->Utility_predfinedpointsrule_model->delete_utility_predfinedpointsrule($id);
            $this->session->set_flashdata('msg', 'Utility_predfinedpointsrule has been deleted successfully');
            redirect('admin/utility_predfinedpointsrule/index');
        } else
            show_error('The utility_predfinedpointsrule you are trying to delete does not exist.');
    }

    /**
     * Search utility_predfinedpointsrule
     *
     * @param $start -
     *            Starting of utility_predfinedpointsrule table's index to get query
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
        $this->db->or_like('created_on', $key, 'both');
        $this->db->or_like('modified_on', $key, 'both');
        $this->db->or_like('units_points', $key, 'both');
        $this->db->or_like('task_description', $key, 'both');
        $this->db->or_like('comments', $key, 'both');
        $this->db->or_like('created_by_users_id', $key, 'both');
        $this->db->or_like('modified_by_users_id', $key, 'both');

        $this->db->order_by('id', 'desc');

        $this->db->limit($limit, $start);
        $data['utility_predfinedpointsrule'] = $this->db->get('utility_predfinedpointsrule')->result_array();
        $db_error = $this->db->error();
        if (! empty($db_error['code'])) {
            echo 'Database error! Error Code [' . $db_error['code'] . '] Error: ' . $db_error['message'];
            exit();
        }

        // pagination
        $config['base_url'] = site_url('admin/utility_predfinedpointsrule/search');
        $this->db->reset_query();
        $this->db->like('id', $key, 'both');
        $this->db->or_like('created_on', $key, 'both');
        $this->db->or_like('modified_on', $key, 'both');
        $this->db->or_like('units_points', $key, 'both');
        $this->db->or_like('task_description', $key, 'both');
        $this->db->or_like('comments', $key, 'both');
        $this->db->or_like('created_by_users_id', $key, 'both');
        $this->db->or_like('modified_by_users_id', $key, 'both');

        $config['total_rows'] = $this->db->from("utility_predfinedpointsrule")->count_all_results();
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
        $data['_view'] = 'admin/utility_predfinedpointsrule/index';
        $this->load->view('layouts/admin/body', $data);
    }

    /**
     * Export utility_predfinedpointsrule
     *
     * @param $export_type -
     *            CSV or PDF type
     */
    function export($export_type = 'CSV')
    {
        if ($export_type == 'CSV') {
            // file name
            $filename = 'utility_predfinedpointsrule_' . date('Ymd') . '.csv';
            header("Content-Description: File Transfer");
            header("Content-Disposition: attachment; filename=$filename");
            header("Content-Type: application/csv; ");
            // get data
            $this->db->order_by('id', 'desc');
            $utility_predfinedpointsruleData = $this->Utility_predfinedpointsrule_model->get_all_utility_predfinedpointsrule();
            // file creation
            $file = fopen('php://output', 'w');
            $header = array(
                "Id",
                "Created On",
                "Modified On",
                "Units Points",
                "Task Description",
                "Comments",
                "Created By Users Id",
                "Modified By Users Id"
            );
            fputcsv($file, $header);
            foreach ($utility_predfinedpointsruleData as $key => $line) {
                fputcsv($file, $line);
            }
            fclose($file);
            exit();
        } else if ($export_type == 'Pdf') {
            $this->db->order_by('id', 'desc');
            $utility_predfinedpointsrule = $this->db->get('utility_predfinedpointsrule')->result_array();
            // get the HTML
            ob_start();
            include (APPPATH . 'views/admin/utility_predfinedpointsrule/print_template.php');
            $html = ob_get_clean();
            require_once FCPATH . 'vendor/autoload.php';
            $mpdf = new \Mpdf\Mpdf();
            $mpdf->WriteHTML($html);
            $mpdf->Output();
            exit();
        }
    }
}
//End of Utility_predfinedpointsrule controller