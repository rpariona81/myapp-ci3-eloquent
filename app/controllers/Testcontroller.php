<?php
defined('BASEPATH') or exit('No direct script access allowed');

class TestController extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Career_model');
        $this->load->model('Instituto_model');
    }

    public function index()
    {
        //echo 'Hola mundo';
        //$data['query'] = $this->Career_model->get_all();
        //echo json_encode($data);
        $this->load->view('hometest');
    }

    public function login()
    {
        //echo 'Hola mundo';
        //$data['query'] = $this->Career_model->get_all();
        //echo json_encode($data);
        $this->load->view('login');
    }

    public function data()
    {
        //echo 'Hola mundo';
        $data['query'] = $this->Career_model->get_all();
        echo json_encode($data);
        //return $data;
        //return $this->output->set_content_type('application/json')->set_output(json_encode($data));
        //$this->load->view('hometest',$data);
    }

    public function list()
    {
        //echo 'Hola mundo';
        $data['query'] = $this->Instituto_model->get_all();
        echo json_encode($data);
        //return $data;
        //return $this->output->set_content_type('application/json')->set_output(json_encode($data));
        //$this->load->view('hometest',$data);
    }

    public function nueva_entidad()
    {
        $data['contenido'] = 'admin/entidadNew';
        $this->load->view('admin/template', $data);
    }

    public function crea_entidad()
    {
        $registro = $this->input->post();
        $this->form_validation->set_rules('name', 'Nombres', 'required');
        $this->form_validation->set_rules('username', 'Usuario', 'required|callback_no_repetir_username');
        $this->form_validation->set_rules('email', 'Email', 'valid_email|callback_no_repetir_email');
        $this->form_validation->set_rules('document_number', 'Nro documento', 'required|callback_no_repetir_document');
        $this->form_validation->set_rules('mobile', 'teléfono celular', 'required|callback_no_repetir_mobile');
        //si el proceso falla mostramos errores
        if ($this->form_validation->run() == FALSE) {
            $this->nueva_entidad();
            //en otro caso procesamos los datos
        } else {
            date_default_timezone_set('America/Lima');
            $this->Career_model->store($registro);
            redirect('/test/table');
        }
    }
    public function table()
    {
        $data['query'] = $this->Career_model->get_all();
        $this->load->view('tabletest', $data);
    }
}