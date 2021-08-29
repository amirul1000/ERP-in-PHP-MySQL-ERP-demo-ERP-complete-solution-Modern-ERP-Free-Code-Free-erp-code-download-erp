<?php

 /**
 * Author: Amirul Momenin
 * Desc:Accounting_transaction Controller
 *
 */
class Accounting_transaction extends CI_Controller{
    function __construct(){
        parent::__construct();
        $this->load->helper('url'); 
		$this->load->helper('form');
		$this->load->library('session');
		$this->load->library('pagination');
		$this->load->library('Customlib');
		$this->load->helper(array('cookie', 'url')); 
		$this->load->database();  
		$this->load->model('Accounting_transaction_model');
		if(! $this->session->userdata('validated')){
				redirect('admin/login/index');
		}  
    } 
	
    /**
	 * Index Page for this controller.
	 *@param $start - Starting of accounting_transaction table's index to get query
	 *
	 */
    function index($start=0){
		$limit = 10;
        $data['accounting_transaction'] = $this->Accounting_transaction_model->get_limit_accounting_transaction($limit,$start);
		//pagination
		$config['base_url'] = site_url('admin/accounting_transaction/index');
		$config['total_rows'] = $this->Accounting_transaction_model->get_count_accounting_transaction();
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
		
        $data['_view'] = 'admin/accounting_transaction/index';
        $this->load->view('layouts/admin/body',$data);
    }
	
	 /**
     * Save accounting_transaction
	 *@param $id - primary key to update
	 *
     */
    function save($id=-1){   
		 
		$created_at = "";
$updated_at = "";

		if($id<=0){
															 $created_at = date("Y-m-d H:i:s");
														 }
else if($id>0){
															 $updated_at = date("Y-m-d H:i:s");
														 }

		$params = array(
					 'accounting_users_id' => html_escape($this->input->post('accounting_users_id')),
'accounting_accountyear_id' => html_escape($this->input->post('accounting_accountyear_id')),
'subject' => html_escape($this->input->post('subject')),
'ref_no' => html_escape($this->input->post('ref_no')),
'voucher_no' => html_escape($this->input->post('voucher_no')),
'post_status' => html_escape($this->input->post('post_status')),
'trnsaction_type' => html_escape($this->input->post('trnsaction_type')),
'created_by_users_id' => html_escape($this->input->post('created_by_users_id')),
'modified_by_users_id' => html_escape($this->input->post('modified_by_users_id')),
'created_at' =>$created_at,
'updated_at' =>$updated_at,

				);
		 
		if($id>0){
							                        unset($params['created_at']);
						                          }if($id<=0){
							                        unset($params['updated_at']);
						                          } 
		$data['id'] = $id;
		//update		
        if(isset($id) && $id>0){
			$data['accounting_transaction'] = $this->Accounting_transaction_model->get_accounting_transaction($id);
            if(isset($_POST) && count($_POST) > 0){   
                $this->Accounting_transaction_model->update_accounting_transaction($id,$params);
				$this->session->set_flashdata('msg','Accounting_transaction has been updated successfully');
                redirect('admin/accounting_transaction/index');
            }else{
                $data['_view'] = 'admin/accounting_transaction/form';
                $this->load->view('layouts/admin/body',$data);
            }
        } //save
		else{
			if(isset($_POST) && count($_POST) > 0){   
                $accounting_transaction_id = $this->Accounting_transaction_model->add_accounting_transaction($params);
				$this->session->set_flashdata('msg','Accounting_transaction has been saved successfully');
                redirect('admin/accounting_transaction/index');
            }else{  
			    $data['accounting_transaction'] = $this->Accounting_transaction_model->get_accounting_transaction(0);
                $data['_view'] = 'admin/accounting_transaction/form';
                $this->load->view('layouts/admin/body',$data);
            }
		}
        
    } 
	
	/**
     * Details accounting_transaction
	 * @param $id - primary key to get record
	 *
     */
	function details($id){
        $data['accounting_transaction'] = $this->Accounting_transaction_model->get_accounting_transaction($id);
		$data['id'] = $id;
        $data['_view'] = 'admin/accounting_transaction/details';
        $this->load->view('layouts/admin/body',$data);
	}
	
