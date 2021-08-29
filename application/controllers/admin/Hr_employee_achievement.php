<?php

/**
 * Author: Amirul Momenin
 * Desc:Hr_employee_achievement Controller
 *
 */
class Hr_employee_achievement extends CI_Controller
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
        $this->load->model('Hr_employee_achievement_model');
        if (! $this->session->userdata('validated')) {
            redirect('admin/login/index');
        }
    }

    /**
     * Index Page for this controller.
     *
     * @param $start -
     *            Starting of hr_employee_achievement table's index to get query
     *            
     */
    function index($start = 0)
    {
        $limit = 10;
        $data['hr_employee_achievement'] = $this->Hr_employee_achievement_model->get_limit_hr_employee_achievement($limit, $start);
        // pagination
        $config['base_url'] = site_url('admin/hr_employee_achievement/index');
        $config['total_rows'] = $this->Hr_employee_achievement_model->get_count_hr_employee_achievement();
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

        $data['_view'] = 'admin/hr_employee_achievement/index';
        $this->load->view('layouts/admin/body', $data);
    }

    /**
     * Save hr_employee_achievement
     *
     * @param $id -
     *            primary key to update
     *            
     */
    function save($id = - 1)
    {
        $params = array(
            'points_to_hr_employee_id' => html_escape($this->input->post('points_to_hr_employee_id')),
            'points_by_hr_employee_id' => html_escape($this->input->post('points_by_hr_employee_id')),
            'description' => html_escape($this->input->post('description')),
            'no_of_units_completed' => html_escape($this->input->post('no_of_units_completed')),
            'points_on_unit_task' => html_escape($this->input->post('points_on_unit_task')),
            'date_achivement' => html_escape($this->input->post('date_achivement')),
            'total_units_points' => html_escape($this->input->post('total_units_points'))
        );

        $data['id'] = $id;
        // update
        if (isset($id) && $id > 0) {
            $data['hr_employee_achievement'] = $this->Hr_employee_achievement_model->get_hr_employee_achievement($id);
            if (isset($_POST) && count($_POST) > 0) {
                $this->Hr_employee_achievement_model->update_hr_employee_achievement($id, $params);
                $this->session->set_flashdata('msg', 'Hr_employee_achievement has been updated successfully');
                redirect('admin/hr_employee_achievement/index');
            } else {
                $data['_view'] = 'admin/hr_employee_achievement/form';
                $this->load->view('layouts/admin/body', $data);
            }
        } // save
        else {
            if (isset($_POST) && count($_POST) > 0) {
                $hr_employee_achievement_id = $this->Hr_employee_achievement_model->add_hr_employee_achievement($params);
                $this->session->set_flashdata('msg', 'Hr_employee_achievement has been saved successfully');
                redirect('admin/hr_employee_achievement/index');
            } else {
                $data['hr_employee_achievement'] = $this->Hr_employee_achievement_model->get_hr_employee_achievement(0);
                $data['_view'] = 'admin/hr_employee_achievement/form';
                $this->load->view('layouts/admin/body', $data);
            }
        }
    }

    /**
     * Details hr_employee_achievement
     *
     * @param $id -
     *            primary key to get record
     *            
     */
    function details($id)
    {
        $data['hr_employee_achievement'] = $this->Hr_employee_achievement_model->get_hr_employee_achievement($id);
        $data['id'] = $id;
        $data['_view'] = 'admin/hr_employee_achievement/details';
        $this->load->view('layouts/admin/body', $data);
    }

    /**
     * Deleting hr_employee_achievement
     *
     * @param $id -
     *            primary key to delete record
     *            
     */
    function remove($id)
    {
        $hr_employee_achievement = $this->Hr_employee_achievement_model->get_hr_employee_achievement($id);

        // check if the hr_employee_achievement exists before trying to delete it
        if (isset($hr_employee_achievement['id'])) {
            $this->Hr_employee_achievement_model->delete_hr_employee_achievement($id);
            $this->session->set_flashdata('msg', 'Hr_employee_achievement has been deleted successfully');
            redirect('admin/hr_employee_achievement/index');
        } else
            show_error('The hr_employee_achievement you are trying to delete does not exist.');
    }

    /**
     * Search hr_employee_achievement
     *
     * @param $start -
     *            Starting of hr_employee_achievement table's index to get query
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
        $this->db->or_like('points_to_hr_employee_id', $key, 'both');
        $this->db->or_like('points_by_hr_employee_id', $key, 'both');
        $this->db->or_like('description', $key, 'both');
        $this->db->or_like('no_of_units_completed', $key, 'both');
        $this->db->or_like('points_on_unit_task', $key, 'both');
        $this->db->or_like('date_achivement', $key, 'both');
        $this->db->or_like('total_units_points', $key, 'both');

        $this->db->order_by('id', 'desc');

        $this->db->limit($limit, $start);
        $data['hr_employee_achievement'] = $this->db->get('hr_employee_achievement')->result_array();
        $db_error = $this->db->error();
        if (! empty($db_error['code'])) {
            echo 'Database error! Error Code [' . $db_error['code'] . '] Error: ' . $db_error['message'];
            exit();
        }

        // pagination
        $config['base_url'] = site_url('admin/hr_employee_achievement/search');
        $this->db->reset_query();
        $this->db->like('id', $key, 'both');
        $this->db->or_like('points_to_hr_employee_id', $key, 'both');
        $this->db->or_like('points_by_hr_employee_id', $key, 'both');
        $this->db->or_like('description', $key, 'both');
        $this->db->or_like('no_of_units_completed', $key, 'both');
        $this->db->or_like('points_on_unit_task', $key, 'both');
        $this->db->or_like('date_achivement', $key, 'both');
        $this->db->or_like('total_units_points', $key, 'both');

        $config['total_rows'] = $this->db->from("hr_employee_achievement")->count_all_results();
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
        $data['_view'] = 'admin/hr_employee_achievement/index';
        $this->load->view('layouts/admin/body', $data);
    }

    /**
     * Export hr_employee_achievement
     *
     * @param $export_type -
     *            CSV or PDF type
     */
    function export($export_type = 'CSV')
    {
        if ($export_type == 'CSV') {
            // file name
            $filename = 'hr_employee_achievement_' . date('Ymd') . '.csv';
            header("Content-Description: File Transfer");
            header("Content-Disposition: attachment; filename=$filename");
            header("Content-Type: application/csv; ");
            // get data
            $this->db->order_by('id', 'desc');
            $hr_employee_achievementData = $this->Hr_employee_achievement_model->get_all_hr_employee_achievement();
            // file creation
            $file = fopen('php://output', 'w');
            $header = array(
                "Id",
                "Points To Hr Employee Id",
                "Points By Hr Employee Id",
                "Description",
                "No Of Units Completed",
                "Points On Unit Task",
                "Date Achivement",
                "Total Units Points"
            );
            fputcsv($file, $header);
            foreach ($hr_employee_achievementData as $key => $line) {
                fputcsv($file, $line);
            }
            fclose($file);
            exit();
        } else if ($export_type == 'Pdf') {
            $this->db->order_by('id', 'desc');
            $hr_employee_achievement = $this->db->get('hr_employee_achievement')->result_array();
            // get the HTML
            ob_start();
            include (APPPATH . 'views/admin/hr_employee_achievement/print_template.php');
            $html = ob_get_clean();
            require_once FCPATH . 'vendor/autoload.php';
            $mpdf = new \Mpdf\Mpdf();
            $mpdf->WriteHTML($html);
            $mpdf->Output();
            exit();
        }
    }
}
//End of Hr_employee_achievement controller