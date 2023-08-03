<?php
 
namespace Db;
 
use Db\BaseModel;
 
class Instituto extends BaseModel
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 't_institutos';
    
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'id_region',
        'cod_mod',
        'anexo',
        'cod_local',
        'cen_edu',
        'instituto',
        'es_licenciado',
        'rm_licenciamiento',
        'doc_licenciamiento',
        'fecha_rm_licenciamiento',
        'resolucion_creacion',
        'es_idex',
        'd_niv_mod',
        'd_gestion',
        'd_ges_dep',
        'dareacenso',
        'codgeo',
        'd_dpto',
        'd_prov',
        'd_dist',
        'd_region',
        'codooii',
        'd_dreugel',
        'optimizacion',
        'url_website',
        'url_folder',
        'url_gdriveoptimizacion',
        'estado_optimizacion',
        'estado_fortalecimiento',
        'estado_portalweb',
        'estado',
        'created_by',
        'updated_by',
        'nombre_unico'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'id',
    ];

    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = [

    ];
    
    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        
    ];
    
}