    /**
     * Deleting accounting_transaction
	 * @param $id - primary key to delete record
	 *
     */
    function remove($id){
        $accounting_transaction = $this->Accounting_transaction_model->get_accounting_transaction($id);

        // check if the accounting_transaction exists before trying to delete it
        if(isset($accounting_transaction['id'])){
            $this->Accounting_transaction_model->delete_accounting_transaction($id);
			$this->session->set_flashdata('msg','Accounting_transaction has been deleted successfully');
            redirect('admin/accounting_transaction/index');
        }
        else
            show_error('The accounting_transaction you are trying to delete does not exist.');
    }
	
	/**
     * Search accounting_transaction
	 * @param $start - Starting of accounting_transaction table's index to get query
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
$this->db->or_like('accounting_users_id', $key, 'both');
$this->db->or_like('accounting_accountyear_id', $key, 'both');
$this->db->or_like('subject', $key, 'both');
$this->db->or_like('ref_no', $key, 'both');
$this->db->or_like('voucher_no', $key, 'both');
$this->db->or_like('post_status', $key, 'both');
$this->db->or_like('trnsaction_type', $key, 'both');
$this->db->or_like('created_by_users_id', $key, 'both');
$this->db->or_like('modified_by_users_id', $key, 'both');
$this->db->or_like('created_at', $key, 'both');
$this->db->or_like('updated_at', $key, 'both');


		$this->db->order_by('id', 'desc');
		
        $this->db->limit($limit,$start);
        $data['accounting_transaction'] = $this->db->get('accounting_transaction')->result_array();
		$db_error = $this->db->error();
		if (!empty($db_error['code'])){
			echo 'Database error! Error Code [' . $db_error['code'] . '] Error: ' . $db_error['message'];
			exit;
		}
		
		//pagination
		$config['base_url'] = site_url('admin/accounting_transaction/search');
		$this->db->reset_query();		
		$this->db->like('id', $key, 'both');
$this->db->or_like('accounting_users_id', $key, 'both');
$this->db->or_like('accounting_accountyear_id', $key, 'both');
$this->db->or_like('subject', $key, 'both');
$this->db->or_like('ref_no', $key, 'both');
$this->db->or_like('voucher_no', $key, 'both');
$this->db->or_like('post_status', $key, 'both');
$this->db->or_like('trnsaction_type', $key, 'both');
$this->db->or_like('created_by_users_id', $key, 'both');
$this->db->or_like('modified_by_users_id', $key, 'both');
$this->db->or_like('created_at', $key, 'both');
$this->db->or_like('updated_at', $key, 'both');

		$config['total_rows'] = $this->db->from("accounting_transaction")->count_all_results();
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
		$data['_view'] = 'admin/accounting_transaction/index';
        $this->load->view('layouts/admin/body',$data);
	}
	
    /**
     * Export accounting_transaction
	 * @param $export_type - CSV or PDF type 
     */
	function export($export_type='CSV'){
	  if($export_type=='CSV'){	
		   // file name 
		   $filename = 'accounting_transaction_'.date('Ymd').'.csv'; 
		   header("Content-Description: File Transfer"); 
		   header("Content-Disposition: attachment; filename=$filename"); 
		   header("Content-Type: application/csv; ");
		   // get data 
		   $this->db->order_by('id', 'desc');
		   $accounting_transactionData = $this->Accounting_transaction_model->get_all_accounting_transaction();
		   // file creation 
		   $file = fopen('php://output', 'w');
		   $header = array("Id","Accounting Users Id","Accounting Accountyear Id","Subject","Ref No","Voucher No","Post Status","Trnsaction Type","Created By Users Id","Modified By Users Id","Created At","Updated At"); 
		   fputcsv($file, $header);
		   foreach ($accounting_transactionData as $key=>$line){ 
			 fputcsv($file,$line); 
		   }
		   fclose($file); 
		   exit; 
	  }else if($export_type=='Pdf'){
		    $this->db->order_by('id', 'desc');
		    $accounting_transaction = $this->db->get('accounting_transaction')->result_array();
		   // get the HTML
			ob_start();
			include(APPPATH.'views/admin/accounting_transaction/print_template.php');
			$html = ob_get_clean();
			require_once FCPATH.'vendor/autoload.php';			
			$mpdf = new \Mpdf\Mpdf();
			$mpdf->WriteHTML($html);
			$mpdf->Output();
			exit;
	  }
	   
	}
}
//End of Accounting_transaction controller