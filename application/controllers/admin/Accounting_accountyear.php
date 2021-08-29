<?php

 /**
 * Author: Amirul Momenin
 * Desc:Accounting_accountyear Controller
 *
 */
class Accounting_accountyear extends CI_Controller{
    function __construct(){
        parent::__construct();
        $this->load->helper('url'); 
		$this->load->helper('form');
		$this->load->library('session');
		$this->load->library('pagination');
		$this->load->library('Customlib');
		$this->load->helper(array('cookie', 'url')); 
		$this->load->database();  
		$this->load->model('Accounting_accountyear_model');
		if(! $this->session->userdata('validated')){
				redirect('admin/login/index');
		}  
    } 
	
    /**
	 * Index Page for this controller.
	 *@param $start - Starting of accounting_accountyear table's index to get query
	 *
	 */
    function index($start=0){
		$limit = 10;
        $data['accounting_accountyear'] = $this->Accounting_accountyear_model->get_limit_accounting_accountyear($limit,$start);
		//pagination
		$config['base_url'] = site_url('admin/accounting_accountyear/index');
		$config['total_rows'] = $this->Accounting_accountyear_model->get_count_accounting_accountyear();
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
		
        $data['_view'] = 'admin/accounting_accountyear/index';
        $this->load->view('layouts/admin/body',$data);
    }
	
	 /**
     * Save accounting_accountyear
	 *@param $id - primary key to update
	 *
     */
    function save($id=-1){   
		 
		
		
		$params = array(
					 'name' => html_escape($this->input->post('name')),
'start_date' => html_escape($this->input->post('start_date')),
'end_date' => html_escape($this->input->post('end_date')),
'slug' => html_escape($this->input->post('slug')),

				);
		 
		 
		$data['id'] = $id;
		//update		
        if(isset($id) && $id>0){
			$data['accounting_accountyear'] = $this->Accounting_accountyear_model->get_accounting_accountyear($id);
            if(isset($_POST) && count($_POST) > 0){   
                $this->Accounting_accountyear_model->update_accounting_accountyear($id,$params);
				$this->session->set_flashdata('msg','Accounting_accountyear has been updated successfully');
                redirect('admin/accounting_accountyear/index');
            }else{
                $data['_view'] = 'admin/accounting_accountyear/form';
                $this->load->view('layouts/admin/body',$data);
            }
        } //save
		else{
			if(isset($_POST) && count($_POST) > 0){   
                $accounting_accountyear_id = $this->Accounting_accountyear_model->add_accounting_accountyear($params);
				$this->session->set_flashdata('msg','Accounting_accountyear has been saved successfully');
                redirect('admin/accounting_accountyear/index');
            }else{  
			    $data['accounting_accountyear'] = $this->Accounting_accountyear_model->get_accounting_accountyear(0);
                $data['_view'] = 'admin/accounting_accountyear/form';
                $this->load->view('layouts/admin/body',$data);
            }
		}
        
    } 
	
	/**
     * Details accounting_accountyear
	 * @param $id - primary key to get record
	 *
     */
	function details($id){
        $data['accounting_accountyear'] = $this->Accounting_accountyear_model->get_accounting_accountyear($id);
		$data['id'] = $id;
        $data['_view'] = 'admin/accounting_accountyear/details';
        $this->load->view('layouts/admin/body',$data);
	}
	
    /**
     * Deleting accounting_accountyear
	 * @param $id - primary key to delete record
	 *
     */
    function remove($id){
        $accounting_accountyear = $this->Accounting_accountyear_model->get_accounting_accountyear($id);

        // check if the accounting_accountyear exists before trying to delete it
        if(isset($accounting_accountyear['id'])){
            $this->Accounting_accountyear_model->delete_accounting_accountyear($id);
			$this->session->set_flashdata('msg','Accounting_accountyear has been deleted successfully');
            redirect('admin/accounting_accountyear/index');
        }
        else
            show_error('The accounting_accountyear you are trying to delete does not exist.');
    }
	
	/**
     * Search accounting_accountyear
	 * @param $start - Starting of accounting_accountyear table's index to get query
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
$this->db->or_like('name', $key, 'both');
$this->db->or_like('start_date', $key, 'both');
$this->db->or_like('end_date', $key, 'both');
$this->db->or_like('slug', $key, 'both');


		$this->db->order_by('id', 'desc');
		
        $this->db->limit($limit,$start);
        $data['accounting_accountyear'] = $this->db->get('accounting_accountyear')->result_array();
		$db_error = $this->db->error();
		if (!empty($db_error['code'])){
			echo 'Database error! Error Code [' . $db_error['code'] . '] Error: ' . $db_error['message'];
			exit;
		}
		
		//pagination
		$config['base_url'] = site_url('admin/accounting_accountyear/search');
		$this->db->reset_query();		
		$this->db->like('id', $key, 'both');
$this->db->or_like('name', $key, 'both');
$this->db->or_like('start_date', $key, 'both');
$this->db->or_like('end_date', $key, 'both');
$this->db->or_like('slug', $key, 'both');

		$config['total_rows'] = $this->db->from("accounting_accountyear")->count_all_results();
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
		$data['_view'] = 'admin/accounting_accountyear/index';
        $this->load->view('layouts/admin/body',$data);
	}
	
    /**
     * Export accounting_accountyear
	 * @param $export_type - CSV or PDF type 
     */
	function export($export_type='CSV'){
	  if($export_type=='CSV'){	
		   // file name 
		   $filename = 'accounting_accountyear_'.date('Ymd').'.csv'; 
		   header("Content-Description: File Transfer"); 
		   header("Content-Disposition: attachment; filename=$filename"); 
		   header("Content-Type: application/csv; ");
		   // get data 
		   $this->db->order_by('id', 'desc');
		   $accounting_accountyearData = $this->Accounting_accountyear_model->get_all_accounting_accountyear();
		   // file creation 
		   $file = fopen('php://output', 'w');
		   $header = array("Id","Name","Start Date","End Date","Slug"); 
		   fputcsv($file, $header);
		   foreach ($accounting_accountyearData as $key=>$line){ 
			 fputcsv($file,$line); 
		   }
		   fclose($file); 
		   exit; 
	  }else if($export_type=='Pdf'){
		    $this->db->order_by('id', 'desc');
		    $accounting_accountyear = $this->db->get('accounting_accountyear')->result_array();
		   // get the HTML
			ob_start();
			include(APPPATH.'views/admin/accounting_accountyear/print_template.php');
			$html = ob_get_clean();
			require_once FCPATH.'vendor/autoload.php';			
			$mpdf = new \Mpdf\Mpdf();
			$mpdf->WriteHTML($html);
			$mpdf->Output();
			exit;
	  }
	   
	}
}
//End of Accounting_accountyear controller