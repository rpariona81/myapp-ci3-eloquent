<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class TestController extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Career_model');
    }

    public function index()
    {
        //echo 'Hola mundo';
        //$data['query'] = $this->Career_model->getListCareers();
        //echo json_encode($data);
        $this->load->view('hometest');
    }

    public function data()
    {
        //echo 'Hola mundo';
        $data['query'] = $this->Career_model->getListCareers();
        echo json_encode($data);
        //$this->load->view('hometest',$data);
    }
}