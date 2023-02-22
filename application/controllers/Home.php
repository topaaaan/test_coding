<?php

class Home extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('MyModel');
	}

	public function index()
	{
		$data['rack'] = $this->MyModel->getRack();
		$data['book'] = $this->MyModel->getData();
		$this->load->view('home/index', $data);
	}
}
