<?php

 /**
 * Author: Amirul Momenin
 * Desc:Accounting_transactiondetails Controller
 *
 */
class Accounting_transactiondetails extends CI_Controller{
    function __construct(){
        parent::__construct();
        $this->load->helper('url'); 
		$this->load->helper('form');
		$this->load->library('session');
		$this->load->library('pagination');
		$this->load->library('Customlib');
		$this->load->helper(array('cookie', 'url')); 
		$this->load->database();  
		$this->load->model('Accounting_transactiondetails_model');
		if(! $this->session->userdata('validated')){
				redirect('admin/login/index');
		}  
    } 
	
    /**
	 * Index Page for this controller.
	 *@param $start - Starting of accounting_transactiondetails table's index to get query
	 *
	 */
    function index($start=0){
		$limit = 10;
        $data['accounting_transactiondetails'] = $this->Accounting_transactiondetails_model->get_limit_accounting_transactiondetails($limit,$start);
		//pagination
		$config['base_url'] = site_url('admin/accounting_transactiondetails/index');
		$config['total_rows'] = $this->Accounting_transactiondetails_model->get_count_accounting_transactiondetails();
		$config['per_page'] = 10;
		//Bootstrap 4 Pagination fix
		$config['full_tag_open']    = '<div class="pagging text-center"><nav><ul class="pagination">';
		$config['full_tag_close']   = '</ul></nav></div>';
		$config['num_tag_open']     = '<li class="page-item"><span class="page-link">';
		$config['num_tag_close']    = '</span></li>';
		$config['cur_tag_open']     = '<li class="page-item active"><span class="page-link">';
		$config['cur_tag_close']    = '<span class="sr-only">(current)</span></span></li>';
		$config['next_tag_open']    = '<li class="page-item"><span class="page-link">';
		$config['next_tag_close']   = '<span aria-hidden="true"></span></span></li>';
		$config['next_tag_close']   = '<span aria-hidden="true">&raquo;</span></span></li>';
		$config['prev_tag_open']    = '<li class="page-item"><span class="page-link">';
		$config['prev_tag_close']   = '</span></li>';
		$config['first_tag_open']   = '<li class="page-item"><span class="page-link">';
		$config['first_tag_close']  = '</span></li>';
		$config['last_tag_open']    = '<li class="page-item"><span class="page-link">';
		$config['last_tag_close']   = '</span></li>';		
		$this->pagination->initialize($config);
        $data['link'] =$this->pagination->create_links();
		
        $data['_view'] = 'admin/accounting_transactiondetails/index';
        $this->load->view('layouts/admin/body',$data);
    }
	
	 /**
     * Save accounting_transactiondetails
	 *@param $id - primary key to update
	 *
     */
    function save($id=-1){   
		 
		
		
		$params = array(
					 'accounting_transaction_id' => html_escape($this->input->post('accounting_transaction_id')),
'accounting_ledger_id' => html_escape($this->input->post('accounting_ledger_id')),
'users_id' => html_escape($this->input->post('users_id')),
'description' => html_escape($this->input->post('description')),
'vat' => html_escape($this->input->post('vat')),
'tax' => html_escape($this->input->post('tax')),
'debit' => html_escape($this->input->post('debit')),
'credit' => html_escape($this->input->post('credit')),
'currency' => html_escape($this->input->post('currency')),

				);
		 
		 
		$data['id'] = $id;
		//update		
        if(isset($id) && $id>0){
			$data['accounting_transactiondetails'] = $this->Accounting_transactiondetails_model->get_accounting_transactiondetails($id);
            if(isset($_POST) && count($_POST) > 0){   
                $this->Accounting_transactiondetails_model->update_accounting_transactiondetails($id,$params);
				$this->session->set_flashdata('msg','Accounting_transactiondetails has been updated successfully');
                redirect('admin/accounting_transactiondetails/index');
            }else{
                $data['_view'] = 'admin/accounting_transactiondetails/form';
                $this->load->view('layouts/admin/body',$data);
            }
        } //save
		else{
			if(isset($_POST) && count($_POST) > 0){   
                $accounting_transactiondetails_id = $this->Accounting_transactiondetails_model->add_accounting_transactiondetails($params);
				$this->session->set_flashdata('msg','Accounting_transactiondetails has been saved successfully');
                redirect('admin/accounting_transactiondetails/index');
            }else{  
			    $data['accounting_transactiondetails'] = $this->Accounting_transactiondetails_model->get_accounting_transactiondetails(0);
                $data['_view'] = 'admin/accounting_transactiondetails/form';
                $this->load->view('layouts/admin/body',$data);
            }
		}
        
    } 
	
	/**
     * Details accounting_transactiondetails
	 * @param $id - primary key to get record
	 *
     */
	function details($id){
        $data['accounting_transactiondetails'] = $this->Accounting_transactiondetails_model->get_accounting_transactiondetails($id);
		$data['id'] = $id;
        $data['_view'] = 'admin/accounting_transactiondetails/details';
        $this->load->view('layouts/admin/body',$data);
	}
	
    /**
     * Deleting accounting_transactiondetails
	 * @param $id - primary key to delete record
	 *
     */
    function remove($id){
        $accounting_transactiondetails = $this->Accounting_transactiondetails_model->get_accounting_transactiondetails($id);

        // check if the accounting_transactiondetails exists before trying to delete it
        if(isset($accounting_transactiondetails['id'])){
            $this->Accounting_transactiondetails_model->delete_accounting_transactiondetails($id);
			$this->session->set_flashdata('msg','Accounting_transactiondetails has been deleted successfully');
            redirect('admin/accounting_transactiondetails/index');
        }
        else
            show_error('The accounting_transactiondetails you are trying to delete does not exist.');
    }
	
