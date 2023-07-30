<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');

use Db\Test as CareerEloquent;

//https://notes.enovision.net/codeigniter/eloquent-in-codeigniter/how-to-use-the-models

class Career_model extends CI_Model
{
    private $count = 0;
    private $total = 0;
    private $results = null;

    public function __construct()
    {
        parent::__construct();

        // You can also use CodeIgniter models itself
        //$this->load->model('whatever/Model', 'WhateverModel'); 

    }

    public function getListCareers()
    {
        //$listCareers = 'rrrrrrrrrr';
        $listCareers = CareerEloquent::all();
        return $listCareers;
        //return json_encode($listCareers);
    }
}