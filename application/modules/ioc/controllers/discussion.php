<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Discussion extends CI_Controller {

	/**
	 * PT Gapura Angkasa
	 * Module : Nota Dinas 
	 * Sub Module : Discussion
	 *
	 * open controller
	 *
	 * url : http://localhost/github/office/modules/notadinas/discussion/add.php
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
		# get data from login session
		$session_data = $this->session->userdata('logged_in');
		
		$ui_nama = $session_data['ui_nama'];
		$data['ui_nama'] = $ui_nama;
		
		$ui_nipp = $session_data['ui_nipp'];
		$data['ui_nipp'] = $ui_nipp;
		
		$ui_email = $session_data['ui_email'];
		$data['ui_email'] = $ui_email;
		
		$ui_level = $session_data['ui_level'];
		$data['ui_level'] = $ui_level;
		
		$dd_docs_id = $this->input->post('docs_id');
		$dd_subject = $this->input->post('subject');
		$dd_message = $this->input->post('message');
		$this->docs_model->add_docs_discussion($dd_docs_id, $dd_subject, $dd_message, $ui_nipp);
		
		redirect('ioc/details/id/' . $dd_docs_id );
	}

}

/* End of file discussion.php */
/* Location: ./application/modules/notadinas/controllers/discussion.php */