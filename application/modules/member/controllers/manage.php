<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Manage extends CI_Controller {

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
		redirect("member/manage/hotel");
	}
	# list hotel
	function hotel()
	{
		if ($this->session->userdata('session_hotel')){ $this->session->unset_userdata('session_hotel');}
		
		# get data from session
		$session_data = $this->session->userdata('logged_in');
		  
		# data
		$ui_member_id = $session_data['ui_member_id'];
		$data['ui_member_id'] = $ui_member_id;
		
		$ui_nama = $session_data['ui_nama'];
		$data['ui_nama'] = $ui_nama;
		
		$ui_nipp = $session_data['ui_nipp'];
		$data['ui_nipp'] = $ui_nipp;
		  
		$ui_email = $session_data['ui_email'];
		$data['ui_email'] = $ui_email;
		
		$ui_level = $session_data['ui_level'];
		$station = substr($ui_level,4,2);
		$lvl = substr($ui_level,6);  
		#pagination config
		$search = "";
		$config['base_url'] = base_url().'member/manage/hotel/'; 
		$config['total_rows'] = $this->member_model->count_hotel($ui_member_id); 
		$config['per_page'] = 50; 
		$config['uri_segment'] = 4; 
		$this->pagination->initialize($config);
		$page = ($this->uri->segment(4)) ? $this->uri->segment(4) : 0;
		
		#data preparing
		$data['list'] = $this->member_model->get_hotel($ui_member_id,$config['per_page'],$page);
		$data['count']	= $config['total_rows'];
		$data['page'] = $page;
		
		# sidebar nav 
		$data['menu_manage'] = 'class="current"' ;
		$data['view_manage_hotel'] = 'class="current"' ;
		//$data['search'] = $search;
		# call views		
		$this->load->view('hotel_list', $data);
	}

	# hotel gallery
	function hotel_gallery()
	{
		if($this->session->userdata('session_hotel')): ;
		else : $this->session->set_userdata('session_hotel',$this->input->post('hotel_id')); endif;
		
		# get data from session
		$session_data = $this->session->userdata('logged_in');
		  
		# data
		$ui_member_id = $session_data['ui_member_id'];
		$data['ui_member_id'] = $ui_member_id;
		
		$ui_nama = $session_data['ui_nama'];
		$data['ui_nama'] = $ui_nama;
		
		$ui_nipp = $session_data['ui_nipp'];
		$data['ui_nipp'] = $ui_nipp;
		  
		$ui_email = $session_data['ui_email'];
		$data['ui_email'] = $ui_email;
		
		$ui_level = $session_data['ui_level'];
		$station = substr($ui_level,4,2);
		$lvl = substr($ui_level,6);  
		
		$hotel_id = $this->session->userdata("session_hotel");
		
		#pagination config
		$search = "";
		$config['base_url'] = base_url().'member/manage/hotel_gallery/'; 
		$config['total_rows'] = $this->member_model->count_hotel_gallery($hotel_id); 
		$config['per_page'] = 50; 
		$config['uri_segment'] = 4; 
		$this->pagination->initialize($config);
		$page = ($this->uri->segment(4)) ? $this->uri->segment(4) : 0;
		
		#data preparing
		$data['list'] = $this->member_model->get_hotel_gallery($hotel_id,$config['per_page'],$page);
		$data['count']	= $config['total_rows'];
		$data['page'] = $page;
		
		# sidebar nav 
		$data['menu_manage'] = 'class="current"' ;
		$data['view_manage_hotel_gallery'] = 'class="current"' ;
		$data['search'] = $search;
		# call views		
		$this->load->view('hotel_gallery_list', $data);
	}
	
	# list room
	function room()
	{
		if($this->session->userdata('session_hotel')): ;else : $this->session->set_userdata('session_hotel',$this->input->post('hotel_id')); endif;
		
		# get data from session
		$session_data = $this->session->userdata('logged_in');
		  
		# data
		$ui_member_id = $session_data['ui_member_id'];
		$data['ui_member_id'] = $ui_member_id;
		
		$ui_nama = $session_data['ui_nama'];
		$data['ui_nama'] = $ui_nama;
		
		$ui_nipp = $session_data['ui_nipp'];
		$data['ui_nipp'] = $ui_nipp;
		  
		$ui_email = $session_data['ui_email'];
		$data['ui_email'] = $ui_email;
		
		$ui_level = $session_data['ui_level'];
		$station = substr($ui_level,4,2);
		$lvl = substr($ui_level,6);  
		
		$hotel_id = $this->session->userdata("session_hotel");
		
		#pagination config
		$search = "";
		$config['base_url'] = base_url().'member/manage/room/'; 
		$config['total_rows'] = $this->member_model->count_room($hotel_id); 
		$config['per_page'] = 50; 
		$config['uri_segment'] = 4; 
		$this->pagination->initialize($config);
		$page = ($this->uri->segment(4)) ? $this->uri->segment(4) : 0;
		
		#data preparing
		$data['list'] = $this->member_model->get_room($hotel_id,$config['per_page'],$page);
		$data['count']	= $config['total_rows'];
		$data['page'] = $page;
		
		# sidebar nav 
		$data['menu_manage'] = 'class="current"' ;
		$data['view_manage_room'] = 'class="current"' ;
		$data['search'] = $search;
		# call views		
		$this->load->view('room_list', $data);
	}
	# list room type
	function room_type()
	{
		if($this->session->userdata('session_hotel')): ;else : $this->session->set_userdata('session_hotel',$this->input->post('hotel_id')); endif;
		
		# get data from session
		$session_data = $this->session->userdata('logged_in');
		  
		# data
		$ui_member_id = $session_data['ui_member_id'];
		$data['ui_member_id'] = $ui_member_id;
		
		$ui_nama = $session_data['ui_nama'];
		$data['ui_nama'] = $ui_nama;
		
		$ui_nipp = $session_data['ui_nipp'];
		$data['ui_nipp'] = $ui_nipp;
		  
		$ui_email = $session_data['ui_email'];
		$data['ui_email'] = $ui_email;
		
		$ui_level = $session_data['ui_level'];
		$station = substr($ui_level,4,2);
		$lvl = substr($ui_level,6);  
		
		$hotel_id = $this->session->userdata("session_hotel");
		
		#pagination config
		$search = "";
		$config['base_url'] = base_url().'member/manage/room_type/'; 
		$config['total_rows'] = $this->member_model->count_room_type($hotel_id); 
		$config['per_page'] = 50; 
		$config['uri_segment'] = 4; 
		$this->pagination->initialize($config);
		$page = ($this->uri->segment(4)) ? $this->uri->segment(4) : 0;
		
		#data preparing
		$data['list'] = $this->member_model->get_room_type($hotel_id,$config['per_page'],$page);
		$data['count']	= $config['total_rows'];
		$data['page'] = $page;
		
		# sidebar nav 
		$data['menu_manage'] = 'class="current"' ;
		$data['view_manage_room_type'] = 'class="current"' ;
		$data['search'] = $search;
		# call views		
		$this->load->view('room_type_list', $data);
	}
	function room_capacity()
	{
		if($this->session->userdata('session_hotel')): ;else : $this->session->set_userdata('session_hotel',$this->input->post('hotel_id')); endif;
		
		# get data from session
		$session_data = $this->session->userdata('logged_in');
		  
		# data
		$ui_member_id = $session_data['ui_member_id'];
		$data['ui_member_id'] = $ui_member_id;
		
		$ui_nama = $session_data['ui_nama'];
		$data['ui_nama'] = $ui_nama;
		
		$ui_nipp = $session_data['ui_nipp'];
		$data['ui_nipp'] = $ui_nipp;
		  
		$ui_email = $session_data['ui_email'];
		$data['ui_email'] = $ui_email;
		
		$ui_level = $session_data['ui_level'];
		$station = substr($ui_level,4,2);
		$lvl = substr($ui_level,6);  
		
		$hotel_id = $this->session->userdata("session_hotel");
		
		#pagination config
		$search = "";
		$config['base_url'] = base_url().'member/manage/room_capacity/'; 
		$config['total_rows'] = $this->member_model->count_room_capacity($hotel_id); 
		$config['per_page'] = 50; 
		$config['uri_segment'] = 4; 
		$this->pagination->initialize($config);
		$page = ($this->uri->segment(4)) ? $this->uri->segment(4) : 0;
		
		#data preparing
		$data['list'] = $this->member_model->get_room_capacity($hotel_id,$config['per_page'],$page);
		$data['count']	= $config['total_rows'];
		$data['page'] = $page;
		
		# sidebar nav 
		$data['menu_manage'] = 'class="current"' ;
		$data['view_manage_room_capacity'] = 'class="current"' ;
		$data['search'] = $search;
		# call views		
		$this->load->view('room_capacity_list', $data);
	}
	# room price 
	function room_price()
	{
		if($this->session->userdata('session_hotel')): ;else : $this->session->set_userdata('session_hotel',$this->input->post('hotel_id')); endif;
		
		# get data from session
		$session_data = $this->session->userdata('logged_in');
		  
		# data
		$ui_member_id = $session_data['ui_member_id'];
		$data['ui_member_id'] = $ui_member_id;
		
		$ui_nama = $session_data['ui_nama'];
		$data['ui_nama'] = $ui_nama;
		
		$ui_nipp = $session_data['ui_nipp'];
		$data['ui_nipp'] = $ui_nipp;
		  
		$ui_email = $session_data['ui_email'];
		$data['ui_email'] = $ui_email;
		
		$ui_level = $session_data['ui_level'];
		$station = substr($ui_level,4,2);
		$lvl = substr($ui_level,6);  
		
		$hotel_id = $this->session->userdata("session_hotel");
		
		#pagination config
		$search = "";
		$config['base_url'] = base_url().'member/manage/room_price/'; 
		$config['total_rows'] = $this->member_model->count_room_price($hotel_id); 
		$config['per_page'] = 50; 
		$config['uri_segment'] = 4; 
		$this->pagination->initialize($config);
		$page = ($this->uri->segment(4)) ? $this->uri->segment(4) : 0;
		
		#data preparing
		$data['list'] = $this->member_model->get_room_price($hotel_id,$config['per_page'],$page);
		$data['count']	= $config['total_rows'];
		$data['page'] = $page;
		
		# sidebar nav 
		$data['menu_manage'] = 'class="current"' ;
		$data['view_manage_room_price'] = 'class="current"' ;
		$data['search'] = $search;
		# call views		
		$this->load->view('room_price_list', $data);
	}
	
	# room no 
	function room_no()
	{
		if($this->session->userdata('session_hotel')): ;else : $this->session->set_userdata('session_hotel',$this->input->post('hotel_id')); endif;
		
		# get data from session
		$session_data = $this->session->userdata('logged_in');
		  
		# data
		$ui_member_id = $session_data['ui_member_id'];
		$data['ui_member_id'] = $ui_member_id;
		
		$ui_nama = $session_data['ui_nama'];
		$data['ui_nama'] = $ui_nama;
		
		$ui_nipp = $session_data['ui_nipp'];
		$data['ui_nipp'] = $ui_nipp;
		  
		$ui_email = $session_data['ui_email'];
		$data['ui_email'] = $ui_email;
		
		$ui_level = $session_data['ui_level'];
		$station = substr($ui_level,4,2);
		$lvl = substr($ui_level,6);  
		
		//$hotel_id = $this->session->userdata("session_hotel");
		$room_id = $this->input->post("room_id");
		
		#pagination config
		$search = "";
		$config['base_url'] = base_url().'member/manage/room_no/'; 
		$config['total_rows'] = $this->member_model->count_room_no($room_id); 
		$config['per_page'] = 50; 
		$config['uri_segment'] = 4; 
		$this->pagination->initialize($config);
		$page = ($this->uri->segment(4)) ? $this->uri->segment(4) : 0;
		
		#data preparing
		$data['list'] = $this->member_model->get_room_no($room_id,$config['per_page'],$page);
		$data['count']	= $config['total_rows'];
		$data['page'] = $page;
		
		# sidebar nav 
		$data['menu_manage'] = 'class="current"' ;
		$data['view_manage_room_no'] = 'class="current"' ;
		$data['search'] = $search;
		# call views		
		$this->load->view('room_no_list', $data);
	}
	# room blocking
	function room_blocking()
	{
		if($this->session->userdata('session_hotel')): ;else : $this->session->set_userdata('session_hotel',$this->input->post('hotel_id')); endif;
		
		# get data from session
		$session_data = $this->session->userdata('logged_in');
		  
		# data
		$ui_member_id = $session_data['ui_member_id'];
		$data['ui_member_id'] = $ui_member_id;
		
		$ui_nama = $session_data['ui_nama'];
		$data['ui_nama'] = $ui_nama;
		
		$ui_nipp = $session_data['ui_nipp'];
		$data['ui_nipp'] = $ui_nipp;
		  
		$ui_email = $session_data['ui_email'];
		$data['ui_email'] = $ui_email;
		
		$ui_level = $session_data['ui_level'];
		$station = substr($ui_level,4,2);
		$lvl = substr($ui_level,6);  
		
		//$hotel_id = $this->session->userdata("session_hotel");
		$room_id = $this->input->post("room_id");
		
		#pagination config
		$search = "";
		$config['base_url'] = base_url().'member/manage/room_blocking/'; 
		$config['total_rows'] = $this->member_model->count_room_blocking($room_id); 
		$config['per_page'] = 50; 
		$config['uri_segment'] = 4; 
		$this->pagination->initialize($config);
		$page = ($this->uri->segment(4)) ? $this->uri->segment(4) : 0;
		
		#data preparing
		$data['list'] = $this->member_model->get_room_blocking($room_id,$config['per_page'],$page);
		$data['count']	= $config['total_rows'];
		$data['page'] = $page;
		
		# sidebar nav 
		$data['menu_manage'] = 'class="current"' ;
		$data['view_manage_room_blocking'] = 'class="current"' ;
		$data['search'] = $search;
		# call views		
		$this->load->view('room_blocking', $data);
	}
	# room type facilities
	function room_type_facilities()
	{
		if($this->session->userdata('session_hotel')): ;else : $this->session->set_userdata('session_hotel',$this->input->post('hotel_id')); endif;
		
		# get data from session
		$session_data = $this->session->userdata('logged_in');
		  
		# data
		$ui_member_id = $session_data['ui_member_id'];
		$data['ui_member_id'] = $ui_member_id;
		
		$ui_nama = $session_data['ui_nama'];
		$data['ui_nama'] = $ui_nama;
		
		$ui_nipp = $session_data['ui_nipp'];
		$data['ui_nipp'] = $ui_nipp;
		  
		$ui_email = $session_data['ui_email'];
		$data['ui_email'] = $ui_email;
		
		$ui_level = $session_data['ui_level'];
		$station = substr($ui_level,4,2);
		$lvl = substr($ui_level,6);  
		
		//$hotel_id = $this->session->userdata("session_hotel");
		$room_type_id = $this->input->post("room_type_id");
		
		#pagination config
		$search = "";
		$config['base_url'] = base_url().'member/manage/room_type_facilities/'; 
		$config['total_rows'] = $this->member_model->count_room_type_facilities($room_type_id); 
		$config['per_page'] = 50; 
		$config['uri_segment'] = 4; 
		$this->pagination->initialize($config);
		$page = ($this->uri->segment(4)) ? $this->uri->segment(4) : 0;
		
		#data preparing
		$data['list'] = $this->member_model->get_room_type_facilities($room_type_id,$config['per_page'],$page);
		$data['count']	= $config['total_rows'];
		$data['page'] = $page;
		
		# sidebar nav 
		$data['menu_manage'] = 'class="current"' ;
		$data['view_manage_room_blocking'] = 'class="current"' ;
		$data['search'] = $search;
		# call views		
		$this->load->view('room_type_facilities_list', $data);
	}
	
}

/* End of file dashboard.php */
/* Location: ./application/controllers/dashboard.php */