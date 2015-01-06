<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Create extends CI_Controller {

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
		redirect('ioc/create_memo','refresh');
	}
	
	function create_memo()
	{
		# get data from login session
		$session_data = $this->session->userdata('logged_in');
		
		$nama = $session_data['ui_nama'];
		$data['nama'] = $nama;
		
		$nipp = $session_data['ui_nipp'];
		$data['nipp'] = $nipp;
		
		$email = $session_data['ui_email'];
		$data['email'] = $email;
		
		$data['supervisor'] = $this->user_hierarchy->up_to_supervisor();
		$data['asman'] = $this->user_hierarchy->up_to_assistant_manager();
		
		# get variable for docs category
		#$data['query'] = $this->docs_model->get_all_category_for_combo($cabang, $unit);
		
		
		# sidebar nav 
		$data['menu_ioc'] = 'class="current"' ;
		$data['view_ioc_add'] = 'class="current"' ;
		# redirect to upload form
		$this->load->view('create_memo', $data);
	}
	
	function save_memo()
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
		
		# get data from form
		$docs_date_in 	= mdate("%Y-%m-%d %H:%i:%s", strtotime($this->input->post('docs_date_in')));
		$docs_reg_no 	= $this->input->post('docs_reg_no');
		$docs_type 		= $this->input->post('docs_type');
		$docs_no 		= $this->input->post('docs_no');
		$docs_date 		= mdate("%Y-%m-%d", strtotime($this->input->post('docs_date')));
		$docs_to 		= $this->input->post('docs_to');
		$docs_from 		= $this->input->post('docs_from');
		$docs_copy 		= $this->input->post('docs_copy');
		$docs_subject 	= $this->input->post('docs_subject');
		$docs_description 	= $this->input->post('docs_description');
		$docs_update_by = $ui_nipp;
		
		# do form validation ( next )
		
		# do save data
		#$docs_id = $this->docs_model->save_docs($docs_date_in,$docs_type,$docs_no,$docs_date,$docs_from,$docs_to,$docs_copy,$docs_subject,$docs_description, $docs_update_by);
		$docs_id = $this->docs_model->save_docs($docs_date_in, $docs_reg_no, $docs_type,$docs_no,$docs_date,$docs_from,$docs_to,$docs_copy,$docs_subject,$docs_description, $docs_update_by);
		# set upload config
		$config['upload_path'] = './wp-uploads/ioc/';
		$config['allowed_types'] = 'pdf|gif|jpg|png|jpeg|bmp|doc|docx|xls|xlsx|ppt|pptx|pps|ppsx';
		$config['max_size']	= '99999';
		$config['max_width']  = '99999';
		$config['max_height']  = '99999';
	
		# call upload lib
		$this->load->library('upload', $config);
				
		# check is there any file to upload	
		if ($this->upload->do_upload('file'))
		{
			# file to upload = true
			$upload_data = $this->upload->data();
			
			# GET REAL DATA FOR DB
			$df_docs_id 	= $docs_id;
			$df_user_name 	= $this->input->post('docs_no');
			$df_real_name	= $this->security->sanitize_filename($upload_data['file_name']);
			$df_file_path 	= $upload_data['file_path'];
			$df_system_name	= date("YmdHis");	
			$df_ext			= $upload_data['file_ext'];	  	 	 	 	 	 	
			$df_size		= $upload_data['file_size'];	 	 	 	 	 	 	
			$df_type		= $this->input->post('docs_type');	 	 	 	 	 	 	
			$df_owner		= $this->input->post('docs_from');
			$df_update_by 	= $ui_nipp;
			$system_file_name = date("YmdHis");	
			
			# call model
			$this->docs_model->save_file($df_docs_id, $df_user_name, $df_real_name, $df_file_path, $df_system_name, $df_ext, $df_size, $df_type, $df_owner, $df_update_by);
			
			# rename file after upload and remove ext
			rename($upload_data['full_path'], $upload_data['file_path'] . $system_file_name . '-' . $df_real_name);
		}
		
		# get manager nipp
		/*$query = $this->docs_model->get_manager_nipp($ui_nipp, $ui_level);
		foreach($query as $manager) :
			$manager_nipp = $manager->ui_nipp;	
		endforeach;
		if($manager_nipp == ''){$manager_nipp=$ui_nipp;}*/
		$result = $this->user_hierarchy->up_to_supervisor();	 
		foreach($result as $items){$manager_nipp = $items->ui_nipp;}
		
		# update own docs_position
		$dp_docs_id = $docs_id;
		$dp_position = $ui_nipp;
		$dp_status = 'completed';
		$dp_date_in = $docs_date_in;
		$dp_date_out = date('Y-m-d H:i:s');
		$dp_update_by = $ui_nipp;
		
		$this->docs_model->set_docs_position($dp_docs_id, $dp_position, $dp_status, $dp_date_in, $dp_date_out, $dp_update_by);
		
		# update docs_flow
		$df_docs_id = $docs_id;
		$df_flow = 'report';
		$df_from = $ui_nipp;
		$df_to = $manager_nipp;
		$df_subject = 'penerimaan dokumen ' . $docs_no;
		$df_description = 'penerimaan dokumen ' . $docs_no . ' dari pihak lain';
		$df_update_by = $ui_nipp;
		
		$this->docs_model->update_docs_flow($df_docs_id, $df_flow, $df_from, $df_to, $df_subject, $df_description, $df_update_by);
		
		# update target docs_position to manager
		$dp_docs_id = $docs_id;
		$dp_position = $manager_nipp;
		$dp_status = 'open';
		$dp_date_in = date('Y-m-d H:i:s');
		$dp_date_out = '0000-00-00 00:00:00';
		$dp_update_by = $ui_nipp;
		
		$this->docs_model->set_docs_position($dp_docs_id, $dp_position, $dp_status, $dp_date_in, $dp_date_out, $dp_update_by);
		
		redirect('ioc/dashboard');
	}
	
	#create nota dinas-----------------------------------------------------
	function create_nota_dinas()
	{
		# get data from login session
		$session_data = $this->session->userdata('logged_in');
		
		$nama = $session_data['ui_nama'];
		$data['nama'] = $nama;
		
		$nipp = $session_data['ui_nipp'];
		$data['nipp'] = $nipp;
		
		$email = $session_data['ui_email'];
		$data['email'] = $email;
		
		$data['supervisor'] = $this->user_hierarchy->up_to_supervisor();
		$data['asman'] = $this->user_hierarchy->up_to_manager();
		
		# get variable for docs category
		#$data['query'] = $this->docs_model->get_all_category_for_combo($cabang, $unit);
		
		
		# redirect to upload form
		$this->load->view('create_nota_dinas', $data);
	}
	
	#save nota dinas-----------------------------------------------------------------------
	function save_nota_dinas()
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
		
		# get data from form
		$docs_date_in 	= mdate("%Y-%m-%d %H:%i:%s", strtotime($this->input->post('docs_date_in')));
		$docs_reg_no 	= $this->input->post('docs_reg_no');
		$docs_type 		= $this->input->post('docs_type');
		$docs_no 		= $this->input->post('docs_no');
		$docs_date 		= mdate("%Y-%m-%d", strtotime($this->input->post('docs_date')));
		$docs_to 		= $this->input->post('docs_to');
		$docs_from 		= $this->input->post('docs_from');
		$docs_copy 		= $this->input->post('docs_copy');
		$docs_subject 	= $this->input->post('docs_subject');
		$docs_description 	= $this->input->post('docs_description');
		$docs_update_by = $ui_nipp;
		
		# do form validation ( next )
		
		# do save data
		#$docs_id = $this->docs_model->save_docs($docs_date_in,$docs_type,$docs_no,$docs_date,$docs_from,$docs_to,$docs_copy,$docs_subject,$docs_description, $docs_update_by);
		#if ($docs_id == 0) {redirect('ioc/create/create_nota_dinas');}
		$docs_id = $this->docs_model->save_docs($docs_date_in, $docs_reg_no, $docs_type,$docs_no,$docs_date,$docs_from,$docs_to,$docs_copy,$docs_subject,$docs_description, $docs_update_by);
		
		# set upload config
		$config['upload_path'] = './wp-uploads/ioc/';
		$config['allowed_types'] = 'pdf|gif|jpg|png|jpeg|bmp|doc|docx|xls|xlsx|ppt|pptx|pps|ppsx';
		$config['max_size']	= '99999';
		$config['max_width']  = '99999';
		$config['max_height']  = '99999';
	
		# call upload lib
		$this->load->library('upload', $config);
				
		# check is there any file to upload	
		if ($this->upload->do_upload('file'))
		{
			# file to upload = true
			$upload_data = $this->upload->data();
			
			# GET REAL DATA FOR DB
			$df_docs_id 	= $docs_id;
			$df_user_name 	= $this->input->post('docs_no');
			$df_real_name	= $this->security->sanitize_filename($upload_data['file_name']);
			$df_file_path 	= $upload_data['file_path'];
			$df_system_name	= date("YmdHis");	
			$df_ext			= $upload_data['file_ext'];	  	 	 	 	 	 	
			$df_size		= $upload_data['file_size'];	 	 	 	 	 	 	
			$df_type		= $this->input->post('docs_type');	 	 	 	 	 	 	
			$df_owner		= $this->input->post('docs_from');
			$df_update_by 	= $ui_nipp;
			$system_file_name = date("YmdHis");	
			
			# call model
			$this->docs_model->save_file($df_docs_id, $df_user_name, $df_real_name, $df_file_path, $df_system_name, $df_ext, $df_size, $df_type, $df_owner, $df_update_by);
			
			# rename file after upload and remove ext
			rename($upload_data['full_path'], $upload_data['file_path'] . $system_file_name . '-' . $df_real_name);
		}
		
		# get manager nipp
		/*$query = $this->docs_model->get_manager_nipp($ui_nipp, $ui_level);
		foreach($query as $manager) :
			$manager_nipp = $manager->ui_nipp;	
		endforeach;
		if($manager_nipp == ''){$manager_nipp=$ui_nipp;}*/
		$result = $this->user_hierarchy->up_to_manager();	 
		foreach($result as $items){$manager_nipp = $items->ui_nipp;}
		
		# update own docs_position
		$dp_docs_id = $docs_id;
		$dp_position = $ui_nipp;
		$dp_status = 'completed';
		$dp_date_in = $docs_date_in;
		$dp_date_out = date('Y-m-d H:i:s');
		$dp_update_by = $ui_nipp;
		
		$this->docs_model->set_docs_position($dp_docs_id, $dp_position, $dp_status, $dp_date_in, $dp_date_out, $dp_update_by);
		
		# update docs_flow
		$df_docs_id = $docs_id;
		$df_flow = 'report';
		$df_from = $ui_nipp;
		$df_to = $manager_nipp;
		$df_subject = 'penerimaan dokumen ' . $docs_no;
		$df_description = 'penerimaan dokumen ' . $docs_no . ' dari pihak lain';
		$df_update_by = $ui_nipp;
		
		$this->docs_model->update_docs_flow($df_docs_id, $df_flow, $df_from, $df_to, $df_subject, $df_description, $df_update_by);
		
		# update target docs_position to manager
		$dp_docs_id = $docs_id;
		$dp_position = $manager_nipp;
		$dp_status = 'open';
		$dp_date_in = date('Y-m-d H:i:s');
		$dp_date_out = '0000-00-00 00:00:00';
		$dp_update_by = $ui_nipp;
		
		$this->docs_model->set_docs_position($dp_docs_id, $dp_position, $dp_status, $dp_date_in, $dp_date_out, $dp_update_by);
		redirect('ioc/dashboard');
	}
	
}

/* End of file add.php */
/* Location: ./application/modules/notadinas/controllers/add.php */