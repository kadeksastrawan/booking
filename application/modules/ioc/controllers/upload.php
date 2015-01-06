<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Upload extends CI_Controller {

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
		# get data from login session
		$session_data = $this->session->userdata('logged_in');
		
		$nama = $session_data['ui_nama'];
		$data['nama'] = $nama;
		
		$nipp = $session_data['ui_nipp'];
		$data['nipp'] = $nipp;
		
		$email = $session_data['ui_email'];
		$data['email'] = $email;
		
		#$data['kepada'] = $this->docs_model->get_kepada();
		
		# sidebar nav 
		$data['menu_ioc'] = 'class="current"' ;
		$data['view_ioc_add'] = 'class="current"' ;
		
		# redirect to add form
		$this->load->view('add_pilih_jenis', $data);
	}
	
	function add_form()
	{
		# get data from login session
		$session_data = $this->session->userdata('logged_in');
		
		$nama = $session_data['ui_nama'];
		$data['nama'] = $nama;
		
		$nipp = $session_data['ui_nipp'];
		$data['nipp'] = $nipp;
		
		$email = $session_data['ui_email'];
		$data['email'] = $email;
		
		$ui_level = $session_data['ui_level'];
		$data['ui_level'] = $ui_level;
		
		$data['level'] = substr($ui_level, 6, 2);
		
		$data['kepada'] = $this->docs_model->get_kepada();
		
		# get data docs_type from form
		$data['jenis'] = $this->input->post('docs_type');
		$data['strip'] = '/';
		# Search docs last number
		$data['no_docs'] = $this->docs_model->get_last_docs($data['jenis']);
		# sidebar nav 
		$data['menu_ioc'] = 'class="current"' ;
		$data['view_ioc_add'] = 'class="current"' ;
						
		if ($data['jenis']== 'SKEP')
		{
			$this->load->view('add_skep', $data);
		}
		else 
		if ($data['jenis']== 'Inst')
		{
			$this->load->view('add_inst', $data);
		}
		else
		if ($data['jenis']== 'SE')
		{
			$this->load->view('add_se', $data);
		}
		else
		if ($data['jenis']== 'SD')
		{
			$this->load->view('add_sd', $data);
		}
		else
		if ($data['jenis']== 'GAPURA')
		{
			$this->load->view('add_sd_external', $data);
		}
		else
		if ($data['jenis']== 'ND')
		{
			$this->load->view('add_nd', $data);
		}
		else
		if ($data['jenis']== 'PE')
		{
			$this->load->view('add_pe', $data);
		}
		else
		if ($data['jenis']== 'Sprint')
		{
			$this->load->view('add_sprint', $data);
		}
		else
		if ($data['jenis']== 'NR')
		{
			$this->load->view('add_nr', $data);
		}
		else
		if ($data['jenis']== 'MM')
		{
			$this->load->view('add_mm', $data);
		}
		else
		{
			$this->load->view('add_umum', $data);
		}
		
		# redirect to upload form
		//$this->load->view('add_nota_dinas', $data);
	}
	
	
	
	function save()
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
		
		$level = substr($ui_level, 6, 2);
		//echo $lev;
		
		# set error message  
		$data['error'] ='';
		
		# get data from form
		$docs_date_in 	= mdate("%Y-%m-%d %H:%i:%s", strtotime($this->input->post('docs_date_in')));
		$docs_reg_no 	= $this->input->post('docs_reg_no');
		$docs_type 		= $this->input->post('docs_type');
		$docs_no 		= $this->input->post('docs_no');
		$docs_date 		= mdate("%Y-%m-%d %H:%i:%s", strtotime($this->input->post('docs_date')));
		$docs_to 		= $this->input->post('docs_to');
		$docs_from 		= $this->input->post('docs_from');
		$docs_copy 		= $this->input->post('docs_copy');
		$docs_subject 	= $this->input->post('docs_subject');
		$docs_description 	= $this->input->post('docs_description');
		$docs_update_by = $ui_nipp;
		$docs_nomor		= $this->input->post('docs_nomor');
		
		# do form validation ( next )
		
		# do save data
		$docs_id = $this->docs_model->save_docs($docs_date_in, $docs_reg_no, $docs_type,$docs_no,$docs_date,$docs_from,$docs_to,$docs_copy,$docs_subject,$docs_description, $docs_update_by, $docs_nomor);
		
		# set upload config
		$config['upload_path'] = './wp-uploads/ioc/';
		$config['allowed_types'] = 'pdf|gif|jpg|png|jpeg|bmp|doc|docx|xls|xlsx|ppt|pptx|pps|ppsx';
		$config['max_size']	= '99999';
		$config['max_width']  = '99999';
		$config['max_height']  = '99999';
	
		# call upload lib
		$this->load->library('upload', $config);
				
		# check is there any file to upload	
		for($i=1;$i<=5;$i++){
		$namafile = "file$i";
		if ($this->upload->do_upload($namafile))
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
			
			$df_files_id = $this->docs_model->save_file($df_docs_id, $df_user_name, $df_real_name, $df_file_path, $df_system_name, $df_ext, $df_size, $df_type, $df_owner, $df_update_by);
			$data_insert = array(
								"dfd_files_id"	=>	$df_files_id,
								"dfd_share"	=>	1,
								"dfd_count"	=>	0,
								"dfd_update_by" => $ui_nama,
							);
			$this->docs_model->insert_data("docs_file_download",$data_insert);
			
			# rename file after upload and remove ext
			rename($upload_data['full_path'], $upload_data['file_path'] . $system_file_name . '-' . $df_real_name);
		}
		}
		
		# get manager nipp
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
		/*
		# update progress docs_position 
		$dp_docs_id = $docs_id;
		$dp_position = $ui_nipp;
		$dp_status = 'progress';
		$dp_date_in = $docs_date_in;
		$dp_date_out = date('Y-m-d H:i:s');
		$dp_update_by = $ui_nipp;
		
		$this->docs_model->set_docs_position_progress($dp_docs_id, $dp_position, $dp_status, $dp_date_in, $dp_date_out, $dp_update_by);
		*/
		# update docs_flow
		$df_docs_id		= $docs_id;
		$df_flow		= 'add';
		$df_from 		= $ui_nipp;
	  //$df_subject 	= 'penerimaan dokumen ' . $docs_no;
	  //$df_description = 'penerimaan dokumen ' . $docs_no . ' dari pihak lain';
		$df_subject 	= '';
		$df_description = '';
		$df_update_by 	= $ui_nipp;
		
		if ($level != 11)
		{$df_to = $ui_nipp; }//$manager_nipp;}
		else
		{$df_to = $ui_nipp;}
		
		$this->docs_model->update_docs_flow($df_docs_id, $df_flow, $df_from, $df_to, $df_subject, $df_description, $df_update_by);
		
		/*
		# update target docs_position to manager
		if ($level != 11)
		{
		$dp_docs_id = $docs_id;
		$dp_position = $manager_nipp;
		$dp_status = 'open';
		$dp_date_in = date('Y-m-d H:i:s');
		$dp_date_out = '0000-00-00 00:00:00';
		$dp_update_by = $ui_nipp;
		
		$this->docs_model->set_docs_position($dp_docs_id, $dp_position, $dp_status, $dp_date_in, $dp_date_out, $dp_update_by);
		} 
		*/
		#redirect('ioc/dashboard');
		redirect('ioc/details/id/' . $docs_id );
	}
	
	/*function buat_nomor()
	{
		$docs_type 		= $this->input->post('docs_type');
		$ttd	 = 'DZ';
		$no		 = '5001';
		$datestring = "%m";
		$time = time();
		$bulan= mdate($datestring,$time);
		//echo $bulan;		
			if($bulan == 1){$bulan = 'I';}
			else
			if($bulan == 2){$bulan = 'II';}
			else
			if($bulan == 3){$bulan = 'III';}
			else
			if($bulan == 4){$bulan = 'IV';}
			else
			if($bulan == 5){$bulan = 'V';}
			else
			if($bulan == 6){$bulan = 'VI';}
			else
			if($bulan == 7){$bulan = 'VII';}
			else
			if($bulan == 8){$bulan = 'VIII';}
			else
			if($bulan == 9){$bulan = 'IX';}
			else
			if($bulan == 10){$bulan = 'X';}
			else
			if($bulan == 11){$bulan = 'XI';}
			else
			if($bulan == 12){$bulan = 'XII';}
		$datestring2 = "%Y";
		$time2 = time();
		$tahun= mdate($datestring2,$time2);
		
		if($docs_type=='SD') {$jenis='';}
		else
		$jenis=$docs_type;
		
		# redirect to upload form
		//$this->load->view('add_nota_dinas',$ttd,$no,$bulan,$tahun,$jenis);
		
	} */

}

/* End of file add.php */
/* Location: ./application/modules/notadinas/controllers/add.php */