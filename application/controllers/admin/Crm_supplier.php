<?php

/**
 * Author: Amirul Momenin
 * Desc:Crm_supplier Controller
 *
 */
class Crm_supplier extends CI_Controller
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
        $this->load->model('Crm_supplier_model');
        if (! $this->session->userdata('validated')) {
            redirect('admin/login/index');
        }
    }

    /**
     * Index Page for this controller.
     *
     * @param $start -
     *            Starting of crm_supplier table's index to get query
     *            
     */
    function index($start = 0)
    {
        $limit = 10;
        $data['crm_supplier'] = $this->Crm_supplier_model->get_limit_crm_supplier($limit, $start);
        // pagination
        $config['base_url'] = site_url('admin/crm_supplier/index');
        $config['total_rows'] = $this->Crm_supplier_model->get_count_crm_supplier();
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

        $data['_view'] = 'admin/crm_supplier/index';
        $this->load->view('layouts/admin/body', $data);
    }

    /**
     * Save crm_supplier
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
            'longitude' => html_escape($this->input->post('longitude')),
            'license_number' => html_escape($this->input->post('license_number')),
            'utility_businesstype_id' => html_escape($this->input->post('utility_businesstype_id')),
            'users_id' => html_escape($this->input->post('users_id')),
            'crm_billingaddress_id' => html_escape($this->input->post('crm_billingaddress_id')),
            'crm_shippingaddress_id' => html_escape($this->input->post('crm_shippingaddress_id'))
        );

        $data['id'] = $id;
        // update
        if (isset($id) && $id > 0) {
            $data['crm_supplier'] = $this->Crm_supplier_model->get_crm_supplier($id);
            if (isset($_POST) && count($_POST) > 0) {
                $this->Crm_supplier_model->update_crm_supplier($id, $params);
                $this->session->set_flashdata('msg', 'Crm_supplier has been updated successfully');
                redirect('admin/crm_supplier/index');
            } else {
                $data['_view'] = 'admin/crm_supplier/form';
                $this->load->view('layouts/admin/body', $data);
            }
        } // save
        else {
            if (isset($_POST) && count($_POST) > 0) {
                $crm_supplier_id = $this->Crm_supplier_model->add_crm_supplier($params);
                $this->session->set_flashdata('msg', 'Crm_supplier has been saved successfully');
                redirect('admin/crm_supplier/index');
            } else {
                $data['crm_supplier'] = $this->Crm_supplier_model->get_crm_supplier(0);
                $data['_view'] = 'admin/crm_supplier/form';
                $this->load->view('layouts/admin/body', $data);
            }
        }
    }

    /**
     * Details crm_supplier
     *
     * @param $id -
     *            primary key to get record
     *            
     */
    function details($id)
    {
        $data['crm_supplier'] = $this->Crm_supplier_model->get_crm_supplier($id);
        $data['id'] = $id;
        $data['_view'] = 'admin/crm_supplier/details';
        $this->load->view('layouts/admin/body', $data);
    }

    /**
     * Deleting crm_supplier
     *
     * @param $id -
     *            primary key to delete record
     *            
     */
    function remove($id)
    {
        $crm_supplier = $this->Crm_supplier_model->get_crm_supplier($id);

        // check if the crm_supplier exists before trying to delete it
        if (isset($crm_supplier['id'])) {
            $this->Crm_supplier_model->delete_crm_supplier($id);
            $this->session->set_flashdata('msg', 'Crm_supplier has been deleted successfully');
            redirect('admin/crm_supplier/index');
        } else
            show_error('The crm_supplier you are trying to delete does not exist.');
    }

    /**
     * Search crm_supplier
     *
     * @param $start -
     *            Starting of crm_supplier table's index to get query
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
        $this->db->or_like('license_number', $key, 'both');
        $this->db->or_like('utility_businesstype_id', $key, 'both');
        $this->db->or_like('users_id', $key, 'both');
        $this->db->or_like('crm_billingaddress_id', $key, 'both');
        $this->db->or_like('crm_shippingaddress_id', $key, 'both');

        $this->db->order_by('id', 'desc');

        $this->db->limit($limit, $start);
        $data['crm_supplier'] = $this->db->get('crm_supplier')->result_array();
        $db_error = $this->db->error();
        if (! empty($db_error['code'])) {
            echo 'Database error! Error Code [' . $db_error['code'] . '] Error: ' . $db_error['message'];
            exit();
        }

        // pagination
        $config['base_url'] = site_url('admin/crm_supplier/search');
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
        $this->db->or_like('license_number', $key, 'both');
        $this->db->or_like('utility_businesstype_id', $key, 'both');
        $this->db->or_like('users_id', $key, 'both');
        $this->db->or_like('crm_billingaddress_id', $key, 'both');
        $this->db->or_like('crm_shippingaddress_id', $key, 'both');

        $config['total_rows'] = $this->db->from("crm_supplier")->count_all_results();
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
        $data['_view'] = 'admin/crm_supplier/index';
        $this->load->view('layouts/admin/body', $data);
    }

    /**
     * Export crm_supplier
     *
     * @param $export_type -
     *            CSV or PDF type
     */
    function export($export_type = 'CSV')
    {
        if ($export_type == 'CSV') {
            // file name
            $filename = 'crm_supplier_' . date('Ymd') . '.csv';
            header("Content-Description: File Transfer");
            header("Content-Disposition: attachment; filename=$filename");
            header("Content-Type: application/csv; ");
            // get data
            $this->db->order_by('id', 'desc');
            $crm_supplierData = $this->Crm_supplier_model->get_all_crm_supplier();
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
                "Longitude",
                "License Number",
                "Utility Businesstype Id",
                "Users Id",
                "Crm Billingaddress Id",
                "Crm Shippingaddress Id"
            );
            fputcsv($file, $header);
            foreach ($crm_supplierData as $key => $line) {
                fputcsv($file, $line);
            }
            fclose($file);
            exit();
        } else if ($export_type == 'Pdf') {
            $this->db->order_by('id', 'desc');
            $crm_supplier = $this->db->get('crm_supplier')->result_array();
            // get the HTML
            ob_start();
            include (APPPATH . 'views/admin/crm_supplier/print_template.php');
            $html = ob_get_clean();
            require_once FCPATH . 'vendor/autoload.php';
            $mpdf = new \Mpdf\Mpdf();
            $mpdf->WriteHTML($html);
            $mpdf->Output();
            exit();
        }
    }
}
//End of Crm_supplier controller