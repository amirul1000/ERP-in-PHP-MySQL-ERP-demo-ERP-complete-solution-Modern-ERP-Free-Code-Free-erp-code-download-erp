<?php

/**
 * Author: Amirul Momenin
 * Desc:Crm_shippingaddress Controller
 *
 */
class Crm_shippingaddress extends CI_Controller
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
        $this->load->model('Crm_shippingaddress_model');
        if (! $this->session->userdata('validated')) {
            redirect('admin/login/index');
        }
    }

    /**
     * Index Page for this controller.
     *
     * @param $start -
     *            Starting of crm_shippingaddress table's index to get query
     *            
     */
    function index($start = 0)
    {
        $limit = 10;
        $data['crm_shippingaddress'] = $this->Crm_shippingaddress_model->get_limit_crm_shippingaddress($limit, $start);
        // pagination
        $config['base_url'] = site_url('admin/crm_shippingaddress/index');
        $config['total_rows'] = $this->Crm_shippingaddress_model->get_count_crm_shippingaddress();
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

        $data['_view'] = 'admin/crm_shippingaddress/index';
        $this->load->view('layouts/admin/body', $data);
    }

    /**
     * Save crm_shippingaddress
     *
     * @param $id -
     *            primary key to update
     *            
     */
    function save($id = - 1)
    {
        $params = array(
            'address1' => html_escape($this->input->post('address1')),
            'address2' => html_escape($this->input->post('address2')),
            'country' => html_escape($this->input->post('country')),
            'state' => html_escape($this->input->post('state')),
            'city' => html_escape($this->input->post('city')),
            'zip_code' => html_escape($this->input->post('zip_code'))
        );

        $data['id'] = $id;
        // update
        if (isset($id) && $id > 0) {
            $data['crm_shippingaddress'] = $this->Crm_shippingaddress_model->get_crm_shippingaddress($id);
            if (isset($_POST) && count($_POST) > 0) {
                $this->Crm_shippingaddress_model->update_crm_shippingaddress($id, $params);
                $this->session->set_flashdata('msg', 'Crm_shippingaddress has been updated successfully');
                redirect('admin/crm_shippingaddress/index');
            } else {
                $data['_view'] = 'admin/crm_shippingaddress/form';
                $this->load->view('layouts/admin/body', $data);
            }
        } // save
        else {
            if (isset($_POST) && count($_POST) > 0) {
                $crm_shippingaddress_id = $this->Crm_shippingaddress_model->add_crm_shippingaddress($params);
                $this->session->set_flashdata('msg', 'Crm_shippingaddress has been saved successfully');
                redirect('admin/crm_shippingaddress/index');
            } else {
                $data['crm_shippingaddress'] = $this->Crm_shippingaddress_model->get_crm_shippingaddress(0);
                $data['_view'] = 'admin/crm_shippingaddress/form';
                $this->load->view('layouts/admin/body', $data);
            }
        }
    }

    /**
     * Details crm_shippingaddress
     *
     * @param $id -
     *            primary key to get record
     *            
     */
    function details($id)
    {
        $data['crm_shippingaddress'] = $this->Crm_shippingaddress_model->get_crm_shippingaddress($id);
        $data['id'] = $id;
        $data['_view'] = 'admin/crm_shippingaddress/details';
        $this->load->view('layouts/admin/body', $data);
    }

    /**
     * Deleting crm_shippingaddress
     *
     * @param $id -
     *            primary key to delete record
     *            
     */
    function remove($id)
    {
        $crm_shippingaddress = $this->Crm_shippingaddress_model->get_crm_shippingaddress($id);

        // check if the crm_shippingaddress exists before trying to delete it
        if (isset($crm_shippingaddress['id'])) {
            $this->Crm_shippingaddress_model->delete_crm_shippingaddress($id);
            $this->session->set_flashdata('msg', 'Crm_shippingaddress has been deleted successfully');
            redirect('admin/crm_shippingaddress/index');
        } else
            show_error('The crm_shippingaddress you are trying to delete does not exist.');
    }

    /**
     * Search crm_shippingaddress
     *
     * @param $start -
     *            Starting of crm_shippingaddress table's index to get query
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
        $this->db->or_like('address1', $key, 'both');
        $this->db->or_like('address2', $key, 'both');
        $this->db->or_like('country', $key, 'both');
        $this->db->or_like('state', $key, 'both');
        $this->db->or_like('city', $key, 'both');
        $this->db->or_like('zip_code', $key, 'both');

        $this->db->order_by('id', 'desc');

        $this->db->limit($limit, $start);
        $data['crm_shippingaddress'] = $this->db->get('crm_shippingaddress')->result_array();
        $db_error = $this->db->error();
        if (! empty($db_error['code'])) {
            echo 'Database error! Error Code [' . $db_error['code'] . '] Error: ' . $db_error['message'];
            exit();
        }

        // pagination
        $config['base_url'] = site_url('admin/crm_shippingaddress/search');
        $this->db->reset_query();
        $this->db->like('id', $key, 'both');
        $this->db->or_like('address1', $key, 'both');
        $this->db->or_like('address2', $key, 'both');
        $this->db->or_like('country', $key, 'both');
        $this->db->or_like('state', $key, 'both');
        $this->db->or_like('city', $key, 'both');
        $this->db->or_like('zip_code', $key, 'both');

        $config['total_rows'] = $this->db->from("crm_shippingaddress")->count_all_results();
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
        $data['_view'] = 'admin/crm_shippingaddress/index';
        $this->load->view('layouts/admin/body', $data);
    }

    /**
     * Export crm_shippingaddress
     *
     * @param $export_type -
     *            CSV or PDF type
     */
    function export($export_type = 'CSV')
    {
        if ($export_type == 'CSV') {
            // file name
            $filename = 'crm_shippingaddress_' . date('Ymd') . '.csv';
            header("Content-Description: File Transfer");
            header("Content-Disposition: attachment; filename=$filename");
            header("Content-Type: application/csv; ");
            // get data
            $this->db->order_by('id', 'desc');
            $crm_shippingaddressData = $this->Crm_shippingaddress_model->get_all_crm_shippingaddress();
            // file creation
            $file = fopen('php://output', 'w');
            $header = array(
                "Id",
                "Address1",
                "Address2",
                "Country",
                "State",
                "City",
                "Zip Code"
            );
            fputcsv($file, $header);
            foreach ($crm_shippingaddressData as $key => $line) {
                fputcsv($file, $line);
            }
            fclose($file);
            exit();
        } else if ($export_type == 'Pdf') {
            $this->db->order_by('id', 'desc');
            $crm_shippingaddress = $this->db->get('crm_shippingaddress')->result_array();
            // get the HTML
            ob_start();
            include (APPPATH . 'views/admin/crm_shippingaddress/print_template.php');
            $html = ob_get_clean();
            require_once FCPATH . 'vendor/autoload.php';
            $mpdf = new \Mpdf\Mpdf();
            $mpdf->WriteHTML($html);
            $mpdf->Output();
            exit();
        }
    }
}
//End of Crm_shippingaddress controller