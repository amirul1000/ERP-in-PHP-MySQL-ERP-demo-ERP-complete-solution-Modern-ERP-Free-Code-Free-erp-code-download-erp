<?php

/**
 * Author: Amirul Momenin
 * Desc:Utility_companybranch Controller
 *
 */
class Utility_companybranch extends CI_Controller
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
        $this->load->model('Utility_companybranch_model');
        if (! $this->session->userdata('validated')) {
            redirect('admin/login/index');
        }
    }

    /**
     * Index Page for this controller.
     *
     * @param $start -
     *            Starting of utility_companybranch table's index to get query
     *            
     */
    function index($start = 0)
    {
        $limit = 10;
        $data['utility_companybranch'] = $this->Utility_companybranch_model->get_limit_utility_companybranch($limit, $start);
        // pagination
        $config['base_url'] = site_url('admin/utility_companybranch/index');
        $config['total_rows'] = $this->Utility_companybranch_model->get_count_utility_companybranch();
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

        $data['_view'] = 'admin/utility_companybranch/index';
        $this->load->view('layouts/admin/body', $data);
    }

    /**
     * Save utility_companybranch
     *
     * @param $id -
     *            primary key to update
     *            
     */
    function save($id = - 1)
    {
        $params = array(
            'name' => html_escape($this->input->post('name')),
            'description' => html_escape($this->input->post('description')),
            'email' => html_escape($this->input->post('email')),
            'cell_phone' => html_escape($this->input->post('cell_phone')),
            'land_phone' => html_escape($this->input->post('land_phone')),
            'country' => html_escape($this->input->post('country')),
            'state' => html_escape($this->input->post('state')),
            'city' => html_escape($this->input->post('city')),
            'zip_code' => html_escape($this->input->post('zip_code')),
            'about' => html_escape($this->input->post('about')),
            'contact_details' => html_escape($this->input->post('contact_details')),
            'latitude' => html_escape($this->input->post('latitude')),
            'longitude' => html_escape($this->input->post('longitude')),
            'year_established' => html_escape($this->input->post('year_established')),
            'total_employees' => html_escape($this->input->post('total_employees')),
            'business_type' => html_escape($this->input->post('business_type')),
            'main_products' => html_escape($this->input->post('main_products')),
            'total_annual_revenue' => html_escape($this->input->post('total_annual_revenue')),
            'url' => html_escape($this->input->post('url')),
            'social_link' => html_escape($this->input->post('social_link')),
            'utility_company_id' => html_escape($this->input->post('utility_company_id'))
        );

        $data['id'] = $id;
        // update
        if (isset($id) && $id > 0) {
            $data['utility_companybranch'] = $this->Utility_companybranch_model->get_utility_companybranch($id);
            if (isset($_POST) && count($_POST) > 0) {
                $this->Utility_companybranch_model->update_utility_companybranch($id, $params);
                $this->session->set_flashdata('msg', 'Utility_companybranch has been updated successfully');
                redirect('admin/utility_companybranch/index');
            } else {
                $data['_view'] = 'admin/utility_companybranch/form';
                $this->load->view('layouts/admin/body', $data);
            }
        } // save
        else {
            if (isset($_POST) && count($_POST) > 0) {
                $utility_companybranch_id = $this->Utility_companybranch_model->add_utility_companybranch($params);
                $this->session->set_flashdata('msg', 'Utility_companybranch has been saved successfully');
                redirect('admin/utility_companybranch/index');
            } else {
                $data['utility_companybranch'] = $this->Utility_companybranch_model->get_utility_companybranch(0);
                $data['_view'] = 'admin/utility_companybranch/form';
                $this->load->view('layouts/admin/body', $data);
            }
        }
    }

    /**
     * Details utility_companybranch
     *
     * @param $id -
     *            primary key to get record
     *            
     */
    function details($id)
    {
        $data['utility_companybranch'] = $this->Utility_companybranch_model->get_utility_companybranch($id);
        $data['id'] = $id;
        $data['_view'] = 'admin/utility_companybranch/details';
        $this->load->view('layouts/admin/body', $data);
    }

    /**
     * Deleting utility_companybranch
     *
     * @param $id -
     *            primary key to delete record
     *            
     */
    function remove($id)
    {
        $utility_companybranch = $this->Utility_companybranch_model->get_utility_companybranch($id);

        // check if the utility_companybranch exists before trying to delete it
        if (isset($utility_companybranch['id'])) {
            $this->Utility_companybranch_model->delete_utility_companybranch($id);
            $this->session->set_flashdata('msg', 'Utility_companybranch has been deleted successfully');
            redirect('admin/utility_companybranch/index');
        } else
            show_error('The utility_companybranch you are trying to delete does not exist.');
    }

    /**
     * Search utility_companybranch
     *
     * @param $start -
     *            Starting of utility_companybranch table's index to get query
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
        $this->db->or_like('name', $key, 'both');
        $this->db->or_like('description', $key, 'both');
        $this->db->or_like('email', $key, 'both');
        $this->db->or_like('cell_phone', $key, 'both');
        $this->db->or_like('land_phone', $key, 'both');
        $this->db->or_like('country', $key, 'both');
        $this->db->or_like('state', $key, 'both');
        $this->db->or_like('city', $key, 'both');
        $this->db->or_like('zip_code', $key, 'both');
        $this->db->or_like('about', $key, 'both');
        $this->db->or_like('contact_details', $key, 'both');
        $this->db->or_like('latitude', $key, 'both');
        $this->db->or_like('longitude', $key, 'both');
        $this->db->or_like('year_established', $key, 'both');
        $this->db->or_like('total_employees', $key, 'both');
        $this->db->or_like('business_type', $key, 'both');
        $this->db->or_like('main_products', $key, 'both');
        $this->db->or_like('total_annual_revenue', $key, 'both');
        $this->db->or_like('url', $key, 'both');
        $this->db->or_like('social_link', $key, 'both');
        $this->db->or_like('utility_company_id', $key, 'both');

        $this->db->order_by('id', 'desc');

        $this->db->limit($limit, $start);
        $data['utility_companybranch'] = $this->db->get('utility_companybranch')->result_array();
        $db_error = $this->db->error();
        if (! empty($db_error['code'])) {
            echo 'Database error! Error Code [' . $db_error['code'] . '] Error: ' . $db_error['message'];
            exit();
        }

        // pagination
        $config['base_url'] = site_url('admin/utility_companybranch/search');
        $this->db->reset_query();
        $this->db->like('id', $key, 'both');
        $this->db->or_like('name', $key, 'both');
        $this->db->or_like('description', $key, 'both');
        $this->db->or_like('email', $key, 'both');
        $this->db->or_like('cell_phone', $key, 'both');
        $this->db->or_like('land_phone', $key, 'both');
        $this->db->or_like('country', $key, 'both');
        $this->db->or_like('state', $key, 'both');
        $this->db->or_like('city', $key, 'both');
        $this->db->or_like('zip_code', $key, 'both');
        $this->db->or_like('about', $key, 'both');
        $this->db->or_like('contact_details', $key, 'both');
        $this->db->or_like('latitude', $key, 'both');
        $this->db->or_like('longitude', $key, 'both');
        $this->db->or_like('year_established', $key, 'both');
        $this->db->or_like('total_employees', $key, 'both');
        $this->db->or_like('business_type', $key, 'both');
        $this->db->or_like('main_products', $key, 'both');
        $this->db->or_like('total_annual_revenue', $key, 'both');
        $this->db->or_like('url', $key, 'both');
        $this->db->or_like('social_link', $key, 'both');
        $this->db->or_like('utility_company_id', $key, 'both');

        $config['total_rows'] = $this->db->from("utility_companybranch")->count_all_results();
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
        $data['_view'] = 'admin/utility_companybranch/index';
        $this->load->view('layouts/admin/body', $data);
    }

    /**
     * Export utility_companybranch
     *
     * @param $export_type -
     *            CSV or PDF type
     */
    function export($export_type = 'CSV')
    {
        if ($export_type == 'CSV') {
            // file name
            $filename = 'utility_companybranch_' . date('Ymd') . '.csv';
            header("Content-Description: File Transfer");
            header("Content-Disposition: attachment; filename=$filename");
            header("Content-Type: application/csv; ");
            // get data
            $this->db->order_by('id', 'desc');
            $utility_companybranchData = $this->Utility_companybranch_model->get_all_utility_companybranch();
            // file creation
            $file = fopen('php://output', 'w');
            $header = array(
                "Id",
                "Name",
                "Description",
                "Email",
                "Cell Phone",
                "Land Phone",
                "Country",
                "State",
                "City",
                "Zip Code",
                "About",
                "Contact Details",
                "Latitude",
                "Longitude",
                "Year Established",
                "Total Employees",
                "Business Type",
                "Main Products",
                "Total Annual Revenue",
                "Url",
                "Social Link",
                "Utility Company Id"
            );
            fputcsv($file, $header);
            foreach ($utility_companybranchData as $key => $line) {
                fputcsv($file, $line);
            }
            fclose($file);
            exit();
        } else if ($export_type == 'Pdf') {
            $this->db->order_by('id', 'desc');
            $utility_companybranch = $this->db->get('utility_companybranch')->result_array();
            // get the HTML
            ob_start();
            include (APPPATH . 'views/admin/utility_companybranch/print_template.php');
            $html = ob_get_clean();
            require_once FCPATH . 'vendor/autoload.php';
            $mpdf = new \Mpdf\Mpdf();
            $mpdf->WriteHTML($html);
            $mpdf->Output();
            exit();
        }
    }
}
//End of Utility_companybranch controller