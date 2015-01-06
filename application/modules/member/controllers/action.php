<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Action extends CI_Controller {

	/**
	 * User Controller
	 *
	 */
	
	
	 function __construct()
	{
        parent::__construct();
		
		# load model, library and helper
		$this->load->model('member_model','', TRUE);
		
		
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
					redirect('user/password_login');
				}	
    }

	function index()
	{
		redirect("member/action/add");
	}
	function add()
	{
		# get data from session
		$session_data = $this->session->userdata('logged_in');
		  
		# data
		$ui_member = $session_data['ui_member_id'];
		$data['ui_member_id'] = $ui_member_id;
		
		$ui_nama = $session_data['ui_nama'];
		$data['ui_nama'] = $ui_nama;
		
		$ui_nipp = $session_data['ui_nipp'];
		$data['ui_nipp'] = $ui_nipp;
		  
		$ui_email = $session_data['ui_email'];
		$data['ui_email'] = $ui_email;
		
		$link = $this->uri->segment(4, "ERROR");
		if($link == "ERROR"):redirect("messages/error/not_found");endif;
		
		$hotel_id = $this->session->userdata('session_hotel');
		
		if(($ui_member == 0) AND ($link == "hotel")):$this->load->view("member/add_hotel");
		elseif($link == "room"):$this->load->view("member/add_room");
		elseif($link == "room_no"):$this->load->view("member/add_room_no");
		elseif($link == "room_type"):$this->load->view("member/add_room_type");
		elseif($link == "room_capacity"):$this->load->view("member/add_room_capacity");
		elseif($link == "room_price"):$this->load->view("member/add_room_price");
		elseif($link == "room_blocking"):$this->load->view("member/add_room_blocking");
		elseif($link == "room_"):$this->load->view("member/add_room_blocking");
		endif;
		
		
		if(!isset($this->session->userdata('session_hotel'))): $this->session->set_userdata('session_hotel',$this->input->post('hotel_id')); endif;
	}
	function edit()
	{
	
	}
}

/* End of file dashboard.php */
/* Location: ./application/controllers/dashboard.php */