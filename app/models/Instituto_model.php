<?php
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

use Db\Instituto as InstitutoEloquent;

//https://notes.enovision.net/codeigniter/eloquent-in-codeigniter/how-to-use-the-models

class Instituto_model extends CI_Model
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

    /*
    Get all the records from the database
    */
    public function get_all()
    {
        $lista = InstitutoEloquent::all();
        return $lista;
    }

    /*
    Store the record in the database
    */
    public function store($request)
    {
        $data = array(
            'id_region' => $request->id_region,
            'cod_mod' => $request->cod_mod,
            'anexo' => $request->anexo,
            'cod_local' => $request->cod_local,
            'cen_edu' => $request->cen_edu,
            'instituto' => $request->instituto,
            'es_licenciado' => $request->es_licenciado,
            'rm_licenciamiento' => $request->rm_licenciamiento,
            'doc_licenciamiento' => $request->doc_licenciamiento,
            'fecha_rm_licenciamiento' => $request->fecha_rm_licenciamiento,
            'resolucion_creacion' => $request->resolucion_creacion,
            'es_idex' => $request->es_idex,
            'd_niv_mod' => $request->d_niv_mod,
            'd_gestion' => $request->d_gestion,
            'd_ges_dep' => $request->d_ges_dep,
            'dareacenso' => $request->dareacenso,
            'codgeo' => $request->codgeo,
            'd_dpto' => $request->d_dpto,
            'd_prov' => $request->d_prov,
            'd_dist' => $request->d_dist,
            'd_region' => $request->d_region,
            'codooii' => $request->codooii,
            'd_dreugel' => $request->d_dreugel,
            'optimizacion' => $request->optimizacion,
            'url_website' => $request->url_website,
            'url_folder' => $request->url_folder,
            'url_gdriveoptimizacion' => $request->url_gdriveoptimizacion,
            'estado_optimizacion' => $request->estado_optimizacion,
            'estado_fortalecimiento' => $request->estado_fortalecimiento,
            'estado_portalweb' => $request->estado_portalweb,
            'estado' => $request->estado,
            'created_by' => $request->created_by,
            'updated_by' => $request->updated_by
        );

        $model = new InstitutoEloquent();
        $model->fill($data);
        $model->save($data);
    }

    /*
    Get an specific record from the database
    */
    public function get($request)
    {
        //Buscar primero al proveedor a modificar:
        $object = InstitutoEloquent::findOrFail($request->id);
        return $project;
    }


    /*
    Update or Modify a record in the database
    */
    public function update($id)
    {
        $data = [
            'name' => $this->input->post('name'),
            'description' => $this->input->post('description')
        ];

        $result = $this->db->where('id', $id)->update('projects', $data);
        return $result;

    }

    /*
    Destroy or Remove a record in the database
    */
    public function delete($id)
    {
        $result = $this->db->delete('projects', array('id' => $id));
        return $result;
    }
}