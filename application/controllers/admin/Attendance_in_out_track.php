<?php

/**
 * Author: Amirul Momenin
 * Desc:Attendance_in_out_track Controller
 *
 */
class Attendance_in_out_track extends CI_Controller
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
        $this->load->model('Attendance_in_out_track_model');
        if (! $this->session->userdata('validated')) {
            redirect('admin/login/index');
        }
    }

    /**
     * Index Page for this controller.
     *
     * @param $start -
     *            Starting of attendance_in_out_track table's index to get query
     *            
     */
    function index($start = 0)
    {
        $limit = 10;
        $data['attendance_in_out_track'] = $this->Attendance_in_out_track_model->get_limit_attendance_in_out_track($limit, $start);
        // pagination
        $config['base_url'] = site_url('admin/attendance_in_out_track/index');
        $config['total_rows'] = $this->Attendance_in_out_track_model->get_count_attendance_in_out_track();
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

        $data['_view'] = 'admin/attendance_in_out_track/index';
        $this->load->view('layouts/admin/body', $data);
    }

    /**
     * Save attendance_in_out_track
     *
     * @param $id -
     *            primary key to update
     *            
     */
    function save($id = - 1)
    {
        $params = array(
            'time_occure' => html_escape($this->input->post('time_occure')),
            'in_out' => html_escape($this->input->post('in_out')),
            'entry_card_status' => html_escape($this->input->post('entry_card_status')),
            'comments' => html_escape($this->input->post('comments')),
            'attendance_attendance_id' => html_escape($this->input->post('attendance_attendance_id'))
        );

        $data['id'] = $id;
        // update
        if (isset($id) && $id > 0) {
            $data['attendance_in_out_track'] = $this->Attendance_in_out_track_model->get_attendance_in_out_track($id);
            if (isset($_POST) && count($_POST) > 0) {
                $this->Attendance_in_out_track_model->update_attendance_in_out_track($id, $params);
                $this->session->set_flashdata('msg', 'Attendance_in_out_track has been updated successfully');
                redirect('admin/attendance_in_out_track/index');
            } else {
                $data['_view'] = 'admin/attendance_in_out_track/form';
                $this->load->view('layouts/admin/body', $data);
            }
        } // save
        else {
            if (isset($_POST) && count($_POST) > 0) {
                $attendance_in_out_track_id = $this->Attendance_in_out_track_model->add_attendance_in_out_track($params);
                $this->session->set_flashdata('msg', 'Attendance_in_out_track has been saved successfully');
                redirect('admin/attendance_in_out_track/index');
            } else {
                $data['attendance_in_out_track'] = $this->Attendance_in_out_track_model->get_attendance_in_out_track(0);
                $data['_view'] = 'admin/attendance_in_out_track/form';
                $this->load->view('layouts/admin/body', $data);
            }
        }
    }

    /**
     * Details attendance_in_out_track
     *
     * @param $id -
     *            primary key to get record
     *            
     */
    function details($id)
    {
        $data['attendance_in_out_track'] = $this->Attendance_in_out_track_model->get_attendance_in_out_track($id);
        $data['id'] = $id;
        $data['_view'] = 'admin/attendance_in_out_track/details';
        $this->load->view('layouts/admin/body', $data);
    }

    /**
     * Deleting attendance_in_out_track
     *
     * @param $id -
     *            primary key to delete record
     *            
     */
    function remove($id)
    {
        $attendance_in_out_track = $this->Attendance_in_out_track_model->get_attendance_in_out_track($id);

        // check if the attendance_in_out_track exists before trying to delete it
        if (isset($attendance_in_out_track['id'])) {
            $this->Attendance_in_out_track_model->delete_attendance_in_out_track($id);
            $this->session->set_flashdata('msg', 'Attendance_in_out_track has been deleted successfully');
            redirect('admin/attendance_in_out_track/index');
        } else
            show_error('The attendance_in_out_track you are trying to delete does not exist.');
    }

    /**
     * Search attendance_in_out_track
     *
     * @param $start -
     *            Starting of attendance_in_out_track table's index to get query
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
        $this->db->or_like('time_occure', $key, 'both');
        $this->db->or_like('in_out', $key, 'both');
        $this->db->or_like('entry_card_status', $key, 'both');
        $this->db->or_like('comments', $key, 'both');
        $this->db->or_like('attendance_attendance_id', $key, 'both');

        $this->db->order_by('id', 'desc');

        $this->db->limit($limit, $start);
        $data['attendance_in_out_track'] = $this->db->get('attendance_in_out_track')->result_array();
        $db_error = $this->db->error();
        if (! empty($db_error['code'])) {
            echo 'Database error! Error Code [' . $db_error['code'] . '] Error: ' . $db_error['message'];
            exit();
        }

        // pagination
        $config['base_url'] = site_url('admin/attendance_in_out_track/search');
        $this->db->reset_query();
        $this->db->like('id', $key, 'both');
        $this->db->or_like('time_occure', $key, 'both');
        $this->db->or_like('in_out', $key, 'both');
        $this->db->or_like('entry_card_status', $key, 'both');
        $this->db->or_like('comments', $key, 'both');
        $this->db->or_like('attendance_attendance_id', $key, 'both');

        $config['total_rows'] = $this->db->from("attendance_in_out_track")->count_all_results();
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
        $data['_view'] = 'admin/attendance_in_out_track/index';
        $this->load->view('layouts/admin/body', $data);
    }

    /**
     * Export attendance_in_out_track
     *
     * @param $export_type -
     *            CSV or PDF type
     */
    function export($export_type = 'CSV')
    {
        if ($export_type == 'CSV') {
            // file name
            $filename = 'attendance_in_out_track_' . date('Ymd') . '.csv';
            header("Content-Description: File Transfer");
            header("Content-Disposition: attachment; filename=$filename");
            header("Content-Type: application/csv; ");
            // get data
            $this->db->order_by('id', 'desc');
            $attendance_in_out_trackData = $this->Attendance_in_out_track_model->get_all_attendance_in_out_track();
            // file creation
            $file = fopen('php://output', 'w');
            $header = array(
                "Id",
                "Time Occure",
                "In Out",
                "Entry Card Status",
                "Comments",
                "Attendance Attendance Id"
            );
            fputcsv($file, $header);
            foreach ($attendance_in_out_trackData as $key => $line) {
                fputcsv($file, $line);
            }
            fclose($file);
            exit();
        } else if ($export_type == 'Pdf') {
            $this->db->order_by('id', 'desc');
            $attendance_in_out_track = $this->db->get('attendance_in_out_track')->result_array();
            // get the HTML
            ob_start();
            include (APPPATH . 'views/admin/attendance_in_out_track/print_template.php');
            $html = ob_get_clean();
            require_once FCPATH . 'vendor/autoload.php';
            $mpdf = new \Mpdf\Mpdf();
            $mpdf->WriteHTML($html);
            $mpdf->Output();
            exit();
        }
    }
}
//End of Attendance_in_out_track controller