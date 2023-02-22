<?php

class Admin extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('MyModel');
	}

	public function Login()
	{
		$username = $this->session->userdata('username');
        if ($username) {
            redirect('Admin');
        }
		$data['rack'] = $this->MyModel->getAllData();
		$this->load->view('admin/login', $data);
	}	

    public function Logout()
    {
        $this->session->unset_userdata('username');
        redirect('Admin/Login');
    }

	public function ActionLogin()
	{
		$username = $this->input->post('username');
		$password = $this->input->post('password');
		$cek = $this->MyModel->cekLogin($username, $password);
		if($cek){
			$data = [
	            'username' => $cek[0]->username
	        ];
	        $this->session->set_userdata($data);
	        echo "success";
		} else {
			echo "Login Failed";
		}
	}	

	public function index()
	{
		$username = $this->session->userdata('username');
        if (!$username) {
            redirect('Admin/Login');
        }
		$data['rack'] = $this->MyModel->getAllData();
		$this->load->view('admin/index', $data);
	}

	public function Tambah()
	{
		$username = $this->session->userdata('username');
        if (!$username) {
            redirect('Admin/Login');
        }
		$data['rack'] = $this->MyModel->getRack();
		$data['book'] = $this->MyModel->getBook();
		$data['id'] = 'none';
		if ($this->input->get('id')) {
			$id = $this->input->get('id');
			$data['id'] = $id;
			$data['target'] = $this->MyModel->getDataById($id);
		}
		$this->load->view('admin/tambah', $data);
	}

	public function ActionTambah()
	{
		$rack = $this->input->post('rack');
		$book = $this->input->post('book');
		$data = [
            'rack_id' => $rack,
            'book_id' => $book
        ];
		$this->MyModel->addData($data);
	}

	public function ActionEdit()
	{
		$id = $this->input->post('id');
		$rack = $this->input->post('rack');
		$book = $this->input->post('book');
		$data = [
            'rack_id' => $rack,
            'book_id' => $book
        ];
		$this->MyModel->editData($data, $id);
	}

	public function Delete()
	{
		$id = $this->input->post('id');
		$this->MyModel->deleteData($id);
	}

}
