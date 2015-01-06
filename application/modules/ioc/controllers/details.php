<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Details extends CI_Controller {

	/**
	 * PT Gapura Angkasa
	 * Module : Nota Dinas 
	 * Sub Module : Add Nota Dinas
	 *
	 * open controller
	 *
	 * url : http://localhost/github/office/modules/notadinas/controller/add.php
	 * developer : pandhawa digital
	 * phone : 0361 853 2400
	 * email : pandhawa.digital@gmail.com
	 *
	 * warning !!!
	 * please do not copy, edit, or distribute this script without developer permission.
	 *
	 */
	
	
	 function __construct()
	{
        parent::__construct();
		
		# load model, library and helper
		$this->load->model('docs_model','', TRUE);
		
		
		# restrict all function access after log in
		if ($this->session->userdata('logged_in'))
				{ 
					# check module active
					if($this->module_management->module_active('module_active') == FALSE){redirect('messages/error/module_inactive');}
					
					# kick guest user
					if($this->user_access->level('user_access')==0){redirect('messages/error/not_authorized');}
				}
			
				else
				{
					# redirect to login if not
					redirect('user/pin_login');
				}	
    }
	
	function index()
	{
		redirect('ioc/details/id');
	}
	
	function id()
	{
		# get data from session
		$session_data = $this->session->userdata('logged_in');
		  
		# data
		$ui_nama = $session_data['ui_nama'];
		$data['ui_nama'] = $ui_nama;
		
		$ui_nipp = $session_data['ui_nipp'];
		$data['ui_nipp'] = $ui_nipp;
		
		$ui_email = $session_data['ui_email'];
		$data['ui_email'] = $ui_email;
		
		$ui_level = $session_data['ui_level'];
		$data['ui_level'] = $ui_level; 
		$level = substr($ui_level, -2);
		//echo $level;
		
		$id = $this->uri->segment(4);
		
		# update status read
		$df_read = mdate('%Y-%m-%d %H:%i:%s',time());
		$this->docs_model->set_docs_read($df_read,$id,$ui_nipp);
		
		# get data from database
		$docs_id = $id;
		$data['query_docs'] = $this->docs_model->get_doc_by_id($docs_id);
		$data['query_files'] = $this->docs_model->get_files_by_id($docs_id);
		$data['query_flow'] = $this->docs_model->get_flow_by_id($docs_id);
		$data['query_position'] = $this->docs_model->docs_position($docs_id);
		$data['query_discussion'] = $this->docs_model->docs_discussion($docs_id);
		$data['query_read'] = $this->docs_model->get_read($id,$ui_nipp);
		$data['query_copy'] = $this->docs_model->get_copy($id,$ui_nipp);
		$data['query_handling'] = $this->docs_model->get_handling($id,$ui_nipp);
		
		# get upline, colleagues and downline data
		$data['query_upline'] = $this->user_hierarchy->get_upline();
		$data['query_colleagues'] = $this->user_hierarchy->get_colleagues();
		$data['query_downline'] = $this->user_hierarchy->get_downline();
		
		# sidebar nav 
		$data['menu_ioc'] = 'class="current"' ;
		$data['view_ioc_dashboard'] = 'class="current"' ;
		# call view
		$this->load->view('details', $data);
	}
	
	function print_docs()
	{
		$docs_id = $this->uri->segment(4, 0);
		$data['query_docs'] = $this->docs_model->get_doc_by_id($docs_id);
		//echo $docs_id;
		$this->load->view('print/print_nd',$data);
	}
	
	function print_docs_pdf()
	{
		$docs_id = $this->uri->segment(4, 0);
		$id = $this->uri->segment(4);
		
		$session_data = $this->session->userdata('logged_in');
		$ui_nipp = $session_data['ui_nipp'];
		
		$data['query_docs'] = $this->docs_model->get_doc_by_id($docs_id);
		$data['query_copy'] = $this->docs_model->get_copy($id,$ui_nipp);
		
		/* Helper Load 
		$this->load->helper('sigap_pdf');
		$stream = TRUE; 
		$papersize = 'legal'; 
		$orientation = 'portrait';
		$filename = "Print Docs ".date('Y-m-d H:i:s');
		$stn = 'cgk';
		
		$html = $this->load->view('print/print_nd_pdf',$data, true);
     	pdf_create($html, $filename, $stream, $papersize, $orientation, $stn);
		$full_filename = $filename . '.pdf'; */
		//$this->load->view('ioc/print/print_nd_pdf',$data);
		
		$filename = "Print Docs ".date("%d-%m-%Y H:i");
		$html = '';
		$html .= $this->load->view('ioc/print/print_nd_pdf',$data, true);
		
		$pdf = new Pdf('P', 'cm', 'letter', true, 'UTF-8', false);
		
		$pdf->SetTitle('My Title');
		$pdf->SetAutoPageBreak(false);
		$pdf->SetAuthor('PT Gapura Angkasa');
		$pdf->SetDisplayMode('real', 'default');
		$pdf->setPrintHeader(false);
		$pdf->setPrintFooter(false);
		$pdf->setHeaderFont(Array('Arial', '', PDF_FONT_SIZE_MAIN));
		$pdf->setFooterFont(Array('Arial', '', PDF_FONT_SIZE_DATA));
		$pdf->SetMargins(10, 10, 10);
		$pdf->AddPage();
		
		$pdf->writeHTML($html, true, false, true, false, '');
			
		$pdf->lastPage();
		
		$pdf->Output($filename.'.pdf', 'I'); 
	}
	

}

/* End of file add.php */
/* Location: ./application/modules/notadinas/controllers/add.php */