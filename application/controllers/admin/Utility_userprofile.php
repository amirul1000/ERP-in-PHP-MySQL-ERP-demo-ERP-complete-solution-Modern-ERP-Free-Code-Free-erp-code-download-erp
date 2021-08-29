<?php

/**
 * Author: Amirul Momenin
 * Desc:Utility_userprofile Controller
 *
 */
class Utility_userprofile extends CI_Controller
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
        $this->load->model('Utility_userprofile_model');
        if (! $this->session->userdata('validated')) {
            redirect('admin/login/index');
        }
    }

    /**
     * Index Page for this controller.
     *
     * @param $start -
     *            Starting of utility_userprofile table's index to get query
     *            
     */
    function index($start = 0)
    {
        $limit = 10;
        $data['utility_userprofile'] = $this->Utility_userprofile_model->get_limit_utility_userprofile($limit, $start);
        // pagination
        $config['base_url'] = site_url('admin/utility_userprofile/index');
        $config['total_rows'] = $this->Utility_userprofile_model->get_count_utility_userprofile();
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

        $data['_view'] = 'admin/utility_userprofile/index';
        $this->load->view('layouts/admin/body', $data);
    }

    /**
     * Save utility_userprofile
     *
     * @param $id -
     *            primary key to update
     *            
     */
    function save($id = - 1)
    {
        $params = array(
            'first_name' => html_escape($this->input->post('first_name')),
            'last_name' => html_escape($this->input->post('last_name')),
            'gender' => html_escape($this->input->post('gender')),
            'date_of_birth' => html_escape($this->input->post('date_of_birth')),
            'nationalid' => html_escape($this->input->post('nationalid')),
            'blood_group' => html_escape($this->input->post('blood_group')),
            'marital_status' => html_escape($this->input->post('marital_status')),
            'name_spouse' => html_escape($this->input->post('name_spouse')),
            'email' => html_escape($this->input->post('email')),
            'cell_phone' => html_escape($this->input->post('cell_phone')),
            'land_phone' => html_escape($this->input->post('land_phone')),
            'country' => html_escape($this->input->post('country')),
            'state' => html_escape($this->input->post('state')),
            'city' => html_escape($this->input->post('city')),
            'zip_code' => html_escape($this->input->post('zip_code')),
            'permanent_address' => html_escape($this->input->post('permanent_address')),
            'about' => html_escape($this->input->post('about')),
            'contact_details' => html_escape($this->input->post('contact_details')),
            'latitude' => html_escape($this->input->post('latitude')),
            'longitude' => html_escape($this->input->post('longitude'))
        );

        $data['id'] = $id;
        // update
        if (isset($id) && $id > 0) {
            $data['utility_userprofile'] = $this->Utility_userprofile_model->get_utility_userprofile($id);
            if (isset($_POST) && count($_POST) > 0) {
                $this->Utility_userprofile_model->update_utility_userprofile($id, $params);
                $this->session->set_flashdata('msg', 'Utility_userprofile has been updated successfully');
                redirect('admin/utility_userprofile/index');
            } else {
                $data['_view'] = 'admin/utility_userprofile/form';
                $this->load->view('layouts/admin/body', $data);
            }
        } // save
        else {
            if (isset($_POST) && count($_POST) > 0) {
                $utility_userprofile_id = $this->Utility_userprofile_model->add_utility_userprofile($params);
                $this->session->set_flashdata('msg', 'Utility_userprofile has been saved successfully');
                redirect('admin/utility_userprofile/index');
            } else {
                $data['utility_userprofile'] = $this->Utility_userprofile_model->get_utility_userprofile(0);
                $data['_view'] = 'admin/utility_userprofile/form';
                $this->load->view('layouts/admin/body', $data);
            }
        }
    }

    /**
     * Details utility_userprofile
     *
     * @param $id -
     *            primary key to get record
     *            
     */
    function details($id)
    {
        $data['utility_userprofile'] = $this->Utility_userprofile_model->get_utility_userprofile($id);
        $data['id'] = $id;
        $data['_view'] = 'admin/utility_userprofile/details';
        $this->load->view('layouts/admin/body', $data);
    }

    /**
     * Deleting utility_userprofile
     *
     * @param $id -
     *            primary key to delete record
     *            
     */
    function remove($id)
    {
        $utility_userprofile = $this->Utility_userprofile_model->get_utility_userprofile($id);

        // check if the utility_userprofile exists before trying to delete it
        if (isset($utility_userprofile['id'])) {
            $this->Utility_userprofile_model->delete_utility_userprofile($id);
            $this->session->set_flashdata('msg', 'Utility_userprofile has been deleted successfully');
            redirect('admin/utility_userprofile/index');
        } else
            show_error('The utility_userprofile you are trying to delete does not exist.');
    }

    /**
     * Search utility_userprofile
     *
     * @param $start -
     *            Starting of utility_userprofile table's index to get query
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
        $this->db->or_like('gender', $key, 'both');
        $this->db->or_like('date_of_birth', $key, 'both');
        $this->db->or_like('nationalid', $key, 'both');
        $this->db->or_like('blood_group', $key, 'both');
        $this->db->or_like('marital_status', $key, 'both');
        $this->db->or_like('name_spouse', $key, 'both');
        $this->db->or_like('email', $key, 'both');
        $this->db->or_like('cell_phone', $key, 'both');
        $this->db->or_like('land_phone', $key, 'both');
        $this->db->or_like('country', $key, 'both');
        $this->db->or_like('state', $key, 'both');
        $this->db->or_like('city', $key, 'both');
        $this->db->or_like('zip_code', $key, 'both');
        $this->db->or_like('permanent_address', $key, 'both');
        $this->db->or_like('about', $key, 'both');
        $this->db->or_like('contact_details', $key, 'both');
        $this->db->or_like('latitude', $key, 'both');
        $this->db->or_like('longitude', $key, 'both');

        $this->db->order_by('id', 'desc');

        $this->db->limit($limit, $start);
        $data['utility_userprofile'] = $this->db->get('utility_userprofile')->result_array();
        $db_error = $this->db->error();
        if (! empty($db_error['code'])) {
            echo 'Database error! Error Code [' . $db_error['code'] . '] Error: ' . $db_error['message'];
            exit();
        }

        // pagination
        $config['base_url'] = site_url('admin/utility_userprofile/search');
        $this->db->reset_query();
        $this->db->like('id', $key, 'both');
        $this->db->or_like('first_name', $key, 'both');
        $this->db->or_like('last_name', $key, 'both');
        $this->db->or_like('gender', $key, 'both');
        $this->db->or_like('date_of_birth', $key, 'both');
        $this->db->or_like('nationalid', $key, 'both');
        $this->db->or_like('blood_group', $key, 'both');
        $this->db->or_like('marital_status', $key, 'both');
        $this->db->or_like('name_spouse', $key, 'both');
        $this->db->or_like('email', $key, 'both');
        $this->db->or_like('cell_phone', $key, 'both');
        $this->db->or_like('land_phone', $key, 'both');
        $this->db->or_like('country', $key, 'both');
        $this->db->or_like('state', $key, 'both');
        $this->db->or_like('city', $key, 'both');
        $this->db->or_like('zip_code', $key, 'both');
        $this->db->or_like('permanent_address', $key, 'both');
        $this->db->or_like('about', $key, 'both');
        $this->db->or_like('contact_details', $key, 'both');
        $this->db->or_like('latitude', $key, 'both');
        $this->db->or_like('longitude', $key, 'both');

        $config['total_rows'] = $this->db->from("utility_userprofile")->count_all_results();
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
        $data['_view'] = 'admin/utility_userprofile/index';
        $this->load->view('layouts/admin/body', $data);
    }

    /**
     * Export utility_userprofile
     *
     * @param $export_type -
     *            CSV or PDF type
     */
    function export($export_type = 'CSV')
    {
        if ($export_type == 'CSV') {
            // file name
            $filename = 'utility_userprofile_' . date('Ymd') . '.csv';
            header("Content-Description: File Transfer");
            header("Content-Disposition: attachment; filename=$filename");
            header("Content-Type: application/csv; ");
            // get data
            $this->db->order_by('id', 'desc');
            $utility_userprofileData = $this->Utility_userprofile_model->get_all_utility_userprofile();
            // file creation
            $file = fopen('php://output', 'w');
            $header = array(
                "Id",
                "First Name",
                "Last Name",
                "Gender",
                "Date Of Birth",
                "Nationalid",
                "Blood Group",
                "Marital Status",
                "Name Spouse",
                "Email",
                "Cell Phone",
                "Land Phone",
                "Country",
                "State",
                "City",
                "Zip Code",
                "Permanent Address",
                "About",
                "Contact Details",
                "Latitude",
                "Longitude"
            );
            fputcsv($file, $header);
            foreach ($utility_userprofileData as $key => $line) {
                fputcsv($file, $line);
            }
            fclose($file);
            exit();
        } else if ($export_type == 'Pdf') {
            $this->db->order_by('id', 'desc');
            $utility_userprofile = $this->db->get('utility_userprofile')->result_array();
            // get the HTML
            ob_start();
            include (APPPATH . 'views/admin/utility_userprofile/print_template.php');
            $html = ob_get_clean();
            require_once FCPATH . 'vendor/autoload.php';
            $mpdf = new \Mpdf\Mpdf();
            $mpdf->WriteHTML($html);
            $mpdf->Output();
            exit();
        }
    }
}
//End of Utility_userprofile controller