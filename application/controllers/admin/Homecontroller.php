<?php
defined('BASEPATH') or exit('No direct script access allowed');

/**
 * Author: Amirul Momenin
 * Desc:Landing Page
 */
class Homecontroller extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        $this->load->helper('url');
        $this->load->helper('form');
        $this->load->library('session');
        $this->load->helper(array(
            'cookie',
            'url'
        ));
        $this->load->database();
        if (! $this->session->userdata('validated')) {
            redirect('admin/login/index');
        }
    }

    /**
     * Index Page for this controller.
     */
    public function index()
    {
        $data['_view'] = 'admin_homepage';
        $this->load->view('layouts/admin/body', $data);
    }
function load(){
	   $services = $this->db->select('accounting_transaction.*,accounting_journalentry.debit,accounting_journalentry.credit')
         ->from('accounting_transaction')
         ->join('accounting_journalentry', 'accounting_journalentry.accounting_transaction_id = accounting_transaction.id')
		 ->join('users', 'users.id = accounting_transaction.users_id')
		 ->get()->result_array();
		 	
	   $data = array();
	   
	   for($i=0;$i<count($services);$i++){
				$data[] = array(
					  'id'   => $services[$i]['id'],
					  'title'   => $services[$i]['service_name'].' '.$services[$i]['customer_name'],
					  'start'   => $services[$i]['start_date'].' '.$services[$i]['start_time'],
					  'end'   => $services[$i]['start_date'].' '.$services[$i]['end_time'],
					 );
			}
		echo json_encode($data);
	}
	
	 /**
     * Save customer_services
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
            'services_id' => html_escape($this->input->post('services_id')),
            'customer_id' => html_escape($this->input->post('customer_id')),
            'cost' => html_escape($this->input->post('cost')),
            'start_date' => html_escape($this->input->post('start_date')),
            'start_time' => html_escape($this->input->post('start_time')),
            'end_time' => html_escape($this->input->post('end_time')),
            'assigned_to_staff_users_id' => html_escape($this->input->post('assigned_to_staff_users_id')),
            'status' => html_escape($this->input->post('status')),
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
        if (isset($_POST) && count($_POST) > 0) {
                $customer_services_id = $this->Customer_services_model->add_customer_services($params);
                $this->session->set_flashdata('msg', 'Customer_services has been saved successfully');
                redirect('admin/homecontroller/index');
        }
    }
	
	function delete(){
		$status = $this->db->delete('customer_services', array(
            'id' => $this->input->post('id')
        ));
        $db_error = $this->db->error();
        if (! empty($db_error['code'])) {
            echo 'Database error! Error Code [' . $db_error['code'] . '] Error: ' . $db_error['message'];
            exit();
        }
        return $status;
		
	}
	
	function insert(){
		
	}
	
	function update(){
		
	}
}
