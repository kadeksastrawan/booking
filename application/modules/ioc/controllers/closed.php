<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Closed extends CI_Controller {

	/**
	 * PT Gapura Angkasa
	 * Module : Nota Dinas 
	 * Sub Module : Closed Nota Dinas
	 *
	 * progress controller
	 *
	 * url : http://localhost/github/office/modules/ioc/controller/closed.php
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
		redirect('ioc/closed/corresspondence');
	}
	
	function corresspondence()
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
		  
		$config = array();
		$config['base_url'] = site_url() . '/ioc/closed/corresspondence';
		$config['per_page'] = 10; 
		$config["uri_segment"] = 4;
		$page = ($this->uri->segment(4)) ? $this->uri->segment(4) : 0;
		$limit = $config["per_page"];
		$offset = $page;
		
		$config['full_tag_open'] = '<div><ul class="pagination no-margin">';
		$config['full_tag_close'] = '</ul></div>';
		$config['prev_link'] = '&lt; Prev';
		$config['prev_tag_open'] = '<li>';
		$config['prev_tag_close'] = '</li>';
		$config['next_link'] = 'Next &gt;';
		$config['next_tag_open'] = '<li>';
		$config['next_tag_close'] = '</li>';
		$config['cur_tag_open'] = '<li class="active"><a href="#">';
		$config['cur_tag_close'] = '</a></li>';
		$config['num_tag_open'] = '<li>';
		$config['num_tag_close'] = '</li>';
		$config['first_link'] = TRUE;
		$config['last_link'] = TRUE;
		
		$data['total_closed'] = $this->docs_model->stat_my_closed($ui_nipp);
		foreach($data['total_closed'] as $stat):$total_rows = $stat->closed;endforeach;
		$config['total_rows'] = $total_rows;
		
		$this->pagination->initialize($config);
		
		# call model
		$data['list_closed'] = $this->docs_model->docs_closed($ui_nipp, $offset, $limit);
		$data['link_closed'] = $this->pagination->create_links();
		
		# sidebar nav 
		$data['menu_ioc'] = 'class="current"' ;
		$data['view_ioc_dashboard'] = 'class="current"' ;
		
		$this->load->view('closed', $data);
	}

}

/* End of file closed.php */
/* Location: ./application/modules/ioc/controllers/closed.php */