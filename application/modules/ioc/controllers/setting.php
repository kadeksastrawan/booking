<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Setting extends CI_Controller {

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
		redirect("ioc/setting/type");
	}
	
	function type()
	{
		# get data from login session
		$session_data = $this->session->userdata('logged_in');
		
		$nama = $session_data['ui_nama'];
		$data['nama'] = $nama;
		
		$nipp = $session_data['ui_nipp'];
		$data['nipp'] = $nipp;
		
		$email = $session_data['ui_email'];
		$data['email'] = $email;
		
		$data['result'] = $this->docs_model->get_doc_type();
		
		# redirect to add form
		$this->load->view('doc_type', $data);
	}
	function save_doc_type()
	{
		$data = array(
				"dt_code" => $this->input->post('doc_code'),
				"dt_name" => $this->input->post('doc_name'),
			);	
		$this->docs_model->insert_data("docs_type",$data);
		redirect("ioc/setting/type");
	}
	function delete_doc_type()
	{
		$data = array(
				"dt_id" => $this->input->post('id_doc_type'),
			);	
		$this->docs_model->delete_data("docs_type",$data);
		redirect("ioc/setting/type");
	}
	function doc_access()
	{
		# get data from login session
		$session_data = $this->session->userdata('logged_in');
		
		$nama = $session_data['ui_nama'];
		$data['nama'] = $nama;
		
		$nipp = $session_data['ui_nipp'];
		$data['nipp'] = $nipp;
		
		$email = $session_data['ui_email'];
		$data['email'] = $email;
		
		$data['result'] = $this->docs_model->get_doc_access();
		$data['list_department'] = $this->docs_model->get_department();
		$data['list_doc_type'] = $this->docs_model->get_doc_type();
		
		# redirect to add form
		$this->load->view('doc_access', $data);
	}
	function save_doc_access()
	{
		if($this->input->post('type') == ""){ $type = "public";}else{ $type = "private";}
		$data = array(
				"da_doc_type" => $this->input->post('doctype'),
				"da_department" => $this->input->post('department'),
				"da_type" => $type,
			);	
		$this->docs_model->insert_data("docs_access",$data);
		redirect("ioc/setting/doc_access");
	}
	function delete_doc_access()
	{
		$data = array(
				"da_id" => $this->input->post('id_doc_access'),
			);	
		$this->docs_model->delete_data("docs_access",$data);
		redirect("ioc/setting/doc_access");
	}

}

/* End of file setting.php */
/* Location: ./application/modules/notadinas/controllers/setting.php */