<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Page extends CI_Controller {

	public function index()
	{
		//echo "aksjdkjasd akjsd ";
		redirect('public/page/page_result');
	}
	
	public function page_result()
	{
		$data['destination'] = $this->input->post("destination");
		$data['check_in'] = $this->input->post("check_in");
		$data['check_out'] = $this->input->post("check_out");
		$data['adults'] = $this->input->post("adults");
		$data['children'] = $this->input->post("children");
		//$this->load->model("public_model");
		//$this->public_model->get_destination_result();
		$this->load->view('page_result',$data);
	}
	
	public function page_detail()
	{
		$this->load->view('page_detail');
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */