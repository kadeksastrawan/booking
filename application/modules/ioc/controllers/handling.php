<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Handling extends CI_Controller {

	/**
	 * PT Gapura Angkasa
	 * Module : Nota Dinas 
	 * Sub Module : Handling
	 *
	 * open controller
	 *
	 * url : http://localhost/github/office/modules/ioc/handling.php
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
			
			
		# get data from form
		$docs_id = $this->input->post('docs_id');
		$docs_action = $this->input->post('docs_action');
		$docs_subject = $this->input->post('docs_subject');
		$docs_description = $this->input->post('docs_description');
		
		if ($docs_action == 'report')
		{	
			$list_upline = $this->user_hierarchy->get_upline();
			foreach ($list_upline as $upline) 
			{
				# get value from checkbox 
				$nama = strtoupper($this->encrypt->decode($upline->ui_nama, $this->config->item('encryption_key')));
				$nama = str_replace(" ","_",$nama);
				$nn   = "report_$nama";
				$nipp = $this->input->post($nn);
					
				if ($nipp != '')
				{
					$nipp_target = $nipp;
					echo $nipp_target;
				}
				
				$this->send($nipp_target);
			}
		} 
		else
		if ($docs_action == 'coordination')
		{	
			$list_colleagues = $this->user_hierarchy->get_colleagues();
			foreach ($list_colleagues as $colleagues) 
			{
				# get value from checkbox 
				$nama = strtoupper($this->encrypt->decode($colleagues->ui_nama, $this->config->item('encryption_key')));
				$nama = str_replace(" ","_",$nama);
				$nn   = "coordination_$nama";
				$nipp = $this->input->post($nn);
					
				if ($nipp != '')
				{
					$nipp_target = $nipp;
				}
				
				$this->send($nipp_target);
			}
		} 
		else
		if ($docs_action == 'disposition')
		{	
			$list_downline = $this->user_hierarchy->get_downline();
			foreach ($list_downline as $downline) 
			{
				# get value from checkbox 
				$nama = strtoupper($this->encrypt->decode($downline->ui_nama, $this->config->item('encryption_key')));
				$nama = str_replace(" ","_",$nama);
				$nn   = "disposition_$nama";
				$nipp = $this->input->post($nn);
					
				if ($nipp != '')
				{
					$nipp_target = $nipp;
				}
				
				$this->send($nipp_target);
			}
			
		} 
		else
		if ($docs_action == 'closed')
		{
			# update docs_position to close
			$dp_id = $docs_id;
			$dp_s = 'closed';
			$dp_u = $ui_nipp;
		
			$this->docs_model->update_docs_close($dp_id,$dp_s,$dp_u);
			
			#update docs progress to completed again
			$dp_id = $docs_id;
			$dp_s = 'completed';
			$dp_s2 = 'progress';
			$dp_u = $ui_nipp;
			$this->docs_model->update_docs_progress($dp_id,$dp_s,$dp_s2,$dp_u);
		}
		else
		if ($docs_action == 'completed')
		{
			# update own docs_position
			$dp_docs_id = $docs_id;
			$dp_position = $ui_nipp;
			$dp_status = 'completed';
			$dp_date_out = date('Y-m-d H:i:s');
			$dp_update_by = $ui_nipp;
			
			$this->docs_model->update_docs_position($dp_docs_id, $dp_position, $dp_status, $dp_date_out, $dp_update_by);
			
			#update docs closed to completed again
			$dp_id = $docs_id;
			$dp_s = 'completed';
			$dp_s2 = 'closed';
			$dp_u = $ui_nipp;
			$this->docs_model->update_docs_complete($dp_id,$dp_s,$dp_s2,$dp_u);
			
			#update docs progress to completed again
			$dp_id = $docs_id;
			$dp_s = 'completed';
			$dp_s2 = 'progress';
			$dp_u = $ui_nipp;
			$this->docs_model->update_docs_progress($dp_id,$dp_s,$dp_s2,$dp_u);
		}
		
		if ($docs_action != 'closed' OR $docs_action != 'completed')
		{
			/*
			# update progress docs_position 
			$dp_docs_id = $docs_id;
			$dp_position = $ui_nipp;
			$dp_status = 'progress';
			$dp_date_in = date('Y-m-d H:i:s');//$docs_date_in;
			$dp_date_out = date('Y-m-d H:i:s');
			$dp_update_by = $ui_nipp;
			
			$this->docs_model->set_docs_position_progress($dp_docs_id, $dp_position, $dp_status, $dp_date_in, $dp_date_out, $dp_update_by);
			*/
			#update docs completed to progress again
			$dp_id = $docs_id;
			$dp_s = 'progress';
			$dp_s2 = 'completed';
			$dp_u = $ui_nipp;
			$dp_u2 = $ui_nipp;
			$this->docs_model->update_docs_completed($dp_id,$dp_s,$dp_s2,$dp_u,$dp_u2);
			
			//redirect('ioc/details/id/' . $docs_id );
			redirect('ioc/dashboard/');
		}
	}
	
	function send($nipp_target)
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
		$docs_id = $this->input->post('docs_id');
		$docs_action = $this->input->post('docs_action');
		$docs_subject = $this->input->post('docs_subject');
		$docs_description = $this->input->post('docs_description');
		$docs_type = $this->input->post('docs_type');
		
		echo $nipp_target;
		echo $docs_id;
		# update own docs_position
		$dp_docs_id = $docs_id;
		$dp_position = $ui_nipp;
		$dp_status = 'completed';
		$dp_date_out = date('Y-m-d H:i:s');
		$dp_update_by = $ui_nipp;
		
		$this->docs_model->update_docs_position($dp_docs_id, $dp_position, $dp_status, $dp_date_out, $dp_update_by);
		
		# update docs_flow
		$df_docs_id = $docs_id;
		$df_flow = $docs_action;
		$df_from = $ui_nipp;
		$df_to = $nipp_target;
		$df_subject = $docs_subject;
		$df_description = $docs_description;
		$df_update_by = $ui_nipp;
		
		$this->docs_model->update_docs_flow($df_docs_id, $df_flow, $df_from, $df_to, $df_subject, $df_description, $df_update_by);
		
		
		# update target docs_position to manager
		$dp_docs_id = $docs_id;
		$dp_position = $nipp_target;
		$dp_status = 'open';
		$dp_date_in = date('Y-m-d H:i:s');
		$dp_date_out = '0000-00-00 00:00:00'; //date('Y-m-d H:i:s'); 
		$dp_update_by = $ui_nipp;
		
		$this->docs_model->set_docs_position($dp_docs_id, $dp_position, $dp_status, $dp_date_in, $dp_date_out, $dp_update_by);
		
		#update docs closed to completed again
		$dp_id = $docs_id;
		$dp_s = 'completed';
		$dp_s2 = 'closed';
		$dp_u = $ui_nipp;
		$this->docs_model->update_docs_complete($dp_id,$dp_s,$dp_s2,$dp_u);
		
		/*
		# update progress docs_position 
		$dp_docs_id = $docs_id;
		$dp_position = $ui_nipp;
		$dp_status = 'progress';
		$dp_date_in = date('Y-m-d H:i:s');//$docs_date_in;
		$dp_date_out = date('Y-m-d H:i:s');
		$dp_update_by = $ui_nipp;
		
		$this->docs_model->set_docs_position_progress($dp_docs_id, $dp_position, $dp_status, $dp_date_in, $dp_date_out, $dp_update_by);
		
		#update docs completed to progress again
		$dp_id = $docs_id;
		$dp_s = 'progress';
		$dp_s2 = 'completed';
		$dp_u = $ui_nipp;
		$dp_u2 = $ui_nipp;
		$this->docs_model->update_docs_completed($dp_id,$dp_s,$dp_s2,$dp_u,$dp_u2);
		*/
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
			$df_real_name	= preg_replace(array('/\s/', '/\.[\.]+/', '/[^\w_\.\-]/'), array('_', '.', ''), $df_real_name);
			$df_file_path 	= $upload_data['file_path'];
			$df_system_name	= date("YmdHis");	
			$df_ext			= $upload_data['file_ext'];	  	 	 	 	 	 	
			$df_size		= $upload_data['file_size'];	 	 	 	 	 	 	
			$df_type		= $this->input->post('docs_type');	 	 	 	 	 	 	
			$df_owner		= $this->input->post('docs_from');
			$df_update_by 	= $ui_nipp;
			$system_file_name = date("YmdHis");	
			
			#$upload_data = preg_replace(array('/\s/', '/\.[\.]+/', '/[^\w_\.\-]/'), array('_', '.', ''), $upload_data);
			# call model
			$this->docs_model->save_file($df_docs_id, $df_user_name, $df_real_name, $df_file_path, $df_system_name, $df_ext, $df_size, $df_type, $df_owner, $df_update_by);
			
			# rename file after upload and remove ext
			rename($upload_data['full_path'], $upload_data['file_path'] . $system_file_name . '-' . $df_real_name);
		}
		
	}
	
}

/* End of file handling.php */
/* Location: ./application/modules/notadinas/controllers/handling.php */