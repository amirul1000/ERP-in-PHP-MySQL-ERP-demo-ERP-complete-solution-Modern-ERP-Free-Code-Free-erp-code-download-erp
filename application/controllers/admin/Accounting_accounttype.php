<?php

 /**
 * Author: Amirul Momenin
 * Desc:Accounting_accounttype Controller
 *
 */
class Accounting_accounttype extends CI_Controller{
    function __construct(){
        parent::__construct();
        $this->load->helper('url'); 
		$this->load->helper('form');
		$this->load->library('session');
		$this->load->library('pagination');
		$this->load->library('Customlib');
		$this->load->helper(array('cookie', 'url')); 
		$this->load->database();  
		$this->load->model('Accounting_accounttype_model');
		if(! $this->session->userdata('validated')){
				redirect('admin/login/index');
		}  
    } 
	
    /**
	 * Index Page for this controller.
	 *@param $start - Starting of accounting_accounttype table's index to get query
	 *
	 */
    function index($start=0){
		$limit = 10;
        $data['accounting_accounttype'] = $this->Accounting_accounttype_model->get_limit_accounting_accounttype($limit,$start);
		//pagination
		$config['base_url'] = site_url('admin/accounting_accounttype/index');
		$config['total_rows'] = $this->Accounting_accounttype_model->get_count_accounting_accounttype();
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
		
        $data['_view'] = 'admin/accounting_accounttype/index';
        $this->load->view('layouts/admin/body',$data);
    }
	
	 /**
     * Save accounting_accounttype
	 *@param $id - primary key to update
	 *
     */
    function save($id=-1){   
		 
		
		
		$params = array(
					 'parent_accounting_accounttype_id' => html_escape($this->input->post('parent_accounting_accounttype_id')),
'name' => html_escape($this->input->post('name')),
'slug' => html_escape($this->input->post('slug')),

				);
		 
		 
		$data['id'] = $id;
		//update		
        if(isset($id) && $id>0){
			$data['accounting_accounttype'] = $this->Accounting_accounttype_model->get_accounting_accounttype($id);
            if(isset($_POST) && count($_POST) > 0){   
                $this->Accounting_accounttype_model->update_accounting_accounttype($id,$params);
				$this->session->set_flashdata('msg','Accounting_accounttype has been updated successfully');
                redirect('admin/accounting_accounttype/index');
            }else{
                $data['_view'] = 'admin/accounting_accounttype/form';
                $this->load->view('layouts/admin/body',$data);
            }
        } //save
		else{
			if(isset($_POST) && count($_POST) > 0){   
                $accounting_accounttype_id = $this->Accounting_accounttype_model->add_accounting_accounttype($params);
				$this->session->set_flashdata('msg','Accounting_accounttype has been saved successfully');
                redirect('admin/accounting_accounttype/index');
            }else{  
			    $data['accounting_accounttype'] = $this->Accounting_accounttype_model->get_accounting_accounttype(0);
                $data['_view'] = 'admin/accounting_accounttype/form';
                $this->load->view('layouts/admin/body',$data);
            }
		}
        
    } 
	
	/**
     * Details accounting_accounttype
	 * @param $id - primary key to get record
	 *
     */
	function details($id){
        $data['accounting_accounttype'] = $this->Accounting_accounttype_model->get_accounting_accounttype($id);
		$data['id'] = $id;
        $data['_view'] = 'admin/accounting_accounttype/details';
        $this->load->view('layouts/admin/body',$data);
	}
	
    /**
     * Deleting accounting_accounttype
	 * @param $id - primary key to delete record
	 *
     */
    function remove($id){
        $accounting_accounttype = $this->Accounting_accounttype_model->get_accounting_accounttype($id);

        // check if the accounting_accounttype exists before trying to delete it
        if(isset($accounting_accounttype['id'])){
            $this->Accounting_accounttype_model->delete_accounting_accounttype($id);
			$this->session->set_flashdata('msg','Accounting_accounttype has been deleted successfully');
            redirect('admin/accounting_accounttype/index');
        }
        else
            show_error('The accounting_accounttype you are trying to delete does not exist.');
    }
	
	/**
     * Search accounting_accounttype
	 * @param $start - Starting of accounting_accounttype table's index to get query
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
$this->db->or_like('parent_accounting_accounttype_id', $key, 'both');
$this->db->or_like('name', $key, 'both');
$this->db->or_like('slug', $key, 'both');


		$this->db->order_by('id', 'desc');
		
        $this->db->limit($limit,$start);
        $data['accounting_accounttype'] = $this->db->get('accounting_accounttype')->result_array();
		$db_error = $this->db->error();
		if (!empty($db_error['code'])){
			echo 'Database error! Error Code [' . $db_error['code'] . '] Error: ' . $db_error['message'];
			exit;
		}
		
		//pagination
		$config['base_url'] = site_url('admin/accounting_accounttype/search');
		$this->db->reset_query();		
		$this->db->like('id', $key, 'both');
$this->db->or_like('parent_accounting_accounttype_id', $key, 'both');
$this->db->or_like('name', $key, 'both');
$this->db->or_like('slug', $key, 'both');

		$config['total_rows'] = $this->db->from("accounting_accounttype")->count_all_results();
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
		$data['_view'] = 'admin/accounting_accounttype/index';
        $this->load->view('layouts/admin/body',$data);
	}
	
    /**
     * Export accounting_accounttype
	 * @param $export_type - CSV or PDF type 
     */
	function export($export_type='CSV'){
	  if($export_type=='CSV'){	
		   // file name 
		   $filename = 'accounting_accounttype_'.date('Ymd').'.csv'; 
		   header("Content-Description: File Transfer"); 
		   header("Content-Disposition: attachment; filename=$filename"); 
		   header("Content-Type: application/csv; ");
		   // get data 
		   $this->db->order_by('id', 'desc');
		   $accounting_accounttypeData = $this->Accounting_accounttype_model->get_all_accounting_accounttype();
		   // file creation 
		   $file = fopen('php://output', 'w');
		   $header = array("Id","Parent Accounting Accounttype Id","Name","Slug"); 
		   fputcsv($file, $header);
		   foreach ($accounting_accounttypeData as $key=>$line){ 
			 fputcsv($file,$line); 
		   }
		   fclose($file); 
		   exit; 
	  }else if($export_type=='Pdf'){
		    $this->db->order_by('id', 'desc');
		    $accounting_accounttype = $this->db->get('accounting_accounttype')->result_array();
		   // get the HTML
			ob_start();
			include(APPPATH.'views/admin/accounting_accounttype/print_template.php');
			$html = ob_get_clean();
			require_once FCPATH.'vendor/autoload.php';			
			$mpdf = new \Mpdf\Mpdf();
			$mpdf->WriteHTML($html);
			$mpdf->Output();
			exit;
	  }
	   
	}
}
//End of Accounting_accounttype controller