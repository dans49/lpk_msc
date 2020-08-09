<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

	public function index()
	{
		$data = array(
			'title' => 'Homepage'
		);
		$this->lib_por->portaluser('pages/homepage',$data);
	}


	public function even()
	{
		$data = array(
			'title' => 'Even'
		);
		$this->lib_por->portaluser('pages/events',$data);
	}

	public function biaya()
	{
		$data = array(
			'title' => 'Biaya Program'
		);
		$this->lib_por->portaluser('pages/pricing',$data);
	}

	public function kontak()
	{
		$data = array(
			'title' => 'Kontak Kami'
		);
		$this->lib_por->portaluser('pages/contact',$data);
	}

	public function send_kontak()
	{
		$name = $this->input->post('name');
		$mail = $this->input->post('email');
		$subj = $this->input->post('subject');
		$mess = $this->input->post('message');

		$to_email = 'lpkmsc2020@gmail.com';
		$config = Array(
			    'protocol' => 'smtp',
			    'smtp_host' => 'ssl://smtp.googlemail.com',
			    'smtp_port' => 465,
			    'smtp_user' => 'lpkmsc@infokontak',
			    'smtp_pass' => '',
			    'mailtype'  => 'html', 
			    'charset'   => 'iso-8859-1'
			);
		$this->load->library('email', $config);
		$this->email->set_newline("\r\n");   

		$this->email->from($mail, $name); 
		$this->email->to($to_email);
		$this->email->subject("LPK MSC Info - ".$subj); 
		$this->email->message($mess); 

		if($this->email->send()){
			redirect(site_url('kontak'));
		}
	}
}
