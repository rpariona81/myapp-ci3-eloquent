<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

//https://github.com/chriskacerguis/codeigniter-restserver
//https://www.youtube.com/watch?v=0N6frAVa2GE&list=PLRheCL1cXHrtV_KV9eNobLJnXMtgQd_x0
use chriskacerguis\RestServer\RestController;

header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: GET, POST, OPTIONS, PUT, DELETE");

class ApiDemoController extends RestController {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Career_model');

    }

    public function index_get()
    {
        //echo 'Welcome to API';
        $id = $this->get('id',TRUE);

        if(!empty($id)) {
            $data = $this->Career_model->get_select($id);
            if($data) {
                $res['error'] = false;
                $res['message'] = 'success get data by id';
                $res['data'] = $data;    
                
            }else {
                $res['error'] = true;
                $res['message'] = 'failed get data';
            }
        }else{
            $data = $this->Career_model->get_all();
            if($data) {
                $res['error'] = false;
                $res['message'] = 'success get all data';
                $res['data'] = $data;

            } else {
                $res['error'] = true;
                $res['message'] = 'failed get data';
            }
        }
        
        $this->response($res, 200);  
 
    }

    public function storeCareer_post()
    {
        //echo 'Welcome to API';
        $request = $this->input->post();
        $region_id = $this->input->post('region_id',TRUE);
        $codentidad = $this->input->post('codentidad',TRUE);
        $entidad = $this->input->post('entidad',TRUE);
        $titulo_entidad = $this->input->post('titulo_entidad',TRUE);
        $codtipoentidad = $this->input->post('codtipoentidad',TRUE);
        $codgestionentidad = $this->input->post('codgestionentidad',TRUE);
        $estado = $this->input->post('estado',TRUE);
        $flag_visible = $this->input->post('flag_visible',TRUE);

        if(!empty($request)) {
            $data = $this->Career_model->store($id);
            if($data) {
                $res['error'] = false;
                $res['message'] = 'success get data by id';
                $res['data'] = $data;    
                
            }else {
                $res['error'] = true;
                $res['message'] = 'failed get data';
            }
        }else{
            $data = $this->Career_model->get_all();
            if($data) {
                $res['error'] = false;
                $res['message'] = 'success get all data';
                $res['data'] = $data;

            } else {
                $res['error'] = true;
                $res['message'] = 'failed get data';
            }
        }
        
        $this->response($res, 200);  
 
    }
}