	/**
     * Search accounting_transactiondetails
	 * @param $start - Starting of accounting_transactiondetails table's index to get query
     */
	function search($start=0){
		if(!empty($this->input->post('key'))){
			$key =$this->input->post('key');
			$_SESSION['key'] = $key;
		}else{
			$key = $_SESSION['key'];
		}
		
		$limit = 10;		
		$this->db->like('id', $key, 'both');
$this->db->or_like('accounting_transaction_id', $key, 'both');
$this->db->or_like('accounting_ledger_id', $key, 'both');
$this->db->or_like('users_id', $key, 'both');
$this->db->or_like('description', $key, 'both');
$this->db->or_like('vat', $key, 'both');
$this->db->or_like('tax', $key, 'both');
$this->db->or_like('debit', $key, 'both');
$this->db->or_like('credit', $key, 'both');
$this->db->or_like('currency', $key, 'both');


		$this->db->order_by('id', 'desc');
		
        $this->db->limit($limit,$start);
        $data['accounting_transactiondetails'] = $this->db->get('accounting_transactiondetails')->result_array();
		$db_error = $this->db->error();
		if (!empty($db_error['code'])){
			echo 'Database error! Error Code [' . $db_error['code'] . '] Error: ' . $db_error['message'];
			exit;
		}
		
		//pagination
		$config['base_url'] = site_url('admin/accounting_transactiondetails/search');
		$this->db->reset_query();		
		$this->db->like('id', $key, 'both');
$this->db->or_like('accounting_transaction_id', $key, 'both');
$this->db->or_like('accounting_ledger_id', $key, 'both');
$this->db->or_like('users_id', $key, 'both');
$this->db->or_like('description', $key, 'both');
$this->db->or_like('vat', $key, 'both');
$this->db->or_like('tax', $key, 'both');
$this->db->or_like('debit', $key, 'both');
$this->db->or_like('credit', $key, 'both');
$this->db->or_like('currency', $key, 'both');

		$config['total_rows'] = $this->db->from("accounting_transactiondetails")->count_all_results();
		$db_error = $this->db->error();
		if (!empty($db_error['code'])){
			echo 'Database error! Error Code [' . $db_error['code'] . '] Error: ' . $db_error['message'];
			exit;
		}
		$config['per_page'] = 10;
		// Bootstrap 4 Pagination fix
		$config['full_tag_open']    = '<div class="pagging text-center"><nav><ul class="pagination">';
		$config['full_tag_close']   = '</ul></nav></div>';
		$config['num_tag_open']     = '<li class="page-item"><span class="page-link">';
		$config['num_tag_close']    = '</span></li>';
		$config['cur_tag_open']     = '<li class="page-item active"><span class="page-link">';
		$config['cur_tag_close']    = '<span class="sr-only">(current)</span></span></li>';
		$config['next_tag_open']    = '<li class="page-item"><span class="page-link">';
		$config['next_tag_close']   = '<span aria-hidden="true"></span></span></li>';
		$config['next_tag_close']   = '<span aria-hidden="true">&raquo;</span></span></li>';
		$config['prev_tag_open']    = '<li class="page-item"><span class="page-link">';
		$config['prev_tag_close']   = '</span></li>';
		$config['first_tag_open']   = '<li class="page-item"><span class="page-link">';
		$config['first_tag_close']  = '</span></li>';
		$config['last_tag_open']    = '<li class="page-item"><span class="page-link">';
		$config['last_tag_close']   = '</span></li>';
		$this->pagination->initialize($config);
        $data['link'] =$this->pagination->create_links();
		
		$data['key'] = $key;
		$data['_view'] = 'admin/accounting_transactiondetails/index';
        $this->load->view('layouts/admin/body',$data);
	}
	
    /**
     * Export accounting_transactiondetails
	 * @param $export_type - CSV or PDF type 
     */
	function export($export_type='CSV'){
	  if($export_type=='CSV'){	
		   // file name 
		   $filename = 'accounting_transactiondetails_'.date('Ymd').'.csv'; 
		   header("Content-Description: File Transfer"); 
		   header("Content-Disposition: attachment; filename=$filename"); 
		   header("Content-Type: application/csv; ");
		   // get data 
		   $this->db->order_by('id', 'desc');
		   $accounting_transactiondetailsData = $this->Accounting_transactiondetails_model->get_all_accounting_transactiondetails();
		   // file creation 
		   $file = fopen('php://output', 'w');
		   $header = array("Id","Accounting Transaction Id","Accounting Ledger Id","Users Id","Description","Vat","Tax","Debit","Credit","Currency"); 
		   fputcsv($file, $header);
		   foreach ($accounting_transactiondetailsData as $key=>$line){ 
			 fputcsv($file,$line); 
		   }
		   fclose($file); 
		   exit; 
	  }else if($export_type=='Pdf'){
		    $this->db->order_by('id', 'desc');
		    $accounting_transactiondetails = $this->db->get('accounting_transactiondetails')->result_array();
		   // get the HTML
			ob_start();
			include(APPPATH.'views/admin/accounting_transactiondetails/print_template.php');
			$html = ob_get_clean();
			require_once FCPATH.'vendor/autoload.php';			
			$mpdf = new \Mpdf\Mpdf();
			$mpdf->WriteHTML($html);
			$mpdf->Output();
			exit;
	  }
	   
	}
}
//End of Accounting_transactiondetails controller