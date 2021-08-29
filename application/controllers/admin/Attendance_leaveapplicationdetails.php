<?php

/**
 * Author: Amirul Momenin
 * Desc:Attendance_leaveapplicationdetails Controller
 *
 */
class Attendance_leaveapplicationdetails extends CI_Controller
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
        $this->load->model('Attendance_leaveapplicationdetails_model');
        if (! $this->session->userdata('validated')) {
            redirect('admin/login/index');
        }
    }

    /**
     * Index Page for this controller.
     *
     * @param $start -
     *            Starting of attendance_leaveapplicationdetails table's index to get query
     *            
     */
    function index($start = 0)
    {
        $limit = 10;
        $data['attendance_leaveapplicationdetails'] = $this->Attendance_leaveapplicationdetails_model->get_limit_attendance_leaveapplicationdetails($limit, $start);
        // pagination
        $config['base_url'] = site_url('admin/attendance_leaveapplicationdetails/index');
        $config['total_rows'] = $this->Attendance_leaveapplicationdetails_model->get_count_attendance_leaveapplicationdetails();
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

        $data['_view'] = 'admin/attendance_leaveapplicationdetails/index';
        $this->load->view('layouts/admin/body', $data);
    }

    /**
     * Save attendance_leaveapplicationdetails
     *
     * @param $id -
     *            primary key to update
     *            
     */
    function save($id = - 1)
    {
        $params = array(
            'comments' => html_escape($this->input->post('comments')),
            'comment_by_users_id' => html_escape($this->input->post('comment_by_users_id')),
            'attendance_leaveapplication_id' => html_escape($this->input->post('attendance_leaveapplication_id'))
        );

        $data['id'] = $id;
        // update
        if (isset($id) && $id > 0) {
            $data['attendance_leaveapplicationdetails'] = $this->Attendance_leaveapplicationdetails_model->get_attendance_leaveapplicationdetails($id);
            if (isset($_POST) && count($_POST) > 0) {
                $this->Attendance_leaveapplicationdetails_model->update_attendance_leaveapplicationdetails($id, $params);
                $this->session->set_flashdata('msg', 'Attendance_leaveapplicationdetails has been updated successfully');
                redirect('admin/attendance_leaveapplicationdetails/index');
            } else {
                $data['_view'] = 'admin/attendance_leaveapplicationdetails/form';
                $this->load->view('layouts/admin/body', $data);
            }
        } // save
        else {
            if (isset($_POST) && count($_POST) > 0) {
                $attendance_leaveapplicationdetails_id = $this->Attendance_leaveapplicationdetails_model->add_attendance_leaveapplicationdetails($params);
                $this->session->set_flashdata('msg', 'Attendance_leaveapplicationdetails has been saved successfully');
                redirect('admin/attendance_leaveapplicationdetails/index');
            } else {
                $data['attendance_leaveapplicationdetails'] = $this->Attendance_leaveapplicationdetails_model->get_attendance_leaveapplicationdetails(0);
                $data['_view'] = 'admin/attendance_leaveapplicationdetails/form';
                $this->load->view('layouts/admin/body', $data);
            }
        }
    }

    /**
     * Details attendance_leaveapplicationdetails
     *
     * @param $id -
     *            primary key to get record
     *            
     */
    function details($id)
    {
        $data['attendance_leaveapplicationdetails'] = $this->Attendance_leaveapplicationdetails_model->get_attendance_leaveapplicationdetails($id);
        $data['id'] = $id;
        $data['_view'] = 'admin/attendance_leaveapplicationdetails/details';
        $this->load->view('layouts/admin/body', $data);
    }

    /**
     * Deleting attendance_leaveapplicationdetails
     *
     * @param $id -
     *            primary key to delete record
     *            
     */
    function remove($id)
    {
        $attendance_leaveapplicationdetails = $this->Attendance_leaveapplicationdetails_model->get_attendance_leaveapplicationdetails($id);

        // check if the attendance_leaveapplicationdetails exists before trying to delete it
        if (isset($attendance_leaveapplicationdetails['id'])) {
            $this->Attendance_leaveapplicationdetails_model->delete_attendance_leaveapplicationdetails($id);
            $this->session->set_flashdata('msg', 'Attendance_leaveapplicationdetails has been deleted successfully');
            redirect('admin/attendance_leaveapplicationdetails/index');
        } else
            show_error('The attendance_leaveapplicationdetails you are trying to delete does not exist.');
    }

    /**
     * Search attendance_leaveapplicationdetails
     *
     * @param $start -
     *            Starting of attendance_leaveapplicationdetails table's index to get query
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
        $this->db->or_like('comments', $key, 'both');
        $this->db->or_like('comment_by_users_id', $key, 'both');
        $this->db->or_like('attendance_leaveapplication_id', $key, 'both');

        $this->db->order_by('id', 'desc');

        $this->db->limit($limit, $start);
        $data['attendance_leaveapplicationdetails'] = $this->db->get('attendance_leaveapplicationdetails')->result_array();
        $db_error = $this->db->error();
        if (! empty($db_error['code'])) {
            echo 'Database error! Error Code [' . $db_error['code'] . '] Error: ' . $db_error['message'];
            exit();
        }

        // pagination
        $config['base_url'] = site_url('admin/attendance_leaveapplicationdetails/search');
        $this->db->reset_query();
        $this->db->like('id', $key, 'both');
        $this->db->or_like('comments', $key, 'both');
        $this->db->or_like('comment_by_users_id', $key, 'both');
        $this->db->or_like('attendance_leaveapplication_id', $key, 'both');

        $config['total_rows'] = $this->db->from("attendance_leaveapplicationdetails")->count_all_results();
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
        $data['_view'] = 'admin/attendance_leaveapplicationdetails/index';
        $this->load->view('layouts/admin/body', $data);
    }

    /**
     * Export attendance_leaveapplicationdetails
     *
     * @param $export_type -
     *            CSV or PDF type
     */
    function export($export_type = 'CSV')
    {
        if ($export_type == 'CSV') {
            // file name
            $filename = 'attendance_leaveapplicationdetails_' . date('Ymd') . '.csv';
            header("Content-Description: File Transfer");
            header("Content-Disposition: attachment; filename=$filename");
            header("Content-Type: application/csv; ");
            // get data
            $this->db->order_by('id', 'desc');
            $attendance_leaveapplicationdetailsData = $this->Attendance_leaveapplicationdetails_model->get_all_attendance_leaveapplicationdetails();
            // file creation
            $file = fopen('php://output', 'w');
            $header = array(
                "Id",
                "Comments",
                "Comment By Users Id",
                "Attendance Leaveapplication Id"
            );
            fputcsv($file, $header);
            foreach ($attendance_leaveapplicationdetailsData as $key => $line) {
                fputcsv($file, $line);
            }
            fclose($file);
            exit();
        } else if ($export_type == 'Pdf') {
            $this->db->order_by('id', 'desc');
            $attendance_leaveapplicationdetails = $this->db->get('attendance_leaveapplicationdetails')->result_array();
            // get the HTML
            ob_start();
            include (APPPATH . 'views/admin/attendance_leaveapplicationdetails/print_template.php');
            $html = ob_get_clean();
            require_once FCPATH . 'vendor/autoload.php';
            $mpdf = new \Mpdf\Mpdf();
            $mpdf->WriteHTML($html);
            $mpdf->Output();
            exit();
        }
    }
}
//End of Attendance_leaveapplicationdetails controller