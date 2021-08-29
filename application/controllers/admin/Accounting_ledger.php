<?php

 /**
 * Author: Amirul Momenin
 * Desc:Accounting_ledger Controller
 *
 */
class Accounting_ledger extends CI_Controller{
    function __construct(){
        parent::__construct();
        $this->load->helper('url'); 
		$this->load->helper('form');
		$this->load->library('session');
		$this->load->library('pagination');
		$this->load->library('Customlib');
		$this->load->helper(array('cookie', 'url')); 
		$this->load->database();  
		$this->load->model('Accounting_ledger_model');
		if(! $this->session->userdata('validated')){
				redirect('admin/login/index');
		}  
    } 
	
    /**
	 * Index Page for this controller.
	 *@param $start - Starting of accounting_ledger table's index to get query
	 *
	 */
    function index($start=0){
		$limit = 10;
        $data['accounting_ledger'] = $this->Accounting_ledger_model->get_limit_accounting_ledger($limit,$start);
		//pagination
		$config['base_url'] = site_url('admin/accounting_ledger/index');
		$config['total_rows'] = $this->Accounting_ledger_model->get_count_accounting_ledger();
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
		
        $data['_view'] = 'admin/accounting_ledger/index';
        $this->load->view('layouts/admin/body',$data);
    }
	
	 /**
     * Save accounting_ledger
	 *@param $id - primary key to update
	 *
     */
    function save($id=-1){   
		 
		
		
		$params = array(
					 'accounting_accounttype_id' => html_escape($this->input->post('accounting_accounttype_id')),
'code' => html_escape($this->input->post('code')),
'name' => html_escape($this->input->post('name')),
'description' => html_escape($this->input->post('description')),
'total_debit' => html_escape($this->input->post('total_debit')),
'total_credit' => html_escape($this->input->post('total_credit')),
'balance' => html_escape($this->input->post('balance')),
'last_update_date' => html_escape($this->input->post('last_update_date')),

				);
		 
		 
		$data['id'] = $id;
		//update		
        if(isset($id) && $id>0){
			$data['accounting_ledger'] = $this->Accounting_ledger_model->get_accounting_ledger($id);
            if(isset($_POST) && count($_POST) > 0){   
                $this->Accounting_ledger_model->update_accounting_ledger($id,$params);
				$this->session->set_flashdata('msg','Accounting_ledger has been updated successfully');
                redirect('admin/accounting_ledger/index');
            }else{
                $data['_view'] = 'admin/accounting_ledger/form';
                $this->load->view('layouts/admin/body',$data);
            }
        } //save
		else{
			if(isset($_POST) && count($_POST) > 0){   
                $accounting_ledger_id = $this->Accounting_ledger_model->add_accounting_ledger($params);
				$this->session->set_flashdata('msg','Accounting_ledger has been saved successfully');
                redirect('admin/accounting_ledger/index');
            }else{  
			    $data['accounting_ledger'] = $this->Accounting_ledger_model->get_accounting_ledger(0);
                $data['_view'] = 'admin/accounting_ledger/form';
                $this->load->view('layouts/admin/body',$data);
            }
		}
        
    } 
	
	/**
     * Details accounting_ledger
	 * @param $id - primary key to get record
	 *
     */
	function details($id){
        $data['accounting_ledger'] = $this->Accounting_ledger_model->get_accounting_ledger($id);
		$data['id'] = $id;
        $data['_view'] = 'admin/accounting_ledger/details';
        $this->load->view('layouts/admin/body',$data);
	}
	
    /**
     * Deleting accounting_ledger
	 * @param $id - primary key to delete record
	 *
     */
    function remove($id){
        $accounting_ledger = $this->Accounting_ledger_model->get_accounting_ledger($id);

        // check if the accounting_ledger exists before trying to delete it
        if(isset($accounting_ledger['id'])){
            $this->Accounting_ledger_model->delete_accounting_ledger($id);
			$this->session->set_flashdata('msg','Accounting_ledger has been deleted successfully');
            redirect('admin/accounting_ledger/index');
        }
        else
            show_error('The accounting_ledger you are trying to delete does not exist.');
    }
	
	/**
     * Search accounting_ledger
	 * @param $start - Starting of accounting_ledger table's index to get query
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
$this->db->or_like('accounting_accounttype_id', $key, 'both');
$this->db->or_like('code', $key, 'both');
$this->db->or_like('name', $key, 'both');
$this->db->or_like('description', $key, 'both');
$this->db->or_like('total_debit', $key, 'both');
$this->db->or_like('total_credit', $key, 'both');
$this->db->or_like('balance', $key, 'both');
$this->db->or_like('last_update_date', $key, 'both');


		$this->db->order_by('id', 'desc');
		
        $this->db->limit($limit,$start);
        $data['accounting_ledger'] = $this->db->get('accounting_ledger')->result_array();
		$db_error = $this->db->error();
		if (!empty($db_error['code'])){
			echo 'Database error! Error Code [' . $db_error['code'] . '] Error: ' . $db_error['message'];
			exit;
		}
		
		//pagination
		$config['base_url'] = site_url('admin/accounting_ledger/search');
		$this->db->reset_query();		
		$this->db->like('id', $key, 'both');
$this->db->or_like('accounting_accounttype_id', $key, 'both');
$this->db->or_like('code', $key, 'both');
$this->db->or_like('name', $key, 'both');
$this->db->or_like('description', $key, 'both');
$this->db->or_like('total_debit', $key, 'both');
$this->db->or_like('total_credit', $key, 'both');
$this->db->or_like('balance', $key, 'both');
$this->db->or_like('last_update_date', $key, 'both');

		$config['total_rows'] = $this->db->from("accounting_ledger")->count_all_results();
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
		$data['_view'] = 'admin/accounting_ledger/index';
        $this->load->view('layouts/admin/body',$data);
	}
	
    /**
     * Export accounting_ledger
	 * @param $export_type - CSV or PDF type 
     */
	function export($export_type='CSV'){
	  if($export_type=='CSV'){	
		   // file name 
		   $filename = 'accounting_ledger_'.date('Ymd').'.csv'; 
		   header("Content-Description: File Transfer"); 
		   header("Content-Disposition: attachment; filename=$filename"); 
		   header("Content-Type: application/csv; ");
		   // get data 
		   $this->db->order_by('id', 'desc');
		   $accounting_ledgerData = $this->Accounting_ledger_model->get_all_accounting_ledger();
		   // file creation 
		   $file = fopen('php://output', 'w');
		   $header = array("Id","Accounting Accounttype Id","Code","Name","Description","Total Debit","Total Credit","Balance","Last Update Date"); 
		   fputcsv($file, $header);
		   foreach ($accounting_ledgerData as $key=>$line){ 
			 fputcsv($file,$line); 
		   }
		   fclose($file); 
		   exit; 
	  }else if($export_type=='Pdf'){
		    $this->db->order_by('id', 'desc');
		    $accounting_ledger = $this->db->get('accounting_ledger')->result_array();
		   // get the HTML
			ob_start();
			include(APPPATH.'views/admin/accounting_ledger/print_template.php');
			$html = ob_get_clean();
			require_once FCPATH.'vendor/autoload.php';			
			$mpdf = new \Mpdf\Mpdf();
			$mpdf->WriteHTML($html);
			$mpdf->Output();
			exit;
	  }
	   
	}
}
//End of Accounting_ledger controller