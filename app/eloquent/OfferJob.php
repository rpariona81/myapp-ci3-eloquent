<?php

namespace Db;

use Db\BaseModel;
use \Illuminate\Database\Capsule\Manager as DB;

class OfferJob extends BaseModel
{

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 't_offersjob';
    //protected $dateFormat = 'Ymd H:i:s';

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'title',
        'type_offer',
        'detail',
        'career',
        'vacancy_numbers',
        'date_publish',
        'salary',
        'date_vigency',
        'career_id'
    ];

    protected $dates = ['date_publish', 'date_vigency', 'updated_at'];

    protected $casts = [
        'date_publish' => 'datetime:Y-m-d',
        'status' => 'boolean',
        'vacancy_numbers' => 'integer',
        'updated_at' => 'datetime:Y-m-d'
    ];

    public static function getOffersjob($id = NULL)
    {
        return OfferJob::leftjoin('t_careers', 't_offersjob.career_id', '=', 't_careers.id')
            ->select('t_offersjob.id', 't_offersjob.title', 't_offersjob.detail', 't_offersjob.type_offer', 't_offersjob.vacancy_numbers', 't_offersjob.date_publish', 't_offersjob.salary', 't_offersjob.date_vigency', 't_offersjob.status', 't_offersjob.career_id', 't_careers.career_title')
            ->where('t_offersjob.id', $id)
            ->first();

    }
    public static function getOffersjobs()
    {
        /*$data = DB::select('SELECT t1.id,t1.title,t1.type_offer,t1.vacancy_numbers,t1.salary,t1.detail,t1.date_publish,t1.date_vigency,t1.status,t1.career_id,t2.career_title,t3.cant_postulantes,t1.updated_at FROM t_offersjob t1 LEFT JOIN t_careers t2 ON t1.career_id = t2.id LEFT JOIN (select offer_id, count(id) as cant_postulantes from t_postulatejob GROUP BY offer_id) t3 ON t3.offer_id = t1.id order By t1.updated_at DESC');
        return $data;*/

        $cantPostulates = DB::table('t_postulatejob')
                ->selectRaw('count(id) as cant_postulantes, offer_id')
                ->groupBy('offer_id');

        $data = OfferJob::leftjoin('t_careers','t_careers.id','=','t_offersjob.career_id')
                ->joinSub($cantPostulates,'cantPostulates', function ($join)
                {
                    $join->on('t_offersjob.id','=','cantPostulates.offer_id');
                })
                ->orderBy('t_offersjob.updated_at')
                ->get(['t_offersjob.*','t_careers.career_title','cantPostulates.cant_postulantes']);

        return $data;
    }
    //https://stackoverflow.com/questions/18079281/laravel-fluent-query-builder-join-with-subquery
}